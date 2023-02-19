<?php
require('database/dbconnect.php');
if (isset($_POST['submit'])) {
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
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>contact Us</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
     <link rel="stylesheet" href="contact_css.css">
</head>
<body>
	<a href="home.php">
	<i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true"></i>
	</a>
	<div class="container">
		
		<h1 class="brand"><span>Contact Us</span></h1>

<div class="wrapper">

	<!-- COMPANY INFORMATION -->
	<div class="company-info">
		<h3>City Hospital</h3>

		<ul>
			<li><i class="fas fa-map-marker-alt"></i> 4P3M+QVV, Saveri Road,Lal Taki- Road,Maharashtra 414001</li><br>
			<li><i class="fas fa-phone-square-alt"></i> 0241-454545</li><br>
			<li><i class="fa fa-envelope"></i> cityhospital@gmail.com</li><br>
		</ul>
	</div>
	<!-- End .company-info -->

	<!-- CONTACT FORM -->
	<div class="contact">
		<h3>E-mail Us</h3>
        <form action="home.php" method="post">
		

			<p>
				<label>Name</label>
				<input type="text" name="name" id="name" required>
			</p>

			<!-- <p>
				<label>Company</label>
				<input type="text" name="company" id="company">
			</p> -->

			<p>
				<label>E-mail Address</label>
				<input type="email" name="email" id="email" required>
			</p>

			<p>
				<label>Phone Number</label>
				<input type="text" name="phone" id="phone">
			</p>

			<p class="full">
				<label>Message</label>
				<textarea name="message" rows="5" id="message"></textarea>
			</p>

			<p class="full">
				<button type="submit" name="submit" value="submit">Submit</button>
			</p>

		</form>
		<!-- End #contact-form -->
	</div>
	<!-- End .contact -->

</div>
<!-- End .wrapper -->
</div>
<!-- End .container -->
</body>
</html>

