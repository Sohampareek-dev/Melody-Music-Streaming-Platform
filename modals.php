	<!-- The Registration Modal -->
				<div class="modal fade" id="myModal1">
				  <div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
					
						 <!-- Modal Header -->
						<div class="modal-header">
							<h4 class="modal-title">SIGN UP</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>

					  <!-- Modal body -->
					  <div class="modal-body">
						<div class="container-fluid p-2">
							<div class="row justify-content-center">
								<div class="col-lg-6">
										<b>Email :</b><br>
										<input type="email" id="email" placeholder="Enter Email" class="form-control">
										<b>Password :</b><br>
										<input type="password" id="pass" placeholder="Enter Password" class="form-control">
										<br>
										<input type="submit" value="Create" class="btn btn-primary register">
									<br><br>
									<span>Already have a Account ?<button class="btn btn-link p-0 " type="button" data-bs-toggle="modal" data-bs-target="#myModal2"> Log In </button></span>
								</div>
								<div class="col-lg-6 " style="background-image: url(usermusic2.jpg);background-size: cover;">
								</div>
							</div>
						</div>
					  </div>
					</div>
				  </div>
				</div>
				
				<!-- The Login Modal -->
				<div class="modal fade" id="myModal2">
				  <div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
					
						 <!-- Modal Header -->
						<div class="modal-header">
							<h4 class="modal-title">SIGN IN</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>

					  <!-- Modal body -->
					  <div class="modal-body">
						<div class="container-fluid p-2">
							<div class="row justify-content-center">
								<div class="col-lg-6">
										<b>Email :</b><br>
										<input type="email" id="nemail" placeholder="Enter Your Email" class="form-control">
										<b>Password :</b><br>
										<input type="password" id="npass" placeholder="Enter Your Password" class="form-control">
										<br>
										<input type="submit" value="Login" class="btn btn-primary login"><br><br>
									<span>Create a new Account ?<button class="btn btn-link p-0 " type="button" data-bs-toggle="modal" data-bs-target="#myModal1"> Sign Up </button></span>
								</div>
								<div class="col-lg-6" style="background-image: url(usermusic3.jpg);background-size: cover;">

								</div>
							</div>
						</div>
					  </div>
					</div>
				  </div>
				</div>
				
				<!-- The Create New Playlist Modal -->
										<div class="modal fade" id="newplistModal">
										  <div class="modal-dialog modal-dialog-centered">
											<div class="modal-content">
											
												 <!-- Modal Header -->
												<div class="modal-header">
													<h4 class="modal-title">CREATE NEW PLAYLIST</h4>
													<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
												</div>

											  <!-- Modal body -->
											  <div class="modal-body">
												<div class="container-fluid ">
													<div class="row plist_create_edit justify-content-center">
														<div class="col-lg-10 p-4">
					
																<?php
																	if(isset($_GET["npempty"])){
																		echo "<h4 style='color:red'>All feild required</h4>";
																	}
																	else if(isset($_GET["npsuccess"])){
																		echo "<h4 style='color:blue'>Playlist Created</h4>";
																	}
																	if(isset($_GET["npagain"])){
																		echo "<h4 style='color:brown'>try again</h4>";
																	}
																?>
																
																	<label><b>Name :</b></label>
																	<input type="text" id="npname" placeholder="Enter Playlist Name" class="form-control"><br>
																	<label><b>Description :</b></label>
																	<input type="text" id="npdescr" placeholder="Enter Playlist Description" class="form-control"><br>
																	<input type="submit" class="btn btn-outline-primary plist_create" value="Create"><br>
															
														</div>
														<!--<div class="col-lg-6 p-4" style="background-image: url(nplist1.jpg);background-size: cover;">

														</div>-->
													</div>
													<div class="row mt-2 ">
														<div class="col-lg-12 justify-content-center">
															<b><h3>Created Playlists</h3></b>		
																<table class="table table_playlist table-borderless table-hover">
																	<?php
																		if(isset($_GET["npdel_again"])){
																			echo "<h4 style='color:red'>Playlist Not Deleted...Try Again !</h4>";
																		}
																		else if(isset($_GET["npdel_success"])){
																			echo "<h4 style='color:blue'>Playlist Deleted</h4>";
																		}
																		
																	 $conn=mysqli_connect("localhost","root","","mp3");
																	 $rs=mysqli_query($conn,"select * from playlist where email='$email' order by sn");
																	 while($r=mysqli_fetch_array($rs)){
																	?>
																		<tr>
																			<td><?=$r["sn"]?></td> 
																			<td><?=$r["pname"]?></td> 
																			<td><?=$r["pdescription"]?></td>
																			<td><i class="fa fa-edit plist_edit" id="<?=$r["code"]?>" style="color:green"></i></td>
																			<td><i class="fa fa-trash plist_delete" id="<?=$r["code"]?>" style="color:red"></i></td>
																		</tr>	
																	<?php
																		 }
																	?>
																</table>
														</div>
													</div>
												</div>
											  </div>
											</div>
										  </div>
										</div>
										
						<!-- The Add to Playlist Modal -->
										<div class="modal fade" id="addPlistModal">
										  <div class="modal-dialog modal-dialog-centered">
											<div class="modal-content">
											
												 <!-- Modal Header -->
												<div class="modal-header">
													<h4 class="modal-title">ADD TO PLAYLIST</h4>
													<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
												</div>

											  <!-- Modal body -->
											  <div class="modal-body">
												<div class="container-fluid">
													<div class="row justify-content-center">
														<div class="col-lg-10 p-4">
															
																<b>Playlist :</b><br>
																<select id="playlist" class="form-control">
																	<?php
																		$pl = mysqli_query($conn,"select * from playlist where email='$email'");
																		while($p=mysqli_fetch_array($pl)){
																	?>
																	<option value="<?=$p["code"]?>"><?=$p["pname"]?></option>
																	<?php
																		}
																	?>
																</select><br>
																
																<input type="submit" value="Add" class="btn btn-primary songaddtoplist">
															<br><br>
															<span>Create a new Playlist ?<button type="button" class="dropdown-item btn-link" data-bs-toggle="modal" data-bs-target="#newplistModal" style="color:blue;">New Playlist</button></span><br>
														</div>
														<!--<div class="col-lg-6 mb-2" style="background-image: url(addtoplist1.jpg);background-size: cover;">

														</div>-->
													</div>
												</div>
											  </div>
											</div>
										  </div>
										</div>