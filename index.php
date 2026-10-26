<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In/Sign Up</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	
	<!-- Basic stylesheet -->
	<link rel="stylesheet" href="owl-carousel/owl.carousel.css">
	 
	<!-- Default Theme -->
	<link rel="stylesheet" href="owl-carousel/owl.theme.css">
	 
	<!-- You can use latest version of jQuery  -->
	<script src="jquery-1.9.1.min.js"></script>
	 
	<!-- Include js plugin -->
	<script src="assets/owl-carousel/owl.carousel.js"></script>
	
	<!-- Sweet Aleart -->
	 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        :root {
            --sidebar-width: 250px;
            --sidebar-collapsed-width: 70px;
            --topbar-height: 60px;
        }

        body {
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        /* Sidebar Styles */
        #sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: #2c3e50;
            transition: all 0.3s ease;
            z-index: 1000;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: #34495e #2c3e50;
        }

        /* Webkit browsers custom scrollbar */
        #sidebar::-webkit-scrollbar {
            width: 6px;
        }

        #sidebar::-webkit-scrollbar-track {
            background: #2c3e50;
        }

        #sidebar::-webkit-scrollbar-thumb {
            background-color: #34495e;
            border-radius: 10px;
            border: 2px solid #2c3e50;
        }

        #sidebar::-webkit-scrollbar-thumb:hover {
            background-color: #3d566e;
        }

        #sidebar.collapsed {
            width: var(--sidebar-collapsed-width);
        }

        #sidebar .nav-link {
            color: #fff;
            padding: 15px 20px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 10px;
            position: relative;
        }

        #sidebar .nav-link:hover {
            background: #34495e;
        }

        #sidebar .nav-link i {
            min-width: 25px;
        }

        #sidebar.collapsed .nav-text,
        #sidebar.collapsed .submenu,
        #sidebar.collapsed .arrow {
            display: none;
        }

        #sidebar .sidebar-header {
            padding: 15px;
            background: #243442;
            height: var(--topbar-height);
        }

        /* Submenu styles */
        .has-submenu {
            position: relative;
        }

        .has-submenu .arrow {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            transition: transform 0.3s;
        }

        .has-submenu.active .arrow {
            transform: translateY(-50%) rotate(180deg);
        }

        .submenu {
            list-style: none;
            padding: 0;
            margin: 0;
            background: #243442;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        .submenu.show {
            max-height: 500px;
        }

        .submenu .nav-link {
            padding-left: 50px;
            font-size: 0.9rem;
        }

        #sidebar .nav-link.active {
            background: #34495e;
        }

        #sidebar .nav-link:hover .submenu {
            display: block;
        }

        /* Hover effect for collapsed sidebar */
        #sidebar.collapsed .nav-link:hover {
            position: relative;
        }

        #sidebar.collapsed .nav-link:hover::after {
            content: attr(data-title);
            position: absolute;
            left: 100%;
            top: 0;
            background: #34495e;
            padding: 15px 20px;
            width: 200px;
            color: white;
            z-index: 1001;
        }

        #sidebar.collapsed .has-submenu:hover .submenu {
            display: block;
            position: absolute;
            left: 100%;
            top: 100%;
            width: 200px;
            background: #34495e;
        }

        /* Main Content Styles */
        #main-content {
            margin-left: var(--sidebar-width);
            transition: margin-left 0.3s;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        #main-content.expanded {
            margin-left: var(--sidebar-collapsed-width);
        }

        /* Topbar Styles */
        #topbar {
            height: var(--topbar-height);
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        /* Card Styles */
        .dashboard-card {
            transition: transform 0.2s;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
        }

        /* Chart container */
        .chart-container {
            height: 300px;
            width: 100%;
        }

        /* Active link */
        #sidebar .nav-link.active {
            background: #34495e;
        }

        /* Profile image */
        .profile-image {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
		
		/* Logo image */
        .logo-image {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* Gallery Styles */
        .gallery-img-container {
            position: relative;
            padding-top: 100%;
            overflow: hidden;
        }

        .gallery-img-container img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-img-container:hover img {
            transform: scale(1.05);
        }

        #galleryGrid .card {
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        #galleryGrid .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }

        /* Mobile Styles */
        @media (max-width: 991.98px) {
            #sidebar {
                transform: translateX(-100%);
                position: fixed;
                top: 0;
                left: 0;
                height: 100vh;
                z-index: 1050;
                box-shadow: 0 0 15px rgba(0,0,0,0.2);
            }

            #sidebar.mobile-show {
                transform: translateX(0);
            }

            #main-content {
                margin-left: 0 !important;
                width: 100%;
            }

            #main-content.expanded {
                margin-left: 0 !important;
            }

            .mobile-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: 1040;
            }

            .mobile-overlay.show {
                display: block;
            }

            #sidebar-toggle {
                display: none;
            }

            #mobile-toggle {
                display: block;
            }
        }

        @media (min-width: 992px) {
            #mobile-toggle {
                display: none;
            }

            .mobile-overlay {
                display: none !important;
            }
        }
	
	.footer {
    background: #f8f9fa;
    padding: 40px 0 20px;
    border-top: 1px solid #eee;
}

