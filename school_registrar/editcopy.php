<?php

include_once("connections/connections.php");

$con = connection ();

        $id = $_GET['ID'];

        $sql = "SELECT * FROM students_list  WHERE ID_num = '$id'";
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

        $sql = "UPDATE `students_list` SET  `Firstname` = '$fname' , `Lastname` = '$lname', `Birthday` = ' $bday', `Gender` = '$gender', `Enrolled_date` = '$en_date' WHERE `ID_num` = '$id' ";

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
        <input type='text' name='firstname' id='firstname' value="<?php echo $row['Firstname']; ?>"/> 
        
        <label> Last Name </label>
        <input type='text' name='lastname' id='lastname' value='<?php echo $row['Lastname']; ?>'/> 
 
        <label> Birthday </label>
        <input type='text' name='birthday' id='birthday'/> 
        
        <label> Gender </label>
        <select name="gender" id="gender"> 
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>

        <label> Enrolled Date </label>
        <input type='text' name='enrolled_date' id='enrolled_date' value="<?php echo $row['Enrolled_date']; ?>"/> 
    <br/>
    <input type='submit' name='submit' value='Submit'/> 

    </form>
</body>
</html>