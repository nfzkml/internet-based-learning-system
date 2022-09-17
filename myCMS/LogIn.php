<?php require_once('Include/DB.php'); ?>
<?php require_once('Include/Sessions.php');?>
<?php require_once('Include/Functions.php');?>

<?php 
if(isset($_POST['Submit'])){
	$UserName=$_POST['UserName'];
	$Password=$_POST['Password'];

	if(empty($UserName)||empty($Password)){
		$_SESSION['ErrorMassage']="Field Must be Filled out!";
		Redirect_to("LogIn.php");
	}
	else{
		global $Conn;
		$QuerySelect="SELECT * FROM registration WHERE username='$UserName' AND password='$Password'";
		$ExecuteSelect=mysqli_query($Conn,$QuerySelect);
		$Row=mysqli_fetch_assoc($ExecuteSelect);
		$_SESSION["uID"]=$Row['id'];
		$_SESSION["UserName"]=$Row['username'];
		if($Row){
			$_SESSION["SuccessMassage"]="Welcome {$_SESSION["UserName"]}";
			Redirect_to("DashBoard.php");
		}
		else{
			$_SESSION["ErrorMassage"]="Invalid Username / Password";
			Redirect_to("LogIn.php");
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>LogIn</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/AdminStyle.css">
	<style>
		.input-group {
			width: 100%;
		}
		label {
			color: #27AAE1;
			font-size: 18px;
		}
		.col-sm-10 {
			border-left: 10px solid #27AAE1;
		}
		body{
			background: #fff;
		}
	</style>
</head>
<body>
	<div style="height: 10px; background: #27AAE1;"></div> 
	<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="Blog.php">
					<img alt="Brand" src="Images/Lgo.jpg">
				</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="collapse">
				<ul class="nav navbar-nav">
					<li><a href="LogIn.php">Login Page</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="line" style="height: 10px; background: #27AAE1;"></div> 
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-offset-4 col-sm-4">
				<br><br><br>
				<div><?php 
				echo ErrorMassage(); 
				echo SuccessMassage(); 
				?></div>
				<h2 >Welcome Back!</h2>
				<form action="LogIn.php" method="post">
					<fieldset>
						<legend></legend>
						<label for="UserName">Username: </label>
						<div class="input-group input-group-lg">
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-envelope text-primary"></span>
							</span>
							<input class="form-control" type="text" name="UserName" id="UserName" placeholder="Username">
						</div>
						<br>
						<label for="Password">Password: </label>
						<div class="input-group input-group-lg">
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock text-primary"></span>
							</span>
							<input class="form-control" type="password" name="Password" id="Password" placeholder="Password">
						</div>
						<br>
						<input type="submit" class="btn btn-info btn-block btn-lg" name="Submit" value="Login">
						<br>
					</fieldset>
				</form>
			</div>
		</div>
	</div>

	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>