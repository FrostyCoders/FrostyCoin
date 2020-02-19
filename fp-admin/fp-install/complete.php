<?php
    session_start();
    if(!isset($_SESSION['file_db_ok']))
    {
        header("Location: index.php");
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
                    if(isset($_SESSION['errors_happened']))
                    {
                        echo '<p style="margin-top: 100px;">Instalacja została zakończona. Podczas instalacji wystąpiły błedy które można sprawdzić w pliku <i>install_log.php</i><br>Możesz przeprowadzić instalcję jeszcze raz zaglądając do instrukcji.</p>
                        <a href="../index.php"><button>Zaloguj się</button></a>';
                    }
                    else
                    {
                        echo '<p style="margin-top: 100px;">Instalacja została zakończona. Podczas instalacji nie wystąpiły błędy.</p>
                        <a href="../index.php"><button>Zaloguj się</button></a>';
                    }
                    session_destroy();
                ?>
            </div>
        </div>
        <div class="copy">Copyright &copy - Frosty Coders 2020</div>
</body>
</html>