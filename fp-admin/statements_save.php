<?php
    
    session_start();
    if(!isset($_SESSION['fp-online']))
    {
        header("Location: index.php");
        exit();
    }

    error_reporting(0);

    $mod = $_POST['mod'];
    $activation = $_POST['activation'];
    $title = $_POST['statement_title'];
    $desc = $_POST['statement_desc'];
    $datefrom = $_POST['statement_from'];
    $dateto = $_POST['statement_to'];
    $user = $_SESSION['admin_id'];
    
    require_once "connect.php"; 

    $setnames = "SET NAMES utf8";
    $conn->query($setnames);
// MOD

if(!empty($_POST['statement_title'] && $_POST['statement_desc'] && $_POST['statement_from'] && $_POST['statement_to'])) 
{
    if($mod != NULL)
    {
        if($activation != NULL)
        {
            $update = "UPDATE `statements` SET `statement_title`='$title', `statement_desc`='$desc', `statement_status`=1, `statement_from`='$datefrom', `statement_to`='$dateto', `statement_creation_time`=NULL, `statement_creator`='$user' ORDER BY `statement_id` DESC LIMIT 1;";
            $conn->query($update);
        }
        else if($activation == NULL)
        {
            $update = "UPDATE `statements` SET `statement_title`='$title', `statement_desc`='$desc', `statement_status`=0, `statement_from`='$datefrom', `statement_to`='$dateto', `statement_creation_time`=NULL, `statement_creator`='$user' ORDER BY `statement_id` DESC LIMIT 1;";
            $conn->query($update);
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
    else if($mod == NULL)
    {
        if($activation != NULL)
        {
            $insert = "INSERT INTO `statements` (`statement_id`, `statement_title`, `statement_desc`, `statement_status`, `statement_from`, `statement_to`, `statement_creation_time`, `statement_creator`)
            VALUES (NULL, '$title', '$desc', '1', '$datefrom', '$dateto', NULL, '$user');";
            $conn->query($insert);
        }
        else if($activation == NULL)
        {
            $insert = "INSERT INTO `statements` (`statement_id`, `statement_title`, `statement_desc`, `statement_status`, `statement_from`, `statement_to`, `statement_creation_time`, `statement_creator`)
            VALUES (NULL, '$title', '$desc', '0', '$datefrom', '$dateto', NULL, '$user');";
            $conn->query($insert);
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