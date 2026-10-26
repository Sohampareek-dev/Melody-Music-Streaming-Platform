<?php
session_start();
?>
<div class="row mt-2">
			<div class="d-flex justify-content-between align-items-center w-100 mt-2">
				<h3>Trending Songs</h3>
				<button class="btn btn-link text-end moreAlbums"  style="text-decoration:none;">See More</button>
			</div>
				<?php	
                    $conn=mysqli_connect("localhost","root","","mp3");
					$rs=mysqli_query($conn,"select * from album order by RAND() LIMIT 6");
					while($r=mysqli_fetch_array($rs)){
						$catcode= $r["ccode"];
						$rs2=mysqli_query($conn,"select * from category where code='$catcode'");
						while($r2=mysqli_fetch_array($rs2)){
						?>
				<div class="col-6 col-md-4 col-lg-2">
					<div class="card alb_card item">
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
			<div class="row p-2 newrelease">
				<div class="d-flex justify-content-between align-items-center w-100 mt-2">
					<h3>New Release</h3>
					<button class="btn btn-link text-end moreAlbums" data-ccode="new"  style="text-decoration:none;">See More</button>
				</div>
				<?php	
					$rs=mysqli_query($conn,"select * from album order by sn desc LIMIT 6");
					while($r=mysqli_fetch_array($rs)){
						$catcode= $r["ccode"];
						$rs2=mysqli_query($conn,"select * from category where code='$catcode'");
						while($r2=mysqli_fetch_array($rs2)){
						?>
				<div class="col-6 col-md-4 col-lg-2">
					<div class="card alb_card">
						<div class="alb_img_wrap">
							<img src="album/<?=$r["code"]?>.jpg" id="<?=$r["sn"]?>" class="img-fluid alb_img">
							<button class="audio_btn loadAlbum" data-acode="<?=$r["code"]?>"><i class="fas fa-play"></i></button>
						</div>
						<div class="card-body">
							<div class="title_alb">
								<a href="#" class="alb_name loadAlbum" data-acode="<?=$r["code"]?>"><b><?=$r["title"]?></b></a>
								<br><a href="#" class="cat_name moreAlbums" data-ccode="<?=$r2["code"]?>" data-title="<?=$r2["category"]?>"><span id="<?=$sn?>-name"><?=$r2["category"]?></span></a>
							</div>
						</div>
					</div>
				</div>
					<?php
						}
					}
					?>
					
			</div><br>
			<div class="row parallax"><!-- style="margin-top:-40px"-->
				<div class="col-lg-12 text-center parallax-text">
					<h1 style="font-family:Forte Regular">Listen To Your Favourite Music</h1>
					<h3 style="font-family:Lucida Calligraphy Italic">Just For Free</h3>
				</div>
			</div><br>
			<?php
				$cat=mysqli_query($conn,"select * from category order by RAND() LIMIT 2");
				while($c=mysqli_fetch_array($cat)){
					$catcode= $c["code"];
			?>
			<div class="row">
				<div class="d-flex justify-content-between align-items-center w-100 mt-2">
					<h3><?=$c["category"]?></h3>
					<button class="btn btn-link text-end moreAlbums" data-ccode="<?=$c["code"]?>" style="text-decoration:none;">See More</button>
				</div>
				<?php	
					$rs=mysqli_query($conn,"select * from album where ccode='$c[1]' order by RAND() LIMIT 6");
					while($r=mysqli_fetch_array($rs)){
						?>
				<div class="col-6 col-md-4 col-lg-2">
					<div class="card alb_card ">
						<div class="alb_img_wrap">
							<img src="album/<?=$r["code"]?>.jpg" id="<?=$r["sn"]?>" class="img-fluid alb_img">
							<button class="audio_btn loadAlbum" data-acode="<?=$r["code"]?>"><i class="fas fa-play"></i></button>
						</div>
						<div class="card-body">
							<div class="title_alb">
								<a href="#" class="alb_name loadAlbum" data-acode="<?=$r["code"]?>" ><b><?=$r["title"]?></b></a>
								<br><a href="#" class="cat_name moreAlbums" data-ccode="<?=$c["code"]?>" data-title="<?=$c["category"]?>"><span id="<?=$sn?>-name"><?=$c["category"]?></span></a>
							</div>
						</div>
					</div>
				</div>
					<?php
					}
					?>
					
			</div>
			<?php
				}
			?>
			<div class="row mt-2">
				<div class="col-lg-5">
				<div class="row">
					<div class="col-lg-12">
						
							<div id="demo" class="carousel slide" data-bs-ride="carousel">
							  
							  <!-- The slideshow/carousel -->
							  <div class="carousel-inner">
								<?php	
								$state="active";
						$rs=mysqli_query($conn,"select * from album order by RAND()");
						while($r=mysqli_fetch_array($rs)){
							
							?>
								<div class="carousel-item <?=$state?> img-fluid">
								  <img src="album/<?=$r["code"]?>.jpg" id="<?=$r["sn"]?>" class="d-block img-fluid" style="width:100%">
								</div>
									  <?php
									  $state="";
						}
						?>
							  </div>
							  
							  <!-- Left and right controls/icons -->
							  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							  </button>
							  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
								<span class="carousel-control-next-icon"></span>
							  </button>
						
							</div>

					</div>	
				</div>
				</div>
				<div class="col-lg-7">
					<div class="row">
					<div class="col-lg-12" style="overflow-y:scroll;height:498px">
						<table class="table table-borderless table_songs table-hover" >
					<?php
						
						$sn=1;
						$rs=mysqli_query($conn,"select * from song order by RAND()");
						while($r=mysqli_fetch_array($rs)){
							$acode =$r["acode"];
							$s_sn = $r["sn"];
							$rs2=mysqli_query($conn,"select * from album where code='$acode'");
							while($r2=mysqli_fetch_array($rs2)){
					?>
						
							<tr class="song_row" >
								<td id="td-<?=$r["sn"]?>" class="p-2"><?=$sn?></td>
								<td><img src="album/<?=$r["acode"]?>.jpg" id="trackImg"><button class="song_play songBtn song" rel="<?=$sn?>" data-spath="album/<?=$r["acode"]?>/<?=$r["sn"]?>.mp3" data-image="album/<?=$r["acode"]?>.jpg" data-stitle="<?=$r["title"]?>" data-albtitle="<?=$r2["title"]?>" ><i class="fas fa-play playIcon"></i></button></td>
								<td style="cursor:pointer" class="p-2"><b id="<?=$sn?>-name" class="song songTitle" rel="<?=$sn?>" data-spath="album/<?=$r["acode"]?>/<?=$r["sn"]?>.mp3" data-image="album/<?=$r["acode"]?>.jpg" data-stitle="<?=$r["title"]?>" data-albtitle="<?=$r2["title"]?>" ><?=$r["title"]?></b>
									<br><span id="<?=$sn?>-name"><?=$r2["title"]?></span></td>
								
								<?php
									
									if(isset($_COOKIE["user"]) && isset($_SESSION[$_COOKIE["user"]])){
										$email = $_COOKIE["user"];
				
								?>
									<td>
										<?php
											$rs3=mysqli_query($conn,"select * from `liked_song` where  sn=$s_sn  AND code='$acode' AND email='$email'");
											if($r3=mysqli_fetch_array($rs3)){
										?>
										<i class="fas fa-heart fav mt-1 p-4" style="color:red;cursor:pointer;" id="<?=$r["acode"]?>" rel="<?=$r["sn"]?>"></i>
										<?php
											}
											else{
										?>
										<i class="far fa-heart unfav mt-1 p-4" style="color:red;cursor:pointer;" id="<?=$r["acode"]?>" rel="<?=$r["sn"]?>"></i>
										<?php
											}
											?>
									</td>
							
									<td>
										<div class="btn-group">
											<button type="button" class="btn" data-bs-toggle="dropdown" style="border:none" aria-expanded="false">
											<a href="#"><i class="fas fa-ellipsis-v  p-4"></i></a>
											</button>
											<ul class="dropdown-menu dropdown-menu-end">
												<li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#newplistModal">New Playlist</button></li>
												<li><button type="button" class="dropdown-item addtoplist" id="<?=$r["acode"]?>" rel="<?=$r["sn"]?>" data-bs-toggle="modal" data-bs-target="#addPlistModal">Add to Playlist</button></li>
											</ul>	
										</div>
									</td>
								<?php
									}
									else{
								?>
									<td><button class="btn btn-link p-0 " type="button" data-bs-toggle="modal" data-bs-target="#myModal2"><i class="far fa-heart mt-3 p-2"></i></button></td>
									<td><button class="btn btn-link p-0 " type="button" data-bs-toggle="modal" data-bs-target="#myModal2"> <i class="fas fa-ellipsis-v mt-3 p-2"></i></button></td>
								<?php
									}
								?>
							</tr>
					<?php
						$sn++;
							}
						}
					?>
						</table> 
					</div>
					</div>
				</div>
			</div>
		</div>