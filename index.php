<?php
if (!isset($_COOKIE['stmt_cookie']))
    {
        setcookie('stmt_cookie', 1, time() + (24*3600), "/");
    }
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
     <script src="js/footer.js"> </script>
    
    <!-- STYLE I CZCIONKI -->
    <link rel="stylesheet" type="text/css" href="css/animate.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
</head>
<body>
    <!-- PASEK NAWIGACYJNY -->
    <nav>
        <div class="nav-pasek">
            <div class="nav-logo"><a href="index.php"><img src="img/Logo.png" alt="Logo - obraz zmrożonej monety" /></a></div>
            <div class="nav-zawartosc nav-js">
                <div class="nav-zakladka">
                    Komputery PC
                    <div class="nav-podkategorie nav-js-p">
                        <div class="nav-podkategoria">
                        Zestawy PC
                        </div>
                        <div class="nav-podkategoria">
                        Monitory
                        </div>
                        <div class="nav-podkategoria">
                        Akcesoria komputerowe
                        </div>
                    </div>
                </div>
                <div class="nav-ikona">
                    <img class="nav-iconsize" src="img/icons/cube-icon.svg">
                </div>
            </div>
            <div class="nav-zawartosc nav-js">
                <div class="nav-zakladka">
                    Telefony
                    <div class="nav-podkategorie nav-js-p">
                        <div class="nav-podkategoria">
                        Smartfony i telefony
                        </div>
                        <div class="nav-podkategoria">
                        Smartwatche
                        </div>
                        <div class="nav-podkategoria">
                        Nawigacje
                        </div>
                        <div class="nav-podkategoria">
                        Akcesoria
                        </div>
                    </div>
                </div>
                <div class="nav-ikona">
                    <img class="nav-iconsize" src="img/icons/phone-icon.svg">
                </div>
            </div>
            <div class="nav-zawartosc nav-js">
                <div class="nav-zakladka">
                    Laptopy i tablety
                    <div class="nav-podkategorie nav-js-p">
                        <div class="nav-podkategoria">
                        Laptopy
                        </div>
                        <div class="nav-podkategoria">
                        Tablety
                        </div>
                        <div class="nav-podkategoria">
                        E-booki
                        </div>
                        <div class="nav-podkategoria">
                        Akcesoria
                        </div>
                    </div>
                </div>
                <div class="nav-ikona">
                    <img class="nav-iconsize" src="img/icons/laptop-icon.svg">
                </div>
            </div>
            <div class="nav-zawartosc nav-js">
                <div class="nav-zakladka">
                    Podzespoły
                    <div class="nav-podkategorie nav-js-p">
                        <div class="nav-podkategoria">
                        Dyski SSD i HDD
                        </div>
                        <div class="nav-podkategoria">
                        Procesory
                        </div>
                        <div class="nav-podkategoria">
                        Karty graficzne
                        </div>
                        <div class="nav-podkategoria">
                        Kości RAM
                        </div>
                        <div class="nav-podkategoria">
                        Płyty Główne
                        </div>
                        <div class="nav-podkategoria">
                        Obudowy
                        </div>
                        <div class="nav-podkategoria">
                        Zasilacze
                        </div>
                        <div class="nav-podkategoria">
                        Chłodzenia
                        </div>
                        <div class="nav-podkategoria">
                        Akcesoria
                        </div>
                    </div>
                </div>
                <div class="nav-ikona">
                    <img class="nav-iconsize" src="img/icons/podz-icon.svg">
                </div>
            </div>
            <div class="nav-zawartosc nav-js">
                <div class="nav-zakladka">
                    Peryferia
                    <div class="nav-podkategorie nav-js-p">
                        <div class="nav-podkategoria">
                        Drukarki
                        </div>
                        <div class="nav-podkategoria">
                        Urządzenia sieciowe
                        </div>
                        <div class="nav-podkategoria">
                        Myszki
                        </div>
                        <div class="nav-podkategoria">
                        Klawiatury
                        </div>
                        <div class="nav-podkategoria">
                        Słuchawki
                        </div>
                        <div class="nav-podkategoria">
                        Głośniki
                        </div>
                    </div>
                </div>
                <div class="nav-ikona">
                    <img class="nav-iconsize" src="img/icons/printer-icon.svg">
                </div>
            </div>
            <div class="nav-zawartosc nav-js">
                <div class="nav-zakladka">
                    Telewizory i Audio
                    <div class="nav-podkategorie nav-js-p">
                        <div class="nav-podkategoria">
                        TV
                        </div>
                        <div class="nav-podkategoria">
                        Projektory
                        </div>
                        <div class="nav-podkategoria">
                        Audio Domowe
                        </div>
                    </div>
                </div>
                <div class="nav-ikona">
                    <img class="nav-iconsize" src="img/icons/tv-icon.svg">
                </div>
            </div>
            <div class="nav-zawartosc nav-js">
                <div class="nav-zakladka">
                    Oprogramowanie
                    <div class="nav-podkategorie nav-js-p">
                        <div class="nav-podkategoria">
                        Systemy Operacyjne
                        </div>
                        <div class="nav-podkategoria">
                        Oprogramowanie Antywirusowe
                        </div>
                        <div class="nav-podkategoria">
                        Oprogramowanie Biurowe
                        </div>
                        <div class="nav-podkategoria">
                        Oprogramowanie Graficzne
                        </div>
                        <div class="nav-podkategoria">
                        Systemy Sprzedaży
                        </div>
                    </div>
                </div>
                <div class="nav-ikona">
                    <img class="nav-iconsize" src="img/icons/disc-icon.svg">
                </div>
            </div>
        </div>
    </nav>
    
    <!-- NAGŁÓWEK -->
    <header id="header">
        <div class="header-tlo">
            <div class="header-beam">
                <div class="header-icon-content">
                    <input type="search" class="input-search" placeholder="Wyszukaj..."/>
                </div>
                <div class="header-icon"><img class="header-iconsize" src="img/icons/search-icon.svg"></div>
                <div class="header-icon-content">
                    <p>Kup cosik, bo braki mamy</p><!-- XDD zapisz co chcesz -->
                </div>
                <div class="header-icon"><img class="header-iconsize" src="img/icons/basket-icon.svg"></div>
                <div class="header-icon-login"><img class="header-iconsize" src="img/icons/login-icon.svg"></div>
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
                        $sql1_za = "SELECT `product_name`,`product_price`,`product_sale_price`,`product_sale`,`product_sale_from`,`product_sale_to`,`product_amount`,`product_image_path`,`product_on_home` FROM `products` WHERE `product_status`>1 ORDER BY `product_from` DESC LIMIT 1;";
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
                                 // IF PRODUCT ON HOME 1 IS NOT SALE
                                if($row['product_sale']==0)
                                {
                                    $hot = "HOT!";
                                    echo '<div class="main-promo">';
                                    echo '<div class="main-beam">&nbsp;'.$hot.'</div>';
                                    echo '<div class="main-photo"><img src="fp-admin/img-db/'.$row['product_image_path'].'" alt=""></div>';
                                    echo '<div class="main-description"><p>'.$row['product_name'].'</p></div>';
                                    echo '<div class="main-price"><span><b style="color: red;">'.$row['product_price'].' PLN!</b></span></div>';
                                    echo '</div>';
                                }
                                 // IF PRODUCT ON HOME 1 IS SALE
                                else if($row['product_sale']==1 && $fromsec <= $currentdate && $tosec >= $currentdate)
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
                            // IF PRODUCT ON HOME 1 IS NOT SALE
                            if($row['product_sale']==0)
                            {
                                $hot = "HOT!";
                                echo '<div class="main-promo">';
                                echo '<div class="main-beam">&nbsp;'.$hot.'</div>';
                                echo '<div class="main-photo"><img src="fp-admin/img-db/'.$row['product_image_path'].'" alt=""></div>';
                                echo '<div class="main-description"><p>'.$row['product_name'].'</p></div>';
                                echo '<div class="main-price"><span><b style="color: red;">'.$row['product_price'].' PLN!</b></span></div>';
                                echo '</div>';
                            }
                            // IF PRODUCT ON HOME 1 IS SALE
                            else if($row['product_sale']==1 && $fromsec <= $currentdate && $tosec >= $currentdate)
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
                        $sql2_za = "SELECT `product_name`,`product_price`,`product_sale_price`,`product_sale`,`product_sale_from`,`product_sale_to`,`product_amount`,`product_image_path`,`product_on_home` FROM `products` WHERE `product_status`>1 ORDER BY `product_from` DESC LIMIT 1, 1;";
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
                                // IF PRODUCT ON HOME 2 IS NOT SALE
                                if($row['product_sale']==0)
                                {
                                    $hot = "HOT!";
                                    echo '<div style="margin-bottom: 15%" class="little-promo">';
                                    echo '<div class="promo-beam">'.$hot.'</div>';
                                    echo '<div class="promo-photo"><img src="fp-admin/img-db/'.$row['product_image_path'].'" alt=""></div>';
                                    echo '<div class="promo-description"><span class="promo-small-desc">'.$row['product_name'].'</span></div>';
                                    echo '<div class="promo-price"><span class="promo-small-price"><b style="color: red;">'.$row['product_price'].' PLN!</b></span></div>';
                                    echo '</div>';
                                }
                                // IF PRODUCT ON HOME 2 IS SALE
                                else if($row['product_sale']==1 && $fromsec <= $currentdate && $tosec >= $currentdate)
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
                            // IF PRODUCT ON HOME 2 IS NOT SALE
                            if($row['product_sale']==0)
                            {
                                $hot = "HOT!";
                                echo '<div style="margin-bottom: 15%" class="little-promo">';
                                echo '<div class="promo-beam">'.$hot.'</div>';
                                echo '<div class="promo-photo"><img src="fp-admin/img-db/'.$row['product_image_path'].'" alt=""></div>';
                                echo '<div class="promo-description"><span class="promo-small-desc">'.$row['product_name'].'</span></div>';
                                echo '<div class="promo-price"><span class="promo-small-price"><b style="color: red;">'.$row['product_price'].' PLN!</b></span></div>';
                                echo '</div>';
                            }
                            // IF PRODUCT ON HOME 2 IS SALE
                            else if($row['product_sale']==1 && $fromsec <= $currentdate && $tosec >= $currentdate)
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
                        $sql2_za = "SELECT `product_name`,`product_price`,`product_sale_price`,`product_sale`,`product_sale_from`,`product_sale_to`,`product_amount`,`product_image_path`,`product_on_home` FROM `products` WHERE `product_status`>1 ORDER BY `product_from` DESC LIMIT 2, 1;";
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
                                // IF PRODUCT ON HOME 3 IS NOT SALE
                                if($row['product_sale']==0)
                                {
                                    $hot = "HOT!";
                                    echo '<div style="margin-bottom: 15%" class="little-promo">';
                                    echo '<div class="promo-beam">'.$hot.'</div>';
                                    echo '<div class="promo-photo"><img src="fp-admin/img-db/'.$row['product_image_path'].'" alt=""></div>';
                                    echo '<div class="promo-description"><span class="promo-small-desc">'.$row['product_name'].'</span></div>';
                                    echo '<div class="promo-price"><span class="promo-small-price"><b style="color: red;">'.$row['product_price'].' PLN!</b></span></div>';
                                    echo '</div>';
                                }
                                // IF PRODUCT ON HOME 3 IS SALE
                                else if($row['product_sale']==1 && $fromsec <= $currentdate && $tosec >= $currentdate)
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
                            // IF PRODUCT ON HOME 3 IS NOT SALE
                           if($row['product_sale']==0)
                            {
                                $hot = "HOT!";
                                echo '<div style="margin-bottom: 15%" class="little-promo">';
                                echo '<div class="promo-beam">'.$hot.'</div>';
                                echo '<div class="promo-photo"><img src="fp-admin/img-db/'.$row['product_image_path'].'" alt=""></div>';
                                echo '<div class="promo-description"><span class="promo-small-desc">'.$row['product_name'].'</span></div>';
                                echo '<div class="promo-price"><span class="promo-small-price"><b style="color: red;">'.$row['product_price'].' PLN!</b></span></div>';
                                echo '</div>';
                            }
                            // IF PRODUCT ON HOME 3 IS SALE
                            else if($row['product_sale']==1 && $fromsec <= $currentdate && $tosec >= $currentdate)
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
                <div class="copyright" ><span><object class="data" data="fp-admin/footer.txt" type="text/html"></object></span><br/><span class="allrights">Wszelkie prawa zastrzeżone!</span></div>
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
    <script src="js/nav_addition.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/footer.js"></script>
    <script src="js/statement_close.js"></script>
    
</body>
</html>
<?php
exit();
?>