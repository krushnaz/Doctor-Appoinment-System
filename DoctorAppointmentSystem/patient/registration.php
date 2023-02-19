<?php
require('../database/dbconnect.php');
if (isset($_POST['signup'])) {
$patientFirstName = mysqli_real_escape_string($con,$_POST['patientFirstName']);
$patientLastName  = mysqli_real_escape_string($con,$_POST['patientLastName']);
$patientEmail     = mysqli_real_escape_string($con,$_POST['patientEmail']);
$icPatient     = mysqli_real_escape_string($con,$_POST['icPatient']);
$password         = mysqli_real_escape_string($con,$_POST['password']);
$month            = mysqli_real_escape_string($con,$_POST['month']);
$day              = mysqli_real_escape_string($con,$_POST['day']);
$year             = mysqli_real_escape_string($con,$_POST['year']);
$patientDOB       = $year . "-" . $month . "-" . $day;
$patientGender = mysqli_real_escape_string($con,$_POST['patientGender']);
// $patientMaritialStatus = mysqli_real_escape_string($con,$_POST['patientMaritialStatus']);

//INSERT
$query = " INSERT INTO patient (  icPatient, password, patientFirstName, patientLastName, patientDOB, patientGender,   patientEmail )
VALUES ( '$icPatient', '$password', '$patientFirstName', '$patientLastName', '$patientDOB', '$patientGender', '$patientEmail' ) ";
$result = mysqli_query($con, $query);
// echo $result;
if( $result )
{
?>
<script type="text/javascript">
alert('Register success. Please Login to make an appointment.');
</script>
<?php
}
else
{
?>
<script type="text/javascript">
alert('User already registered. Please try again');
</script>
<?php
}

}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="../patient/registration_css.css"/>
    


</head>
<body>
<div class="home">
        <a href="../home.php">Home</a>
    </div>

