
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
                <div class="panel panel-primary filterable">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        <h3 class="panel-title">Appointment List</h3>
                        <div class="pull-right">
                            <button class="btn btn-default btn-xs btn-filter"><span class="fa fa-filter"></span> Filter</button>
                        </div>
                    </div>
                    <div class="panel-body">
                        <!-- Table -->
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr class="filters">
                                    <th><input type="text" class="form-control" placeholder="patient Ic" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Name" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Contact No." disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Email" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Day" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Date" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Start" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="End" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Status" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Complete" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Delete" disabled></th>
                                </tr>
                            </thead>

                            <?php
                            $res = mysqli_query($con, "SELECT a.*, b.*,c.*
                                                    FROM patient a
                                                    JOIN appointment b
                                                    On a.icPatient = b.patientIc
                                                    JOIN doctorschedule c
                                                    On b.scheduleId=c.scheduleId
                                                    Order By appId desc");
                            if (!$res) {
                                printf("Error: %s\n", mysqli_error($con));
                                exit();
                            }
                            while ($appointment = mysqli_fetch_array($res)) {

                                if ($appointment['status'] == 'process') {
                                    $status = "danger";
                                    $icon = 'remove';
                                    $checked = '';
                                } else {
                                    $status = "success";
                                    $icon = 'ok';
                                    $checked = 'disabled';
                                }

                                echo "<tbody>";
                                echo "<tr class='$status'>";
                                echo "<td>" . $appointment['patientIc'] . "</td>";
                                echo "<td>" . $appointment['patientLastName'] . "</td>";
                                echo "<td>" . $appointment['patientPhone'] . "</td>";
                                echo "<td>" . $appointment['patientEmail'] . "</td>";
                                echo "<td>" . $appointment['scheduleDay'] . "</td>";
                                echo "<td>" . $appointment['scheduleDate'] . "</td>";
                                echo "<td>" . $appointment['startTime'] . "</td>";
                                echo "<td>" . $appointment['endTime'] . "</td>";
                                echo "<td><span class='glyphicon glyphicon-" . $icon . "' aria-hidden='true'></span>" . ' ' . "" . $appointment['status'] . "</td>";
                                echo "<form method='POST'>";
                                echo "<td class='text-center'><input type='checkbox' name='enable' id='enable' value='" . $appointment['appId'] . "' onclick='chkit(" . $appointment['appId'] . ",this.checked);' " . $checked . "></td>";
                                echo "<td class='text-center'><a href='#' id='" . $appointment['appId'] . "' class='delete'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a>
                            </td>";
                            }
                            echo "</tr>";
                            echo "</tbody>";
                            echo "</table>";
                            echo "<div class='panel panel-default'>";
                            echo "<div class='col-md-offset-3 pull-right'>";
                            echo "<button class='btn btn-primary' type='submit' value='Submit' name='submit'>Update</button>";
                            echo "</div>";
                            echo "</div>";
                            ?>
                    </div>
                </div>
                <!-- panel end -->
                <script type="text/javascript">
                    function chkit(uid, chk) {
                        chk = (chk == true ? "1" : "0");
                        var url = "../database/checkdb.php?userid=" + uid + "&chkYesNo=" + chk;
                        if (window.XMLHttpRequest) {
                            req = new XMLHttpRequest();
                        } else if (window.ActiveXObject) {
                            req = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        // Use get instead of post.
                        req.open("GET", url, true);
                        req.send(null);
                    }
                </script>



            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->



    <!-- jQuery -->
    <script src="../assetspetient/js/jquery.js"></script>
    <script type="text/javascript">
        $(function() {
            $(".delete").click(function() {
                var element = $(this);
                var appid = element.attr("id");
                var info = 'id=' + appid;
                if (confirm("Are you sure you want to delete this?")) {
                    $.ajax({
                        type: "POST",
                        url: "../doctor/deleteappointment.php",
                        data: info,
                        success: function() {}
                    });
                    $(this).parent().parent().fadeOut(300, function() {
                        $(this).remove();
                    });
                }
                return false;
            });
        });
    </script>
    <!-- Bootstrap Core JavaScript -->
    <script src="assetspetient/js/bootstrap.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <!-- script for jquery datatable start-->
    <script type="text/javascript">
        /*
            Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
            */
        $(document).ready(function() {
            $('.filterable .btn-filter').click(function() {
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

            $('.filterable .filters input').keyup(function(e) {
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
                var $filteredRows = $rows.filter(function() {
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
                    $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="' + $table.find('.filters th').length + '">No result found</td></tr>'));
                }
            });
        });
    </script>
    <!-- script for jquery datatable end-->


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