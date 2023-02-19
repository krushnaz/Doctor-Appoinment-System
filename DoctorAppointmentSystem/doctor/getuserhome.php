<?php

include_once '../database/dbconnect.php';
$q = $_GET['q'];
// echo $q;
$res = mysqli_query($con,"SELECT * FROM doctorschedule WHERE scheduleDate='$q'");

$sql = $q;

if (!$res) {
die("Error running $sql: " . mysqli_error($con));
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
          .table-hover{
            padding-left: -5px;
             color: #352472 ;
        }  
         td{
            color: #fff;
    background-color: #337ab7;
    border-color: #2e6da4;
    padding: 1px 5px;
    font-size: 18px;
    line-height: 1.1;
    border-radius: 3px;
    text-align: -webkit-center;
         }
      
 
        </style>
        <link href="../assets/css/bootstrap.css" rel="stylesheet">

</head>
<body>
     <?php 
         $link_address = '../patient/get_appointment.php';
        if (mysqli_num_rows($res)==0) {

            echo "<div class='alert alert-danger' role='alert'>Doctor is not available.</div>";
                
            } else {
             echo "   <table class='table table-hover'>";
        echo " <thead>";
            echo " <tr>";
                // echo " <th>Day</th>";
                echo " <th>Date</th>";
            //    echo "  <th>Start</th>";
            //    echo "  <th>End</th>";
                echo " <th>Availability</th>";
            // echo "<a href='$link_address'>Doctor is Available Get Appointment</a>";
            // echo "<th>Doctor is Available</th>"; 
            echo " </tr>";
       echo "  </thead>";
       echo "  <tbody>";

         while($row = mysqli_fetch_array($res)) { 

            ?>

            <tr>
                <?php

                // $avail=null;
                if ($row['bookAvail']!='available') {
                $avail="danger";
                } else {
                $avail="primary";
                
            }
                // echo "<td>" . $row['scheduleDay'] . "</td>";
                echo "<td>" . $row['scheduleDate'] . "</td>";
                // echo "<td>" . $row['startTime'] . "</td>";
                // echo "<td>" . $row['endTime'] . "</td>";
                echo "<td> <span class='label label-".$avail."'>". $row['bookAvail'] ."</span></td>";
                ?>
            </tr>
        <?php
    }
}
    ?>
        </tbody>
    </body>
</html>