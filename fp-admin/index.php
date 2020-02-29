<?php
    session_start();
    if(isset($_SESSION['fp-online']) && $_SESSION['fp-online'] == true)
    {
        header("Location: main_page.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Frosty Panel - Logowanie</title>
    <meta name="author" content="Frosty Coders">
    <link rel="shortcut icon" href="img/icon.png">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="window">
        <div class="frame">
            <div class="logo"><img src="img/logo.png" alt="Logo systemu"></div>
            <form action="login.php" method="POST">
                <p class="login_label">Nazwa Użytkownika</p>
                <input type="text" name="fp-login" required>
                <p class="password_label">Hasło</p>
                <input type="password" name="fp-password" required><br><br>
                <input type="submit" value="Zaloguj się">
                <p class="pass_forget"><a href="forgot_password.html">Zapomiałeś hasła?</a></p>
                <p class="login_error">
                    <?php
                        if(isset($_SESSION['login_error']))
                        {
                            echo $_SESSION['login_error'];
                            unset($_SESSION['login_error']);
                        }
                    ?>
                </p>
            </form>
            <p class="reg_p"><a href="../">◄ Wróć do sklepu</a></p>
        </div>
    </div>
    <div class="copy">Copyright &copy - Frosty Coders 2020</div>
    <script src="js/scripts.js"></script>
</body>
</html>