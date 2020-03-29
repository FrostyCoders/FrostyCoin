<?php
    session_start();
    if(!isset($_SESSION['fp-online']))
    {
        header("Location: index.php");
        exit();
    }
    require_once "connect.php";
    if(isset($_GET['filter']) && $_GET['filter'] == 1)
    {
        $order_status = $_POST['order_status'];
        $order_status = htmlentities($order_status, ENT_QUOTES, "UTF-8");
        $order_quantity = $_POST['order_quantity'];
        $order_quantity = htmlentities($order_quantity, ENT_QUOTES, "UTF-8");
        $order_sort = $_POST['order_sort'];
        $order_sort = htmlentities($order_sort, ENT_QUOTES, "UTF-8");
        $order_display = $_POST['order_display'];
        $order_display = htmlentities($order_display, ENT_QUOTES, "UTF-8");
        $order_from = $_POST['order_from'];
        $order_from = htmlentities($order_from, ENT_QUOTES, "UTF-8");
        $orderfromsec = strtotime($order_from);
        $order_to = $_POST['order_to'];
        $order_to = htmlentities($order_to, ENT_QUOTES, "UTF-8");
        $ordertosec = strtotime($order_to);
        $sql1 = "SELECT `shop_orders`.*, `order_status`.`status_name`, `shop_users`.`user_login` FROM `shop_orders` INNER JOIN `order_status` ON `shop_orders`.`order_status`=`order_status`.`status_id` INNER JOIN `shop_users` ON `shop_orders`.`user_id`=`shop_users`.`user_id`";
        switch($order_quantity)
        {
            case 1:
            {
                $sql2 = " LIMIT 20;";
                $_SESSION['order_quantity'] = 1;
                break;
            }
            case 2:
            {
                $sql2 = " LIMIT 50;";
                $_SESSION['order_quantity'] = 2;
                break;
            }
            case 3:
            {
                $sql2 = " LIMIT 100;";
                $_SESSION['order_quantity'] = 3;
                break;
            }
            case 4:
            {
                $sql2 = ";";
                $_SESSION['order_quantity'] = 4;
                break;
            }
            default:
            {
                $sql2 = " LIMIT 20;";
                $_SESSION['order_quantity'] = 1;
                break;
            }
        }
        switch($order_status)
        {
            case 1:
            {
                $sql3 = " WHERE `shop_orders`.`order_status`>0";
                $_SESSION['order_status'] = 1;
                break;
            }
            case 2:
            {
                $sql3 = " WHERE `shop_orders`.`order_status`=1";
                $_SESSION['order_status'] = 2;
                break;
            }
            case 3:
            {
                $sql3 = " WHERE `shop_orders`.`order_status`=2";
                $_SESSION['order_status'] = 3;
                break;
            } 
            case 4:
            {
                $sql3 = "  WHERE `shop_orders`.`order_status`=3";
                $_SESSION['order_status'] = 4;
                break;
            } 
            case 5:
            {
                $sql3 = "  WHERE `shop_orders`.`order_status`=4";
                $_SESSION['order_status'] = 5;
                break;
            }
            default:
            {
                $sql3 = " WHERE `shop_orders`.`order_status`>0";
                $_SESSION['order_status'] = 1;
                break;
            }
        }
        switch($order_sort)
        {
            case 1:
            {
                $sql4 = " ORDER BY `shop_orders`.`order_id`";
                $_SESSION['order_sort'] = 1;
                break;
            }
            case 2:
            {
                $sql4 = " ORDER BY `shop_users`.`user_login`";
                $_SESSION['order_sort'] = 2;
                break;
            }
            case 3:
            {
                $sql4 = " ORDER BY `shop_orders`.`order_value`";
                $_SESSION['order_sort'] = 3;
                break;
            }
            case 4:
            {
                $sql4 = " ORDER BY `shop_orders`.`order_date`";
                $_SESSION['order_sort'] = 4;
                break;
            }
            case 5:
            {
                $sql4 = " ORDER BY `shop_orders`.`order_status`";
                $_SESSION['order_sort'] = 5;
                break;
            }
            default:
            {
                $sql4 = " ORDER BY `shop_orders`.`order_id`";
                $_SESSION['order_sort'] = 1;
                break;
            }
        }
        switch($order_display)
        {
            case 1:
            {
                $sql5 = " ASC";
                $_SESSION['order_display'] = 1;
                break;
            }
            case 2:
            {
                $sql5 = " DESC";
                $_SESSION['order_display'] = 2;
                break;
            }
            default:
            {
                $sql5 = " ASC";
                $_SESSION['order_display'] = 1;
                break;
            }
        }
        if($ordertosec>$orderfromsec)
        {
            $sql6 = " AND `shop_orders`.`order_date` BETWEEN :order_from AND :order_to";
            $_SESSION['order_from'] = $order_from;
            $_SESSION['order_to'] = $order_to;
        }
        else
        {
            $order_from = 0;
            $order_to = 1;
            $sql6 = " OR :order_from=:order_to";
            $_SESSION['order_from'] = 0;
            $_SESSION['order_to'] = 0;
        }
        $sql_select = $sql1 . $sql3 . $sql6 . $sql4 . $sql5 . $sql2;
    }
    else
    {
        $sql_select = "SELECT `shop_orders`.*, `order_status`.`status_name`, `shop_users`.`user_login` FROM `shop_orders` INNER JOIN `order_status` ON `shop_orders`.`order_status`=`order_status`.`status_id` INNER JOIN `shop_users` ON `shop_orders`.`user_id`=`shop_users`.`user_id` ORDER BY `shop_orders`.`order_id` LIMIT 20;";
        $_SESSION['order_quantity'] = 1;
        $_SESSION['order_status'] = 1;
        $_SESSION['order_sort'] = 1;
        $_SESSION['order_display'] = 1;
        $_SESSION['order_from'] = 0;
        $_SESSION['order_to'] = 0;
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
    <link rel="stylesheet" href="css/orders.css">
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
            <a href="menu_editor.php"><div class="menu-element">Menu główne</div></a>
            <a href="statements.php"><div class="menu-element">Komunikaty strony</div></a>
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
            <a href="menu_editor.php"><div class="menu-element">Menu główne</div></a>
            <a href="statements.php"><div class="menu-element">Komunikaty strony</div></a>
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
                        Sortuj według <br>
                        <select name="order_sort" id="">
                            <option value="1" <?php if ($_SESSION['order_sort'] == 1) echo 'selected' ; ?>>Identyfikatora</option>
                            <option value="2" <?php if ($_SESSION['order_sort'] == 2) echo 'selected' ; ?>>Loginu</option>
                            <option value="4" <?php if ($_SESSION['order_sort'] == 4) echo 'selected' ; ?>>Daty zamówienia</option>
                            <option value="5" <?php if ($_SESSION['order_sort'] == 5) echo 'selected' ; ?>>Statusu</option>
                            <option value="3" <?php if ($_SESSION['order_sort'] == 3) echo 'selected' ; ?>>Ceny</option>
                        </select>
                    </div>
                    <div class="filter_bracket">
                        Zamówień na stronie <br>
                        <select name="order_quantity" id="">
                            <option value="1" <?php if ($_SESSION['order_quantity'] == 1) echo 'selected' ; ?>>20</option>
                            <option value="2" <?php if ($_SESSION['order_quantity'] == 2) echo 'selected' ; ?>>50</option>
                            <option value="3" <?php if ($_SESSION['order_quantity'] == 3) echo 'selected' ; ?>>100</option>
                            <option value="4" <?php if ($_SESSION['order_quantity'] == 4) echo 'selected' ; ?>>Wszystkie</option>
                        </select>
                    </div>
                    <div class="filter_bracket">
                        Status <br>
                        <select name="order_status" id="">
                            <option value="1" <?php if ($_SESSION['order_status'] == 1) echo 'selected' ; ?>>Wybierz</option>
                            <option value="2" <?php if ($_SESSION['order_status'] == 2) echo 'selected' ; ?>>Złożono</option>
                            <option value="3" <?php if ($_SESSION['order_status'] == 3) echo 'selected' ; ?>>Przygotowano</option>
                            <option value="4" <?php if ($_SESSION['order_status'] == 4) echo 'selected' ; ?>>Wysłano</option>
                            <option value="5" <?php if ($_SESSION['order_status'] == 5) echo 'selected' ; ?>>Zakończono</option>
                        </select>
                    </div>
                    <div class="filter_bracket">
                        Wyświetl <br>
                        <select name="order_display" id="">
                            <option value="1" <?php if ($_SESSION['order_display'] == 1) echo 'selected' ; ?>>Rosnąco</option>
                            <option value="2" <?php if ($_SESSION['order_display'] == 2) echo 'selected' ; ?>>Malejąco</option>
                        </select>
                        
                    </div>
                    <div class="filter_bracket filter_bracket_date">
                        Data od<br>
                        <input name="order_from" type="date" value="<?php if ($_SESSION['order_from'] != 0) echo $_SESSION['order_from'] ; ?>"><br>
                        Do<br>
                        <input name="order_to" type="date" value="<?php if ($_SESSION['order_to'] != 0) echo $_SESSION['order_to'] ; ?>">
                    </div>
                    <input type="submit" class="accept_filters" style="margin-top: 60px;" value="Zastosuj filtry">
                </form>
                </div>
                <div class="list_container">
                    <div class="list">
                        <?php
                            $stmt = $conn->prepare("SELECT shop_orders.*, order_delivery.delivery_name, order_status.status_name, shop_users.user_login FROM shop_orders INNER JOIN order_delivery ON shop_orders.order_delivery = order_delivery.delivery_id INNER JOIN order_status ON shop_orders.order_status = order_status.status_id INNER JOIN shop_users ON shop_orders.user_id = shop_users.user_id ORDER BY shop_orders.order_date");
                            try
                            {
                                $conn->query("SET NAMES 'utf8'");
                                $stmt->execute();
                                if($stmt->rowCount() != 0)
                                {
                                    $order_exist = true;
                                }
                                else
                                {
                                    echo '<p style="width: 100%; text-align: center; font-size: 14px;">Brak zamówień!!</p>';
                                    $order_exist = false;
                                }
                            }
                            catch(Exception $e)
                            {
                                echo '<p style="width: 100%; text-align: center; font-size: 14px;">Wystąpił błąd podczas ładowania listy zamówień!</p>';
                                $order_exist = false;
                            }
                            if($order_exist == true)
                            {
                                while($row = $stmt->fetch())
                                {
                                    echo '<div id="order' . $row['order_id'] . '" class="order_bracket">';
                                        echo '<p class="order_info"><i>Identyfikator zamówienia</i><br><b>' . $row['order_id'] . '</b></p>';
                                        echo '<p class="order_info"><i>Zamawiający</i><br><b>' . $row['user_login'] . '</b></p>';
                                        echo '<p class="order_info"><i>Data zamówienia</i><br><b>' . date("d-m-Y", strtotime($row['order_date'])) . '</b></p>';
                                        $prices = explode(",", $row['order_prices']);
                                        $total_price = array_sum($prices);
                                        echo '<p class="order_info"><i>Cena zamówienia</i><br><b>' . $total_price . ' PLN</b></p>';
                                        echo '<p class="order_info"><i>Status zamówienia</i><br><b>' . $row['status_name'] . '</b></p>';
                                        echo '<p class="order_info"><i>Sposób dostawy</i><br><b>' . $row['delivery_name'] . '</b></p>';
                                        echo '<div class="order_collapse">';
                                            echo '<button id="collapse_button' . $row['order_id'] . '" onclick="collapse_order(' . $row['order_id'] . ');" class="ordinary_button">Szczegóły</button>';
                                            echo '<button id="hide_button' . $row['order_id'] . '" onclick="hide_order(' . $row['order_id'] . ');" class="ordinary_button" style="display: none; ">Schowaj</button>';
                                            echo '<a href="php_scripts/orders/invoice.php?oid=' . $row['order_id'] . '" target="_blank"><button type="button" class="ordinary_button">Pobierz fakturę</button></a>';
                                        echo '</div>';
                                        echo '<div id="order_details' . $row['order_id'] . '" style="display: none;">';
                                            echo '<div class="order_products">';
                                                echo '<div class="product" style="border-bottom: 2px solid lightgray;"><p class="product_id"><b style="font-size: 12px;">Identyfikator</b></p><p class="product_name"><b style="font-size: 12px;">Nazwa</b></p><p class="product_price"><b style="font-size: 12px;">Cena</b></p></div>';
                                                $product_list = explode(",", $row['order_products']);
                                                $i = 0;
                                                foreach($product_list as $product)
                                                {
                                                    $product_sql = $conn->prepare("SELECT product_name FROM products WHERE product_id = :product_id");
                                                    $product_sql->bindParam(":product_id", $product);
                                                    try
                                                    {
                                                        $product_sql->execute();
                                                        $products_list2 = $product_sql->fetch();
                                                        echo '<div class="product"><p class="product_id">' . $product . '</p><p class="product_name">' . $products_list2['product_name'] . '</p><p class="product_price">' . $prices[$i] . '</p></div>';
                                                        $i++;
                                                    }
                                                    catch(Exception $e)
                                                    {
                                                        echo '<div class="product"><p class="product_id"></p><p class="product_name">Nie udało się załadować listy produktów!</p><p class="product_price"></p></div>';
                                                    }
                                                }
                                            echo '</div>';
                                            echo '<div class="status">
                                                <b>Zmień status:</b>
                                                <form action="php_scripts/orders/change_status.php?oid=' . $row['order_id'] . '" method="post">
                                                <select name="status">';
                                                    $status_display_sql = $conn->prepare("SELECT * FROM order_status");
                                                    try
                                                    {
                                                        $status_display_sql->execute();
                                                        while($status_display = $status_display_sql->fetch())
                                                        {
                                                            if($status_display['status_id'] == $row['order_status'])
                                                            {
                                                                echo '<option value="' . $status_display['status_id'] . '" selected>' . $status_display['status_name'] . '</option>';
                                                            }
                                                            else
                                                            {
                                                                echo '<option value="' . $status_display['status_id'] . '">' . $status_display['status_name'] . '</option>';
                                                            }
                                                        }
                                                    }
                                                    catch(Exception $e)
                                                    {
                                                        echo '<option value="1">Błąd!</option>';
                                                    }
                                                echo '</select>
                                                <input type="submit" value="Zapisz">
                                                </form>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
        if(isset($_SESSION['result']))
        {
            echo '<div class="result">' . $_SESSION['result'] . '</div>';
            if($_SESSION['result'] == "Uzupełnij wymagane pola!")
            {
                echo '<script>$("#add_product_form").show();</script>';
            }
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
<?php
    $conn = null;
    unset($conn);
    exit();
?>