<?php require_once('Include/DB.php'); ?>
<?php require_once('Include/Sessions.php');?>
<?php require_once('Include/Functions.php');?>

<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
	<link rel="icon" type="image/icon" href="Images/Red.png" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/PublicStyle.css">
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
					<li><a href="DashBoard.php" target="_blank">Server Side</a></li>
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
					post LIKE '%$Search%' ORDER BY id desc";
				}
				elseif(isset($_GET['Author'])){
					$uName=$_GET['Author'];
					$QuerySelect="SELECT * FROM admin_panel WHERE author='$uName' ORDER BY id desc";
				}
				elseif(isset($_GET['Category'])){
					$cName=$_GET['Category'];
					$QuerySelect="SELECT * FROM admin_panel WHERE category='$cName' ORDER BY id desc";
				}
				elseif(isset($_GET['Page'])){
					$PageNo=$_GET['Page'];
					$PostPerPage=5;
					if($PageNo<=0)
						$ShowPostFrom=0;
					else
						$ShowPostFrom=($PageNo*$PostPerPage)-$PostPerPage;
					$QuerySelect="SELECT * FROM admin_panel ORDER BY id desc 
					LIMIT $ShowPostFrom,$PostPerPage";
				}
				else{
					$QuerySelect="SELECT * FROM admin_panel ORDER BY id desc";
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
						<a href="FullPost.php?ID=<?php echo $ID ?>"><img style="cursor: pointer;" class="img-responsive" src="Upload/<?php echo $File ?>" alt=""></a>
						<div class="caption">
							<h1 class="heading">
								<a href="FullPost.php?ID=<?php echo $ID ?>"><?php echo $Title; ?></a>
							</h1 >
							<p class="description">Category: <?php echo $Category;?> Published on <?php echo $DateTime; ?>Author: <?php echo $Author; ?>
							<?php 
							global $Conn;
							$QueryCntApproved="SELECT COUNT(*) FROM comments WHERE admin_panel_id='$ID' AND status='ON'";
							$ExecuteCntApproved=mysqli_query($Conn,$QueryCntApproved);
							$Row=mysqli_fetch_array($ExecuteCntApproved);
							$TotalApproved=array_shift($Row);
							if($TotalApproved>0){
								?>
								<span class="badge pull-right">
									<?php echo "Comments: ".$TotalApproved ?>
								</span>
							<?php } ?>
						</p>
						<p class="post"><?php 
						if(strlen($Post)>150){
							echo substr($Post, 0,150)."...";
							echo '<div style="overflow: hidden;"><a href="FullPost.php?ID='.$ID.'">
							<span style="float:right;" class="btn btn-info">Read More »</span>
							</a></div>';
						} 
						else
							echo $Post; 
						?></p>

					</div>
				</div>
			<?php } ?>

			<nav>
				<ul class="pagination pagination-lg">
					<?php  
					if(isset($PageNo) && $PageNo>1){
						?>
						<li><a href="Blog.php?Page=<?php echo $PageNo-1 ?>"><span>&laquo;</span></a></li>
					<?php } ?>
					<?php 
					global $Conn;
					$QueryCount="SELECT COUNT(*) FROM admin_panel";
					$ExecuteCount=mysqli_query($Conn,$QueryCount);
					$Row=mysqli_fetch_array($ExecuteCount);
					$TotalPost= array_shift($Row);
					$PostPerPage=5;
					$TotalPages=ceil($TotalPost/$PostPerPage);
					for($i=1;$i<=$TotalPages;$i++){
						if(isset($PageNo)){
							if($i==$PageNo){
								?>
								<li class="active">
									<a href="Blog.php?Page=<?php echo $i ?>">
										<?php echo $i ?>
									</a>
								</li>
							<?php }else{ ?>
								<li>
									<a href="Blog.php?Page=<?php echo $i ?>">
										<?php echo $i ?>
									</a>
								</li>
							<?php } ?>
						<?php } ?>
					<?php } ?>
					<?php if(isset($PageNo) && $PageNo+1<=$TotalPages){ ?>
						<li><a href="Blog.php?Page=<?php echo $PageNo+1 ?>"><span>&raquo;</span></a></li>
					<?php } ?>
				</ul>
			</nav>

		</div>
		<div class="col-sm-3 col-sm-offset-1">
			<img style="margin-left: -12px" class="img-responsive img-rounded" src="Images/Us2.png" alt="">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda iure aliquam tenetur obcaecati reprehenderit, voluptatem, quo suscipit excepturi ipsam odit. Quibusdam maiores, quisquam ad. Cum, voluptatem, nihil. Nostrum facilis, doloribus.</p>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title">Authors</h2>
				</div>
				<div class="panel-body">
					<?php  
					global $Conn;
					$QueryCategory="SELECT * FROM registration ORDER BY id desc";
					$ExecuteCategory=mysqli_query($Conn,$QueryCategory);
					while($Row=mysqli_fetch_array($ExecuteCategory)){
						$uName=$Row['username'];
						?>
						<a href="Blog.php?Author=<?php echo $uName ?>" class="heading"> <?php echo $uName ?></a><br>
					<?php } ?>
				</div>
				<div class="panel-footer"></div>
			</div>

			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title">Categories</h2>
				</div>
				<div class="panel-body">
					<?php  
					global $Conn;
					$QueryCategory="SELECT * FROM category ORDER BY id desc";
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
					$QueryRecent="SELECT * FROM admin_panel ORDER BY id desc LIMIT 0,5";
					$ExecuteRecent=mysqli_query($Conn,$QueryRecent);
					while($Row=mysqli_fetch_array($ExecuteRecent)){
						$ID=$Row['id'];
						$DateTime=$Row['datetime'];
						$Title=$Row['title'];
						$File=$Row['file'];
						?>
						<div>
							<img width="90px" class="img-responsive img-thumbnail pull-left" src="Upload/<?php echo $File ?>" alt="">
							<div class="captionRecent">
								<a href="FullPost.php?ID=<?php echo $ID ?>"><p class="heading"><?php echo $Title; ?></p ></a>
								<p class="description"><?php echo substr($DateTime,0,9);?></p>
							</div>
							<hr>	
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