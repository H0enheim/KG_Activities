<?php



include_once("connections/connection.php");

$con = connection ();



if (isset($_POST['submit']))  {
   echo 'Submitted';  
    

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $appointmentdate = $_POST ['appointmentdate'];
    $attending = $_POST['attending'];
    $department = $_POST['Department'];

    $sql = "INSERT INTO `patient_list`(`firstname`, `lastname`, `appointmentdate`, `attending`,`Department`) VALUES (' $fname','$lname','$appointmentdate',' $attending','$department')";


    $con->query($sql) or die ($con->error);
    echo header("Location: index.php");
}
?>


  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Patient Database</title>
 
</head>
<body>
<a href = "login.php"> login</a>
   <form action = '' method ='POST' id= 'formsu' >
    <h7 style ="margin-bottom: 10px;">Patient Records</h7>

    <label> First Name </label>
   <input type = 'text' name = 'firstname' id='firstname' />

     <label> Last Name </label>
   <input type = 'text' name = 'lastname' id='lastname' />

   <label> Date </label>
   <input type = 'text' name = 'appointmentdate' id='appointmentdate' />

   <label> Attending </label>
   <input type = 'text' name = 'attending' id='attending' />

   <label> Department</label>
   <input type = 'text' name = 'Department' id='department' />
  



   <input type ='submit' name = 'submit' value = 'submit' id='button'/>

    </form>
    
</body>
</html>
