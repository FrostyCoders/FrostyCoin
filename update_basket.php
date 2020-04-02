<?php
    require_once "basket.php";
    session_start();
    if(!isset($_SESSION['basket']) || !isset($_SESSION['logged']) || !isset($_POST))
    {
        header("Location: index.php");
        exit();
    }
    else
    {
        foreach($_SESSION['basket'] as $item)
        {
            if(isset($_POST[$item->product_id]))
            {
                $item->amount = $_POST[$item->product_id];
            }
        }
    }
    header("Location: order_summary.php");
    exit();
?>