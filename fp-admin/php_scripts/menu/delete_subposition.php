<?php
    session_start();
    require_once "../../connect.php";
    if(isset($_GET['pid']))
    {
        $position_id = $_GET['pid'];
        $del_icon = $conn->prepare("SELECT subposition_icon_path FROM menu_subpositions WHERE subposition_id = :pid");
        $stmt = $conn->prepare("DELETE FROM menu_subpositions WHERE subposition_id = :pid");
        $stmt->bindParam(':pid', $position_id);
        $del_icon->bindParam(':pid', $position_id);
        try
        {
            $del_icon->execute();
            $del_icon = $del_icon->fetch();
            $stmt->execute();
            $_SESSION['result'] = "Usunięto pomyślnie!";
            if($del_icon['subposition_icon_path'] != "default.svg")
            {
                unlink("../../img-db/menu_icons/".$del_icon['subposition_icon_path']);
            }
        }
        catch(Exception $e)
        {
            $_SESSION['result'] = "Wystąpił błąd!";
        }
    }
    header("Location: ../../menu_editor.php");
    exit();
?>