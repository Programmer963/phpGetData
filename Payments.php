<?php

class Payments
{
    private $id;
    private $checkNum;
    private $paymentDate;
    private $amount;
    public function __construct($value)
    {
        if (gettype($value) == "integer") {
            $sql = "SELECT * FROM payments WHERE customerId = ?";
            $db = new Database();
            $details = $db->getRow($sql, $value);

            $this->id = $details->customerId;
            $this->checkNum = $details->checkNumber;
            $this->paymentDate = $details->paymentDate;
            $this->amount = $details->amount;
        } else if (gettype($value) == "object") {
            $this->id = $value->customerId;
            $this->checkNum = $value->checkNumber;
            $this->paymentDate = $value->paymentDate;
            $this->amount = $value->amount;
        }
    }
    public function getCheckNum()
    {
        return $this->checkNum;
    }
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }
    public function getAmoutn()
    {
        return $this->amount;
    }
}