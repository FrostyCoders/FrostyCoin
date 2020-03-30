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
    <link rel="stylesheet" href="css/other.css">
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
            <a href="statements.php"><div class="menu-element active">Komunikaty strony</div></a>
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
            <a href="menu_editor.php"><div class="menu-element">Menu główne</div></a>
            <a href="statements.php"><div class="menu-element active">Komunikaty strony</div></a>
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
                    Komunikaty strony
                </div>
                
                    <?php
                        require_once "connect.php"; 
                        $setnames = "SET NAMES utf8";
                        $conn->query($setnames);
                
                        $sql = "SELECT * FROM `statements` ORDER BY `statement_id` DESC LIMIT 1;";
                        $result = $conn->query($sql);
                        $show = $result -> fetch();
                
                        if($show==NULL)
                        {
                            echo '<div class="content-notify" style="background-color: black;">';
                            echo '<h4>Brak komunikatów!</h4>';
                            echo '<div><b>Tytuł</b> <br>Brak</div>';
                            echo '<div><b>Status</b> <br>Brak</div>';
                            echo '<div><b>Data i godzina</b> <br>Brak</div>';
                            echo '</div>';
                        }
                        else
                        {
                            $title = $show['statement_title'];
                            $status = $show['statement_status'];
                            $from = $show['statement_from'];
                            $fromsec = strtotime($from);
                            $to = $show['statement_to'];
                            $tosec = strtotime($to);
                            $date = new DateTime();
                            $currentdate = $date->getTimestamp();

                            if($status == 1 && $fromsec > $currentdate)
                            {
                                echo '<div class="content-notify" style="background-color: darkblue;">';
                                echo '<h4>Komunikat na stronie zaplanowany</h4>';
                                echo '<div><b>Tytuł</b> <br>'.$title.'</div>';
                                echo '<div><b>Status</b> <br>Zaplanowane</div>';
                                echo '<div><b>Data i godzina</b> <br>'.date('d.m.Y G:i', strtotime($from)).' - '.date('d.m.Y G:i', strtotime($to)).'</div>';
                                echo '</div>';
                            }
                            else if($status == 1 && $fromsec <= $currentdate && $tosec >= $currentdate)
                            {
                                echo '<div class="content-notify">';
                                echo '<h4>Komunikat na stronie aktywny</h4>';
                                echo '<div><b>Tytuł</b> <br>'.$title.'</div>';
                                echo '<div><b>Status</b> <br>Aktywny</div>';
                                echo '<div><b>Data i godzina</b> <br>'.date('d.m.Y G:i', strtotime($from)).' - '.date('d.m.Y G:i', strtotime($to)).'</div>';
                                echo '</div>';
                            }
                            else
                            {
                                echo '<div class="content-notify" style="background-color: grey;">';
                                echo '<h4>Komunikat na stronie nieaktywny</h4>';
                                echo '<div><b>Tytuł</b> <br>'.$title.'</div>';
                                echo '<div><b>Status</b> <br>Nieaktywny</div>';
                                echo '<div><b>Data i godzina</b> <br>'.date('d.m.Y G:i', strtotime($from)).' - '.date('d.m.Y G:i', strtotime($to)).'</div>';
                                echo '</div>';
                            }
                        }
                        $conn = null;
                        unset($conn);
                    ?>                    
                <form action="php_scripts/statements/statements_save.php" method="post">
                <div class="list_bracket" style="background-color: rgba(60, 150, 214, 0.1);">
                    <div class="sett_title">Modyfikować aktualny komunikat?</div>
                    <div class="sett_input_switch"><label class="switch"><input type="checkbox" name="mod"><span class="check"></span></label></div>
                </div>
                <div class="list_bracket">
                    <div class="sett_title">Aktywacja</div>
                    <div class="sett_input_switch"><label class="switch"><input type="checkbox" name="activation" checked><span class="check"></span></label></div>
                </div>
                <div class="list_bracket">
                    <div class="sett_title">Tutuł komunikatu</div>
                    <div class="sett_input"><input type="text" name="statement_title" placeholder="Wprowadź tytuł"></div>
                </div>
                <div class="list_bracket">
                    <div class="sett_title">Treść komunikatu</div>
                    <div class="sett_input"><input type="text" name="statement_desc" placeholder="Wprowadź treść" style="width: 250px;"></div>
                </div>
                <div class="list_bracket">
                    <div class="sett_title">Data i czas od kiedy</div>
                    <div class="sett_input"><input type="datetime-local" name="statement_from"></div>
                </div>
                <div class="list_bracket">
                    <div class="sett_title">Data i czas do kiedy</div>
                    <div class="sett_input"><input type="datetime-local" name="statement_to"></div>
                </div>
                <div class="save_changes">
                    <input type="submit" value="Zapisz">
                </div>
                </form>
            </div>
        </div>
    </main>
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
<?php
exit();
?>