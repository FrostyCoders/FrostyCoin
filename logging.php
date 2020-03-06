<?php
    session_start();
    
   if ((!isset($_POST['email_log'])) || (!isset($_POST['password_log'])))
   {
      header('Location: index.php');
   }

    
	require_once "connect.php";

	$conn = new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($conn->connect_errno!=0)
	{
		echo "Error: ".$conn->connect_errno;
	}
	else
	{
		$email_log = $_POST['email_log'];
		$password_log = $_POST['password_log'];
       
        $email_log = htmlentities($email_log, ENT_QUOTES, "UTF-8");
      
       
       if ($result = @$conn->query(sprintf("SELECT * FROM shop_users WHERE user_email='%s'",
         mysqli_real_escape_string($conn, $email_log))))
       {
          $users= $result->num_rows;
          
          if ($users>0)
          {
             $row = $result->fetch_assoc();
             
             if (password_verify($password_log, $row['user_password']))
             {
                

                   $_SESSION['logged'] = true;


                   $_SESSION['id'] = $row['id'];
                   $_SESSION['user_name'] = $row['user_name'];

                   unset($_SESSION['error']);

                   $result->free_result();
                   header('Location: data.php');
             
             }
             else
             {
               $_SESSION['error'] = '<span style="color:red; margin-left:8rem;">Nieprawidłowy email lub hasło! </span> <br />';
               header('Location: login.php');
             }
             
          }
          else
          {
            $_SESSION['error'] = '<span style="color:red; margin-left:8rem;">Nieprawidłowy email lub hasło! </span> <br />';
            header('Location: login.php');
          }
       }
       
		
	
		
		$conn->close();
	}
	
?>