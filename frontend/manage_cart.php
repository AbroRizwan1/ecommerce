<?php


require 'connection.inc.php';
require 'functions.inc.php';
require 'add_to_cart.inc.php';

// // Sanitize and validate input data
$pid = get_safe_value($con, $_POST['pid']);
$qty = get_safe_value($con, $_POST['qty']);
$type = get_safe_value($con, $_POST['type']);

// // Initialize the cart object
$obj = new add_to_cart();



// // Add or remove product based on the type
if ($type == 'add') {
     $obj->addProduct($pid, $qty);
}

if ($type == 'remove') {
     $obj->removeProduct($pid);
}

if ($type == 'update') {
     $obj->updateProduct($pid, $qty);
}


// // Return the total number of products in the cart
echo $obj->TotalProduct();




















// Sanitize and validate input data
// $pid = get_safe_value($con, $_POST['pid']);
// $qty = get_safe_value($con, $_POST['qty']);
// $type = get_safe_value($con, $_POST['type']);

// // Initialize the cart object
// $obj = new add_to_cart();

// // Add, update, or remove product based on the type
// // if ($type == 'add') {
// //     $obj->addProduct($pid, $qty);
// // } elseif ($type == 'remove') {
// //     $obj->removeProduct($pid);
// // }

// // Return the total number of products in the cart
// echo $obj->TotalProduct();
