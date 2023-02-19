



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="feedback_css.css">
	<title>Document</title>
</head>
<body>
<div class="contact">
<h1 class="brand"><span>Give Your Valueable Feedback!</span></h1>
		<h3>E-mail Us</h3>
        <form action="home.php" method="post">
		

			<p>
				<label>Name</label>
				<input type="text" name="name" id="name" required>
			</p>

			

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
				<button type="submit" name="send" value="send">Submit</button>
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
</body>
</html>



<?php
require('database/dbconnect.php');
if (isset($_POST['send'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$query = " INSERT INTO feedback (name,email,phone,message) VALUES ('$name','$email','$phone','$message') ";
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
alert('your feedback successfully send!');
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



