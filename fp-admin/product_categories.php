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
    <link rel="stylesheet" href="css/additional.css">
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
        <div class="menu col-2">
            <a href="main_page.php"><div class="menu-element">Przegląd</div></a>
            <a href="menu_editor.php"><div class="menu-element">Menu główne</div></a>
            <a href="#"><div class="menu-element">Strona Główna</div></a>
            <a href="statements.php"><div class="menu-element">Komunikaty strony</div></a>
            <a href="footer.php"><div class="menu-element">Stopka</div></a>
            <a href="product_categories.php"><div class="menu-element active">Kategorie produktów</div></a>
            <a href="products.php"><div class="menu-element">Produkty</div></a>
            <a href="#"><div class="menu-element">Podstrony</div></a>
            <a href="orders.php"><div class="menu-element">Zamówienia</div></a>
            <a href="#"><div class="menu-element">Użytkownicy</div></a>
            <p class="copy">Copyright &copy;<br>Frosty Coders - 2020<br>wersja 0.1.0</p>
        </div>
        <div id="content" class="content">
            <div id="content-frame" class="content-frame">
                <div class="content-title">
                    Kategorie produktów
                    <div class="header_buttons">
                        <button id="add_category_button" class="header_button">Dodaj kategorię</button>
                    </div>
                </div>
                <div id="cat_container">
                    <!--div class="category_bracket">
                        <div id="category_show1" class="category_show" style="">
                            <div class="status_diod"></div>
                            <div class="category_name2">Komputery i sprzęt</div>
                            <div class="position_control">
                                <button id="edit_button" class="control_button">Edytuj</button>
                                <button class="control_button">Usuń</button>
                            </div>
                        </div>
                        <div id="category_edit1" class="category_edit" style="display: none;">
                            <div class="edit_inputs">
                                Nazwa: <input type="text">
                                Status: <select><option>Aktywny</option><option>Nieaktywny</option></select>
                            </div>
                            <div class="position_control">
                                <button class="control_button accept_button">Zatwierdź</button>
                                <button id="back_button" class="control_button">Anuluj</button>
                            </div>
                        </div>
                    </div-->
                </div>
                <div id="add_category" class="category_bracket" style="display: none;">
                        <div id="category_edit1" class="category_edit">
                            <div class="edit_inputs">
                                Nazwa: <input type="text">
                                Status: <select><option>Aktywny</option><option>Nieaktywny</option></select>
                            </div>
                            <div class="position_control">
                                <button class="control_button accept_button">Zatwierdź</button>
                                <button id="close_add_category" class="control_button">Anuluj</button>
                            </div>
                        </div>
                    </div>
                <div class="save_changes">
                    <input type="submit" value="Zapisz">
                </div>
            </div>
        </div>
        <script src="js/category.js"></script>
        <?php
        echo '<script>$(document).ready(function(){$("#edit_button0").click(function(){ $("#category_show0").hide(); $("#category_edit0").fadeIn(); }); $("#back_button0").click(function(){ $("#category_show0").fadeIn(); $("#category_edit0").hide(); });});</script>';
        ?>
    </main>
</body>
</html>