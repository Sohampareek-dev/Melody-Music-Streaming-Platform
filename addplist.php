<?php
	session_start();
	if (isset($_COOKIE["user"]) && isset($_SESSION[$_COOKIE["user"]])) {
		$conn = mysqli_connect("localhost","root","","mp3");
		$email = $_COOKIE["user"];
		if(strlen(trim($_REQUEST["id"]))>0 && strlen(trim($_REQUEST["ssn"]))>0 && strlen(trim($_REQUEST["pid"]))>0){
			$code=$_REQUEST["id"];
			$ssn = $_REQUEST["ssn"];
			$pcode=$_REQUEST["pid"];
				
				if(mysqli_query($conn,"insert into playlist_song values($ssn,'$code','$pcode','$email')")>0){
					echo "success";
				}
				else{
					echo "again";
				}
		}
	}
	?>