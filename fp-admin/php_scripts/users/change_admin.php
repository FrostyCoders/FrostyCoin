<?php
    session_start();
    if(!isset($_POST) || !isset($_SESSION['fp-online']) || !isset($_GET['aid']))
    {
        $_SESSION['result'] = "Wystąpił błąd!";
        header("Location: ../../users.php");
        exit();
    }
    else
    {
        require_once  "../permissions/check.php";
        if(check_users() == true)
        {
            $aid = $_GET['aid'];
            $admin_email = $_POST['email'];
            $admin_user = $_POST['user'];
            $admin_products = $_POST['product'];
            $admin_site = $_POST['site'];
            $admin_orders = $_POST['orders'];
            $OK = true;
            if(empty($admin_email) || !preg_match('/^[a-zA-Z0-9.\-_]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,4}$/', $admin_email))
            {
                $OK = false;
            }
            if(empty($admin_user))
            {
                $admin_user = "0";
            }
            if(empty($admin_products))
            {
                $admin_products = "0";
            }
            if(empty($admin_site))
            {
                $admin_site = "0";
            }
            if(empty($admin_orders))
            {
                $admin_orders = "0";
            }
            if($OK == true)
            {
                $rights = array($admin_user, $admin_products, $admin_site, $admin_orders);
                $right = implode(",", $rights); 
                require_once "../../connect.php";
                $sql = $conn->prepare("UPDATE panel_admins SET admin_email = :email, admin_permissions = :rights WHERE admin_id = :admin_id");
                $sql->bindParam(":email", $admin_email);
                $sql->bindParam(":rights", $right);
                $sql->bindParam(":admin_id", $aid);
                try
                {
                    $sql->execute();
                    $_SESSION['result'] = "Pomyślnie zaktualizowano!";
                }
                catch(Exception $e)
                {
                    $_SESSION['result'] = "Wystąpił błąd! Zmiana e-maila może pomóc.";
                }
            }
            else
            {
                $_SESSION['result'] = "Wystąpił błąd! Sprawdź dane!";
            }
        }
    }
    header("Location: ../../users.php");
    exit();
?>