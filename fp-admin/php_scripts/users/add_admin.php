<?php
    session_start();
    if(!isset($_POST) || !isset($_SESSION['fp-online']))
    {
        header('Location: ../../users.php');
        exit();
    }
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $admin_password2 = $_POST['admin_password2'];
    $admin_p_users = $_POST['admin_p_users'];
    $admin_p_products = $_POST['admin_p_products'];
    $admin_p_site = $_POST['admin_p_site'];
    $admin_p_orders = $_POST['admin_p_orders'];
    $OK = true;
    if(empty($admin_name) || strlen($admin_name) < 5 || strlen($admin_name) > 16)
    {   
        $OK = false;
    }
    if(preg_match('/^[!@#$%^&*(),.?":{}|<>]$/D', $admin_name))
    {
        $OK = false;
    }
    if(empty($admin_password) || empty($admin_password2))
    {
        $OK = false;
    }
    // CHECK BOTH NEW PASSWORDS
    if(strcmp($admin_password, $admin_password2) !== 0)
    {
        $OK = false;
    }
    // CHECH PASSWORD REQIREMENTS
    $uppercase = preg_match('@[A-Z]@', $admin_password);
    $lowercase = preg_match('@[a-z]@', $admin_password);
    $number    = preg_match('@[0-9]@', $admin_password);
    if(!$uppercase || !$lowercase || !$number || strlen($admin_password) < 8)
    {
        $OK = false;
    }
    //CHECK EMAIL
    if(!preg_match('/^[a-zA-Z0-9.\-_]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,4}$/', $admin_email))
    {
        $OK = false;
    }
    if($admin_p_users != "1" && $admin_p_users != 0)
    {
        $OK = false;
    }
    if($admin_p_products != "1" && $admin_p_products != 0)
    {
        $OK = false;
    }
    if($admin_p_site != "1" && $admin_p_site != 0)
    {
        $OK = false;
    }
    if($admin_p_orders != "1" && $admin_p_orders != 0)
    {
        $OK = false;
    }
    if($OK == false)
    {
        $_SESSION['result'] = "Wystąpił bład! Sprawdź dane!";
    }
    else
    {
        require_once  "../permissions/check.php";
        if(check_users() == true)
        {
            require_once "../../connect.php";
            $admin_password = password_hash($admin_password, PASSWORD_DEFAULT);
            $permisions = array($admin_p_users, $admin_p_products, $admin_p_site, $admin_p_orders);
            $permisions = implode(",", $permisions);
            $stmt = $conn->prepare("INSERT INTO `panel_admins`(`admin_id`, `admin_login`, `admin_password`, `admin_email`, `admin_permissions`, `admin_create_time`) VALUES (NULL,:admin_name,:admin_password,:admin_email,:permission,NULL)");
            $stmt->bindParam(":admin_name", $admin_name);
            $stmt->bindParam(":admin_password", $admin_password);
            $stmt->bindParam(":admin_email", $admin_email);
            $stmt->bindParam(":permission", $permisions);
            echo "Przeszlo";
            try
            {
                $stmt->execute();
                $_SESSION['result'] = "Pomyślnie dodano nowego administratora!";
            }   
            catch(Exception $e)
            {
                $_SESSION['result'] = "Wystąpił błąd!";
                echo $e;
            }
        }
    }
    header("Location: ../../users.php");
    exit();
?>