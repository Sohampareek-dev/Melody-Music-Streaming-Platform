<?php
	session_start();
	$conn=mysqli_connect("localhost","root","","mp3");
	if(strlen(trim($_REQUEST["email"]))>0 && strlen(trim($_REQUEST["pass"]))>0){
	
		$email=$_REQUEST["email"];
		$pass=$_REQUEST["pass"];
		
		$rs=mysqli_query($conn,"select * from users where email='$email'");
		if($r=mysqli_fetch_array($rs)){
			if($r["email"]==$email){
				if($r["password"]==$pass){
					setcookie("user",$email,time()+3600*24*7);
					$_SESSION[$email] = $pass;
					echo "User Login ";
				}
				else{
					echo "Invalid Password";
				}
			}
			else{
				echo "Invalid Email";
			}
			
		}
		else{
			echo "Invalid Email or Password";
		}
	}
?>