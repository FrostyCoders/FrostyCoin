<?php
    session_start();
    if(!isset($_SESSION['fp-online']))
    {
        header("Location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Frosty Panel</title>
    <meta name="author" content="Frosty Coders">
    <link rel="shortcut icon" href="img/icon.png">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <header class="row">
        <div class="banner col-12">
            <img class="banner-logo" src="img/logo.png" alt="logo"><label class="banner-system-name">Frosty Panel</label>
            <a href="logout.php" class="banner-logout" title="Wyloguj się"><img src="img/logout.png" alt="logout"></a>
            <a href="#" class="banner-user" title="Ustawienia"><img src="img/user.png" alt="user"><label class="banner-username"><?php echo @$_SESSION['admin_login']?></label></a>
        </div>
    </header>
    <main class="row">
        <div class="collapse_button_show">
            <img src="img/menu_icon.png" alt="MENU" onclick="openNav();"> 
        </div>
        <div id="main-small_screen" class="menu">
            <a href="#"><div class="menu-element active">Przegląd</div></a>
            <a href="menu_editor.php"><div class="menu-element">Menu główne</div></a>
            <a href="#"><div class="menu-element">Strona Główna</div></a>
            <a href="statements.php"><div class="menu-element">Komunikaty strony</div></a>
            <a href="footer.php"><div class="menu-element">Stopka</div></a>
            <a href="product_categories.php"><div class="menu-element">Kategorie produktów</div></a>
            <a href="products.php"><div class="menu-element">Produkty</div></a>
            <a href="#"><div class="menu-element">Podstrony</div></a>
            <a href="orders.php"><div class="menu-element">Zamówienia</div></a>
            <a href="users.php"><div class="menu-element">Użytkownicy</div></a>
            <img class="hide_menu" src="img/arrow.png" alt="Close" onclick="closeNav();">
            <p class="copy">Copyright &copy;<br>Frosty Coders - 2020<br>wersja 0.1.0</p>
        </div>
        <div id="main-big_screen" class="menu">
            <a href="#"><div class="menu-element active">Przegląd</div></a>
            <a href="menu_editor.php"><div class="menu-element">Menu główne</div></a>
            <a href="#"><div class="menu-element">Strona Główna</div></a>
            <a href="statements.php"><div class="menu-element">Komunikaty strony</div></a>
            <a href="footer.php"><div class="menu-element">Stopka</div></a>
            <a href="product_categories.php"><div class="menu-element">Kategorie produktów</div></a>
            <a href="products.php"><div class="menu-element">Produkty</div></a>
            <a href="#"><div class="menu-element">Podstrony</div></a>
            <a href="orders.php"><div class="menu-element">Zamówienia</div></a>
            <a href="users.php"><div class="menu-element">Użytkownicy</div></a>
            <p class="copy">Copyright &copy;<br>Frosty Coders - 2020<br>wersja 0.1.0</p>
        </div>
        <div class="content">
            <div class="content-frame">
                <div class="content-title">Podsumowanie</div>
                <div class="content-main">
                    <div class="stats1">
                        <p>ILOŚCI:</p>
                        <p>Liczba kategorii: <b>6</b></p>
                        <p>Liczba podkategorii:<b>40</b></p>
                        <p>Liczba produktów: <b>254</b></p>
                    </div>
                    <div class="stats2">
                        <p>OSTATNIO DODANE: </p>
                        <table class="last-added">
                            <tr>
                                <th>ID</th><th>Nazwa</th><th style="width: 30%;">Cena</th>
                            </tr>
                            <tr>
                                <td>254</td><td>Nvidia Geforce RTX 2080</td><td>2900.00 PLN</td>
                            </tr>
                            <tr>
                                <td>252</td><td>Intel Core i5-9440K</td><td>995.00 PLN</td>                      
                            </tr>
                            <tr>
                                <td>253</td><td>Intel Core i7-6700K</td><td>600.00 PLN</td>
                            </tr>
                        </table>
            
                    </div>
                    <div class="stats3">
                        <p>WKYKORZYSTANIE ZASOBÓW: 33% (33GB/100GB)</p>
                        <div class="chart"></div>
                    </div>
                    <div class="content-title">Komunikaty</div>
                    <div class="comunicate">
                        <p>Brak komunikatów.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="js/scripts.js"></script>
</body>
</html>