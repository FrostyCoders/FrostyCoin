<?php
    session_start();
    require_once  "../permissions/check.php";
    if(check_products() == true)
    {
        require_once "../../connect.php";
        $OK = true;
        // CATCH DATA
        $category_id = $_POST['category_id'];
        $product_name = $_POST['product_name'];
        $product_desc = $_POST['product_desc'];
        $product_status = $_POST['product_status'];
        $product_price = $_POST['product_price'];
        $product_sale = $_POST['product_sale'];
        $product_sale_price = $_POST['product_sale_price'];
        $product_sale_from = $_POST['product_sale_from'];
        $product_sale_to = $_POST['product_sale_to'];
        $product_amount = $_POST['product_amount'];
        $product_image = $_FILES['product_image'];
        // VALIDATE DATA
        if(empty($category_id)){$OK = false;}
        if(empty($product_name)){$OK = false;}
        if(empty($product_desc)){$OK = false;}
        if(is_null($product_status)){$OK = false;}
        if(is_null($product_price)){$OK = false;}
        if(is_null($product_sale)){$OK = false;}
        if(empty($product_sale_from)){$product_sale_from = "1000-01-01 00:00:00";}
        if(empty($product_sale_to)){$product_sale_to = "9999-12-31 23:59:59";}
        if(($product_sale == "1") && (empty($product_sale_price))){$OK = false;}
        if(empty($product_sale_price)){$product_sale_price = 0;}
        if(empty($product_desc)){$product_amount = 0;}
        if($OK == false)
        {
            $_SESSION['result'] = "Uzupełnij wymagane pola!";
        }
        else
        {
            // IMAGE
            $image_name = $product_image['name'];
            $image_tmp_name = $product_image['tmp_name'];
            $image_size = $product_image['size'];
            $image_error = $product_image['error'];
            $image_type = $product_image['type'];
            if($image_size == 0 || $image_error == 4)
            {
                $new_image_name = "default.png";
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
                            $new_image_path = '../../img-db/'.$new_image_name;
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
        // INSERT DATA INTO DATABASE
        if($OK == true)
        {
            $sql = "INSERT INTO `products`(`product_id`, `category_id`, `product_name`, `product_desc`, `product_status`, `product_price`, `product_from`, `product_sale`, `product_sale_price`, `product_sale_from`, `product_sale_to`, `product_on_home`, `product_amount`, `product_image_path`) VALUES (NULL,?,?,?,?,?,NULL,?,?,?,?,0,?,?)";
            $add = $conn->prepare($sql);
            try
            {
                $add->execute([$category_id, $product_name, $product_desc, $product_status, $product_price, $product_sale, $product_sale_price, $product_sale_from, $product_sale_to, $product_amount, $new_image_name]);
                $_SESSION['result'] = "Dodano pomyślnie!";
            }
            catch(Exception $e)
            {
                $_SESSION['result'] = "Wystąpił błąd!";
                echo "<br>".$e;
                unlink("../../img-db/".$new_image_path);
            }
        }
        $conn = null;
    }
    header("Location: ../../products.php");
    exit();
?>