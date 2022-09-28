<?php


if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['access']) && $_SESSION['access'] == 'admin') {  
    echo 'Welcome '.$_SESSION['userlogin']."<br/> <br/>";
} else {
    //echo 'Welcome Guest';
    echo header("Location: index.php");
}

include_once('connections/connection.php'); 

$con = connection();

$id = $_GET['ID'];


$sql = "SELECT * FROM patient_list WHERE patientnumber ='$id' ";

$patient = $con -> query($sql) or die($con -> error);

$row = $patient -> fetch_assoc();
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
    <div class = "navi">
    <form action ="delete.php">
<button><a href="index.php"><-Back</a></button>

<button><a class="linkk" href="insert.php"> Insert New </a> </button>

<button><a class="linkk" href="edit.php?ID=<?php echo $row['patientnumber'];?>"> Edit </a></button>

<button type="submit" name="delete">Delete</button>
<input type="hidden" name ="ID" value="<?php echo$row['patientnumber'];?>">
</form>
</div>

      <h1>Patient Information</h1>

      <br/> 

   <?php if(isset($_SESSION['userlogin'])) { ?> 
         <a class="linkk" href="logout.php"> Log out </a>  
    <?php } else { ?>
           <a class="linkk" href="login.php"> Log In </a> 
    <?php } ?> 

    <br/>   <br/>
    <table>
        <thead>
        <tr>
             <th>Patient Number</th>
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
    <td><?php echo $row['patientnumber'];?></td>    
    <td><?php echo $row['firstname']; ?></td>
     <td><?php echo $row['lastname']; ?></td>
     <td><?php echo $row['appointmentdate']; ?></td>
     <td><?php echo $row['attending']; ?></td>
     <td><?php echo $row['Department']; ?></td>
        </tr>   
        <tr>
                    <td colspan="6">
                        <h3 style="text-align:center;padding: 5px;">
                            Patient #<?php echo $row['patientnumber']; ?>, 
                            <?php echo $row['firstname']; ?> 
                            <?php echo $row['lastname']; ?> 
                            appointment date <?php echo $row['appointmentdate']; ?>. 
                            <br/> Attending: <?php echo $row['attending']; ?> 
                            <br/> Department: <?php echo $row['Department']; ?> 
                        </h3>
                    </td>
                </tr>
                   <?php } while($row = $patient -> fetch_assoc()) ?>
        </tbody>
</table>
   

</body>
</html>
