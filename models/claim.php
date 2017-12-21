<?php

class Claim
{
    protected $id;
    protected $ip;
    protected $address;
    protected $balance;
    protected $nb_claim;

    public function __construct($id, $ip, $address, $balance, $nb_claim)
    {
        $this->id = $id;
        $this->ip = $ip;
        $this->address = $address;
        $this->balance = $balance;
        $this->nb_claim = $nb_claim;
    }

    public static function getClaim($address)
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM address');
        //
        foreach ($req->fetchAll() as $data) {
            $list[] = new Claim($data['id'], $data['ip'], $data['address'], $data['balance'], $data['nb_claim']);
            if ($data['address'] === $address) {
                self::addFund($address);
                break;
            } else {
                self::newAddress($address);
                break;
            }
        }
        return $list;
    }

    public static function addFund($address)
    {
        $db = Db::getInstance();
        $req = $db->prepare("UPDATE address SET balance = balance + 10 , nb_claim = nb_claim + 1 WHERE address = :address");
        $req->execute(array('address' => $address));
        require_once 'views/pages/home.php';
    }

    public static function newAddress($address)
    {
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $db = Db::getInstance();
        $req = $db->prepare("INSERT INTO address(address, ip, nb_claim, balance, date_first) VALUE (:address, :ip, :nb_claim, :balance, NOW())");
        $req->execute(array('address' => $address, 'nb_claim' => 1, 'balance' => 10, 'ip' => $remoteip));
        require_once 'views/pages/home.php';
    }

}
