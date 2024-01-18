<?
 
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';

//$browser ='wap';

include '../../inc/header.php';
title();
aut();



$qq = new Pagination();


$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `notes` where `post_type` = 'note' ");



?>




<div class="kAppPagePhtBLogHeading">
		<div class="klmanchlq1illumniation"></div>
		<div class="knmaninhedq123q">Our Blogs</div>
		<div class="lmkmnaingq331">Post, Read, Rate  and see posts from the every user!</div>
</div>






<div>


<div class="qblogq1_zDv1">


		<div>

					<div class="topic_match_for_you_cats">
									<a href="./">All</a>
									<a href="./user.php">My</a>
									<a href="./rating.php">Popular</a>
				</div>



		</div>



<div>
	
	
	 <div class="qblogq1_zDv1FrAd" onclick="window.location='add.php';">   
		 
		 <span class="material-symbols-outlined svg">add</span>
		 
		   Post</div>  
	 
	 
	 
	 </div>


</div>



			




</div>






<!-- -->










<?




$ttlq = $qq->calculation($kzftch322, $set['p_str']);





$qfetch = $pdo->query("SELECT * FROM `notes` where `post_type` = 'note' ORDER BY `id` DESC LIMIT $ttlq, $set[p_str]");



 ?>
	

<div class="mBottom"></div>


<div id="keke1_z">



<?


while ($post = $qfetch->fetch())
{

$author = new user($post['id_user']);


	

$qlzd = ((strlen2($post['image'])>0) ? '/page/notes/images/'.detect($post['image']).'.jpg' :  '/pics/no-thumbnail-image-placeholder-forums-blogs-websites-148010362.jpg'); 


//$author->nick();
//times($post['time']);
?>


<div>

<div class="pqBlogAdditional1">

<div class="pqBlogAdditional2">

	<div><?=$author->photo50(48,48,48,'50%');?></div>


	<div>
		<div> <?=$author->nick();?>	</div>
		<div class="pblqweClqweDate1"> <?=times($post['time']);?>	</div>
	</div>


</div>

</div>




<div class="Main_Blog_Page">
	
	<? if (strlen2($post['image'])>1) { ?>
		<div class="kpntqwpstWithiMages"> 
			<div class="klmqimgqqzza1312a" style="    background-image: url('<?echo $qlzd;?>');"> </div>
		</div>	
	<? } ?>

		
<div class="zp213">
	   

   
	   
	   
	   
	   
<div class="Main_Blog_Header">

	<a class="black" href="/page/notes/list.php?id=<?php echo $post['id'];?>">	
		<span class="Main_Blg22"><?=detect($post['name']);?></span> 
	</a>

</div>
	
	<div class="Main_Blog_DesC"> 
		<span class="breakw"><?=utf_substr(detect($post['msg']),0,300);?></span> 
	</div>	  
	  
	   
<div class="Main_BLog_View">
	<a href="/page/notes/list.php?id=<?php echo $post['id'];?>">	
		View more
	</a>
</div>





<!-- sections -->



<div class="u_blog_Sections">
	
	


<?

$liked = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `notes_like` WHERE `id_notes` = '".$post['id']."'");
$comments = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `notes_komm` WHERE `id_notes` = '".$post['id']."'");


if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `notes_like` WHERE `id_user` = '".$user['id']."' AND `id_notes` = '".$post['id']."'") == 1) { 
$plnkhr = 'material-symbols-outlined2 red';
} else {
$plnkhr = 'material-symbols-outlined';
}




?>





<div><a href="/page/notes/list.php?id=<?=$post['id'];?>&act=heart"> <span class="<?=$plnkhr;?>">favorite</span> <?=$liked;?> </a> </div>


<div> <a href="/page/notes/list.php?id=<?=$post['id'];?>"> <span class="material-symbols-outlined">chat</span> <?=$comments;?> </a> </div>

<div><span class="material-symbols-outlined">share</span> 0 </div>

</div>



<!-- end -->






</div>


</div>

</div>
<?

}
?>


</div>




<?



$qq->setPage("/page/notes/");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();



include '../../inc/footer.php';
?>
