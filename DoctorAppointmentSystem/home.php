

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- this is the head tag -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="home_css.css">
  <!-- <link rel="stylesheet" href='file:///C:/Users/krish/Downloads/hospital-solid.svg'> -->
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.css">
  <!-- <link rel="stylesheet" href="../assets/css/bootstrap.css"> -->
  <!-- <link rel="stylesheet" href="css/appoint_css.css"> -->
  

  <style>
.fullheight {
background-image: url("doctor_img.jpg");
}
  </style>
  <!-- head tag end -->
</head>


<body class="fullheight" >
  

  

  <!-- <h1><center>Doctor Appointment System</center></h1>  -->
  <div class="scrollmenu links">
    <!-- sign in -->
    <div class="sign-in">
      
      <div class="border">
        <!-- <img src="doctor_logo.png" alt="logo"> -->
        <a href="patient/login.php" class="button">Sign In</a>
        <a href="patient/registration.php" class="button">Sign Up</a>
        <!-- <h1><center>Doctor Appointment System</center></h1>  -->
        <h1><i class='fa fa-hospital'></i>
      <span>CITY HOSPITAL</span></h1>
      

      </div>
      <div class="box">
        <p>This is doctor schedule, 
          <br>Please <span class="label label-danger">login</span> to make an <br>appointment.</p>
          <label for="dateofbirth">Check Doctor Schedule</label>
          <!-- <input type="date" class="form-control" id="date" name="date" value="2022-10-16" onchange="showUser(this.value)"> -->
          <input type="date" class="controlyourform" id="date" name="date" value="<?php echo date("Y-m-d")?>" onchange="showUser(this.value)">
             
          <div id="txtHint"><b> </b></div>

 

        </div>
    </div>
    <a href="home.php" class="b">Home</a>
    <a href="contact.php" class="b">Contact</a>
    <a href="about.php" class="b">About</a>
    <!-- <a href="patient/get_ambulance.php" class="b">Get Ambulance</a> -->
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
                                    xmlhttp.open("GET","doctor/getuserhome.php?q="+str,true);
                                    console.log(str);
                                    xmlhttp.send();
                                }
                            }
                        </script>
                        


 <footer>
 <div class="media-icons">
           <a href="#"><i class="fab fa-facebook-f"></i></a>
           <a href="#"><i class="fab fa-instagram"></i></a>
           <a href="#"><i class="fab fa-twitter"></i></a>
           <a href="#"><i class="fab fa-youtube"></i></a>
           <a href="#"><i class="fab fa-linkedin-in"></i></a>
         </div>
  <div class="bottom">
    <div class="admin">
     <a href="adminlogin.php" style="color:white;font-size:large">Admin</a>
    </div>    
    Copyright © 2022 <pa style="color:red;">All rights reserved</p>          
   </div>
  </footer>
</body>
</html>
















