<?php
session_start();
include_once '../database/dbconnect.php';
if(!isset($_SESSION['patientSession']))
{
header("Location: ../home.php");
}
// $appid ="";
// $appdate="";
if (isset($_GET['scheduleDate']) && isset($_GET['appid'])) {
	$appdate =$_GET['scheduleDate'];
	$appid = $_GET['appid'];
}
// on b.icPatient = a.icPatient
$session=$_SESSION['patientSession'];
$res = mysqli_query($con,"SELECT a.*, b.* FROM doctorschedule a INNER JOIN patient b WHERE a.scheduleDate='$appdate' AND scheduleId=$appid AND b.icPatient=$session");
$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);

//INSERT
if (isset($_POST['appointment'])) {
$patientIc = mysqli_real_escape_string($con,$userRow['icPatient']);
$scheduleid = mysqli_real_escape_string($con,$appid);
$symptom = mysqli_real_escape_string($con,$_POST['symptom']);
$comment = mysqli_real_escape_string($con,$_POST['comment']);
$avail = "notavail";


$query = "INSERT INTO appointment (  patientIc , scheduleId , appSymptom , appComment  )
VALUES ( '$patientIc', '$scheduleid', '$symptom', '$comment') ";

//update table appointment schedule
$sql = "UPDATE doctorschedule SET bookAvail = '$avail' WHERE scheduleId = $scheduleid" ;
$scheduleres=mysqli_query($con,$sql);
if ($scheduleres) {
	$btn= "disable";
} 


$result = mysqli_query($con,$query);
// echo $result;
if( $result )
{
?>
<script type="text/javascript">
alert('Appointment made successfully.');
</script>
<?php

header("Location:../patient/patientapplist.php");
}
else
{
	echo mysqli_error($con);
?>
<script type="text/javascript">
alert('Appointment booking fail. Please try again.');
</script>
<?php
header("Location: ../patient/dashboard.php");
}
//dapat dari generator end
}
?>


<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="../patient/dashboard_css.css">
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
          <a href="../patient/dashboard_css.css" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name"> Dashboard</span>
          </a>
        </li>
        
       
        <li>
        <a href="../patient/patientapplist.php?patientId=<?php echo $userRow['icPatient']; ?>"><i class="glyphicon glyphicon-file"></i>
          
          <!-- <i class='bx bx-pie-chart-alt-2' ></i> -->
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
                                        <a href="../patient/patientapplist.php?patientId=<?php echo $userRow['icPatient']; ?>"><i class="glyphicon glyphicon-file"></i>
          
            <!-- <i class='bx bx-pie-chart-alt-2' ></i> -->
            <span class="links_name">Your Appointment</span>
          </a>
                                        <li><a href="../patient/patientlogout.php?logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a></a></li>
                                      </ul>
                                    </div>
      </div>
    </nav>

     <!-- <div class="home-content">
      <div class="overview-boxes">
        <a class="box"> -->
      <!-- navigation -->
		<div class="container">
			<section style="padding-bottom: 50px; padding-top: 50px;">
				<div class="row">
					<!-- start -->
					<!-- USER PROFILE ROW STARTS-->
					<!-- <div class="row">
						<div class="col-md-3 col-sm-3">
							
							<div class="user-wrapper">
								<img src="assets/img/1.jpg" class="img-responsive" />
								<div class="description">
									<h4><?php echo $userRow['patientFirstName']; ?> <?php echo $userRow['patientLastName']; ?></h4>
									<h5> <strong> Website Designer </strong></h5>
									<p>
										Pellentesque elementum dapibus convallis.
									</p>
									<hr />
								</div>
							</div>
						</div> -->
						
						<div class="col-md-9 col-sm-9  user-wrapper">
							<div class="description">
								
								
								<div class="panel panel-default">
									<div class="panel-body">
										
										
										<form class="form" role="form" method="POST" accept-charset="UTF-8">
											<div class="panel panel-default">
												<div class="panel-heading">Patient Information</div>
												<div class="panel-body">
													
													Patient Name: <?php echo $userRow['patientFirstName'] ?> <?php echo $userRow['patientLastName'] ?><br>
													Patient IC: <?php echo $userRow['icPatient'] ?><br>
													Contact Number: <?php echo $userRow['patientPhone'] ?><br>
													Address: <?php echo $userRow['patientAddress'] ?>
												</div>
											</div>
											<div class="panel panel-default">
												<div class="panel-heading">Appointment Information</div>
												<div class="panel-body">
													Day: <?php echo $userRow['scheduleDay'] ?><br>
													Date: <?php echo $userRow['scheduleDate'] ?><br>
													Time: <?php echo $userRow['startTime'] ?> - <?php echo $userRow['endTime'] ?><br>
												</div>
											</div>
											
											<div class="form-group">
												<label for="recipient-name" class="control-label">Symptom:</label>
												<input type="text" class="form-control" name="symptom" required>
											</div>
											<div class="form-group">
												<label for="message-text" class="control-label">Comment:</label>
												<textarea class="form-control" name="comment" required></textarea>
											</div>
											<div class="form-group">
												<input type="submit" name="appointment" id="submit" class="btn btn-primary" value="Make Appointment">
											</div>
										</form>
                        <!-- <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" > Update Profile</a></button> -->
                        <a href="update_patient_profile.php"class="btn btn-primary">Update profile</a>
									</div>
								</div>
								
							</div>
							
						</div>
					</div>
					<!-- USER PROFILE ROW END-->
					<!-- end -->
					<script src="../assets/js/jquery.js"></script>
			<script src="../assets/js/bootstrap.min.js"></script>
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

