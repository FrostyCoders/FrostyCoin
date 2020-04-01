<?php

  session_start();

  session_unset();
  $_SESSION['result']="Wylogowano pomyślnie!";
  header('Location: index.php');

?>