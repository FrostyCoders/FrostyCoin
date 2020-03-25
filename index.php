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
                    $sql1 = "SELECT `product_name`,`product_price`,`product_sale_price`,`product_sale`,`product_image_path` FROM `products` WHERE `product_on_home`=1;";
                    $res1 = $conn->query($sql1);
                    $sql2 = "SELECT `product_name`,`product_price`,`product_sale_price`,`product_sale`,`product_image_path` FROM `products` WHERE `product_on_home`=2;";
                    $res2 = $conn->query($sql2);
                    $sql3 = "SELECT `product_name`,`product_price`,`product_sale_price`,`product_sale`,`product_image_path` FROM `products` WHERE `product_on_home`=3;";
                    $res3 = $conn->query($sql3);
                
                    while($row = $res1 -> fetch())
                        {
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
                            else
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
                            
                        }
                    echo '<div class="forlittlepromo">';
                        while($row = $res2 -> fetch())
                        {
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
                            else
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
                        }
                        while($row = $res3 -> fetch())
                        {
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
                            else
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
                        }
                        echo '</div>';
                    
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