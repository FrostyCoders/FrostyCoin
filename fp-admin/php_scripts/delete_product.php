<?php
    session_start();
    require_once "../connect.php";
    $product_id = $_GET['pid'];
    $stmt = $conn->prepare("UPDATE products SET product_status = 0 WHERE product_id = :product_id");
    $stmt->bindParam(':product_id', $product_id);
    try
    {
        $stmt->execute();
        $_SESSION['result'] = "Usunięto pomyślnie!";
    }
    catch(Exception $e)
    {
        $_SESSION['result'] = "Wystąpił błąd!";
    }
    header("Location: ../products.php");
    exit();
?>