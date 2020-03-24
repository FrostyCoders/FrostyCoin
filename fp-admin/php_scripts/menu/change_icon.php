<?php
    session_start();
    require_once "../../connect.php";
    $OK = true;
    $position_id = $_GET['pid'];
    $position_icon = $_FILES['position_icon'];
    $image_name = $position_icon['name'];
    $image_tmp_name = $position_icon['tmp_name'];
    $image_size = $position_icon['size'];
    $image_error = $position_icon['error'];
    $image_type = $position_icon['type'];
    if($image_size == 0 || $image_error == 4)
    {
        $_SESSION['result'] = "Nie wybrano pliku do przesłania!";
        $OK = false;
    }
    else
    {
        $file_ext = explode('.', $image_name);
        $file_actual_ext = strtolower(end($file_ext));
        $allow_ext = array('jpg', 'jpeg', 'png', 'bmp', 'gif', 'tiff', 'svg');
        if(in_array($file_actual_ext, $allow_ext))
        {
            if($image_error === 0)
            {
                if($image_size < 2097152)
                {
                    $new_image_name = uniqid('', true).".".$file_actual_ext;
                    $new_image_path = '../../img-db/menu_icons/'.$new_image_name;
                    if(!move_uploaded_file($image_tmp_name, $new_image_path))
                    {
                        $_SESSION['result'] = "Wystąpił błąd!";
                        $OK = false;
                        echo "1";
                    }
                }
                else
                {
                    $_SESSION['result'] = "Plik jest za duży!";
                    $OK = false;
                }
            }
            else
            {
                $_SESSION['result'] = "Wystąpił błąd zwiazany z przesyłanym plikiem!";
                $OK = false;
            }
        }
        else
        {
            $_SESSION['result'] = "Niepoprawny format pliku!";
            $OK = false;
        }
    }
    if($OK == true)
    {
        if($_GET['sub'] == 0)
        {
            $sql_check = "SELECT position_icon_path FROM menu_positions WHERE position_id = :position_id";
        }
        else
        {
            $sql_check = "SELECT subposition_icon_path FROM menu_subpositions WHERE subposition_id = :position_id";
        }
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bindParam(":position_id", $position_id);
        try
        {
            $stmt_check->execute();
            $result = $stmt_check->fetch();
            if($_GET['sub'] == 0)
            {
                $old_icon = $result['position_icon_path'];
            }
            else
            {
                $old_icon = $result['subposition_icon_path'];
            }
            
            if($_GET['sub'] == 0)
            {
                $sql = "UPDATE menu_positions SET position_icon_path = :image_name WHERE position_id = :position_id";
            }
            else
            {
                $sql = "UPDATE menu_subpositions SET subposition_icon_path = :image_name WHERE subposition_id = :position_id";
            }
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":image_name", $new_image_name);
            $stmt->bindParam(":position_id", $position_id);
            try
            {
                $stmt->execute();
                $_SESSION['result'] = "Pomyślnie zmieniono ikonę!";
                if($old_icon != "default.svg")
                {
                    unlink("../../img-db/menu_icons/".$old_icon);
                }
            }
            catch(Exception $e)
            {
                $_SESSION['result'] = "Wystąpił błąd!";
            }
        }
        catch(Exception $e)
        {
            $_SESSION['result'] = "Wystąpił błąd!";
        }
    }
    $conn = null;
    header("Location: ../../menu_editor.php");
    exit();
?>