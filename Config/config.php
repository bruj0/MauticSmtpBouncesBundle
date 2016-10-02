<?php
    /**
     * Created by PhpStorm.
     * User: bruj0
     * Date: 9/29/2016
     * Time: 11:50 PM
     */

    return array(
        'name'        => 'Smtp Bounces handler',
        'description' => 'This is a plugin for Mautic that will set the "bounced" flag for an email that is bounced by the smtp, trough a REST api.',
        'author'      => 'Rodrigo A. Diaz leven',
        'version'     => '1.0.0',
        'routes'   => array(
            'public' => array(
                'plugin_smtpbounces_set' => array(
                    'path'       => '/smtpbounce/',
                    'controller' => 'MauticSmtpBouncesBundle:Default:setbounced',
                    'method'     => 'POST'
                ),
            ),
        ),
        'parameters' => array(
            'SmtpBounces_IP'     => '192.168.41.101',
            'SmtpBounces_Secret' => 'mysecret'
        )
    );
