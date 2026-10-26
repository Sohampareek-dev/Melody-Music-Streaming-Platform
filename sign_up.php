<?php
	$conn=mysqli_connect("localhost","root","","mp3");
	if(strlen(trim($_REQUEST["email"]))>0 && strlen(trim($_REQUEST["pass"]))>0){
		$email=$_REQUEST["email"];
		$pass=$_REQUEST["pass"];
		if(mysqli_query($conn,"insert into users values('$email','$pass')")>0){
			echo "success";
		}
		else{
			echo "again";
		}
	}
?>
