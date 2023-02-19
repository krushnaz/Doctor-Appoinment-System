<?php
session_start();
include_once '../database/dbconnect.php';
if (isset($_GET['appid'])) {
$appid=$_GET['appid'];
}
$res=mysqli_query($con, "SELECT a.*, b.*,c.* FROM patient a
JOIN appointment b
On a.icPatient = b.patientIc
JOIN doctorschedule c
On b.scheduleId=c.scheduleId
WHERE b.appId  =".$appid);

$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>This your invoice</title>
        
        <link rel="stylesheet" type="text/css" href="../patient/invoice.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
        <div class="invoice-box">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                    <!-- <img src="assets/img/logo.png" style="width:100%; max-width:300px;"> -->
                                    <div class="sidebar">
    <div class="logo-details">
      <i class='fa fa-medkit'></i>
      <span class="logo_name">City Hospital</span>
    </div>
                                </td>
                                
                                <td>
                                    Invoice #: <?php echo $userRow['appId'];?><br>
                                    Created: <?php echo date("d-m-Y");?><br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                
                <tr class="information">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>
                                    </td>
                                    <td>
                                        Patient name : <?php echo $userRow['patientFirstName'];?> <?php echo $userRow['patientLastName'];?><br>
                                        Patient ic : <?php echo $userRow['patientIc'];?><br>
                                        Email :    <?php echo $userRow['patientEmail'];?><br>
                                        Address : <?php echo $userRow['patientAddress'];?><br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                
                
                
                <tr class="heading">
                    <td>
                        Appointment Details
                    </td>
                    
                    <td>
                        #
                    </td>
                </tr>
                
                <tr class="item">
                    <td>
                        Appointment ID
                    </td>
                    
                    <td>
                       <?php echo $userRow['appId'];?>
                    </td>
                </tr>
                
                <tr class="item">
                    <td>
                        Schedule ID
                    </td>
                    
                    <td>
                        <?php echo $userRow['scheduleId'];?>
                    </td>
                </tr>

                <tr class="item">
                    <td>
                        Appointment Day
                    </td>
                    
                    <td>
                        <?php echo $userRow['scheduleDay'];?>
                    </td>
                </tr>
                

                 <tr class="item">
                    <td>
                        Appointment Date
                    </td>
                    
                    <td>
                        <?php echo $userRow['scheduleDate'];?>
                    </td>
                </tr>

                 <tr class="item">
                    <td>
                        Appointment Time
                    </td>
                    
                    <td>
                        <?php echo $userRow['startTime'];?> untill <?php echo $userRow['endTime'];?>
                    </td>
                </tr>

                 <tr class="item">
                    <td>
                        Patient Symptom
                    </td>
                    
                    <td>
                        <?php echo $userRow['appSymptom'];?> 
                    </td>
                </tr>
                
                
                
            </table>
        </div>
        <div class="print">
        <button onclick="myFunction()">Print this page</button>
</div>
<script>
function myFunction() {
    window.print();
}
</script>
    </body>
</html>