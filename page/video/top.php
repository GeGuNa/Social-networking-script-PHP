<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';


include '../../inc/header.php';
title();
aut(); 




$k_post = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `video` WHERE `count` > '0' ");


$qq = new Pagination();


$kzftch322 = $k_post;


$ttlq = $qq->calculation($kzftch322, $set['p_str']);

$query = $pdo->query("SELECT * FROM `video` WHERE `count` > '0'  ORDER BY `count` DESC LIMIT $ttlq, $set[p_str]");



?>




<div class="kmnaiqn1headgings1">
		<div class="klmanchlq1illumniation"></div>
		<div class="knmaninhedq123q">Top videos</div>
		<div class="lmkmnaingq331">The most popular videos will appear here</div>
</div>


<div class="pBlueWw2" style="margin-top:0;">
	


<div class="lLTl21zblt"> 
<a href="./">All</a>
</div>	
	
<div class="lLTl21zblt"> 
<a href="./my.php?id=<?=$user['id'];?>">My</a>
</div>	

<div class="lLTl21zblt active"> 
<a href="javascript:(0)">Popular</a>
</div> 

<div class="lLTl21zblt">  
<a href="./book.php">Bookmarks</a>
</div>
	
	
</div>





<?
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


$qq->setPage("/page/video/top.php");
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
