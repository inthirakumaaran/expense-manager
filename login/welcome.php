<?php
/**
 * Created by PhpStorm.
 * User: kumaar
 * Date: 1/26/2017
 * Time: 9:06 AM
 */
include('session.php');
?>
<html">

<head>
    <title>Welcome </title>
</head>

<body>
<h1>Welcome <?php echo $login_session; ?></h1>
<h2><a href = "logout.php">Sign Out</a></h2>
</body>

</html>