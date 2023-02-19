<?php
session_start();
include_once '../database/dbconnect.php';
// include_once 'connection/server.php';
if(!isset($_SESSION['doctorSession']))
{
header("Location: ../home.php");
}
$usersession = $_SESSION['doctorSession'];
$res=mysqli_query($con,"SELECT * FROM doctor WHERE doctorId=".$usersession);
$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);
// insert


if (isset($_POST['submit'])) {
$date = mysqli_real_escape_string($con,$_POST['date']);
$scheduleday  = mysqli_real_escape_string($con,$_POST['scheduleday']);
$starttime     = mysqli_real_escape_string($con,$_POST['starttime']);
$endtime     = mysqli_real_escape_string($con,$_POST['endtime']);
$bookavail         = mysqli_real_escape_string($con,$_POST['bookavail']);

//INSERT
$query = " INSERT INTO doctorschedule (  scheduleDate, scheduleDay, startTime, endTime,  bookAvail)
VALUES ( '$date', '$scheduleday', '$starttime', '$endtime', '$bookavail' ) ";

$result = mysqli_query($con, $query);
// echo $result;
if( $result )
{
?>
<script type="text/javascript">
alert('Schedule added successfully.');
</script>
<?php
}
else
{
?>
<script type="text/javascript">
alert('Added fail. Please try again.');
</script>
<?php
}

}
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
    <link rel="stylesheet" href="../assetspetient/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../assetspetient/js/bootstrap.min.js">
<link rel="stylesheet" href="assets/font-awesome/css/font-awesome_4.7.0.css">

<link rel="stylesheet" href="../assetspetient/js/jquery.min.js">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <!-- <link rel="stylesheet" href="dashboard_css.css"> -->

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-----------------profile----------------------------------->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->


    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- <style>
      .form-control select{
        color :black;
        background-color: black;
      }
      </style> -->
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
                                        <li><a href="profile.php">Profile</a></li>
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
                <div class="panel panel-primary">

<!-- panel heading starat -->
<div class="panel-heading">
    <h3 class="panel-title">Add Schedule</h3>
</div>
<!-- panel heading end -->

<div class="panel-body">
<!-- panel content start -->
    <div class="bootstrap-iso">
     <div class="container-fluid">
      <div class="row">
       <div class="col-md-12 col-sm-12 col-xs-12">
        <form class="form-horizontal" method="post">
         <div class="form-group form-group-lg">
          <label class="control-label col-sm-2 requiredField" for="date">
           Date
           <span class="asteriskField">
            *
           </span>
          </label>
          <div class="col-sm-10">
           <div class="input-group">
            <div class="input-group-addon">
             
            </div>
            <input type="date" class="form-control" id="date" name="date" type="text" value="<?php echo date("d-m-Y")?>"; required/>
            <!-- <i class="fa fa-calendar"></i> -->
           </div>
          </div>
         </div>
         <div class="form-group form-group-lg">
          <label class="control-label col-sm-2 requiredField" for="scheduleday">
           Day
           <span class="asteriskField">
            *
           </span>
          </label>
          <div class="col-sm-10">
           <select class="select form-control" id="scheduleday" name="scheduleday" required>
            <option value="Monday">
             Monday
            </option>
            <option value="Tuesday">
             Tuesday
            </option>
            <option value="Wednesday">
             Wednesday
            </option>
            <option value="Thursday">
             Thursday
            </option>
            <option value="Friday">
             Friday
            </option>
            <option value="Saturday">
             Saturday
            </option>
            <option value="Sunday">
             Sunday
            </option>
           </select>
          </div>
         </div>
         <div class="form-group form-group-lg">
          <label class="control-label col-sm-2 requiredField" for="starttime">
           Start Time
           <span class="asteriskField">
            *
           </span>
          </label>

          <div class="col-sm-10">
           <div  data-align="top" data-autoclose="true">
            <div class="input-group-addon">
             <i class="fa fa-clock-o">
             </i>
            </div>
            <input class="form-control" id="starttime" name="starttime" type="time" required/>
           </div>
          </div>
         </div>
         <div class="form-group form-group-lg">
          <label class="control-label col-sm-2 requiredField" for="endtime">
           End Time
           <span class="asteriskField">
            *
           </span>
          </label>
          <div class="col-sm-10">
           <div  data-align="top" data-autoclose="true">
            <div class="input-group-addon">
             <!-- <i class="fa fa-clock-o"> -->
             <!-- </i> -->
            </div>
            <input class="form-control" id="endtime" name="endtime" type="time" required/>
           </div>
          </div>
         </div>
         <div class="form-group form-group-lg">
          <label class="control-label col-sm-2 requiredField" for="bookavail">
           Availabilty
           <span class="asteriskField">
            *
           </span>
          </label>
          <div class="col-sm-10">
           <select class="select form-control" id="bookavail" name="bookavail" required>
            <option value="available">
             available
            </option>
            <option value="notavail">
             notavail
            </option>
           </select>
          </div>
         </div>
         <div class="form-group">
          <div class="col-sm-10 col-sm-offset-2">
           <button class="btn btn-primary " name="submit" type="submit">
            Submit
           </button>
          </div>
         </div>
        </form>
       </div>
      </div>
     </div>
    </div>                        
