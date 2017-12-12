<?php
/**
 * Created by IntelliJ IDEA.
 * User: maild
 * Date: 12/12/2017
 * Time: 15:53
 */

namespace captcha;


class recaptcha
{
    public function captchaGoogle()
    {
        // Ma clé privée
        $secret = "6LfL8hgUAAAAANEJ49YY4rosuMzcMliFkGLmK9TB";
        // Paramètre renvoyé par le recaptcha
        $response = $_POST['g-recaptcha-response'];
        // On récupère l'IP de l'utilisateur
        $remoteip = $_SERVER['REMOTE_ADDR'];

        $api_url = "https://www.google.com/recaptcha/api/siteverify?secret="
            . $secret
            . "&response=" . $response
            . "&remoteip=" . $remoteip;

        $decode = json_decode(file_get_contents($api_url), true);

        if ($decode['success'] == true) {

        } else {
            require_once('views/pages/error.php');
        }
    }
}