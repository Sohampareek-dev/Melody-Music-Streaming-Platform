<?php
	session_start();
	if (isset($_COOKIE["user"]) && isset($_SESSION[$_COOKIE["user"]])) {
		$conn = mysqli_connect("localhost","root","","mp3");
		$email = $_COOKIE["user"];
		if(strlen(trim($_REQUEST["id"]))>0 && strlen(trim($_REQUEST["name"]))>0 && strlen(trim($_REQUEST["des"]))>0) {
			$code=$_REQUEST["id"];
			$pname=$_REQUEST["name"];
			$pdes=$_REQUEST["des"];
			mysqli_query($conn,"update playlist set pname='$pname', pdescription='$pdes' where code='$code' AND email='$email'");
				echo "playlist edited";	
		}
		
	}
	?>