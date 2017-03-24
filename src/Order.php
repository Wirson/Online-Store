<?php

namespace Shop;

/**
 * Description of Order
 *
 * @author tulexx
 */
class Order extends Model
{
    protected $state;
    protected $userId;
    protected $productId;

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($id)
    {
        $this->userId;
        return $this;
    }

    public function getProductId()
    {
        return $this->productId;
    }

    public function setProductId($id)
    {
        $this->productId;
        return $this;
    }
}
