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
            <a href="settings.php" class="banner-user" title="Ustawienia"><img src="img/user.png" alt="user"><label class="banner-username"><?php echo @$_SESSION['admin_login']?></label></a>
        </div>
    </header>
    <main class="row">
    <div class="collapse_button_show">
            <img src="img/menu_icon.png" alt="MENU" onclick="openNav();"> 
        </div>
        <div id="main-small_screen" class="menu">
            <a href="main_page.php"><div class="menu-element">Przegląd</div></a>
            <a href="home_page.php"><div class="menu-element">Strona Główna</div></a>
            <a href="statements.php"><div class="menu-element">Komunikaty strony</div></a>
            <a href="footer.php"><div class="menu-element">Stopka</div></a>
            <a href="product_categories.php"><div class="menu-element  active">Kategorie produktów</div></a>
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
            <a href="statements.php"><div class="menu-element">Komunikaty strony</div></a>
            <a href="footer.php"><div class="menu-element">Stopka</div></a>
            <a href="product_categories.php"><div class="menu-element  active">Kategorie produktów</div></a>
            <a href="products.php"><div class="menu-element">Produkty</div></a>
            <a href="orders.php"><div class="menu-element">Zamówienia</div></a>
            <a href="users.php"><div class="menu-element">Użytkownicy</div></a>
            <a href="settings.php"><div class="menu-element">Ustawienia</div></a>
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
                    <?php
                        require_once "connect.php";
                        $stmt = $conn->query("SELECT * FROM product_categories ORDER BY category_name");
                        if(($stmt->rowCount()) == 0)
                        {
                            echo '<div class="no_cat" style="width: 100%; text-align: center; padding-top: 20px; padding-bottom: 20px; font-size: 14px;">Brak kategorii!</div>';
                        }
                        else
                        {
                            while($row = $stmt->fetch())
                            {
                                if($row["category_status"]==1)
                                {
                                    $status = "on";
                                    $status_title = "Aktywna";
                                }
                                else
                                {
                                    $status = "off";
                                    $status_title = "Nieaktywna";
                                }
                                $addition = "'" . $row['category_name'] . "'";
                                echo '<div class="category_bracket">
                                    <div class="category_status ' . $status . '" title="' . $status_title . '"></div>
                                    <div class="category_name">' . $row['category_name'] . '</div>
                                    <div class="category_info">Liczba produktów: 234</div>
                                    <div class="category_settings">
                                        <button type="button" onclick="edit_cat(' . $row['category_id'] . ', ' . $addition . ', ' . $row['category_status'] . ');">Edytuj</button>
                                        <a href="php_scripts/delete_cat.php?cat_id=' . $row['category_id'] . '"><button>Usuń</button></a>
                                    </div>
                                </div>';
                            }
                        }
                    ?>
                    <div id="add_category_bracket" class="category_bracket">
                        <form action="php_scripts/add_category.php" method="post">
                        <div class="category_name" style="padding-left: 8px">Status: <select name="cat_status"><option value="active">Aktywna</option><option value="inactive">Niektywna</option></select></div>
                        <div class="category_name" style="padding-left: 8px">Nazwa: <input type="text" name="cat_name"></div>
                        <div class="category_settings">
                            <input type="submit" value="Zatwierdź"/>
                            <button type="button" id="cancel_add">Anuluj</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                $("#add_category_bracket").hide();
                $("#add_category_button").click(function(){
                    $(".no_cat").fadeOut().delay(1000).hide();
                    $("#add_category_bracket").fadeIn();
                });
                $("#cancel_add").click(function(){
                    $("#add_category_bracket").fadeOut().delay(1000).show();
                    $(".no_cat").fadeIn();
                });
            });
        </script>
    </main>
    <div class="edit_cat" id="edit_cat">
        <div class="popup_frame">
            <div class="close_window">
                <img id="close_popup" src="img/remove.png" alt="Zamknij" title="Anuluj">
            </div>
            <div class="content-title">
                Dodaj produkt
            </div>
            <div class="popup_inputs" id="popup_inputs_edit_cat">
                <table>
                    <tr>
                        <td>Status</td><td><select name="cat_status"><option value="active">Aktywna</option><option value="inactive">Niektywna</option></select></td>
                    </tr>
                    <tr>
                        <td>Nazwa</td><td><input name="cat_name" type="text"></td>
                    </tr>
                </table>
                <div class="buttons">
                    <input type="submit" value="Zapisz"> 
                </div>
            </div>
        </div>
    </div>
    <?php
        if(isset($_SESSION['result']))
        {
            echo '<div class="result">' . $_SESSION['result'] . '</div>';
            unset($_SESSION['result']);
        }
        else
        {
            echo '<div class="result" style="display: none;"></div>';
        }
    ?>
    <script src="js/scripts.js"></script>
</body>
</html>