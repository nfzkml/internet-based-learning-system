<?php require_once('Include/DB.php'); ?>
<?php require_once('Include/Sessions.php');?>

<?php 
function Redirect_to($NewLocation){
	header("Location:".$NewLocation);
	exit;
}

function isLogIn(){
	if(isset($_SESSION['uID'])){
		return true;
	}
	else{
		$_SESSION["ErrorMassage"]="Login Required!";
		Redirect_to("LogIn.php");
	}
}








?>
