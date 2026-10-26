<?php
if(isset($_COOKIE["admin"])){
	if(isset($_GET["id"]) && isset($_GET["sn"])){
		$conn=mysqli_connect("localhost","root","","mp3");
		$acode=$_GET["id"];
		$sn= $_GET["sn"];
		if(mysqli_query($conn,"delete from song where acode='$acode' && sn=$sn")>0){
			unlink("../album/$acode/$sn.mp3");
			header("location:addsong.php?success_del=1 && id=$acode");
		}
		else{
			header("location:addsong.php?again_del=1 && id=$acode");
		}
	}
}
else{
	header("location:index.php");
}
?>