<?php
/**
 * Date: 21/12/2017
 * Time: 09:33
 */

// namespace models\control;


class Control
{
    protected $ip;
    protected $address;

    const  IP_BAN = 1;
    const  ADDRESS_BAN = 2;
    const  CONTROL_PASS = 3;

    public function __construct($ip, $address)
    {
        $this->ip = $ip;
        $this->address = $address;
    }

    public static function control($ip, $address)
    {
        $db = Db::getInstance();
        $req = $db->query("SELECT * FROM ip_lock");

        foreach ($req->fetchAll() as $test) {

            if ($test['ip'] === $ip) {

                $result = Control::IP_BAN;

                return $result;

            }
        }

        $req = $db->query("SELECT * FROM address_lock");

        foreach ($req->fetchAll() as $addressLock) {
            if ($addressLock['address'] === $address) {
                $result = Control::ADDRESS_BAN;
                return $result;
            } else {
                $result = self::ipHub($ip, $address);
                return $result;
            }
        }
        $req->closeCursor();
    }

    public static function ipHub($remoteIp, $address)
    {
        $ip = $remoteIp;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, 'http://v2.api.iphub.info/ip/' . $ip);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Key: Njg6eUdVVE4zVXA5UXBPbXV5YjhuT3JjQ2YzOGRWZW44VHE='));
        $result = curl_exec($ch);
        curl_close($ch);

        $obj = json_decode($result, true);
        if ($obj['block'] == '1') {
            $db = Db::getInstance();
            $reqAddress = $db->prepare("INSERT INTO address_lock(address)) VALUE :address");
            $reqAddress->execute(array('address' => $address));
            $reqIp = $db->prepare("INSERT INTO ip_lock(ip)) VALUE :address");
            $reqIp->execute(array('ip' => $ip));
            echo '<script>window.location.href="../blocked.html";</script>';
            die;
        }
        $result = Control::CONTROL_PASS;
        return $result;
    }
}




