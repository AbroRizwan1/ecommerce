<?php

require 'functions.inc.php';
require 'connection.inc.php';


unset($_SESSION['USER_NAME']);
unset($_SESSION['USER_ID']);
unset($_SESSION['USER_LOGIN']);
header('location:index.php');
die(); 

?>