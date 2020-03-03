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
    <link rel="stylesheet" href="css/categories.css">
    <script src="js/jquery.js"></script>
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
            <a href="main_page.php"><div class="menu-element">Przegląd</div></a>
            <a href="#"><div class="menu-element">Strona Główna</div></a>
            <a href="statements.php"><div class="menu-element">Komunikaty strony</div></a>
            <a href="footer.php"><div class="menu-element">Stopka</div></a>
            <a href="product_categories.php"><div class="menu-element  active">Kategorie produktów</div></a>
            <a href="products.php"><div class="menu-element">Produkty</div></a>
            <a href="orders.php"><div class="menu-element">Zamówienia</div></a>
            <a href="users.php"><div class="menu-element">Użytkownicy</div></a>
            <img class="hide_menu" src="img/arrow.png" alt="Close" onclick="closeNav();">
            <p class="copy">Copyright &copy;<br>Frosty Coders - 2020<br>wersja 0.1.0</p>
        </div>
        <div id="main-big_screen" class="menu">
            <a href="main_page.php"><div class="menu-element">Przegląd</div></a>
            <a href="#"><div class="menu-element">Strona Główna</div></a>
            <a href="statements.php"><div class="menu-element">Komunikaty strony</div></a>
            <a href="footer.php"><div class="menu-element">Stopka</div></a>
            <a href="product_categories.php"><div class="menu-element  active">Kategorie produktów</div></a>
            <a href="products.php"><div class="menu-element">Produkty</div></a>
            <a href="orders.php"><div class="menu-element">Zamówienia</div></a>
            <a href="users.php"><div class="menu-element">Użytkownicy</div></a>
            <p class="copy">Copyright &copy;<br>Frosty Coders - 2020<br>wersja 0.1.0</p>
        </div>
        <div id="content" class="content">
            <div id="content-frame" class="content-frame">
                <div class="content-title">
                    Kategorie produktów
                    <div class="title_buttons">
                        <button id="add_category_button" class="ordinary_button">Dodaj kategorię</button>
                    </div>
                </div>
                <div id="cat_container">
                    <div class="category_bracket">
                        <div class="category_status off" title="Niektywna"></div>
                        <div class="category_name">Kategoria</div>
                        <div class="category_info">Liczba produktów: 234</div>
                        <div class="category_settings">
                            <button>Edytuj</button>
                            <button>Usuń</button>
                        </div>
                    </div>
                    <div class="category_bracket">
                        <div class="category_status on" title="Aktywna"></div>
                        <div class="category_name">Kategoria2</div>
                        <div class="category_info">Liczba produktów: 24</div>
                        <div class="category_settings">
                            <button>Edytuj</button>
                            <button>Usuń</button>
                        </div>
                    </div>
                    <div id="add_category_bracket" class="category_bracket">
                        <div class="category_name" style="padding-left: 8px">Status: <select name="" id=""><option value="">Aktywna</option><option value=""></option>Niektywna</select></div>
                        <div class="category_name" style="padding-left: 8px">Nazwa: <input type="text"></div>
                        <div class="category_settings">
                            <button>Zatwierdź</button>
                            <button id="cancel_add">Anuluj</button>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <script>
            $(document).ready(function(){
                $("#add_category_bracket").hide();
                $("#add_category_button").click(function(){
                    $("#add_category_bracket").fadeIn();
                });
                $("#cancel_add").click(function(){
                    $("#add_category_bracket").fadeOut();
                });
            });
        </script>
        <?php
        echo '<script>$(document).ready(function(){$("#edit_button0").click(function(){ $("#category_show0").hide(); $("#category_edit0").fadeIn(); }); $("#back_button0").click(function(){ $("#category_show0").fadeIn(); $("#category_edit0").hide(); });});</script>';
        ?>
    </main>
    <script src="js/scripts.js"></script>
</body>
</html>