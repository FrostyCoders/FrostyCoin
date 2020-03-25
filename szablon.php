<?php

if (!isset($_COOKIE['stmt_cookie']))
    {
        setcookie('stmt_cookie', 1, time() + (24*3600), "/");
    }

require_once "fp-admin/connect.php";
$product_id = $_GET['category_id'];
$sql_categories = "Select * FROM product_categories WHERE category_id = '$product_id';";
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
    <link rel="stylesheet" type="text/css" href="css/szablon.css" />
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
    <header>
        <div class="sz-header-tlo" id="header">
            <div class="header-beam">
                <div class="header-icon-content">
                    <input type="search" class="input-search" placeholder="Wyszukaj..."/>
                </div>
                <div class="header-icon"><img class="header-iconsize" src="img/icons/search-icon.svg"></div>
                <div class="header-icon-content">
                    <p>Kup cosik, bo braki mamy</p>
                </div>
                <div class="header-icon"><img class="header-iconsize" src="img/icons/basket-icon.svg"></div>
                <div class="header-icon-login"><img class="header-iconsize" src="img/icons/login-icon.svg"></div>
            </div>
            <h1 class="sz-header-h1">Frosty Coin</h1>
            
        </div>
    </header>
    
    <!-- ZAWARTOŚĆ -->
    <main>
      <?php 
      $sql_submit = $conn->query($sql_categories);
      $res = $sql_submit -> fetch();
      ?>
       <div class="droga"><?php echo $res['category_name']; ?></div><!--traceroute-->
        <div class="sz-main-container">
            
            <div class="sz-lista">
              <?php
               $sql_products = "SELECT * FROM products WHERE category_id = '$product_id' AND product_status>0;";
               $sql_products_submit = $conn->query($sql_products);
               $count = $sql_products_submit->rowCount();
               if($count == 0)
               {
                  echo "<p style='color:red; font-size:3rem; margin-left:2rem;' >Brak produktów podanej kategori!</p>";
               }
               else
               {
                  while($res1 = $sql_products_submit -> fetch())
                  {
                    echo "<div class='sz-produkt'>";
                    echo "<div class='sz-produkt-image'>";
                    echo "<div class='promo-photo'><img src='fp-admin/img-db/".$res1['product_image_path']."'onerror='this.src='img/package.png';'></div>";
                    echo "</div>";
                    echo "<div class='sz-produkt-content'>";
                    echo "<div class='sz-produkt-name'>".$res1['product_name']."</div>";
                    echo "<div class='sz-produkt-cena'>".$res1['product_price']." pln</div>";
                    echo "<div class='sz-produkt-opis'>".$res1['product_desc']."</div>";
                    echo "<button class='sz-produkt-dokoszyka' onclick=''>Do Koszyka</button></div>";
                    echo "</div>";
                  }
               }
               ?>
            </div>
        </div>
    </main>
    
    <!-- STOPKA -->
    <footer>
            <div class="footer-beam">
                <div class="copyright"><span>FROSTY CODERS © 2020</span><br/><span class="allrights">Wszelkie prawa zastrzeżone!</span></div>
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
    <script src="js/nav_addition.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>