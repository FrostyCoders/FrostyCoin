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

//LAST ADDED

    $last_added = $conn->query("SELECT product_id, product_name, product_price FROM products ORDER BY product_from LIMIT 3");
    $count =$last_added -> rowCount();
    $pro_one="";
if($count==0)
{
    $pro_one="<td colspan='3'>Brak rekordów w bazie</td>";
}
else
{    
while($row = $last_added -> fetch()){
$pro_one=$pro_one."<tr><td>".$row['product_id']."</td><td>".$row['product_name']."</td><td>".$row['product_price']." PLN"."</td></tr>";
}
}
//DISK USAGE CHART

$disc_space = round(disk_total_space("/")/1024/1024/1024);
$disc_free = round(disk_free_space("/")/1024/1024/1024,2);
$disc_used = $disc_space-$disc_free;

$disc_precent = round(($disc_used /$disc_space)*100,2);
$chart = $disc_precent*3.6;    

//NOTIFIKATIONS

$noti_sql = $conn->query("SELECT * FROM `statements` ORDER BY `statement_id` DESC LIMIT 1;");
$noti = $noti_sql -> fetch();
if($noti!=NULL)
{
    $noti_title = $noti['statement_title'];
    $noti_desc = $noti['statement_desc'];
    $noti_status = $noti['statement_status'];
    $noti_from = $noti['statement_from'];
    $noti_fromsec = strtotime($noti_from);
    $noti_to = $noti['statement_to'];
    $noti_tosec = strtotime($noti_to);
    $noti_date = new DateTime();
    $noti_currentdate = $noti_date->getTimestamp();
}

?>