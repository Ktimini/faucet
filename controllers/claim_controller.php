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
        return $result;
    }

    public function claim()
    {
       // $result = self::reCaptcha();
        //if ($result == true && isset($_POST['btcAddress'])) {
            $address = $_POST['btcAddress'];
            $remoteip = $_SERVER['REMOTE_ADDR'];
            $control = Control::control($remoteip, $address);
            
            switch ($control) {
                case 1:
                    require_once 'views/pages/home.php';
                    break;
                case 2:
                    require_once 'views/pages/home.php';
                    break;
                case 3:
                    Claim::getClaim($address);
                    break;
            }
        }

    //}

    public function connect()
    {

    }

}