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
        $statut = $_POST['statut'];
        $delivery = $_POST['delivery'];
        if(empty($delivery) && !isset($_POST['statut']))
        {
            $_SESSION['result'] = "Wystąpił błąd!";
        }
        elseif(!isset($_SESSION['basket']))
        {
            $_SESSION['result'] = "Koszyk jest pusty!";
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
            $products = implode(",",$ids);
            $prices = implode(",",$prices);
            $amounts = implode(",", $amounts);
            $date_now = date("Y-m-d H:i:s");
            require_once "fp-admin/connect.php";
            $stmt = $conn->prepare("INSERT INTO shop_orders VALUES (NULL, :user_id, :o_date, :prices, :products, :amounts, 1, :delivery, 0)");
            $stmt2 = $conn->prepare("UPDATE products SET product_amount = product_amount - :p_number WHERE product_id = :pid");
            $stmt->bindParam(":o_date", $date_now);
            $stmt->bindParam(":user_id", $_SESSION['id']);
            $stmt->bindParam(":prices", $prices);
            $stmt->bindParam(":products", $products);
            $stmt->bindParam(":amounts", $amounts);
            $stmt->bindParam(":delivery", $delivery);
            try
            {
                $stmt->execute();
                foreach($_SESSION['basket'] as $item)
                {
                    if($item->amount > 0)
                    {
                        $stmt2->bindParam(":p_number", $item->ammount);
                        $stmt2->bindParam(":pid", $item->product_id);
                        $stmt2->execute();
                    }
                }
                $_SESSION['result'] = "Pomyślnie złożono zamówienie.";
                unset($_SESSION['basket']);
            }
            catch(Exception $e)
            {
                $_SESSION['result'] = "Wystąpił błąd!";
            }
        }
    }
    header("Location: index.php");
    exit();
?>