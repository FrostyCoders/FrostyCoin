<?php
    session_start();
    class Koszyk
    {
        private $conn;
        function __construct($conn)
        {
            $this->dbo = $dbo;
            if(!isset($_SESSION['basket']))
            {
                $_SESSION['basket'] = array();
            }
        }
        function add()
        {
            if(!isset($_GET['pid']))
            {
                $_SESSION['result'] = "Wystąpił błąd!";
                return FORM_DATA_MISSING;
            }
            if(($pid = (int) $_GET['id']) < 1)
            {
                $_SESSION['result'] = "Wystąpił błąd!";
                return INVALID_ID;
            }
            $sql_check = "SELECT * FROM products WHERE product_id = $pid";
            $check = $this->conn->prepare($sql_check);
            try
            {
                $check->execute($sql_check);
            }
            if($product_data =  === false)
            {
                $_SESSION['result'] = "Wystąpił błąd!";
                return QUERY_ERROR;
            }
            if(($check->rowCount()) == 0)
            {
                $_SESSION['result'] = "Wystąpił błąd!";
                return INVALID_ID;
            }
            else
            {
                $product_data = $check->fetch();
                if(isset($_SESSION['basket'][$id]))
                {
                    $_SESSION['basket'][$id]->amount++;
                    if($product_data['sale'] == "1")
                    {
                        $_SESSION['basket'][$id]->price = $product_data['product_sale_price'];
                    }
                    else
                    {
                        $_SESSION['basket'][$id]->price = $product_data['product_price'];
                    } 
                }
                else
                {
                    if($product_data['sale'] == "1"){$new_price = $product_data['product_sale_price'];}
                    else{$new_price = $product_data['product_price'];}

                    $_SESSION['basket'][$id] = new element_koszyka($id, $product_data['product_name'], 1, $new_price);
                }
                $_SESSION['result'] = "Dodano pomyślnie produkt!";
                return ACTION_OK;
            }
        }
        function show($allow_mod = true);
        {   
            if(count($_SESSION['basket']) == 0)
            {
                $message = "Koszyk jest pusty!";
            }
            else
            {
                $ids = implode(',', array_keys($_SESSION['basket']));

                $sql_load = "SELECT product_id, product_name, product_price, product_sale, product_sale_price FROM products WHERE product_id IN (" . $ids . ") ORDER BY product_name";

                if($products = $this->conn->query($sql_load))
                {
                    $basket = $_SESSION['basket'];
                }
                else
                {
                    $message = "Wystąpił błąd! Koszyk nie jest dostępny!";
                }
            }
            if(isset($message))
            {
                echo '<p style="width: 100%; text-align: center;">' . $message . '</p>';
            }
            else
            {
                echo '<form action="index.php?modifyBasket" method="post" class="basket">';
                    echo '<table>';
                        echo '<tr><td colspan="4" class="basket_title">Zawartość koszyka</td></tr>';
                        echo '<tr>';
                            echo '<th>Nazwa</th>';
                            echo '<th>Cena</th>';
                            echo '<th>Ilość</th>';
                            echo '<th>Wartość</th>';
                        echo '</tr>';

                        $sum = 0;
                        while($row = $products->fetch())
                        {
                            echo '<tr>';
                                echo '<td>' . $row['product_name'] . '</td>';
                                if($row['product_sale'] == "1")
                                {
                                    $price = $row['product_sale_price'];
                                }
                                else
                                {
                                    $price = $row['product_price'];
                                }
                                echo '<td>' . $price . '</td>';
                                if($allow_mod == true)
                                {
                                    echo '<td><input type="number" name="' . $row['product_id'] . '" value="' . $basket[$row['product_id']]->$amount . '></td>';
                                }
                                else
                                {
                                    echo '<td>' . $basket[$row['product_id']]->$amount . '</td>';
                                }
                                $value = $basket[$row['product_id']]->$amount * $price;
                                $sum += $value;
                                echo '<td>' . $value . '</td>';
                            echo '</tr>';
                        }

                        echo '<tr>';
                            echo '<td colspan="3">Suma</td>';
                            echo '<td>' . sprintf("%01.2f", $sum) . ' PLN</td>';
                        echo '</tr>';

                        if($allow_mod == true)
                        {
                            echo '<tr>';
                                echo '<td colspan="4">';
                                    echo '<input type="submit" value="Zapisz zmiany">'
                                echo '</td>';
                            echo '</tr>';
                        }
                        echo '<tr>';
                            echo '<td colspan="4">';
                                echo '<a href="save_order.php"><button type="button">Przejdź do podsumowania</button></a>';
                            echo '</td>';
                        echo '</tr>';
                    echo '</table>';
                echo '</form>';
            }
        }
        function modify()
        {
            foreach($_SESSION['basket'] as $id => $item)
            {
                if(!isset($_POST[$id]))
                {
                    unset($_SESSION['basket'][$id]);
                }
                elseif($_POST[$id] < 1)
                {
                    unset($_SESSION['basket'][$id]);
                }
                else
                {
                    $item->ile = (int) $_POST[$id];
                }
            }
        }
    }

    class element_koszyka
    {
        public $product_id;
        public $product_name;
        public $amount;
        public $price;
        function __construct($product_id, $product_name, $amount, $price)
        {
            $this->product_id = $product_id;
            $this->product_name = $product_name;
            $this->amount = $amount;
            $this->price = $price;
        }
    }
?>