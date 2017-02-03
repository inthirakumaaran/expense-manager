<?php
/**
 * Created by PhpStorm.
 * User: kumaar
 * Date: 1/27/2017
 * Time: 9:36 PM
 */
include 'C:\xampp\htdocs\expense_manager\layout\header.php';
?>
    <html >
    <header>
        <style>

        .btn-circle {
            width: 20%;
            height: 5%;
            padding: 7% 10px ;
            font-size: 24px;
            font-family: "Lucida Console", Monaco, monospace;
            font-weight: bold;
            font-variant: small-caps;
            line-height: 100%;
            border: 5px double lightgrey;
            /*background-color: lightgrey;*/
            border-radius: 50%;
            margin : 20px 20px 100px 20px;
        }
            .jumbotron{
                margin : 10px 30px 10px 30px;
                background-color:#FFFFFF;
                text-align: center;
                font-variant: small-caps;
                font-family: "Comic Sans MS", cursive, sans-serif;
                font-style: italic;
            }

        </style>
    </header>
    <body>
<!--    <div class ="col-md-offset-2 col-md-10">-->
<!--        <form>-->
            <div class="jumbotron">
            <h3  > Select the Budget type </h3> </div>
<!--            <div class="btn-group">-->
<!--                <div class="form-group">-->
                    <a type="button" class="btn btn-circle btn-default" href="/expense_manager/controller/budget.php?task=add">Add New Type</a>
<!--                </div>-->
<!--                <div class="form-group">-->
                    <a type="button" class="btn btn-circle btn-default" href="/expense_manager/controller/budget.php?task=daily">Daily</a>
<!--                </div>-->
<!--                <div class="form-group">-->
                    <a type="button" class="btn btn-circle btn-default" href="/expense_manager/controller/budget.php?task=monthly">Monthly</a>
<!--                </div>-->
<!--                <div class="form-group">-->
                    <a type="button" class="btn btn-circle btn-default" href="/expense_manager/controller/budget.php?task=annual">Annual</a>
<!--<a type="button" class="btn btn-circle btn-default" href="/expense_manager/controller/budget.php?task=edit">Edit</a>-->
<!--                </div>-->

<!--            </div>-->
<!--    </form>-->
<!--    </div>-->
    </body>
<!--       </div>-->

<?php include 'C:\xampp\htdocs\expense_manager\layout\footer.php';?>