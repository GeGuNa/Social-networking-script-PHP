<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';

include '../../inc/header.php';
title();
aut(); 


$k_post = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `video`");

?>



<div class="kmnaiqn1headgings1">
		<div class="klmanchlq1illumniation"></div>
		<div class="knmaninhedq123q">Our videos</div>
		<div class="lmkmnaingq331">Search videos from all around the world!</div>
</div>



<div class="pBlueWw2" style="margin-top:0;">
	


<div class="lLTl21zblt active"> 
<a href="javascript:(0)">All</a>
</div>	


<div class="lLTl21zblt"> 
<a href="./top.php">Popular</a>
</div> 

<div class="lLTl21zblt">  
<a href="./book.php">Bookmarks</a>
</div>
	
	
</div>






<!-- -->





<div>


<div class="qblogq1_zDv1">


		<div>

					<div class="topic_match_for_you_cats">
									<a href="./my.php?id=<?=$user['id'];?>">My</a>
									<a href="./searching.php">Search</a>
				</div>
				
				





		</div>



<div>
	
	
	 <div class="qblogq1_zDv1FrAd" onclick="window.location='add.php';"> <span class="material-symbols-outlined svg">add</span>  Post</div>  
	 
	 
	 
	 </div>


</div>



			




</div>



<!-- -->










<!--

<div class="SearchbarD">

<form method="get" action="searching.php?">
	
<div class="formDivSearch">	


	<div class="viddvflxfrst" onclick="window.location='./add.php';">
		<div class="vid_post_new"><i class="fa-solid fa-plus fa-fw"></i></div>
	</div>	
	
	<div class="searchBardiv1">
		<input type="text" placeholder="What do you seek?" name="search" maxlength="32" value="">
	</div>	

	<div class="searchbardiv2">
		<input type="submit" value="Search">
	</div>

</div>	

 
</form>
</div>


-->



<?

$q32 = $pdo->query("SELECT * FROM `video` ORDER BY `id` DESC limit 50");



?>


<div class="vidMnLstMq1">


<!--

Low-Quality – https://img.youtube.com/vi/VID_ID/sddefault.jpg
Medium-Quality – https://img.youtube.com/vi/VID_ID/mqdefault.jpg
Hight-Quality – https://img.youtube.com/vi/VID_ID/hqdefault.jpg
Max High-Quality – https://img.youtube.com/vi/VID_ID/maxresdefault.jpg



-->


<?
while ($video = $q32->fetch())
{
	
$liked3 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `video_like` WHERE `id_video` = '".$video['id']."'");	

$paUa1s = new user($video['id_user']);


if ($video['picurl']!='') {
	$kurlq = '/page/video/images/'.$video['picurl'].'.jpg';
} else {
	$kurlq = 'https://img.youtube.com/vi/'.detect($video['url']).'/mqdefault.jpg';
}

?>



<div class="vidchldPso13Zq1z">



<div class="kvidMaxWhq1">




	<div class="vidchldPso13z" onclick="window.location = '/page/video/video.php?id=<?echo $video['id'];?>';">
	
	
			<div class="viPicUlIMG360" style="background:url('<?echo detect($kurlq);?>');"></div>
			
			 
			<div class="childp">
				<div class="mndvsdpfqsl1">
					<div class="phAlcntrDvCntqpFn1z"><i class="fa-solid fa-heart"></i> <?=$liked3;?></div>
					<div class="phAlcntrDvCntqpFn1z"><?echo wudate($video['time']);?></div>
				</div>
			</div>
			
			
	</div>


<div class="vidlqm_1_qvid1">
	
	<div><?=$paUa1s->photo2('128');?> </div>
	
		<div>
				<div class="vidDescForql1q"> <?echo detect($video['name']); ?> </div>
				<div class="pdn3px"><? echo $paUa1s->nickWithColor("#00000080");?></div>
		</div>
			
	</div>

</div>




</div>


<? } ?>

</div>








<?
include '../../inc/footer.php';
?>
