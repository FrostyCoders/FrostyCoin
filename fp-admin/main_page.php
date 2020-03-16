<?php
    session_start();
    require_once "connect.php";
    require_once "php_scripts/summary.php" ;

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
    
    <style>
     .chart{
         width: 100px;
         height: 100px;
         background: conic-gradient(
         var(--color-theme) 0deg 
             <?php echo $chart; ?>deg, gray <?php echo $chart; ?>deg 360deg
         );
         border-radius: 50%;
         margin: auto
     }
</style>
</head>
<body>
    <header class="row">
        <div class="banner col-12">
            <img class="banner-logo" src="img/logo.png" alt="logo"><label class="banner-system-name">Frosty Panel</label>
            <a href="logout.php" class="banner-logout" title="Wyloguj się"><img src="img/logout.png" alt="logout"></a>
            <a href="settings.php" class="banner-user" title="Ustawienia"><img src="img/user.png" alt="user"><label class="banner-username"><?php echo @$_SESSION['admin_login']?></label></a>
        </div>
    </header>
    <main class="row">
        <div class="collapse_button_show">
            <img src="img/menu_icon.png" alt="MENU" onclick="openNav();"> 
        </div>
        <div id="main-small_screen" class="menu">
            <a href="main_page.php"><div class="menu-element active">Przegląd</div></a>
            <a href="home_page.php"><div class="menu-element">Strona Główna</div></a>
            <a href="statements.php"><div class="menu-element">Komunikaty strony</div></a>
            <a href="footer.php"><div class="menu-element">Stopka</div></a>
            <a href="product_categories.php"><div class="menu-element">Kategorie produktów</div></a>
            <a href="products.php"><div class="menu-element">Produkty</div></a>
            <a href="orders.php"><div class="menu-element">Zamówienia</div></a>
            <a href="users.php"><div class="menu-element">Użytkownicy</div></a>
            <a href="settings.php"><div class="menu-element">Ustawienia</div></a>
            <img class="hide_menu" src="img/arrow.png" alt="Close" onclick="closeNav();">
            <p class="copy">Copyright &copy;<br>Frosty Coders - 2020<br>wersja 0.1.0</p>
        </div>
        <div id="main-big_screen" class="menu">
            <a href="main_page.php"><div class="menu-element active">Przegląd</div></a>
            <a href="home_page.php"><div class="menu-element">Strona Główna</div></a>
            <a href="statements.php"><div class="menu-element">Komunikaty strony</div></a>
            <a href="footer.php"><div class="menu-element">Stopka</div></a>
            <a href="product_categories.php"><div class="menu-element">Kategorie produktów</div></a>
            <a href="products.php"><div class="menu-element">Produkty</div></a>
            <a href="orders.php"><div class="menu-element">Zamówienia</div></a>
            <a href="users.php"><div class="menu-element">Użytkownicy</div></a>
            <a href="settings.php"><div class="menu-element">Ustawienia</div></a>
            <p class="copy">Copyright &copy;<br>Frosty Coders - 2020<br>wersja 0.1.0</p>
        </div>
        <div class="content">
            <div class="content-frame">
                <div class="content-title">Podsumowanie</div>
                <div class="content-main">
                    <div class="stats1">
                        <p>ILOŚCI:</p>
                        <p>Liczba kategorii: <b><?php echo $sum_cat; ?></b></p>
                        <p>Liczba aktywnych zamówień: <b><?php echo $sum_order;?></b></p>
                        <p>Liczba produktów: <b><?php echo $sum_pro;  ?></b></p>
                    </div>
                    <div class="stats2">
                        <p>OSTATNIO DODANE: </p>
                        <table class="last-added">
                            <tr>
                                <th>ID</th><th>Nazwa</th><th style="width: 30%;">Cena</th>
                            </tr>
                            <tr>
                                <td><?php echo  $pro_one_1; ?></td>
                                <td><?php echo  $pro_one_2; ?></td>
                                <td><?php echo  $pro_one_3; ?> PLN</td>
                            </tr>
                            <tr>
                                <td><?php echo  $pro_two_1; ?></td>
                                <td><?php echo  $pro_two_2; ?></td>
                                <td><?php echo  $pro_two_3; ?> PLN</td>                    
                            </tr>
                            <tr>
                                <td><?php echo  $pro_three_1; ?></td>
                                <td><?php echo  $pro_three_2; ?></td>
                                <td><?php echo  $pro_three_3; ?> PLN</td>   
                            </tr>
                        </table>
            
                    </div>
                    <div class="stats3">
                        <p>WKYKORZYSTANIE ZASOBÓW: <?php echo $disc_precent."%" ?> (<?php echo $disc_used."GB /  ". $disc_space."GB" ?>)</p>
                        <div class="chart" >
                        </div>
                    </div>
                    <div class="content-title">Powiadomienia</div>
                    <div class="comunicate">
                        <p>Brak powiadomień.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="js/scripts.js"></script>
</body>
</html>