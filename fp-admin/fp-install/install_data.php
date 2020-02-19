<?php
    session_start();
    if(!isset($_SESSION['file_db_ok']))
    {
        header("Location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Frosty Panel - Instalacja</title>
    <link rel="shortcut icon" href="../img/icon.png">
    <link rel="stylesheet" href="../css/install_style.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
</head>
<body>
    <div class="window">
            <div class="frame">
                <div class="logo"><img src="../img/logo.png" alt="Logo systemu"></div>
                <form style="margin-top: 10px;" action="install_script.php" method="post">
                    <p class="input_desc">Nazwa witryny:<img src="../img/q_mark.png" alt="" title="Nazwij witrynę którą chcesz utworzyć."></p>
                    <input type="text" name="website_name" required><br>
                    <p class="input_desc">Nazwa użytkownika:<img src="../img/q_mark.png" alt="" title="Nazwa pierwszego administratora w panelu. Musi zawierać od 5 do 16 znaków."></p>
                    <input type="text" name="admin_name" required><br>
                    <p class="input_desc">Hasło użytkownika:<img src="../img/q_mark.png" alt="" title="Hasło powinno zawierać co najmiej 8 znaków, małą literę, dużą literę oraz znak specjalny."></p>
                    <input type="password" name="admin_password" required><br>
                    <p class="input_desc">Powtórz hasło:</p>
                    <input type="password" name="admin_password2" required><br>
                    <p class="input_desc">Adres e-mail:<img src="../img/q_mark.png" alt="" title="Adres e-mail podany w celu weryfikacji przy zmianie hasła."></p>
                    <input type="text" name="admin_email" required><br>
                    <input type="submit" value="Dalej">
                    <?php
                        if(isset($_SESSION['install_data_error']))
                        {
                            echo '<p class="error_message">'.$_SESSION['install_data_error'].'</p>';
                            unset($_SESSION['install_data_error']);
                        }
                    ?>
                </form>
            </div>
        </div>
        <div class="copy">Copyright &copy - Frosty Coders 2020</div>
</body>
</html>