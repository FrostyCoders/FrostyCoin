<?php
    require_once "basket.php";
    session_start();
    if (!isset($_COOKIE['stmt_cookie']))
    {
        setcookie('stmt_cookie', 1, time() + (24*3600), "/");
    }
    require_once "fp-admin/connect.php";
?>
<!DOCTYPE html>
<html>
<head>
    <!-- META -->
    <meta charset="utf-8">
    <meta name="author" content="FrostCoders">
    <meta name="description" content="Taaa jest">
    <meta name="keywords" content="frosty, coin">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FROSTY COIN</title>
    
    <!-- FAVICON -->
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" />
    
    <!-- SKRYPTY -->
    <script src="js/jquery-3.4.1.min.js"> </script>
    <script src="js/smoothscroll.js"> </script>
    
    <!-- STYLE I CZCIONKI -->
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/szablon.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/order_summary.css">
</head>
<body>
   
    <!-- PASEK NAWIGACYJNY -->
   <nav>
        <div class="nav-pasek">
            <div class="nav-logo"><a href="index.php"><img src="img/Logo.png" alt="Logo - obraz zmrożonej monety" /></a></div>
            <?php require_once "menu.php";?>
            </div>
    </nav>
    <!-- NAGŁÓWEK -->
    <header>
        <div class="sz-header-tlo" id="header">
            <div class="header-beam">
               <div class="header-icon-content"><p>Przejdź do konta.</p></div>
               <div class="header-icon"><a href="data.php"><img class="header-iconsize" src="img/icons/account-icon.svg"></a></div>
                <div class="header-icon-content">
                    <p>Coming Soon</p>
                </div>
                <div class="header-icon"><img class="header-iconsize" src="img/icons/basket-icon.svg"></div>
                <div class="header-icon-login"><img class="header-iconsize" src="img/icons/login-icon.svg"></div>
            </div>
            <h1 class="sz-header-h1">Frosty Coin</h1>
            
        </div>
    </header>
    
    <!-- ZAWARTOŚĆ -->
    <main>
      
       <div class="droga">Podsumowanie zamówienia</div><!--traceroute-->
        <div class="sz-main-container">
            <div class="sz-lista">
                 Sposób dostawy: <select id="delivery" name="delivery" from="">  
                    <option value="kurier">Kurier</option>
                    <option value="inpost">Inpost</option>
                    </select> <br /><br />
                        Sposób zapłaty:<br />
                        <input type="radio" id="cash" name="pay" value="cash">Za pobraniem przy odbiorze<br />
                        <input type="radio" id="card" name="pay" value="card">Kartą kredytową<br /><br />
                    Zgody Formalne:<br />
                    <input type="checkbox" id="statut" name="statut" value="statut">  Akceptuję regulamin sklepu*<br/>
                    <input type="checkbox" id="prom_info" name="prom_info" value="prom_info">
                     Chcę otrzymywać informacje o promocjach <br />
                       
                    <div style="color:red;">pola wymagane*</div>   
            </div>
    </main>
    
    <!-- STOPKA -->
    <footer>
            <div class="footer-beam">
                <div class="copyright">Copyright &copy 2020<br/>Frosty Coders<br/><span class="allrights">Wszelkie prawa zastrzeżone!</span></div>
                <div class="up-arrow"><a href="#header"><img src="img/icons/arrow-up.svg"></a></div>
                <div class="newsletter">
                  <p><b>Newsletter!</b> Nie przegap nadchodzących promocji!</p>
                   <form>
                       <input name="email" class="news-text" placeholder="Twój e-mail">
                       <input class="news-button" type="submit">
                   </form>
                </div>
            </div>
    </footer>
    
    <!-- SKRYPTY -->
    <script src="js/nav.js"></script>
    <script src="js/nav_addition.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>