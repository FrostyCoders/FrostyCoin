<?php
    session_start();
    if(!isset($_POST) || !isset($_SESSION['fp-online']) || !isset($_GET['uid']))
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
            $uid = $_GET['uid'];
            $user_email = $_POST['email'];
            $OK = true;
            if(empty($user_email) || !preg_match('/^[a-zA-Z0-9.\-_]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,4}$/', $user_email))
            {
                $OK = false;
            }
            if($OK == true)
            {
                require_once "../../connect.php";
                $sql = $conn->prepare("UPDATE shop_users SET user_email = :email WHERE user_id = :user_id");
                $sql->bindParam(":email", $user_email);
                $sql->bindParam(":user_id", $uid);
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