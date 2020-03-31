<?php
    session_start();
    if(!isset($_SESSION['fp-online']) || !isset($_GET['aid']))
    {
        $_SESSION['result'] = "Wystąpił błąd!";
        header("Location: ../../users.php");
        exit();
    }
    require_once  "../permissions/check.php";
    if(check_users() == true)
    {
        require_once "../../connect.php";
        $admin_id = $_GET['aid'];
        $stmt = $conn->prepare("DELETE FROM panel_admins WHERE admin_id = :admin_id");
        $stmt->bindParam(':admin_id', $admin_id);
        try
        {
            $stmt->execute();
            $_SESSION['result'] = "Usunięto pomyślnie!";
        }
        catch(Exception $e)
        {
            $_SESSION['result'] = "Wystąpił błąd!";
        }
        unset($conn);
    }
    header("Location: ../../users.php");
    exit();
?>