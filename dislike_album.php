<?php
	session_start();
	if (isset($_COOKIE["user"]) && isset($_SESSION[$_COOKIE["user"]])) {
		$email = $_COOKIE["user"];
		if(strlen(trim($_REQUEST["albCode"]))>0 && strlen(trim($_REQUEST["catCode"]))>0 ){
			$conn = mysqli_connect("localhost","root","","mp3");
			$acode = $_REQUEST["albCode"];		
			$ccode= $_REQUEST["catCode"];
			mysqli_query($conn,"delete from `liked_album` where acode='$acode' AND ccode='$ccode' AND email='$email'");
			echo"Disliked";
		}
		else{
			header("location:index.php?empty=1");
		}
	}
	else{
		header("location:index.php");
	}
?>