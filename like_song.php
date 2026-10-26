<?php
	session_start();
	if (isset($_COOKIE["user"]) && isset($_SESSION[$_COOKIE["user"]])) {
		$email = $_COOKIE["user"];
		if(strlen(trim($_REQUEST["id"]))>0 && strlen(trim($_REQUEST["sn"]))>0 ){
			$conn = mysqli_connect("localhost","root","","mp3");
			$acode = $_REQUEST["id"];		
			$s_sn = intval($_REQUEST["sn"]);
			mysqli_query($conn,"insert into liked_song values($s_sn,'$acode','$email')");
			echo "Liked";
		}
		
	}
	
?>