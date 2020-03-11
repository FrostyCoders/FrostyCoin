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
        $product_sort = $_POST['sort'];
        $product_quantity = $_POST['quantity'];
        $product_discount = $_POST['discount'];
        $product_status = $_POST['status'];
        $sql1 = "SELECT `products`.*, `product_categories`.`category_name` FROM `products` INNER JOIN `product_categories` ON `products`.`category_id`=`product_categories`.`category_id`";
        //  WHERE `products`.`product_status`=1;
        if(isset($_SESSION['product_categories']))
        {
            unset($_SESSION['product_categories']);
            unset($_SESSION['product_sort']);
            unset($_SESSION['product_quantity']);
            unset($_SESSION['product_discount']);
            unset($_SESSION['product_status']);
        }
        if($product_categories>0)
        {
            $sql_categories_query = "SELECT `category_id`, `category_name` FROM `product_categories` WHERE `category_id` =".$product_categories.";";
            $sql_categories_query = $conn->query($sql_categories_query);
            while($categories_query = $sql_categories_query -> fetch())
            {
                $sql2 = " WHERE `category_name`=".$categories_query['category_name'];
                $_SESSION['product_categories'] = $categories_query['category_id'];
            }
        }
        else
        {
            $sql2 = " WHERE `category_name` LIKE '%%'";
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
            case "def":
            {
                $sql5 = "";
                $_SESSION['product_discount'] = 0;
                break;
            }
            case 1:
            {
                $sql5 = " AND `products`.`product_sale`=1";
                $_SESSION['product_discount'] = 1;
                break;
            }
            case 2:
            {
                $sql5 = " AND `products`.`product_sale`=0";
                $_SESSION['product_discount'] = 2;
                break;
            }
            
        }
        
        switch($product_status)
        {
            case 1:
            {
                $sql6 = " ASC";
                $_SESSION['product_status'] = 1;
                break;
            }
            case 2:
            {
                $sql6 = " DESC";
                $_SESSION['product_status'] = 2;
                break;
            }
            
        }
        $sql_select = $sql1 . $sql2 . $sql5 . $sql3 . $sql6 . $sql4;
    }
    else
    {
        $sql_select = "SELECT `products`.*, `product_categories`.`category_name` FROM `products` INNER JOIN `product_categories` ON `products`.`category_id`=`product_categories`.`category_id` ORDER BY `products`.`product_name` ASC LIMIT 20;";
        $_SESSION['product_categories'] = 0;
        $_SESSION['product_sort'] = 0;
        $_SESSION['product_quantity'] = 1;
        $_SESSION['product_discount'] = 0;
        $_SESSION['product_status'] = 0;
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
            <a href="statements.php"><div class="menu-element">Komunikaty strony</div></a>
            <a href="footer.php"><div class="menu-element">Stopka</div></a>
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
<!-- START -->
            <form action="products.php?filter=1" method="post">
                    <div class="filter_bracket">
                        Kategoria <br>
                        <select name="categories" id="">
                            <option value="def">Wybierz</option>
                        <?php
                            require_once "fp-config.php";
                            try
                            {
                            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            }
                            catch(PDOException $e)
                            {
                            $_SESSION["login_warning"] = "Krytyczny błąd! Spróbuj ponownie później.";
                            header("Location: index.php");
                            exit();
                            } 

                            $setnames = "SET NAMES utf8";
                            $conn->query($setnames);

                            $sql = "SELECT * FROM `product_categories` WHERE `category_status` = 1;";
                            $result = $conn->query($sql);
                
                            while($row = $result -> fetch())
                            {
                                echo "<option value=".$row['category_id'].">".$row['category_name']."</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <div class="filter_bracket">
                        Sortuj według <br>
                        <select name="sort" id="">
                            <option value="1">Nazwa</option>
                            <option value="2">Ilość</option>
                            <option value="3">Cena podstawowa</option>
                            <option value="4">Data wprowadzenia</option>
                        </select>
                    </div>
                    <div class="filter_bracket">
                        Produktów na stronie <br>
                        <select name="quantity" id="">
                            <option value="1">20</option>
                            <option value="2">50</option>
                            <option value="3">100</option>
                            <option value="4">Wszystkie</option>
                        </select>
                    </div>
                    <div class="filter_bracket">
                        Przecena <br>
                        <select name="discount" id="">
                            <option value="def">Wybierz</option>
                            <option value="1">Tak</option>
                            <option value="2">Nie</option>
                        </select>
                    </div>
                    <div class="filter_bracket">
                        Wyświetl <br>
                        <select name="status" id="">
                            <option value="1">Rosnąco</option>
                            <option value="2">Malejąco</option>
                        </select>
                    </div>
                    <input type="submit" class="accept_filters" value="Zastosuj filtry">
            </form>
<!-- END -->
                </div>
                <div class="product_container">
                    <?php
                        $sql_select_submit = $conn->query($sql_select);
                        while($res = $sql_select_submit -> fetch())
                        {
                            echo "<div class='product_bracket'>";
                            echo "<img src=".$res['product_image_path']." alt='' onerror="."this.src='../img/package.png';".">";
                            echo "<div class='product_desc'>";
                            echo "<h5>".$res['product_name']."</h5>";
                            echo "<div class='desc'>";
                            echo "Kategoria: ".$res['category_name']."<br>";
                            echo "Liczba: ".$res['product_amount']."<br>";
                            echo "Data: ".date('d.m.Y', strtotime($res['product_from']))."<br>";
                            if ($res['product_sale']==1)
                            {
                                echo "<p class='price' style='color: tomato;'>Cena: ".$res['product_sale_price']." PLN</p>";
                            }
                            else
                            {
                                echo "<p class='price'>Cena: ".$res['product_price']." PLN</p>";
                            }
                            echo "<button class='product_button' style='margin-right: 0.2rem;'>Edytuj</button>";
                            echo "<button class='product_button_delete'>Usuń</button>";
                            echo "</div></div></div>";
                            
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
                        <td>Opis produktu</td><td><input type="text"></td>
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
<?php
    $conn = null;
    unset($conn);
    exit();
?>