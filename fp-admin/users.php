<?php
    session_start();
    if(!isset($_SESSION['fp-online']))
    {
        header("Location: index.php");
        exit();
    }
    require_once "connect.php";
    if(isset($_GET['filter']))
    {
       
       $search = $_POST['search'];
       $search_enter = $_POST['search_enter'];
       $search_user = $_POST['search_user'];
       $search_role = $_POST['search_role'];
       $search_sort_method = $_POST['search_sort_method'];
       $search_sort = $_POST['search_sort'];
       $search_from = $_POST['search_from'];
       $search_to = $_POST['search_to'];
       if($search_role=="Administrator")
         {
            $_SESSION['search_role'] = 1;
            if($search==2)
            {
               $_SESSION['search'] = 2;
               $sql1 = "SELECT * FROM panel_admins WHERE admin_email = '$search_enter' AND admin_create_time BETWEEN '$search_from' AND '$search_to' ORDER BY"; 
               if($search_sort_method==1)
               {
                  $sql2 = " admin_login";
                  $_SESSION['search_sort_method'] = 1;
               }
               else if ($search_sort_method==2)
               {
                  $sql2 = " admin_create_time";
                   $_SESSION['search_sort_method'] = 2;
               }
               if($search_sort==1)
               {
                  $sql3 = " ASC;";
                  $_SESSION['search_sort'] = 1;
               }
               else if($search_sort==2)
               {
                  $sql3 = " DESC;";
                  $_SESSION['search_sort'] = 2;
               }
            
            }
            else if ($search==1)
            {
               $_SESSION['search'] = 1;
               $sql1 = "SELECT * FROM panel_admins WHERE admin_login = '$search_enter' AND admin_create_time BETWEEN '$search_from' AND '$search_to' ORDER BY"; 
               if($search_sort_method==1)
               {
                  $sql2 = " admin_login";
                   $_SESSION['search_sort_method'] = 1;
               }
               else if ($search_sort_method==2)
               {
                  $sql2 = " admin_create_time";
                   $_SESSION['search_sort_method'] = 2;
               }
               if($search_sort==1)
               {
                  $sql3 = " ASC;";
                  $_SESSION['search_sort'] = 1;
               }
               else if($search_sort==2)
               {
                  $sql3 = " DESC;";
                  $_SESSION['search_sort'] = 2;
               } 
           }
        }
         else if ($search_role=="Klient")
         {
            $_SESSION['search_role'] = 2;
            if($search==2)
            {
               $_SESSION['search'] = 2;
               $sql1 = "SELECT * FROM shop_users WHERE user_email = '$search_enter' AND user_create_time BETWEEN '$search_from' AND '$search_to' ORDER BY"; 
               if($search_sort_method==1)
               {
                  $sql2 = " user_name";
                  $_SESSION['search_sort_method'] = 1;
               }
               else if ($search_sort_method==2)
               {
                  $sql2 = " user_create_time";
                  $_SESSION['search_sort_method'] = 2;
               }
               if($search_sort==1)
               {
                  $sql3 = " ASC;";
                  $_SESSION['search_sort'] = 1;
               }
               else if($search_sort==2)
               {
                  $sql3 = " DESC;";
                  $_SESSION['search_sort'] = 2;
               }
            }
            else if ($search==1)
            {
               $_SESSION['search'] = 1;
               $sql1 = "SELECT * FROM shop_users WHERE user_name = '$search_enter' AND user_create_time BETWEEN '$search_from' AND '$search_to' ORDER BY"; 
               if($search_sort_method==1)
               {
                  $sql2 = " user_name";
                   $_SESSION['search_sort_method'] = 1;
               }
               else if ($search_sort_method==2)
               {
                  $sql2 = " user_create_time";
                   $_SESSION['search_sort_method'] = 2;
               }
               if($search_sort==1)
               {
                  $sql3 = " ASC;";
                  $_SESSION['search_sort'] = 1;
               }
               else if($search_sort==2)
               {
                  $sql3 = " DESC;";
                  $_SESSION['search_sort'] = 2;
               }
            }
         }
       $sql_select = $sql1 . $sql2 . $sql3;
    }
  else
  {
     $sql_select = "SELECT * FROM panel_admins;";
     $_SESSION['search'] = 1;
     $_SESSION['search_role'] = 1;
     $_SESSION['search_sort'] = 1;
     $_SESSION['search_sort_method'] = 1;
     $_POST['search_enter'] = "";
     $search_role = "Administrator";
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
            <a href="orders.php"><div class="menu-element">Zamówienia</div></a>
            <a href="users.php"><div class="menu-element active">Użytkownicy</div></a>
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
            <a href="orders.php"><div class="menu-element">Zamówienia</div></a>
            <a href="users.php"><div class="menu-element active">Użytkownicy</div></a>
            <a href="settings.php"><div class="menu-element">Ustawienia</div></a>
            <p class="copy">Copyright &copy;<br>Frosty Coders - 2020<br>wersja 0.1.0</p>
        </div>
        <div id="content" class="content">
            <div id="content-frame" class="content-frame">
                <div class="content-title">
                    Użytkownicy
                    <div class="title_buttons">
                        <button id="add_admin_button" class="ordinary_button">Dodaj administratora</button>
                    </div>
                </div>
                <div class="product_filters">
                   <form action="users.php?filter=1" method="post">
                    <div class="filter_bracket">
                        Szukaj po <br>
                        <select name="search" id="">
                            <option value="1" <?php if($_SESSION['search'] == 1) echo 'selected' ; ?>>Imię</option>
                            <option value="2" <?php if($_SESSION['search'] == 2) echo 'selected' ; ?>>Email</option>
                        </select>
                        <br>
                        Wpisz <br>
                        <input type="text" name="search_enter" value="">
                        
                    </div>
                    <div class="filter_bracket">
                        Użytkowników na stronie <br>
                        <select name="search_user" id="">
                            <option value="">20</option>
                            <option value="">50</option>
                            <option value="">100</option>
                            <option value="">Wszyscy</option>
                        </select>
                    </div>
                    <div class="filter_bracket">
                        Rola <br>
                        <select name="search_role" id="">
                            <option value="Administrator" <?php if($_SESSION['search_role'] == 1) echo 'selected' ; ?>>Administrator</option>
                            <option value="Klient" <?php if($_SESSION['search_role'] == 2) echo 'selected' ; ?>>Klient</option>
                        </select>
                    </div>
                    <div class="filter_bracket">
                        Sortuj według <br>
                        <select name="search_sort_method" id="">
                            <option value="1" <?php if($_SESSION['search_sort'] == 1) echo 'selected' ; ?>>Nazwa</option>
                            <option value="2" <?php if($_SESSION['search_sort'] == 2) echo 'selected' ; ?>>Data utworzenia</option>
                        </select><br><br>
                        <select name="search_sort" id="">
                            <option value="1" <?php if($_SESSION['search_sort_method'] == 1) echo 'selected' ; ?>>Rosnąco</option>
                            <option value="2" <?php if($_SESSION['search_sort_method'] == 2) echo 'selected' ; ?>>Malejąco</option>
                        </select>
                    </div>
                    <div class="filter_bracket  filter_bracket_date">
                        Data rejestracji od<br>
                        <input type="date" name="search_from" value="0001-01-01"> <br>
                        Do<br>
                         <input type="date" name="search_to" value="9999-09-09">
                    </div>
                      <input type="submit" class="accept_filters" style="margin-top: 60px;" value="Zastosuj filtry">
                    </form>
                </div>
                <div class="list_container">
                    <div class="list">
                        <?php
                        $stmt = $conn->prepare("SELECT * FROM panel_admins WHERE admin_id != :id");
                        $stmt->bindParam(":id", $_SESSION['admin_id']);
                        try
                        {
                            $stmt->execute();
                        }
                        catch(Exception $e)
                        {
                            echo '<p style="width: 100%; text-align: center; font-size: 14px;">Wystąpił błąd podczas ładowania użytkowników!</p>';
                        }
                        if($stmt->rowCount() == 0)
                        {
                            echo '<p style="width: 100%; text-align: center; font-size: 14px;">Brak użytkowników w bazie!</p>';
                        }
                        else
                        {
                            while($row = $stmt->fetch())
                            {
                                $rights = explode(",", $row['admin_permissions']);
                                echo '<div id="order' . $row['admin_id'] . '" class="order_bracket">';
                                    echo '<p class="order_info"><i>Identyfikator użytkownika</i><br><b>' . $row['admin_id'] . '</b></p>';
                                    echo '<p class="order_info" style="width: 140px;"><i>Login admina</i><br><b>' . $row['admin_login'] . '</b></p>';
                                    echo '<p class="order_info"><i>Data utworzenia</i><br><b>' . date("d-m-Y", strtotime($row['admin_create_time'])) . '</b></p>';
                                    echo '<p class="order_info"><i>E-mail administratora</i><br><b>' . $row['admin_email'] . '</b></p>';
                                    echo '<div class="order_collapse">';
                                        echo '<button id="collapse_button' . $row['admin_id'] . '" onclick="collapse_order(' . $row['admin_id'] . ');" class="ordinary_button">Edycja</button>';
                                        echo '<button id="hide_button' . $row['admin_id'] . '" onclick="hide_order(' . $row['admin_id'] . ');" class="ordinary_button" style="display: none;">Anuluj</button>';
                                    echo '</div>';
                                    echo '<div id="order_details' . $row['admin_id'] . '" class="order_details corr" style="display: none;">';
                                    echo '<form action="php_scripts/users/change_admin.php?aid=' . $row['admin_id'] . '" method="post">';
                                        echo '<table>';
                                            echo '<tr>';
                                                echo '<td class="right_desc">E-mail:</td><td><input type="text" name="email" value="' . $row['admin_email'] . '"></td>';
                                            echo '</tr>';
                                            echo '<tr>';
                                                echo '<td class="right_desc">Uprawnienia do operacji na użytkownikach:</td><td><select name="user">';
                                                if($rights[0] == 1)
                                                {
                                                    echo '<option value="1" selected>Tak</option>';
                                                    echo '<option value="0">Nie</option>';
                                                }
                                                else
                                                {
                                                    echo '<option value="1">Tak</option>';
                                                    echo '<option value="0" selected>Nie</option>';
                                                }
                                                echo '</select></td>';
                                            echo '</tr>';
                                            echo '<tr>';
                                                echo '<td class="right_desc">Uprawnienia do operacji na produktach:</td><td><select name="product">';
                                                if($rights[1] == 1)
                                                {
                                                    echo '<option value="1" selected>Tak</option>';
                                                    echo '<option value="0">Nie</option>';
                                                }
                                                else
                                                {
                                                    echo '<option value="1">Tak</option>';
                                                    echo '<option value="0" selected>Nie</option>';
                                                }
                                                echo '</select></td>';
                                            echo '</tr>';
                                            echo '<tr>';
                                                echo '<td class="right_desc">Uprawnienia do operacji na witrynie:</td><td><select name="site">';
                                                if($rights[2] == 1)
                                                {
                                                    echo '<option value="1" selected>Tak</option>';
                                                    echo '<option value="0">Nie</option>';
                                                }
                                                else
                                                {
                                                    echo '<option value="1">Tak</option>';
                                                    echo '<option value="0" selected>Nie</option>';
                                                }
                                                echo '</select></td>';
                                            echo '</tr>';
                                            echo '<tr>';
                                                echo '<td class="right_desc">Uprawnienia do operacji na zamówieniach:</td><td><select name="orders">';
                                                if($rights[3] == 1)
                                                {
                                                    echo '<option value="1" selected>Tak</option>';
                                                    echo '<option value="0">Nie</option>';
                                                }
                                                else
                                                {
                                                    echo '<option value="1">Tak</option>';
                                                    echo '<option value="0" selected>Nie</option>';
                                                }
                                                echo '</select></td>';
                                            echo '</tr>';
                                        echo '</table>';
                                        echo '<div class="controls">';
                                            echo '<input type="submit" value="Zapisz"><a href="php_scripts/users/delete_admin.php?aid=' . $row['admin_id'] . '"><button class="ordinary_button" type="button">Usuń</button></a>';
                                        echo '</div>';
                                        echo '</form>';
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
    <div id="add_admin_form" class="add_form_popup">
        <div class="popup_frame">
            <div class="close_window">
                <img id="close_popup" src="img/remove.png" alt="Zamknij" title="Anuluj">
            </div>
            <div class="content-title">
                Dodaj administratora
            </div>
            <div class="popup_inputs">
                <form action="php_scripts/users/add_admin.php" method="post">
                    <table>
                        <tr>
                            <td>Nazwa administratora*</td><td><input class="marked" type="text" name="admin_name"></td>
                        </tr>
                        <tr>
                            <td>Adres e-mail*</td>
                            <td>
                                <input class="marked" type="text" name="admin_email">
                            </td>
                        </tr>
                        <tr>
                            <td>Hasło*</td>
                            <td>
                                <input type="password" name="admin_password">
                            </td>
                        </tr>
                        <tr>
                            <td>Powtórz hasło*</td>
                            <td>
                                <input type="password" name="admin_password2">
                            </td>
                        </tr>
                        <tr>
                            <td>Operacje na użytkownikach</td>
                            <td>
                                <select name="admin_p_users">
                                    <option value="1">Tak</option>
                                    <option value="0" selected>Nie</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Operacje na produktach</td>
                            <td>
                                <select name="admin_p_products">
                                    <option value="1">Tak</option>
                                    <option value="0" selected>Nie</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Operacje na stronie</td>
                            <td>
                                <select name="admin_p_site">
                                    <option value="1">Tak</option>
                                    <option value="0" selected>Nie</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Operacje na zamówieniach</td>
                            <td>
                                <select name="admin_p_orders">
                                    <option value="1">Tak</option>
                                    <option value="0" selected>Nie</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><br>* pole musi zostać wypełnione</td>
                        </tr>
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
            $("#add_admin_button").click(function(){
                $('main').css({"pointer-events" : "none"});
                $("#add_admin_form").fadeIn();
            });
            $("#close_popup").click(function(){
                $('main').css({"pointer-events" : "all"});
                $("#add_admin_form").fadeOut();
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