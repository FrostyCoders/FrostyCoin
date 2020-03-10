<?php

   session_start();

   if ((isset($_SESSION['logged'])) && ($_SESSION['logged']==true))
    {
       header('Location: data.php');
       exit();
    }


   if (isset($_POST['email']))
   {
      //Walidacja udana
      $valid = true;
      
      //Imię
      $name = $_POST['imie'];
      
      if ((strlen($name)<3) || (strlen($name)>20))
      {
         $valid = false;
         $_SESSION['e_name']="Nieprawidłowe imię!";
      }
      //Nazwisko
      $surname = $_POST['nazwisko'];
      
      if ((strlen($surname)<3) || (strlen($surname)>20))
      {
         $valid = false;
         $_SESSION['e_surname']="Nieprawidłowe nazwisko!";
      }

      //email
      
      $email = $_POST['email'];
      $emailS = filter_var($email, FILTER_SANITIZE_EMAIL);
     
      if ((filter_var($emailS, FILTER_VALIDATE_EMAIL)==false) || ($emailS!=$email))
      {
         $valid = false;
         $_SESSION['e_email']="Podaj poprawny adres e-mail!";
      }
      
      //hasła
      
     $pass1 = $_POST['haslo1'];
     $pass2 = $_POST['haslo2'];
      
      if ((strlen($pass1)<8) || (strlen($pass1)>20))
      {
         $valid = false;
         $_SESSION['e_pass']="Hasło musi posiadać przynajmniej 8 znaków!";
      }
      
      if ($pass1!=$pass2)
      {
         $valid = false;
         $_SESSION['e_pass1']="Hasła nie zgadzają się";
      }
      
      $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);
      
      
      
      //checkbox
      
      if (!isset($_POST['regulamin']))
	{
         $valid = false;
         $_SESSION['e_reg']="Potwierdź akceptacje regulaminu!";
	}
      //recaptcha
      $key = "6Lfnut4UAAAAADqUDe8saUJHSHoQCY_0Vtzp0Kks";
      
      $check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$key.'&response='.$_POST['g-recaptcha-response']);
      
      $reply = json_decode($check);
      
      if ($reply->success==false)
      {
         $valid = false;
         $_SESSION['e_captch']="Potwierdź że nie jesteś botem!";  
      }
      
      require_once "connect.php";
      mysqli_report(MYSQLI_REPORT_STRICT);
      
      try
      {
      $conn = new mysqli($host, $db_user, $db_password, $db_name); 
         if ($conn->connect_errno!=0)
         {
            throw new Exception(mysqli_connect_errno());
         }
         else
         {
            //Czy email istnieje juz w bazie?
            $result = $conn->query("SELECT user_id FROM shop_users WHERE user_email='$email'");
            if (!$result) throw new Exception($conn->error);
            
            $mails = $result->num_rows;
            if($mails>0)
            {
               $valid = false;
               $_SESSION['e_email']="Istnieje już konto przypisane do tego adresu email!";
            }
            if($valid==true)
            {
               if($conn->query("INSERT INTO shop_users (user_id, user_password, user_email, user_name, user_surname) VALUES (NULL, '$pass_hash', '$email', '$name', '$surname')"))
               {
                $_SESSION['success1']="Udało Ci się zarejestrować! Możesz się zalogować!";
               }
               else
               {
                throw new Exception(mysqli_connect_errno()); 
               }

            }
            $conn->close();
         }
      }
      catch(Exception $e)
      {
         echo '<span style="color: red;"> Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
         echo '<br /> Informacja developerska: '.$e;
      }
  
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
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" />
    
    <!-- SKRYPTY -->
    <script src="js/jquery-3.4.1.min.js"> </script>
    <script src="js/smoothscroll.js"> </script>
    
    <!-- STYLE I CZCIONKI -->
    <link rel="stylesheet" type="text/css" href="css/animate.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <!-- PASEK NAWIGACYJNY -->
    <nav>
        <div class="nav-pasek">
            <div class="nav-logo"><a href="index.php"><img src="img/Logo.png" alt="Logo - obraz zmrożonej monety" /></a></div>
            <div class="nav-zawartosc nav-js">
                <div class="nav-zakladka">
                    Komputery PC
                    <div class="nav-podkategorie nav-js-p">
                        <div class="nav-podkategoria">
                        Zestawy PC
                        </div>
                        <div class="nav-podkategoria">
                        Monitory
                        </div>
                        <div class="nav-podkategoria">
                        Akcesoria komputerowe
                        </div>
                    </div>
                </div>
                <div class="nav-ikona">
                    <img class="nav-iconsize" src="img/icons/cube-icon.svg">
                </div>
            </div>
            <div class="nav-zawartosc nav-js">
                <div class="nav-zakladka">
                    Telefony
                    <div class="nav-podkategorie nav-js-p">
                        <div class="nav-podkategoria">
                        Smartfony i telefony
                        </div>
                        <div class="nav-podkategoria">
                        Smartwatche
                        </div>
                        <div class="nav-podkategoria">
                        Nawigacje
                        </div>
                        <div class="nav-podkategoria">
                        Akcesoria
                        </div>
                    </div>
                </div>
                <div class="nav-ikona">
                    <img class="nav-iconsize" src="img/icons/phone-icon.svg">
                </div>
            </div>
            <div class="nav-zawartosc nav-js">
                <div class="nav-zakladka">
                    Laptopy i tablety
                    <div class="nav-podkategorie nav-js-p">
                        <div class="nav-podkategoria">
                        Laptopy
                        </div>
                        <div class="nav-podkategoria">
                        Tablety
                        </div>
                        <div class="nav-podkategoria">
                        E-booki
                        </div>
                        <div class="nav-podkategoria">
                        Akcesoria
                        </div>
                    </div>
                </div>
                <div class="nav-ikona">
                    <img class="nav-iconsize" src="img/icons/laptop-icon.svg">
                </div>
            </div>
            <div class="nav-zawartosc nav-js">
                <div class="nav-zakladka">
                    Podzespoły
                    <div class="nav-podkategorie nav-js-p">
                        <div class="nav-podkategoria">
                        Dyski SSD i HDD
                        </div>
                        <div class="nav-podkategoria">
                        Procesory
                        </div>
                        <div class="nav-podkategoria">
                        Karty graficzne
                        </div>
                        <div class="nav-podkategoria">
                        Kości RAM
                        </div>
                        <div class="nav-podkategoria">
                        Płyty Główne
                        </div>
                        <div class="nav-podkategoria">
                        Obudowy
                        </div>
                        <div class="nav-podkategoria">
                        Zasilacze
                        </div>
                        <div class="nav-podkategoria">
                        Chłodzenia
                        </div>
                        <div class="nav-podkategoria">
                        Akcesoria
                        </div>
                    </div>
                </div>
                <div class="nav-ikona">
                    <img class="nav-iconsize" src="img/icons/podz-icon.svg">
                </div>
            </div>
            <div class="nav-zawartosc nav-js">
                <div class="nav-zakladka">
                    Peryferia
                    <div class="nav-podkategorie nav-js-p">
                        <div class="nav-podkategoria">
                        Drukarki
                        </div>
                        <div class="nav-podkategoria">
                        Urządzenia sieciowe
                        </div>
                        <div class="nav-podkategoria">
                        Myszki
                        </div>
                        <div class="nav-podkategoria">
                        Klawiatury
                        </div>
                        <div class="nav-podkategoria">
                        Słuchawki
                        </div>
                        <div class="nav-podkategoria">
                        Głośniki
                        </div>
                    </div>
                </div>
                <div class="nav-ikona">
                    <img class="nav-iconsize" src="img/icons/printer-icon.svg">
                </div>
            </div>
            <div class="nav-zawartosc nav-js">
                <div class="nav-zakladka">
                    Telewizory i Audio
                    <div class="nav-podkategorie nav-js-p">
                        <div class="nav-podkategoria">
                        TV
                        </div>
                        <div class="nav-podkategoria">
                        Projektory
                        </div>
                        <div class="nav-podkategoria">
                        Audio Domowe
                        </div>
                    </div>
                </div>
                <div class="nav-ikona">
                    <img class="nav-iconsize" src="img/icons/tv-icon.svg">
                </div>
            </div>
            <div class="nav-zawartosc nav-js">
                <div class="nav-zakladka">
                    Oprogramowanie
                    <div class="nav-podkategorie nav-js-p">
                        <div class="nav-podkategoria">
                        Systemy Operacyjne
                        </div>
                        <div class="nav-podkategoria">
                        Oprogramowanie Antywirusowe
                        </div>
                        <div class="nav-podkategoria">
                        Oprogramowanie Biurowe
                        </div>
                        <div class="nav-podkategoria">
                        Oprogramowanie Graficzne
                        </div>
                        <div class="nav-podkategoria">
                        Systemy Sprzedaży
                        </div>
                    </div>
                </div>
                <div class="nav-ikona">
                    <img class="nav-iconsize" src="img/icons/disc-icon.svg">
                </div>
            </div>
        </div>
    </nav>
    
    <!-- NAGŁÓWEK -->
    <header>
        <div class="log-header-tlo" id="header">
            <div class="header-beam">
                <div class="header-icon-content">
                    <input type="search" class="input-search" placeholder="Wyszukaj..."/>
                </div>
                <div class="header-icon"><img class="header-iconsize" src="img/icons/search-icon.svg"></div>
                <div class="header-icon-content">
                    <p>Kup cosik, bo braki mamy</p><!-- XDD zapisz co chcesz -->
                </div>
                <div class="header-icon"><img class="header-iconsize" src="img/icons/basket-icon.svg"></div>
                <div class="header-icon-login"><img class="header-iconsize" src="img/icons/login-icon.svg"></div>
            </div>
            <h1 class="log-header-h1">Frosty Coin</h1>
            
        </div>
    </header>
    
    <!-- ZAWARTOŚĆ -->
    <main>
       <div class="droga">tutaj jesteś</div><!--traceroute-->
        <div class="log-main-container">
            <div class="log-login-container">
                <h2>Zaloguj się:</h2>
                <form method="post" action="logging.php">
                    <input type="text" placeholder="E-mail" name="email_log" /><br/>
                    <input type="password" placeholder="Hasło" name="password_log" /><br/>
                    <?php if(isset($_SESSION['error'])) echo $_SESSION['error']; ?> <br/>
                    <input type="submit" class="login-button" value="Zaloguj" />
                   
                </form>
            </div>
            <div class="log-register-container">
                <h2>Zarejestruj się:</h2>
                <form method="post" action="#">
                    <input type="text" placeholder="Imię" name="imie" /><br/>
                    <?php
                        if (isset($_SESSION['e_name']))
                        {
                           echo '<div class="error">'.$_SESSION['e_name'].'</div>';
                           unset($_SESSION['e_name']);
                        }
                    ?>
                    <input type="text" placeholder="Nazwisko" name="nazwisko" /><br/>
                     <?php
                         
                        if (isset($_SESSION['e_surname']))
                        {
                           echo '<div class="error">'.$_SESSION['e_surname'].'</div>';
                           unset($_SESSION['e_surname']);
                        }
                    ?>
                    <input type="text" placeholder="E-mail" name="email" /><br/>
                       <?php
      
                        if (isset($_SESSION['e_email']))
                        {
                           echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                           unset($_SESSION['e_email']);
                        }
                    ?>
                    <input type="password" placeholder="Hasło" name="haslo1"/><br/>
                    <?php
      
                        if (isset($_SESSION['e_pass']))
                        {
                           echo '<div class="error">'.$_SESSION['e_pass'].'</div>';
                           unset($_SESSION['e_pass']);
                        }
                    ?>
                    <input type="password" placeholder="Powtórz hasło" name="haslo2"/><br/>
                     <?php
      
                        if (isset($_SESSION['e_pass1']))
                        {
                           echo '<div class="error">'.$_SESSION['e_pass1'].'</div>';
                           unset($_SESSION['e_pass1']);
                        }
                    ?>
                    <label class="regulamin"><input type="checkbox" name="regulamin"><span>Akceptuje regulamin</span></label> <br /><br />
                    <?php
      
                        if (isset($_SESSION['e_reg']))
                        {
                           echo '<div class="error">'.$_SESSION['e_reg'].'</div>';
                           unset($_SESSION['e_reg']);
                        }
                    ?>
                    <div class="g-recaptcha" data-sitekey="6Lfnut4UAAAAAIcoTBhng6gW6ZE5mbWjGY5GKt6-"></div> <br />
                    <?php
      
                        if (isset($_SESSION['e_captch']))
                        {
                           echo '<div class="error">'.$_SESSION['e_captch'].'</div>';
                           unset($_SESSION['e_captch']);
                        }
                    ?>
                    <input type="submit" class="login-button" value="Zarejestruj" />
                    <?php
      
                        if (isset($_SESSION['success1']))
                        {
                           echo '<div class="success">'.$_SESSION['success1'].'</div>';
                           unset($_SESSION['success1']);
                        }
                    ?>
                </form>
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
    <script src="js/nav_addition.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>

