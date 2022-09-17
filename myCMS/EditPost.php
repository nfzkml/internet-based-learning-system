<?php require_once('Include/DB.php'); ?>
<?php require_once('Include/Sessions.php');?>
<?php require_once('Include/Functions.php');?>

<?php 
if(isset($_POST['Submit'])){
	$Title=$_POST['Title'];
	$Category=$_POST['Category'];
	$Post=$_POST['Post'];
	date_default_timezone_set("Asia/Dhaka");
	$DateTime=strftime("%d-%b-%y, %H:%M:%S");
	$Author=$_SESSION["UserName"];
	$File=$_FILES['File']['name'];
	$DirUpload="Upload/".basename($File);

	if(empty($Title)){
		$_SESSION['ErrorMassage']="Title can't be empty!";
		Redirect_to("AddNewPost.php");
	}
	elseif (strlen($Title)>111) {
		$_SESSION["ErrorMassage"]="Too Long";
		Redirect_to("AddNewPost.php");
	}
	else{
		global $Conn;
		$IDGetFromUrl=$_GET['Edit'];
		$QueryUpdate="UPDATE admin_panel 
		SET datetime='$DateTime',title='$Title',category='$Category',file='$File',post='$Post' 
		WHERE id='$IDGetFromUrl'";
		$ExecuteUpdate=mysqli_query($Conn,$QueryUpdate);
		move_uploaded_file($_FILES['File']['tmp_name'], $DirUpload);
		if($ExecuteUpdate){
			$_SESSION["SuccessMassage"]="Post Updated Successfully";
			Redirect_to("DashBoard.php");
		}
		else{
			$_SESSION["ErrorMassage"]="Post Failed to Update";
			Redirect_to("DashBoard.php");
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Added Post</title>
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
				<form action="Blog.php" method="get" class="navbar-form navbar-right" role="search">
					<div class="form-group">
						<input type="text" class="form-control" name="Search" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default" name="SearchBtn">Search</button>
				</form>
			</div>
		</div>
	</nav>
	<div class="line" style="height: 10px; background: #27AAE1;"></div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2">
				<ul id="sideMenu" class="nav nav-pills nav-stacked">
					<li class="active">
						<a href="DashBoard.php"><span class="glyphicon glyphicon-th"></span>&nbsp;DashBoard</a>
					</li>
					<li>
						<a href="AddNewPost.php"><span class="glyphicon glyphicon-edit"></span>&nbsp;Add New Post</a>
					</li>
					<li>
						<a href="Categories.php"><span class="glyphicon glyphicon-tag"></span>&nbsp;Categories</a>
					</li>
					<li>
						<a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;Manage Admins</a>
					</li>
					<li>
						<a href="#"><span class="glyphicon glyphicon-comment"></span>&nbsp;Comments</a>
					</li>
					<li>
						<a href="#"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;Live Blog</a>
					</li>
					<li>
						<a href="#"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a>
					</li>
				</ul>
				<br>
			</div>
			<div class="col-sm-10">
				<h1>Update Post</h1>
				<div><?php 
				echo ErrorMassage(); 
				echo SuccessMassage(); 
				?></div>
				<?php 
				global $Conn;
				$IDGetToEdit=$_GET['Edit'];
				$QueryFetch="SELECT * FROM admin_panel WHERE id='$IDGetToEdit'";
				$ExecuteFetch=mysqli_query($Conn,$QueryFetch);
				while($Row=mysqli_fetch_array($ExecuteFetch)){
					$TitleFetch=$Row['title'];
					$CategoryFetch=$Row['category'];
					$FileFetch=$Row['file'];
					$PostFetch=$Row['post'];
				}
				?>
				<form action="EditPost.php?Edit=<?php echo $_GET['Edit']; ?>" method="post" enctype="multipart/form-data">
					<fieldset>
						<legend></legend>
						<div class="input-group">
							<label for="Title">Title Name: </label>
							<input value="<?php echo $TitleFetch ?>" class="form-control" type="text" name="Title" id="Title" placeholder="Title Name">
						</div>
						<br>

						<div class="input-group">
							<label for="Category">Category Name: </label>
							<select class="form-control" name="Category" id="Category">
								<?php  
								global $Conn;
								$QuerySelect="SELECT * FROM category ORDER BY datetime desc";
								$ExecuteSelect=mysqli_query($Conn,$QuerySelect);
								while($Row=mysqli_fetch_array($ExecuteSelect)){
									$CatName=$Row['name'];
									if($CatName==$CategoryFetch)
										echo "<option selected >".$CategoryFetch."</option>";
									else
										echo "<option>".$CatName."</option>";
								} 
								?>
							</select>
						</div>
						<br>

						<div class="input-group">
							<label for="File">File Name: </label><br>
							<img class="img-responsive img-thumbnail" src="Upload/<?php echo $FileFetch ?>" alt="">
							<br><br>
							<input class="form-control" type="file" name="File" id="File" placeholder="File Name">
						</div>
						<br>

						<div class="input-group">
							<label for="Post">Post: </label>
							<textarea class="form-control"  name="Post" id="Post" placeholder="Post...">
								<?php echo $PostFetch ?>
							</textarea>
						</div>
						<br>

						<input type="submit" class="btn btn-success btn-block" name="Submit" value="Update Post">
						<br>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	<div style="height: 10px; background: #27AAE1;"></div> 
	<div id="footer">
		<hr><p>Theme By | Nafiz Kamal |&copy;2020 --- All right reserved.</p>
		<a style="color: white; text-decoration: none; cursor: pointer; font-weight:bold;" href="http://jazebakram.com/coupons/" target="_blank">
			<p>This site is only used for Study purpose cseIU.edu have all the rights. no one is allow to distribute copies other then &trade; cseIU.edu </p><hr>
		</a>
	</div>
	<div style="height: 10px; background: #27AAE1;"></div> 

	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>