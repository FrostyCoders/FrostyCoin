<?php
    session_start();
    if(!isset($_SESSION['fp-online']) || !isset($_GET['oid']))
    {
        $_SESSION['result'] = "Wystąpił błąd!";
        header("Location: ../../orders.php");
        exit();
    }
    else
    {
        require_once "../../connect.php";
        $order_id = $_GET['oid'];
        $sql = "SELECT shop_orders.*, shop_users.* FROM shop_orders INNER JOIN shop_users ON shop_orders.user_id = shop_users.user_id WHERE shop_orders.order_id = :order_id";
        $info = $conn->prepare($sql);
        $info->bindParam(":order_id", $order_id);
        try
        {
            $info->execute();
        }
        catch(Exception $e)
        {
            $_SESSION['result'] = "Wystąpił błąd podczas generowania faktury!";
            header("Location: ../../orders.php");
            exit();
        }
        require "fpdf.php";
        $order = $info->fetch();
        $pdf = new FPDF('P','mm','A4');

        $pdf->AddPage();

        //set font to arial, bold, 14pt
        $pdf->SetFont('Arial','B',14);

        //Cell(width , height , text , border , end line , [align] )

        $pdf->Cell(130	,5,'FROSTY COIN SHOP',0,0);
        $pdf->Cell(59	,5,'FAKTURA',0,1);//end of line

        //set font to arial, regular, 12pt
        $pdf->SetFont('Arial','',12);

        $pdf->Cell(130	,5,'ul. Kolejowa 23',0,0);
        $pdf->Cell(59	,5,'',0,1);//end of line

        $pdf->Cell(115	,5,'34-400 Nowy Targ',0,0);
        $pdf->Cell(40	,5,'Data:',0,0);
        $pdf->Cell(34	,5,'29-03-2020',0,1);//end of line

        $pdf->Cell(115	,5,'Telefon: +48123456789',0,0);
        $pdf->Cell(40	,5,'Faktura nr:',0,0);
        $pdf->Cell(34	,5,'1',0,1);//end of line

        $pdf->Cell(115	,5,'E-mail: frosty_coin@gmail.com',0,0);
        $pdf->Cell(40	,5,'Identyfikator klienta:',0,0);
        $pdf->Cell(34	,5,'1',0,1);//end of line

        //make a dummy empty cell as a vertical spacer
        $pdf->Cell(189	,10,'',0,1);//end of line

        //billing address
        $pdf->Cell(100	,5,'Faktura wystawiona dla:',0,1);//end of line

        //add dummy cell at beginning of each line for indentation
        $pdf->Cell(10	,5,'',0,0);
        $pdf->Cell(90	,5,$order['user_name']." ".$order['user_surname'],0,1);

        $pdf->Cell(10	,5,'',0,0);
        $pdf->Cell(90	,5,$order['user_street']." ".$order['user_house_no'],0,1);

        $pdf->Cell(10	,5,'',0,0);
        $pdf->Cell(90	,5,$order['user_postcode']." ".$order['user_city'],0,1);

        $pdf->Cell(10	,5,'',0,0);
        $pdf->Cell(90	,5,"Telefon: ".$order['user_phone_number'],0,1);

        $pdf->Cell(10	,5,'',0,0);
        $pdf->Cell(90	,5,"E-mail: ".$order['user_email'],0,1);

        //make a dummy empty cell as a vertical spacer
        $pdf->Cell(189	,10,'',0,1);//end of line

        //invoice contents
        $pdf->SetFont('Arial','B',12);

        $pdf->Cell(110	,5,'Opis',1,0);
        $pdf->Cell(35	,5,'Cena',1,0);
        $pdf->Cell(14	,5,'Ilosc',1,0);
        $pdf->Cell(30	,5,'Wartosc',1,1);//end of line

        $pdf->SetFont('Arial','',10);

        //Numbers are right-aligned so we give 'R' after new line parameter

        $products = explode(",", $order['order_products']);
        $prices = explode(",", $order['order_prices']);
        $amounts = explode(",", $order['order_amounts']);
        
        $sql_product = $conn->prepare("SELECT product_name FROM products WHERE product_id = :pid");
        $i = 0;
        $value = 0;
        foreach($products as $products)
        {
            $sql_product->bindParam(":pid", $products);
            try
            {
                $sql_product->execute();
            }
            catch(Exception $e)
            {
                $_SESSION['result'] = "Wystąpił błąd podczas generowania faktury!";
                header("Location: ../../orders.php");
                exit();
            }
            $name = $sql_product->fetch();
            $pdf->Cell(110	,5,$name['product_name'],1,0);
            $pdf->Cell(35	,5,number_format($prices[$i], 2)." PLN",1,0);
            $pdf->Cell(14	,5,$amounts[$i],1,0);
            $value += $prices[$i]*$amounts[$i];
            $pdf->Cell(30	,5,number_format($prices[$i]*$amounts[$i], 2)." PLN",1,1,'R');//end of line
            $i++;
        }

        //summary
        $pdf->Cell(146	,5,'',0,0);
        $pdf->Cell(13	,5,'Suma',0,0);
        $pdf->Cell(30	,5,number_format($value, 2)." PLN",1,1,'R');//end of line

        $pdf->Output("", "faktura".$order['order_id']);
    }
?>