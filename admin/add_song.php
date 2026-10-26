<?php
if(isset($_COOKIE["admin"])){
	if(isset($_GET["id"])){
		$acode=$_GET["id"];
		$conn=mysqli_connect("localhost","root","","mp3");
		if(empty($_POST["stitle"]) || empty($_POST["description"])){
			header("location:addsong.php?empty=1 && id=$scode");
		}
		else{
			$stitle=$_POST["stitle"];
			$des=$_POST["description"];
			
			$sn=0;
			$rs=mysqli_query($conn,"select MAX(sn) from song where acode='$acode'");
			if($r=mysqli_fetch_array($rs)){
				$sn=$r[0];
			}
			$sn++;
			
			$target="../album/$acode/$sn.mp3";
			if(move_uploaded_file($_FILES['song']['tmp_name'],$target)){
				if(mysqli_query($conn,"insert into song values($sn,'$stitle','$des','$acode')")>0){
			
					header("location:addsong.php?success=1 && id=$acode ");
				}
				else{
					header("location:addsong.php?again=1 && id=$acode ");
				}
			}
			else{
				header("location:add.php?audio_error=1 && id=$acode");
			}
				
		}
	}
}
else{
	header("location:index.php");
}
?>