<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';


if (!isset($_GET['id'])) {
header("Location: /?"); 
exit;	
}	


if (!is_numeric($_GET['id'])) {
header("Location: /?"); 
exit;	
}	
	

$ank = get_user($_GET['id']);


if (!$ank)
{
header("Location: /index.php");
exit;
}





include '../../inc/header.php';
title();
aut();



/*-------------------close / ignor / off / block------------------*/


if ($user['id']!=$ank['id']) {


if_blocked($ank);

if_blacklisted($ank);

if_closed($ank);

}


/*-------------------end------------------*/


	

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
<a href="./">All</a>
</div>	
	
<div class="lLTl21zblt active"> 
<a href="javascript:(0)">My</a>
</div>	

<div class="lLTl21zblt"> 
<a href="./top.php">Popular</a>
</div> 

<div class="lLTl21zblt">  
<a href="./book.php">Bookmarks</a>
</div>
	
	
</div>










<?


$k_post = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `video` WHERE `id_user` = '".intval($ank['id'])."'");


$qq = new Pagination();


$kzftch322 = $k_post;


$ttlq = $qq->calculation($kzftch322, $set['p_str']);



$query = $pdo->query("SELECT * FROM `video` WHERE `id_user` = '".$ank['id']."' ORDER BY `id` DESC LIMIT $ttlq, $set[p_str]");

while ($post = $query->fetch())
{
	
	$pas = new user($post['id_user']);

if ($post['picurl']!='') {
	$kurlq = '/page/video/images/'.$post['picurl'].'.jpg';
} else {
	$kurlq = 'http://i.ytimg.com/vi_webp/'.detect($post['url']).'/1.webp';
}



?>



<div class="m_U_Video"> 


<div>
	<a href="/page/video/video.php?id=<?echo $post['id'];?>"> 
		<img class="vid_ll_1"  src="<?echo detect($kurlq);?>"> 
	</a>
</div>


<div>

<div class="pT_xxt1break">	
	<a href="/page/video/video.php?id=<?echo $post['id'];?>"> <? echo detect($post['name']); ?> </a>
</div>

<div>

<?=$pas->nick();?>

</div>

<div class="date">
	<?php echo tmdt($post['time']);?>
</div>


</div>



</div>

<?
}
?>


<div class="RGQWEMHm">
<a href="/page/video/"> Back  </a>
</div>

<div class="RGQWEMHmz2">
 <a href="/"> Home</a>
</div>


<?


$qq->setPage("/page/video/my.php?", "id=$ank[id]");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();

include '../../inc/footer.php';

?>
