<?php
    /**
     * Created by PhpStorm.
     * User: bruj0
     * Date: 9/29/2016
     * Time: 11:59 PM
     */

namespace MauticPlugin\MauticSmtpBouncesBundle\Controller;

use Mautic\CoreBundle\Controller\FormController;
use Mautic\CoreBundle\Factory\MauticFactory;
use Mautic\LeadBundle\Entity\DoNotContact;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends FormController
{
    /**
     * @param string $email
     *
     * @return JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function setbouncedAction()
    {
        if ($this->request->getMethod() == 'POST')
        {
            $request = $this->get('request_stack')->getCurrentRequest();
            $config = $this->get('mautic.helper.core_parameters');

            $allowed_ip = $config->getParameter('SmtpBounces_IP', '');
            $secret = $config->getParameter('SmtpBounces_Secret', '');

            $server         = $request->server->all();
            $requestIp      = $server['REMOTE_ADDR'];
            $post           = $request->request->all();
            $request_secret = $post['secret'];
            $email          = $post['email'];
            $message        = false;


            if ($requestIp != $allowed_ip)
                $message="You IP: $requestIp is not allowed. ";


            if ($secret != $request_secret)
                $message.="Incorrect secret. ";


            if (empty($email))
                $message.="Email is empty";

            if(!$message)
            {
                $emailModel = $this->factory->getModel('email');
                $emailModel->setEmailDoNotContact($email, DoNotContact::BOUNCED, 'smtp bounced', TRUE);
            }

            return $this->delegateView(
                array(
                    'viewParameters'  => array(
                        'message' => $message,
                        'email'   => $email
                    ),
                    'contentTemplate' => 'MauticSmtpBouncesBundle:Message:index.html.php',
                )
            );


        }
    }
}