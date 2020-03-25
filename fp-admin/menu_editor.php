<?php
    session_start();
    if(!isset($_SESSION['fp-online']))
    {
        header("Location: index.php");
        exit();
    }
    require_once "php_scripts/select_categories.php";
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
                <?php
                    require_once "connect.php";
                    $stmt = $conn->prepare("SELECT * FROM menu_positions");
                    $stmt2 = $conn->prepare("SELECT * FROM menu_subpositions WHERE position_id = :pid");
                    $stmt_cat = $conn->prepare("SELECT * FROM product_categories WHERE category_status = 1 ORDER BY category_name");
                    try
                    {
                        $stmt->execute();
                        $count = $stmt->rowCount();
                    }
                    catch(Exception $e)
                    {
                        echo '<p class="error_p">Wystąpił błąd podczas wyświetlania pozycji!</p>';
                    }
                    if($count == 0)
                    {
                        echo '<p class="error_p">Brak pozycji w bazie!</p>';
                    }
                    else
                    {
                        while($row = $stmt->fetch())
                        {
                            echo '<div id="position' . $row['position_id'] . '" class="menu_position">';
                                echo '<div class="show_position">';
                                    echo '<div class="collapse_button collapse" onclick="collapse(' . $row['position_id'] . ');"><img src="img/arrow.png" alt=""></div>';
                                    echo '<div class="collapse_button hide" onclick="hide(' . $row['position_id'] . ');"><img src="img/arrow.png"></div>';
                                    echo '<div class="position_icon"><img src="img-db/menu_icons/' . $row['position_icon_path'] . '" alt=""></div>';
                                    echo '<div class="position_name">' . $row['position_name'] . '</div>';
                                    echo '<div class="menu_position_control">';
                                        echo '<button onclick="add_subposition(' . $row['position_id'] . ');" class="ordinary_button">Dodaj podpozycję</button>';
                                        echo '<button onclick="show_edit(' . $row['position_id'] . ');" class="ordinary_button">Edytuj</button>';
                                        echo '<button onclick="delete_position(' . $row['position_id'] . ');" class="ordinary_button">Usuń</button>';
                                    echo '</div>';
                                echo '</div>';
                                echo '<div class="edit_position">';
                                    echo '<div class="edit_icon">';
                                        echo '<img src="img-db/menu_icons/' . $row['position_icon_path'] . '" alt="">';
                                        echo '<form action="php_scripts/menu/change_icon.php?sub=0&pid=' . $row['position_id'] . '" method="post" enctype="multipart/form-data">';
                                            echo '<label id="file_label' . $row['position_id'] . '" class="file_input_label" for="file' . $row['position_id'] . '">Wybierz plik</label><input id="file' . $row['position_id'] . '" class="file_input" type="file" name="position_icon">';
                                            echo '<input type="submit" value="Zmień">';
                                            echo '<a href="php_scripts/menu/delete_icon.php?sub=0&pid=' . $row['position_id'] . '"><button type="button" class="ordinary_button" style="width: 100px;">Usuń</button></a>';
                                            echo '<script>$("#file' . $row['position_id'] . '").on("change", function(){$("#file_label' . $row['position_id'] . '").text("Plik gotowy!");$("#file_label' . $row['position_id'] . '").css({"background-color" : "var(--color-theme)"}).css({"border" : "2px solid var(--color-theme)"});});</script>';
                                        echo '</form>';
                                    echo '</div>';
                                    echo '<form action="php_scripts/menu/edit_position.php?sub=0&pid=' . $row['position_id'] . '" method="post">';
                                        echo '<div class="edit_info">';
                                            echo '<table>';
                                                echo '<tr><td class="edit_desc">Nazwa:</td><td><input type="text" name="position_name" value="' . $row['position_name'] . '"></td></tr>';
                                                echo '<tr><td class="edit_desc">Odnośnik do strony:</td><td>';
                                                    echo '<select name="position_ref">';
                                                        echo '<option value="0">Brak</option>';
                                                        $directory = "../";
                                                        foreach (glob("$directory*.{php,html,htm,txt,png,jpeg,pdf}", GLOB_BRACE) as $filename)
                                                        {
                                                            $filename = explode("/", $filename);
                                                            if($row['position_reference_to'] == $filename[1])
                                                            {
                                                                echo '<option value="' . $filename[1] . '" selected>' . $filename[1] . '</option>';
                                                            }
                                                            else
                                                            {
                                                                echo '<option value="' . $filename[1] . '">' . $filename[1] . '</option>';
                                                            }
                                                        }
                                                    echo '</select>';
                                                echo '</td></tr>';
                                                echo '<tr><td class="edit_desc">Odnośnik do kategorii:</td><td>';
                                                        echo '<select name="position_ref_cat"><option value="">Brak</option>';
                                                            try
                                                            {
                                                                $stmt_cat->execute();
                                                                while($cat = $stmt_cat->fetch())
                                                                {
                                                                    if($row['position_cat_reference'] == $cat['category_id'])
                                                                    {
                                                                        echo '<option value="' . $cat['category_id'] . '" selected>' . $cat['category_name'] . '</option>';
                                                                    }
                                                                    else
                                                                    {
                                                                        echo '<option value="' . $cat['category_id'] . '">' . $cat['category_name'] . '</option>';
                                                                    }
                                                                }
                                                            }
                                                            catch(Exception $e)
                                                            {
                                                                echo '<option value="1">Wystąpił problem z wyświetleniem kategorii!</option>';
                                                            }
                                                        echo '</select>';
                                                echo '</td></tr>';
                                            echo '</table>';
                                        echo '</div>';
                                        echo '<div class="edit_control">';
                                            echo '<input type="submit" value="Zapisz">';
                                            echo '<button onclick="cancel_edit(' . $row['position_id'] . ');" class="ordinary_button" type="button">Anuluj</button>';
                                        echo '</div>';
                                    echo '</form>';
                                echo '</div>';
                            echo '</div>';
                            echo '<div id="subposition_bracket' . $row['position_id'] . '" class="subposition_bracket">';
                                try
                                {
                                    $stmt2->bindParam(":pid", $row['position_id']);
                                    $stmt2->execute();
                                    $scount = $stmt2->rowCount();
                                }
                                catch(Exception $e)
                                {
                                    echo '<p class="error_p">Wystąpił błąd podczas wyświetlania podpozycji!</p>';
                                }
                                if($scount == 0)
                                {
                                    echo '<p class="error_p">Brak podpozycji dla tej pozycji!</p>';
                                }
                                else
                                {
                                    while($row2 = $stmt2->fetch())
                                    {
                                        echo '<div id="subposition' . $row2['subposition_id'] . '" class="menu_position">';
                                            echo '<div class="show_position">';
                                                echo '<div class="position_icon"><img src="img-db/menu_icons/' . $row2['subposition_icon_path'] . '" alt=""></div>';
                                                echo '<div class="position_name">' . $row2['subposition_name'] . '</div>';
                                                echo '<div class="menu_position_control">';
                                                    echo '<button onclick="show_edit_sub(' . $row2['subposition_id'] . ');" class="ordinary_button">Edytuj</button>';
                                                    echo '<a href="php_scripts/menu/delete_subposition.php?pid=' . $row2['subposition_id'] . '"><button class="ordinary_button">Usuń</button></a>';
                                                echo '</div>';
                                            echo '</div>';
                                            echo '<div class="edit_position">';
                                            echo '<div class="edit_icon">';
                                                echo '<img src="img-db/menu_icons/' . $row2['subposition_icon_path'] . '" alt="">';
                                                echo '<form action="php_scripts/menu/change_icon.php?sub=1&pid=' . $row2['subposition_id'] . '" method="post" enctype="multipart/form-data">';
                                                    echo '<label id="sub_file_label' . $row2['subposition_id'] . '" class="file_input_label" for="sub_file' . $row2['subposition_id'] . '">Wybierz plik</label><input id="sub_file' . $row2['subposition_id'] . '" class="file_input" type="file" name="position_icon">';
                                                    echo '<input type="submit" value="Zmień">';
                                                    echo '<a href="php_scripts/menu/delete_icon.php?sub=1&pid=' . $row2['subposition_id'] . '&icon=' . $row2['subposition_icon_path'] . '"><button type="button" class="ordinary_button" style="width: 100px;">Usuń</button></a>';
                                                    echo '<script>$(document).ready(function(){$("#sub_file' . $row2['subposition_id'] . '").on("change", function(){$("#sub_file_label' . $row2['subposition_id'] . '").text("Plik gotowy!");$("#sub_file_label' . $row2['subposition_id'] . '").css({"background-color" : "var(--color-theme)"}).css({"border" : "2px solid var(--color-theme)"}););});</script>';
                                                echo '</form>';
                                            echo '</div>';
                                            echo '<form action="php_scripts/menu/edit_position.php?sub=1&pid=' . $row2['subposition_id'] . '" method="post">';
                                                echo '<div class="edit_info">';
                                                    echo '<table>';
                                                        echo '<tr><td class="edit_desc">Nazwa:</td><td><input type="text" name="position_name" value="' . $row2['subposition_name'] . '"></td></tr>';
                                                        echo '<tr><td class="edit_desc">Odnośnik do strony:</td><td>';
                                                            echo '<select name="position_ref">';
                                                                echo '<option value="0">Brak</option>';
                                                                $directory = "../";
                                                                foreach (glob("$directory*.{php,html,htm,txt,png,jpeg,pdf}", GLOB_BRACE) as $filename)
                                                                {
                                                                    $filename = explode("/", $filename);
                                                                    if($row2['subposition_reference_to'] == $filename[1])
                                                                    {
                                                                        echo '<option value="' . $filename[1] . '" selected>' . $filename[1] . '</option>';
                                                                    }
                                                                    else
                                                                    {
                                                                        echo '<option value="' . $filename[1] . '">' . $filename[1] . '</option>';
                                                                    }
                                                                }
                                                            echo '</select>';
                                                        echo '</td></tr>';
                                                        echo '<tr><td class="edit_desc">Odnośnik do kategorii:</td><td>';
                                                        echo '<select name="position_ref_cat"><option value="0">Brak</option>';
                                                            try
                                                            {
                                                                $stmt_cat->execute();
                                                                while($cat = $stmt_cat->fetch())
                                                                {
                                                                    if($row2['subposition_cat_reference'] == $cat['category_id'])
                                                                    {
                                                                        echo '<option value="' . $cat['category_id'] . '" selected>' . $cat['category_name'] . '</option>';
                                                                    }
                                                                    else
                                                                    {
                                                                        echo '<option value="' . $cat['category_id'] . '">' . $cat['category_name'] . '</option>';
                                                                    }
                                                                }
                                                            }
                                                            catch(Exception $e)
                                                            {
                                                                echo '<option value="1">Wystąpił problem z wyświetleniem kategorii!</option>';
                                                            }
                                                            
                                                        echo '</select>';
                                                        echo '</td></tr>';
                                                    echo '</table>';
                                                echo '</div>';
                                                echo '<div class="edit_control">';
                                                    echo '<input type="submit" value="Zapisz">';
                                                    echo '<button onclick="cancel_edit_sub(' . $row2['subposition_id'] . ');" class="ordinary_button" type="button">Anuluj</button>';
                                                echo '</div>';
                                            echo '</form>';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                }
                                echo '<div id="add_subposition' . $row['position_id'] . '" class="add_position">';
                                    echo '<form action="php_scripts/menu/add_subposition.php?pid=' . $row['position_id'] . '" method="post" enctype="multipart/form-data">';
                                        echo '<div class="add_icon">';
                                            echo '<p>Zdjęcie</p>';
                                            echo '<label id="add_icon_subposition' . $row['position_id'] . '" class="file_input_label" for="add_icon_subposition_input' . $row['position_id'] . '">Wybierz plik</label><input id="add_icon_subposition_input' . $row['position_id'] . '" class="file_input" type="file" name="subposition_icon">';
                                            echo '<script>$("#add_icon_subposition_input' . $row['position_id'] . '").on("change", function(){$("#add_icon_subposition' . $row['position_id'] . '").text("Plik gotowy!");$("#add_icon_subposition' . $row['position_id'] . '").css({"background-color" : "var(--color-theme)"}).css({"border" : "2px solid var(--color-theme)"});});</script>';
                                        echo '</div>';
                                        echo '<div class="add_name">';
                                            echo '<p>Nazwa</p>';
                                            echo '<input type="text" name="subposition_name">';
                                        echo '</div>';
                                        echo '<div class="add_reflink">';
                                            echo '<p>Odnośnik do strony</p>';
                                            echo '<select name="subposition_ref">';
                                                echo '<option value="0">Brak</option>';
                                                $directory = "../";
                                                foreach (glob("$directory*.{php,html,htm,txt,png,jpeg,pdf}", GLOB_BRACE) as $filename)
                                                {
                                                    $filename = explode("/", $filename);
                                                    echo '<option value="' . $filename[1] . '">' . $filename[1] . '</option>';
                                                }
                                            echo '</select>';
                                        echo '</div>';
                                        echo '<div class="add_reflink">';
                                            echo '<p>Odnośnik do kategorii</p>';
                                            echo '<select name="subposition_ref_cat">';
                                                echo '<option value="0">Brak</option>';
                                                select_categories();
                                            echo '</select>';
                                        echo '</div>';
                                        echo '<div class="edit_control">';
                                            echo '<input type="submit" value="Dodaj">';
                                            echo '<button onclick="cancel_add(' . $row['position_id'] . ')" class="ordinary_button">Anuluj</button>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</form>';
                            echo '</div>';
                        }
                    }
                ?>
                <div id="add_position" class="add_position">
                    <form action="php_scripts/menu/add_position.php" method="post" enctype="multipart/form-data">
                        <div class="add_icon">
                            <p>Zdjęcie</p>
                            <label id="add_icon_position" class="file_input_label" for="add_icon_position_input">Wybierz plik</label><input id="add_icon_position_input" class="file_input" type="file" name="position_icon">
                        </div>
                        <div class="add_name">
                            <p>Nazwa</p>
                            <input type="text" name="position_name" minlength="3" maxlength="20" required>
                        </div>
                        <div class="add_reflink">
                            <p>Odnośnik do strony</p>
                            <select name="position_ref">
                                <option value="0">Brak</option>
                                <?php
                                    $directory = "../";
                                    foreach (glob("$directory*.{php,html,htm,txt,png,jpeg,pdf}", GLOB_BRACE) as $filename) {
                                        $filename = explode("/", $filename);
                                        echo '<option value="' . $filename[1] . '">' . $filename[1] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="add_reflink">
                            <p>Odnośnik do kategorii</p>
                            <select name="position_ref_cat">
                                <option value="0">Brak</option>
                                <?php select_categories();?>
                            </select>
                        </div>
                        <div class="edit_control">
                            <input type="submit" value="Dodaj">
                            <button id="cancel_add" class="ordinary_button" type="button">Anuluj</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="js/menu_editor.js"></script>
    <script src="js/scripts.js"></script>
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
</body>
</html>