<?php

if (!isset ($_SESSION)){
    session_start();
}

include_once("connections/connection.php");
// connection ();

$con = connection ();

if(isset($_POST['login']))
{
   

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM logindata WHERE username = '$username' AND password = '$password'";

    $user = $con->query($sql) or die ($con->error);
    $row  = $user->fetch_assoc(); 
    $total = $user->num_rows;

   if($total > 0){

    $_SESSION['userlogin'] = $row['username'];
    $_SESSION['access'] = $row['access'];

    // echo $_SESSION['userlogin'];
    echo header ("Location: index.php");
   }else{
    echo "No user found";
   }

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
            <h1>Login Page</h1>
                </br>
                <form id= "formsu" action = '' method ='POST' >

                    <label> Username </label>
                    <input type = 'text' name = 'username' id='username' />

                    <label> Password</label>
                    <input type = 'text' name = 'password' id='password' />

                    <button id = "button"type ='submit' name = 'login'>Log in</button>

                </form>
        </body>
</html>
