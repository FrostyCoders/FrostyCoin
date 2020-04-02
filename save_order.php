<?php
    require_once "basket.php";
    session_start();
    if(!isset($_SESSION['logged']) || !isset($_POST))
    {
        header("Location: index.php");
        exit();
    }
    else
    {
        $statut = ;
        $delivery = $_POST['delivery'];
        if(empty($delivery) && )
        {
            $_SESSION['result'] = "Wystąpił błąd!"
        }
        else
        {
            $how_many = count($_SESSION['basket']);
            $ids = array();
            $prices = array();
            $amounts = array();
            foreach($_SESSION['basket'] as $item)
            {
                if($item->amount > 0)
                {
                    array_push($ids, $item->product_id);
                    array_push($prices, $item->price);
                    array_push($amounts, $item->amount);
                }
            }
            $ids = implode(",",$ids);
            $prices = implode(",",$prices);
            $amounts = implode(",", $amounts);
            $date_now = date("Y-m-d H:i:s");
            require_once "fp-admin/connect.php";
            $stmt = $conn->prepare("INSERT INTO shop_orders VALUES (NULL, :user_id, :o_date, :prices, :products, :amounts, 1, :delivery, 0)");
            $stmt->bindParam(":o_date", $date_now);
            $stmt->bindParam(":user_id", $_SESSION['id']);
            $stmt->bindParam(":prices", $prices);
            $stmt->bindParam(":products", $ids);
            $stmt->bindParam(":amounts", $amounts);
            $stmt->bindParam(":delivery", $delivery);
            try
            {
                $stmt->execute();
                $_SESSION['result'] = "Pomyślnie złożono zamówienie."
            }
            catch(Exception $e)
            {
                $_SESSION['result'] = "Wystąpił błąd!"
            }
        }
    }
    header("Location: index.php");
    exit();
?>