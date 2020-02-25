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
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
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
            <a href="menu_editor.php"><div class="menu-element active">Menu główne</div></a>
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
            <a href="main_page.php"><div class="menu-element">Przegląd</div></a>
            <a href="menu_editor.php"><div class="menu-element active">Menu główne</div></a>
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
        <div id="content" class="content">
            <div class="content-frame">
                <div class="content-title">
                    Edycja menu 
                    <div class="title_buttons">
                        <button class="ordinary_button" onclick="show_adding_form();">Dodaj pozycję</button>
                    </div>
                </div>
                <div id="cat_container" class="cat_container">
                    <div id="add_category_form" class="adding_form">
                        <div class="content-title">
                            Dodaj kategorię
                        </div>
                        <form>
                            <p>Nazwa Kategorii</p>
                            <input type="text" id="category_name">
                            <p>Ikona kategorii</p>
                            <label id="category_icon_label" for="category_icon">Wybierz plik</label><input id="category_icon" type="file">
                        </form>
                        <button onclick="new_category(how_many_categories+1);">Dodaj</button>
                        <button style="margin-top: 3px;" onclick="exit_form();">Wróć</button>
                        <script>
                            $(document).ready(function(){
                                $("#category_icon").on("change", function(){
                                    $("#category_icon_label").text("Plik gotowy!");
                                    $("#category_icon_label").css({"background-color" : "var(--color-theme)"});
                                });
                            });
                        </script>
                    </div>
                    <div id="add_subcategory_form" class="adding_form">
                        <div class="content-title">
                            Dodaj podkategorię
                        </div>
                        <form>
                            <p>Nazwa Podkategorii</p>
                            <input type="text" id="subcategory_name">
                            <p>Ikona kategorii</p>
                            <label id="category_icon_label" for="category_icon">Wybierz plik</label><input id="category_icon" type="file">
                        </form>
                        <button onclick="new_subcategory(how_many_subcategories+1, help_category_id);">Dodaj</button>
                        <button style="margin-top: 3px;" onclick="exit_sub_form();">Wróć</button>
                        <script>
                            $(document).ready(function(){
                                $("#category_icon").on("change", function(){
                                    $("#category_icon_label").text("Plik gotowy!");
                                    $("#category_icon_label").css({"background-color" : "var(--color-theme)"});
                                });
                            });
                        </script>
                    </div>
                    <!--div class="category_bracket">
                        <img id="category1" class="category_collapse" src="img/arrow.png" alt="" title="Rozwiń/Zwiń">
                        <img class="category_image" src="img/cube-icon.svg" alt="">
                        <div class="category_name">Komputery i sprzęt</div>
                        <div class="position_control">
                            <button class="control_button">Dodaj podkategorię</button>
                            <button class="control_button">Edytuj</button>
                            <button class="control_button">Usuń</button>
                            <button class="control_button">W górę</button>
                            <button class="control_button">W dół</button>
                        </div>
                    </div>
                    <div id="sub_cont1" class="subcategory_container">
                        <div class="subcategory_bracket">
                            <img class="category_image" src="img/cube-icon.svg" alt="">
                            Procesory
                            <div class="position_control">
                                <button class="control_button">Edytuj</button>
                                <button class="control_button">Usuń</button>
                                <button class="control_button">W górę</button>
                                <button class="control_button">W dół</button>
                            </div>
                        </div>
                        <div class="subcategory_bracket">
                            <img class="category_image" src="img/cube-icon.svg" alt="">
                            Karty Graficzne
                            <div class="position_control">
                                <button class="control_button">Edytuj</button>
                                <button class="control_button">Usuń</button>
                                <button class="control_button">W górę</button>
                                <button class="control_button">W dół</button>
                            </div>
                        </div>
                        <div class="subcategory_bracket">
                            <img class="category_image" src="img/cube-icon.svg" alt="">
                            Pamięci
                            <div class="position_control">
                                <button class="control_button">Edytuj</button>
                                <button class="control_button">Usuń</button>
                                <button class="control_button">W górę</button>
                                <button class="control_button">W dół</button>
                            </div>
                        </div>
                    </div-->
                </div>
            </div>
        </div>
    </main>
    <script src="js/menu_editor.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>