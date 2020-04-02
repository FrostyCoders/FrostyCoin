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
        $product_categories = $_POST['categories'];
        $product_categories = htmlentities($product_categories, ENT_QUOTES, "UTF-8");
        $product_sort = $_POST['sort'];
        $product_sort = htmlentities($product_sort, ENT_QUOTES, "UTF-8");
        $product_quantity = $_POST['quantity'];
        $product_quantity = htmlentities($product_quantity, ENT_QUOTES, "UTF-8");
        $product_discount = $_POST['discount'];
        $product_discount = htmlentities($product_discount, ENT_QUOTES, "UTF-8");
        $product_status = $_POST['status'];
        $product_status = htmlentities($product_status, ENT_QUOTES, "UTF-8");
        $product_display = $_POST['display'];
        $product_display = htmlentities($product_display, ENT_QUOTES, "UTF-8");
        $sql1 = "SELECT `products`.*, `product_categories`.`category_name` FROM `products` INNER JOIN `product_categories` ON `products`.`category_id`=`product_categories`.`category_id`";
        
        if($product_categories>0)
        {        
            $sql_categories_query = "SELECT `category_id`, `category_name` FROM `product_categories` WHERE `category_id`=:pr_categories;";
            $sql_categories_queryy = $conn->prepare($sql_categories_query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sql_categories_queryyy = $sql_categories_queryy->execute(array(':pr_categories' => $product_categories));
            
            while($categories_query = $sql_categories_queryy -> fetch())
            {
                $yesc = $categories_query['category_name'];
                $sql2 = " WHERE `product_categories`.`category_name`=:cat_name";
                $_SESSION['product_categories'] = $categories_query['category_id'];
            }
        }
        else
        {
            $yesc = 1;
            $sql2 = " WHERE (`product_categories`.`category_id`>0 OR :cat_name!=:cat_name)";
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
            case 0:
            {
                $sql5 = "";
                $_SESSION['product_discount'] = 0;
                break;
            }
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
                $sql7 = " AND `products`.`product_status`>0";
                $_SESSION['product_status'] = 1;
                break;
            }
            case 2:
            {
                $sql7 = " AND `products`.`product_status`>1";
                $_SESSION['product_status'] = 2;
                break;
            }
            case 3:
            {
                $sql7 = " AND `products`.`product_status`=1";
                $_SESSION['product_status'] = 3;
                break;
            } 
        }
        $sql_select = $sql1 . $sql2 . $sql5 . $sql7 . $sql3 . $sql6 . $sql4;
    }
    else
    {
        $yesc = 1;
        $sql_select = "SELECT `products`.*, `product_categories`.`category_name` FROM `products` INNER JOIN `product_categories` ON `products`.`category_id`=`product_categories`.`category_id` WHERE `product_status`!=0 ORDER BY `products`.`product_name` ASC LIMIT 20;";
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
            <a href="menu_editor.php"><div class="menu-element">Menu główne</div></a>
            <a href="statements.php"><div class="menu-element">Komunikaty strony</div></a>
            <a href="product_categories.php"><div class="menu-element">Kategorie produktów</div></a>
            <a href="products.php"><div class="menu-element active">Produkty</div></a>
            <a href="orders.php"><div class="menu-element">Zamówienia</div></a>
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
            <a href="products.php"><div class="menu-element  active">Produkty</div></a>
            <a href="orders.php"><div class="menu-element">Zamówienia</div></a>
            <a href="users.php"><div class="menu-element">Użytkownicy</div></a>
            <a href="settings.php"><div class="menu-element">Ustawienia</div></a>
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
            <form action="products.php?filter=1" method="post">
                    <div class="filter_product_bracket">
                        Kategoria <br>
                        <select name="categories" id="">
                            <option value="def" <?php if ($_SESSION['product_categories'] == 0) echo 'selected' ; ?>>Wybierz</option>
                        <?php
                            $sql = "SELECT * FROM `product_categories` WHERE `category_status` = 1;";
                            $result = $conn->query($sql);
                
                            while($row = $result -> fetch())
                            {
                                if ($_SESSION['product_categories'] == $row['category_id'])
                                {
                                    echo "<option value=".$row['category_id']." selected>".$row['category_name']."</option>";
                                }
                                else
                                {
                                    echo "<option value=".$row['category_id'].">".$row['category_name']."</option>";
                                }
                            }
                        ?>
                        </select>
                    </div>
                    <div class="filter_product_bracket">
                        Sortuj według <br>
                        <select name="sort" id="">
                            <option value="1" <?php if ($_SESSION['product_sort'] == 1) echo 'selected' ; ?>>Nazwa</option>
                            <option value="2" <?php if ($_SESSION['product_sort'] == 2) echo 'selected' ; ?>>Ilość</option>
                            <option value="3" <?php if ($_SESSION['product_sort'] == 3) echo 'selected' ; ?>>Cena podstawowa</option>
                            <option value="4" <?php if ($_SESSION['product_sort'] == 4) echo 'selected' ; ?>>Data wprowadzenia</option>
                        </select>
                    </div>
                    <div class="filter_product_bracket">
                        Produktów na stronie <br>
                        <select name="quantity" id="">
                            <option value="1" <?php if ($_SESSION['product_quantity'] == 1) echo 'selected' ; ?>>20</option>
                            <option value="2" <?php if ($_SESSION['product_quantity'] == 2) echo 'selected' ; ?>>50</option>
                            <option value="3" <?php if ($_SESSION['product_quantity'] == 3) echo 'selected' ; ?>>100</option>
                            <option value="4" <?php if ($_SESSION['product_quantity'] == 4) echo 'selected' ; ?>>Wszystkie</option>
                        </select>
                    </div>
                    <div class="filter_product_bracket">
                        Przecena <br>
                        <select name="discount" id="">
                            <option value="0" <?php if ($_SESSION['product_discount'] == 0) echo 'selected' ; ?>>Wybierz</option>
                            <option value="1" <?php if ($_SESSION['product_discount'] == 1) echo 'selected' ; ?>>Nie</option>
                            <option value="2" <?php if ($_SESSION['product_discount'] == 2) echo 'selected' ; ?>>Tak</option>
                        </select>
                    </div>
                    <div class="filter_product_bracket">
                        Status <br>
                        <select name="status" id="">
                            <option value="1" <?php if ($_SESSION['product_status'] == 1) echo 'selected' ; ?>>Wybierz</option>
                            <option value="2" <?php if ($_SESSION['product_status'] == 2) echo 'selected' ; ?>>Aktywne</option>
                            <option value="3" <?php if ($_SESSION['product_status'] == 3) echo 'selected' ; ?>>Nieaktywne</option>
                        </select>
                    </div>
                <div class="filter_product_bracket">
                        Wyświetl <br>
                        <select name="display" id="">
                            <option value="1" <?php if ($_SESSION['product_display'] == 1) echo 'selected' ; ?>>Rosnąco</option>
                            <option value="2" <?php if ($_SESSION['product_display'] == 2) echo 'selected' ; ?>>Malejąco</option>
                        </select>
                    </div>
                    <a href="products.php"><button class="ordinary_button" style="margin-top: 10px; float: right; height: 30px;" type="button">Usuń filtry</button></a>
                    <input type="submit" class="accept_filters" value="Zastosuj filtry">
            </form>
                </div>
                <div class="product_container">
                    <?php
                        $sql_select_submit = $conn->prepare($sql_select, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                        $sql_select_submitt = $sql_select_submit->execute(array(':cat_name' => $yesc));
                    
                        $count = $sql_select_submit->rowCount();
                    
                        if($count<1)
                        {
                            echo '<p style="font-size: 14px;">Brak produktów!</p>';
                        }
                        
                        else
                        {
                            while($res = $sql_select_submit -> fetch())
                        {
                            echo '<div class="product_bracket">';
                            echo '<img style="opacity: 0.5;" src="img-db/' . $res['product_image_path'] . '" alt="">';
                            echo '<div class="product_desc">';
                            echo '<h5>'.substr($res['product_name'], 0, 35).'</h5>';
                            echo '<div class="desc">';
                            if($res['product_status']==1) 
                            {
                                $sta='<span style="font-weight: bold;">Nieaktywne</span>';
                                echo 'Status: '.$sta.'<br>';
                            } 
                            else if($res['product_status']>1) 
                            {
                                $sta='<span style="color: #3c96d6; font-weight: bold;">Aktywne</span>';
                                echo 'Status: '.$sta.'<br>';
                            } 
                            else 
                            {
                                $sta='';
                            }
                            echo 'Kategoria: '.$res['category_name'].'<br>';
                            echo 'Liczba: '.$res['product_amount'].'<br>';
                            echo 'Data: '.date('d.m.Y', strtotime($res['product_from'])).'<br>';
                            if ($res['product_sale']==1)
                            {
                                echo '<p class="price" style="color: tomato;">Cena: '.$res['product_sale_price'].' PLN</p>';
                            }
                            else
                            {
                                echo '<p class="price">Cena: '.$res['product_price'].' PLN</p>';
                            }
                            echo '<a href="edit_product.php?pid=' . $res['product_id'] . '"><button class="product_button" style="margin-right: 0.2rem;">Edytuj</button></a>';
                            echo '<a href="php_scripts/products/delete_product.php?pid=' . $res['product_id'] . '"><button class="product_button_delete">Usuń</button></a>';
                            echo '</div></div></div>';
                            
                        }
                        }
                    ?>
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
                <form action="php_scripts/products/add_product.php" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>Nazwa produktu*</td><td><input class="marked" type="text" name="product_name"></td>
                        </tr>
                        <tr>
                            <td>Kategoria produktu</td>
                            <td>
                                <select name="category_id">
                                    <?php require_once "php_scripts/select_categories.php";
                                        select_categories();
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Opis produktu*</td><td><input type="text" name="product_desc"></td>
                        </tr>
                        <tr>
                            <td>Status produktu</td>
                            <td>
                                <select name="product_status">
                                    <option value="2">Aktywny</option>
                                    <option value="1">Nieaktywny</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Cena w PLN*</td><td><input class="marked" type="number" name="product_price" step="0.01"></td>
                        </tr>
                        <tr>
                            <td>Promocja i cena**</td>
                            <td>
                                <select name="product_sale">
                                    <option value="1">Aktywna</option>
                                    <option value="0" selected>Nieaktywna</option>
                                </select>
                            </td>
                            <td><input class="marked2" type="number" name="product_sale_price" step="0.01"></td>
                        </tr>
                        <tr>
                            <td>Data promocji</td>
                            <td>
                                Od:<br> <input type="datetime-local" name="product_sale_from">
                            </td>
                            <td>Do:<br> <input type="datetime-local" name="product_sale_to"></td>
                        </tr>
                        <tr>
                            <td>Ilość na magazynie</td><td><input type="number" name="product_amount" step="0.01></td>
                        </tr>
                        <tr>
                            <td>Zdjęcie produktu</td><td><label id="file_input_label" for="file_input">Wybierz plik</label><input id="file_input" type="file" name="product_image"></td>
                        </tr>
                        <tr>
                            <td><br>* pole musi zostać wypełnione<br>** jeśli została zaznaczona promocja należy wpisać cenę</td>
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
            </form>
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