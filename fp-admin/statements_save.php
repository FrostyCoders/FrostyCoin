<?php
    
    session_start();
    if(!isset($_SESSION['fp-online']))
    {
        header("Location: index.php");
        exit();
    }

    error_reporting(0);

    require_once "connect.php"; 

    $setnames = "SET NAMES utf8";
    $conn->query($setnames);

    $mod = $_POST['mod'];
    $mod = htmlentities($mod, ENT_QUOTES, "UTF-8");
    $activation = $_POST['activation'];
    $activation = htmlentities($activation, ENT_QUOTES, "UTF-8");

    $title = $_POST['statement_title'];
    $title = htmlentities($title, ENT_QUOTES, "UTF-8");

    $desc = $_POST['statement_desc'];
    $desc = htmlentities($desc, ENT_QUOTES, "UTF-8");

    $datefrom = $_POST['statement_from'];
    $datefrom = htmlentities($datefrom, ENT_QUOTES, "UTF-8");
    $datefromsec = strtotime($datefrom);

    $dateto = $_POST['statement_to'];
    $dateto = htmlentities($dateto, ENT_QUOTES, "UTF-8");
    $datetosec = strtotime($dateto);

    $user = $_SESSION['admin_id'];
    $user = htmlentities($user, ENT_QUOTES, "UTF-8");
    
// MOD

if(!empty($_POST['statement_title'] && $_POST['statement_desc'] && $_POST['statement_from'] && $_POST['statement_to'])) 
{
    if($mod != NULL && $datetosec>$datefromsec)
    {
        if($activation != NULL)
        {
            $inactive = "UPDATE `statements` SET `statement_status`=0";
            $inactive = $conn->query($inactive);
            $update = "UPDATE `statements` SET `statement_title`= :title, `statement_desc`= :desc, `statement_status`=1, `statement_from`= :datefrom, `statement_to`= :dateto, `statement_creation_time`=NULL, `statement_creator`= :user ORDER BY `statement_id` DESC LIMIT 1;";
            $upd = $conn->prepare($update, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $upd->execute(array(':title' => $title, ':desc' => $desc, ':datefrom' => $datefrom, ':dateto' => $dateto, ':user' => $user));
        }
        else if($activation == NULL)
        {
            $inactive = "UPDATE `statements` SET `statement_status`=0";
            $inactive = $conn->query($inactive);
            $update = "UPDATE `statements` SET `statement_title`= :title, `statement_desc`= :desc, `statement_status`=0, `statement_from`= :datefrom, `statement_to`= :dateto, `statement_creation_time`=NULL, `statement_creator`= :user ORDER BY `statement_id` DESC LIMIT 1;";
            $upd = $conn->prepare($update, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $upd->execute(array(':title' => $title, ':desc' => $desc, ':datefrom' => $datefrom, ':dateto' => $dateto, ':user' => $user));
        }
        else
        {
            $conn = null;
            unset($conn);
            header("Location: statements.php");
            exit();
        }
        header("Location: statements.php");
    }

// INSERT
    else if($mod == NULL && $datetosec>$datefromsec)
    {
        if($activation != NULL)
        {
            $inactive = "UPDATE `statements` SET `statement_status`=0";
            $inactive = $conn->query($inactive);
            $insert = "INSERT INTO `statements` (`statement_id`, `statement_title`, `statement_desc`, `statement_status`, `statement_from`, `statement_to`, `statement_creation_time`, `statement_creator`)
            VALUES (NULL, :title, :desc, '1', :datefrom, :dateto, NULL, :user);";
            $ins = $conn->prepare($insert, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $ins->execute(array(':title' => $title, ':desc' => $desc, ':datefrom' => $datefrom, ':dateto' => $dateto, ':user' => $user));
        }
        else if($activation == NULL)
        {
            $inactive = "UPDATE `statements` SET `statement_status`=0";
            $inactive = $conn->query($inactive);
            $insert = "INSERT INTO `statements` (`statement_id`, `statement_title`, `statement_desc`, `statement_status`, `statement_from`, `statement_to`, `statement_creation_time`, `statement_creator`)
            VALUES (NULL, :title, :desc, '0', :datefrom, :dateto, NULL, :user);";
            $ins = $conn->prepare($insert, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $ins->execute(array(':title' => $title, ':desc' => $desc, ':datefrom' => $datefrom, ':dateto' => $dateto, ':user' => $user));
        }
        else
        {
            $conn = null;
            unset($conn);
            header("Location: statements.php");
            exit();
        }
        header("Location: statements.php");
    }

    else
    {
        $conn = null;
        unset($conn);
        header("Location: statements.php");
        exit();
    }
    
    $conn = null;
    unset($conn);
    header("Location: statements.php");
    exit();
}

else
{
    $conn = null;
    unset($conn);
    header("Location: statements.php");
    exit();
}
?>