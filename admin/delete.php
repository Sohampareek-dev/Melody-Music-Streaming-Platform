<?php
if(isset($_COOKIE["admin"])){
	if(isset($_GET["id"])){
		$conn=mysqli_connect("localhost","root","","mp3");
		$code=$_GET["id"];
		if(mysqli_query($conn,"delete from category where code='$code'")>0){
			header("location:dashboard.php?success_del=1");
		}
		else{
			header("location:dashboard.php?again_del=1");
		}
	}
}
else{
	header("location:index.php");
}
?>