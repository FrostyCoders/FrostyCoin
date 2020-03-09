<?php
 session_start();

 if (!isset($_SESSION['logged']))
    {
       header('Location: login.php');
       exit();
    }
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
    <link rel="shortcut icon" href="#" type="image/x-icon" />
    
    <!-- STYLE I CZCIONKI -->
    <link rel="stylesheet" type="text/css" href="css/animate.css" />
    <link rel="stylesheet" type="text/css" href="css/data.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
</head>
<body>
    <!-- PASEK NAWIGACYJNY -->
    <nav>
        <div class="nav-pasek">
            <div class="nav-logo"><a href="index.html"><img src="img/Logo.png" alt="Logo - obraz zmrożonej monety" /></a></div>
            <div class="nav-zawartosc nav-js">
                <div class="nav-zakladka">
                    Zamówienia
                </div>
                <div class="nav-ikona">
                    <img class="nav-iconsize" src="img/icons/cart-icon.svg">
                </div>
            </div>
            <div class="nav-zawartosc nav-js">
                <div class="nav-zakladka">
                    Zmiana danych
                </div>
                <div class="nav-ikona">
                    <img class="nav-iconsize" src="img/icons/account-icon.svg">
                </div>
            </div>
            
        </div>
    </nav>
    
    <!-- NAGŁÓWEK -->
    <header>
        <div class="log-header-tlo">
            <div class="header-beam">
                <div class="header-icon-content">
                    <input type="search" class="input-search" placeholder="Wyszukaj..."/>
                </div>
                <div class="header-icon"><img class="header-iconsize" src="img/icons/search-icon.svg"></div>
                <div class="header-icon-content">
                    <p>Kup cosik, bo braki mamy</p><!-- XDD zapisz co chcesz -->
                </div>
                <div class="header-icon"><img class="header-iconsize" src="img/icons/basket-icon.svg"></div>
                <div class="header-icon-login"><a href="logout.php" ><img class="header-iconsize" src="img/icons/login-icon.svg"></a></div>
            </div>
            <h1 class="log-header-h1">Frosty Coin</h1>
            
        </div>
    </header>
    
    <!-- ZAWARTOŚĆ -->
    <main>
       <div class="droga"><?php echo "<span>Zalogowano jako: ".$_SESSION['user_name']."!"; ?></div><!--traceroute-->
        <div class="data-main-container">
          <h2>Zmień swoje dane:</h2>
            <div class="data-container">
             <div class="data-log-container">
                  <form>
                     <label><div>Login: </div><input type="text" value="Example"></label>
                     <label><div>E-mail: </div><input type="text" value="Example@gmail.com"></label>
                     <label><div>Stare hasło: </div><input type="password" value="example"></label>
                     <label><div>Nowe hasło: </div><input type="password" value="example"></label>
                     <label><div>Powtórz: </div><input type="password" value="example"></label>
                     <input type="submit" value="Zmień" class="login-button">
                  </form>
             </div>
             <div class="data-log-container">
                  <form>
                     <label><div>Imie: </div><input type="text" value="Example"></label>
                     <label><div>Nazwisko: </div><input type="text" value="Example"></label>
                     <label><div>Miejscowość: </div> <input type="text" value="Example"></label>
                     <label><div>Ulica: </div><input type="text" value="Example"></label>
                     <label><div>Nr domu/localu: </div><input type="text" value="Example"></label>
                     <label><div>Data urodzenia:</div> <input type="text" value="Example"></label>
                     <label><div>Kod pocztowy: </div><input type="text" value="Example"></label>
                     <label><div>Telefon: </div><input type="text" value="Example"></label>
                     <input type="submit" value="Zmień" class="login-button">
                  </form>
             </div>
           </div> 
         </div>
      
    </main>
    
    <!-- STOPKA -->
    <footer>
            <div class="footer-beam">
                <div class="copyright"><span>FROSTY CODERS © 2020</span><br/><span class="allrights">Wszelkie prawa zastrzeżone!</span></div>
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
    <script src="js/scripts.js"></script>
</body>
</html>