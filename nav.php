 <nav id="sidebar">
        <div class="sidebar-header d-flex align-items-center justify-content-between">
            <span class="text-white nav-text">BROWSE</span>
            <button class="btn btn-link text-white p-0" id="sidebar-toggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <div class="mt-3">
            <a href="#" class="nav-link active homePage" data-title="Dashboard">
                <i class="fas fa-home"></i>
                <span class="nav-text">Home</span>
            </a>
            <!--
            <div class="has-submenu">
                <a href="#" class="nav-link" data-title="User Management">
                    <i class="fas fa-headphones-alt"></i>
                    <span class="nav-text">Songs</span>
                    <i class="fas fa-chevron-down arrow"></i>
                </a>
                <ul class="submenu">
                    <li><a href="#" class="nav-link" data-title="All Users">New Release</a></li>
                    <li><a href="#" class="nav-link" data-title="Add User">Top Trending</a></li>
                    <li><a href="#" class="nav-link" data-title="User Roles">90s old song</a></li>
                </ul>
            </div>
            -->
            <div class="has-submenu">
                <a href="#" class="nav-link" data-title="Analytics">
                    <i class="fas fa-record-vinyl"></i>
                    <span class="nav-text">Albums</span>
                    <i class="fas fa-chevron-down arrow"></i>
                </a>
				 <ul class="submenu">
				<?php
					$alb=mysqli_query($conn,"select * from album");
					while($a=mysqli_fetch_array($alb)){
				?>
                    <li><a href="#" class="nav-link loadAlbum" data-acode="<?=$a["code"]?>" data-title="<?=$a["title"]?>"><?=$a["title"]?></a></li>
				<?php
					}
				?>
				 </ul>
            </div>
			<br>
			<?php				
				if(isset($_COOKIE["user"]) && isset($_SESSION[$_COOKIE["user"]])){
					$email = $_COOKIE["user"];
			?>
			 <span class="text-white nav-text p-2">LIBRARY</span>
			
            <a href="#" class="nav-link likedSongs" data-title="Reports">
                <i class="fas fa-heart"></i>
                <span class="nav-text">Liked Songs</span>
            </a>
            <a href="#" class="nav-link likedAlbums" data-title="Reports">
                <i class="fas fa-heart"></i>
                <span class="nav-text">Liked Albums</span>
            </a>
			<a href="#" class="nav-link playlistDisplay" data-title="Reports">
                <i class="far fa-file-audio"></i>
                <span class="nav-text">My Playlists</span>
            </a>
			<?php
				}
			?>
        </div>
    </nav>