<?php require_once('Include/DB.php'); ?>
<?php require_once('Include/Sessions.php');?>
<?php require_once('Include/Functions.php');?>
<?php isLogIn() ?>

<?php 
if(isset($_POST['Submit'])){
	$UserName=$_POST['UserName'];
	$Password=$_POST['Password'];
	$ConfermPassword=$_POST['ConfermPassword'];
	date_default_timezone_set("Asia/Dhaka");
	$DateTime=strftime("%d-%B-%Y, %H:%M:%S");
	$Admin=$_SESSION["UserName"];
	if(empty($UserName)||empty($Password)||empty($ConfermPassword)){
		$_SESSION['ErrorMassage']="Field Must be Filled out!";
		Redirect_to("Admins.php");
	}
	elseif (strlen($Password)<4) {
		$_SESSION["ErrorMassage"]="At Least 4 Characters Required for Password!";
		Redirect_to("Admins.php");
	}
	elseif ($Password!==$ConfermPassword) {
		$_SESSION["ErrorMassage"]="Password/ConfermPassword not match!";
		Redirect_to("Admins.php");
	}
	else{
		global $Conn;
		$QueryInsert="INSERT INTO registration(datetime,username,password,addedby)
		VALUES('$DateTime','$UserName','$Password','$Admin') ";
		$ExecuteInsert=mysqli_query($Conn,$QueryInsert);
		if($ExecuteInsert){
			$_SESSION["SuccessMassage"]="Admin Added Successfully";
			Redirect_to("Admins.php");
		}
		else{
			$_SESSION["ErrorMassage"]="Admin Failed to Add";
			Redirect_to("Admins.php");
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admins</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/AdminStyle.css">
	<style>
		.input-group {
			width: 100%;
		}
		label {
			color: #4caf50;
			font-size: 16px;
		}
		.col-sm-10 {
			border-left: 10px solid #27AAE1;
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
					<li><a href="Blog.php">Server Side Application for Internet Based online Learning System</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="#" style="color: red"><?php echo "Admin: ". $_SESSION["UserName"] ?></a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="line" style="height: 10px; background: #27AAE1;"></div> 
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2">
				<ul id="sideMenu" class="nav nav-pills nav-stacked">
					<li>
						<a href="DashBoard.php"><span class="glyphicon glyphicon-th"></span>&nbsp;DashBoard</a>
					</li>
					<li>
						<a href="AddNewPost.php"><span class="glyphicon glyphicon-edit"></span>&nbsp;Add New Post</a>
					</li>
					<li>
						<a href="Categories.php"><span class="glyphicon glyphicon-tag"></span>&nbsp;Categories</a>
					</li>
					<li class="active">
						<a href="Admins.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Manage Admins</a>
					</li>
					<li><a href="Comments.php"><span class="glyphicon glyphicon-comment"></span>&nbsp;Comments
						<?php 
						global $Conn;
						$QueryCntTotal="SELECT COUNT(*) FROM comments WHERE status='OFF'";
						$ExecuteCntTotal=mysqli_query($Conn,$QueryCntTotal);
						$Row=mysqli_fetch_array($ExecuteCntTotal);
						$TotalUnCount=array_shift($Row);
						if($TotalUnCount>0){
							?>
							<span class="label label-warning pull-right">
								<?php echo $TotalUnCount ?>
							</span>
						<?php } ?>
					</a></li>
					<li>
						<a href="Blog.php"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;Live Blog</a>
					</li>
					<li>
						<a href="LogOut.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a>
					</li>
				</ul>
				<br>
			</div>
			<div class="col-sm-10">
				<h1>Manage Admin Access</h1>
				<div><?php 
				echo ErrorMassage(); 
				echo SuccessMassage(); 
				?></div>
				<form action="Admins.php" method="post">
					<fieldset>
						<legend></legend>
						<div class="input-group">
							<label for="UserName">Username: </label>
							<input class="form-control" type="text" name="UserName" id="UserName" placeholder="Username">
						</div>
						<br>
						<div class="input-group">
							<label for="Password">Password: </label>
							<input class="form-control" type="password" name="Password" id="Password" placeholder="Password">
						</div>
						<br>
						<div class="input-group">
							<label for="ConfermPassword">Conferm Password: </label>
							<input class="form-control" type="password" name="ConfermPassword" id="ConfermPassword" placeholder="Conferm Password">
						</div>
						<br>
						<input type="submit" class="btn btn-success btn-block" name="Submit" value="Add New Admin">
						<br>
					</fieldset>
				</form>
				<table class="table table-striped table-hover">
					<tr>
						<th>Serial No.</th>
						<th>Date</th>
						<th>Admins Name</th>
						<th>Added By</th>
						<th>Action</th>
					</tr>
					<?php  
					global $Conn;
					$QuerySelect="SELECT * FROM registration ORDER BY id desc";
					$ExecuteSelect=mysqli_query($Conn,$QuerySelect);
					$SrNo=0;
					while($Row=mysqli_fetch_array($ExecuteSelect)){
						$SrNo++;
						$UserName=$Row['username'];
						$AddedBy=$Row['addedby'];
						$DateTime=$Row['datetime'];
						$ID=$Row['id'];
						?>
						<tr>
							<td><?php echo $SrNo ?></td>
							<td><?php echo $DateTime ?></td>
							<td><?php echo $UserName ?></td>
							<td><?php echo $AddedBy ?></td>
							<td>
								<a class="btn btn-danger" href="AdminDelete.php?ID=<?php echo $ID ?>">Delete</a>
							</td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
	<div style="height: 10px; background: #27AAE1;"></div> 
	<div id="footer">
		<hr><p>Theme By | Nafiz Kamal | &copy;2020 --- All right reserved.</p>
		<a style="color: white; text-decoration: none; cursor: pointer; font-weight:bold;" href="http://jazebakram.com/coupons/" target="_blank">
			<p>This site is only used for Study purpose cseIU.edu have all the rights. no one is allow to distribute copies other then <br> &trade; CSE Deptartment,Islamic University,Bangladesh </p><hr>
		</a>
	</div>
	<div style="height: 10px; background: #27AAE1;"></div> 

	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>