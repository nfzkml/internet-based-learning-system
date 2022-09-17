<?php require_once('Include/Sessions.php');?>
<?php require_once('Include/Functions.php');?>

<?php 
$_SESSION["uID"]=null;
session_destroy();
Redirect_to("LogIn.php");
?>