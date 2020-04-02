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
        require_once  "../permissions/check.php";
        if(check_orders() == true)
        {
            $oid = $_GET['oid'];
            $status = $_POST['status'];
            $payed = $_POST['payed'];
            if(empty($payed))
            {
                $payed = 0;
            }
            if(empty($status))
            {
                $_SESSION['result'] = "Wystąpił błąd!";
            }
            else
            {
                require_once "../../connect.php";
                $sql = $conn->prepare("UPDATE shop_orders SET order_status = :ostatus, order_payed = :payed WHERE order_id = :order_id");
                $sql->bindParam(":ostatus", $status);
                $sql->bindParam(":payed", $payed);
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
    }
    header("Location: ../../orders.php");
    exit();
?>