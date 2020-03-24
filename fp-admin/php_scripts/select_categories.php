<?php
    require_once "connect.php";
    function select_categories()
    {
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM product_categories WHERE category_status = 1 ORDER BY category_name");
        try
        {
            $stmt->execute();
            while($cat = $stmt->fetch())
            {
                echo '<option value="' . $cat['category_id'] . '">' . $cat['category_name'] . '</option>';
            }
        }
        catch(Exception $e)
        {
            echo '<option value="1">Wystąpił problem z wyświetleniem kategorii!</option>';
        }
    }
    
?>