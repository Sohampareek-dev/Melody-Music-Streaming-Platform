<?php
	if(isset($_COOKIE["admin"])){
    setcookie("admin","",time()-1);
	header("location:index.php");
	}
?>