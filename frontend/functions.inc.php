<?php

// require 'connection.inc.php';

function pr($arr)
{
    echo '<pre>';
    print_r($arr);
}

function prx($arr)
{
    echo '<pre>';
    print_r($arr);
    die();
}



// function get_safe_value($con, $value)
// {
//     return mysqli_real_escape_string($con, trim($value));
// }

function get_safe_value($con, $str)
{

    if ($str != '') {
        $str = trim($str);
        return mysqli_real_escape_string($con, $str);
    }
}



// ------------fetch products 

function get_product($con, $limit = '', $cat_id = '', $product_id = '')
{
    // Base SQL query with JOIN
    $sql = "SELECT product.*, categories.categories 
            FROM product 
            INNER JOIN categories ON product.categories_id = categories.id 
            WHERE product.status='1'";

    // Add category filter if $cat_id is provided
    if ($cat_id != '') {
        $sql .= " AND product.categories_id='$cat_id'";
    }

    // Add product filter if $product_id is provided
    if ($product_id != '') {
        $sql .= " AND product.id='$product_id'";
    }

    // Add ORDER BY clause
    $sql .= " ORDER BY product.id DESC";

    // Add LIMIT clause if $limit is provided
    if ($limit != '') {
        $sql .= " LIMIT $limit";
    }

    // Execute the query
    $res = mysqli_query($con, $sql);


    // Check if the query was successful
    if (!$res) {
        // Log the error for debugging
        error_log("SQL Error: " . mysqli_error($con));
        return []; // Return an empty array if the query fails
    }

    // Fetch the results
    $data = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }

    return $data;
}
