<?php
/**
 * Created by PhpStorm.
 * User: kumaar
 * Date: 1/24/2017
 * Time: 8:04 PM
 */

include 'C:\xampp\htdocs\expense_manager\controller\functions.php';
include 'C:\xampp\htdocs\expense_manager\layout\header.php';
if($_REQUEST['job']=="edit"){
    $con = mysqli_connect("localhost", "root", "", "expense_manager");
    $id=$_REQUEST['id'];
    $sql = "SELECT * FROM expense where id='$id' ";

    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    echo'<div class= "container col-md-offset-3 col-md-5"><form action="/expense_manager/views/edit.php?job=update&id='.$row[id].'" method = "POST">';
    echo'<div class="form-group">
    <label>Expense Name:</label>
    <input type ="text" class="form-control" name="name" value = "'.$row[name].'" required>
    <br></div>';
    echo'
    <div class="form-group">';
    $db = "SELECT * FROM budget where type='other' ";
        $rest= mysqli_query($con, $db);
        echo'
        <label>Expense Type:</label>
        <select class="form-control" name="type">
        <option value ='.$row['type'].'> '.$row['type'].'</option>';
        if ($row['type'] != 'Normal'){
        echo' <option value ="Normal"> Normal</option>'; };
       while ($run = mysqli_fetch_array($rest, MYSQLI_ASSOC)) {
           echo'  <option value = '.$run[ex_cate].'> '.$run[ex_cate].'</option>';
       };
        echo'</select> </div>';
    echo'<div class="form-group">
    <label>Expense Amount:</label>
    <input type="number" class="form-control" name="amount" value="'.$row[amount].'" min="0" required>
    <br></div>';
    echo'<div class="form-group">
    <label>Date:</label>
     <input type="date" class="form-control" name="date" value="'.$row[date].'" required>
    <br></div>';
    echo'<div class="form-group">
        <label>Description:</label>
        <textarea  rows="3 "name="description" class="form-control"  >'.$row[description].'</textarea>
    </div>';
    echo'<br>
    <button type="submit" class="btn btn-primary" value="Submit">Edit </button>
</form>';
}

if($_REQUEST['job']=="update"){
    $name = $_POST['name'];
    $amount = $_POST['amount'];
    $date = date_format(date_create($_POST['date']),"Y-m-d");
    $id=$_REQUEST['id'];
    $description=$_POST['description'];
    $type=$_POST['type'];
    update($name, $amount, $date, $id,$description,$type);
    view();
}
else{
}
include 'C:\xampp\htdocs\expense_manager\layout\footer.php';
