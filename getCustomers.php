<?php

require_once "Database.php";
require_once "Customer.php";

$sql = "SELECT * FROM customers WHERE customerId = ?";

$db = new Database();
$customers = $db->getRow($sql, $_GET["id"]);

$array = [];

foreach($customers as $customer) {
    $array[] = new Customer($customer);
}

header("Content-type: application/json; charset=utf-8");
echo json_encode($array);