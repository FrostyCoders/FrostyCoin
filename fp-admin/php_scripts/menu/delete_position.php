<?php
    session_start();
    require_once "../../connect.php";
    if(isset($_GET['pid']))
    {
        $position_id = $_GET['pid'];
        $del_icon = $conn->prepare("SELECT position_icon_path FROM menu_positions WHERE position_id = :pid");
        $del_sub_icons = $conn->prepare("SELECT subposition_icon_path FROM menu_subpositions WHERE position_id = :pid");
        $stmt = $conn->prepare("DELETE FROM menu_positions WHERE position_id = :pid");
        $stmt2 = $conn->prepare("DELETE FROM menu_subpositions WHERE position_id = :pid");
        $stmt->bindParam(':pid', $position_id);
        $stmt2->bindParam(':pid', $position_id);
        $del_icon->bindParam(':pid', $position_id);
        $del_sub_icons->bindParam(':pid', $position_id);
        try
        {
            $del_icon->execute();
            $del_icon = $del_icon->fetch();
            $del_sub_icons->execute();
            $stmt->execute();
            $stmt2->execute();
            if($del_icon['position_icon_path'] != "default.svg")
            {
                unlink("../../img-db/menu_icons/".$del_icon['position_icon_path']);
            }
            while($sub_icons = $del_sub_icons->fetch(PDO::FETCH_ASSOC))
            {
                if($sub_icons['subposition_icon_path'] != "default.svg")
                {
                    unlink("../../img-db/menu_icons/".$sub_icons['subposition_icon_path']);
                }
            }
            $_SESSION['result'] = "Usunięto pomyślnie!";
        }
        catch(Exception $e)
        {
            $_SESSION['result'] = "Wystąpił błąd!";
        }
    }
    header("Location: ../../menu_editor.php");
    exit();
?>