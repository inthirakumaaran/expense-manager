<?php
/**
 * Created by PhpStorm.
 * User: kumaar
 * Date: 1/24/2017
 * Time: 11:03 PM
 */
function add($name, $amount, $date,$description,$type){
    $con = mysqli_connect("localhost", "root", "", "expense_manager");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    else{
        $sql = "INSERT INTO expense (`id`, `name`, `amount`, `date`,`description`,`type`)
        VALUES ('','$name','$amount', '$date','$description','$type')";
        mysqli_query($con, $sql) or die (mysqli_connect_error());
//        echo "details of " . $name . "  is saved <br>";
    }
}

function view()
{
    $con = mysqli_connect("localhost", "root", "", "expense_manager");

    echo '<table class="table table-striped col-md-6 ">
	<thead valign="top">
	<th align="center">Edit</th>
	<th align="center">Date</th>
	<th align="center">Expense Name</th>
	<th align="center">Expense Type</th>
	<th align="center">Amount</th>
	<th align="center">Description</th>
	<th align="center">Delete</th>
	</thead>
	<tbody valign="top">';
    $sql = "SELECT * FROM expense order by id DESC ";

    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo '<tr>
				<td align="left"><a href="/expense_manager/views/edit.php?job=edit&id=' . $row[id] . '"  >Edit</a></td>
				<td align="left">' . $row[date] . '</td>					
				<td align="left">' . $row[name] . '</td>
				<td align="left">' . $row[type] . '</td>
				<td align ="left">' . $row[amount] . '</td>
				<td align ="left">' . $row[description] . '</td>
				<td align="left"><a href="/expense_manager/controller/expense_add.php?task=delete&id='.$row[id].'">Delete</a></td>
				</tr>';
    }
    echo '</tbody></table>';
}
function delete($id){
    $con = mysqli_connect("localhost", "root", "", "expense_manager");

    // Check connection
    if (mysqli_connect_errno($con)) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error($con);
    }
    else {
        $sql = "DELETE FROM expense WHERE id='$id'";
        mysqli_query($con, $sql) or die (mysqli_connect_error());
//        echo "Deleted";
    }
}
function update($name,$amount,$date,$id,$description,$type){
    $con = mysqli_connect("localhost", "root", "", "expense_manager");
    if (mysqli_connect_errno($con)) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error($con);
    }
    else {
        $sql = "update expense set name ='$name', amount='$amount',date='$date',description ='$description' ,type='$type'where id ='$id'";
        mysqli_query($con, $sql) or die (mysqli_connect_error());
        echo "details of " . $name . "  is saved <br>";
    }
}
function viewmonth()
{
    $con = mysqli_connect("localhost", "root", "", "expense_manager");

    echo '<table class="table table-striped col-md-6 ">
	<thead valign="top">
	<th align="center">Year</th>
	<th align="center">Month</th>
	<th align="center">Total </th>
	
	
	</thead>
	<tbody valign="top">';

    $sql ="SELECT Year(date) as Year ,Month(date)as Month, sum(amount) as Totalcost FROM expense GROUP BY Year, Month(date);";

    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo '<tr>
			    <td align="left">' . $row[Year] . '</td>
				<td align="left">' . $row[Month] . '</td>					
				<td align="left">' . $row[Totalcost] . '</td>
				
				
				</tr>';
    }
    echo '</tbody></table>';


}
function viewannual()
{
    $con = mysqli_connect("localhost", "root", "", "expense_manager");
    echo '<table class="table table-striped col-md-4 ">
	<thead valign="top">
	<th align="center">Year</th>
	<th align="center">Total </th>
	</thead>
	<tbody valign="top">';
    $sql ="SELECT Year(date) as Year , sum(amount) as Totalcost FROM expense GROUP BY Year ;";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo '<tr>
			    <td align="left">' . $row[Year] . '</td>
				<td align="left">' . $row[Totalcost] . '</td>
				</tr>';
    }
    echo '</tbody></table>';
}
function viewweek()
{
    $con = mysqli_connect("localhost", "root", "", "expense_manager");
    echo '<table class="table table-striped col-md-4 ">
	<thead valign="top">
	<th align="center">Year</th>
	<th align="center">Month</th>
	<th align="center">WeekNo</th>
	<th align="center">Total </th>
	</thead>
	<tbody valign="top">';
    $sql ="select year(date) as year ,month(date) as month,week(date) as week,sum(amount) as Totalcost FROM expense  GROUP BY week(date);";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo '<tr>
			    <td align="left">' . $row[year] . '</td>
			    <td align="left">' . $row[month] . '</td>
			    <td align="left">' . $row[week] . '</td>
				<td align="left">' . $row[Totalcost] . '</td>
				</tr>';
    }
    echo '</tbody></table>';
}
function search($construct,$foundnum){
    $con = mysqli_connect("localhost", "root", "", "expense_manager");
    $construct ="SELECT * FROM expense WHERE $construct";
    $run =mysqli_query($con, $construct);
    global $foundnum;
    $foundnum+= mysqli_num_rows($run);;
    return $run;
//    if ($foundnum==0)
//        echo "Sorry, nothing found ";
//    else
//    {
//        echo "$foundnum results found !<p>";
//        echo '<table class="table table-striped col-md-6 ">
//	                <thead valign="top">
//	                <th align="center">Edit</th>
//	                <th align="center">Date</th>
//	                <th align="center">Expense Name</th>
//	                <th align="center">Amount</th>
//	                <th align="center">Description</th>
//                    <th align="center">Delete</th>
//	                </thead>
//	                <tbody valign="top">';
//
//        while($runrows = mysqli_fetch_array($run, MYSQLI_ASSOC))
//        {echo '<tr>
//				<td align="left"><a href="/expense_manager/views/edit.php?job=edit&id=' . $runrows[id] . '"  >Edit</a></td>
//				<td align="left">' . $runrows[date] . '</td>
//				<td align="left">' . $runrows[name] . '</td>
//				<td align ="left">' . $runrows[amount] . '</td>
//				<td align ="left">' . $runrows[description] . '</td>
//				<td align="left"><a href="/expense_manager/controller/expense_add.php?task=delete&id='.$runrows[id].'">Delete</a></td>
//				</tr>';
//        }
//        echo '</tbody></table>';
//
//
//}
}
function searchtab($run){
    while($runrows = mysqli_fetch_array($run, MYSQLI_ASSOC))
    {echo '<tr>
				<td align="left"><a href="/expense_manager/views/edit.php?job=edit&id=' . $runrows[id] . '"  >Edit</a></td>
				<td align="left">' . $runrows[date] . '</td>					
				<td align="left">' . $runrows[name] . '</td>
				<td align="left">' . $runrows[type] . '</td>
				<td align ="left">' . $runrows[amount] . '</td>
				<td align ="left">' . $runrows[description] . '</td>
				<td align="left"><a href="/expense_manager/controller/expense_add.php?task=delete&id='.$runrows[id].'">Delete</a></td>
				</tr>';
    }
//    echo '</tbody></table>';


}