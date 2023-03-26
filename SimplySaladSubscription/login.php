<?php 
session_start();

if(isset($_SESSION['user_id'])){
  header('location:purchase.php');
  exit();
}

$con=mysqli_connect("localhost","root","","purchase");

if(mysqli_connect_error()){
  echo"<script>
    alert('cannot connect to database');
    window.location.href='login.php';
  </script>";
  exit();
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
  if(isset($_POST['login']))
  {
    $query="SELECT * FROM `users` WHERE `Email`='$_POST[email]' AND `Password`='$_POST[password]'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)==1)
    {
      $row=mysqli_fetch_assoc($result);
      $_SESSION['user_id']=$row['Id'];
      $_SESSION['user_name']=$row['Name'];
      header('location:purchase.php');
      exit();
    }
    else
    {
      $error_message="Invalid email or password";
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<h1>Login</h1>
	<?php 
	if(isset($error_message))
	{
		echo "<p style='color:red;'>".$error_message."</p>";
	}
	?>
	<form method="post" action="">
		<label>Email:</label><br>
		<input type="email" name="email" required><br><br>
		<label>Password:</label><br>
		<input type="password" name="password" required><br><br>
		<input type="submit"
