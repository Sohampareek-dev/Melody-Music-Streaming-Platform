<?php
	session_start();
	if (isset($_COOKIE["user"]) && isset($_SESSION[$_COOKIE["user"]])) {
		$email = $_COOKIE["user"];
		if(strlen(trim($_REQUEST["albCode"]))>0 && strlen(trim($_REQUEST["catCode"]))>0 ){
			$conn = mysqli_connect("localhost","root","","mp3");
			$acode = $_REQUEST["albCode"];		
			$ccode= $_REQUEST["catCode"];
			mysqli_query($conn,"insert into liked_album values('$acode','$ccode','$email')");
			echo "Liked";
		}
		else{
			header("location:index.php?empty=1");
		}
	}
	else{
		header("location:index.php");
	}
?>