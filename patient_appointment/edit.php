<?php

include_once("connections/connection.php");

$con = connection ();

        $id = $_GET['ID'];

        $sql = "SELECT * FROM patient_list  WHERE patientnumber = '$id'";
        $students = $con -> query($sql) or die($con -> error);

        $row = $students -> fetch_assoc();

    if (isset($_POST['submit']))  {
        //echo 'submitted';
        
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $date = $_POST ['appointmentdate'];
        $attending = $_POST['attending'];
        $department = $_POST['Department'];
        $id = $_GET['ID'];

        $sql = "UPDATE `patient_list` SET  `firstname` = '$fname' , `lastname` = '$lname', `appointmentdate` = ' $date', `attending` = '$attending', `Department` = '$department' WHERE `patientnumber` = '$id' ";

        

        $con->query($sql) or die ($con->error);

        echo header("Location: details.php? ID=".$id);
        
    }
?>


<style> 
    <?php include "css/style.css"; ?>
</style> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Database</title>
</head>
<body>
    <form  class="form-cont" method="POST" action=""> 
        
<br/>
        <label> First Name </label>
        <input type='text' name='firstname' id='firstname' value="<?php echo $row['firstname']; ?>"/> 
        
        <label> Last Name </label>
        <input type='text' name='lastname' id='lastname' value='<?php echo $row['lastname']; ?>'/> 
 
        <label> date </label>
        <input type='text' name='appointmentdate' id='appointmentdate' value="<?php echo $row['appointmentdate']; ?>"/> 
        
        <label> Attending </label>
        <input type='text' name='attending' id='attending' value="<?php echo $row['attending']; ?>"/> 
        

        <label> Department </label>
        <input type='text' name='Department' id='department' value="<?php echo $row['Department']; ?>"/> 
    <br/>
    <input type='submit' name='submit' value='Update'/> 

    </form>
</body>
</html>