<?php
/**
 * Created by PhpStorm.
 * User: kumaar
 * Date: 1/26/2017
 * Time: 5:31 PM
 */
include 'C:\xampp\htdocs\expense_manager\controller\functions.php';
include 'C:\xampp\htdocs\expense_manager\layout\header.php';
?>
<html>
<form action="/expense_manager/controller/search.php" class="col-md-offset-3 col-md-6" method = "POST">
    <div class="form-group">
        <h3>Select the report type:</h3>
           <div class="btn-group btn-group-justified">
                <div class="btn-group">
                    <a type="button" class="btn btn-info" href="/expense_manager/views/viewreport.php?date=weekly">Weekly</a>
                </div>
                <div class="btn-group">
                    <a type="button" class="btn btn-primary" href="/expense_manager/views/viewreport.php?date=monthly">Monthly</a>
                </div>
                <div class="btn-group">
                    <a type="button" class="btn btn-info" href="/expense_manager/views/viewreport.php?date=annual">Annual</a>
                </div>

            </div>

    </div>
     <br />
    <a type="button" class="btn btn-success" href="/expense_manager/views/viewreport.php?date=non">Edit and View</a> <br /><br />
    <!--    <input type="submit" value="Submit">-->
    <div class="form-group">
        <div class="input-group add-on">
        <input type="text" name="search"  placeholder="Search.. ">
            <input type="date" name="date"   placeholder="date.." >
<!--        <div class="input-group-btn">-->
        <button type="submit" class="btn btn-warning glyphicon glyphicon-search"  value="Submit"></button> </div>
    </div>

</form>
<!--<form action="#">--
<!--   -->
<!---->
<!--</form>-->


<?php include 'C:\xampp\htdocs\expense_manager\layout\footer.php';?>
<head>
    <style>
        input[type=text] {
            width: 130px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            /*background-image: url('searchicon.png');*/
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
        }

        input[type=text]:focus {
            width: 100%;
        }
        input[type=date] {
            width: 130px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            /*background-image: url('searchicon.png');*/
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
        }

        input[type=date]:focus {
            width: 50%;
        }
    </style>
</head>
<!--<body>-->
<!---->
<!--<p>Animated search form:</p>-->
<!---->
<!--<form>-->
<!---->
<!--</form>-->
<!---->
<!--</body>-->
<!--</html>-->
