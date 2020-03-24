<?php
    session_start();
    if(!isset($_POST) || !isset($_SESSION['fp-online']) || !isset($_GET['sub']) || !isset($_GET['pid']))
    {
        $_SESSION['result'] = "Wystąpił błąd!";
        header("Location: ../../menu_editor.php");
        exit();
    }
    else
    {
        require_once "../../connect.php";
        $position_name = $_POST['position_name'];
        $position_ref = $_POST['position_ref'];
        $position_ref_cat = $_POST['position_ref_cat'];
        $position_id = $_GET['pid'];
        $OK = true;
        if(strlen($position_name) < 3 || strlen($position_name) > 20 || empty($position_name))
        {
            $OK = false;
        }
        if(empty($position_ref) && $position_ref != "0")
        {
            $OK = false;
        }
        if(!file_exists("../../../$position_ref"))
        {
            $OK = false;
        }
        if(empty($position_ref_cat) && $position_ref_cat != "0")
        {
            $OK = false;
        }
        if($OK == true)
        {
            if($_GET['sub'] == 0)
            {
                $stmt = $conn->prepare("UPDATE menu_positions SET position_name = ?, position_reference_to = ?, position_cat_reference = ? WHERE position_id = ?");
            }
            else
            {
                $stmt = $conn->prepare("UPDATE menu_subpositions SET subposition_name = ?, subposition_reference_to = ?, subposition_cat_reference = ? WHERE subposition_id = ?");
            }
            try
            {
                $stmt->execute([$position_name, $position_ref, $position_ref_cat, $position_id]);
                $_SESSION['result'] = "Zmodyfikowano pomyślnie!";
            }
            catch(Exception $e)
            {
                $_SESSION['result'] = "Wystąpił błąd!";
            }
        }
        else
        {
            $_SESSION['result'] = "Wystąpił błąd, sprawdź dane!";
        }
        header("Location: ../../menu_editor.php");
        exit();
        
    }
    
?>