.footer-brand {
    font-size: 1.5rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 15px;
}

.footer-text {
    color: #6c757d;
    font-size: 0.9rem;
    max-width: 300px;
}

.social-links {
    margin: 20px 0;
}

.social-link {
    color: #6c757d;
    margin-right: 20px;
    font-size: 1.2rem;
    transition: color 0.3s ease;
}

.social-link:hover {
    color: #0d6efd;
}

.footer-links {
    display: flex;
    gap: 20px;
    margin: 0;
    padding: 0;
    list-style: none;
}

.footer-links a {
    color: #6c757d;
    text-decoration: none;
    font-size: 0.9rem;
    transition: color 0.3s ease;
}

.footer-links a:hover {
    color: #0d6efd;
}

.copyright {
    color: #6c757d;
    font-size: 0.85rem;
    margin-top: 20px;
    padding-top: 20px;
    border-top: 1px solid #eee;
}
	/* Phone and tablet adjustments */
	@media (max-width: 768px) {
		.alb_card {
			height: 100%;
		}

		.audio_btn {
			width: clamp(36px, 10vw, 46px);
			font-size: 16px;
		}

		.fa-play,
		.fa-pause {
			font-size: 18px;
		}

		.parallax .parallax-text {
			margin-top: 30%;
		}

		#songsearch {
			width: 70%;
		}

		.audio-player {
			flex-direction: column;
			align-items: stretch;
			padding: 10px;
		}

		.player-left,
		.player-center {
			width: 100%;
		}

		.controls {
			justify-content: center;
		}
	}
	
	.alb_title{
		font-family:Bookman Old Style;
		cursor:pointer;
		color:black;
		text-decoration:none;
	}
	.parallax {
		margin-top:-40px;
	  /* The image used */
	  background-image: url("parallax1.jpg");

	  /* Set a specific height */
	  min-height: 500px; 

	  /* Create the parallax scrolling effect */
	  background-attachment: fixed;
	  background-position: center;
	  background-repeat: no-repeat;
	  background-size: cover;
	}
	.parallax .parallax-text{
		margin-top:19%;
		color:white;
	}
	#owl-demo .item{
	  margin: 3px;
	}
	#owl-demo .item img{
	  display: block;
	  width: 100%;
	  height: auto;
	}
	/* Album Card Styles */
	.alb_card {
		height: 93%;
		width: 100%;
		border-radius: 10px;
		border: none;
		overflow: visible;
		box-shadow:
			rgba(136, 165, 191, 0.48) 6px 2px 16px 0px,
			rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;
		transition: background-color 0.3s ease;
	}
	.alb_card:hover {
    border: none;
    background-color: #d7dbdb;
	}

	/* .newrelease{
		margin-top:-3vh;
	} */

	/* Album Image Wrapper */
	.alb_img_wrap {
		position: relative;
		width: 100%;
		aspect-ratio: 1 / 1;
		overflow: hidden;
		border-radius: 15px;
	}

	/* Album Image */
	.alb_img {
		display: block;
		width: 100%;
		height: 100%;
		object-fit: cover;
		border-radius: 15px;
		padding: 8px;
		transition: transform 0.3s ease, opacity 0.3s ease;
	}
	.alb_card:hover .alb_img {
    transform: scale(1.04);
    opacity: 0.8;
	}

	/* Responsive Play Button */
	.audio_btn {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);

    width: clamp(36px, 4vw, 50px);
    aspect-ratio: 1 / 1;
    height: auto;

    display: flex;
    align-items: center;
    justify-content: center;

    padding: 0;
    border: none;
    border-radius: 50%;
    background-color: black;
    color: white;

    font-size: clamp(14px, 1.5vw, 20px);
    text-align: center;
    text-decoration: none;

    cursor: pointer;
    opacity: 0;
    z-index: 2;

    transition:
        opacity 0.2s ease,
        background-color 0.2s ease,
        transform 0.2s ease;
	}

	/* Show button when hovering over album */
	.alb_card:hover .audio_btn,
	.alb_card:focus-within .audio_btn {
		opacity: 1;
	}

	/* Play Button Hover Effect */
	.audio_btn:hover {
		background-color: #198754;
		transform: translate(-50%, -50%) scale(1.06);
	}

	/* Play and Pause Icons */
	.fa-play,
	.fa-pause {
		font-size: 20px;
	}

	/* Album Title */
	.alb_title {
		font-family: "Bookman Old Style", serif;
		cursor: pointer;
		color: black;
		text-decoration: none;
	}

	.alb_name {
		font-family: "Cambria Math", serif;
		cursor: pointer;
		color: black;
		text-decoration: none;
	}

	.cat_name {
		cursor: pointer;
		color: black;
		text-decoration: none;
	}

	.title_alb {
		position: relative;
		top: 0;
	}



	h3{
		font-family:Britannic Bold;
		font-weight:70%;
	}
	.table_songs{
		padding:9px;
		.song_row{
			#trackImg{
				width:67px;
				height:67px;
				border-radius:5px;
				margin-top:2px;
			}
			.fa-play{
				font-size:15px;
			}
			.fa-pause{
				font-size:15px;
			}
			.song_play{
				width:35px;
				height:35px;
				border-radius:50%;
				border:none;
				background-color:black;
				color: white;
				padding:10px;
				text-align:center;
				text-decoration:none;
				display:inline-block;
				font-size:1px;
				position:relative;
				top:2px;
				left:-51px;
				cursor:pointer;
				opacity:0;
			}
			.fa-heart{
		        color:red;
			}
		}
		.song_row:hover .song_play{
			opacity:1;
		}
		.song_row.activeSong td{
			background:#d7f5d7 !important;
		}
		.song_row.activeSong .song_play{
			opacity:1;
		}
	}
	.audio-player{
		position:fixed;
		bottom:0;
		left:0;
		width:100%;
		background:#84D7F0;
		display:flex;
		align-items:center;
		justify-content:space-between;
		padding:10px 20px;
		gap:20px;
		z-index:1000;

		.player-left{
			display:flex;
			align-items:center;
			gap:15px;
			width:280px;
			min-width:220px;
		}

		#PlayerSongImg{
			width:60px;
			height:60px;
			border-radius:8px;
			object-fit:cover;
		}

		.song-info{
			display:flex;
			flex-direction:column;
			overflow:hidden;
		}

		#trackTitle{
			white-space:nowrap;
			overflow:hidden;
			text-overflow:ellipsis;
			font-weight:bold;
		}

		#albTrackTitle{
			white-space:nowrap;
			overflow:hidden;
			text-overflow:ellipsis;
			font-size:13px;
		}

		.player-center{
			flex:1;
		}

		.time-row{
			display:flex;
			align-items:center;
			gap:10px;
		}

		#progressBar{
			flex:1;
		}

		.controls{
			display:flex;
			justify-content:center;
			align-items:center;
			gap:20px;
			margin-top:8px;
		}

		.controls button{
			border:none;
			background:none;
		}

		.controls i{
			font-size:28px;
		}
	}
	
	//for album page 
	.alb_img{
		object-fit:cover;
		width:270px;
		height:270px;
		 transition: transform 0.4s ease-in-out;
		 border-radius:15px;
		 padding: 8px 8px 8px 8px;
	}
	.alb_img:hover{
		 transform: scale(1.05);
	}
	.alb_btn{
		width:50px;
		height:50px;
		border-radius:50%;
		border:none;
		background-color:black;
	    color: white;
		padding:15px;
	    text-align:center;
		text-decoration:none;
		display:inline-block;
		font-size:10px;
	    cursor:pointer;
	}
	.alb_title{
		font-size: 18px;
		font-weight: 700;
		color: #212529;
		margin-bottom: 5px;
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsis;
		cursor: pointer;
		transition: color 0.3s ease;
	}

	//for searchbar
	.position-relative{
		position:relative;
	}

	.search-card{
		position:absolute;
		top:45px;
		left:0;
		width:100%;
		background:white;
		border-radius:10px;
		box-shadow:0 4px 15px rgba(0,0,0,.2);
		max-height:350px;
		overflow-y:auto;
		display:none;
		z-index:9999;
	}

	.search-item{
		display:flex;
		align-items:center;
		gap:10px;
		padding:10px;
		cursor:pointer;
		border-bottom:1px solid #eee;
	}

	.search-item:hover{
		background:#f5f5f5;
	}

	.search-item img{
		width:50px;
		height:50px;
		border-radius:5px;
		object-fit:cover;
	}
	
	//for like and dislike	
	.fav,
	.unfav {
		display: inline-block;
		cursor: pointer;
	}

	.fav.animate-like,
	.unfav.animate-like {
		animation: heartPop 0.4s ease;
	}

	@keyframes heartPop {
		0%   { transform: scale(1); }
		35%  { transform: scale(1.5); }
		60%  { transform: scale(0.85); }
		100% { transform: scale(1); }
	} 
	
    </style>
	<script>
		<?php 
			include("mp3.js");
		?>
    </script>
