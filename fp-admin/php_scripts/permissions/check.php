<?php
    function check_users()
    {
        if($_SESSION['admin_p_users'] == 0)
        {
            $_SESSION['result'] = "Nie masz uprawnień do przeprowadzenia tej operacji!";
            return false;
        }
        else
        {
            return true;
        }
    }
    function check_products()
    {
        if($_SESSION['admin_p_products'] == 0)
        {
            $_SESSION['result'] = "Nie masz uprawnień do przeprowadzenia tej operacji!";
            return false;
        }
        else
        {
            return true;
        }
    }
    function check_site()
    {
        if($_SESSION['admin_p_site'] == 0)
        {
            $_SESSION['result'] = "Nie masz uprawnień do przeprowadzenia tej operacji!";
            return false;
        }
        else
        {
            return true;
        }
    }
    function check_orders()
    {
        if($_SESSION['admin_p_orders'] == 0)
        {
            $_SESSION['result'] = "Nie masz uprawnień do przeprowadzenia tej operacji!";
            return false;
        }
        else
        {
            return true;
        }
    }
?>