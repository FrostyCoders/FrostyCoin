<?php
    session_start();
    require_once  "../permissions/check.php";
    if(check_products() == true)
    {
        require_once "../../connect.php";
        $category_id = $_GET['cat_id'];
        $stmt = $conn->prepare("DELETE FROM product_categories WHERE category_id = :id");
        $stmt->bindParam(':id', $category_id);
        try
        {
            $stmt->execute();
            $_SESSION['result'] = "Usunięto pomyślnie!";
        }
        catch(Exception $e)
        {
            $_SESSION['result'] = "Wystąpił błąd!";
        }
        $conn = null;
    }
    header("Location: ../../product_categories.php");
    exit();
?>