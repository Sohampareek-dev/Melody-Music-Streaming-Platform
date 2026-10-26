function showToast(icon, message) {
			Swal.fire({
				toast: true,
				position: "top-end",
				icon: icon,
				title: message,
				showConfirmButton: false,
				timer: 2500,
				timerProgressBar: true
			});
		}

		$(document).on("click",".albUnfav",function(){
			let heart = $(this);  //save the clicked icon
			var a_code = heart.attr("data-acode");
			var c_code = heart.attr("data-ccode");
			//alert(a_code+"   "+c_code);
			$.post(
				"like_album.php",{albCode:a_code,catCode:c_code},function(data){
					data = data.trim();
					//alert(data);
					if(data == "Liked"){
						heart.removeClass("far albUnfav")
                 		.addClass("fas albFav");
					}
				}
			);
		});

		$(document).on("click",".albFav",function(){
			let heart = $(this);  //save the clicked icon
			var a_code = heart.attr("data-acode");
			var c_code = heart.attr("data-ccode");
			//alert(a_code+"   "+c_code);
			$.post(
				"dislike_album.php",{albCode:a_code,catCode:c_code},function(data){
					data = data.trim();
					//alert(data);
					if(data == "Disliked"){
						heart.removeClass("fas albFav")
						.addClass("far albUnfav");
					}
				}
			);
		});
		
		// LIKE SONG
		$(document).on("click", ".unfav", function () {
			let heart = $(this);
			let acode = heart.attr("id");
			let song_sn = heart.attr("rel");
			var songRow = heart.closest("tr.song_row");

			// Instantly fill and animate the heart
			heart.removeClass("far unfav animate-like")
				.addClass("fas fav");

			heart[0].offsetWidth;
			heart.addClass("animate-like");

			$.post("like_song.php", { id: acode, sn: song_sn }, function(data){
				if (data.trim() == "Liked") {
					songRow.fadeOut(500);
				}
			});
		});


		// UNLIKE SONG
		$(document).on("click", ".fav", function () {
			let heart = $(this);
			let acode = heart.attr("id");
			let song_sn = heart.attr("rel");
			var songRow = heart.closest("tr.song_row");

			// Instantly unfill and animate the heart
			heart.removeClass("fas fav animate-like")
				.addClass("far unfav");

			heart[0].offsetWidth;
			heart.addClass("animate-like");

			$.post("dislike_song.php", { id: acode, sn: song_sn }, function(data){
				if (data.trim() == "Disliked") {
					songRow.fadeOut(500);
				}
			});
		});


		// Remove animation after it finishes
		$(document).on("animationend", ".fav, .unfav", function () {
			$(this).removeClass("animate-like");
		});

		$(document).on("click",".plist_delete",function(){
			let pcode = $(this).attr("id");
			//alert(pcode);
			$.post(
				"playlist_delete.php",{id:pcode},function(data){
					data = data.trim();
					//alert(data);
					if (data === "playlist deleted") {
						showToast("success", "Playlist Deleted!");
						setTimeout(function () {
							location.reload();
						}, 1500);
					} else {
						showToast("error","Try Again!");
					}
				}
			);
		});
		
		$(document).on("click",".plist_create",function(){
			var pname = $("#npname").val();
			var pdes = $("#npdescr").val();
			//alert(pname+"  "+pdes);
			$.post(
				"create_playlist.php",{pname:pname,pdescr:pdes},function(data){
					data = data.trim();
					//alert(data);
					if (data === "Playlist Created!") {
						showToast("success", data);
						setTimeout(function () {
							location.reload();
						}, 1500);
					} else {
						showToast("error",data);
					}
				}
			);
		});
		
		$(document).on("click",".plist_edit",function(){
			let pcode = $(this).attr("id");
			//alert(pcode);
			$(".plist_create_edit").load("playlist_edit.php",{id:pcode});
		});
		
		$(document).on("click",".plist_update",function(){
			let pname = $("#pname").val();
			let pdes = $("#pdescr").val();
			let pcode = $(this).attr("id");
			//alert(pname+"  "+pdes+"  "+pcode);
			$.post(
				"update_playlist.php",{id:pcode,name:pname,des:pdes},function(data){
					data = data.trim();
					//alert(data);
					if (data === "playlist edited") {
						showToast("success", "Playlist Updated!");
						setTimeout(function () {
							location.reload();
						}, 1500);
					} else {
						showToast("error","Try Again!");
					}
				}
			);
		});
		
		$(document).on("click",".register",function(){
			let email = $("#email").val();
			let pass = $("#pass").val();
			//alert(email+"  "+pass);
			$.post(
				"sign_up.php",{email:email,pass:pass},function(data){
					data = data.trim();
					if (data === "success") {
						showToast("success", "User Registered!");
						setTimeout(function () {
							location.reload();
						}, 1500);
					} else {
						showToast("error","Try Again!");
					}
				}
			);
		});
		
		$(document).on("click",".login",function(){
			let email = $("#nemail").val();
			let pass = $("#npass").val();
			//alert(email+"  "+pass);
			$.post(
				"sign_in.php",{email:email,pass:pass},function(data){
					data = data.trim();
					if (data === "User Login") {
						showToast("success", "Welcome to Melody Music!");
						setTimeout(function () {
							location.reload();
						}, 1500);
					} else {
						showToast("error", data || "Login failed!");
					}
				}
			);
		});
		
		$(document).on("click",".addtoplist",function(){
			let acode = $(this).attr("id");
			let ssn = $(this).attr("rel");
			//alert(acode+"  "+ssn);
			$(document).on("click",".songaddtoplist",function(){
				let pcode = $("#playlist").val();
				//alert(pcode);
				$.post(
					"addplist.php",{id:acode,ssn:ssn,pid:pcode},function(data){
						data = data.trim();
						//alert(data);
						if (data === "success") {
							showToast("success", "Added to playlist!");
							setTimeout(function () {
								location.reload();
							}, 1500);
						} else {
							showToast("error","Try Again!");
						}
					}
				);
			});
		});
		//var audio = new Audio('album\CbB956g_17\1.mp3');
		//audio.play();

		let audio;
		let songs = [];
		let currentSongIndex = -1;
		let currentSongPath ="";
		let currentRowIcon=null;
		
		$(document).ready(function(){
			audio = document.getElementById("audioPlayer");
			console.log(audio);
			loadSongs();
			registerAudioEvents();
			registerPlayerEvents();
			// Set first song as default player song
			if(songs.length > 0){
				setInitialSong(0);
			}
		});

		function loadSongs(){
			songs = [];
			$(".songBtn").each(function() {
				songs.push({
					path: $(this).data("spath"),
					title: $(this).data("stitle"),
					album: $(this).data("albtitle"),
					image: $(this).data("image"),
					rowIcon: $(this).closest("tr").find(".playIcon")
				});
			});
			console.log(songs);
		}

		function registerAudioEvents(){
			audio.addEventListener("loadedmetadata",function(){
				$("#totalTime").text(formatTime(audio.duration));
			});

			audio.addEventListener("timeupdate",function(){
				//if(!audio.duration) return;
				$("#currentTime").text(formatTime(audio.currentTime));
				$("#progressBar").val(
					(audio.currentTime/audio.duration)*100
				);
			});

			audio.addEventListener("play", function(){
				console.log("PLAY EVENT");
				// Main player icon
				$("#playPauseIcon")
					.removeClass("fa-play")
					.addClass("fa-pause");
				// Reset all song row icons
				$(".playIcon")
					.removeClass("fa-pause")
					.addClass("fa-play");
				// Current song row
				if(currentRowIcon){
					currentRowIcon
						.removeClass("fa-play")
						.addClass("fa-pause");
				}
				// Album play icon
				$(".albumPlayIcon")
					.removeClass("fa-play")
					.addClass("fa-pause");
			});

			audio.addEventListener("pause", function(){
				console.log("PAUSE EVENT");
				// Main player
				$("#playPauseIcon")
					.removeClass("fa-pause")
					.addClass("fa-play");
				// Current song row
				if(currentRowIcon){
					currentRowIcon
						.removeClass("fa-pause")
						.addClass("fa-play");
				}
				// Album button
				$(".albumPlayIcon")
					.removeClass("fa-pause")
					.addClass("fa-play");
			});

			audio.addEventListener("ended",function(){
				$(".song_row").removeClass("activeSong");
				nextSong();
			});
		}

		function registerPlayerEvents(){
			$("#playPauseIcon").click(function () {
				if (!audio.src) 
					return;
				if(audio.paused){
					audio.play();
				}else{
					audio.pause();
				}
			});
			
			$("#progressBar").on("input",function(){
				if(audio.duration){
					audio.currentTime =(this.value/100) * audio.duration;
				}
			});

			$("#nextSong").click(function(){
				nextSong();
			});

			$("#prevSong").click(function(){
				prevSong();
			});
		}

		function setInitialSong(index){
			if(index < 0 || index >= songs.length)
				return;
			currentSongIndex = index;
			currentSongPath = songs[index].path;
			currentRowIcon = songs[index].rowIcon;
			// Set player information
			$("#trackTitle").text(songs[index].title);
			$("#albTrackTitle").text(songs[index].album);
			$("#PlayerSongImg").attr("src", songs[index].image);
			// Set audio source
			audio.src = songs[index].path;
			// Don't play automatically
			audio.load();
			console.log("Initial song:", songs[index]);
		}

		function playSong(index){
			if(index<0 || index>=songs.length)
				return;

				/*// Reset all row icons
				$(".playIcon")
					.removeClass("fa-pause")
					.addClass("fa-play");*/

				//Set Current Song
				currentSongIndex=index;
				currentSongPath=songs[index].path;
				currentRowIcon=songs[index].rowIcon;

				$(".song_row").removeClass("activeSong");
				if(currentRowIcon && currentRowIcon.length){
					currentRowIcon
						.closest("tr")
						.addClass("activeSong");
				}
				//Update Player Information
				$("#trackTitle").text(songs[index].title);
				$("#albTrackTitle").text(songs[index].album);
				$("#PlayerSongImg").attr("src",songs[index].image);

				//Load Song
				audio.src=songs[index].path;
				audio.load();
				audio.play();
		}

		function nextSong(){
			if(currentSongIndex < songs.length-1){
				playSong(currentSongIndex+1);
			}
		}

		function prevSong(){
			if(currentSongIndex>0){
				playSong(currentSongIndex-1);
			}
		}

		function formatTime(seconds){
			if(isNaN(seconds)) 
				return "0:00";
			let min=Math.floor(seconds/60);
			let sec=Math.floor(seconds%60);
			if(sec<10){
				sec="0"+sec;
			}
			return min+":"+sec;
		}

		$(document).on("click",".song",function(){
			let path=$(this).data("spath");
			let index=songs.findIndex(function(song){
				return song.path==path;
			});
			if(index==-1)
				return;
			if(currentSongIndex==index){
				if(audio.paused){
					audio.play();
				}
				else{
					audio.pause();
				}
			}
			else{
				playSong(index);
			}
			$("#searchResult").hide();
			$("#songsearch").val("");
		});

		$(document).on("keyup","#songsearch",function(){
			
				let keyword = $(this).val().trim();
				//alert(keyword);
				if(keyword==""){
					$("#searchResult").hide().html("");
					return;
				}
				$.post("songSearch.php",{name:keyword},function(data){
					//alert(data);
					 if($.trim(data)!=""){
						$("#searchResult").html(data).show();
					}
					else{
						$("#searchResult").hide();
					}
				});
		});

		$(document).click(function(e){
			if(!$(e.target).closest("#songsearch,#searchResult").length){
				$("#searchResult").hide();
			}
		});

		function refreshSongs(){
			loadSongs();
			currentSongIndex = -1;
			currentSongPath = "";
			currentRowIcon = null;
			// Reset album play button
			$(".albumPlayIcon")
				.removeClass("fa-pause")
				.addClass("fa-play");
			console.log("Updated song list:", songs);
		}

		$(document).on("click",".loadAlbum",function(){
			let albcode = $(this).data("acode");
			//alert(albcode);
			$("#mainContainer").load("album.php",{id:albcode},
				function(response, status, xhr){
					if(status == "success"){
						refreshSongs();
					}
				}
			);
		
		});

		$(document).on("click", ".albumPlayBtn", function () {
			if (songs.length === 0) {
				alert("No songs found in this album.");
				return;
			}
			// If no song has been selected yet
			if (currentSongIndex === -1) {
				// Play first song
				playSong(0);
			}
			else {
				// Control the currently selected song
				if (audio.paused) {
					audio.play();
				}
				else {
					audio.pause();
				}
			}
		});

		$(document).on("click",".loadPListSongs",function(){
			let plistcode = $(this).data("pcode");
			//alert(plistcode);
			$("#mainContainer").load("display_plist_songs.php",{id:plistcode},
				function(response, status, xhr){
					if(status == "success"){
						refreshSongs();
					}
				}
			);
		});

		$(document).on("click",".moreAlbums",function(){
			let catcode = $(this).data("ccode");
			let title = $(this).data("title");
			//alert(catcode+" "+title);
			$("#mainContainer").load("more_albums.php",{id:catcode,heading:title});
		});

		$(document).on("click",".homePage",function(){
			$("#mainContainer").load("home_page.php",
				function(response, status, xhr){
					if(status == "success"){
						refreshSongs();
					}
				}
			);
		});

		$(document).on("click",".likedSongs",function(){
			$("#mainContainer").load("display_likeds.php",
				function(response, status, xhr){
					if(status == "success"){
						refreshSongs();
					}
				}
			);
		});

		$(document).on("click",".likedAlbums",function(){
			$("#mainContainer").load("display_likeda.php",
				function(response, status, xhr){
					if(status == "success"){
						refreshSongs();
					}
				}
			);
		});

		$(document).on("click",".playlistDisplay",function(){
			$("#mainContainer").load("display_plist.php",
				function(response, status, xhr){
					if(status == "success"){
						refreshSongs();
					}
				}
			);
		});
