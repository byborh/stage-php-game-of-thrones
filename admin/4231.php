<?php

require_once('../includes/db_connect.php');

if(!isset($_SESSION['role'])) {
    header('Location: ../page/main.php');
    exit();
}

if($_SESSION['role'] != "admin") {
    header('Location: ../page/main.php');
    exit();
}

if(isset($_GET['id'])) {
    header('Location: CRUD.php?id='.$_GET['id']);
} else {
    header('Location: dashboard.php');
}