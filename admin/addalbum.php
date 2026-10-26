<?php
if(isset($_COOKIE["admin"])){
	$conn=mysqli_connect("localhost","root","","mp3");
	if(isset($_GET["id"])){
			$ccode=$_GET["id"];
		if(empty($_POST["albtitle"]) || empty($_POST["description"])){
			header("location:add.php?empty=1 && id=$ccode");
		}
		else{
			$atitle=$_POST["albtitle"];
			$des=$_POST["description"];
			
			
			$sn=0;
			$rs=mysqli_query($conn,"select MAX(sn) from album");
			if($r=mysqli_fetch_array($rs)){
				$sn=$r[0];
			}
			$sn++;
			$a=array();
			for($i='A';$i<='Z';$i++){
				array_push($a,$i);
				if($i=='Z')
					break;
			}
			for($i='a';$i<='z';$i++){
				array_push($a,$i);
				if($i=='z')
					break;
			}
			for($i=0;$i<=9;$i++){
				array_push($a,$i);
			}
			shuffle($a);
			$code="";
			for($i=0;$i<7;$i++){
				$code.=$a[$i];
			}
			$code=$code."_".$sn;
			$target="../album/$code.jpg";
			if(move_uploaded_file($_FILES['photo']['tmp_name'],$target)){
				if(mysqli_query($conn,"insert into album values($sn,'$code','$atitle','$des','$ccode')")>0){
					mkdir("../album/$code");
					header("location:add.php?success=1 && id=$ccode ");
				}
				else{
					header("location:add.php?again=1 && id=$ccode ");
				}
			}
			else{
				header("location:add.php?img_error=1 && id=$code");
			}
		}
			
	}
}
else{
	header("location:index.php");
}
?>