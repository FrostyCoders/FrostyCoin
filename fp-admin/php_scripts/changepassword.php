<?php
require_once "../connect.php";
  session_start();
    if (!isset($_SESSION['online'])) 	
    { 		
        header('Location: ../settings.php'); 		
        //exit(); 	
    }
    if (!isset($_POST['o_password']))
    { 		
    header('Location: ../settings.php'); 	
    //exit(); 	
    }
    $admin_id = $_SESSION['admin_id'];
    $o_password = $_POST['o_password'];
    $n_password = $_POST['n_password'];
    $r_password = $_POST['r_password'];
    $_SESSION['negative'] = TRUE;
    //CHECK INPUTS
    if(empty($o_password) || empty($n_password) || empty($r_password))
    {
        $_SESSION['result']="Wszytkie pola muszą być wypełnione!";
        header("Location: ../settings.php");
      
       //exit();
    }
    //CHECK CURRENT PASSWORD
    if($result = $conn->query("SELECT * FROM panel_admins WHERE admin_id=$admin_id"))
    {
        $row = $result->fetch();
        if(!password_verify($o_password, $row['admin_password']))
        {
            $_SESSION['result']="Błędne hasło!";
            header("Location: ../settings.php");
          //  exit();
        }
    }
    else
    {
        $_SESSION['result']="Wystąpił błąd!";
        header("Location: ../settings.php");
       // exit();
    }
    // CHECK BOTH NEW PASSWORDS
    if(strcmp($n_password, $r_password) !== 0)
    {
        $_SESSION['result']="Hasła nie zgadzają się!";

       header("Location: ../index.php"); 
       //exit();
    }
    // CHECH PASSWORD REQIREMENTS
    $uppercase = preg_match('@[A-Z]@', $n_password);
    $lowercase = preg_match('@[a-z]@', $n_password);
    $number    = preg_match('@[0-9]@', $n_password);
    if(!$uppercase || !$lowercase || !$number || strlen($n_password) < 8)
    {
        $_SESSION['result']="Nowe hasło nie spełnia wymagań!";
        $conn=null;
        header("Location: ../settings.php");
       // exit();
    }
    // CHANGE PASSWORD

        $new_pass = password_hash($n_password, PASSWORD_DEFAULT);
        $sql_update = "UPDATE panel_admins SET admin_password = '$new_pass' WHERE admin_id=$admin_id";
         echo $_SESSION['result'];
        if ($conn->query($sql_update) == TRUE) {
            $_SESSION['result'] = "Zaktualizowano hasło!";
            $_SESSION['negative'] = FALSE;
        } else {
            $_SESSION['result'] = "Błąd! Spróbuj ponownie później!";
        }
       $conn = NULL;
        echo $_SESSION['result'];
        header("../settings.php");
        exit();

    

            
    

    ?>
