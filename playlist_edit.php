<?php
session_start();
if(isset($_COOKIE["user"]) && isset($_SESSION[$_COOKIE["user"]])){
	$email=$_COOKIE["user"];
	
	if(strlen(trim($_REQUEST["id"]))>0){
		$code=$_REQUEST["id"];
?>
						<div class="col-lg-6 p-4">
							<?php
								if(isset($_GET["empty"])){
									echo "<h4 style='color:red'>All feild required</h4>";
								}
								else if(isset($_GET["success"])){
									echo "<h4 style='color:blue'>Playlist Edited</h4>";
								}
								if(isset($_GET["again"])){
									echo "<h4 style='color:brown'>try again</h4>";
								}
								
								$conn=mysqli_connect("localhost","root","","mp3");
								 $rs=mysqli_query($conn,"select * from playlist where code='$code' AND email='$email'");
								 while($r=mysqli_fetch_array($rs)){
							?>											
																
								<label><b>Name :</b></label>
								<input type="text" id="pname" value="<?=$r["pname"]?>" class="form-control"><br>
								<label><b>Description :</b></label>
								<input type="text" id="pdescr" value="<?=$r["pdescription"]?>" class="form-control"><br>
								<input type="submit" class="btn btn-outline-primary plist_update" id="<?=$r["code"]?>" value="Update"><br>
							<?php
								 }
								 ?>
						</div>
						<div class="col-lg-6" style="background-image: url(editplist1.jpg);background-size: cover;">

						</div>
		
<?php
	}
}
?>
