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
        if ($result == true && $stmt->rowCount() > 0) {
            $attr = $stmt->fetch(\PDO::FETCH_ASSOC);
            $object = new static;
            foreach ($attr as $key => $value) {
                $object->$key = $value;
            }
            return $object;
        }
        return false;
    }

    public function saveToDB()
    {
        if ($this->id == self::NON_EXISTING_ID) {
            $conn = self::getConnection();
            $name = self::getTableName();
            $array = [];
            $sql1 = 'INSERT INTO ' . $name . 
                's' . 
                ' (';
            $sql2 = 'VALUES (';
            foreach (get_object_vars($this) as $key => $value) {
                if ($key != 'id') {
                    $array[$key] = $value;
                    $sql1 .= $key . ', ';
                    $sql2 .= ':' . $key . ', ';
                }
            }
            $stmt = $conn->prepare(substr_replace($sql1, '', -2) . ') ' . substr_replace($sql2, '', -2) . ')');

            $result = $stmt->execute($array);

            if ($result !== false) {
                $this->id = (int)$conn->lastInsertId();
                return true;
            }
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
            if ($result == true) {
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
