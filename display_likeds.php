<?php
	session_start();
	if(isset($_COOKIE["user"]) && isset($_SESSION[$_COOKIE["user"]])){
		$email = $_COOKIE["user"];
        $conn=mysqli_connect("localhost","root","","mp3");
?>
			<div class="row mt-2">
				<div class="card">
					<div class="row p-2">
						<div class="col-3">
								<img src="likedsong1.jpg" id="<?=$r["sn"]?>" class="img-fluid alb_img">
						</div>
						<div class="col-9">
						<div class="card-body">
							<div class="alb_title">Liked Songs</div>
							<button 
								class="alb_btn albumPlayBtn"
								type="button">
								<i class="fas fa-play albumPlayIcon" style="font-size:20px"></i>
							</button>
							
						</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-lg-12">
						<table class="table table-borderless table_songs table-hover">
					<?php
						
						$rsn=0;
						$rs=mysqli_query($conn,"select * from song order by RAND()");
						while($r=mysqli_fetch_array($rs)){
							
							$acode =$r["acode"];
							$s_sn = $r["sn"];
							$rs2=mysqli_query($conn,"select * from album where code='$acode'");
							while($r2=mysqli_fetch_array($rs2)){
								$rs3=mysqli_query($conn,"select * from `liked_song` where  sn=$s_sn  AND code='$acode' AND email='$email'");
								while($r3=mysqli_fetch_array($rs3)){
									$rsn++;
					?>
						
							<tr class="song_row">
								<td id="td-<?=$r["sn"]?>" class="p-2"><?=$rsn?></td>
								<td><img src="album/<?=$r["acode"]?>.jpg" id="trackImg"><button class="song_play songBtn song" rel="<?=$sn?>" data-spath="album/<?=$r["acode"]?>/<?=$r["sn"]?>.mp3" data-image="album/<?=$r["acode"]?>.jpg" data-stitle="<?=$r["title"]?>" data-albtitle="<?=$r2["title"]?>" ><i class="fas fa-play playIcon"></i></button></td>
								<td style="cursor:pointer" class="p-2"><b id="<?=$sn?>-name" class="song songTitle" rel="<?=$sn?>" data-spath="album/<?=$r["acode"]?>/<?=$r["sn"]?>.mp3" data-image="album/<?=$r["acode"]?>.jpg" data-stitle="<?=$r["title"]?>" data-albtitle="<?=$r2["title"]?>" ><?=$r["title"]?></b>
									<br><span id="<?=$sn?>-name"><?=$r2["title"]?></span></td>
								
									<td>
										<i class="fas fa-heart fav mt-1 p-4" style="color:red;cursor:pointer;" id="<?=$r["acode"]?>" rel="<?=$r["sn"]?>"></i>
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
							</tr>
					<?php
								}
							}
						}
					?>
						</table> 
				</div>
			</div>
             <div class="row p-2 mt-2 newrelease">
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
			</div>
<?php
	}
?>