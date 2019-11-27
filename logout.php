<?php
session_start();
$fname = $_SESSION['name']; 
$email = $_SESSION['email']; 
$phone = $_SESSION['phone']; 
$address = $_SESSION['address']; 
$servername = "localhost"; 
$dbname = "mgmt"; 
$dbusername = "root"; 
$dbpassword = "";
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error)
{
	die("connection failed: . $conn->connect_error");
}

$sql = "UPDATE `data` SET Check_out_time=now() WHERE email='$email'";
    $result=mysqli_query($conn,$sql);
    if($result){
    	$to=$email;
		$subject = "Thanks Message";
		$message = "
		<html>
			<h1>Thanks for VISIT</h1>
			<tr>
			<td>".$fname."</td>
			<td>".$email."</td>
			<td>".$phone."</td>
			<td>".$address."</td>
			</tr>
		</html>
		";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: <vs@xyz.com>' . "\r\n";
		mail($to, $subject, $message, $headers);
        echo"<script>alert('Thank you for visit.');</script>"; 
        echo "<script type='text/javascript'>document.location.href='index.php';</script>";
        die();
    }
unset($_SESSION['email']);
session_destroy();
header("Location: index.php");
exit;
?>