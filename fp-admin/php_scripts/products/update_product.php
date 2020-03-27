<?php
    if(!isset($_POST) || empty($_GET['pid']))
    {
        header("Location: ../../products.php");
        exit();
    }
    else
    {
        session_start();
        require_once  "../permissions/check.php";
        if(check_products() == true)
        {
            require_once "../../connect.php";
            $pid = $_GET['pid'];
            $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = :product_id");
            $stmt->bindParam(":product_id", $pid);
            try
            {
                $stmt->execute();
                $db_data = $stmt->fetch();
                $OK = true;
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
                //CHECK
                if(empty($category_id))
                {
                    $OK = false;
                }
                if(empty($product_name))
                {
                    $OK = false;
                }
                if(empty($product_status))
                {
                    $OK = false;
                }
                if(empty($product_price))
                {
                    $OK = false;
                }
                if(empty($product_sale))
                {
                    $product_sale = 0;
                }
                if(($product_sale == 1) && empty($product_sale_price))
                {
                    $OK = false;
                }
                if(empty($product_amount))
                {
                    $product_amount = 0;
                }
                if($OK == true)
                {
                    $update = $conn->prepare("UPDATE `products` SET `category_id` = ?,`product_name` = ?,`product_desc` = ?,`product_status` = ?,`product_price` = ?,`product_sale` = ?,`product_sale_price` = ?,`product_sale_from` = ?,`product_sale_to` = ?,`product_amount` = ? WHERE product_id = ?");
                    try
                    {
                        $update->execute([$category_id, $product_name, $product_desc, $product_status, $product_price, $product_sale, $product_sale_price, $product_sale_from, $product_sale_to, $product_amount, $pid]);
                        $_SESSION['result'] = "Zaktualizowano pomyślnie!";
                    }
                    catch(Exception $e)
                    {
                        $_SESSION['result'] = "Wystąpił błąd!";
                        echo "<br>".$e;
                    }
                }
                else
                {
                    $_SESSION['result'] = "Wprowadzono puste pola lub niepoprawne dane!";
                }
            }
            catch(Exception $e)
            {
                $_SESSION['result'] = "Wystąpił błąd!";
            }
            unset($conn);
        }
    }
    header("Location: ../../edit_product.php?pid=".$pid);
    exit();
?>