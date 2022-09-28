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




include_once('connections/connection.php');
// connection ();

$con = connection ();

$sql = "SELECT * FROM students_list ORDER BY ID DESC";
$students = $con->query($sql) or die ($con->error);
$row = $students-> fetch_assoc();
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
    <div class="Nav">
<form action ="result.php" method ="get">
<input type ="text" name ="search" id="search">
          <button type="submit">Search</button>
</form>
        
        <?php if(isset($_SESSION['userlogin'])) { ?> 
            <button id= 'btn'><a href="logout.php"> Log out </a>  </button>
        <?php } else { ?>
            <button id = 'btn'> <a href="login.php"> Log In </a> </button>
        <?php } ?>
        <a href = "insert.php"> Insert data</a>
        
       
          </div>  
    <h1>Student's Information</h1>

    <!-- <a href = "insert.php"> Insert here</a> -->



    <table> 
        <thead>
            <tr>
                <th></th>
             <th>First Name</th>  
             <th>Last Name</th>  
             <th>Gender</th>
            </tr>
        </thead>
        <tbody>
       <?php do{ ?>
        <tr>

    <td><a href="details.php? ID=<?php echo $row['ID'];?>"> View </a></td>
     <td><?php echo $row['firstname']; ?></td>
     <td><?php echo $row['lastname']; ?></td>
     <td><?php echo $row['gender']; ?></td>
       </tr>
 <?php }while($row = $students->fetch_assoc()) ?>
       </tbody>
    </table>
</body>
</html>
