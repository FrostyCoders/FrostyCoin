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
            <a href="products.php"><div class="menu-element active">Produkty</div></a>
            <a href="#"><div class="menu-element">Podstrony</div></a>
            <a href="orders.php"><div class="menu-element">Zamówienia</div></a>
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
            <a href="products.php"><div class="menu-element  active">Produkty</div></a>
            <a href="#"><div class="menu-element">Podstrony</div></a>
            <a href="orders.php"><div class="menu-element">Zamówienia</div></a>
            <a href="users.php"><div class="menu-element">Użytkownicy</div></a>
            <p class="copy">Copyright &copy;<br>Frosty Coders - 2020<br>wersja 0.1.0</p>
        </div>
        <div id="content" class="content">
            <div id="content-frame" class="content-frame">
                <div class="content-title">
                    Produkty
                    <div class="title_buttons">
                        <button id="add_product_button" class="ordinary_button">Dodaj produkt</button>
                    </div>
                </div>
                <div class="product_filters">
                    <div class="filter_bracket">
                        Kategoria <br>
                        <select name="" id="">

                        </select>
                    </div>
                    <div class="filter_bracket">
                        Sortuj według <br>
                        <select name="" id="">
                            <option>Nazwa</option>
                            <option value="">Cena</option>
                            <option value="">Data wprowadzenia</option>
                        </select>
                    </div>
                    <div class="filter_bracket">
                        Produktów na stronie <br>
                        <select name="" id="">
                            <option value="">20</option>
                            <option value="">50</option>
                            <option value="">100</option>
                            <option value="">Wszystkie</option>
                        </select>
                    </div>
                    <div class="filter_bracket">
                        Przecena <br>
                        <select name="" id="">
                            <option value="">Tak</option>
                            <option value="">Nie</option>
                        </select>
                    </div>
                    <div class="filter_bracket">
                        Status <br>
                        <select name="" id="">
                            <option value="">Aktywny</option>
                            <option value="">Nieaktywny</option>
                        </select>
                    </div>
                    <button class="accept_filters">Zastosuj filtry</button>
                </div>
                <div class="product_container">
                    <div class="product_bracket">
                        <img src="img/gaming_laptop.png" alt="">
                        <div class="product_desc">
                            <h5>MSI G150</h5>
                            <p class="desc">
                                Kategoria: Laptopy<br>
                                Liczba: 34 <br>
                                Data dodania: 12-01-2020 <br>
                                <p class="price">Cena: 3100 PLN</p>
                                <button class="product_button">Edytuj</button>
                                <button class="product_button_delete">Usuń</button>
                            </p>
                        </div>
                    </div>
                    <div class="product_bracket">
                        <img src="img/avant.png" alt="">
                        <div class="product_desc">
                            <h5>AVANT P870</h5>
                            <p class="desc">
                                Kategoria: Laptopy<br>
                                Liczba: 56 <br>
                                Data dodania: 13-01-2020 <br>
                                <p class="price" style="color: red;">Promocja: 2999 PLN</p>
                                <button class="product_button">Edytuj</button>
                                <button class="product_button_delete">Usuń</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div id="add_product_form" class="add_form_popup">
        <div class="popup_frame">
            <div class="close_window">
                <img id="close_popup" src="img/remove.png" alt="Zamknij" title="Anuluj">
            </div>
            <div class="content-title">
                Dodaj produkt
            </div>
            <div class="popup_inputs">
                <table>
                    <tr>
                        <td>Nazwa produktu</td><td><input type="text"></td>
                    </tr>
                    <tr>
                        <td>Kategoria produktu</td>
                        <td>
                            <select name="" id="">
                                <option value="">Kategoria 1</option>
                                <option value="">Kategoria 2</option>
                                <option value="">Kategoria 3</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Opis produktu</td><td><textarea name="" id="" cols="30" rows="5"></textarea></td>
                    </tr>
                    <tr>
                        <td>Status produktu</td>
                        <td>
                            <select name="" id="">
                                <option value="">Aktywny</option>
                                <option value="">Nieaktywny</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Cena w PLN</td><td><input type="number"></td>
                    </tr>
                    <tr>
                        <td>Promocja i cena</td>
                        <td>
                            <select name="" id="">
                                <option value="">Aktywna</option>
                                <option value="" selected>Nieaktywna</option>
                            </select>
                        </td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td>Data promocji</td>
                        <td>
                            Od:<br> <input type="datetime-local">
                        </td>
                        <td>Do:<br> <input type="datetime-local"></td>
                    </tr>
                    <tr>
                        <td>Ilość na magazynie</td><td><input type="number"></td>
                    </tr>
                    <tr>
                        <td>Zdjęcie produktu</td><td><label id="file_input_label" for="file_input">Wybierz plik</label><input id="file_input" type="file"></td>
                    </tr>
                    <script>
                        $(document).ready(function(){
                            $("#file_input").on("change", function(){
                                $("#file_input_label").text("Plik gotowy!");
                                $("#file_input_label").css({"background-color" : "var(--color-theme)"}).css({"border" : "2px solid var(--color-theme)"});
                            });
                        });
                    </script>
                </table>
            </div>
            <div class="save_changes">
                <input type="submit" value="Dodaj">
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#add_product_button").click(function(){
                $('main').css({"pointer-events" : "none"});
                $("#add_product_form").fadeIn();
            });
            $("#close_popup").click(function(){
                $('main').css({"pointer-events" : "all"});
                $("#add_product_form").fadeOut();
            });   
        });
    </script>
    <script src="js/scripts.js"></script>
</body>
</html>