<?php

include_once('connections/connection.php');
// connection ();

$con = connection ();
echo $id= $_POST['ID'];



if(isset($_POST['delete'])){

    $id = $_POST['ID'];
    $sql = "DELETE FROM students_list WHERE ID='$id'";
    $con->query($sql) or die ($con->error);
    echo header("Location: index.php");
}