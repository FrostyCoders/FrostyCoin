<?php
    $id_pro = $_GET['id'];
    $id_pro = htmlentities($id_pro, ENT_QUOTES, "UTF-8");
    session_start();
    $id_acc = $_SESSION['id'];

    require_once "fp-admin/connect.php"; 
    $setnames = "SET NAMES utf8";
    $conn->query($setnames);

    $sql_cancel = "UPDATE `shop_orders` SET `order_status`=5 WHERE `order_id`=:id_pro AND `user_id`=:id_acc;";
    $upd = $conn->prepare($sql_cancel, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $upd->execute(array(':id_pro' => $id_pro, ':id_acc' => $id_acc));

    $_SESSION['result']="Anulowano pomyślnie!";

    header("Location: order.php");
?>