<?php
require_once('../includes/db_connect.php');
 
$_SESSION[] = Array();

session_destroy();

header('Location: ../index.php');

exit();