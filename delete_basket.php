<?php
    $filename = $_GET['filename'];
    session_start();
    unset($_SESSION['basket']);
    header("Location: ".$filename."");
?>