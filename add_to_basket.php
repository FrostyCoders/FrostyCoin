<?php
    require_once "basket.php";
    session_start();
    if(!isset($_SESSION['logged']) || !isset($_GET['category_id']) || !isset($_GET['product_id']))
    {
        header("Location: index.php");
        exit();
    }
    else
    {
        require_once "fp-admin/connect.php";
        $pid = $_GET['product_id'];
        $exist = false;
        $i = 0;
        foreach($_SESSION['basket'] as $item)
        {
            if($item->product_id == $pid)
            {
                $_SESSION['basket'][$i]->amount++;
                $exist = true;
            }
            $i++;
        }
        if($exist == false)
        {
            if(!isset($_SESSION['basket']))
            {
                $_SESSION['basket'] = array(new element_koszyka($pid, $conn));
                $_SESSION['result'] = "Udało się dodać do koszyka!";
            }
            else
            {
                if(array_push($_SESSION['basket'], new element_koszyka($pid, $conn)))
                {
                    $_SESSION['result'] = "Udało się dodać do koszyka!";
                }
                else
                {
                    $_SESSION['result'] = "Wystąpił błąd!";
                }
            }
        }
        else
        {
            $_SESSION['result'] = "Pomyślnie zwiększono ilość!";
        }
        $cat_id = $_GET['category_id'];
    }
    header("Location: szablon.php?category_id=".$cat_id);
    exit();
?>