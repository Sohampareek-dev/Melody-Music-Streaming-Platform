<?php
if(isset($_COOKIE["admin"])){
	if(isset($_GET["id"]) && isset($_GET["sn"])){
		$acode=$_GET["id"];
		$sn =$_GET["sn"];
		$conn=mysqli_connect("localhost","root","","mp3");
		if(empty($_POST["stitle"]) || empty($_POST["description"])){
			header("location:editsong.php?empty=1 && id=$acode && sn=$sn");
		}
		else{
			$stitle = $_POST["stitle"];
			$des = $_POST["description"];
			$target="../album/$acode/$sn.mp3";
			if(move_uploaded_file($_FILES['song']['tmp_name'],$target)){
				if(mysqli_query($conn,"update song set title='$stitle',description='$des' where acode='$acode' AND sn=$sn")>0){
					header("location:editsong.php?success=1 && id=$acode && sn=$sn");
				}
				else{
					header("location:editsong.php?again=1 && id=$acode && sn=$sn");
				}
			}
			else{
				header("location:editsong.php?song_error=1 && id=$acode && sn=$sn");
			}
		}
	}
}
else{
	header("location:index.php");
}
?>