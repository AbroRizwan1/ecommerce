<?php

require 'connection.inc.php';
require 'functions.inc.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input data
    $name = get_safe_value($con, $_POST['name']);
    $email = get_safe_value($con, $_POST['email']);
    $mobile = get_safe_value($con, $_POST['mobile']);
    $comment = get_safe_value($con, $_POST['message']);
    $added_on = date('Y-m-d H:i:s'); // Current timestamp



    // Insert data into the database
    $sql = "INSERT INTO `contact_us` (`name`, `email`, `mobile`, `comment`, `added_on`)
                VALUES ('$name', '$email', '$mobile', '$comment', '$added_on')";

    if (mysqli_query($con, $sql)) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . mysqli_error($con); // Display MySQL error if any
    }
} else {
    echo "Invalid request method.";
}
