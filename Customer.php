<?php
class Customer
{
    public $id;
    public $company;
    public $name;
    public $address;

    public function __construct($value)
    {
        if (gettype($value) == "integer") {
            $sql = "SELECT * FROM customers WHERE customerId = ?";
            $db = new Database();
            $details = $db->getRow($sql, $value);

            $this->id = $details->customerId;
            $this->company = $details->customerName;
            $this->name = "$details->contactFirstName $details->contactLastName";
        } else if (gettype($value) == "object") {
            $this->id = $value->customerId;
            $this->company = $value->customerName;
            $this->name = "$value->contactFirstName $value->contactLastName";
        }
    }

    public function getName()
    {
        return $this->name;
    }
    public function getCompany()
    {
        return $this->company;
    }
    public function getAddress()
    {
        return $this->address;
    }
}