<?php

require 'connection.inc.php';
require 'functions.inc.php';

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['password'])) {
    // Sanitize input data
    $name = get_safe_value($con, $_POST['name']);
    $email = get_safe_value($con, $_POST['email']);
    $mobile = get_safe_value($con, $_POST['mobile']);
    $password = get_safe_value($con, $_POST['password']);

    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $check_email = "SELECT * FROM user WHERE email='$email'";
    $res = mysqli_query($con, $check_email);

    $check = mysqli_num_rows($res);

    if ($check > 0) {

        // echo '<script> alert("Email Already Exists ") </script>';
        echo "Error: Email already exists."; // Email already exists
       
    } else {
        // echo '<script> alert("Thankyou for Registering ") </script>';

       
        // Insert user data
        $added_on = date('Y-m-d H:i:s');
        $sql = "INSERT INTO user (name, email, mobile, password, added_on) VALUES ('$name', '$email', '$mobile', '$password', '$added_on')";

        if (mysqli_query($con, $sql)) {
            echo "Success: User registered.";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
} else {
    echo "Error: Missing required fields.";
}
