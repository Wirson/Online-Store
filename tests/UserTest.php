<?php

use Shop\User;

/**
 * @author tulexx
 */
class UserTest extends \PHPUnit\DbUnit\TestCase
{
    protected function getConnection()
    {
        $conn = new PDO(DB_DSN, DB_USER, DB_PASS);
        return new \PHPUnit\DbUnit\Database\DefaultConnection($conn, DB_NAME);
    }

    protected function getDataSet()
    {
        return $this->createMySQLXMLDataSet('./dump.xml');
    }

    public function testUserCreation()
    {
        $user = new User;
        $user->setEmail('test2@test.pl');
        $user->setName('test2');
        $user->setSurname('testington');
        $user->setAddress('test addreess');
        $user->setPassword('test');
        $user->saveToDB();

        $this->assertSame(2, $user->getId());
    }

    public function testUserDeletion()
    {
        $user = User::getById(1);
        $user->delete();

        $this->assertFalse(User::getById(1));
    }

    public function testUserByEmail()
    {
        $user = User::getByEmail('test@test.pl');

        $this->assertEquals(1, $user->getId());
    }
}
