<?php

namespace Shop;

/**
 * Class 
 * @author tulexx
 */
class Product extends Model
{
    protected $name;
    protected $price;
    protected $description;
    protected $quantity;

    /**
     * @param string $name = ''
     * @param float $price = 0
     * @param int $quantity = 0
     * @param string $description = ''
     */
    public function __construct($name = '', $price = 0, $quantity = 0, $description = '')
    {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->quantity = $quantity;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
}
