<?php
/**
 * Created by PhpStorm.
 * User: kumaar
 * Date: 1/27/2017
 * Time: 10:39 AM
 */
include 'C:\xampp\htdocs\expense_manager\layout\header.php';
include 'C:\xampp\htdocs\expense_manager\controller\functions.php';

$c=$_POST['date'];
$search=$_POST['search'];
$a=$search." ".$c;
$foundnum=0;
$con = mysqli_connect("localhost", "root", "", "expense_manager");
if(strlen($search)<=1 &&empty($_POST['date']))
    echo "Search term too short";
else {
    echo "You searched for <b>$a</b> <hr size='1'></br>";
    if (!empty($_POST['date'])) {
        $date = date_format(date_create($_POST['date']), "Y-m-d");
        $const .= "date = '$date'";
        $const ="SELECT * FROM expense WHERE $const";
        $run1 =mysqli_query($con, $const);
        $foundnum+= mysqli_num_rows($run1);

    }
    if (strlen($search) > 1 ) {
        $search_exploded = explode(" ", $search);
        $x = 0;
        foreach ($search_exploded as $search_each) {
            echo $search_each;
            $x++;

            if ($x == 1)
                $construct .= "description LIKE '%$search_each%' or name LIKE '%$search_each%' or type LIKE '%$search_each%'";

            else
                $construct .= "or description LIKE '%$search_each%' or name LIKE '%$search_each%'or type LIKE '%$search_each%'";

        }
        $construct ="SELECT * FROM expense WHERE $construct";
        echo $construct."<br>";
        $run = mysqli_query($con, $construct);

        $count = mysqli_num_rows($run);
//        $fo= mysqli_num_rows($run);
        $foundnum+=$count;
    }
    if ($foundnum==0)
        echo "Sorry, nothing found ";
    else
    {
        echo "$foundnum results found !<p>";
        echo '<table class="table table-striped col-md-6 ">
	                <thead valign="top">
	                <th align="center">Edit</th>
	                <th align="center">Date</th>
	                <th align="center">Expense Name</th>
	                <th align="center">Type</th>
	                <th align="center">Amount</th>
	                <th align="center">Description</th>
                    <th align="center">Delete</th>
	                </thead>
	                <tbody valign="top">';
    }
     if (!is_null($run1)){
         searchtab($run1);
     }
     if (!is_null($run)){
         searchtab($run);
     }
    echo '</tbody></table>';
}
include 'C:\xampp\htdocs\expense_manager\layout\footer.php';