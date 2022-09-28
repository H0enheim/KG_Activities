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

$sql = "SELECT * FROM patient_list ORDER BY patientnumber DESC";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <title>Hospital Database</title>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-md-12">
    
   
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item-md-4">
    <a class="nav-link" href = "insert.php"> Insert data</a>
</li>
<li class="nav-item">
    <?php if(isset($_SESSION['userlogin'])) { ?> 
        <button class="btn btn-outline-success">   <a class="nav-link" href="logout.php"> Log out </a>  </button>
    <?php } else { ?>
    </li>
    <li class="nav-item-md-4">
        <button class="btn btn-outline-success">  <a class="nav-link" href="login.php"> Log In </a> </button>
    <?php } ?>
    <li>
    <li class="nav-item-md-4">
    <from action ="result.php" method ="get">
    <input type ="text" name ="search" id="search">
    <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    </li>
    </br>
  
    </div>
    </nav>
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
    
</body>
</html>
