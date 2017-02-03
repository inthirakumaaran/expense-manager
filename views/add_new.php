<!--<html>-->
<!---->
<!--<body>-->
<?php include 'C:\xampp\htdocs\expense_manager\layout\header.php';?>

<form action="/expense_manager/controller/expense_add.php" class="col-md-offset-3 col-md-5" method = "POST">
    <div class="form-group">
    <label>Expense Name:</label>
    <input type="text" name="name" class="form-control" value="" placeholder="Enter Expense Name"required>
    </div>
    <div class="form-group">
        <?php
        $sql = "SELECT * FROM budget where type='other' ";
        $result = mysqli_query($con, $sql);
        $count  = mysqli_num_rows($result);
        echo'
    <label>Expense Type:</label>
        <select class="form-control" name="type">';
        echo' <option value ="Normal"> Normal</option>';
       while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
           echo'  <option value = '.$row[ex_cate].'> '.$row[ex_cate].'</option>';
             };
        echo'</select>';?>
<!--    <input type="text" name="type" class="form-control" value="" placeholder="Select Expense Type"required>-->
    </div>
    <div class="form-group">
    <label>Expense Amount:</label>
    <input type="number" name="amount"  class="form-control" value="" min="0" placeholder="Enter Expense Amount" required>
    </div>
    <div class="form-group">
    <label>Date:</label>
    <input type="date" class="form-control" name="date" placeholder="yyyy-mm-dd"value="" required>
<!--        <div class='input-group date' id='datetimepicker1'>-->
<!--            <input type='text' class="form-control" />-->
<!--                    <span class="input-group-addon">-->
<!--                        <span class="glyphicon glyphicon-calendar"></span>-->
<!--                    </span>-->
<!--        </div>-->
    </div>
    <div class="form-group">
        <label>Description:</label>
        <textarea type="text"  rows="3 "name="description" class="form-control" value="" placeholder="Enter Description"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
<!--    <input type="submit" value="Submit">-->
</form>
<!--<script type="text/javascript">-->
<!--    $(function () {-->
<!--        $('#datetimepicker1').datetimepicker();-->
<!--    });-->
<!--</script>-->
<?php include 'C:\xampp\htdocs\expense_manager\layout\footer.php';?>