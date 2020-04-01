<?php
    class element_koszyka
    {
        public $product_id;
        public $product_name;
        public $amount;
        public $price;
        function __construct($product_id, $conn)
        {
            $this->product_id = $product_id;
            $stmt_load = $conn->prepare("SELECT * FROM products WHERE product_id = :pid");
            $stmt_load->bindParam(":pid", $product_id);
            try
            {
                $stmt_load->execute();
            }
            catch(Exception $e)
            {
                $_SESSION['result'] = "Wystąpił błąd podczas dodawania do koszyka!";
                header("Location: index.php");
                exit();
            }
            $product_data = $stmt_load->fetch();
            $this->product_name = $product_data['product_name'];
            $this->amount = 1;
            if($product_data['product_sale'] == "1")
            {
                $price = $product_data['product_sale_price'];
            }
            else
            {
                $price = $product_data['product_price'];
            }
            $this->price = $price;
        }
    }
?>