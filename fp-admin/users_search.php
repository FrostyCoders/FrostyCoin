<?php
 
session_start();
    if(!isset($_SESSION['fp-online']))
    {
        header("Location: index.php");
        exit();
    }


 require_once "connect.php";
?>