</head>
<body>
<?php
	$conn=mysqli_connect("localhost","root","","mp3");
?>
    <!-- Mobile Overlay -->
    <div class="mobile-overlay"></div>

    <!-- Sidebar -->
	<?php
		include("nav.php");
	?>
    <!-- Main Content -->
    <div id="main-content">
        <!-- Topbar -->
		<?php
			include("topbar.php");
		?>
		
		<!-- All Modals -->
		<?php
			include("modals.php");
		?>

        <!-- Dashboard Content -->
		<div class="container-fluid" id="mainContainer" >

			<div class="row mt-2">
				<div class="d-flex justify-content-between align-items-center w-100 mt-2">
					<h3>Trending Songs</h3>
					<button class="btn btn-link text-end moreAlbums" data-title="Trending Songs" style="text-decoration:none;">See More</button>
				</div>
				<?php	
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
			<div class="row p-2"><!--style="margin-top:-60px"-->
				<div class="d-flex justify-content-between align-items-center w-100 mt-2">
					<h3>New Release</h3>
					<button class="btn btn-link text-end moreAlbums" data-ccode="new" data-title="New Released"  style="text-decoration:none;">See More</button>
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
							<img src="album/<?=$r["code"]?>.jpg" id="<?=$r["sn"]?>" class="alb_img" alt="<?=htmlspecialchars($r["title"])?>">
							<button type="button" class="audio_btn loadAlbum" data-acode="<?=$r["code"]?>" aria-label="Open album"><i class="fas fa-play"></i></button>
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
					<button class="btn btn-link text-end moreAlbums" data-ccode="<?=$c["code"]?>" data-title="<?=$c["category"]?>" style="text-decoration:none;">See More</button>
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
			<div class="audio-player">
				<div class="player-left">
					<img src="album/izZTeFj_18.jpg"
						id="PlayerSongImg">
					<div class="song-info">
						<b id="trackTitle">Lord Vishnu</b>
						<span id="albTrackTitle">Arijit Singh</span>
					</div>
				</div>
				<div class="player-center">
					<div class="time-row">
						<span id="currentTime">0:00</span>
						<input
							type="range"
							id="progressBar"
							min="0"
							max="100"
							value="0">
						<span id="totalTime">0:00</span>
					</div>
					<div class="controls">
						<button id="prevSong">
							<i class="fas fa-step-backward"></i>
						</button>
						<button>
							<i class="fas fa-play" id="playPauseIcon"></i>
						</button>
						<button id="nextSong">
							<i class="fas fa-step-forward"></i>
						</button>
					</div>
				</div>
				<audio id="audioPlayer"></audio>
			</div>
			<!--footer-->
			<footer class="footer mt-4">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md-6">
							<div class="footer-brand">Melody Music</div>
							<p class="footer-text">Creating amazing experiences and innovative solutions for our customers
								worldwide.</p>
							<div class="social-links">
								<a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
								<a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
								<a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
								<a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
							</div>
						</div>

						<div class="col-md-6 text-md-end">
							<ul class="footer-links">
								<li><a href="#">About</a></li>
								<li><a href="#">Services</a></li>
								<li><a href="#">Contact</a></li>
								<li><a href="#">Privacy</a></li>
								<li><a href="#">Terms</a></li>
							</ul>
						</div>
					</div>

					<div class="copyright text-center">
						© 2024 CompanyName. All rights reserved.
					</div>
				</div>
			</footer>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Sidebar toggle
        document.getElementById('sidebar-toggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('collapsed');
            document.getElementById('main-content').classList.toggle('expanded');
        });

        // Submenu toggle
        document.querySelectorAll('.has-submenu').forEach(item => {
            const link = item.querySelector('.nav-link');
            const submenu = item.querySelector('.submenu');

            link.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                // Toggle current submenu
                submenu.classList.toggle('show');
                this.querySelector('.arrow').style.transform = submenu.classList.contains('show') ? 'rotate(180deg)' : 'rotate(0)';

                // Close other submenus
                document.querySelectorAll('.has-submenu').forEach(otherItem => {
                    if (otherItem !== item) {
                        const otherSubmenu = otherItem.querySelector('.submenu');
                        const otherArrow = otherItem.querySelector('.arrow');
                        if (otherSubmenu && otherSubmenu.classList.contains('show')) {
                            otherSubmenu.classList.remove('show');
                            otherArrow.style.transform = 'rotate(0)';
                        }
                    }
                });
            });

            // Handle submenu item clicks
            submenu.querySelectorAll('.nav-link').forEach(subLink => {
                subLink.addEventListener('click', function(e) {
                    if (window.innerWidth < 992) {
                        document.getElementById('sidebar').classList.remove('mobile-show');
                        document.querySelector('.mobile-overlay').classList.remove('show');
                        document.body.style.overflow = '';
                    }
                });
            });
        });

        // Handle non-submenu link clicks
        document.querySelectorAll('#sidebar .nav-link:not(.has-submenu .nav-link)').forEach(link => {
            if (!link.closest('.has-submenu')) {
                link.addEventListener('click', function(e) {
                    // Close all submenus
                    document.querySelectorAll('.submenu.show').forEach(submenu => {
                        submenu.classList.remove('show');
                        const arrow = submenu.parentElement.querySelector('.arrow');
                        if (arrow) arrow.style.transform = 'rotate(0)';
                    });

                    // Only close sidebar on mobile for non-submenu links
                    if (window.innerWidth < 992) {
                        document.getElementById('sidebar').classList.remove('mobile-show');
                        document.querySelector('.mobile-overlay').classList.remove('show');
                        document.body.style.overflow = '';
                    }
                });
            }
        });

        // Mobile toggle
        document.getElementById('mobile-toggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('mobile-show');
            document.querySelector('.mobile-overlay').classList.toggle('show');
            document.body.style.overflow = document.getElementById('sidebar').classList.contains('mobile-show') ? 'hidden' : '';
        });

        // Close mobile sidebar when clicking overlay
        document.querySelector('.mobile-overlay').addEventListener('click', function() {
            document.getElementById('sidebar').classList.remove('mobile-show');
            this.classList.remove('show');
            document.body.style.overflow = '';

            // Close all submenus when closing sidebar
            document.querySelectorAll('.submenu.show').forEach(submenu => {
                submenu.classList.remove('show');
                const arrow = submenu.parentElement.querySelector('.arrow');
                if (arrow) arrow.style.transform = 'rotate(0)';
            });
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 992) {
                document.getElementById('sidebar').classList.remove('mobile-show');
                document.querySelector('.mobile-overlay').classList.remove('show');
                document.body.style.overflow = '';
            }
        });

        // Active link handling
        document.querySelectorAll('#sidebar .nav-link').forEach(link => {
            link.addEventListener('click', function() {
                if (!this.parentElement.classList.contains('has-submenu')) {
                    document.querySelectorAll('#sidebar .nav-link').forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                }
            });
        });

        // Revenue Chart
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Revenue',
                    data: [30, 45, 35, 50, 40, 60],
                    borderColor: '#0d6efd',
                    tension: 0.3,
                    fill: true,
                    backgroundColor: 'rgba(13, 110, 253, 0.1)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Traffic Sources Chart
        const trafficCtx = document.getElementById('trafficChart').getContext('2d');
        new Chart(trafficCtx, {
            type: 'doughnut',
            data: {
                labels: ['Organic', 'Direct', 'Referral'],
                datasets: [{
                    data: [45, 30, 25],
                    backgroundColor: ['#0d6efd', '#198754', '#ffc107']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Gallery functionality
        document.getElementById('galleryUpload').addEventListener('change', function(e) {
            const files = e.target.files;
            const galleryGrid = document.getElementById('galleryGrid');
            
            for(let file of files) {
                if(file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const col = document.createElement('div');
                        col.className = 'col-6 col-md-4 col-lg-3';
                        col.innerHTML = `
                            <div class="card h-100">
                                <div class="gallery-img-container">
                                    <img src="${e.target.result}" class="card-img-top" alt="Gallery Image">
                                </div>
                                <div class="card-body p-2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">${file.name}</small>
                                        <button class="btn btn-sm btn-outline-danger" onclick="this.closest('.col-6').remove()">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        `;
                        galleryGrid.insertBefore(col, galleryGrid.firstChild);
                    }
                    reader.readAsDataURL(file);
                }
            }
            this.value = ''; // Reset input
        });
    </script>
	
</body>


</html>
