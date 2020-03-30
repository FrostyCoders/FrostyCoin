<?php
    session_start();
    if(!isset($_SESSION['fp-online']))
    {
        header("Location: index.php");
        exit();
    }
    require_once "connect.php";
    function show_products($position)
    {
        $stmt = $GLOBALS['conn']->prepare("SELECT product_id, product_name, product_on_home FROM products WHERE product_status > 1 ORDER BY product_sale DESC, product_name");
        try
        {
            $stmt->execute();
            echo '<option value="0">Brak</option>';
            while($result = $stmt->fetch())
            {
                if($result['product_on_home'] == $position)
                {
                    echo '<option value="' . $result['product_id'] . '" selected>' . $result['product_name'] . '</option>';
                }
                else
                {
                    echo '<option value="' . $result['product_id'] . '">' . $result['product_name'] . '</option>';
                }
            }
        }
        catch(Exception $e)
        {
            echo '<option value="0">Wystąpił problem z pobraniem listy produktów!</option>';
        }
        unset($conn);
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
    <link rel="stylesheet" href="css/home_page.css">
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
            <a href="home_page.php"><div class="menu-element active">Strona Główna</div></a>
            <a href="menu_editor.php"><div class="menu-element">Menu główne</div></a>
            <a href="statements.php"><div class="menu-element">Komunikaty strony</div></a>
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
            <a href="home_page.php"><div class="menu-element active">Strona Główna</div></a>
            <a href="menu_editor.php"><div class="menu-element">Menu główne</div></a>
            <a href="statements.php"><div class="menu-element">Komunikaty strony</div></a>
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
                    Promocje na stronie głównej
                </div>
                <form action="php_scripts/set_home_products.php" method="post">
                    <div class="bracket">
                        <div class="bracket_title">Główna promocja</div>
                        <div class="bracket_option">
                            <select name="sale_1">
                                <?php show_products(1);?>
                            </select>
                        </div>
                    </div>
                    <div class="bracket">
                        <div class="bracket_title">Dodatkowa promocja nr 1</div>
                        <div class="bracket_option">
                            <select name="sale_2">
                                <?php show_products(2);?>
                            </select>
                        </div>
                    </div>
                    <div class="bracket">
                        <div class="bracket_title">Dodatkowa promocja nr 2</div>
                        <div class="bracket_option">
                            <select name="sale_3">
                                <?php show_products(3);?>
                            </select>
                        </div>
                    </div>
                    <div class="bracket">
                        <div class="bracket_title">Dodatkowa promocja nr 3</div>
                        <div class="bracket_option">
                            <select name="sale_4">
                                <?php show_products(4);?>
                            </select>
                        </div>
                    </div>
                    <div class="bracket">
                        <div class="bracket_title">Dodatkowa promocja nr 4</div>
                        <div class="bracket_option">
                            <select name="sale_5">
                                <?php show_products(5);?>
                            </select>
                        </div>
                    </div>
                    <div class="save_changes">
                        <input type="submit" value="Zapisz">
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="js/scripts.js"></script>
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
</body>
</html>