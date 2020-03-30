<?php
    session_start();
    $log = fopen("install_log.txt", "a");
    if(!isset($_SESSION['file_db_ok']))
    {
        header("Location: index.php");
        exit();
    }
    $website_name = $_POST['website_name'];
    $admin_name = $_POST['admin_name'];
    $admin_password = $_POST['admin_password'];
    $admin_password2 = $_POST['admin_password2'];
    $admin_email = $_POST['admin_email'];
    $install_errors = 0;
    // CHECK WEBSITE NAME
    if(empty($website_name))
    {
        $_SESSION['install_data_error'] = "Nazwa strony nie może być pusta!";
        fwrite($log, $date = date('d/m/Y h:i:s a', time())." : Website name is empty : WARNING\r\n");
        fclose($log);
        header("Location: install_data.php");
        exit();
    }
    // CHECK ADMIN NAME
    if(empty($admin_name))
    {
        $_SESSION['install_data_error'] = "Nazwa użytkownika nie może być pusta!";
        fwrite($log, $date = date('d/m/Y h:i:s a', time())." : Admin name is empty : WARNING\r\n");
        fclose($log);
        header("Location: install_data.php");
        exit();
    }
    else
    {
        $name_ok = true;
        if(strlen($admin_name) < 5 || strlen($admin_name) > 16)
        {
            $name_ok = false;
        }
        if(preg_match('/^[!@#$%^&*(),.?":{}|<>]$/D', $admin_name))
        {
            $name_ok = false;
        }

        if($name_ok != true)
        {
            $_SESSION['install_data_error'] = "Nazwa użytkownika nie spełnia wymagań złożonosci!";
            fwrite($log, $date = date('d/m/Y h:i:s a', time())." : Admin name doesn't meet complexity requirements : WARNING\r\n");
            fclose($log);
            header("Location: install_data.php");
            exit();
        }
    }
    // CHECK PASSWORDS
    if(empty($admin_password) || empty($admin_password2))
    {
        $_SESSION['install_data_error']="Oba pola haseł muszą być wypełnione!";
        fwrite($log, $date = date('d/m/Y h:i:s a', time())." : One or both of passwords fields are empty : WARNING\r\n");
        fclose($log);
        header("Location: install_data.php");
        exit();
    }
    // CHECK BOTH NEW PASSWORDS
    if(strcmp($admin_password, $admin_password2) !== 0)
    {
        $_SESSION['install_data_error']="Hasła nie zgadzają się!";
        fwrite($log, $date = date('d/m/Y h:i:s a', time())." : Passwords don't match to each other : WARNING\r\n");
        fclose($log);
        header("Location: install_data.php");
        exit();
    }
    // CHECH PASSWORD REQIREMENTS
    $uppercase = preg_match('@[A-Z]@', $admin_password);
    $lowercase = preg_match('@[a-z]@', $admin_password);
    $number    = preg_match('@[0-9]@', $admin_password);
    if(!$uppercase || !$lowercase || !$number || strlen($admin_password) < 8)
    {
        $_SESSION['install_data_error']="Hasło nie spełnia wymagań złożoności!";
        fwrite($log, $date = date('d/m/Y h:i:s a', time())." : Password doesn't meet complexity requirements : WARNING\r\n");
        fclose($log);
        header("Location: install_data.php");
        exit();
    }
    //CHECK EMAIL
    if(!preg_match('/^[a-zA-Z0-9.\-_]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,4}$/', $admin_email))
    {
        $_SESSION['install_data_error'] = "Niepoprawny adres e-mail!";
        fwrite($log, $date = date('d/m/Y h:i:s a', time())." : E-mail address is incorrenct : WARNING\r\n");
        fclose($log);
        header("Location: install_data.php");
        exit();
    }
    fwrite($log, $date = date('d/m/Y h:i:s a', time())." : Installation process begins : COMMUNICATE\r\n");
    // EVERY TEST PASSED
    require_once "../connect.php";
    // CREATE DATABASE STRUCTURE
    $db_create = array(10);
    $db_create[0] = "CREATE TABLE `fp-admins` (
        admin_id int NOT NULL AUTO_INCREMENT,
        login varchar(255) NOT NULL,
        password varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        creation_time timestamp,
        PRIMARY KEY (admin_id)
    );";
    if(!$conn->query($db_create[0]))
    {
        fwrite($log, $date = date('d/m/Y h:i:s a', time())." : Create table fp-admins failed : ERROR\r\n");
        $install_errors++;
    }
    else
    {
        fwrite($log, $date = date('d/m/Y h:i:s a', time())." : Create table fp-admins complete : COMMUNICATE\r\n");
    }
    // CREATE NEW ADMIN
    $admin_password = password_hash($admin_password, PASSWORD_DEFAULT);
    $create_admin = "INSERT INTO `fp-admins` INSERT INTO `panel_admins`(`admin_id`, `admin_login`, `admin_password`, `admin_email`, `admin_permissions`, `admin_create_time`) VALUES ('NULL', '$admin_name', '$admin_password', '$admin_email', '1,1,1,1', NULL);";
    if(!$conn->query($create_admin))
    {
        fwrite($log, $date = date('d/m/Y h:i:s a', time())." : Create new admin as panel primary admin failed : ERROR\r\n");
        $install_errors++;
    }
    else
    {
        fwrite($log, $date = date('d/m/Y h:i:s a', time())." : Create new admin as panel primary admin successful : COMUNICATE\r\n");
    }
    // INSTALL ENDING PROCESS
    if($install_errors == 0)
    {
        fwrite($log, $date = date('d/m/Y h:i:s a', time())." : Installation complete with 0 errors : COMMUNICATE\r\n");
    }
    else
    {
        fwrite($log, $date = date('d/m/Y h:i:s a', time())." : Installation complete with " . $install_errors . " : WARNING\r\n");
        $_SESSION['errors_happened'] = $install_errors;
    }
    fclose($log);
    $installed = fopen("installed.txt", "w");
    $installed_to_save = "Plik weryfikacyjny, usunięcie może powowdować błedy panelu.\r\nVerification file, removal may cause panel errors.";
    fwrite($installed, $installed_to_save);
    fclose($installed);
    header("Location: complete.php");
    exit();
?>