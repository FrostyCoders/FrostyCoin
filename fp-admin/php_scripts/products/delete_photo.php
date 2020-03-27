<?php
    session_start();
    require_once  "../permissions/check.php";
    if(check_products() == true)
    {
        require_once "../../connect.php";
        $product_id = $_GET['pid'];
        $imgname = $_GET['imgname'];
        $sql = "UPDATE products SET product_image_path = 'default.png' WHERE product_id = $product_id";
        try
        {
            $stmt = $conn->query($sql);
            if($imgname != "default.png")
            {
                unlink("../../img-db/".$imgname);
            }
            $_SESSION['result'] = "Usunięto i przywrócono domyślne zdjęcie!";
        }
        catch(Exception $e)
        {
            $_SESSION['result'] = "Nie udało się przywrócić zdjęcia!";
        }
        unset($conn);
    }
    header("Location: ../../edit_product.php?pid=$product_id");
    exit();
?>