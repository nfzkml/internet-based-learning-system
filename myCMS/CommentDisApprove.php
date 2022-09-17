<?php require_once('Include/DB.php'); ?>
<?php require_once('Include/Sessions.php');?>
<?php require_once('Include/Functions.php');?>

<?php 
$IDComment=$_GET['ID'];
if(isset($IDComment)){
	global $Conn;
	$QueryUpdate="UPDATE comments SET status='OFF' WHERE id='$IDComment'";
	$ExecuteUpdate=mysqli_query($Conn,$QueryUpdate);
	if($ExecuteUpdate){
		$_SESSION['SuccessMassage']="Comment Dis-Approved Successfully!";
		Redirect_to("Comments.php");
	}
	else{
		$_SESSION["ErrorMassage"]="Something went wrong!";
		Redirect_to("Comments.php");
	}
}

?>