<?php

  session_start();

  if($_SESSION['logged']==true)
    {
       session_unset();
       header('Location: index.php?logout');
    }
  else
  {
       session_unset();
       header('Location: index.php');
  }

?>