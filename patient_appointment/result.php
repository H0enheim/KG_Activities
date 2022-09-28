<?php

if(!isset ($_SESSION)){
    session_start();
}

if(isset ($_SESSION['userlogin'])) {  
    echo 'WELCOME'.$_SESSION['userlogin'];
} 
else {
    echo 'Welcome Guest';
}



include_once("connections/connection.php");


$con = connection ();

$search = $_GET['search'];



$sql = "SELECT * FROM patient_list WHERE `firstname` LIKE '%$search%' || `lastname` LIKE '%$search%'  ORDER BY patientnumber DESC";

$patient = $con->query($sql) or die ($con->error);

$row = $patient-> fetch_assoc();

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Hospital Database</title>

</head>
<body>
<from action ="result.php" method ="get">

    <a href = "insert.php"> Insert data</a>

    <?php if(isset($_SESSION['userlogin'])) { ?> 
         <a href="logout.php"> Log out </a>  
    <?php } else { ?>
           <a href="login.php"> Log In </a> 
    <?php }?>
    <input type ="text" name ="search" id="search">
    <button type="submit">Search</button>
 
    <h1>Hospital Appointments</h1>
</br>
</br>


    <table> 
        <thead>
            <tr>
            <th></th>
             <th>First Name</th>  
             <th>Last Name</th> 
             <th> Appointment Date</th>
             <th> Attending </th>
             <th> Department </th> 
            </tr>
        </thead>
        <tbody>
       <?php do{ ?>
        <tr>

    <td><a href="details.php? ID=<?php echo $row['patientnumber'];?>"> View </a></td>
     <td><?php echo $row['firstname']; ?></td>
     <td><?php echo $row['lastname']; ?></td>
     <td><?php echo $row['appointmentdate']; ?></td>
     <td><?php echo $row['attending']; ?></td>
     <td><?php echo $row['Department']; ?></td>
       </tr>
 <?php }while($row = $patient->fetch_assoc()) ?>
       </tbody>
    </table>
    </form>
</body>
</html>
