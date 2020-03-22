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
    <link rel="stylesheet" href="css/menu_editor.css">
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
            <a href="home_page.php"><div class="menu-element">Strona Główna</div></a>
            <a href="menu_editor.php"><div class="menu-element active">Menu główne</div></a>
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
            <a href="main_page.php"><div class="menu-element">Przegląd</div></a>
            <a href="home_page.php"><div class="menu-element">Strona Główna</div></a>
            <a href="menu_editor.php"><div class="menu-element active">Menu główne</div></a>
            <a href="statements.php"><div class="menu-element">Komunikaty strony</div></a>
            <a href="footer.php"><div class="menu-element">Stopka</div></a>
            <a href="product_categories.php"><div class="menu-element">Kategorie produktów</div></a>
            <a href="products.php"><div class="menu-element">Produkty</div></a>
            <a href="orders.php"><div class="menu-element">Zamówienia</div></a>
            <a href="users.php"><div class="menu-element">Użytkownicy</div></a>
            <a href="settings.php"><div class="menu-element">Ustawienia</div></a>
            <p class="copy">Copyright &copy;<br>Frosty Coders - 2020<br>wersja 0.1.0</p>
        </div>
        <div id="content" class="content">
            <div class="content-frame">
                <div class="content-title">
                    Edycja menu 
                    <div class="title_buttons">
                        <button id="show_add" class="ordinary_button">Dodaj pozycję</button>
                    </div>
                </div>
                <div id="position2" class="menu_position">
                    <div class="show_position">
                        <div class="collapse_button collapse" onclick="collapse(1);">
                            <img src="img/arrow.png">
                        </div>
                        <div class="collapse_button hide" onclick="hide(1);">
                            <img src="img/arrow.png">
                        </div>
                        <div class="position_icon">
                            <img src="img/logo.png" alt="">
                        </div>
                        <div class="position_name">
                            Akcesoria
                        </div>
                        <div class="menu_position_control">
                            <button onclick="add_subposition(1);" class="ordinary_button">Dodaj podpozycję</button>
                            <button onclick="show_edit(2);" class="ordinary_button">Edytuj</button>
                            <button class="ordinary_button">Usuń</button>
                        </div>
                    </div>
                    <div class="edit_position">
                        <div class="edit_icon">
                            <img src="img/logo.png">
                            <form>
                                <label id="file_label1" class="file_input_label" for="file1">Wybierz plik</label><input id="file1" class="file_input" type="file" name="product_image">
                                <input type="submit" value="Zmień">
                                <button type="button" class="ordinary_button" style="width: 100px;">Usuń</button>
                            </form>
                            <script>
                                $(document).ready(function(){
                                    $("#file1").on("change", function(){
                                        $("#file_label1").text("Plik gotowy!");
                                        $("#file_label1").css({"background-color" : "var(--color-theme)"}).css({"border" : "2px solid var(--color-theme)"});
                                    });
                                });
                            </script>
                        </div>
                        <div class="edit_info">
                            <table>
                                <tr>
                                    <td class="edit_desc">Nazwa:</td><td><input type="text"></td>
                                </tr>
                                <tr>
                                    <td class="edit_desc">Odnośnik do strony:</td>
                                    <td>
                                        <select name="" id="">
                                            <option value="">Brak</option>
                                            <option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="edit_desc">Odnośnik do kategorii:</td>
                                    <td>
                                        <select name="" id="">
                                            <option value="">Brak</option>
                                            <option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="edit_control">
                            <input type="submit" value="Zapisz">
                            <button onclick="cancel_edit(2);" class="ordinary_button">Anuluj</button>
                        </div>
                    </div>
                </div>
                <div id="subposition_bracket1" class="subposition_bracket">
                    <div id="position1" class="menu_position">
                        <div class="show_position">
                            <div class="position_icon">
                                <img src="img/logo.png">
                            </div>
                            <div class="position_name">
                                Myszki
                            </div>
                            <div class="menu_position_control">
                                <button onclick="show_edit(1);" class="ordinary_button">Edytuj</button>
                                <button class="ordinary_button">Usuń</button>
                            </div>
                        </div>
                        <div class="edit_position">
                            <div class="edit_icon">
                                <img src="img/logo.png">
                                <form>
                                    <label id="file_label1" class="file_input_label" for="file1">Wybierz plik</label><input id="file1" class="file_input" type="file" name="product_image">
                                    <input type="submit" value="Zmień">
                                    <button type="button" class="ordinary_button" style="width: 100px;">Usuń</button>
                                </form>
                                <script>
                                    $(document).ready(function(){
                                        $("#file1").on("change", function(){
                                            $("#file_label1").text("Plik gotowy!");
                                            $("#file_label1").css({"background-color" : "var(--color-theme)"}).css({"border" : "2px solid var(--color-theme)"});
                                        });
                                    });
                                </script>
                            </div>
                            <div class="edit_info">
                                <table>
                                    <tr>
                                        <td class="edit_desc">Nazwa:</td><td><input type="text"></td>
                                    </tr>
                                    <tr>
                                        <td class="edit_desc">Odnośnik do strony:</td>
                                        <td>
                                            <select name="" id="">
                                                <option value="">Brak</option>
                                                <option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="edit_desc">Odnośnik do kategorii:</td>
                                        <td>
                                            <select name="" id="">
                                                <option value="">Brak</option>
                                                <option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="edit_control">
                                <input type="submit" value="Zapisz">
                                <button onclick="cancel_edit(1);" class="ordinary_button">Anuluj</button>
                            </div>
                        </div>
                    </div>
                    <div id="add_subposition1" class="add_position">
                        <div class="add_icon">
                            <p>Zdjęcie</p>
                            <label id="add_icon_position" class="file_input_label" for="add_icon_position_input">Wybierz plik</label><input id="add_icon_position_input" class="file_input" type="file" name="product_image">
                        </div>
                        <div class="add_name">
                            <p>Nazwa</p>
                            <input type="text">
                        </div>
                        <div class="add_reflink">
                            <p>Odnośnik do strony</p>
                            <select name="" id="">
                                <option value="">Brak</option>
                                <option>
                            </select>
                        </div>
                        <div class="add_reflink">
                            <p>Odnośnik do kategorii</p>
                            <select name="" id="">
                                <option value="">Brak</option>
                                <option>
                            </select>
                        </div>
                        <div class="edit_control">
                            <input type="submit" value="Dodaj">
                            <button onclick="cancel_add(1)" class="ordinary_button">Anuluj</button>
                        </div>
                    </div>
                </div>
                <div id="add_position" class="add_position">
                    <div class="add_icon">
                        <p>Zdjęcie</p>
                        <label id="add_icon_position" class="file_input_label" for="add_icon_position_input">Wybierz plik</label><input id="add_icon_position_input" class="file_input" type="file" name="product_image">
                    </div>
                    <div class="add_name">
                        <p>Nazwa</p>
                        <input type="text">
                    </div>
                    <div class="add_reflink">
                        <p>Odnośnik do strony</p>
                        <select name="" id="">
                            <option value="">Brak</option>
                            <option>
                        </select>
                    </div>
                    <div class="add_reflink">
                        <p>Odnośnik do kategorii</p>
                        <select name="" id="">
                            <option value="">Brak</option>
                            <option>
                        </select>
                    </div>
                    <div class="edit_control">
                        <input type="submit" value="Dodaj">
                        <button id="cancel_add" class="ordinary_button">Anuluj</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="js/menu_editor.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>