<?php
//NUMBER OF CATEGORIES

    $sum_cat = $conn->query("SELECT COUNT(*) as sum_cat FROM product_categories");
    foreach($sum_cat as $row)
      
   $sum_cat=$row['sum_cat'];


//NUMBER OF ORDERS

    $sum_order = $conn->query("SELECT COUNT(*) as sum_order FROM shop_orders WHERE order_status<4");
    foreach($sum_order as $row)

    $sum_order=$row['sum_order'];

//NUMBER OF PRODUCTS

    $sum_pro = $conn->query("SELECT COUNT(*) as sum_pro FROM products");
    foreach($sum_pro as $row)
     
    $sum_pro=$row['sum_pro'];


//LAST ADDED FIRST

    $pro_one = $conn->query("SELECT product_id, product_name, product_price FROM products ORDER BY product_from LIMIT 1");
    
foreach($pro_one as $row)
      
    $pro_one_1=$row['product_id'];
    $pro_one_2=$row['product_name'];
    $pro_one_3=$row['product_price'];

//LAST ADDED SECOND

    $pro_one = $conn->query("SELECT product_id, product_name, product_price FROM products ORDER BY product_from LIMIT 2");
    
foreach($pro_one as $row)
     
    $pro_two_1=$row['product_id'];
    $pro_two_2=$row['product_name'];
    $pro_two_3=$row['product_price'];

//LAST ADDED THIRD

    $pro_one = $conn->query("SELECT product_id, product_name, product_price FROM products ORDER BY product_from LIMIT 3");
    
foreach($pro_one as $row)
      
    $pro_three_1=$row['product_id'];
    $pro_three_2=$row['product_name'];
    $pro_three_3=$row['product_price'];

//DISK USAGE CHART

$disc_space = round(disk_total_space("/")/1024/1024/1024);
$disc_free = round(disk_free_space("/")/1024/1024/1024,2);
$disc_used = $disc_space-$disc_free;

$disc_precent = round(($disc_used /$disc_space)*100,2);
$chart = $disc_precent*3.6;    

?>