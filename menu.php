<?php
      require_once "fp-admin/connect.php";
      $sql = "SELECT * FROM menu_positions;";
      $sql_submit = $conn->query($sql);
      while($row = $sql_submit ->fetch())
      {
      $p_id = $row['position_id'];
      echo "<div class='nav-zawartosc' onmouseenter='collapse_navp(".$p_id.");' onmouseleave='hide_navp(".$p_id.");'>";
      echo "<div class='nav-zakladka'>";
      echo $row['position_name'];
      echo "<div class='nav-podkategorie' id='navp-js".$p_id."'>";
      $sql1 = "SELECT * FROM menu_subpositions WHERE position_id='$p_id';";
      $sql1_submit = $conn->query($sql1);
      while($row1 = $sql1_submit->fetch())
       {
         echo "<div class='nav-podkategoria'>";
         echo '<a href="'.$row1['subposition_reference_to'].'?category_id='.$row1['subposition_cat_reference'].'">' . $row1['subposition_name'] . '</a>';
         echo "</div>";
      }
      echo "</div>";
      echo "</div>";
      echo "<div class='nav-ikona'>";
      echo "<img id='icon-navp-js".$p_id."' class='nav-iconsize' src='fp-admin/img-db/menu_icons/".$row['position_icon_path']."'>";
      echo "</div>";
      echo "</div>";
      }
?>