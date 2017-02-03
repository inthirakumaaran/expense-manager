<?php
/**
 * Created by PhpStorm.
 * User: kumaar
 * Date: 1/29/2017
 * Time: 12:01 PM
 */
include 'C:\xampp\htdocs\expense_manager\controller\functions.php';
include 'C:\xampp\htdocs\expense_manager\layout\header.php';
$con = mysqli_connect("localhost", "root", "", "expense_manager");
if($_REQUEST['task']=="add"){
    echo'<div class= "container col-md-offset-3 col-md-5"><form action="" method = POST >';
    echo '  <div class="form-group">
    <label>Expense Category:</label>
    <input type="text" name="cate" class="form-control" value="" placeholder="Enter category"required>
    </div>
    <div class="form-group">
    <label>Expected Amount:</label>
    <input type="number" name="eamount"  class="form-control" value="" min="0" placeholder="Enter Expected Amount" required>
    </div>';
    echo'<br>
    <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
</form>';
}

else  if($_REQUEST['task']=="monthly"){
    echo'<div class= "container col-md-offset-3 col-md-5"><form action="" method = POST >';
    echo '  <div class="form-group">
    <label>Enter Month:</label>
    <select class="form-control" name="mt" class="form-control" required>
    <option value="0000-01-00">January</option>
    <option value="0000-02-00">February</option>
    <option value="0000-03-00">March</option>
    <option value="0000-04-00">April</option>
    <option value="0000-04-00">May</option>
   </select>
    </div>
    <div class="form-group">
    <label>Expected Amount:</label>
    <input type="number" name="eamount"  class="form-control" value="" min="0" placeholder="Enter Expected Amount" required>
    </div>';
    echo'<br>
    <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
</form>';

}
else  if($_REQUEST['task']=="daily"){
//    $sql = "SELECT * FROM budget where type='other' ";
//    $result = mysqli_query($con, $sql);
//    $count  = mysqli_num_rows($result);
//    echo'<div class= "container col-md-offset-3 col-md-5"><form action="" method = POST >';
//    if ($count == 0){};
//    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
//        echo "  <div class=\"form-group\">
//                <label>' . $row[ex_cate] . ':</label>";
//        echo"<input type=\"number\" name=\"eamount\"  class=\"form-control\" value=\"\" min=\"0\" placeholder=\"Enter Expected Amount\" required>
//        </div>';";
//    }
}
else  if($_REQUEST['task']=="annual"){
    $id=$_REQUEST['id'];

}
else{
    echo "error in system";
}
if (isset ($_POST['cate'])) {
    $name = $_POST['cate'];
    $amount = $_POST['eamount'];
    $type="other";
    $sql = "SELECT * FROM budget where ex_cate like'$name' ";
    $result = mysqli_query($con, $sql);
    $count  = mysqli_num_rows($result);
    if ($count == 0){
        $db = "INSERT INTO budget (`id`, `ex_cate`, `type`, `amount`)
        VALUES ('','$name','$type', '$amount')";
        if ( mysqli_query($con, $db) ){
            echo $name." is saved";}
       else{
            die (mysqli_connect_error());
           echo "system error";}}
    else {
        echo "category already exist edit it";}
}
if (isset ($_POST['mt'])) {
    $name = $_POST['mt'];
    $amount = $_POST['eamount'];
    $type="month";
    $db = "INSERT INTO budget (`id`, `ex_cate`, `type`, `amount`)
        VALUES ('','$name','$type', '$amount')";
        if ( mysqli_query($con, $db) ){
            echo " month is saved";}
        else{
            die (mysqli_connect_error());
            echo "system error";}
}
//if (isset ($_POST['mt'])) {
//    $name = $_POST['mt'];
//    $amount = $_POST['eamount'];
//    $type="month";
//    $db = "INSERT INTO budget (`id`, `ex_cate`, `type`, `amount`)
//        VALUES ('','$name','$type', '$amount')";
//    if ( mysqli_query($con, $db) ){
//        echo " month is saved";}
//    else{
//        die (mysqli_connect_error());
//        echo "system error";}
//}
include 'C:\xampp\htdocs\expense_manager\layout\footer.php';