<?php

class Order
{
    private $id;
    private $order_date;
    private $status;

    public function __construct($value)
    {
        if (gettype($value) == "integer") {
            $sql = "SELECT * FROM orders WHERE orderId = ?"; 
            $db = new Database();
            $details = $db->getRow($sql, $value);
            var_dump($details); 
            $this->id = $details->orderId;
            $this->order_date = $details->orderDate;
            $this->status = $details->status;
        } else if (gettype($value) == "object") {
            var_dump($value);
            $this->id = $value->orderId;
            $this->order_date = $value->orderDate;
            $this->status = $value->status;
        }
    }

    public function getOrderDate() {
        return $this->order_date;
    }
    public function getStatus() {
        return $this->status;
    }
}