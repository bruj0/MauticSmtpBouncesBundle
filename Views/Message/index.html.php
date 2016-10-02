<?php
    /**
     * Created by PhpStorm.
     * User: bruj0
     * Date: 9/30/2016
     * Time: 1:16 AM
     */

    echo json_encode([
        'error' => ($message) ? 'true' : 'false',
        'message' => ($message) ? $message : 'OK',
        'email' => $email
    ]);

?>
