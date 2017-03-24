<?php

namespace Shop;

/**
 * Description of Message
 *
 * @author mat
 */
class Message extends Model
{
    protected $userId;
    protected $message;

    public function getUserId()
    {
        return $this->userId;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

}
