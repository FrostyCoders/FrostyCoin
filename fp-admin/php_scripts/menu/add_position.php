<?php
    session_start();
    if(!isset($_POST) || !isset($_SESSION['fp-online']))
    {
        header("Location: ../../menu_editor.php");
        exit();
    }
    else
    {
        $position_name = $_POST['position_name'];
        $position_ref = $_POST['position_ref'];
        $position_ref_cat = $_POST['position_ref_cat'];
        $position_icon = $_FILES['position_icon'];
        $OK = true;
        if(strlen($position_name) < 3 || strlen($position_name) > 20 || empty($position_name))
        {
            $OK = false;
        }
        if(empty($position_ref))
        {
            $OK = false;
        }
        if(!file_exists("../../../$position_ref") && $position_ref != "no")
        {
            $OK = false;
        }
        if(empty($position_ref_cat))
        {
            $OK = false;
        }
        if($OK == true)
        {
            $image_name = $position_icon['name'];
            $image_tmp_name = $position_icon['tmp_name'];
            $image_size = $position_icon['size'];
            $image_error = $position_icon['error'];
            $image_type = $position_icon['type'];
            if($image_size == 0 || $image_error == 4)
            {
                $new_image_name = "default.svg";
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
        }
        else
        {
            $_SESSION['result'] = "Wystąpił błąd, sprawdź dane!";
        }
        // INSERT DATA INTO DATABASE
        if($OK == true)
        {
            require_once  "../permissions/check.php";
            if(check_site() == true)
            {
                require_once "../../connect.php";
                $sql = "INSERT INTO `menu_positions`(`position_id`, `position_name`, `position_reference_to`, `position_cat_reference`, `position_icon_path`) VALUES (NULL, ?, ?, ?, ?)";
                $add = $conn->prepare($sql);
                try
                {
                    $add->execute([$position_name, $position_ref, $position_ref_cat, $new_image_name]);
                    $_SESSION['result'] = "Dodano pomyślnie!";
                }
                catch(Exception $e)
                {
                    $_SESSION['result'] = "Wystąpił błąd!";
                    echo "<br>".$e;
                    unlink("../../img-db/menu_icons/".$new_image_path);
                }
            }  
        }
        $conn = null;
        header("Location: ../../menu_editor.php");
        exit();
        
    }  
?>