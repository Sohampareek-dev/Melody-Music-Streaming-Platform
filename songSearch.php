<?php
$conn = mysqli_connect("localhost","root","","mp3");
if(isset($_POST["name"])){
    $search = trim($_POST["name"]);
    if($search!=""){
        $search = mysqli_real_escape_string($conn,$search);
        $sql = "SELECT song.*,album.title AS albumTitle
                FROM song
                INNER JOIN album
                ON song.acode=album.code
                WHERE song.title LIKE '%$search%'
                LIMIT 10";
        $rs = mysqli_query($conn,$sql);
        if(mysqli_num_rows($rs)>0){
            while($r=mysqli_fetch_array($rs)){
?>
<div class="search-item song"
     data-spath="album/<?=$r["acode"]?>/<?=$r["sn"]?>.mp3"
     data-image="album/<?=$r["acode"]?>.jpg"
     data-stitle="<?=$r["title"]?>"
     data-albtitle="<?=$r["albumTitle"]?>">

    <img src="album/<?=$r["acode"]?>.jpg">
    <div>
        <b><?=$r["title"]?></b><br>
        <small><?=$r["albumTitle"]?></small>
    </div>
</div>
<?php
            }
        }
        else{
            echo "<div class='p-3'>No Song Found</div>";
        }
    }
}
?>