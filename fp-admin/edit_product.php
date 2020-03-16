<?php
    session_start();
    if(!isset($_SESSION['fp-online']) && ($_SESSION['fp-online'] != true))
    {
        header("Location: main_page.php");
        exit();
    }
    require_once "connect.php";
    $product_id = $_GET['pid'];
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = :product_id");
    $stmt->bindParam(":product_id", $product_id);
    try
    {
        $stmt->execute();
        $result = $stmt->fetch();
    }
    catch(Exception $e)
    {
        $_SESSION['result'] = "Wystąpił błąd podczas pobierania danych pliku!";
        header("Location: products.php");
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
    <link rel="stylesheet" href="css/edit_product.css">
    <script src="js/jquery.js"></script>
</head>
<body>
    <header class="row">
        <div class="banner col-12">
            <img class="banner-logo" src="img/logo.png" alt="logo"><label class="banner-system-name">Frosty Panel</label>
            <a href="#" class="banner-logout" title="Wyloguj się"><img src="img/logout.png" alt="logout"></a>
            <a href="#" class="banner-user" title="Ustawienia"><img src="img/user.png" alt="user"><label class="banner-username">Admin</label></a>
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
            <a href="products.php"><div class="menu-element">Produkty</div></a>
            <a href="orders.php"><div class="menu-element">Zamówienia</div></a>
            <a href="users.php"><div class="menu-element">Użytkownicy</div></a>
            <a href="settings.php"><div class="menu-element">Ustawienia</div></a>
            <p class="copy">Copyright &copy;<br>Frosty Coders - 2020<br>wersja 0.1.0</p>
        </div>
        <div class="content">
            <div class="content-frame">
                <div class="content-title">Edycja produktu <?php echo $result['product_name'];?></div>
                <div class="content-main">
                    <div id="bracket1" class="bracket">
                        <label class="bracket_desc">Zdjęcie produktu</label>
                        <img class="photo_preview" src="img-db/<?php echo $result['product_image_path'];?>">
                        <div class="bracket_control">
                            <form action="php_scripts/change_photo.php?pid=<?php echo $result['product_id']?>" method="post" enctype="multipart/form-data">
                                <label id="file_input_label" for="file_input">Wybierz plik</label><input id="file_input" type="file" name="product_image">
                                <input type="submit" value="Zmień zdjęcie"><br>
                            </form>
                            <a href="php_scripts/delete_photo.php?pid=<?php echo $result['product_id'];?>&imgname=<?php echo $result['product_image_path'];?>"><button>Usuń zdjęcie</button></a>
                            <script>
                            $(document).ready(function(){
                                $("#file_input").on("change", function(){
                                    $("#file_input_label").text("Plik gotowy!");
                                    $("#file_input_label").css({"background-color" : "var(--color-theme)"}).css({"border" : "2px solid var(--color-theme)"});
                                });
                            });
                        </script>
                        </div>
                    </div>
                    <form action="php_scripts/update_product.php" method="php">
                    <div id="bracket2" class="bracket">
                        <label class="bracket_desc">Nazwa</label>
                        <input type="text" value="<?php echo $result['product_name'];?>">
                    </div>
                    <div id="bracket3" class="bracket">
                        <label class="bracket_desc">Opis</label>
                        <textarea name=""><?php echo $result['product_desc'];?></textarea>
                    </div>
                    <div id="bracket4" class="bracket">
                        <label class="bracket_desc">Cena</label>
                        <input type="number" value="<?php echo $result['product_price'];?>">
                    </div>
                    <div id="bracket5" class="bracket">
                        <label class="bracket_desc">Status promocji</label>
                        <select name="" id="">
                            <option value="" <?php if($result['product_status'] > 1){echo "selected";}?>>Aktywny</option>
                            <option value="" <?php if($result['product_status'] == 1){echo "selected";}?>>Nieaktywny</option>
                        </select>
                    </div>
                    <div id="bracket6" class="bracket">
                        <label class="bracket_desc">Cena promocyjna</label>
                        <input type="number" value="<?php echo $result['product_sale_price'];?>">
                    </div>
                    <div id="bracket7" class="bracket">
                        <label class="bracket_desc">Promocja od:</label>
                        <input type="datetime-local" value="<?php echo $result['product_sale_from'];?>">
                    </div>
                    <div id="bracket8" class="bracket">
                        <label class="bracket_desc">Promocja do:</label>
                        <input type="datetime-local" value="<?php echo $result['product_sale_to'];?>">
                    </div>
                    <div id="bracket9" class="bracket">
                        <label class="bracket_desc">Ilość na magazynie</label>
                        <input type="number" value="<?php echo $result['product_amount'];?>">
                    </div>
                    <div class="save_changes">
                        <input type="submit" value="Zapisz">
                    </div>
                    </form>
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
        $conn = null;
    ?>
    <script src="js/scripts.js"></script>
</body>
</html>