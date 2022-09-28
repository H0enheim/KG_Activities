<?php

include_once("connections/connection.php");

$con = connection ();

        $id = $_GET['ID'];

        $sql = "SELECT * FROM students_list  WHERE ID = '$id'";
        $students = $con -> query($sql) or die($con -> error);

        $row = $students -> fetch_assoc();

    if (isset($_POST['submit']))  {
        //echo 'submitted';
        
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $bday = $_POST['birthday'];
        $en_date = $_POST['enrolled_date'];
        $id = $_GET['ID'];

        $sql = "UPDATE `students_list` SET  `firstname` = '$fname' , `lastname` = '$lname', `Birthday` = ' $bday', `gender` = '$gender', `enrolled_date` = '$en_date' WHERE `ID` = '$id' ";

        $con->query($sql) or die ($con->error);

        echo header("Location: details.php?ID=".$id);
        
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
 
        <label> Birthday </label>
        <input type='text' name='birthday' id='birthday' value="<?php echo $row['enrolled_date']; ?>"/> 
        
        <label> Gender </label>
        <select name="gender" id="gender"> 
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>

        <label> Enrolled Date </label>
        <input type='text' name='enrolled_date' id='enrolled_date' value="<?php echo $row['enrolled_date']; ?>"/> 
    <br/>
    <input type='submit' name='submit' value='Update'/> 

    </form>
</body>
</html>