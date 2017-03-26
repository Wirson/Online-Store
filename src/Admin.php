<?php

namespace Shop;

use Shop\Model;

/**
 * Description of Admin
 *
 * @author tulexx
 */
class Admin extends Model
{
    protected $name;
    protected $email;
    protected $password;

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }
    
}
