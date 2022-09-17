<?php require_once('Include/DB.php'); ?>
<?php require_once('Include/Sessions.php');?>
<?php require_once('Include/Functions.php');?>
<?php isLogIn() ?>

<!DOCTYPE html>
<html>
<head>
	<title>Comments</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/AdminStyle.css">
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
					<li><a href="DashBoard.php">
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
					<li class="active">
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
								<a href="Blog.php"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;Live Blog</a>
							</li>
							<li>
								<a href="LogOut.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a>
							</li>
						</ul>
					</div>
					<div class="col-sm-10">
						<div><?php echo ErrorMassage(); echo SuccessMassage(); ?></div>
						<h1>Un-Approved Comments</h1>
						<div class="table-responsive">
							<table class="table table-striped table-hover">
								<tr>
									<th>No.</th>
									<th style="text-align: left;">Name</th>
									<th>Date</th>
									<th style="text-align:left">Comment</th>
									<th>Approve</th>
									<th>Delete</th>
									<th>Details</th>
								</tr>
								<?php  
								global $Conn;
								$QueryFetchComment="SELECT * FROM comments WHERE status='OFF' ORDER BY id desc";
								$ExecuteFetchComment=mysqli_query($Conn,$QueryFetchComment);
								$SrNo=0;
								while($Row=mysqli_fetch_array($ExecuteFetchComment)){
									$SrNo++;
									$cID=$Row['id'];
									$DateTime=$Row['datetime'];
									$cName=$Row['cname'];
									$Comment=$Row['comment'];
									$cPostID=$Row['admin_panel_id'];
									?>
									<tr>
										<td style="font-size:1.1em;font-weight:bold"><?php echo $SrNo ?></td>
										<td style="text-align:left;color:#365899;font-size:1.1em;font-weight:bold"><?php echo $cName ?></td>
										<td><?php echo $DateTime ?></td>
										<td style="text-align:left"><?php if(strlen($Comment)>18) echo substr($Comment,0,18)."...";else  echo $Comment ?></td>
										<td><a class="btn btn-success" href="CommentApprove.php?ID=<?php echo $cID; ?>">Approve</a></td>
										<td><a class="btn btn-danger" href="CommentDelete.php?ID=<?php echo $cID ?>">Delete</a></td>
										<td><a class="btn btn-info" target="_blank" href="FullPost.php?ID=<?php echo $cPostID ?>">Live Preview</a></td>
									</tr>
								<?php } ?>

							</table>
						</div>

						<h1>Approved Comments</h1>
						<div class="table-responsive">
							<table class="table table-striped table-hover">
								<tr>
									<th>No.</th>
									<th style="text-align: left;">Name</th>
									<th>Date</th>
									<th style="text-align:left">Comment</th>
									<th>Approved By</th>
									<th>Revert Approve</th>
									<th>Delete</th>
									<th>Details</th>
								</tr>
								<?php  
								global $Conn;
								$QueryFetchComment="SELECT * FROM comments WHERE status='ON' ORDER BY id desc";
								$ExecuteFetchComment=mysqli_query($Conn,$QueryFetchComment);
								$SrNo=0;
								while($Row=mysqli_fetch_array($ExecuteFetchComment)){
									$SrNo++;
									$cID=$Row['id'];
									$DateTime=$Row['datetime'];
									$cName=$Row['cname'];
									$Comment=$Row['comment'];
									$ApprovedBy=$Row['approvedby'];
									$cPostID=$Row['admin_panel_id'];
									?>
									<tr>
										<td style="font-size:1.1em;font-weight:bold"><?php echo $SrNo ?></td>
										<td style="text-align:left;color:#365899;font-size:1.1em;font-weight:bold"><?php echo $cName ?></td>
										<td><?php echo $DateTime ?></td>
										<td style="text-align:left"><?php if(strlen($Comment)>18) echo substr($Comment,0,18)."...";else echo $Comment ?></td>
										<td><?php echo $ApprovedBy ?></td>
										<td><a class="btn btn-warning" href="CommentDisApprove.php?ID=<?php echo $cID ?>">Dis-Approve</a></td>
										<td><a class="btn btn-danger" href="CommentDelete.php?ID=<?php echo $cID ?>">Delete</a></td>
										<td><a class="btn btn-info" target="_blank" href="FullPost.php?ID=<?php echo $cPostID ?>">Live Preview</a></td>
									</tr>
								<?php } ?>

							</table>
						</div>
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