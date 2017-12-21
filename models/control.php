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
                $result = Control::CONTROL_PASS;
                return $result;
            }
        }
        $req->closeCursor();
    }
}

// $controlIp = new \models\control\Control();


