<?php
//include auth_session.php file on all user panel pages
// include("auth_session.php");
?> 

<?php
session_start();
include_once '../database/dbconnect.php';
if(!isset($_SESSION['patientSession']))
{
header("Location: home.php");
}

$usersession = $_SESSION['patientSession'];


$res=mysqli_query($con,"SELECT * FROM patient WHERE icPatient=".$usersession);

if ($res===false) {
	echo mysqli_error($conn);
} 

$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);
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
                                        <li><a href="../patient/update_patient_profile.php">Profile</a></li>
                                        <!-- <a href="patientapplist.php?patientId=<?php echo $userRow['icPatient']; ?>"><i class="glyphicon glyphicon-file"></i>
          
          
          <span class="links_name">Your Appointment</span>
        </a> -->
                                         <a href="../patient/patientapplist.php"> <i class='bx bx-pie-chart-alt-2' ></i>Your Appoint</a>
                                        <li><a href="../patient/patientlogout.php?logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a></a></li>
                                      </ul>
                                    </div>
      </div>
    </nav>

     <div class="home-content">
      <div class="overview-boxes">
        <a class="box">
      
          
          <div class="right-side">
            <!-- Please <span class="khup-danger">login</span> to make an <br>appointment.</p>  -->

          <p> This is a Doctor Schedule, check schedule and Make Appointment</p>
          <label for="dateyourofbirth">Check Doctor Schedule</label>
          <input type="date" class="controlyourform" id="date" name="date" value="<?php echo date("Y-m-d")?>" onchange="showUser(this.value)">

          <b><div id="txtHint"> </b></div>

          </div>
          <i class='fa fa-user-md'></i>
        
      </a> 

        </div>
    </div>
   
  </div>    
  
  </div>
  </div>
 
  <script>

                            function showUser(str) {
                                
                                if (str == "") {
                                    document.getElementById("txtHint").innerHTML = "";
                                    return;
                                } else { 
                                    if (window.XMLHttpRequest) {
                                        // code for IE7+, Firefox, Chrome, Opera, Safari
                                        xmlhttp = new XMLHttpRequest();
                                    } else {
                                        // code for IE6, IE5
                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                    }
                                    xmlhttp.onreadystatechange = function() {
                                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                            document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                                        }
                                    };
                                    xmlhttp.open("GET","../doctor/getuser.php?q="+str,true);
                                    console.log(str);
                                    xmlhttp.send();
                                }
                            }
                        </script>

            
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

