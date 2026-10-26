<?php
    session_start();
	if(isset($_COOKIE["user"]) && isset($_SESSION[$_COOKIE["user"]])){
	unset($_SESSION[$_COOKIE["user"]]);
    setcookie("user","",time()-1);
	header("location:index.php");
	}
?>