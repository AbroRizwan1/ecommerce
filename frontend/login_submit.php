<?php

require 'connection.inc.php';
require 'functions.inc.php';


if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = get_safe_value($con, $_POST['email']);
    $password = get_safe_value($con, $_POST['password']);

    // prx($email);
    // prx($password);

    $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";

    // prx($query);


    $res = mysqli_query($con, $query);

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $_SESSION['USER_LOGIN'] = 'yes';
        $_SESSION['USER_ID'] = $row['id'];
        $_SESSION['USER_NAME'] = $row['name'];
        echo "Valid";
    } else {
        echo "wrong";
    }
} else {
    echo "error";
}


?>