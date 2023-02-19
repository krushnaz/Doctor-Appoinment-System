<?php
include_once 'database/dbconnect.php';

session_start();
if (isset($_SESSION['doctorSession']) != "") {
// header("Location:doctordashboard.php");
}
if (isset($_POST['login']))
{
$doctorId = mysqli_real_escape_string($con,$_POST['doctorId']);
$password  = mysqli_real_escape_string($con,$_POST['password']);

$res = mysqli_query($con,"SELECT * FROM doctor WHERE doctorId = '$doctorId'");

$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
// echo $row['password'];
if ($row['password'] == $password)
{
$_SESSION['doctorSession'] = $row['doctorId'];
?>
<script type="text/javascript">
alert('Login Success');
</script>
<?php
header("Location:../DoctorAppointmentSystem/doctor/doctordashboard.php");
} else {
?>
<script type="text/javascript">
    alert("Wrong input");
</script>
<?php
}
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Clinic Appointment Application</title>
        <!-- Bootstrap -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/style.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <style>

.form {
    margin: 171px auto;
    width: 247px;
    padding: 5px 27px;
    background: white;
    text-align: center;
    color: black;
}
    .login{
    color: whitesmoke;
    background-color: #372be2cf;
    margin: 0px auto 25px;
    font-size: 25px;
    font-weight: 300;
    text-align: center;
   
}
input {
    font-size: 15px;
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 25px;
    height: 25px;
    width: calc(100% - 23px);
}

        </style>
    </head>
    <body>
        <div class="container">
            <!-- start -->
            <div class="login-container">
                <div id="output"></div>
                <div class="avatar"></div>
                <div class="form-box">
                    <form class="form" role="form" method="POST" accept-charset="UTF-8">
                            <h2>Admin login</h2>
                            <input name="doctorId" type="text" placeholder="Doctor ID" required>
                            <input name="password" type="password" placeholder="Password" required>
                            <button class="btn btn-info btn-block login" type="submit" name="login">Login</button>
                        </form>
                    </div>
                </div>
            <!-- end -->
        </div>

        <script src="../assets/js/jquery.js"></script>

        <!-- js start -->
        
        <!-- js end -->
    </body>
</html>