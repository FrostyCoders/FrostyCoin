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
            <div class="nav-logo"><a href="index.php"><img src="img/Logo.png" alt="Logo - obraz zmrożonej monety" /></a></div>
            <div class="nav-zawartosc nav-js">
                <div class="nav-zakladka">
                    <a href="data.php">Cooming Soon</a>
                </div>
                <div class="nav-ikona">
                    <img class="nav-iconsize" src="img/icons/cart-icon.svg">
                </div>
            </div>
            <div class="nav-zawartosc nav-js">
                <div class="nav-zakladka">
                    <a href="data.php">Zmiana danych</a>
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
               <div class="header-icon-content"><p>Przejdź do konta.</p></div>
               <div class="header-icon"><a href="data.php"><img class="header-iconsize" src="img/icons/account-icon.svg"></a></div>
                <div class="header-icon-content">
                    <p>Coming Soon</p><!-- XDD zapisz co chcesz -->
                </div>
                <div class="header-icon"><img class="header-iconsize" src="img/icons/basket-icon.svg"></div>
                <div class="header-icon-login"><a href="logout.php" ><img class="header-iconsize" src="img/icons/login-icon.svg"></a></div>
            </div>
            <h1 class="log-header-h1">Frosty Coin</h1>
            
        </div>
    </header>
    
    <!-- ZAWARTOŚĆ -->
    <?php   
    if(isset($_GET['change']))
    {
       $id = $_SESSION['id'];
       $email = $_POST['email'];
       $new_pass1 = $_POST['new_pass1'];
       $new_pass2 = $_POST['new_pass2'];
       
       if (isset($_POST['email']))
           {
              //walidacja udana
              $valid = true;
              
             
             //email
             $emailS = filter_var($email, FILTER_SANITIZE_EMAIL);
             if ((filter_var($emailS, FILTER_VALIDATE_EMAIL)==false) || ($emailS!=$email))
              {
                $valid = false;
                $_SESSION['e_email']="Podaj poprawny adres e-mail!";
              }
             //hasla
            if ((strlen($new_pass1)<8) || (strlen($new_pass1)>20))
             {
               $valid = false;
               $_SESSION['e_pass']="Hasło musi posiadać przynajmniej 8 znaków!";
             } 

            if ($new_pass1!=$new_pass2)
            {
               $valid = false;
               $_SESSION['e_pass1']="Hasła nie zgadzają się";
            }
            $pass_hash = password_hash($new_pass1, PASSWORD_DEFAULT);
          
            $sql = "UPDATE shop_users SET user_email = '$email', user_password = '$pass_hash'  WHERE user_id = '$id';";
            
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
               if($valid==true)
               {
               if($conn->query($sql))
                  {
                   $_SESSION['success1']="Zmieniono Dane!";
                  }
               else
                  {
                  throw new Exception($conn->error); 
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
    }
   
   if(isset($_GET['change1']))
   {
       
      if (isset($_POST['name']))
      
      
      {
      
       $id = $_SESSION['id'];
       $name = $_POST['name'];
       $surname = $_POST['surname'];
       $city = $_POST['city'];
       $street = $_POST['street'];
       $house_no = $_POST['house_no'];
       $birthday = $_POST['birthday'];
       $postcode = $_POST['postcode'];
       $phone_number = $_POST['phone_number'];
            
      
      
     $sql = "UPDATE shop_users SET user_name = '$name', user_surname = '$surname', user_city = '$city', user_street = '$street', user_house_no = '$house_no',   user_birth_day = '$birthday', user_postcode = '$postcode', user_phone_number = '$phone_number' WHERE user_id = '$id';";
      
      
         
      $valid = true;
         
      if ($name === "" || $surname === "" || $city === "" || $street ==="" || $house_no==="" || $postcode ==="" || $phone_number==="")
      { 
         $valid = false;
         $_SESSION['change_error'] = "Uzupełnij puste pola!"; 
         
      }
      else
      {
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
               if($valid==true)
               {
                  if($conn->query($sql))
                  {
                   $_SESSION['success2']="Zmieniono Dane!";
                   $result = $conn->query("SELECT * FROM shop_users WHERE user_id='$id'");
                   $row = $result->fetch_assoc();
                  
                   $_SESSION['id'] = $row['user_id'];
                   $_SESSION['user_email'] = $row['user_email'];
                   $_SESSION['user_pass'] = $row['user_password'];

                   $_SESSION['user_name'] = $row['user_name'];
                   $_SESSION['user_surname'] = $row['user_surname'];
                   $_SESSION['user_city'] = $row['user_city'];
                   $_SESSION['user_street'] = $row['user_street'];
                   $_SESSION['user_house_no'] = $row['user_house_no'];
                   $_SESSION['user_birth_day'] = $row['user_birth_day'];
                   $_SESSION['user_postcode'] = $row['user_postcode'];
                   $_SESSION['user_phone_number'] = $row['user_phone_number'];
                  }
                  else
                  {
                  throw new Exception($conn->error); 
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
        } 
   }
    
   
   
   
   ?>
    <main>
       <div class="droga"><?php echo "<span>Zalogowano jako: ".$_SESSION['user_name']."!"; ?></div><!--traceroute-->
        <div class="data-main-container">
          <h2>Zmień swoje dane:</h2>
            <div class="data-container">
             <div class="data-log-container">
                  <form action="data.php?change=1" method="post">
                     <label><div>E-mail: </div><input type="text" value="<?php echo $_SESSION['user_email']; ?>" name="email"></label>
                     <?php
                        if (isset($_SESSION['e_email']))
                        {
                           echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                           unset($_SESSION['e_email']);
                        }
                     ?>
                     <label><div>Nowe hasło: </div><input type="password"name="new_pass1"></label>
                     <?php
                        if (isset($_SESSION['e_pass']))
                        {
                           echo '<div class="error">'.$_SESSION['e_pass'].'</div>';
                           unset($_SESSION['e_pass']);
                        }
                     ?>
                     <label><div>Powtórz: </div><input type="password" name="new_pass2"></label>
                     <?php
                        if (isset($_SESSION['e_pass1']))
                        {
                           echo '<div class="error">'.$_SESSION['e_pass1'].'</div>';
                           unset($_SESSION['e_pass1']);
                        }
                     ?>
                     <?php
                        if (isset($_SESSION['success1']))
                        {
                           echo '<div class="error" style="color: blue; font-size: 2rem;">'.$_SESSION['success1'].'</div>';
                           unset($_SESSION['success1']);
                        }
                     ?>
                     <input type="submit" value="Zmień" class="login-button">
                  </form>
             </div>
             <div class="data-log-container">
                  <form action="data.php?change1=1" method="post">
                     <label><div>Imie: </div><input type="text" name="name" value="<?php echo $_SESSION['user_name'];?>"></label>
                     <label><div>Nazwisko: </div><input type="text" name="surname" value="<?php echo $_SESSION['user_surname'];?>"></label>
                     <label><div>Miejscowość: </div> <input type="text" name="city" value="<?php echo $_SESSION['user_city'];?>"></label>
                     <label><div>Ulica: </div><input type="text" name="street" value="<?php echo $_SESSION['user_street'];?>"></label>
                     <label><div>Nr domu/localu: </div><input type="text" name="house_no" value="<?php echo $_SESSION['user_house_no'];?>"></label>
                     <label><div>Data urodzenia:</div> <input type="date" name="birthday" value="<?php echo $_SESSION['user_birth_day'];?>"></label>
                     <label><div>Kod pocztowy: </div><input type="text" name="postcode" value="<?php echo $_SESSION['user_postcode'];?>"></label>
                     <label><div>Telefon: </div><input type="text" name="phone_number" value="<?php echo $_SESSION['user_phone_number'];?>"></label>
                     <?php
                        if (isset($_SESSION['success2']))
                        {
                           echo '<div class="error" style="color: blue; font-size: 2rem;">'.$_SESSION['success2'].'</div>';
                           unset($_SESSION['success2']);
                        }
                     ?>
                     <?php
                        if (isset($_SESSION['change_error']))
                        {
                           echo '<div class="error">'.$_SESSION['change_error'].'</div>';
                           unset($_SESSION['change_error']);
                        }
                     ?>
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