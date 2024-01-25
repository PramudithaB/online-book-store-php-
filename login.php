<?php
include("database.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$Email = $_POST['email'];
	$Password = $_POST['Password'];

	$query = "SELECT * FROM user WHERE email='$Email' && Password='$Password'";
	$result = mysqli_query($conn, $query);

	if (mysqli_num_rows($result) > 0) {
		$user_data = mysqli_fetch_array($result);
		$_SESSION['user_id'] = $user_data['ID'];
    
		if ($user_data['User_Type'] == 'admin') {
			header("location:displaybooks.php");
			die;
		} else if ($user_data['User_Type'] == 'User') {
			header("location:userdashboard.php");
			die;
		} else if ($user_data['User_Type'] == 'Supplier') {
			header("location:Supplierdashboard.php");
			die;
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./styles/login.css">
</head>
<body>
	
<div class="container">
    <form action="" method="POST">
      <h2>Login Form</h2>

      <br>
      <label>Email</label>
      <input type="email" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}" required><br /><br />

      <label>Password</label>
      <input type="password" name="Password" placeholder="Password" required><br /><br />

      <button type="submit">Log in</button>
    </form>

</body>
</html>
