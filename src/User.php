<?php

namespace Shop;

use Shop\Model;

/**
 * Description of User
 *
 * @author mat
 */
class User extends Model
{
    protected $name;
    protected $surname;
    protected $email;
    protected $password;
    protected $address;

    // public function __construct($name, $surname, $email, $password, $address)
    // {
    //     $this->name = $name;
    //     $this->surname = $surname;
    //     $this->email = $email;
    //     $this->password = $password;
    //     $this->address = $address;
    // }

    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getAllUserMessages()
    {
        return getFromDb('Messages');
    }

    public function getAllUserOrders()
    {
        return getFromDb('Orders');
    }

    private function getFromDb($table)
    {
        $conn = self::getConnection();
        $sql = "SELECT * FROM $table WHERE userId=$this->id";
        $ret = [];
        $result = $conn->query($sql);
        if ($result !== false && $result->rowCount() != 0) {
            foreach ($result as $key => $value) {
                $ret[$key] = $value;
            }
        }
        return $ret;
    }

}
