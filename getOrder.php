<?php

require_once "Database.php";
require_once "Order.php";

$sql = "SELECT * FROM orders WHERE orderId = ?";

$db = new Database();
$orders = $db->getRow($sql, $_GET["id"]);

$array = [];

foreach($orders as $order) {
    $array[] = new Order($order);
}

header("Content-type: application/json; charset=utf-8");
echo json_encode($array);