<!-- panel content end -->
<!-- panel end -->
</div>
</div>
<!-- panel start -->

<!-- panel start -->
<div class="panel panel-primary filterable">

<!-- panel heading starat -->
<div class="panel-heading">
    <h3 class="panel-title">List of Patients</h3>
    <div class="pull-right">
    <button class="btn btn-default btn-xs btn-filter"><span class="fa fa-filter"></span> Filter</button>
</div>
</div>
<!-- panel heading end -->

<div class="panel-body">
<!-- panel content start -->
   <!-- Table -->
<table class="table table-hover table-bordered">
    <thead>
        <tr class="filters">
            <th><input type="text" class="form-control" placeholder="scheduleId" disabled></th>
            <th><input type="text" class="form-control" placeholder="scheduleDate" disabled></th>
            <th><input type="text" class="form-control" placeholder="scheduleDay" disabled></th>
            <th><input type="text" class="form-control" placeholder="startTime." disabled></th>
            <th><input type="text" class="form-control" placeholder="endTime" disabled></th>
            <th><input type="text" class="form-control" placeholder="bookAvail" disabled></th>
        </tr>
    </thead>
    
    <?php 
    $result=mysqli_query($con,"SELECT * FROM doctorschedule");
    

          
    while ($doctorschedule=mysqli_fetch_array($result)) {
        
      
        echo "<tbody>";
        echo "<tr>";
            echo "<td>" . $doctorschedule['scheduleId'] . "</td>";
            echo "<td>" . $doctorschedule['scheduleDate'] . "</td>";
            echo "<td>" . $doctorschedule['scheduleDay'] . "</td>";
            echo "<td>" . $doctorschedule['startTime'] . "</td>";
            echo "<td>" . $doctorschedule['endTime'] . "</td>";
            echo "<td>" . $doctorschedule['bookAvail'] . "</td>";
            echo "<form method='POST'>";
            echo "<td class='text-center'><a href='../doctor/addschedule.php' id='".$doctorschedule['scheduleId']."' class='delete'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a>
    </td>";
       
    } 
        echo "</tr>";
   echo "</tbody>";
echo "</table>";
echo "<div class='panel panel-default'>";
echo "<div class='col-md-offset-3 pull-right'>";
// echo "<button class='btn btn-primary' type='submit' value='Submit' name='submit'>Update</button>";
echo "</div>";
echo "</div>";
?>
<!-- panel content end -->
<!-- panel end -->
</div>
</div>
<!-- panel start -->
</div>
</div>
<!-- /#wrapper -->



<!-- jQuery -->
<script src="assetspetient/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="assetspetient/js/bootstrap.min.js"></script>
<script src="../assets/js/bootstrap-clockpicker.js"></script>
<!-- Latest compiled and minified JavaScript -->
<!-- script for jquery datatable start-->
<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
$(document).ready(function(){
var date_input=$('input[name="date"]'); //our date input has the name "date"
var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
date_input.datepicker({
format: 'yyyy/mm/dd',
container: container,
todayHighlight: true,
autoclose: true,
})
})
</script>
<script type="text/javascript">
$('.clockpicker').clockpicker();
</script>
<script type="text/javascript">
$(function() {
$(".delete").click(function(){
var element = $(this);
var id = element.attr("id");
var info = 'id=' + id;
if(confirm("Are you sure you want to delete this?"))
{
$.ajax({
type: "POST",
url: "../doctor/deleteschedule.php",
data: info,
success: function(){
}
});
$(this).parent().parent().fadeOut(300, function(){ $(this).remove();});
}
return false;
});
});
</script>
<script type="text/javascript">
/*
Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
*/
$(document).ready(function(){
$('.filterable .btn-filter').click(function(){
var $panel = $(this).parents('.filterable'),
$filters = $panel.find('.filters input'),
$tbody = $panel.find('.table tbody');
if ($filters.prop('disabled') == true) {
$filters.prop('disabled', false);
$filters.first().focus();
} else {
$filters.val('').prop('disabled', true);
$tbody.find('.no-result').remove();
$tbody.find('tr').show();
}
});

$('.filterable .filters input').keyup(function(e){
/* Ignore tab key */
var code = e.keyCode || e.which;
if (code == '9') return;
/* Useful DOM data and selectors */
var $input = $(this),
inputContent = $input.val().toLowerCase(),
$panel = $input.parents('.filterable'),
column = $panel.find('.filters th').index($input.parents('th')),
$table = $panel.find('.table'),
$rows = $table.find('tbody tr');
/* Dirtiest filter function ever ;) */
var $filteredRows = $rows.filter(function(){
var value = $(this).find('td').eq(column).text().toLowerCase();
return value.indexOf(inputContent) === -1;
});
/* Clean previous no-result if exist */
$table.find('tbody .no-result').remove();
/* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
$rows.show();
$filteredRows.hide();
/* Prepend no-result row if all rows are filtered */
if ($filteredRows.length === $rows.length) {
$table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
}
});
});
</script>







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