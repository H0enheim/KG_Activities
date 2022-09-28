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


$sql = "SELECT * FROM students_list WHERE ID ='$id' ";

$students = $con -> query($sql) or die($con -> error);

$row = $students -> fetch_assoc();
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
    <form action ="delete.php">
<a href="index.php"><-Back</a><br/>

<a class="linkk" href="insert.php"> Insert New </a> <br/> 

<a class="linkk" href="edit.php?ID=<?php echo $row['ID'];?>"> Edit </a> <br/>

<button type="submit" name="delete">Delete</button>
<input type="hidden" name ="ID" value="<?php echo$row['ID'];?>">
</form>


      <h1>Student Information</h1>

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
        <th>Student Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Birthday</th>
        <th>Enrolled Date</th>
        </tr>
    </thead>
    <tbody>
        <?php do{ ?> 
        <tr>
            
            <td><?php echo $row['ID'];?></td>
            <td><?php echo $row['firstname'];?></td>
            <td><?php echo $row['lastname'];?></td>
            <td><?php echo $row['gender'];?></td>
            <td><?php echo $row['birthday'];?></td>
            <td><?php echo $row['enrolled_date'];?></td>
        </tr>   
        <tr>
                    <td colspan="6">
                        <h3 style="text-align:center;padding: 5px;">
                            Student #<?php echo $row['ID']; ?>, 
                            <?php echo $row['firstname']; ?> 
                            <?php echo $row['lastname']; ?> 
                            is a <?php echo $row['gender']; ?>. 
                            <br/> Birthday: <?php echo $row['birthday']; ?> 
                            <br/> Enrolled Date: <?php echo $row['enrolled_date']; ?> 
                        </h3>
                    </td>
                </tr>
                   <?php } while($row = $students -> fetch_assoc()) ?>
        </tbody>
</table>
   

</body>
</html>
