<?php
/**
 * Created by IntelliJ IDEA.
 * User: maild
 * Date: 12/12/2017
 * Time: 15:53
 */


class Captcha
{
    public static function reCaptcha()
    {
        // Private key
        $secret = "6LfL8hgUAAAAANEJ49YY4rosuMzcMliFkGLmK9TB";
        // Response recaptcha
        $response = $_POST['g-recaptcha-response'];
        // User IP
        $remoteip = $_SERVER['REMOTE_ADDR'];

        $api_url = "https://www.google.com/recaptcha/api/siteverify?secret="
            . $secret
            . "&response=" . $response
            . "&remoteip=" . $remoteip;

        $decode = json_decode(file_get_contents($api_url), true);

        return $decode['success'];

    }
}