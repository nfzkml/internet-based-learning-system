<?php require_once('Include/DB.php'); ?>
<?php require_once('Include/Sessions.php');?>
<?php require_once('Include/Functions.php');?>

<?php 
if(isset($_POST['Submit'])){
	$cName=$_POST['cName'];
	$cEmail=$_POST['cEmail'];
	$Comment=$_POST['Comment'];
	date_default_timezone_set("Asia/Dhaka");
	$DateTime=strftime("%d-%b-%y, %H:%M:%S");

	if(empty($cName) ||empty($cEmail) ||empty($Comment)){
		$_SESSION['ErrorMassage']="All Fields are required!";
	}
	elseif (strlen($Comment)>500) {
		$_SESSION["ErrorMassage"]="Too Long";
	}
	else{
		global $Conn;
		$IDtoComment=$_GET['ID'];
		$QueryInsert=
		"INSERT INTO comments(datetime,cname,cemail,comment,approvedby,status,admin_panel_id)
		VALUES ('$DateTime','$cName','$cEmail','$Comment','pending','OFF','$IDtoComment')";
		$ExecuteInsert=mysqli_query($Conn,$QueryInsert);
		if($ExecuteInsert){
			$_SESSION["SuccessMassage"]="Comment Submitted Successfully";
			Redirect_to("FullPost.php?ID={$_GET['ID']}");
		}
		else{
			$_SESSION["ErrorMassage"]="Post Failed to Add";
			Redirect_to("FullPost.php?ID={$_GET['ID']}");
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Full Blog Post</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/PublicStyle.css">
	<style>
		.input-group {
			width: 100%;
		}
		label {
			color: #337AB7;
			font-size: 16px;
		}
		.CommentBlock {
			background: #f6f7f9;
		}

		img.pull-left.img-responsive.img-thumbnail {
			width: 80px;
			margin: 10px;
		}
		p.CommentName {
			color: #365899;
			font-family: sans-serif;
			font-size: 1.1em;
			font-weight: bold;
			padding-top: 10px;
		}

		.CommentBlock p {
			margin-left: 90px;
		}

		p.Commentdes {
			color: #868686;
			font-weight: bold;
			margin-top: -2px;
		}

		p.Comment {
			margin-top: -2px;
			padding-bottom: 10px;
			font-size: 1.1em;
		}
	</style>
</head>
<body>
	<div style="height: 10px; background: #27AAE1;"></div> 
	<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="Blog.php?Page=1">
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
					<li><a href="Blog.php?Page=1">Client-Side Application for Internet Based online Learning System</a></li>
				</ul>
				<form action="Blog.php" method="get" class="myRight2 navbar-form navbar-left" role="search">
					<div class="form-group">
						<input type="text" class="form-control" name="Search" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default" name="SearchBtn">Search</button>
				</form>
				<ul class="myRight1 nav navbar-nav navbar-right">
					<li><a href="DashBoard.php">Server Side</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="line" style="height: 10px; background: #27AAE1;"></div>
	<div class="container">
		<div class="blogHeader">
			<h1>Internet Based online Learning System</h1>
			<p class="lead">The Complete Responsive CMS Blog by Nafiz Kamal & Rosul Ahmed</p>
		</div>
		<div class="row">
			<div><?php 
			echo ErrorMassage(); 
			echo SuccessMassage(); 
			?></div>
			<div class="col-sm-8">
				<?php 
				global $Conn;
				if(isset($_GET['SearchBtn'])){
					$Search=$_GET['Search'];
					$QuerySelect="SELECT * FROM admin_panel WHERE 
					datetime LIKE '%$Search%' OR
					title LIKE '%$Search%' OR
					category LIKE '%$Search%' OR
					author LIKE '%$Search%' OR
					post LIKE '%$Search%'";
				}
				else{
					$IDGetFromUrl=$_GET['ID'];
					$QuerySelect="SELECT * FROM admin_panel WHERE id='$IDGetFromUrl' ORDER BY datetime desc";
				}
				$ExecuteSelect=mysqli_query($Conn,$QuerySelect);
				while($Row=mysqli_fetch_array($ExecuteSelect)){
					$ID=$Row['id'];
					$DateTime=$Row['datetime'];
					$Title=$Row['title'];
					$Category=$Row['category'];
					$Author=$Row['author'];
					$File=$Row['file'];
					$Post=$Row['post'];
					?>
					<div class="thumbnail blogpost">
						<img class="img-responsive" src="Upload/<?php echo $File ?>" alt="">
						<div class="caption">
							<h1 class="heading"><?php echo $Title; ?></h1 >
							<p class="description">Category: <?php echo $Category;?> Published on <?php echo $DateTime; ?>Author: <?php echo $Author; ?></p>
							<p class="post"><?php echo nl2br($Post); ?></p>
						</div>
					</div>
				<?php } ?>
				<label>Comments:</label>
				<?php 
				global $Conn;
				$IDLinkComment=$_GET['ID'];
				$QuerySelectComments="SELECT * FROM comments 
				WHERE admin_panel_id='$IDLinkComment' AND status='ON' ";
				$ExecuteSelectComments=mysqli_query($Conn,$QuerySelectComments);
				while($Row=mysqli_fetch_array($ExecuteSelectComments)){
					$cDateTime=$Row['datetime'];
					$cName=$Row['cname'];
					$Comment=$Row['comment'];
					?>
					<div class="CommentBlock">
						<img class="pull-left img-responsive img-thumbnail" src="Images/comment.png" alt="">
						<p class="CommentName"><?php echo $cName ?></p>
						<p class="Commentdes"><?php echo $cDateTime ?></p>
						<p class="Comment"><?php echo nl2br($Comment) ?></p>
					</div>
					<hr>
				<?php } ?>
				<br>
				<label>Share your thoughts about this post: </label>
				<form action="FullPost.php?ID=<?php echo $_GET['ID']; ?>" method="post" enctype="multipart/form-data">
					<fieldset>
						<legend></legend>
						<div class="input-group">
							<label for="cName">Name: </label>
							<input class="form-control" type="text" name="cName" id="cName" placeholder="Name">
						</div>
						<br>
						<div class="input-group">
							<label for="cEmail">Email: </label>
							<input class="form-control" type="email" name="cEmail" id="cEmail" placeholder="Email">
						</div>
						<br>
						<div class="input-group">
							<label for="Comment">Comment: </label>
							<textarea class="form-control"  name="Comment" id="Comment" placeholder="Comment..."></textarea>
						</div>
						<br>
						<input type="submit" class="btn btn-primary" name="Submit" value="Submit Comment">
						<br><br>
					</fieldset>
				</form>

			</div>
			<div class="col-sm-3 col-sm-offset-1">
				<img style="margin-left: -12px" class="img-responsive img-rounded" src="Images/Us2.png" alt="">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda iure aliquam tenetur obcaecati reprehenderit, voluptatem, quo suscipit excepturi ipsam odit. Quibusdam maiores, quisquam ad. Cum, voluptatem, nihil. Nostrum facilis, doloribus.</p>
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h2 class="panel-title">Categories</h2>
					</div>
					<div class="panel-body">
						<?php  
						global $Conn;
						$QueryCategory="SELECT * FROM category ORDER BY datetime desc";
						$ExecuteCategory=mysqli_query($Conn,$QueryCategory);
						while($Row=mysqli_fetch_array($ExecuteCategory)){
							$cID=$Row['id'];
							$cName=$Row['name'];
							?>
							<a href="Blog.php?Category=<?php echo $cName ?>" class="heading"> <?php echo $cName ?></a><br>
						<?php } ?>
					</div>
					<div class="panel-footer"></div>
				</div>

				<div class="panel panel-primary">
					<div class="panel-heading">
						<h2 class="panel-title">Recent Posts</h2>
					</div>
					<div class="panel-body" style="background: #f6f7f9">
						<?php  
						global $Conn;
						$QueryRecent="SELECT * FROM admin_panel ORDER BY datetime desc LIMIT 0,5";
						$ExecuteRecent=mysqli_query($Conn,$QueryRecent);
						while($Row=mysqli_fetch_array($ExecuteRecent)){
							$ID=$Row['id'];
							$DateTime=$Row['datetime'];
							$Title=$Row['title'];
							$File=$Row['file'];
							?>
							<div class="thumbnail ">
								<img class="img-responsive img-rounded" src="Upload/<?php echo $File ?>" alt="">
								<div class="caption">
									<a href="FullPost.php?ID=<?php echo $ID ?>"><p class="heading"><?php echo $Title; ?></p ></a>
									<p class="description"><?php echo substr($DateTime,0,9);?></p>
								</div>
							</div>
						<?php } ?>
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
		</div>
	</div>

	<div style="height: 10px; background: #27AAE1;"></div> 
	<div id="footer">
		<hr><p>Theme By | Nafiz Kamal & Rosul Ahmed | &copy;2020 --- All right reserved.</p>
		<a style="color: white; text-decoration: none; cursor: pointer; font-weight:bold;">
			<p>This site is only used for Study purpose cseIU.edu have all the rights. no one is allow to distribute copies other then <br> &trade; CSE Deptartment,Islamic University,Bangladesh </p><hr>
		</a>
	</div>
	<div style="height: 10px; background: #27AAE1;"></div> 

	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>