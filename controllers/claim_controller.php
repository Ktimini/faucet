<?php

/**
 * Date: 12/12/2017
 * Time: 16:00
 */
class ClaimController
{

    private $regExIpv6 = "#(([0-9a-fA-F]{1,4}:){7,7}[0-9a-fA-F]{1,4}|([0-9a-fA-F]{1,4}:){1,7}:|([0-9a-fA-F]{1,4}:){1,6}:[0-9a-fA-F]{1,4}|([0-9a-fA-F]{1,4}:){1,5}(:[0-9a-fA-F]{1,4}){1,2}|([0-9a-fA-F]{1,4}:){1,4}(:[0-9a-fA-F]{1,4}){1,3}|([0-9a-fA-F]{1,4}:){1,3}(:[0-9a-fA-F]{1,4}){1,4}|([0-9a-fA-F]{1,4}:){1,2}(:[0-9a-fA-F]{1,4}){1,5}|[0-9a-fA-F]{1,4}:((:[0-9a-fA-F]{1,4}){1,6})|:((:[0-9a-fA-F]{1,4}){1,7}|:)|fe80:(:[0-9a-fA-F]{0,4}){0,4}%[0-9a-zA-Z]{1,}|::(ffff(:0{1,4}){0,1}:){0,1}((25[0-5]|(2[0-4]|1{0,1}[0-9]){0,1}[0-9])\.){3,3}(25[0-5]|(2[0-4]|1{0,1}[0-9]){0,1}[0-9])|([0-9a-fA-F]{1,4}:){1,4}:((25[0-5]|(2[0-4]|1{0,1}[0-9]){0,1}[0-9])\.){3,3}(25[0-5]|(2[0-4]|1{0,1}[0-9]){0,1}[0-9]))#";

    public function reCaptcha()
    {
        $result = Captcha::reCaptcha();
        return $result;
    }

    public function claim()
    {
        $remoteip = $_SERVER['REMOTE_ADDR'];
        if (preg_match($this->regExIpv6, $remoteip)){
            echo "Votre adresse IP " . $remoteip . "est une IPV6 et ne peut être validée";
            die;
        }
        // $result = self::reCaptcha();
        // if ($result == true && isset($_POST['btcAddress'])) {
        if (isset($_POST['btcAddress']) && preg_match("#^[13][a-km-zA-HJ-NP-Z0-9]{26,33}$#", $_POST['btcAddress'])) {
        $address = htmlspecialchars($_POST['btcAddress']);

        $control = Control::control($remoteip, $address);

        switch ($control) {
            case 1:
                require_once '../views/pages/home.php';
                break;
            case 2:
                require_once '../views/pages/home.php';
                break;
            case 3:
                Claim::getClaim($address);
                break;
             }
        } else {
            echo $_POST['btcAddress'] . " n'est pas une adresse valide";
        }

    }

    public function connect()
    {

    }
}