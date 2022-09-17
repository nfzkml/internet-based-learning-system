<?php require_once('Include/DB.php'); ?>
<?php require_once('Include/Sessions.php');?>
<?php require_once('Include/Functions.php');?>
<?php isLogIn() ?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin DashBoard</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/AdminStyle.css">
	<style>
		span.label {
			font-size: 100%;
			font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
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
					<li class="active"><a href="DashBoard.php">
						<span class="glyphicon glyphicon-th"></span>&nbsp;DashBoard</a>
					</li>
					<li>
						<a href="AddNewPost.php"><span class="glyphicon glyphicon-edit"></span>&nbsp;Add New Post</a>
					</li>
					<li>
						<a href="Categories.php"><span class="glyphicon glyphicon-tag"></span>&nbsp;Categories</a>
					</li>
					<li>
						<a href="Admins.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Manage Admins</a>
					</li>
					<li>
						<a href="Comments.php"><span class="glyphicon glyphicon-comment"></span>&nbsp;Comments
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
								<?php } ?></a>
							</li>
							<li>
								<a href="Blog.php" target="_blank"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;Live Blog</a>
							</li>
							<li>
								<a href="LogOut.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a>
							</li>
						</ul>
					</div>
					<div class="col-sm-10">
						<div><?php echo ErrorMassage(); echo SuccessMassage(); ?></div>
						<h1>Admin DashBoard</h1>
						<div class="table-responsive">
							<table class="table table-striped table-hover">
								<tr>
									<th>No.</th>
									<th style="text-align: left;">Post Title</th>
									<th>Date & Time</th>
									<th>Author</th>
									<th>Category</th>
									<th>Banner</th>
									<th>Comments</th>
									<th>Action</th>
									<th>Details</th>
								</tr>
								<?php  
								global $Conn;
								$QuerySelect="SELECT * FROM admin_panel ORDER BY id desc";
								$ExecuteSelect=mysqli_query($Conn,$QuerySelect);
								$SrNo=0;
								while($Row=mysqli_fetch_array($ExecuteSelect)){
									$SrNo++;
									$Title=$Row['title'];
									$DateTime=$Row['datetime'];
									$Author=$Row['author'];
									$Category=$Row['category'];
									$File=$Row['file'];
									$ID=$Row['id'];
									$Post=$Row['post'];
									?>
									<tr>
										<td><?php echo $SrNo ?></td>
										<td style="color: #5e5eff;text-align: left;"><?php
										if(strlen($Title)>22)
											echo substr($Title, 0,22)."...";
										else
											echo $Title;
										?></td>
										<td><?php echo substr($DateTime, 0,9) ?></td>
										<td><?php echo $Author ?></td>
										<td><?php echo $Category ?></td>
										<td><img class="img-responsive img-thumbnail" src="Upload/<?php echo $File ?>" alt=""></td>
										<td>
											<?php 
											global $Conn;
											$QueryCntApproved="SELECT COUNT(*) FROM comments WHERE admin_panel_id='$ID' AND status='ON'";
											$ExecuteCntApproved=mysqli_query($Conn,$QueryCntApproved);
											$Row=mysqli_fetch_array($ExecuteCntApproved);
											$TotalApproved=array_shift($Row);
											if($TotalApproved>0){
												?>
												<span class="label label-success pull-right">
													<?php echo $TotalApproved ?>
												</span>
											<?php } ?>

											<?php 
											global $Conn;
											$QueryCntUnApproved="SELECT COUNT(*) FROM comments WHERE admin_panel_id='$ID' AND status='OFF'";
											$ExecuteCntUnApproved=mysqli_query($Conn,$QueryCntUnApproved);
											$Row=mysqli_fetch_array($ExecuteCntUnApproved);
											$TotalUnApproved=array_shift($Row);
											if($TotalUnApproved>0){
												?>
												<span class="label label-danger pull-left">
													<?php echo $TotalUnApproved ?>
												</span>
											<?php } ?>
										</td>
										<td>
											<a target="_blank" class="btn btn-warning" href="EditPost.php?Edit=<?php echo $ID ?>">Edit</a>
											<a target="_blank" class="btn btn-danger"  href="DeletePost.php?Delete=<?php echo $ID ?>">Delete</a>
										</td>
										<td><a target="_blank" class="btn btn-info" href="FullPost.php?ID=<?php echo $ID ?>">Live Preview</a></td>
									</tr>
								<?php } ?>
							</table>
						</div>
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