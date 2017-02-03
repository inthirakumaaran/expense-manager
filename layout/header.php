<?php include('C:\xampp\htdocs\expense_manager\login\session.php');?>
<?php ini_set('error_reporting', E_ALL & ~E_NOTICE);?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Expense Manager</title>
    <script src="../xampp/htdocs/expense_manager/layout/js/jquery.min.js"></script>
    <script src="../xampp/htdocs/expense_manager/layout/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="/expense_manager/layout/css/bootstrap.min.css">

    
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nb">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Expense Manager</a>
        </div>
        <div class="collapse navbar-collapse" id="nb">
            <ul class="nav navbar-nav">
                <li><a href="/expense_manager/views/add_new.php">Expense</a></li>
                <li><a href="/expense_manager/views/Report.php">Report</a></li>
                <li><a href="/expense_manager/views/budget.php">Budget</a></li>
            </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span>  <?php echo $login_session;?>   </a></li>
                    <li><a href="/expense_manager/login//logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>

              
        </div>
    </div>
</nav>
<div class="container  ">
    
