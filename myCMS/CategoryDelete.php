<?php require_once('Include/DB.php'); ?>
<?php require_once('Include/Sessions.php');?>
<?php require_once('Include/Functions.php');?>

<?php 
$IDDelete=$_GET['ID'];
if(isset($IDDelete)){
	global $Conn;
	$QueryDelete="DELETE FROM category WHERE id='$IDDelete'";
	$ExecuteDelete=mysqli_query($Conn,$QueryDelete);
	if($ExecuteDelete){
		$_SESSION['SuccessMassage']="Category Deleted Successfully!";
		Redirect_to("Categories.php");
	}
	else{
		$_SESSION["ErrorMassage"]="Something went wrong!";
		Redirect_to("Categories.php");
	}
}

?>