<?php
	session_start();
	if(isset($_COOKIE["user"]) && isset($_SESSION[$_COOKIE["user"]])){
		$email=$_COOKIE["user"];
		
		$conn=mysqli_connect("localhost","root","","mp3");
		if(strlen(trim($_REQUEST["pname"]))>0 && strlen(trim($_REQUEST["pdescr"]))>0){
			 $sn=0; 
			 $conn=mysqli_connect("localhost","root","","mp3");
		     $rs=mysqli_query($conn,"select MAX(sn) from playlist where email='$email'");
		     if($r=mysqli_fetch_array($rs)){
		         $sn=$r[0];
	         }
	         $sn++;
			$a = array(); 
	         for($i='a' ; $i<='z' ; $i++){
				array_push($a,$i);
				if($i=='z'){
					break;
				}
			}
			for($i=0 ; $i<=9 ; $i++){
				 array_push($a,$i);
				 
			}
			for($i='A' ; $i<='Z' ; $i++){
				 array_push($a,$i);
				if($i=='Z'){
				   break;
				}
			}
			 shuffle($a);    //random code generation
			 $code="";
			 for($i=0 ; $i<6 ; $i++){
				 $code =$code.$a[$i];
			 }
			 
			$code=$code."_".$sn;
			$pname=$_REQUEST["pname"];
			$pdes=$_REQUEST["pdescr"];
			
			if(mysqli_query($conn,"insert into playlist values($sn,'$code','$pname','$pdes','$email')")>0){
				echo "Playlist Created!";
			}
			else{
				//header("location:index.php?npagain=1");
				echo"Try Again!";
			}
		}
		else{
			//header("location:index.php?npempty=1");
			echo"All Field Required!";
		}
		
	}
	else{
		//header("location:index.php");
		echo"Cookie Problem";
	}
?>
