<?php
	session_start();
	if(isset($_COOKIE["user"]) && isset($_SESSION[$_COOKIE["user"]])){
		$email = $_COOKIE["user"];
        $conn=mysqli_connect("localhost","root","","mp3");
?>
	

			<div class="row mt-2 p-2">
                <h3>MY PLAYLISTS</h3>
				<?php	
					$rs=mysqli_query($conn,"select * from playlist where email='$email' order by RAND()");
					while($r=mysqli_fetch_array($rs)){
						?>
				<div class="col-6 col-md-4 col-lg-2">
					<div class="card alb_card item">
						<div class="alb_img_wrap">
							<img src="plist3.jpg" id="<?=$r["sn"]?>" class="img-fluid alb_img">
							<button class="audio_btn loadPListSongs" data-pcode="<?=$r["code"]?>"><i class="fas fa-play"></i></button>
						</div>
						<div class="card-body">
							<div class="title_alb">
								<a href="plist_song.php?id=<?=$r["code"]?>" class="alb_name"><b><?=$r["pname"]?></b></a>
							</div>
						</div>
					</div>
				</div>
					<?php
						}
					?>
			</div>
			
                <div class="row">
					<div class="col-lg-12">
                        <h3>Songs You May Like</h3>
						<table class="table table-borderless table_songs table-hover" >
					<?php
						
						$sn=1;
						$rs=mysqli_query($conn,"select * from song order by RAND() LIMIT 5");
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
									<br><span id="<?=$sn?>-name"><?=$r2["title"]?></span>
								</td>
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
							</tr>
					<?php
						$sn++;
							}
						}
					?>
						</table> 
					</div>
				</div>
<?php
	}
	?>