<!-- modal container start -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <!-- modal content -->
              
               <!-- modal body start -->
               <div class="modal-body">
                   
                   <!-- form start -->
                   <div class="container" id="wrap">
                       <div class="row">
                           <div class="col-md-6">
                           <div class="modal-header">
                   <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                   <h3 class="modal-title">Sign Up</h3>
               </div>
                               
                               <form action="<?php $_PHP_SELF ?>" method="POST" accept-charset="utf-8" class="form" role="form">
                                   <h4>It's free and always will be.</h4>
                                   <div class="row">
                                       <div class="col-xs-6 col-md-6">
                                           <input type="text" name="patientFirstName" value="" class="form-control input-lg" placeholder="First Name" required />
                                       </div>
                                       <div class="col-xs-6 col-md-6">
                                           <input type="text" name="patientLastName" value="" class="form-control input-lg" placeholder="Last Name" required />
                                       </div>
                                   </div>
                                   
                                   <input type="text" name="patientEmail" value="" class="form-control input-lg" placeholder="Your Email"  required/>
                                   <input type="number" name="icPatient" value="" class="form-control input-lg" placeholder="Your IC Number (Identification Code)"  required/>
                                   
                                   
                                   <input type="password" name="password" value="" class="form-control input-lg" placeholder="Password"  required/>
                                   
                                   <input type="password" name="confirm_password" value="" class="form-control input-lg" placeholder="Confirm Password"  required/>
                                   <label>Birth Date</label>
                                   <div class="row">
                                       
                                       <div class="col-xs-4 col-md-4">
                                           <select name="month" class = "form-control input-lg" required>
                                               <option value="">Month</option>
                                               <option value="01">Jan</option>
                                               <option value="02">Feb</option>
                                               <option value="03">Mar</option>
                                               <option value="04">Apr</option>
                                               <option value="05">May</option>
                                               <option value="06">Jun</option>
                                               <option value="07">Jul</option>
                                               <option value="08">Aug</option>
                                               <option value="09">Sep</option>
                                               <option value="10">Oct</option>
                                               <option value="11">Nov</option>
                                               <option value="12">Dec</option>
                                           </select>
                                       </div>
                                       <div class="col-xs-4 col-md-4">
                                           <select name="day" class = "form-control input-lg" required>
                                               <option value="">Day</option>
                                               <option value="01">1</option>
                                               <option value="02">2</option>
                                               <option value="03">3</option>
                                               <option value="04">4</option>
                                               <option value="05">5</option>
                                               <option value="06">6</option>
                                               <option value="07">7</option>
                                               <option value="08">8</option>
                                               <option value="09">9</option>
                                               <option value="10">10</option>
                                               <option value="11">11</option>
                                               <option value="12">12</option>
                                               <option value="13">13</option>
                                               <option value="14">14</option>
                                               <option value="15">15</option>
                                               <option value="16">16</option>
                                               <option value="17">17</option>
                                               <option value="18">18</option>
                                               <option value="19">19</option>
                                               <option value="20">20</option>
                                               <option value="21">21</option>
                                               <option value="22">22</option>
                                               <option value="23">23</option>
                                               <option value="24">24</option>
                                               <option value="25">25</option>
                                               <option value="26">26</option>
                                               <option value="27">27</option>
                                               <option value="28">28</option>
                                               <option value="29">29</option>
                                               <option value="30">30</option>
                                               <option value="31">31</option>
                                           </select>
                                       </div>
                                       <div class="col-xs-4 col-md-4">
                                           <select name="year" class = "form-control input-lg" required>
                                               <option value="">Year</option>
                                               
                                               <option value="1981">1981</option>
                                               <option value="1982">1982</option>
                                               <option value="1983">1983</option>
                                               <option value="1984">1984</option>
                                               <option value="1985">1985</option>
                                               <option value="1986">1986</option>
                                               <option value="1987">1987</option>
                                               <option value="1988">1988</option>
                                               <option value="1989">1989</option>
                                               <option value="1990">1990</option>
                                               <option value="1991">1991</option>
                                               <option value="1992">1992</option>
                                               <option value="1993">1993</option>
                                               <option value="1994">1994</option>
                                               <option value="1995">1995</option>
                                               <option value="1996">1996</option>
                                               <option value="1997">1997</option>
                                               <option value="1998">1998</option>
                                               <option value="1999">1999</option>
                                               <option value="2000">2000</option>
                                               <option value="2001">2001</option>
                                               <option value="2002">2002</option>
                                               <option value="2003">2003</option>
                                               <option value="2004">2004</option>
                                               <option value="2005">2005</option>
                                               <option value="2006">2006</option>
                                               <option value="2007">2007</option>
                                               <option value="2008">2008</option>
                                               <option value="2009">2009</option>
                                               <option value="2010">2010</option>
                                               <option value="2011">2011</option>
                                               <option value="2012">2012</option>
                                               <option value="2013">2013</option>
                                           </select>
                                       </div>
                                   </div>
                                   <div class="gen">Gender :
                                   <div class="radio-inline">
                                       <input type="radio" name="patientGender" value="male" required/>Male
                                       </div>
                                       <div class="radio-inline">
                                       <input type="radio" name="patientGender" value="female" required/>Female
                                       </div>

                                       <!-- <div class="gen">Gender :
                                   <div class="radio-inline">
                                       <input type="radio" name="patientMaritialStatus" value="marrid" required/>marrid
                                       </div>
                                       <div class="radio-inline">
                                       <input type="radio" name="patientMaritialStatus" value="unmarrid" required/>unmarrid
                                       </div> -->


                        
                                   
                                   <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit" name="signup" id="signup">Create my account</button>
        <p class="link"><a href="../patient/login.php">Click to Login</a></p>

                               </form>
                               
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- modal end -->
</body>
</html>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="assets/js/jquery.js"></script>
    <script src="assets/js/date/bootstrap-datepicker.js"></script>
    <script src="assets/js/moment.js"></script>
    <script src="assets/js/transition.js"></script>
    <script src="assets/js/collapse.js"></script>
     <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').focus()
    })
    </script>
    <!-- date start -->
  
<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })

    })

</script>

    <!-- date end -->


</body>
</html>