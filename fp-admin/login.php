<?php
    session_start();
	if ((!isset($_POST['fp-login'])) || (!isset($_POST['fp-password'])))
	{
		header('Location: index.php');
		exit();
	}
	require_once "connect.php";
	$login = $_POST['fp-login'];
	$password = $_POST['fp-password'];
    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    $result = $conn->prepare("SELECT * FROM `panel_admins` WHERE admin_login=?");
	if ($result->execute([$login]))
	{
        $how_many_users = $result->rowCount();
		if ($how_many_users>0)
		{
			$admin_data = $result->fetch();
			if(password_verify($password, $admin_data['admin_password']))
			{
                $_SESSION['fp-online'] = true;
                $_SESSION['admin_id'] = $admin_data['admin_id'];
				$_SESSION['admin_login'] = $admin_data['admin_login'];
				$_SESSION['admin_email'] = $admin_data['admin_email'];
				$permission = explode("," ,$admin_data['admin_permissions']);
				$_SESSION['admin_p_users'] = $permission[0];
				$_SESSION['admin_p_products'] = $permission[1];
				$_SESSION['admin_p_site'] = $permission[2]; 
				$_SESSION['admin_p_orders'] = $permission[3]; 
				unset($_SESSION['login_error']);
				unset($conn);
				header('Location: main_page.php');
			}
			else
			{
				$_SESSION['login_error'] = 'Nieprawidłowy login lub hasło!';
				header('Location: index.php');
			}
		}
		else
		{
			$_SESSION['login_error'] = 'Nieprawidłowy login lub hasło!';
			header('Location: index.php');
		}
	}
    unset($conn);
    exit();
?>