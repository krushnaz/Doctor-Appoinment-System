<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>About Us</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
     <link rel="stylesheet" href="contact_css.css">

     <style>
        
.contact form p {
    margin: 0px;
    margin-inline-end: -200px;
}

        </style>

</head>
<body>
<a href="home.php">
	<i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true"></i>
	</a>
<div class="container">

<h1 class="brand"><span>About Us</span></h1>
<!-- <a href="../home.php">Home</a> -->
<div class="wrapper">

	<!-- COMPANY INFORMATION -->
	<div class="company-info">
		<h3>City Hospital</h3>

		<ul>
			<li><i class="fas fa-map-marker-alt"></i> 4P3M+QVV, Savedi Road,Lal Taki Road,Maharashtra 414001</li>
			<li><i class="fas fa-phone-square-alt"></i> 0241-454545</li>
			<li><i class="fa fa-envelope"></i> cityhospital@gmail.com</li>
		</ul>
	</div>


	<div class="contact">
		
        <form action="#" method="post">
		

            <p>As a patient we face many difficulties when we want to get an appointment for a doctor in their chambers or places. When people get affected by illness they need to visit a doctor for checkup but they have to visit their chambers or hospital to get appointment. It is a lengthy process and wasting people’s time. Sometimes people do visit doctor’s chamber for health check but the doctor is not available some various reason. It’s the only way to get to know when people just visited their places. It harasses people a lot. Besides people need an ambulance service to carry on patient to hospitals. Merely, people need to visit hospitals or clinics to hire ambulance, it is a time consuming process. Our motivation is, if we have an option to get this appointment very easy that can be more precious for us. Then we have planned to implement a Web-based appointment system.</p>

		</form>
	
	</div>
	

</div>

</div>

</body>
</html>
<?php
require('database/dbconnect.php');
if (isset($_POST['send'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$query = " INSERT INTO contactUs(name,email,phone,message) VALUES ('$name','$email','$phone','$message') ";
// $result = mysqli_query($conn,$query);
// echo $result;

if($con -> query($query) === TRUE){
	// echo "successfully";
}
else{
	echo "error".$query."<br>".$con->error;
}
// if( $result )
// {
?>
<script type="text/javascript">
alert('We Contact with you within 1 hours!');
</script>

 <?php
// echo "your feedback send succesfully!";

}
else
{
// header("location : home.php")

	
?>

<!-- <script type="text/javascript">
alert('try again');
</script> -->
<?php
}
?>

