<?php
session_start();
// include_once '../connection/server.php';

include_once '../database/dbconnect.php';
if(!isset($_SESSION['patientSession']))
{
header("Location: patient/dashboard.php");
}
$res=mysqli_query($con,"SELECT * FROM patient WHERE icPatient=".$_SESSION['patientSession']);
$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);
?>
<?php
if (isset($_POST['submit'])) {
//variables
$patientFirstName = $_POST['patientFirstName'];
$patientLastName = $_POST['patientLastName'];
$patientMaritialStatus = $_POST['patientMaritialStatus'];
$patientDOB = $_POST['patientDOB'];
$patientGender = $_POST['patientGender'];
$patientAddress = $_POST['patientAddress'];
$patientPhone = $_POST['patientPhone'];
$patientEmail = $_POST['patientEmail'];
$patientId = $_POST['patientId'];
// mysqli_query("UPDATE blogEntry SET content = $udcontent, title = $udtitle WHERE id = $id");
$res=mysqli_query($con,"UPDATE patient SET patientFirstName='$patientFirstName', patientLastName='$patientLastName', patientMaritialStatus='$patientMaritialStatus', patientDOB='$patientDOB', patientGender='$patientGender', patientAddress='$patientAddress', patientPhone=$patientPhone, patientEmail='$patientEmail' WHERE icPatient=".$_SESSION['patientSession']);
// $userRow=mysqli_fetch_array($res);
header( 'Location: ../patient/update_patient_profile.php' ) ;
}
?>
<?php
$male="";
$female="";
if ($userRow['patientGender']=='male') {
$male = "checked";
}elseif ($userRow['patientGender']=='female') {
$female = "checked";
}
$single="";
$married="";
$separated="";
$divorced="";
$widowed="";
if ($userRow['patientMaritialStatus']=='single') {
$single = "checked";
}elseif ($userRow['patientMaritialStatus']=='married') {
$married = "checked";
}elseif ($userRow['patientMaritialStatus']=='separated') {
$separated = "checked";
}elseif ($userRow['patientMaritialStatus']=='divorced') {
$divorced = "checked";
}elseif ($userRow['patientMaritialStatus']=='widowed') {
$widowed = "checked";
}
?>

