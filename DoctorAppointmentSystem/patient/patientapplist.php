
<?php
session_start();
include_once '../database/dbconnect.php';
$session=$_SESSION[ 'patientSession'];
$res=mysqli_query($con, "SELECT a.*, b.*,c.* FROM patient a
	JOIN appointment b
		On a.icPatient = b.patientIc
	JOIN doctorschedule c
		On b.scheduleId=c.scheduleId
	WHERE b.patientIc ='$session'");
	if (!$res) {
		die( "Error running $sql: " . mysqli_error($conn));
	}
	$userRow=mysqli_fetch_array($res);
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
          <a href="../patient/dashboard.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name"> Dashboard</span>
          </a>
        </li>
        
       
        <li>
		<a href="../patient/patientapplist.php?patientId=<?php echo $userRow['icPatient']; ?>"><i class="glyphicon glyphicon-file"></i>
          
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
        <a href="../feedback.php">
            <i class='bx bx-happy' ></i>
            <span class="links_name">Feedback</span>
          </a>
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
                                      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                        
                                      <span class="caret"></span></button>
                                      <ul class="dropdown-menu">
                                      <li><a href="../patient/update_patient_profile.php">Profile</a></li>

                                        <a href="../patient/patientapplist.php?patientId=<?php echo $userRow['icPatient']; ?>"><i class="glyphicon glyphicon-file"></i>
          
          <!-- <i class='bx bx-pie-chart-alt-2' ></i> -->
          <span class="links_name">Your Appointment</span>
        </a>
                                        <li><a href="../patient/patientlogout.php?logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a></a></li>
                                      </ul>
                                    </div>
      </div>
    </nav>

     <div class="home-content">
      <div class="overview-boxes">
       
      
<?php


echo "<div class='container'>";
echo "<div class='row'>";
echo "<div class='page-header'>";
echo "<h1>Your appointment list. </h1>";
echo "</div>";
echo "<div class='panel panel-primary'>";
echo "<div class='panel-heading'>List of Appointment</div>";
echo "<div class='panel-body'>";
echo "<table class='table table-hover'>";
echo "<thead>";
echo "<tr>";
echo "<th>App Id</th>";
echo "<th>patientIc </th>";
echo "<th>patientFirstName </th>";
echo "<th>scheduleDay </th>";
echo "<th>scheduleDate </th>";
echo "<th>startTime </th>";
echo "<th>endTime </th>";
echo "<th>Print </th>";
echo "</tr>";
echo "</thead>";
$res = mysqli_query($con, "SELECT a.*, b.*,c.*
		FROM patient a
		JOIN appointment b
		On a.icPatient = b.patientIc
		JOIN doctorschedule c
		On b.scheduleId=c.scheduleId
		WHERE b.patientIc ='$session'");

if (!$res) {
die("Error running $sql: " . mysqli_error($conn));
}


while ($userRow = mysqli_fetch_array($res)) {
echo "<tbody>";
echo "<tr>";
echo "<td>" . $userRow['appId'] . "</td>";
echo "<td>" . $userRow['patientIc'] . "</td>";
echo "<td>" . $userRow['patientFirstName'] . "</td>";
echo "<td>" . $userRow['scheduleDay'] . "</td>";
echo "<td>" . $userRow['scheduleDate'] . "</td>";
echo "<td>" . $userRow['startTime'] . "</td>";
echo "<td>" . $userRow['endTime'] . "</td>";
echo "<td><a href='../patient/invoice.php?appid=".$userRow['appId']."' target='_blank'><span class='glyphicon glyphicon-print' aria-hidden='true'></span></a> </td>";
}

echo "</tr>";
echo "</tbody>";
echo "</table>";

?>
	</div>
</div>
</div>
</div>
<!-- display appoinment end -->
<script src="../assetspatient/js/jquery.js"></script>
<script src="../assetspatient/js/bootstrap.min.js"></script>
         

        
       
        </div>
    </div>
   
  </div>    
  
  </div>
  </div>
 
  

                           
                            
                            

            

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