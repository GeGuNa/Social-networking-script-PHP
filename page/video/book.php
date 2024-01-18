<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';

include '../../inc/header.php';
title();
aut(); 



$k_post = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `bookmarks` WHERE `user_id` = '$user[id]'  and `book_type` = 'video'");

$qq = new Pagination();

$kzftch322 = $k_post;

$ttlq = $qq->calculation($kzftch322, $set['p_str']);

$query = $pdo->query("SELECT * FROM `bookmarks` WHERE `user_id` = '$user[id]'  and `book_type` = 'video'  ORDER BY `bid` DESC LIMIT $ttlq, $set[p_str]");

?>



<div class="kmnaiqn1headgings1">
		<div class="klmanchlq1illumniation"></div>
		<div class="knmaninhedq123q">Bookmarks</div>
		<div class="lmkmnaingq331">Here is all your marked videos</div>
</div>


<div class="pBlueWw2" style="margin-top:0;">
	


<div class="lLTl21zblt"> 
<a href="./">All</a>
</div>	
	
<div class="lLTl21zblt"> 
<a href="./my.php?id=<?=$user['id'];?>">My</a>
</div>	

<div class="lLTl21zblt"> 
<a href="top.php">Popular</a>
</div> 

<div class="lLTl21zblt active">  
<a href="javascript:(0)">Bookmarks</a>
</div>
	
	
</div>



<? 


while ($post = $query->fetch())
{
	
$pz2_z = $pdo->fetchOne("select * from `video` where `id` = ?",[$post['object_id']]);

	
$pas = new user($pz2_z['id_user']);	

	
if ($pz2_z['picurl']!='') {
	$kurlq = '/page/video/images/'.$pz2_z['picurl'].'.jpg';
} else {
	$kurlq = 'http://i.ytimg.com/vi_webp/'.detect($pz2_z['url']).'/1.webp';
}

	
	
	
	
?>



<div class="m_U_Video"> 


<div>
	<a href="/page/video/video.php?id=<?echo $pz2_z['id'];?>"> 
		<img class="vid_ll_1"  src="<?echo detect($kurlq);?>"> 
	</a>
</div>


<div>

<div class="pT_xxt1break">	
	<a href="/page/video/video.php?id=<?echo $pz2_z['id'];?>"> <? echo detect($pz2_z['name']); ?> </a>
</div>

<div>

<?=$pas->nick();?>

</div>

<div class="date">
	<?php echo tmdt($pz2_z['time']);?>
</div>


</div>



</div>


<?


}


$qq->setPage("/page/video/book.php");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();
	
?>

	

<div class="RGQWEMHm">
<a href="/page/video/"> Back  </a>
</div>

<div class="RGQWEMHmz2">
 <a href="/"> Home</a>
</div>



<?
include '../../inc/footer.php';
?>
