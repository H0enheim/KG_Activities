<?php



include_once("connections/connection.php");

$con = connection ();



if (isset($_POST['submit']))  {
    echo 'submitted';
    

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO `students_list` (`firstname`, `lastname`, `gender`) VALUES (' $fname','$lname','  $gender')";


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
    <title>Student Database</title>
 
</head>
<body>
<a href = "login.php"> login</a>

   <form action = '' method ='POST' >

    <label> First Name </label>
   <input type = 'text' name = 'firstname' id='firstname' />

     <label> Last Name </label>
   <input type = 'text' name = 'lastname' id='lastname' />

   <label> Gender </label>
        <select name = 'gender' id='gender'>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
    
        </select>
  


   <input type ='submit' name = 'submit' value = 'create'/>

    </form>
    
</body>
</html>
