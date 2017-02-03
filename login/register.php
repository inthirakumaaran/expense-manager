<?php
/**
 * Created by PhpStorm.
 * User: kumaar
 * Date: 1/26/2017
 * Time: 5:52 PM
 */
if (isset ($_POST['name'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $con = mysqli_connect("localhost", "root", "", "expense_manager");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    else{
        $db="select id from user where username = '$name'";
        $result = mysqli_query($con, $db);
        $count = mysqli_num_rows($result);
        if ($count == 0){
            $sql = "INSERT INTO user (`id`, `username`, `password`)
            VALUES ('','$name','$password')";
            mysqli_query($con, $sql) or die (mysqli_connect_error());
            $note=$name." is registered" ;
        }
        else {
            $note=$name." is already registered";
        }



//        echo "details of " . $name . "  is registered <br>";
    }

   
}
else{
}
?>
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
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">

            <a class="navbar-brand navbar-static-top " href="/">Expense Manager</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
<!--            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->
                        <li><a href="/expense_manager/login/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
    </div>
    </div>
</nav>
<div class="container">
<form action="" class="col-md-offset-3 col-md-5" method = "POST">
    <div class="form-group">
        <label>User Name:</label>
        <input type="text" name="name" class="form-control" value="" placeholder="Enter Your Name"required>
    </div>
    <div class="form-group">
        <label>Password:</label>
        <input type="password" name="password"  class="form-control"  placeholder="Enter password" required>
    </div>

    <button type="submit" class="btn btn-primary" value="Submit" >Register</button>
    <button type="reset" class="btn btn-danger" value="Reset!">Cancel</button>
    <div class="form-group" style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $note; ?></div>

</form>
    <?php echo $note="";?>
</div>
</body>
