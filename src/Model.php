<?php

namespace Shop;

/**
 * Description of Model
 * id and db connection set
 * @author mat
 * 
 */
abstract class Model
{

    const NON_EXISTING_ID = -1;

    protected $id = self::NON_EXISTING_ID;
    private static $conn = null;

    public function getId()
    {
        return $this->id;
    }

    public static function getConnection()
    {
        if (null === self::$conn) {
            self::$conn = new \PDO(DB_DSN, DB_USER, DB_PASS);
        }
        return self::$conn;
    }

    public static function getTableName()
    {
        $classname = static::class;
        $name = substr($classname, (strrpos($classname, "\\")) + 1);
        return $name;
    }

    public static function getById($id)
    {
        $conn = self::getConnection();
        $name = self::getTableName();
        $stmt = $conn->prepare('SELECT * FROM ' . $name . 
            's' . //because table names have s in database
            ' WHERE id=:id');
        $result = $stmt->execute(['id' => $id]);
        if ($result === true && $stmt->rowCount() > 0) {
            $attr = $stmt->fetch(PDO::FETCH_ASSOC);
            $object = new static;
            foreach ($attr as $key => $value) {
                $object->$key = $value;
            }
            return $object;
        }
    }

    public function delete()
    {
        if ($this->id != self::NON_EXISTING_ID) {
            $conn = self::getConnection();
            $name = self::getTableName();
            $stmt = $conn->prepare('DELETE FROM ' . $name . 
                's' . //because table names have s in database
                ' WHERE id=:id');
            $result = $stmt->execute(['id' => $this->id]);
            if ($result === true) {
                $this->id = self::NON_EXISTING_ID;
                return true;
            }
            return false;
        }
        return true;
    }

    public function passVerify($pass)
    {
        return password_verify($pass, $this->password);
    }

}
