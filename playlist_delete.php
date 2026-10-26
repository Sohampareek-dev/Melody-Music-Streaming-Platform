<?php
	session_start();
	if(isset($_COOKIE["user"]) || isset($_SESSION[$_COOKIE["user"]])){
		$conn = mysqli_connect("localhost","root","","mp3");
		$email = $_COOKIE["user"];
		if(strlen(trim($_REQUEST["id"]))>0){
			$code = $_REQUEST["id"];
			mysqli_query($conn,"delete from playlist where code='$code' AND email='$email'");
			echo "playlist deleted";
				//header("location:index.php?npdel_success");
		
		}
		
	}
	
?>