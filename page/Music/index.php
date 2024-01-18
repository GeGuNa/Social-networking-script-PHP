<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';


include '../../inc/header.php';
title();
aut();


$qq = new Pagination();


$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `post_music`");



?>




<style>
.mmuzzmys1 {
	width:100%;display:flex;justify-content:space-between;gap:10px;/* padding:10px; */height: 60px;padding-left: 10px;padding-right: 10px;align-items: center;
}
.mmmus1 {
	display:flex;gap:10px;padding-bottom:15px;padding-right:10px;padding-left:10px;cursor:pointer;
}
.mmus31z {
	width:80px;
	height:auto;
	border-radius:10px;
}

.KmuSTitle {
	font-weight: 700;
    color: #333;
    font-family: Helvetica, Arial;
}

.muspopz1a {
	margin-bottom:15px;background:#fff;padding:10px;
}

.muspopz1a3zqaq {
	display:flex;gap:10px;width:100%;overflow:hidden;
}
.kpUqzwdqz {
	width:90px;
}
	.kmaxWName86 {
		max-width:87%;overflow:hidden;
	}

.mmuzzmys1keqkzl1a {
    width: 100%;
    display: flex;
    justify-content: space-between;
    gap: 10px;
	padding-top: 3px;
    padding-bottom: 17px;
    align-items: center;
}



</style>





<div class="kAppPagePhtMusicHeading">
		<div class="klmanchlq1illumniation"></div>
		<div class="knmaninhedq123q">Music</div>
		<div class="lmkmnaingq331">Post new music and listen music uploaded by others</div>
</div>






<div>


<div class="qblogq1_zDv1">


		<div>

					<div class="topic_match_for_you_cats">
									<a href="/page/Music/fav.php">Booked</a>
									<a href="/page/Music/my.php">My</a>
									<a href="/page/Music/popular.php">Popular</a>
				</div>



		</div>



	<div>
		<a class="Pmusic1" href="/page/Music/add.php">   <span class="material-symbols-outlined svg">add</span>Post </a>  
	</div>


</div>



			




</div>






<!-- -->







<?




$ttlq = $qq->calculation($kzftch322, $set['p_str']);





$qfetch = $pdo->query("SELECT * FROM `post_music` ORDER BY `uid` DESC LIMIT 20");



 ?>
	

<div class="mBottom"></div>






<?

$kzftch32zifpops2 = $pdo->query("SELECT * FROM `post_music` WHERE `likes` > ?",[0])->rowCount();
?>



<? if ($kzftch32zifpops2>0): ?>


<? $qfetchqz123az = $pdo->query("SELECT * FROM `post_music` WHERE `likes` > ? ORDER BY `likes` DESC LIMIT 9", [0]); ?>

<div class="muspopz1a">
		
	<div class="mmuzzmys1keqkzl1a">
		
		<div><div class="FHelAll">Popular music</div></div>
		<div><a href="/page/Music/popular.php">More</a></div>
		
	</div>	
	
	
<div class="muspopz1a3zqaq">

<?

while ($post3zqwqedEqpops = $qfetchqz123az->fetch())
{


$qlzd = ((strlen2($post3zqwqedEqpops['pimage'])>0) ? '/page/Music/images/'.detect($post3zqwqedEqpops['pimage']).'.jpg' :  '/pics/no-thumbnail-image-placeholder-forums-blogs-websites-148010362.jpg'); 



?>	
<div class="kpUqzwdqz" style="cursor:pointer;" onclick="window.location='post.php?id=<?=$post3zqwqedEqpops['uid'];?>';">
	<div><img class="mmus31z" src="<?=$qlzd;?>"></div>
	<div>	<div class="kmaxWName86"><?=detect($post3zqwqedEqpops['name']);?></div>	</div>
</div>

<? } ?>

</div>

</div>




<? endif; ?>










<div id="keke1_z" style="background:#fff;">


<div class="mmuzzmys1">
	
	<div><div class="FHelAll">Newest</div></div>
	<div><a href="/page/Music/all.php">More</a></div>
	
</div>



<?


while ($post = $qfetch->fetch())
{

$qlzd = ((strlen2($post['pimage'])>0) ? '/page/Music/images/'.detect($post['pimage']).'.jpg' :  '/pics/no-thumbnail-image-placeholder-forums-blogs-websites-148010362.jpg'); 




$whmlks = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `post_music_likes` WHERE `mid` = '".$post['uid']."'");

?>


<div class="mmmus1"  onclick="window.location='post.php?id=<?=$post['uid'];?>';">
	
<div><img class="mmus31z" src="<?=$qlzd;?>"></div>

<div>
	<div><span class="KmuSTitle"><?=detect($post['name']);?></span></div>
	<div><?=when($post['when']);?></div>
	<div><i class="fa-solid fa-fire" style="color: red;"></i> <?=$whmlks;?></div>
</div>


</div>




<?

}
?>


</div>




<?
include '../../inc/footer.php';
?>
