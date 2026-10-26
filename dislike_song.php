<?php
	session_start();
	if (isset($_COOKIE["user"]) && isset($_SESSION[$_COOKIE["user"]])) {
		$email = $_COOKIE["user"];
		if(strlen(trim($_REQUEST["id"]))>0 && strlen(trim($_REQUEST["sn"]))>0 ){
			$conn = mysqli_connect("localhost","root","","mp3");
			$acode = $_REQUEST["id"];		
			$s_sn = intval($_REQUEST["sn"]);
			mysqli_query($conn,"delete from `liked_song` where sn=$s_sn AND code='$acode' AND email='$email'");
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