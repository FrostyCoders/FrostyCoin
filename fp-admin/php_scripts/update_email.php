<?php
    session_start();
    if(!isset($_POST) || !isset($_SESSION['fp-online']))
    {
        header("Location: ../settings.php");
        exit();
    }
    else
    {
        $OK = true;
        $email = $_POST['email'];
        //CHECK EMAIL
        if(empty($email))
        {
            $OK = false;
        }
        if(!preg_match('/^[a-zA-Z0-9.\-_]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,4}$/', $email))
        {
            $OK = false;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            $OK = false;
        }
        if($OK == true)
        {
            require_once "../connect.php";
            $stmt = $conn->prepare("UPDATE panel_admins SET admin_email = :email WHERE admin_id = :aid");
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":aid", $_SESSION['admin_id']);
            try
            {
                $stmt->execute();
                $_SESSION['result'] = "Zmieniono pomyślnie!";
                
            }
            catch(Exception $e)
            {
                $_SESSION['result'] = "Wystąpił błąd!";
            }
            unset($conn);
        }
        else
        {
            $_SESSION['result'] = "Sprawdź e-mail!";
        }
    }
    header("Location: ../settings.php");
    exit();
?>