<?php
    session_start();
    if(!isset($_SESSION['fp-online']))
    {
        header("Location: index.php");
        exit();
    }

    require_once "connect.php";

    $setnames = "SET NAMES utf8";
    $conn->query($setnames);

    if(isset($_GET['filter']))
    {
        $order_search = $_POST['order_search'];
        $order_search2 = $_POST['order_search2'];
        $order_search2 = htmlentities($order_search2, ENT_QUOTES, "UTF-8");
        $order_status = $_POST['order_status'];
        $order_quantity = $_POST['order_quantity'];
        $order_sort = $_POST['order_sort'];
        $order_display = $_POST['order_display'];
        $order_from = $_POST['order_from'];
        $order_to = $_POST['order_to'];
        $sql1 = "SELECT `products`.*, `product_categories`.`category_name` FROM `products` INNER JOIN `product_categories` ON `products`.`category_id`=`product_categories`.`category_id`";
        
        if($product_categories>0)
        {
            $sql_categories_query = "SELECT `category_id`, `category_name` FROM `product_categories` WHERE `category_id`=".$product_categories.";";
            $sql_categories_queryy = $conn->query($sql_categories_query);
            while($categories_query = $sql_categories_queryy -> fetch())
            {
                $yesc = $categories_query['category_name'];
                $sql2 = " WHERE `product_categories`.`category_name`='$yesc'";
                $_SESSION['product_categories'] = $categories_query['category_id'];
            }
        }
        else
        {
            $sql2 = " WHERE `product_categories`.`category_id`>0";
            $_SESSION['product_categories'] = 0;
        }
        
        switch($product_sort)
        {
            case 1:
            {
                $sql3 = " ORDER BY `products`.`product_name`";
                $_SESSION['product_sort'] = 1;
                break;
            }
            case 2:
            {
                $sql3 = " ORDER BY `products`.`product_amount`";
                $_SESSION['product_sort'] = 2;
                break;
            }
            case 3:
            {
                
                $sql3 = " ORDER BY `products`.`product_price`";
                $_SESSION['product_sort'] = 3;
                break;
            }
            case 4:
            {
                $sql3 = " ORDER BY `products`.`product_from`";
                $_SESSION['product_sort'] = 4;
                break;
            }
        }
        switch($product_quantity)
        {
            case 1:
            {
                $sql4 = " LIMIT 20;";
                $_SESSION['product_quantity'] = 1;
                break;
            }
            case 2:
            {
                $sql4 = " LIMIT 50;";
                $_SESSION['product_quantity'] = 2;
                break;
            }
            case 3:
            {
                $sql4 = " LIMIT 100;";
                $_SESSION['product_quantity'] = 3;
                break;
            }
            case 4:
            {
                $sql4 = ";";
                $_SESSION['product_quantity'] = 4;
                break;
            }
        }
        switch($product_discount)
        {
            case 1:
            {
                $sql5 = " AND `products`.`product_sale`=0";
                $_SESSION['product_discount'] = 1;
                break;
            }
            case 2:
            {
                $sql5 = " AND `products`.`product_sale`=1";
                $_SESSION['product_discount'] = 2;
                break;
            }
            
        }
        
        switch($product_display)
        {
            case 1:
            {
                $sql6 = " ASC";
                $_SESSION['product_display'] = 1;
                break;
            }
            case 2:
            {
                $sql6 = " DESC";
                $_SESSION['product_display'] = 2;
                break;
            } 
        }
        
        switch($product_status)
        {
            case 1:
            {
                $sql7 = " AND `products`.`product_status`>1";
                $_SESSION['product_status'] = 1;
                break;
            }
            case 2:
            {
                $sql7 = " AND `products`.`product_status`=1";
                $_SESSION['product_status'] = 2;
                break;
            } 
            case 3:
            {
                $sql7 = "  AND `products`.`product_status`=0";
                $_SESSION['product_status'] = 3;
                break;
            } 
        }
        $sql_select = $sql1 . $sql2 . $sql5 . $sql7 . $sql3 . $sql6 . $sql4;
    }
    else
    {
        $sql_select = "SELECT `products`.*, `product_categories`.`category_name` FROM `products` INNER JOIN `product_categories` ON `products`.`category_id`=`product_categories`.`category_id` WHERE `product_status`>1 ORDER BY `products`.`product_name` ASC LIMIT 20;";
        $_SESSION['product_categories'] = 0;
        $_SESSION['product_sort'] = 0;
        $_SESSION['product_quantity'] = 1;
        $_SESSION['product_discount'] = 0;
        $_SESSION['product_display'] = 1;
        $_SESSION['product_status'] = 1;
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
    <link rel="stylesheet" href="css/media.css">
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
            <a href="product_categories.php"><div class="menu-element">Kategorie produktów</div></a>
            <a href="products.php"><div class="menu-element">Produkty</div></a>
            <a href="orders.php"><div class="menu-element  active">Zamówienia</div></a>
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
            <a href="product_categories.php"><div class="menu-element">Kategorie produktów</div></a>
            <a href="products.php"><div class="menu-element">Produkty</div></a>
            <a href="orders.php"><div class="menu-element  active">Zamówienia</div></a>
            <a href="users.php"><div class="menu-element">Użytkownicy</div></a>
            <a href="settings.php"><div class="menu-element">Ustawienia</div></a>
            <p class="copy">Copyright &copy;<br>Frosty Coders - 2020<br>wersja 0.1.0</p>
        </div>
        <div id="content" class="content">
            <div id="content-frame" class="content-frame">
                <div class="content-title">
                    Zamówienia
                </div>
                <div class="product_filters">
                <form action="orders.php?filter=1" method="post">
                    <div class="filter_bracket">
                        Szukaj <br>
                        <select name="order_search">
                            <option value="">Identyfikator</option>
                            <option value="">Użytkownik</option>
                            <option value="">Cena</option>
                        </select><br>
                        <input name="order_search2" type="text">
                    </div>
                    <div class="filter_bracket">
                        Zamówień na stronie <br>
                        <select name="order_quantity" id="">
                            <option value="">20</option>
                            <option value="">50</option>
                            <option value="">100</option>
                            <option value="">Wszystkie</option>
                        </select>
                    </div>
                    <div class="filter_bracket">
                        Status <br>
                        <select name="order_status" id="">
                            <option value="">Złożono</option>
                            <option value="">Przygotowano</option>
                            <option value="">Wysłano</option>
                            <option value="">Zakończono</option>
                        </select>
                    </div>
                    <div class="filter_bracket">
                        Sortuj według <br>
                        <select name="order_sort" id="">
                            <option>Nazwa</option>
                            <option value="">Cena</option>
                            <option value="">Data wprowadzenia</option>
                        </select><br><br>
                        <select name="order_display" id="">
                            <option value="">Rosnąco</option>
                            <option value="">Malejąco</option>
                        </select>
                        
                    </div>
                    <div class="filter_bracket filter_bracket_date">
                        Data od<br>
                        <input name="order_form" type="date"><br>
                        Do<br>
                        <input name="order_to" type="date">
                    </div>
                    <input type="submit" class="accept_filters" style="margin-top: 60px;" value="Zastosuj filtry">
                </form>
                </div>
                <div class="list_container">
                    <div class="list">
                        <div class="list_bracket list_desc">
                            <div class="id"><span class="list_bracket_desc">Identyfikator</span>200219123456</div>
                            <div class="user"><span class="list_bracket_desc">Użytkownik</span>example87</div>
                            <div class="date"><span class="list_bracket_desc">Data zamówienia</span>19-02-2020</div>
                            <div class="status"><span class="list_bracket_desc">Status</span>Wysłane</div>
                            <div class="value"><span class="list_bracket_desc">Wartość</span>1200.00 PLN</div>
                            <div class="empty">
                                <div class="position_control" style="width: auto;">
                                    <button class="control_button">Podgląd</button>
                                </div>
                            </div>
                        </div>
                        <div class="list_bracket list_desc">
                            <div class="id"><span class="list_bracket_desc">Identyfikator</span>200217654321</div>
                            <div class="user"><span class="list_bracket_desc">Użytkownik</span>example57</div>
                            <div class="date"><span class="list_bracket_desc">Data zamówienia</span>17-02-2020</div>
                            <div class="status"><span class="list_bracket_desc">Status</span>Zakończono</div>
                            <div class="value"><span class="list_bracket_desc">Wartość</span>870.00 PLN</div>
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