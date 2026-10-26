<script>
	var tdno = 0;
            var sn = 0;
            var album = "";
            var p_flag=0;
            $(document).ready(function(){
                p_flag=$(".table").attr("p_flag");
            });
            $(document).on("click", ".song", function () {
                for(var i=1;i<=max_sn;i++){
                    $("#td-" + i).html(i);
                }
                sn = $(this).attr("rel");
                var img="";
                if(p_flag=='0'){
                     img = $("#trackImg").attr("src");
                }
                else{
                     img = $("#trackImg-"+sn).attr("src");
                }
                var path = $(this).attr("name"); // Get the path from "name" attribute
                var title = $(this).attr("sname");
               // var artist = $(this).attr("artist");
                $("#SongImg").attr("src", img);
                $("#audioPlayer source").attr("src", path); // Set as audio source
                $("#audioPlayer")[0].load(); // Reload the audio player
                $("#audioPlayer")[0].play(); // Play the song
                $("#playPauseIcon").removeClass("fa-play").addClass("fa-pause"); // Update icon
                $("#trackTitle").html(title);
                //$("#trackArtist").html(artist);
                $("#title").html(album + ":" + title);
               // $("#td-" + sn).html("<img src='Image/songplay.gif'  style='width:48px;height:48px;background:none;'>")
            });


            $(document).on("click", "#playPauseIcon", function () {
                var audio = $("#audioPlayer")[0];
                var cls = $(this).attr("class");
                if (cls == 'fas fa-pause') {
                    $("#playPauseIcon").attr("class", "fas fa-play");
                    audioPlayer.pause();
                    //$("#td-" + sn).html("<img src='Image/songpaused.jpg' style='width:48px;height:48px;background:none;'>");

                } else {
                    $("#playPauseIcon").attr("class", "fas fa-pause");
                    audioPlayer.play();
                   // $("#td-" + sn).html("<img src='Image/songplay.gif' style='width:48px;height:48px;background:none;'>");
                }
            });
</script>