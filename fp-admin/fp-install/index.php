<?php
    session_start();
    if(isset($_SESSION['file_db_ok']))
    {
        unset($_SESSION['file_db_ok']);
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
                <?php
                    if(file_exists("installed.txt"))
                    {
                        echo '<p style="margin-top: 100px;"><b>Frosty Panel</b> jest już zainstalowany.</p>
                        <a href="../index.php"><button>Zaloguj się</button></a>';
                    }
                    else
                    {
                        if(!file_exists("../fp-config.php"))
                        {
                            echo '<p style="margin-top: 100px;">Nie wykryto pliku <i>fp-config.php</i>.<br> Skopiuj plik <i>fp-config-sample.php</i>, skonfiguruj i nazwij jako <i>fp-config.php</i>.</p>';
                        }
                        else
                        {
                            include_once "../fp-config.php";
                            try
                            {
                                $conn = new PDO("mysql:host=".$host.";dbname=".$dbname, $username, $password);
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $_SESSION['file_db_ok'] = true;
                                $save = fopen("../connect.php", "w");
                                $to_save = '<?php'."\r\n";
                                $to_save = $to_save.'require_once "fp-config.php";'."\r\n";
                                $to_save = $to_save.'try'."\r\n";
                                $to_save = $to_save.'{'."\r\n";
                                $to_save = $to_save.'$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);'."\r\n";
                                $to_save = $to_save.'$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);'."\r\n";
                                $to_save = $to_save.'}'."\r\n";
                                $to_save = $to_save.'catch(PDOException $e)'."\r\n";
                                $to_save = $to_save.'{'."\r\n";
                                $to_save = $to_save.'$_SESSION["login_warning"] = "Krytyczny błąd! Spróbuj ponownie później.";'."\r\n";
                                $to_save = $to_save.'header("Location: index.php");'."\r\n";
                                $to_save = $to_save.'exit();'."\r\n";
                                $to_save = $to_save.'}';
                                fwrite($save, $to_save);
                                fclose($save);
                                echo '<p style="margin-top: 100px;">Zaraz zostanie przeprowadzona istalacja <b>Frosty Panel</b>.</p>
                                <a href="install_data.php"><button>Kontynuuj</button></a>';
                            }
                            catch(PDOException $e)
                            {
                                echo '<p style="margin-top: 100px;">Nie udało się połączyć z bazą danych wskazaną w pliku <i>fp_config.php</i>.</p>'; 
                            }
                        }
                    }
                ?>
            </div>
        </div>
        <div class="copy">Copyright &copy - Frosty Coders 2020</div>
    <script src="js/scripts.js"></script>
</body>
</html>