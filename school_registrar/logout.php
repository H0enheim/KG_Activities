<?php

    
// if(!isset($_SESSION)) {   
//     session_start(); }

//     include_once('connections/connections.php'); 
//     connection();

//     $con = connection ();

//     unset($_SESSION['userlogin']);
//     unset($_SESSION['access']);
//     echo header("Location: index.php");

    session_start(); 
    unset($_SESSION['userlogin']);
    unset($_SESSION['access']);
    echo header("Location:index.php");


