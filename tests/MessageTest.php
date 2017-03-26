<?php

use Shop\Message;
use PHPUnit\DbUnit\TestCase;

/**
 * @author tulexx
 */
class MessageTest extends TestCase
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

    public function testMessageCreation()
    {
        $message = new Message;
        $message->setMessage('second testing message');
        $message->setUserId(1);
        $message->saveToDB();

        $this->assertSame(2, $message->getId());
    }

    public function testMessageDeletion()
    {
        $message = Message::getById(1);
        $message->delete();

        $this->assertFalse(Message::getById(1));
    }
}
