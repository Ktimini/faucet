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
        $req = $db->exec("SELECT ip FROM ip_lock WHERE $ip = ip");

        if ($req = !NULL) {
            $result = Control::IP_BAN;
            return $result;
        } else {
            $req = $db->exec("SELECT address FROM address_lock WHERE $address = address");
            if ($req = !NULL) {
                $result = Control::ADDRESS_BAN;
                return $result;
            } else {
                $result = Control::CONTROL_PASS;
                return $result;
            }
        }
    }
}

// $controlIp = new \models\control\Control();


