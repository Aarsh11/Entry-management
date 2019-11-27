<?php
if (isset($_POST['submit']))
{
$servername = "localhost"; 
$dbname = "mgmt"; 
$dbusername = "root"; 
$dbpassword = "";
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error)
{
	die("connection failed: . $conn->connect_error");
}

$fname = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$sql = "INSERT INTO data(name , email, phone, address) VALUES ('$fname','$email','$phone','$address')";
if ($conn->query($sql) === TRUE )
{
	$to="vs@xyz.com";
	$subject = "New USER";
	$message = "
	<html>
		<p>THIS PERSON HAS JUST CHECKED IN</p>
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
	$headers .= 'From: <visiter@xyz.com>' . "\r\n";
	mail($to, $subject, $message, $headers);
	session_start();
	$_SESSION['name'] = $fname;
	$_SESSION['email'] = $email;
	$_SESSION['phone'] = $phone;
	$_SESSION['address'] = $address;
	echo "<script>alert('Successfully Registered ');</script>";
	echo "<script type='text/javascript'>document.location.href='home.php';</script>";
	die();
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Management</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script type="text/javascript">
        function CheckForBlank() {
        	var phoneNo = document.getElementById('phone');
			  if (phoneNo.value.length < 10 || phoneNo.value.length > 10) {
			    alert("Mobile No. is not valid, Please Enter 10 Digit Mobile No.");
			    return false;
			  }
        }
    </script>
</head>
<body>
<div class="container">
<div class="row m-2 p-2">
	<h2>Hello, Please enter your details</h2>
</div>
<form class="m-2 p-3" method="POST" onsubmit="return CheckForBlank();">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">name</label>
      <input type="text" class="form-control" id="name" placeholder="name" name="name" required>
    </div>
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" placeholder="email" name="email" required>
    </div>
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="number" class="form-control" id="phone" placeholder="9489877878" name="phone" required>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address" required>
  </div>
  <button type="submit" class="btn btn-primary"  name="submit">submit</button>
</form>

</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>