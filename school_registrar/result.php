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



$sql = "SELECT * FROM students_list WHERE `firstname` LIKE '%$search%' || `lastname` LIKE '%$search%'  ORDER BY ID DESC";

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
    <title>Hospital Database</title>

</head>
<body>
<form action ="result.php" method ="get">
<input type ="text" name ="search" id="search">

<button type="submit">Search</button>
</form>
<a href = "insert.php"> Insert data</a>

    <?php if(isset($_SESSION['userlogin'])) { ?> 
         <a href="logout.php"> Log out </a>  
    <?php } else { ?>
           <a href="login.php"> Log In </a> 
    <?php }?>
    
    <a href = "insert.php"> Insert data</a>
<h1>Student's Infromation</h1>

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
    </form>
</body>
</html>
