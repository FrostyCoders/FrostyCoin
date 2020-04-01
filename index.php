<?php
if (!isset($_COOKIE['stmt_cookie']))
    {
        setcookie('stmt_cookie', 1, time() + (24*3600), "/");
    }
session_start();
echo "<script>alert('Niniejsza strona jest projektem stworzonym na zaliczenie oceny, jest tylko nie działającym szablonem i imituje sklep! Za wszelkie niedogodności i pomyłki wynikające z użytkowania strony nie odpowiadamy!');</script>";

?>
<!DOCTYPE html>
<html>
<head>
    <!-- META -->
    <meta charset="utf-8">
    <meta name="author" content="FrostCoders">
    <meta name="description" content="Taaa jest">
    <meta name="keywords" content="frosty, coin">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FROSTY COIN</title>
    
    <!-- FAVICON -->
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" />
    
    <!-- SKRYPTY -->
    <script src="js/jquery-3.4.1.min.js"> </script>
    <script src="js/smoothscroll.js"> </script>
    
    <!-- STYLE I CZCIONKI -->
    <link rel="stylesheet" type="text/css" href="css/animate.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
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
            <?php require_once "menu.php";?>
            </div>
    </nav>
    
    <!-- NAGŁÓWEK -->
    <header id="header">
        <div class="header-tlo">
            <div class="header-beam">
               <div class="header-icon-content"><p>Przejdź do konta.</p></div>
               <div class="header-icon"><a href="data.php"><img class="header-iconsize" src="img/icons/account-icon.svg"></a></div>
                <div class="header-icon-content">
                    <h4>Twoje zakupy:</h4>
                    <p>15 produktów == <span class="basket-price">1234.90 PLN</span></p>
                    <div id="basket-hr"></div>
                    <div id="basket-products">
                    <div class="basket-product"><a href="#">Maxiek</a> == <span class="basket-price">12.90 PLN</span></div>
                    <div class="basket-product"><a href="#">Takie</a> == <span class="basket-price">342.90 PLN</span></div>
                    <div class="basket-product"><a href="#">Brokuly</a> == <span class="basket-price">1332.90 PLN</span></div>
                    <div class="basket-product"><a href="#">Test</a> == <span class="basket-price">122.90 PLN</span></div>
                    <div class="basket-product"><a href="#">Marykasy</a> == <span class="basket-price">112.90 PLN</span></div>
                    <button id="basket-order">Zamów!</button>
                    </div>
                    <!-- TUTAJ KOD WYŚWIETLANIA PRODUKTÓW -->
                    <button id="basket-btn-sz" onclick="collapse_basket();">▼ Rozwiń ▼</button>
                    <button id="basket-btn-del" onclick="hide_basket();">▲ Zwiń ▲</button>
                </div>
                <div class="header-icon"><img class="header-iconsize" src="img/icons/basket-icon.svg"></div>
                <div class="header-icon-login"><a href="logout.php" ><img class="header-iconsize" src="img/icons/login-icon.svg"></a></div>
            </div>
            <h1 class="header-h1">Frosty Coin</h1>
            <p class="header-p">U nas kupisz wszystko co potrzebne, aby wejść z przytupem w przyszłość!</p>
            <button class="header-button"><a href="#promotion">Sprawdź!</a></button>
        </div>
        <?php
            require_once "fp-admin/connect.php"; 
            $setnames = "SET NAMES utf8";
            $conn->query($setnames);
        
            $sql = "SELECT * FROM `statements` ORDER BY `statement_id` DESC LIMIT 1;";
            $result = $conn->query($sql);
            $show = $result -> fetch();
            $title = $show['statement_title'];
            $desc = $show['statement_desc'];
            $status = $show['statement_status'];
            $from = $show['statement_from'];
            $fromsec = strtotime($from);
            $to = $show['statement_to'];
            $tosec = strtotime($to);
            $date = new DateTime();
            $currentdate = $date->getTimestamp();

            if($_COOKIE['stmt_cookie'] == 1)
            {
                if($status == 1 && $fromsec <= $currentdate && $tosec >= $currentdate)
                {
                    echo '<div id="statement-banner" class="statement-banner"><div class="stmt-content">';
                    echo '<div class="stmt-icon"><img class="stmt-iconsize" src="img/icons/alert-circle-outline.svg"></div>';
                    echo '<div class="stmt-text"><h4>'.$title.'</h4>';
                    echo '<p>'.$desc.'</p></div></div>';
                    echo '<div id="statement-close" class="statement-close" title="Zamknij">x</div>';
                }

                else
                {
                    
                } 
            }
        
            else
            {
                
            }
            
        ?>
    </header>
    
    <!-- ZAWARTOŚĆ -->
    <main>
        <div class="main-container">
            <div id="promotion" class="promotion">
                <?php
                // SELECT ON HOME
                    $sql1 = "SELECT `product_name`,`product_price`,`product_sale_price`,`product_sale`,`product_sale_from`,`product_sale_to`,`product_amount`,`product_image_path`,`product_on_home` FROM `products` WHERE `product_on_home`=1 AND `product_status`>1;";
                    $res1 = $conn->query($sql1);
                    $sql2 = "SELECT `product_name`,`product_price`,`product_sale_price`,`product_sale`,`product_sale_from`,`product_sale_to`,`product_amount`,`product_image_path`,`product_on_home` FROM `products` WHERE `product_on_home`=2 AND `product_status`>1;";
                    $res2 = $conn->query($sql2);
                    $sql3 = "SELECT `product_name`,`product_price`,`product_sale_price`,`product_sale`,`product_sale_from`,`product_sale_to`,`product_amount`,`product_image_path`,`product_on_home` FROM `products` WHERE `product_on_home`=3 AND `product_status`>1;";
                    $res3 = $conn->query($sql3);
        
                    $cou1 = $res1->rowCount();
                    $cou2 = $res2->rowCount();
                    $cou3 = $res3->rowCount();
                    
                    $sql_allrec = "SELECT `product_id` FROM `products` WHERE `product_status`>1 LIMIT 3;";
                    $res_allrec = $conn->query($sql_allrec);
                    $cou_allrec = $res_allrec->rowCount();
                
                // IF PRODUCTS IS NULL
                if(($cou_allrec==0 && ($cou1==0 && $cou2==0 && $cou3==0)))
                {
                    echo '<div class="main-promo">';
                    echo '<div class="main-beam">&nbsp;------</div>';
                    echo '<div class="main-photo"><img src="fp-admin/img-db/default.png" alt=""></div>';
                    echo '<div class="main-description"><p>Brak produktu</p></div>';
                    echo '<div class="main-price"><span><b style="color: red;">Brak ceny</b></span></div>';
                    echo '</div>';
                    echo '<div class="forlittlepromo">';
                    echo '<div style="margin-bottom: 15%" class="little-promo">';
                    echo '<div class="promo-beam">---</div>';
                    echo '<div class="promo-photo"><img src="fp-admin/img-db/default.png" alt=""></div>';
                    echo '<div class="promo-description"><span class="promo-small-desc">Brak produktu</span></div>';
                    echo '<div class="promo-price"><span class="promo-small-price"><b style="color: red;">Brak ceny</b></span></div>';
                    echo '</div>';
                    echo '<div style="margin-bottom: 15%" class="little-promo">';
                    echo '<div class="promo-beam">---</div>';
                    echo '<div class="promo-photo"><img src="fp-admin/img-db/default.png" alt=""></div>';
                    echo '<div class="promo-description"><span class="promo-small-desc">Brak produktu</span></div>';
                    echo '<div class="promo-price"><span class="promo-small-price"><b style="color: red;">Brak ceny</b></span></div>';
                    echo '</div>';
                    echo '</div>';
                }
                
                // IF PRODUCTS IS NOT NULL
                else
                {
                    // IF PRODUCT ON HOME 1 IS NULL
                    if($cou1==0)
                    {
                        $sql1_za = "SELECT `product_name`,`product_price`,`product_sale_price`,`product_sale`,`product_sale_from`,`product_sale_to`,`product_amount`,`product_image_path`,`product_on_home` FROM `products` WHERE `product_status`>1 ORDER BY `product_from` ASC LIMIT 1;";
                        $res1_za = $conn->query($sql1_za);
                        $counter1 = $res1_za->rowCount();
                        // IF LATEST 1 PRODUCT NOT EXIST
                        if($counter1==0)
                        {
                            echo '<div class="main-promo">';
                            echo '<div class="main-beam">&nbsp;------</div>';
                            echo '<div class="main-photo"><img src="fp-admin/img-db/default.png" alt=""></div>';
                            echo '<div class="main-description"><p>Brak produktu</p></div>';
                            echo '<div class="main-price"><span><b style="color: red;">Brak ceny</b></span></div>';
                            echo '</div>';
                        }
                        // IF LATEST 1 PRODUCT EXIST
                        else
                        {
                            while($row = $res1_za -> fetch())
                             {
                                $fromsec = strtotime($row['product_sale_from']);
                                $tosec = strtotime($row['product_sale_to']);
                                
                                // IF PRODUCT ON HOME 1 IS SALE
                                if($row['product_sale']==1 && $fromsec <= $currentdate && $tosec >= $currentdate && $row['product_amount']>0)
                                {
                                    $hot = 1-round($row['product_sale_price']/$row['product_price'], 2);
                                    $hot = $hot*100;
                                    echo '<div class="main-promo">';
                                    echo '<div class="main-beam">&nbsp;-'.$hot.'%</div>';
                                    echo '<div class="main-photo"><img src="fp-admin/img-db/'.$row['product_image_path'].' alt=""></div>';
                                    echo '<div class="main-description"><p>'.$row['product_name'].'</p></div>';
                                    echo '<div class="main-price"><span><b style="color: red;">'.$row['product_sale_price'].' PLN!<sup><s style="color: lightgray;">'.$row['product_price'].' PLN</s></sup></b></span></div>';
                                    echo '</div>';
                                }
                                // IF PRODUCT ON HOME 1 IS SOLD OUT
                                else if($row['product_amount']<=0)
                                {
                                    $hot = 1-round($row['product_sale_price']/$row['product_price'], 2);
                                    $hot = $hot*100;
                                    echo '<div class="main-promo">';
                                    echo '<div class="main-beam">&nbsp;-'.$hot.'%</div>';
                                    echo '<div class="main-photo"><img src="fp-admin/img-db/'.$row['product_image_path'].' alt=""></div>';
                                    echo '<div class="main-description"><p>'.$row['product_name'].'</p></div>';
                                    echo '<div class="main-price"><span><b style="color: red;">Wyprzedane!</b></span></div>';
                                    echo '</div>';
                                }
                                // IF PRODUCT ON HOME 1 IS NOT SALE
                                else
                                {
                                    $hot = "HOT!";
                                    echo '<div class="main-promo">';
                                    echo '<div class="main-beam">&nbsp;'.$hot.'</div>';
                                    echo '<div class="main-photo"><img src="fp-admin/img-db/'.$row['product_image_path'].'" alt=""></div>';
                                    echo '<div class="main-description"><p>'.$row['product_name'].'</p></div>';
                                    echo '<div class="main-price"><span><b style="color: red;">'.$row['product_price'].' PLN!</b></span></div>';
                                    echo '</div>';
                                }
                             }
                        }
      
                    }
                    // IF PRODUCT ON HOME 1 IS NOT NULL
                    else
                    {
                        while($row = $res1 -> fetch())
                        {
                            $fromsec = strtotime($row['product_sale_from']);
                            $tosec = strtotime($row['product_sale_to']);
                            
                            // IF PRODUCT ON HOME 1 IS SALE
                            if($row['product_sale']==1 && $fromsec <= $currentdate && $tosec >= $currentdate && $row['product_amount']>0)
                            {
                                $hot = 1-round($row['product_sale_price']/$row['product_price'], 2);
                                $hot = $hot*100;
                                echo '<div class="main-promo">';
                                echo '<div class="main-beam">&nbsp;-'.$hot.'%</div>';
                                echo '<div class="main-photo"><img src="fp-admin/img-db/'.$row['product_image_path'].' alt=""></div>';
                                echo '<div class="main-description"><p>'.$row['product_name'].'</p></div>';
                                echo '<div class="main-price"><span><b style="color: red;">'.$row['product_sale_price'].' PLN!<sup><s style="color: lightgray;">'.$row['product_price'].' PLN</s></sup></b></span></div>';
                                echo '</div>';
                            }
                            // IF PRODUCT ON HOME 1 IS SOLD OUT
                            else if($row['product_amount']<=0)
                            {
                                $hot = 1-round($row['product_sale_price']/$row['product_price'], 2);
                                $hot = $hot*100;
                                echo '<div class="main-promo">';
                                echo '<div class="main-beam">&nbsp;-'.$hot.'%</div>';
                                echo '<div class="main-photo"><img src="fp-admin/img-db/'.$row['product_image_path'].' alt=""></div>';
                                echo '<div class="main-description"><p>'.$row['product_name'].'</p></div>';
                                echo '<div class="main-price"><span><b style="color: lightgray;">Wyprzedane!</b></span></div>';
                                echo '</div>';
                            }
                            // IF PRODUCT ON HOME 1 IS NOT SALE
                            else
                            {
                                $hot = "HOT!";
                                echo '<div class="main-promo">';
                                echo '<div class="main-beam">&nbsp;'.$hot.'</div>';
                                echo '<div class="main-photo"><img src="fp-admin/img-db/'.$row['product_image_path'].'" alt=""></div>';
                                echo '<div class="main-description"><p>'.$row['product_name'].'</p></div>';
                                echo '<div class="main-price"><span><b style="color: red;">'.$row['product_price'].' PLN!</b></span></div>';
                                echo '</div>';
                                
                            }
                        }
                    }
                    
                    echo '<div class="forlittlepromo">';
                    // IF PRODUCT ON HOME 2 IS NULL
                    if($cou2==0)
                    {
                        $sql2_za = "SELECT `product_name`,`product_price`,`product_sale_price`,`product_sale`,`product_sale_from`,`product_sale_to`,`product_amount`,`product_image_path`,`product_on_home` FROM `products` WHERE `product_status`>1 ORDER BY `product_from` ASC LIMIT 1, 1;";
                        $res2_za = $conn->query($sql2_za);
                        $counter2 = $res2_za->rowCount();
                        // IF LATEST 2 PRODUCT NOT EXIST
                        if($counter2==0)
                        {
                            echo '<div style="margin-bottom: 15%" class="little-promo">';
                            echo '<div class="promo-beam">---</div>';
                            echo '<div class="promo-photo"><img src="fp-admin/img-db/default.png" alt=""></div>';
                            echo '<div class="promo-description"><span class="promo-small-desc">Brak produktu</span></div>';
                            echo '<div class="promo-price"><span class="promo-small-price"><b style="color: red;">Brak ceny</b></span></div>';
                            echo '</div>';
                        }
                        // IF LATEST 2 PRODUCT EXIST
                        else
                        {
                            while($row = $res2_za -> fetch())
                            {
                                $fromsec = strtotime($row['product_sale_from']);
                                $tosec = strtotime($row['product_sale_to']);
                                
                                // IF PRODUCT ON HOME 2 IS SALE
                                if($row['product_sale']==1 && $fromsec <= $currentdate && $tosec >= $currentdate && $row['product_amount']>0)
                                {
                                    $hot = 1-round($row['product_sale_price']/$row['product_price'], 2);
                                    $hot = $hot*100;
                                    echo '<div style="margin-bottom: 15%" class="little-promo">';
                                    echo '<div class="promo-beam">-'.$hot.'%</div>';
                                    echo '<div class="promo-photo"><img src="fp-admin/img-db/'.$row['product_image_path'].'" alt=""></div>';
                                    echo '<div class="promo-description"><span class="promo-small-desc">'.$row['product_name'].'</span></div>';
                                    echo '<div class="promo-price"><span class="promo-small-price"><b style="color: red;">'.$row['product_sale_price'].'! PLN<sup><s style="color: lightgray;">'.$row['product_price'].' PLN</s></sup></b></span></div>';
                                    echo '</div>';
                                }
                                // IF PRODUCT ON HOME 2 IS SOLD OUT
                                else if($row['product_amount']<=0)
                                {
                                    $hot = 1-round($row['product_sale_price']/$row['product_price'], 2);
                                    $hot = $hot*100;
                                    echo '<div style="margin-bottom: 15%" class="little-promo">';
                                    echo '<div class="promo-beam">-'.$hot.'%</div>';
                                    echo '<div class="promo-photo"><img src="fp-admin/img-db/'.$row['product_image_path'].'" alt=""></div>';
                                    echo '<div class="promo-description"><span class="promo-small-desc">'.$row['product_name'].'</span></div>';
                                    echo '<div class="promo-price"><span class="promo-small-price"><b style="color: lightgray;">Wyprzedane!</b></span></div>';
                                    echo '</div>';
                                }
                                // IF PRODUCT ON HOME 2 IS NOT SALE
                                else
                                {
                                    $hot = "HOT!";
                                    echo '<div style="margin-bottom: 15%" class="little-promo">';
                                    echo '<div class="promo-beam">'.$hot.'</div>';
                                    echo '<div class="promo-photo"><img src="fp-admin/img-db/'.$row['product_image_path'].'" alt=""></div>';
                                    echo '<div class="promo-description"><span class="promo-small-desc">'.$row['product_name'].'</span></div>';
                                    echo '<div class="promo-price"><span class="promo-small-price"><b style="color: red;">'.$row['product_price'].' PLN!</b></span></div>';
                                    echo '</div>';
                                }
                            }
                        }
                        
                    }
                    // IF PRODUCT ON HOME 2 IS NOT NULL
                    else
                    {
                        while($row = $res2 -> fetch())
                        {
                            $fromsec = strtotime($row['product_sale_from']);
                            $tosec = strtotime($row['product_sale_to']);
                            
                           // IF PRODUCT ON HOME 2 IS SALE
                            if($row['product_sale']==1 && $fromsec <= $currentdate && $tosec >= $currentdate && $row['product_amount']>0)
                            {
                                $hot = 1-round($row['product_sale_price']/$row['product_price'], 2);
                                $hot = $hot*100;
                                echo '<div style="margin-bottom: 15%" class="little-promo">';
                                echo '<div class="promo-beam">-'.$hot.'%</div>';
                                echo '<div class="promo-photo"><img src="fp-admin/img-db/'.$row['product_image_path'].'" alt=""></div>';
                                echo '<div class="promo-description"><span class="promo-small-desc">'.$row['product_name'].'</span></div>';
                                echo '<div class="promo-price"><span class="promo-small-price"><b style="color: red;">'.$row['product_sale_price'].'! PLN<sup><s style="color: lightgray;">'.$row['product_price'].' PLN</s></sup></b></span></div>';
                                echo '</div>';
                            }
                            // IF PRODUCT ON HOME 2 IS SOLD OUT
                            else if($row['product_amount']<=0)
                            {
                                $hot = 1-round($row['product_sale_price']/$row['product_price'], 2);
                                $hot = $hot*100;
                                echo '<div style="margin-bottom: 15%" class="little-promo">';
                                echo '<div class="promo-beam">-'.$hot.'%</div>';
                                echo '<div class="promo-photo"><img src="fp-admin/img-db/'.$row['product_image_path'].'" alt=""></div>';
                                echo '<div class="promo-description"><span class="promo-small-desc">'.$row['product_name'].'</span></div>';
                                echo '<div class="promo-price"><span class="promo-small-price"><b style="color: lightgray;">Wyprzedane!</b></span></div>';
                                echo '</div>';
                            }
                            // IF PRODUCT ON HOME 2 IS NOT SALE
                            else
                            {
                                $hot = "HOT!";
                                echo '<div style="margin-bottom: 15%" class="little-promo">';
                                echo '<div class="promo-beam">'.$hot.'</div>';
                                echo '<div class="promo-photo"><img src="fp-admin/img-db/'.$row['product_image_path'].'" alt=""></div>';
                                echo '<div class="promo-description"><span class="promo-small-desc">'.$row['product_name'].'</span></div>';
                                echo '<div class="promo-price"><span class="promo-small-price"><b style="color: red;">'.$row['product_price'].' PLN!</b></span></div>';
                                echo '</div>';
                            }
                        }
                    }
                    // IF PRODUCT ON HOME 3 IS NULL    
                    if($cou3==0)
                    {
                        $sql2_za = "SELECT `product_name`,`product_price`,`product_sale_price`,`product_sale`,`product_sale_from`,`product_sale_to`,`product_amount`,`product_image_path`,`product_on_home` FROM `products` WHERE `product_status`>1 ORDER BY `product_from` ASC LIMIT 2, 1;";
                        $res2_za = $conn->query($sql2_za);
                        $counter2 = $res2_za->rowCount();
                        // IF LATEST 3 PRODUCT NOT EXIST
                        if($counter2==0)
                        {
                            echo '<div style="margin-bottom: 15%" class="little-promo">';
                            echo '<div class="promo-beam">---</div>';
                            echo '<div class="promo-photo"><img src="fp-admin/img-db/default.png" alt=""></div>';
                            echo '<div class="promo-description"><span class="promo-small-desc">Brak produktu</span></div>';
                            echo '<div class="promo-price"><span class="promo-small-price"><b style="color: red;">Brak ceny</b></span></div>';
                            echo '</div>';
                        }
                        // IF LATEST 3 PRODUCT EXIST
                        else
                        {
                            while($row = $res2_za -> fetch())
                            {
                                $fromsec = strtotime($row['product_sale_from']);
                                $tosec = strtotime($row['product_sale_to']);
                                                                
                                // IF PRODUCT ON HOME 3 IS SALE
                                if($row['product_sale']==1 && $fromsec <= $currentdate && $tosec >= $currentdate && $row['product_amount']>0)
                                {
                                    $hot = 1-round($row['product_sale_price']/$row['product_price'], 2);
                                    $hot = $hot*100;
                                    echo '<div style="margin-bottom: 15%" class="little-promo">';
                                    echo '<div class="promo-beam">-'.$hot.'%</div>';
                                    echo '<div class="promo-photo"><img src="fp-admin/img-db/'.$row['product_image_path'].'" alt=""></div>';
                                    echo '<div class="promo-description"><span class="promo-small-desc">'.$row['product_name'].'</span></div>';
                                    echo '<div class="promo-price"><span class="promo-small-price"><b style="color: red;">'.$row['product_sale_price'].'! PLN<sup><s style="color: lightgray;">'.$row['product_price'].' PLN</s></sup></b></span></div>';
                                    echo '</div>';
                                }
                                // IF PRODUCT ON HOME 3 IS SOLD OUT
                                else if($row['product_amount']<=0)
                                {
                                    $hot = 1-round($row['product_sale_price']/$row['product_price'], 2);
                                    $hot = $hot*100;
                                    echo '<div style="margin-bottom: 15%" class="little-promo">';
                                    echo '<div class="promo-beam">-'.$hot.'%</div>';
                                    echo '<div class="promo-photo"><img src="fp-admin/img-db/'.$row['product_image_path'].'" alt=""></div>';
                                    echo '<div class="promo-description"><span class="promo-small-desc">'.$row['product_name'].'</span></div>';
                                    echo '<div class="promo-price"><span class="promo-small-price"><b style="color: lightgray;">Wyprzedane!</b></span></div>';
                                    echo '</div>';
                                }
                                // IF PRODUCT ON HOME 3 IS NOT SALE
                                else
                                {
                                    $hot = "HOT!";
                                    echo '<div style="margin-bottom: 15%" class="little-promo">';
                                    echo '<div class="promo-beam">'.$hot.'</div>';
                                    echo '<div class="promo-photo"><img src="fp-admin/img-db/'.$row['product_image_path'].'" alt=""></div>';
                                    echo '<div class="promo-description"><span class="promo-small-desc">'.$row['product_name'].'</span></div>';
                                    echo '<div class="promo-price"><span class="promo-small-price"><b style="color: red;">'.$row['product_price'].' PLN!</b></span></div>';
                                    echo '</div>';
                                }
                            }
                        } 
                    }
                    // IF PRODUCT ON HOME 3 IS NOT NULL
                    else
                    {
                        while($row = $res3 -> fetch())
                        {
                            $fromsec = strtotime($row['product_sale_from']);
                            $tosec = strtotime($row['product_sale_to']);
                            
                            // IF PRODUCT ON HOME 3 IS SALE
                            if($row['product_sale']==1 && $fromsec <= $currentdate && $tosec >= $currentdate && $row['product_amount']>0)
                            {
                                $hot = 1-round($row['product_sale_price']/$row['product_price'], 2);
                                $hot = $hot*100;
                                echo '<div style="margin-bottom: 15%" class="little-promo">';
                                echo '<div class="promo-beam">-'.$hot.'%</div>';
                                echo '<div class="promo-photo"><img src="fp-admin/img-db/'.$row['product_image_path'].'" alt=""></div>';
                                echo '<div class="promo-description"><span class="promo-small-desc">'.$row['product_name'].'</span></div>';
                                echo '<div class="promo-price"><span class="promo-small-price"><b style="color: red;">'.$row['product_sale_price'].'! PLN<sup><s style="color: lightgray;">'.$row['product_price'].' PLN</s></sup></b></span></div>';
                                echo '</div>';
                            }
                            // IF PRODUCT ON HOME 3 IS SOLD OUT
                            else if($row['product_amount']<=0)
                            {
                                $hot = 1-round($row['product_sale_price']/$row['product_price'], 2);
                                $hot = $hot*100;
                                echo '<div style="margin-bottom: 15%" class="little-promo">';
                                echo '<div class="promo-beam">-'.$hot.'%</div>';
                                echo '<div class="promo-photo"><img src="fp-admin/img-db/'.$row['product_image_path'].'" alt=""></div>';
                                echo '<div class="promo-description"><span class="promo-small-desc">'.$row['product_name'].'</span></div>';
                                echo '<div class="promo-price"><span class="promo-small-price"><b style="color: lightgray;">Wyprzedane!</b></span></div>';
                                echo '</div>';
                            }
                            // IF PRODUCT ON HOME 3 IS NOT SALE
                            else
                            {
                                $hot = "HOT!";
                                echo '<div style="margin-bottom: 15%" class="little-promo">';
                                echo '<div class="promo-beam">'.$hot.'</div>';
                                echo '<div class="promo-photo"><img src="fp-admin/img-db/'.$row['product_image_path'].'" alt=""></div>';
                                echo '<div class="promo-description"><span class="promo-small-desc">'.$row['product_name'].'</span></div>';
                                echo '<div class="promo-price"><span class="promo-small-price"><b style="color: red;">'.$row['product_price'].' PLN!</b></span></div>';
                                echo '</div>';
               
                            }
                        }
                    }
                        echo '</div>';
                }
                    
                    $conn = null;
                    unset($conn);
                ?>
            </div>
        </div>
    </main>
    
    <!-- STOPKA -->
    <footer>
            <div class="footer-beam">
                <div class="copyright" >Copyright &copy<br/>Frosty Coders 2020<br/><span class="allrights">Wszelkie prawa zastrzeżone!</span></div>
                <div class="newsletter">
                  <p><b>Newsletter!</b> Nie przegap nadchodzących promocji!</p>
                   <form>
                       <input name="email" class="news-text" placeholder="Twój e-mail">
                       <input class="news-button" type="submit">
                   </form>
                </div>
                <div class="up-arrow"><a href="#header"><img src="img/icons/arrow-up.svg"></a></div>
            </div>
    </footer>
    
    <!-- SKRYPTY -->
    <script src="js/nav.js"></script>
    <script src="js/statement_close.js"></script>
</body>
</html>
<?php
exit();
?>