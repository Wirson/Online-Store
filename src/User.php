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
    
    // public static function loadUserByEmail($email) {
    //     $conn = self::getConnection();
    //     $stmt = $conn->prepare('SELECT * FROM Users WHERE email=:email');
    //     $result = $stmt->execute(['email' => $email]);
    //     if ($result == true && $stmt->rowCount() > 0) {
    //         $row = $stmt->fetch(PDO::FETCH_ASSOC);
    //         $loadedUser = new User();
    //         $loadedUser->id = $row['id'];
    //         $loadedUser->name = $row['name'];
    //         $loadedUser->surname = $row['surname'];
    //         $loadedUser->email = $row['email'];
    //         $loadedUser->password = $row['password'];
    //         $loadedUser->address = $row['address'];
    //         return $loadedUser;
    //     }
    //     return false;
    // }
    //
    public function getAllUserMessages()
    {
        return $this->getFromDb('Messages');
    }

    public function getAllUserOrders()
    {
        return $this->getFromDb('Orders');
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
