<?php
    session_start();
    require_once "../../connect.php";
    $position_id = $_GET['pid'];
    $imgname = $_GET['icon'];
    if($_GET['sub'] == 0)
    {
        $sql = "UPDATE menu_positions SET position_icon_path = 'default.svg' WHERE position_id = $position_id";
    }
    else
    {
        $sql = "UPDATE menu_subpositions SET subposition_icon_path = 'default.svg' WHERE subposition_id = $position_id";
    }
    try
    {
        $stmt = $conn->query($sql);
        if($imgname != "default.svg")
        {
            unlink("../../img-db/menu_icons/".$imgname);
        }
        $_SESSION['result'] = "Usunięto i przywrócono domyślną ikonę!";
    }
    catch(Exception $e)
    {
        $_SESSION['result'] = "Nie udało się przywrócić ikony!";
    }
    $conn = null;
    header("Location: ../../menu_editor.php");
    exit();
?>