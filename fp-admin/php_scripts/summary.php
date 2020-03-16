<?php
session_start();
require_once "../connect.php";

//NUMBER OF CATEGORIES

    $sum_cat = $conn->query("SELECT COUNT(*) as sum_cat FROM product_categories");
    foreach($sum_cat as $row)
      {
          echo $row['sum_cat'];
      }
    $_SESSION['sum_cat']=$row['sum_cat'];
echo '<br />';

//NUMBER OF ORDERS

    $sum_order = $conn->query("SELECT COUNT(*) as sum_order FROM order_status WHERE status_name='active'");
    foreach($sum_order as $row)
      {
          echo $row['sum_order'];
      }
    $_SESSION['sum_order']=$row['sum_order'];
echo '<br />';

//NUMBER OF PRODUCTS

    $sum_pro = $conn->query("SELECT COUNT(*) as sum_pro FROM products");
    foreach($sum_pro as $row)
      {
          echo $row['sum_pro'];
      }
    $_SESSION['sum_pro']=$row['sum_pro'];
echo '<br />';

//LAST ADDED FIRST

    $pro_one = $conn->query("SELECT product_id, product_name, product_price FROM products ORDER BY product_from LIMIT 1");
    
foreach($pro_one as $row)
      {
          echo $row['product_id'].'<br />'. $row['product_name'].'<br />'. $row['product_price'];
      }
    $_SESSION['pro_one_1']=$row['product_id'];
    $_SESSION['pro_one_2']=$row['product_name'];
    $_SESSION['pro_one_3']=$row['product_price'];

//LAST ADDED SECOND

    $pro_one = $conn->query("SELECT product_id, product_name, product_price FROM products ORDER BY product_from LIMIT 2");
    
foreach($pro_one as $row)
      {
          echo $row['product_id'].'<br />'. $row['product_name'].'<br />'. $row['product_price'];
      }
    $_SESSION['pro_two_1']=$row['product_id'];
    $_SESSION['pro_two_2']=$row['product_name'];
    $_SESSION['pro_two_3']=$row['product_price'];

//LAST ADDED THIRD

    $pro_one = $conn->query("SELECT product_id, product_name, product_price FROM products ORDER BY product_from LIMIT 3");
    
foreach($pro_one as $row)
      {
          echo $row['product_id'].'<br />'. $row['product_name'].'<br />'. $row['product_price'];
      }
    $_SESSION['pro_three_1']=$row['product_id'];
    $_SESSION['pro_three_2']=$row['product_name'];
    $_SESSION['pro_three_3']=$row['product_price'];

?>