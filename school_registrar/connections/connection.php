<?php
function connection () {

    $host = "localhost";
$username = "root";
$password = "shabongbong357";
$database = "student_records";


$con = new mysqli($host,$username,$password,$database);

if($con->connect_error){
    
    echo $con->connect_error;
} else{
    return $con;
}
}
?>