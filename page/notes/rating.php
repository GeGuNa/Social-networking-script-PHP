<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';






include '../../inc/header.php';
title();
aut(); 


$qq = new Pagination();


$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `notes` where `post_type` = 'note'");


?>





<div class="kAppPagePhtBLogHeading">
		<div class="klmanchlq1illumniation"></div>
		<div class="knmaninhedq123q">Our Blogs</div>
		<div class="lmkmnaingq331">Popular blogs!</div>
</div>



<div class="pBlueWw2" style="margin-top:0;">
	
	
<div class="lLTl21zblt"> 
<a href="./">Latest</a>
</div>	

<div class="lLTl21zblt"> 
<a href="./user.php">My</a>
</div> 


<div class="lLTl21zblt active">  
<a href="javascript:(0)">Popular</a>
</div>



	
	
</div>














<?


 

$ttlq = $qq->calculation($kzftch322, $set['p_str']);






$qfetch = $pdo->query("SELECT * FROM `notes` where `post_type` = 'note' ORDER BY id LIMIT $ttlq, $set[p_str]");


if ($kzftch322 == 0) { ?>
	
	<div class='mess mTop'>
		There's no new posts here
	</div>

<? } ?>



<div class="mBottom"></div>


<?


while ($post = $qfetch->fetch())
{

$author = new user($post['id_user']);


	

$qlzd = ((strlen2($post['image'])>0) ? '/page/notes/images/'.detect($post['image']).'.jpg' :  '/pics/no-thumbnail-image-placeholder-forums-blogs-websites-148010362.jpg'); 


?>



<div class="bb_blog">
	
	
<div> <img src="<?echo $qlzd;?>">  </div>	
		

		
<div class="zp213">
	   


  
<div class="pTxtWithoutOverflowing p1">

	<a class="black" href="/page/notes/list.php?id=<?php echo $post['id'];?>">	
		<span class="pblGHbblT"><?=detect($post['name']);?></span> 
	</a>

</div>
	
	<div class="p2"> 
		<span class="breakw"><?=utf_substr(detect($post['msg']),0,150);?></span> 
	</div>	  
	  
	   




</div>


</div>


<?

}




$qq->setPage("/page/notes/rating.php");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();


include '../../inc/footer.php';
?>
