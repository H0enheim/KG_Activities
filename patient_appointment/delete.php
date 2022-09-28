<?php

include_once('connections/connection.php');
// connection ();

$con = connection ();

echo $_GET['ID'];



if(isset($_POST['delete'])){

    $id = $_POST['ID'];
    $sql = "DELETE FROM `patient_list` WHERE  `patientnumber` = '$id'";
    $con->query($sql) or die ($con->error);
    echo header("Location: index.php");
}

// $id = $_GET['ID'];

// if($con->connect_error) {
//     die("Connection failed: " .$con->connect_error);
// }

// $sql = "DELETE FROM `patient_list` WHERE  `patientnumber` = '$id'  ";
// if($con->query($sql) === TRUE) {
//     echo  '<script>alert("Appointment record deleted.")</script>';


// }   else {
//     echo "ERROR! Appointment record: " .$con -> error." not Deleted";
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button><a href="index.php"><-Back</a></button>
</body>
</html>