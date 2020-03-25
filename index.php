<?php
error_reporting(0);
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
                        <a href="szablon.php?category_id=1">Zestawy PC</a> 
                        </div>
                        <div class="nav-podkategoria">
                        <a href="szablon.php?category_id=2">Monitory</a> 
                        </div>
                        <div class="nav-podkategoria">
                        <a href="szablon.php?category_id=3">Akcesoria Komputerowe</a> 
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
                        <a href="szablon.php?category_id=4">Smartfony i Telefony</a> 
                        </div>
                        <div class="nav-podkategoria">
                        <a href="szablon.php?category_id=5">Smartwatche</a> 
                        </div>
                        <div class="nav-podkategoria">
                        <a href="szablon.php?category_id=6">Nawigacje</a> 
                        </div>
                        <div class="nav-podkategoria">
                        <a href="szablon.php?category_id=7">Akcesoria</a> 
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
                        <a href="szablon.php?category_id=8">Laptopy</a> 
                        </div>
                        <div class="nav-podkategoria">
                        <a href="szablon.php?category_id=9">Tablety</a> 
                        </div>
                        <div class="nav-podkategoria">
                        <a href="szablon.php?category_id=10">E-booki</a> 
                        </div>
                        <div class="nav-podkategoria">
                        <a href="szablon.php?category_id=11">Akcesoria</a> 
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
                        <a href="szablon.php?category_id=12">Dyski SSD I HDD</a> 
                        </div>
                        <div class="nav-podkategoria">
                        <a href="szablon.php?category_id=13">Procesory</a> 
                        </div>
                        <div class="nav-podkategoria">
                        <a href="szablon.php?category_id=14">Karty graficzne</a> 
                        </div>
                        <div class="nav-podkategoria">
                        <a href="szablon.php?category_id=15">Kości RAM</a> 
                        </div>
                        <div class="nav-podkategoria">
                        <a href="szablon.php?category_id=16">Płyty główne</a> 
                        </div>
                        <div class="nav-podkategoria">
                        <a href="szablon.php?category_id=17">Obudowy</a> 
                        </div>
                        <div class="nav-podkategoria">
                        <a href="szablon.php?category_id=18">Zasilacze</a> 
                        </div>
                        <div class="nav-podkategoria">
                        <a href="szablon.php?category_id=19">Chłodzenia</a> 
                        </div>
                        <div class="nav-podkategoria">
                        <a href="szablon.php?category_id=20">Akcesoria</a> 
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
                        <a href="szablon.php?category_id=21">Drukarki</a> 
                        </div>
                        <div class="nav-podkategoria">
                        <a href="szablon.php?category_id=22">Urządzenia sieciowe</a> 
                        </div>
                        <div class="nav-podkategoria">
                        <a href="szablon.php?category_id=23">Myszki</a> 
                        </div>
                        <div class="nav-podkategoria">
                        <a href="szablon.php?category_id=24">Klawiatury</a> 
                        </div>
                        <div class="nav-podkategoria">
                        <a href="szablon.php?category_id=25">Słuchawki</a> 
                        </div>
                        <div class="nav-podkategoria">
                        <a href="szablon.php?category_id=26">Głośniki</a> 
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
                        <a href="szablon.php?category_id=27">TV</a> 
                        </div>
                        <div class="nav-podkategoria">
                        <a href="szablon.php?category_id=28">Projektory</a> 
                        </div>
                        <div class="nav-podkategoria">
                        <a href="szablon.php?category_id=29">Audio Domowe</a> 
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
                        <a href="szablon.php?category_id=30">Systemy Operacyjne</a> 
                        </div>
                        <div class="nav-podkategoria">
                        <a href="szablon.php?category_id=31">Oprogramowanie antywirusowe</a> 
                        </div>
                        <div class="nav-podkategoria">
                        <a href="szablon.php?category_id=32">Oprogramowanie biurowe</a> 
                        </div>
                        <div class="nav-podkategoria">
                        <a href="szablon.php?category_id=33">Oprogramowanie graficzne</a> 
                        </div>
                        <div class="nav-podkategoria">
                        <a href="szablon.php?category_id=34">Systemy sprzedaży</a> 
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
                    $conn = null;
                } 
            }
        
            else
            {
                $conn = null;
                unset($conn);
            }
            $conn = null;
            unset($conn);
        ?>
    </header>
    
    <!-- ZAWARTOŚĆ -->
    <main>
        <div class="main-container">
            <div id="promotion" class="promotion">
                <div class="main-promo">
                    <div class="main-beam">&nbsp;HOT!</div>
                    <div class="main-photo"><img src="#" onerror="this.src='img/package.png';"></div>
                    <div class="main-description"><p>Projekt CIEZOBKA</p></div>
                    <div class="main-price"><span><b style="color: red;">5000zł! </b><sup><s style="color: lightgray;">8000zł</s></sup></span></div>
                </div>
                <div class="forlittlepromo">
                     <div style="margin-bottom: 15%" class="little-promo">
                        <div class="promo-beam">15%</div>
                        <div class="promo-photo"><img src="#" onerror="this.src='img/package.png';"></div>
                        <div class="promo-description"><span class="promo-small-desc">Laptop Asus!</span></div>
                        <div class="promo-price"><span class="promo-small-price"><b style="color: red;">3000zł! </b><sup><s style="color: lightgray;">3500zł</s></sup></span></div>
                    </div>
                     <div style="margin-bottom: 15%" class="little-promo">
                        <div class="promo-beam">60%</div>
                        <div class="promo-photo"><img src="#" onerror="this.src='img/package.png';"></div>
                        <div class="promo-description"><span class="promo-small-desc">Pendrive 32GB!</span></div>
                        <div class="promo-price"><span class="promo-small-price"><b style="color: red;">30zł! </b><sup><s style="color: lightgray;">50zł</s></sup></span></div>
                    </div>
                </div>
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