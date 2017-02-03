<?php
/**
 * Created by PhpStorm.
 * User: kumaar
 * Date: 1/26/2017
 * Time: 9:09 AM
 */
session_start();

if(session_destroy()) {
    header("Location: login.php");
}
?>