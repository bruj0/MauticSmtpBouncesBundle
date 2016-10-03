# MauticSmtpBouncesBundle
This is a plugin for Mautic that will set the "bounced" flag for an email that is bounced by the smtp, trough a REST api.

You can use it by sengind a POST to http://mautic/smtpbounce/ with secret="mysecret" and email="bounced@email.com"

You must edit the file Config/config.php with your own values:

        'parameters' => array(
            'SmtpBounces_IP'     => '127.0.0.1',
            'SmtpBounces_Secret' => 'mysecret'

