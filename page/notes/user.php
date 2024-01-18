<?
 
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';



$ank['id']=$user['id'];

if (isset($_GET['id'])) { 
	
if (!is_numeric($_GET['id'])) {
header("Location: index.php");
exit;
}	

$ank['id'] = nums($_GET['id']);

}

$ank = get_user($ank['id']);


if (!$ank)
{
header("Location: /index.php");
exit;
}


include '../../inc/header.php';
title();
aut(); 

?>


<?


/*-------------------close / ignor / off / block------------------*/


if ($user['id']!=$ank['id']) {


if_blocked($ank);

if_blacklisted($ank);

if_closed($ank);

}


/*-------------------end------------------*/


$qq = new Pagination();




$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `notes` WHERE `id_user` = ? and `post_type` = 'note'", [$ank['id']]);





	

$qwe = new user($ank['id']);


if ($qwe->cover_id == 0){
	$cvrln = "/images/mail/Abstract+stars.jpg";
	$cqwleq11 = "";
	$kf1_z = false;
} else {

$kf1_z = false;	

$oklcvri = $pdo->fetchOne("SELECT * FROM `gallery_foto` where `id` = ?", [$qwe->cover_id]);	
		
//$kq1_zzcntlwmw  = $_SERVER['DOCUMENT_ROOT']."/images/gallery/48/".$oklcvri['photo_addr'].".jpg";	
	
if ($oklcvri) {
	$cvrln = "/images/gallery/640/".$oklcvri['photo_addr'].".jpg";
	$cqwleq11 = "";
	
	$kf1_z = true;
	
} else {
	$cvrln = "/images/mail/Abstract+stars.jpg";
	$cqwleq11 = "";
}
	
}

$mconnections = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends` WHERE `user` = ?", [$ank['id']]);


?>






<div class="uoppfr_crbrrMain3Yoo borderBottom">
	<!--   ("/sys/gallery/48/$foto[id].jpg") -->
	
	
<div class="<?=($kf1_z == true ? 'pointer' : '');?> aKDiplayImage" <?=$cqwleq11;?> style="background-image: url('<?=$cvrln;?>');">

	<div class="mnPgAOFproQ11qzq">
		
		<div style="position:absolute;">
			<div><?=$qwe->photo2(128, 128, 128, "50%"); ?></div>
			<div class="mnPgAOFproQ11qzqnklc123q"><?=$qwe->nick; ?></div>
		</div>
		
		
	</div>


</div>




</div>







<div class="pBlueWw2">
	
	
<div class="lLTl21zblt"> 
<a href="./">Latest</a>
</div>	

<div class="lLTl21zblt active"> 
<a href="javascript:(0)">My</a>
</div> 


<div class="lLTl21zblt">  
<a href="./rating.php">Popular</a>
</div>



	
	
</div>








<div>


			

		<div class="phtshnq11a">
			
			
			<div>

				<div class="phthdrsctns">
					<div>Blog Posts</div>
					<div class="phAlcntrDv"><div class="HdrFrqThngs1z"><?=$kzftch322;?></div></div>
				</div>			
				
			</div>

<? if ($user['id']==$ank['id']): ?>
			<div>
				
				
				<a href="./add.php">Post new</a>
			
			</div>
		<? endif;?>
		
		</div>




</div>





<?



$ttlq = $qq->calculation($kzftch322, $set['p_str']);




$qfetch = $pdo->query("SELECT * FROM `notes` WHERE `id_user` = ? and `post_type` = 'note' ORDER BY `id` DESC LIMIT $ttlq, $set[p_str]", [$ank['id']]);



?>



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




$qq->setPage("/page/notes/user.php?", "id=$ank[id]");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();





 
include '../../inc/footer.php';
?>