<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="../patient/dashboard_css.css">
    <!-- <link rel="stylesheet" href="../patient/update_patient_profile_css.css"> -->


    <!-- <link rel="stylesheet" href="home_css.css"> -->
    <!-- <link rel="stylesheet" href="assetspetient\css\bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-----------------profile----------------------------------->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='fa fa-medkit'></i>
      <span class="logo_name">City Hospital</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="../patient/dashboard.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name"> Dashboard</span>
          </a>
        </li>
        
       
        <li>
          <a href="../patient/patientapplist.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Your Appointment</span>
          </a>
        </li>
        <li>
          
          <a href="../contact.php">
            <i class='bx bx-message' ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <li>
          
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Patient Dashboard</span>
      </div>
      
     
                                          <div class="dropdown">
                                      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $userRow['patientFirstName']; ?> 
                                      <span class="caret"></span></button>
                                      <ul class="dropdown-menu">
                                        <li><a href="profile.php">Profile</a></li>
                                        <li><a href="../patient/patientapplist.php">your Appointment</a></li>
                                        <li><a href="../patient/patientlogout.php?logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a></a></li>
                                      </ul>
                                    </div>
      </div>
    </nav>

     <div class="home-content">
      <div class="overview-boxes">
      
            </nav>
            <div id="page-wrapper">
                <div class="container-fluid">
                    
                    <!-- /.row -->
                    <!-- template start -->
                    <div class="container">
                        <div class="row">
                            
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
                                
                                
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h2 class="panel-title"><?php echo $userRow['patientFirstName']; ?> <?php echo $userRow['patientLastName']; ?></h2>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            
                                            
                                            <div class=" col-md-9 col-lg-9 ">
                                                <form action="<?php $_PHP_SELF ?>" method="post" name="form1" id="form1">
                                                    <table class="table table-user-information">
                                                        <tbody>
                                                            <tr>
                                                                <td>PatientId:</td>
                                                                <td><?php echo $userRow['icPatient']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>PatientFirstName:</td>
                                                                <td><input type="text" class="form-control" name="patientFirstName" value="<?php echo $userRow['patientFirstName']; ?>"  /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>PatientLastName</td>
                                                                <td><input type="text" class="form-control" name="patientLastName" value="<?php echo $userRow['patientLastName']; ?>"  /></td>
                                                            </tr>
                                                            
                                                            <!-- radio button -->
                                                            <tr>
                                                                <td>PatientMaritialStatus:</td>
                                                                <td>
                                                                    <div class="radio">
                                                                        <label><input type="radio" name="patientMaritialStatus" value="single" <?php echo $single; ?>>Single</label>
                                                                    </div>
                                                                    <div class="radio">
                                                                        <label><input type="radio" name="patientMaritialStatus" value="married" <?php echo $married; ?>>Married</label>
                                                                    </div>
                                                                    <div class="radio">
                                                                        <label><input type="radio" name="patientMaritialStatus" value="separated" <?php echo $separated; ?>>Separated</label>
                                                                    </div>
                                                                    <div class="radio">
                                                                        <label><input type="radio" name="patientMaritialStatus" value="divorced" <?php echo $divorced; ?>>Divorced</label>
                                                                    </div>
                                                                    <div class="radio">
                                                                        <label><input type="radio" name="patientMaritialStatus" value="widowed" <?php echo $widowed; ?>>Widowed</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <!-- radio button end -->
                                                            <tr>
                                                                <td>PatientDOB</td>
                                                                <!-- <td><input type="text" class="form-control" name="patientDOB" value="<?php echo $userRow['patientDOB']; ?>"  /></td> -->
                                                                <td>
                                                                    <div class="form-group ">
                                                                        
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon">
                                                                                <i class="fa fa-calendar">
                                                                                </i>
                                                                            </div>
                                                                            <input class="form-control" id="patientDOB" name="patientDOB" placeholder="MM/DD/YYYY" type="text" value="<?php echo $userRow['patientDOB']; ?>"/>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <script type="text/javascript">
                                                                $(function () {
                                                                $('#datetimepicker1').datetimepicker();
                                                                });
                                                                </script>
                                                            </tr>
                                                            <!-- radio button -->
                                                            <tr>
                                                                <td>Gender:</td>
                                                                <td>
                                                                    <div class="radio">
                                                                        <label><input type="radio" name="patientGender" value="male" <?php echo $male; ?>>Male</label>
                                                                    </div>
                                                                    <div class="radio">
                                                                        <label><input type="radio" name="patientGender" value="female" <?php echo $female; ?>>Female</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <!-- radio button end -->
                                                            <tr>
                                                                <td>PatientAddress</td>
                                                                <td><input type="text" class="form-control" name="patientAddress" value="<?php echo $userRow['patientAddress']; ?>"  /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>PatientPhone</td>
                                                                <td><input type="text" class="form-control" name="patientPhone" value="<?php echo $userRow['patientPhone']; ?>"  /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>PatientEmail</td>
                                                                <td><input type="text" class="form-control" name="patientEmail" value="<?php echo $userRow['patientEmail']; ?>"  /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="submit" name="submit" class="btn btn-info" value="Update Info"></td>
                                                                </tr>
                                                            </tbody>
                                                            
                                                        </table>
                                                        
                                                        
                                                        
                                                    </form>
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="panel-footer">
                                            <a href="#" data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                                            <span class="pull-right">
                                                <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                                                
                                                <a href="#" data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                 
                   

                                            </span>
                                        </div> -->
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- template end -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /#page-wrapper -->
            </div>
            <!-- /#wrapper -->
            <!-- jQuery -->
            <script src="assets/js/jquery.js"></script>
            <script src="assets/js/date/bootstrap-datepicker.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
            <!-- Bootstrap Core JavaScript -->
            <script src="assets/js/bootstrap.min.js"></script>
            <script>
            $(document).ready(function(){
            var date_input=$('input[name="patientDOB"]'); //our date input has the name "date"
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
            format: 'yyyy/mm/dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
            })
            })
            </script>
  
  </div>
  </div>
 
  <script>

       
                        // </script>

            
<!---------------------------------------end-------------------------------------->
  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>
