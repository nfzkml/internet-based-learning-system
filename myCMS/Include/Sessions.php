<?php 
session_start();
function ErrorMassage(){
	if(isset($_SESSION['ErrorMassage'])){
		$Output=$_SESSION['ErrorMassage'];
		$_SESSION['ErrorMassage']=null;
		return "<div class='alert alert-danger'>".$Output."</div>";
	}
}
function SuccessMassage(){
	if(isset($_SESSION['SuccessMassage'])){
		$Output=$_SESSION['SuccessMassage'];
		$_SESSION['SuccessMassage']=null;
		return "<div class='alert alert-success'>".$Output."</div>";
	}
}
?>
