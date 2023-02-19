
<?php
session_start();
include_once '../database/dbconnect.php';
// include_once 'connection/server.php';
if (!isset($_SESSION['doctorSession'])) {
    header("Location: ../home.php");
}
$usersession = $_SESSION['doctorSession'];
$res = mysqli_query($con, "SELECT * FROM doctor WHERE doctorId=" . $usersession);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">

    <link href="../assets/css/material.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../assets/css/sb-admin.css" rel="stylesheet">
    <link href="../doctor/doctordashboard_css.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    


    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <!-- <link rel="stylesheet" href="dashboard_css.css"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-----------------profile----------------------------------->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  
  <script src = "../assetspetient/js/jquery.js"></script>
  <link rel="stylesheet" href="../assetspetient/js/bootstrap.min.js">
  <link rel="stylesheet" href="../assetspetient/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
        .img-kr{
            display: block;
    max-width: 45%;
    height:auto;
        }
     </style>
   </head>

<body>




<div class="sidebar">
    <div class="logo-details">
      <i class='fa fa-medkit'></i>
      <span class="logo_name">City Hospital</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="../doctor/doctordashboard.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name"> Dashboard</span>
          </a>
        </li>
        <li>
          <a href="../doctor/addschedule.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">doctor Shedule</span>
          </a>
        </li>
       
        <li>
          <a href="../doctor/patientlist.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Patient List</span>
          </a>
        </li>
        <!-- <li>
          
          <a href="../contact.php">
            <i class='bx bx-message' ></i>
            <span class="links_name">Messages</span>
          </a>
        </li> -->
        <li>
          
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Doctor Dashboard</span>
      </div>
      
     
                                          
      <div class="dropdown">
                                      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $userRow['doctorLastName']; ?>  
                                      <span class="caret"></span></button>
                                      <ul class="dropdown-menu">
                                        <li><a href="../doctor/profile.php">Profile</a></li>
                                        <!-- <li><a href="check_your_appoint.php">your Appointment</a></li> -->
                                        <li><a href="../doctor/logout.php">logout</a></li>
                                      </ul>
                                    </div>
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">

      <div id="page-wrapper">
            <div class="container-fluid">

               

                <!-- panel start -->
                <div class="col-md-9 col-sm-9  user-wrapper">
                            <div class="description">
                                <!-- <h3>Doctor <?php echo $userRow['doctorFirstName']; ?> <?php echo $userRow['doctorLastName']; ?> </h3>
                                <hr /> -->
                                
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        
                                        
                                        <table class="table table-user-information" align="center">
                                        <div class="panel-body">
                        <!-- panel content start -->
                          <div class="container">
            <section style="padding-bottom: 50px; padding-top: 50px;">
                <div class="row">
                    <!-- start -->
                    <!-- USER PROFILE ROW STARTS-->
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            
                            <div class="user-wrapper">
                                <img src="../doctor/Stethoscope Smiling Handsome Male Doctor PNG.png" class="img-kr" />

                                <div class="description">
                                    <h4><?php echo $userRow['doctorFirstName']; ?> <?php echo $userRow['doctorLastName']; ?></h4>
                                    <h5> <strong> Doctor </strong></h5>
                                    
                                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Update Profile</button> -->
                                    <!-- <hr /> -->
                                </div>
                            </div>
                        </div>
                        
                        <tbody>
                            
                            
                                                <tr>
                                                    <td>Doctor ID</td>
                                                    <td><?php echo $userRow['doctorId']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>IC Number</td>
                                                    <td><?php echo $userRow['icDoctor']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Address</td>
                                                    <td><?php echo $userRow['doctorAddress']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Contact Number</td>
                                                    <td><?php echo $userRow['doctorPhone']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td><?php echo $userRow['doctorEmail']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Birthdate</td>
                                                    <td><?php echo $userRow['doctorDOB']; ?>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Update Profile</button>

                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                    <!-- USER PROFILE ROW END-->
                    <div class="col-md-4">
                        
                        <!-- Large modal -->
                        
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                    </div>
                                    <div class="modal-body">
                                        <!-- form start -->
                                        <form action="<?php $_PHP_SELF ?>" method="post" >
                                            <table class="table table-user-information">
                                                <tbody>
                                                    <tr>
                                                        <td>IC Number:</td>
                                                        <td><?php echo $userRow['icDoctor']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>First Name:</td>
                                                        <td><input type="text" class="form-control" name="doctorFirstName" value="<?php echo $userRow['doctorFirstName']; ?>"  /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Last Name</td>
                                                        <td><input type="text" class="form-control" name="doctorLastName" value="<?php echo $userRow['doctorLastName']; ?>"  /></td>
                                                    </tr>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <tr>
                                                        <td>Phone number</td>
                                                        <td><input type="text" class="form-control" name="doctorPhone" value="<?php echo $userRow['doctorPhone']; ?>"  /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td><input type="text" class="form-control" name="doctorEmail" value="<?php echo $userRow['doctorEmail']; ?>"  /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address</td>
                                                        <td><textarea class="form-control" name="doctorAddress"  ><?php echo $userRow['doctorAddress']; ?></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="submit" name="submit" class="btn btn-info" value="Update Info"></td>
                                                        </tr>
                                                    </tbody>
                                                    
                                                </table>
                                                
                                                
                                                
                                            </form>
                                            <!-- form end -->
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <br /><br/>
                        </div>
                        
                    </div>
                        <!-- panel content end -->
                        <!-- panel end -->
                        </div>
                    </div>
                    <!-- panel start -->

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