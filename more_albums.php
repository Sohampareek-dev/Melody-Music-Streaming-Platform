<?php
	session_start();
?>

			<div class="row mt-2">
				<?php
                    $conn=mysqli_connect("localhost","root","","mp3");
					if(isset($_REQUEST["id"]) && isset($_REQUEST["heading"])){
						$id=$_REQUEST["id"];
                        $heading = $_REQUEST["heading"];
						if($id=="new"){
							$rs=mysqli_query($conn,"select * from album order by sn desc");
							$title="New Release";
						}
						else{
							$rs=mysqli_query($conn,"select * from album where ccode='$id' order by RAND()");
							$title=$heading;
						}
					}
					else{
						$rs=mysqli_query($conn,"select * from album order by RAND()");
						$title="Trending Albums";
					}
				?>
				<div class="d-flex justify-content-between align-items-center w-100 mt-2">
					<h3><?=$title?></h3>
					<button class="btn btn-link text-end homePage"   style="text-decoration:none;">See Less</button>
				</div>
				<?php	
					while($r=mysqli_fetch_array($rs)){
						$catcode= $r["ccode"];
						$rs2=mysqli_query($conn,"select * from category where code='$catcode'");
						while($r2=mysqli_fetch_array($rs2)){
						?>
				<div class="col-lg-2 col-6">
					<div class="card alb_card">
						<div class="alb_img_wrap">
							<img src="album/<?=$r["code"]?>.jpg" id="<?=$r["sn"]?>" class="img-fluid alb_img">
							<button class="audio_btn loadAlbum" data-acode="<?=$r["code"]?>"><i class="fas fa-play"></i></button>
						</div>
						<div class="card-body">
							<div class="title_alb">
								<a href="#" class="alb_name loadAlbum" data-acode="<?=$r["code"]?>" ><b><?=$r["title"]?></b></a>
								<br><a href="#" class="cat_name moreAlbums" data-ccode="<?=$r2["code"]?>" data-title="<?=$r2["category"]?>"><span id="<?=$sn?>-name"><?=$r2["category"]?></span></a>
							</div>
						</div>
					</div>
				</div>
					<?php
						}
					}
					?>
					
			</div>
   