<?php
if(isset($_COOKIE["admin"])){
	if(isset($_GET["id"]) && isset($_GET["ccode"])){
		$conn=mysqli_connect("localhost","root","","mp3");
		$code=$_GET["id"];
		$ccode=$_GET["ccode"];
		if(mysqli_query($conn,"delete from album where code='$code' AND ccode='$ccode'")>0){
			rmdir("../album/$code");
			unlink("../album/$code/$code.jpg");
			header("location:add.php?success_del=1 && id=$ccode");
		}
		else{
			header("location:add.php?again_del=1 && id=$ccode");
		}
	}
}
else{
	header("location:index.php");
}
?>