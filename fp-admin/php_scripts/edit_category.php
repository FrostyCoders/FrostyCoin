<?php
    session_start();
    require_once "../connect.php";
    $id = $_GET['id'];
    $cat_name = $_POST['cat_name'];
    $cat_status = $_POST['cat_status'];
    $check = $conn->prepare("SELECT * FROM product_categories WHERE category_name=:cat_name AND category_id!=:id");
    $check->bindParam(':cat_name', $cat_name);
    $check->bindParam(':id', $id);
    $check->execute();
    if(($check->rowCount()) != 0)
    {
        $_SESSION['result'] = "Kategoria o takiej nazwie już istnieje!";
    }
    else
    {
        if(empty($cat_name))
        {
            $_SESSION['result'] = "Wypełnij pole nazwa!";
        }
        else
        {
            if($cat_status=="active")
            {
                $cat_status = true;
            }
            else
            {
                $cat_status = false;
            }
            $sql = "UPDATE product_categories SET category_name=:cat_name, category_status=:cat_status WHERE category_id=:cat_id";
            $result = $conn->prepare($sql);
            $result->bindParam(':cat_name', $cat_name);
            $result->bindParam(':cat_status', $cat_status);
            $result->bindParam(':cat_id', $id);
            try
            {
                $result->execute();
                $_SESSION['result'] = "Zmodyfikowano pomyślnie!";
            }
            catch(Exception $e)
            {
                $_SESSION['result'] = "Wystąpił błąd!";
                echo $e;
            }
        }
    }
    $conn = NULL;
    header("Location: ../product_categories.php");
    exit();
?>