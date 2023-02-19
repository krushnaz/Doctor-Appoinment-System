<?php
session_start();

if(!isset($_SESSION['patientSession']))
{
 header("Location: ../patient/dashboard.php");
}
else if(isset($_SESSION['patientSession'])!="")
{
 header("Location:../home.php");
}

if(isset($_GET['logout']))
{
 session_destroy();
 unset($_SESSION['patientSession']);
 header("Location:../home.php");
}
?>