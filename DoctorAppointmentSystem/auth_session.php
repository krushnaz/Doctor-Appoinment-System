<?php
    session_start();
    if(!isset($_SESSION["patientSession"])) {
        header("Location: patient/login.php");
        exit();
    }
?>