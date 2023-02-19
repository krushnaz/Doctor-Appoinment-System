
<?php
include_once '../database/dbconnect.php';
// include_once 'assets/conn/server.php';
?>
<!-- login -->
<!-- check session -->
<?php
session_start();
// session_destroy();
if (isset($_SESSION['patientSession']) ) {
header("Location:../patient/dashboard.php");
}
if (isset($_POST['login']))
{
$icPatient = mysqli_real_escape_string($con,$_POST['icPatient']);
$password  = mysqli_real_escape_string($con,$_POST['password']);

$res = mysqli_query($con,"SELECT * FROM patient WHERE icPatient = '$icPatient'");
$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
if ($row['password'] == $password)
{
$_SESSION['patientSession'] = $row['icPatient'];
?>
<script type="text/javascript">
alert('Login Success');
</script>
<?php
header("Location:../patient/dashboard.php");
} else {
?>
<script>
alert('wrong input ');
</script>
<?php
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="login_css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <li class="dropdown">
        
        <ul id="login-dp" class="dropdown-menu"> 
            <li>
                <div class="row">
                    <div class="col-md-12">
                        
                        <form class="form" role="form" method="POST" accept-charset="UTF-8" >
                            <div class="form-group">
                                <h2><a href="../home.php">Home</a></h2>
                                <a  class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                                               <label class="sr-only" for="icPatient">icPatient (Identification Code)</label>
                                               <input type="text" class="form-control" name="icPatient" placeholder="IC Number" required>
                                           </div>
                                           <div class="form-group">
                                               <label class="sr-only" for="password">Password</label>
                                               <input type="password" class="form-control" name="password" placeholder="Password" required>
                                           </div>
                                           <div class="form-group">
                                               <button type="submit" name="login" id="login" class="btn btn-primary btn-block">Sign in</button>
        <p class="link"><a href="../patient/registration.php">Click to Registration</a></p>

                                           </div>
                                       </form>
                                   </div>
                               </div>
                           </li>
                       </ul>
                   </li>
               </ul>
           </div>
       </div> 
   </nav> 
</body>
</html>