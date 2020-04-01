<?php
    session_start();
    if (!isset($_COOKIE['stmt_cookie']))
    {
        setcookie('stmt_cookie', 1, time() + (24*3600), "/");
    }

require_once "fp-admin/connect.php";
$product_id = $_GET['category_id'];
$sql_categories = "Select * FROM product_categories WHERE category_id = '$product_id';";
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
    <link rel="stylesheet" type="text/css" href="css/szablon.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
</head>
<body>
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
      <?php 
      $sql_submit = $conn->query($sql_categories);
      $res = $sql_submit -> fetch();
      ?>
       <div class="droga"><?php echo $res['category_name']; ?></div><!--traceroute-->
        <div class="sz-main-container">
            
            <div class="sz-lista">
              <?php
               $sql_products = "SELECT * FROM products WHERE category_id = '$product_id' AND product_status>0;";
               $sql_products_submit = $conn->query($sql_products);
               $count = $sql_products_submit->rowCount();
               if($count == 0)
               {
                  echo "<p style='color:red; font-size:3rem; margin-left:2rem;' >Brak produktów podanej kategori!</p>";
               }
               else
               {
                  while($res1 = $sql_products_submit -> fetch())
                  {
                    echo "<div class='sz-produkt'>";
                    echo "<div class='sz-produkt-image'>";
                    echo "<div class='promo-photo'><img src='fp-admin/img-db/".$res1['product_image_path']."'onerror='this.src='img/package.png';'></div>";
                    echo "</div>";
                    echo "<div class='sz-produkt-content'>";
                    echo "<div class='sz-produkt-name'>".$res1['product_name']."</div>";
                    echo "<div class='sz-produkt-cena'>".$res1['product_price']." pln</div>";
                    echo "<div class='sz-produkt-opis'>".$res1['product_desc']."</div>";
                    echo '<a href="add_to_basket.php?category_id='.$res1['category_id'].'&product_id='.$res1['product_id'].'"><button class="sz-produkt-dokoszyka">Do koszyka</button></a></div>';
                    echo "</div>";
                  }
               }
               ?>
            </div>
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