<?php

session_start();

#echo $_SESSION['email'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Management</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">	
<div class="row m-3">
	<div class="col-md-12">
		<h1>Hello,<?php echo $_SESSION['name']; ?></h1>
	</div>
	<div class="p-3 col-md-12 pull-right">
		<a class="btn btn-primary" href="logout.php" role="button">CheckOut</a>
	</div>
</div>
<div class="row p-3">
	<div class="row">
		<div class="col-md-12"> 
			<h3 class="text-center">Earlier Visiter</h3>
		</div>
	</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
    </tr>
  </thead>
  <tbody>	
<?php
$servername = "localhost"; 
$dbname = "mgmt"; 
$dbusername = "root"; 
$dbpassword = "";
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error)
{
	die("connection failed: . $conn->connect_error");
}
$query = "SELECT * FROM `data`";
$result = mysqli_query($conn,$query) or die(mysql_error());
while ($row = mysqli_fetch_assoc($result))
{
echo
			'<tr>
							<td>'.$row["id"].'</td>
							<td>'.strtoupper($row["name"]).'</td>
							<td>'.$row["email"].'</td>
							<td>'.$row["phone"].'</td>
							<td>'.$row["address"].'</td>
							
			
			</tr>';
}
?>
</tbody>
</table>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>