<?php

namespace Shop;

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

    public function __construct($name, $surname, $email, $password, $address)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->address = $address;
    }

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

    public function saveToDB()
    {
        //todo reflection, move to Model.php
        if ($this->id == self::NON_EXISTING_ID) {
            $conn = self::getConnection();
            $name = self::getTableName();
            $stmt = $conn->prepare('INSERT INTO ' . $name . '(name, surname, email, password, address) VALUES (:name, :surname, :email, :password, :address)');
            $result = $stmt->execute(
                    [
                        'name' => $this->name,
                        'surname' => $this->surname,
                        'email' => $this->email,
                        'password' => $this->password,
                        'address' => $this->address
                    ]
            );

            if ($result !== false) {
                $this->id = $conn->lastInsertId();
                return true;
            }
        }
    }

    public function getAllUserMessages()
    {
        return getFromDb('Message');
    }

    public function getAllUserOrders()
    {
        return getFromDb('Order');
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
