<?php
if(isset($_COOKIE["admin"])){
	if(isset($_GET["id"])){
		$code=$_GET["id"];
		$conn=mysqli_connect("localhost","root","","mp3");
		if(empty($_POST["category"])){
			header("location:edit.php?empty=1 && id=$code");
		}
		else{
			
			$cat=$_POST["category"];
			if(mysqli_query($conn,"update category set category='$cat' where code='$code'")>0){
				header("location:edit.php?success=1 && id=$code");
			}
			else{
				header("location:edit.php?again=1 && id=$code");
			}
			
		}
	}
}
else{
	header("location:index.php");
}
?>