<?php
/**
 * Created by PhpStorm.
 * User: kumaar
 * Date: 1/27/2017
 * Time: 12:38 AM
 */
include 'C:\xampp\htdocs\expense_manager\controller\functions.php';
include 'C:\xampp\htdocs\expense_manager\layout\header.php';

if($_REQUEST['date']=="weekly"){
    
 viewweek();
}
elseif ($_REQUEST['date']=="monthly"){
    viewmonth();
}
elseif ($_REQUEST['date']=="non"){
    view();
}
elseif ($_REQUEST['date']=="annual"){
    viewannual();
}
else{
    echo "error in the system";
}
include 'C:\xampp\htdocs\expense_manager\layout\footer.php';