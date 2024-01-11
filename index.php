<?php

require_once("Database.php");
require_once("Customer.php");

$customer = new Customer(128);
echo $customer->getName();