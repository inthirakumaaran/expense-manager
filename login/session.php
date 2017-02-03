<?php
/**
 * Created by PhpStorm.
 * User: kumaar
 * Date: 1/26/2017
 * Time: 9:07 AM
 */
$con = mysqli_connect("localhost", "root", "", "expense_manager");
session_start();

$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($con,"select username from user where username = '$user_check' ");

$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session = $row['username'];

if(!isset($_SESSION['login_user'])){
    header('location: /expense_manager/login/login.php');
}
?>