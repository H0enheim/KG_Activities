<?php 
    if(!isset($_SESSION)){
        session_start();
    }

    if(isset($_SESSION['useraccess']) && $_SESSION['useraccess'] == 'Admin-1') {  
        echo 'Welcome '.$_SESSION['userlogin']."<br/> <br/>";
    } else {
        //echo 'Welcome Guest';
        echo header("Location: index.php");
    }

    include_once('connections/connections.php'); 
    
    $con = connection();
    
    $id = $_GET['ID']; 

    $sql = "SELECT * FROM students_list  WHERE ID_num = '$id'";
    $students = $con -> query($sql) or die($con -> error);

    $row = $students -> fetch_assoc();
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
    <title>Student DB - Details</title>

</head>

<body>
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
                <th> Student ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Enrolled Date</th>
            </tr>
                
        </thead>
        <tbody>
            <?php do{ ?> 
                <tr >
                    <td > <?php echo $row['ID_num']; ?> </td>
                    <td> <?php echo $row['Firstname']; ?> </td>
                    <td> <?php echo $row['Lastname']; ?> </td>
                    <td> <?php echo $row['Enrolled_date']; ?> </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <h3 style="text-align:center;padding: 5px;">
                            Student #<?php echo $row['ID_num']; ?>, 
                            <?php echo $row['Firstname']; ?> 
                            <?php echo $row['Lastname']; ?> 
                            is a <?php echo $row['Gender']; ?>. 
                            <br/> Birthday: <?php echo $row['Birthday']; ?> 
                            <br/> Enrolled Date: <?php echo $row['Enrolled_date']; ?> 
                        </h3>
                    </td>
                </tr>
            <?php } while($row = $students -> fetch_assoc()) ?>
        </tbody>
    </table> <br/>
    <a class="linkk" href="insert.php"> Insert New </a> <br/> 

    <a class="linkk" href="edit.php?ID=<?php echo $row['ID_num'];?>"> Edit </a> 
    
    <a class="linkk" href="delete.php"> Delete </a> 
    <br/>    <br/>
    <br/> 
</body>
</html>