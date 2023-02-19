<?php
session_start();

if(!isset($_SESSION['doctorSession']))
{
 header("Location: ../doctor/doctordashboard.php");
}
else if(isset($_SESSION['doctorSession'])!="")
{
 header("Location: ../home.php");
}

if(isset($_GET['logout']))
{
 session_destroy();
 unset($_SESSION['doctorSession']);
 header("Location: ../home.php");
}
?>