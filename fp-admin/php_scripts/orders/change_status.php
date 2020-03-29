<?php
    session_start();
    if(!isset($_POST) || !isset($_SESSION['fp-online']) || !isset($_GET['oid']))
    {
        $_SESSION['result'] = "Wystąpił błąd!";
        header("Location: ../../orders.php");
        exit();
    }
    else
    {
        $oid = $_GET['oid'];
        $status = $_POST['status'];
        if(empty($status))
        {
            $_SESSION['result'] = "Wystąpił błąd!";
        }
        else
        {
            require_once "../../connect.php";
            $sql = $conn->prepare("UPDATE shop_orders SET order_status = :ostatus WHERE order_id = :order_id");
            $sql->bindParam(":ostatus", $status);
            $sql->bindParam(":order_id", $oid);
            try
            {
                $sql->execute();
                $_SESSION['result'] = "Pomyślnie zaktualizowano!";
            }
            catch(Exception $e)
            {
                $_SESSION['result'] = "Wystąpił błąd!";
            }
        }
    }
    header("Location: ../../orders.php");
    exit();
?>