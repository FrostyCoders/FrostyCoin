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
    <link rel="stylesheet" href="css/other.css">
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
            <a href="menu_editor.php"><div class="menu-element">Menu główne</div></a>
            <a href="#"><div class="menu-element">Strona Główna</div></a>
            <a href="statements.php"><div class="menu-element">Komunikaty strony</div></a>
            <a href="footer.php"><div class="menu-element">Stopka</div></a>
            <a href="product_categories.php"><div class="menu-element">Kategorie produktów</div></a>
            <a href="products.php"><div class="menu-element">Produkty</div></a>
            <a href="#"><div class="menu-element">Podstrony</div></a>
            <a href="orders.php"><div class="menu-element  active">Zamówienia</div></a>
            <a href="users.php"><div class="menu-element">Użytkownicy</div></a>
            <img class="hide_menu" src="img/arrow.png" alt="Close" onclick="closeNav();">
            <p class="copy">Copyright &copy;<br>Frosty Coders - 2020<br>wersja 0.1.0</p>
        </div>
        <div id="main-big_screen" class="menu">
            <a href="main_page.php"><div class="menu-element">Przegląd</div></a>
            <a href="menu_editor.php"><div class="menu-element">Menu główne</div></a>
            <a href="#"><div class="menu-element">Strona Główna</div></a>
            <a href="statements.php"><div class="menu-element">Komunikaty strony</div></a>
            <a href="footer.php"><div class="menu-element">Stopka</div></a>
            <a href="product_categories.php"><div class="menu-element">Kategorie produktów</div></a>
            <a href="products.php"><div class="menu-element">Produkty</div></a>
            <a href="#"><div class="menu-element">Podstrony</div></a>
            <a href="orders.php"><div class="menu-element  active">Zamówienia</div></a>
            <a href="users.php"><div class="menu-element">Użytkownicy</div></a>
            <p class="copy">Copyright &copy;<br>Frosty Coders - 2020<br>wersja 0.1.0</p>
        </div>
        <div id="content" class="content">
            <div id="content-frame" class="content-frame">
                <div class="content-title">
                    Zamówienia
                </div>
                <div class="product_filters">
                    <div class="filter_bracket">
                        Szukaj <br>
                        <input type="text">
                    </div>
                    <div class="filter_bracket">
                        Sortuj według <br>
                        <select name="" id="">
                            <option>Nazwa</option>
                            <option value="">Cena</option>
                            <option value="">Data wprowadzenia</option>
                        </select><br><br>
                        <select name="" id="">
                            <option value="">Rosnąco</option>
                            <option value="">Malejąco</option>
                        </select>
                        
                    </div>
                    <div class="filter_bracket">
                        Zamówień na stronie <br>
                        <select name="" id="">
                            <option value="">20</option>
                            <option value="">50</option>
                            <option value="">100</option>
                            <option value="">Wszystkie</option>
                        </select>
                    </div>
                    <div class="filter_bracket">
                        Data od<br>
                        <input type="date"><br>
                        Do<br>
                        <input type="date">
                    </div>
                    <div class="filter_bracket">
                        Status <br>
                        <select name="" id="">
                            <option value="">Złożono</option>
                            <option value="">Przygotowano</option>
                            <option value="">Wysłano</option>
                            <option value="">Zakończono</option>
                        </select>
                    </div>
                    <button class="accept_filters" style="margin-top: 60px;">Zastosuj filtry</button>
                </div>
                <div class="list_container">
                    <div class="list_bracket list_index" style="margin-bottom: 30px;">
                        <div class="id">Identyfikator</div>
                        <div class="user">Użytkownik</div>
                        <div class="date">Data zamówienia</div>
                        <div class="status">Status</div>
                        <div class="value">Wartość</div>
                        <div class="empty"></div>
                    </div>
                    <div class="list">
                        <div class="list_bracket list_desc">
                            <div class="id">200219123456</div>
                            <div class="user">example87</div>
                            <div class="date">19-02-2020</div>
                            <div class="status">Wysłane</div>
                            <div class="value">1200.00 PLN</div>
                            <div class="empty">
                                <div class="position_control" style="width: auto;">
                                    <button class="control_button">Podgląd</button>
                                </div>
                            </div>
                        </div>
                        <div class="list_bracket list_desc">
                            <div class="id">200217654321</div>
                            <div class="user">example57</div>
                            <div class="date">17-02-2020</div>
                            <div class="status">Zakończono</div>
                            <div class="value">870.00 PLN</div>
                            <div class="empty">
                                <div class="position_control" style="width: auto;">
                                    <button class="control_button">Podgląd</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="js/scripts.js"></script>
</body>
</html>