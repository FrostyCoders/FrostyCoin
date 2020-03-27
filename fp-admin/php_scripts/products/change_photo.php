<?php
    session_start();
    require_once  "../permissions/check.php";
    if(check_products() == true)
    {
        require_once "../../connect.php";
        $OK = true;
        $product_id = $_GET['pid'];
        $product_image = $_FILES['product_image'];
        $image_name = $product_image['name'];
        $image_tmp_name = $product_image['tmp_name'];
        $image_size = $product_image['size'];
        $image_error = $product_image['error'];
        $image_type = $product_image['type'];
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
                        $new_image_path = '../img-db/'.$new_image_name;
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
        if($OK == true)
        {
            $sql_check = "SELECT product_image_path FROM products WHERE product_id = :product_id";
            $stmt_check = $conn->prepare($sql_check);
            $stmt_check->bindParam(":product_id", $product_id);
            try
            {
                $stmt_check->execute();
                $result = $stmt_check->fetch();
                $old_image = $result['product_image_path'];
                $sql = "UPDATE products SET product_image_path = :image_name WHERE product_id = :product_id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":image_name", $new_image_name);
                $stmt->bindParam(":product_id", $product_id);
                try
                {
                    $stmt->execute();
                    $_SESSION['result'] = "Pomyślnie zmieniono zdjęcie!";
                    if($old_image != "default.png")
                    {
                        unlink("../img-db/".$old_image);
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
    }
    header("Location: ../../edit_product.php?pid=$product_id");
    exit();
?>