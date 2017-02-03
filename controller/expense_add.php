<?php
/**
 * Created by PhpStorm.
 * User: kumaar
 * Date: 1/24/2017
 * Time: 6:46 PM
 */
include 'C:\xampp\htdocs\expense_manager\controller\functions.php';
include 'C:\xampp\htdocs\expense_manager\layout\header.php';
//ini_set('error_reporting', E_ALL & ~E_NOTICE);
if (isset ($_POST['name'])) {
    $name = $_POST['name'];
    $amount = $_POST['amount'];
    $date = date_format(date_create($_POST['date']),"Y-m-d");
    $description=$_POST['description'];
    $type=$_POST['type'];
    add($name, $amount, $date,$description,$type);
    view();
}
else{
}
if($_REQUEST['task']=="delete"){
    $id=$_REQUEST['id'];
    delete($id);
    view();
}
include 'C:\xampp\htdocs\expense_manager\layout\footer.php';





