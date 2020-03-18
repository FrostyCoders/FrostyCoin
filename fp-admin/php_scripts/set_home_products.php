<?php
    if(!isset($_POST))
    {
        header("Location: ../home_page.php");
        exit();
    }
    session_start();
    require_once "../connect.php";
    $products = array($_POST['sale_1'], $_POST['sale_2'], $_POST['sale_3'], $_POST['sale_4'], $_POST['sale_5']);
    $OK = true;
    for($i = 0; $i < 5; $i++)
    {
        if(!is_numeric($products[$i]))
        {
            $OK = false;
        }
    }
    if($OK == false)
    {
        $_SESSION['result'] = "Wystąpił błąd!";
    }
    else
    {
        for($i = 0; $i < 5; $i++)
        {
            for($j = 0; $j < 5; $j++)
            {
                if($j == $i){continue;}
                if(($products[$i] == $products[$j]) && ($products[$i] != 0))
                {
                    $OK = false;
                }
            }
        }
        if($OK == false)
        {
            $_SESSION['result'] = "Produkty nie mogą się powtarzać!";
        }
        else
        {
            $stmt_del = $conn->prepare("UPDATE products SET product_on_home = 0");
            $stmt = $conn->prepare("UPDATE products SET product_on_home = :position WHERE product_id = :product_id");
            try
            {
                $stmt_del->execute();
                for($i = 1; $i < 6; $i++)
                {
                    $stmt->bindParam(":position", $i);
                    $stmt->bindParam(":product_id", $products[$i-1]);
                    $stmt->execute();
                    $_SESSION['result'] = "Ustawiono pomyślnie!";
                }
            }
            catch(Exception $e)
            {
                $_SESSION['result'] = "Wystąpił błąd!";
            }
        }
    }
    header("Location: ../home_page.php");
    exit();
?>