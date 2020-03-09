<?php
    session_start();
    require_once "../connect.php";
    $cat_status = $_POST['cat_status'];
    $cat_name = $_POST['cat_name'];
    $check = $conn->prepare("SELECT * FROM product_categories WHERE category_name=:cat_name");
    $check->bindParam(':cat_name', $cat_name);
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
            $sql = "INSERT INTO `product_categories` (`category_id`, `category_name`, `category_status`) VALUES (NULL,:cat_name,:cat_status)";
            $result = $conn->prepare($sql);
            $result->bindParam(':cat_name', $cat_name);
            $result->bindParam(':cat_status', $cat_status);
            try
            {
                $result->execute();
                $_SESSION['result'] = "Dodano pomyślnie!";
            }
            catch(Exception $e)
            {
                $_SESSION['result'] = "Błąd operacji!";
            }
        }
    }
    $conn = NULL;
    echo $_SESSION['result'];
    header("Location: ../product_categories.php");
    exit();
?>