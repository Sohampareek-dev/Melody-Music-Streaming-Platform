 <div id="topbar" class="px-4 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <button id="mobile-toggle" class="btn btn-link text-dark me-3 d-lg-none">
                    <i class="fas fa-bars"></i>
                </button>
                <img src="admin/logo3.jpg" alt="Melody Music" class="logo-image"><h5 class="mb-0">Melody Music</h5>
				
            </div>

			<div class="position-relative">
                <input
                    type="text"
                    placeholder="Search..."
                    id="songsearch"
                    class="form-control">
                <div id="searchResult" class="search-card"></div>
            </div>
            
            <div class="d-flex align-items-center gap-3">
              <!--  <div class="dropdown">
                    <button class="btn btn-link text-dark position-relative" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-bell"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            3
                        </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">New User Registration</a></li>
                        <li><a class="dropdown-item" href="#">Server Update</a></li>
                        <li><a class="dropdown-item" href="#">New Order</a></li>
                    </ul>
                </div> -->
                <div class="dropdown">
                     <button class="btn text-dark position-relative dropdown-toggle" type="button" style="border:none;" data-bs-toggle="dropdown">
					 <?php
						if(isset($_COOKIE["user"]) && isset($_SESSION[$_COOKIE["user"]])){
							$email= $_COOKIE["user"];
					 ?>
						 <?=$email?>
					<?php
						}
						else{
					?>
							Log In/Sign Up  <i class="fa fa-user"></i>
					<?php
						}
					?>
                        <!--<img src="https://source.unsplash.com/random/100x100?portrait" alt="Profile" class="profile-image">-->
					</button>
                    <ul class="dropdown-menu dropdown-menu-end">
						<?php
							if(!(isset($_COOKIE["user"]) && isset($_SESSION[$_COOKIE["user"]]))){
						?>
                        <li><button class="btn btn-link p-0 " type="button" data-bs-toggle="modal" data-bs-target="#myModal2"><i class="dropdown-item">  Log In </i></button></li>
                        <li><button class="btn btn-link p-0 " type="button" data-bs-toggle="modal" data-bs-target="#myModal1"><i class="dropdown-item" >Sign Up</i></button></li>
						<?php
							}
							else{
						?>
                       
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
						<?php
							}
							?>
                    </ul>
                </div>	
            </div>
        </div>