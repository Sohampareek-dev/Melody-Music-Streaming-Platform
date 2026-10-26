<?php
if(isset($_COOKIE["admin"])){
	if(isset($_GET["id"]) && isset($_GET["ccode"])){
		$code=$_GET["id"];
		$ccode=$_GET["ccode"];
		$conn=mysqli_connect("localhost","root","","mp3");
		if(empty($_POST["albtitle"]) || empty($_POST["description"])){
			header("location:editalbum.php?empty=1&id=$code");
		}
		else{
			
			$atitle=$_POST["albtitle"];
			$des=$_POST["description"];
			$target="../album/$code.jpg";
			if(move_uploaded_file($_FILES['photo']['tmp_name'],$target)){
				if(mysqli_query($conn,"update album set title='$atitle',description='$des' where code='$code'")>0){
					header("location:add.php?editsuccess=1&id=$ccode");
				}
				else{
					header("location:editalbum.php?again=1&id=$code && ccode=$ccode");
				}
			}
			else{
				header("location:editalbum.php?img_error=1&id=$code && ccode=$ccode");
			}
		}
	}
}
else{
	header("location:index.php");
}
?>