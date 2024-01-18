<?
 
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';



$ank['id']=$user['id'];

$ank = get_user($ank['id']);




include '../../inc/header.php';
title();
aut(); 

?>




<div class="kAppPagePhtMusicHeading">
		<div class="klmanchlq1illumniation"></div>
		<div class="knmaninhedq123q">Music</div>
		<div class="lmkmnaingq331">My music</div>
</div>






<div>


<div class="qblogq1_zDv1">


		<div>

					<div class="topic_match_for_you_cats">
									<a href="/page/Music/">All</a>
									<a href="/page/Music/fav.php">Booked</a>
									<a href="/page/Music/popular.php">Popular</a>
				</div>



		</div>



<div>
	
	
	 <a class="Pmusic1" href="/page/Music/add.php">   
		 <span class="material-symbols-outlined svg">add</span>
		 
		   Post</a>  
	 
	 
	 
	 </div>


</div>



			




</div>






<!-- -->









<?

$qq = new Pagination();


$kzftch322 = $pdo->query("SELECT * FROM `post_music` WHERE `whom` = ?",[$user['id']])->rowCount();



$ttlq = $qq->calculation($kzftch322, $set['p_str']);



$qfetch = $pdo->query("SELECT * FROM `post_music` WHERE `whom` = ? ORDER BY `uid` DESC LIMIT $ttlq, $set[p_str]", [$user['id']]);



?>



<div class="mBottom"></div>


<? if ($kzftch322>0): ?>

<div id="keke1_z" style="background:#fff;padding-top:15px;">

<style>
.mmmus1 {
	display:flex;gap:10px;padding-bottom:15px;padding-right:10px;padding-left:10px;cursor:pointer;
}
.mmus31z {
	width:50px;height:50px;border-radius:10px;
}
</style>
<?

while ($post = $qfetch->fetch())
{


$qlzd = ((strlen2($post['pimage'])>0) ? '/page/Music/images/'.detect($post['pimage']).'.jpg' :  '/pics/no-thumbnail-image-placeholder-forums-blogs-websites-148010362.jpg'); 



?>


<div class="mmmus1"  onclick="window.location='post.php?id=<?=$post['uid'];?>';">
	
<div><img class="mmus31z" src="<?=$qlzd;?>"></div>

<div>
	<div><?=detect($post['name']);?></div>
	<div><?=when($post['when']);?></div>
</div>


</div>
<?

}




$qq->setPage("/page/Music/my.php");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();


?>

</div>

<? endif; ?>

<?
 
include '../../inc/footer.php';
?>
