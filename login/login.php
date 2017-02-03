<?php
/**
 * Created by PhpStorm.
 * User: kumaar
 * Date: 1/26/2017
 * Time: 8:59 AM
 */


   session_start();
    $con = mysqli_connect("localhost", "root", "", "expense_manager");
   if($_SERVER["REQUEST_METHOD"] == "POST") {
       // username and password sent from form

       $myusername = mysqli_real_escape_string($con,$_POST['username']);
       $mypassword = mysqli_real_escape_string($con,$_POST['password']);

       $sql = "SELECT id FROM user WHERE username = '$myusername' and password = '$mypassword'";
       $result = mysqli_query($con,$sql);
       $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
       $active = $row['active'];

       $count = mysqli_num_rows($result);

       // If result matched $myusername and $mypassword, table row must be 1 row

       if($count == 1) {

           $_SESSION['login_user'] = $myusername;
           header("location: /expense_manager/views/add_new.php");

       }else {
           $error = "Your Login Name or Password is invalid";
       }
   }
?>
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
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
           
            <a class="navbar-brand navbar-static-top " href="/">Expense Manager</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/expense_manager/login/Register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>

        </ul>
    </div>
    </div>
</nav>

    <div class="container">
            <form action = "" method = "post" class="col-md-offset-3 col-md-5">
                <div class="form-group">
                <label>UserName  :</label><br>
                    <input type = "text" name = "username" class = "form-control"><br /></div>
                <div class="form-group">
                <label>Password  :</label><br>
                    <input type = "password" name = "password" class="form-control" /><br/></div>
                <input type = "submit" class="btn btn-primary" value = " Submit "/><br />
                <div class="form-group" style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
            </form>



        </div>

    </div>

</div>

</body>
</html>


