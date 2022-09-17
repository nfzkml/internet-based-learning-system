<?php require_once('Include/DB.php'); ?>
<?php require_once('Include/Sessions.php');?>
<?php require_once('Include/Functions.php');?>

<?php 
$IDDelete=$_GET['ID'];
if(isset($IDDelete)){
	global $Conn;
	$QueryDelete="DELETE FROM registration WHERE id='$IDDelete'";
	$ExecuteDelete=mysqli_query($Conn,$QueryDelete);
	if($ExecuteDelete){
		$_SESSION['SuccessMassage']="Admin Deleted Successfully!";
		Redirect_to("Admins.php");
	}
	else{
		$_SESSION["ErrorMassage"]="Something went wrong!";
		Redirect_to("Admins.php");
	}
}

?>