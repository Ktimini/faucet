<?php

/**
 * User: maild
 * Date: 12/12/2017
 * Time: 16:00
 */
class ClaimController
{

    public function reCaptcha()
    {
        $result = Captcha::reCaptcha();
        if ($result == true) {
            self::claim();
        } else {
            require_once 'views/pages/home.php';
        }

    }

    public function claim()
    {
        self::reCaptcha();
        if (isset($_POST['btcAdress'])) {
            $address = $_POST['btcAdress'];
            Address::claim($address);

        }
    }

}