<?php
require_once "basket.php";
 session_start();

 if (!isset($_SESSION['logged']))
    {
       header('Location: login.php');
       exit();
    }
 if (isset($_POST['basket-reset'])) 
    {
        unset($_SESSION['basket']);
    } 
?>
<!DOCTYPE html>
<html>
<head>
    <!-- META -->
    <meta charset="utf-8">
    <meta name="author" content="FrostCoders">
    <meta name="description" content="Szablon sklepu internetowego">
    <meta name="keywords" content="frosty, coin">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FROSTY COIN</title>
    
    <!-- FAVICON -->
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" />
    
    <!-- STYLE I CZCIONKI -->
    <link rel="stylesheet" type="text/css" href="css/animate.css" />
    <link rel="stylesheet" type="text/css" href="css/orders.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    
    <script src="js/jquery-3.4.1.min.js"> </script>
    <script src="js/smoothscroll.js"> </script>
</head>
<body>
    <?php
        if(isset($_SESSION['result']))
        {
            echo '<div class="result">' . $_SESSION['result'] . '</div>';
            unset($_SESSION['result']);
        }
        else
        {
            echo '<div class="result" style="display: none;"></div>';
        }
    ?>
    <!-- PASEK NAWIGACYJNY -->
    <nav>
        <div class="nav-pasek">
            <div class="nav-logo"><a href="index.php"><img src="img/Logo.png" alt="Logo - obraz zmrożonej monety" /></a></div>
            <div class="nav-zawartosc" onmouseenter="collapse_navp(1);" onmouseleave="hide_navp(1);">
                <div class="nav-zakladka">
                    <a href="order.php">Zamówienia</a>
                </div>
                <div class="nav-ikona">
                    <img class="nav-iconsize" id="icon-navp-js1" src="img/icons/cart-icon.svg">
                </div>
            </div>
            <div class="nav-zawartosc" onmouseenter="collapse_navp(2);" onmouseleave="hide_navp(2);">
                <div class="nav-zakladka">
                    <a href="data.php">Zmiana danych</a>
                </div>
                <div class="nav-ikona">
                    <img class="nav-iconsize" id="icon-navp-js2" src="img/icons/account-icon.svg">
                </div>
            </div>
        </div>
    </nav>
    
    <!-- NAGŁÓWEK -->
    <header>
        <div class="log-header-tlo" id="header">
            <div class="header-beam">
                <div class="header-icon-content"><p>Przejdź do konta.</p></div>
                <div class="header-icon"><a href="data.php"><img class="header-iconsize" src="img/icons/account-icon.svg"></a></div>
                <div class="header-icon-content">
                    <h4>Twoje zakupy:</h4>
                    <div class="basket-hr"></div>
                    <div id="basket-products">
                    <?php
                        if(!isset($_SESSION['logged']))
                        {
                            echo '<div class="basket-product">Aby skorzystać z koszyka,<br/>musisz się najpierw <a href="login.php"><b>zalogować</b></a>!</div>';
                        }
                        else if(isset($_SESSION['basket']))
                        {
                            echo '<table class="basket-table">';
                                echo '<tr>';
                                   echo '<th>Nazwa</th>';
                                   echo '<th>Cena</th>';
                                   echo '<th>Ilość</th>';
                                   echo '<th>Wartość</th>';
                                echo '</tr>';
                            $value_all = 0;
                            foreach($_SESSION['basket'] as $item)
                            {
                                echo '<tr>';
                                   echo '<td>' . $item->product_name . '</td>';
                                   echo '<td>' . $item->price . ' PLN</td>';
                                   echo '<td>' . $item->amount . '</td>';
                                   $value = $item->amount * $item->price;
                                   echo '<td><b>' . $value . ' PLN</b></td>';
                                echo '</tr>';
                                $value_all+=$value;
                            }
                            echo '<tr class="basket-value-all"><td style="text-align: right;" colspan="3">Łącznie:</td><td>'.$value_all.' PLN</td>';
                            echo '</table>';
                            echo '<div class="basket-btn">';
                            echo '<form action="" method="post">';
                            echo '<input type="hidden" name="basket-confirm" value="1">';
                            echo '<input type="submit" id="basket-confirm" value="Zamów!">';
                            echo '</form>';
                            echo '<form action="" method="post">';
                            echo '<input type="hidden" name="basket-reset" value="1">';
                            echo '<input type="submit" id="basket-reset" value="Wyczyść!">';
                            echo '</form>';
                            echo '</div>';
                        }
                        else
                        {
                            echo '<div class="basket-product">Koszyk jest pusty!</div>';
                        }
                    ?>
                    </div>
                </div>
                <div class="header-icon"><img class="header-iconsize" src="img/icons/basket-icon.svg"></div>
                <div class="header-icon-login"><img class="header-iconsize" src="img/icons/login-icon.svg"></div>
            </div>
            <h1 class="log-header-h1">Frosty Coin</h1>
            
        </div>
    </header>
    
    <!-- ZAWARTOŚĆ -->
    <main>
       <div class="droga"><?php echo "<span>Zamówienia użytkownika: ".$_SESSION['user_name']."!"; ?></div>
        <div class="order-main-container">
         <div class="order-container">
             <h2>Twoje zamówienia:</h2>
                 <div class="table-box">
                     <?php
                        require_once "fp-admin/connect.php"; 

                        $setnames = "SET NAMES utf8";
                        $conn->query($setnames);
                     
                        if (isset($_POST['order-cancel'])) 
                        {
                            $sql_cancel = "UPDATE `shop_orders` SET `order_status`=5 WHERE `order_id`=".$_POST['order-cancel']." AND `user_id`=".$_SESSION['id'].";";
                            $res_cancel = $conn -> query($sql_cancel);
                            $_SESSION['result']="Anulowano pomyślnie!";
                        }
                     
                        $sql1 = "SELECT `shop_orders`.*, `order_delivery`.`delivery_name`, `order_status`.`status_name` FROM `shop_orders` INNER JOIN `order_delivery` ON `shop_orders`.`order_delivery`=`order_delivery`.`delivery_id` INNER JOIN `order_status` ON `shop_orders`.`order_status`=`order_status`.`status_id` WHERE `shop_orders`.`user_id`=".$_SESSION['id']." ORDER BY `shop_orders`.`order_date` DESC;";
                     
                        $res1 = $conn -> query($sql1);
                     
                        $count = $res1->rowCount();
                        
                        if($count<1)
                        {
                            echo '<p style="font-size: 200%;">Brak zamówień!</p>';
                        }
                        
                        else
                        {
                            while($row = $res1 -> fetch())
                            {
                                $prices = explode(",", $row['order_prices']);
                                $total_price = array_sum($prices);
                                $product_list = explode(",", $row['order_products']);
                                
                                    echo '<div class="order-item">';
                                    echo '<span><b>Numer zamówienia: </b>'.$row['order_id'].'</span><br>';
                                    echo '<span><b>Data zamówienia: </b>'.date('G:i d.m.Y', strtotime($row['order_date'])).'</span><br>';
                                    echo '<span><b>Zamówione produkty: </b>';
                                    $count_pro = count($product_list);
                                    
                                    foreach($product_list as $product)
                                    {
                                        $product_sql = $conn->query("SELECT product_name FROM products WHERE product_id = ".$product.";"); $products_list2 = $product_sql->fetch();

                                        $count_pro--;
                                        
                                        if($count_pro==0)
                                        {
                                            echo substr($products_list2['product_name'], 0, 35);
                                        }
                                        
                                        else
                                        {
                                            echo substr($products_list2['product_name'], 0, 35).", ";
                                        } 
                                    }
                                
                                    echo '</span><br>';
                                    echo '<span><b>Status: </b>'.$row['status_name'].'</span><br>';
                                    echo '<span><b>Dostawa: </b>'.$row['delivery_name'].'</span><br>';
                                    echo '<span><b>Wartość: </b>'.$total_price.' PLN</span><br>';
                                
                                if($row['order_status']!=5 && $row['order_status']!=4)
                                {
                                    echo '<form action="" method="post">';
                                    echo '<input type="hidden" name="order-cancel" value="'.$row['order_id'].'">';
                                    echo '<input type="submit" id="order-cancel" value="Anuluj">';
                                    echo '</form>';
                                }
                                    echo '</div>';              
                            }
                        }
                        
                     ?>
                 </div>
            </div>
         </div>
      
    </main>
    
    <!-- STOPKA -->
    <footer>
            <div class="footer-beam">
                <div class="copyright">Copyright &copy 2020<br/>Frosty Coders<br/><span class="allrights">Wszelkie prawa zastrzeżone!</span></div>
                <div class="up-arrow"><a href="#header"><img src="img/icons/arrow-up.svg"></a></div>
                <div class="newsletter">
                  <p><b>Newsletter!</b> Nie przegap nadchodzących promocji!</p>
                   <form>
                       <input name="email" class="news-text" placeholder="Twój e-mail">
                       <input class="news-button" type="submit">
                   </form>
                </div>
            </div>
    </footer>
    
    <!-- SKRYPTY -->
    <script src="js/nav.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
<?php
$conn = null;
unset($conn);
exit();
?>