<?php

class Address
{

    // they are public so that we can access them using $post->author directly
    protected $id;
    protected $ip;
    protected $address;
    protected $balance;

    public function __construct($id, $ip, $address, $balance)
    {
        $this->id = $id;
        $this->ip = $ip;
        $this->address = $address;
        $this->balance = $balance;
    }


    public static function claim($address)
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM address');
        //
        foreach ($req->fetchAll() as $data) {
            $list[] = new Address($data['id'], $data['ip'], $data['address'], $data['balance']);
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
        require_once 'views\pages\home.php';
    }

    public static function newAddress($address)
    {
        $db = Db::getInstance();
        $req = $db->prepare("INSERT INTO address(address, nb_claim, balance, date_first) VALUE (:address, :nb_claim, :balance, NOW())");
        $req->execute(array('address' => $address, 'nb_claim' => 1, 'balance' => 10));
        require_once 'views\pages\home.php';
    }

}
