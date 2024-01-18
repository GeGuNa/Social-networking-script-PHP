<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';


header("location: /");

include '../inc/header.php';
title();
aut();

$qq = new Pagination();

if (isset($_GET['old'])) {
	$sort="ASC";
	$list="`id`";
	$navigation='?old';
	$activ=1;
} elseif (isset($_GET['like'])) {
	$sort="DESC";
	$list="`like`";
	$navigation='?like';
	$activ=2;
} elseif (isset($_GET['gogo'])) {
	$sort="DESC";
	$list="`id`";
	$navigation='?gogo';
	$activ=4;
} elseif (isset($_GET['bichi'])) {
	$sort="DESC";
	$list="`id`";
	$navigation='?bichi';
	$activ=5;
} else {
	$sort="DESC";
	$list="`id`";
	$navigation='';
	$activ=3;
}



?>




<div class="pBlueWw2" style="margin-top:0;">
	
<div class="lLTl21zblt"> 
<a href="?">New</a>
</div>	

<div class="lLTl21zblt "> 
<a href="?old">Old</a>
</div> 


<div class="lLTl21zblt ">  
<a href="?like">Popular</a>
</div>


<div class="lLTl21zblt">  
<a href="?bichi">Boys</a>
</div>
	
<div class="lLTl21zblt">  
<a href="?gogo">Girls</a>
</div>
		
	
	
</div>






<?


if (isset($_GET['gogo'])) {
	
$searchc = "SELECT COUNT(*) FROM `gallery_foto` where `id_user` IN ( SELECT `id` FROM user WHERE `gender` = 'female' ) and `photo_seeing` = '0'";

} else if (isset($_GET['bichi'])) {
	
$searchc = "SELECT COUNT(*) FROM `gallery_foto` where `id_user` IN ( SELECT `id` FROM user WHERE `gender` = 'male' ) and `photo_seeing` = '0'";

} else {
	
$searchc = "SELECT COUNT(*) FROM `gallery_foto` where `photo_seeing` = '0'";

}




$kzftch322 = $pdo->queryFetchColumn("$searchc");

$ttlq = $qq->calculation($kzftch322, $set['p_str']);




if (isset($_GET['gogo'])) {
	
$qsearch = "SELECT * FROM `gallery_foto` where `id_user` IN ( SELECT `id` FROM user WHERE `gender` = 'female' ) and `photo_seeing` = '0' ORDER BY $list $sort LIMIT $ttlq, $set[p_str]";

} else if (isset($_GET['bichi'])) {
	
$qsearch = "SELECT * FROM `gallery_foto` where `id_user` IN ( SELECT `id` FROM user WHERE `gender` = 'male' ) and `photo_seeing` = '0' ORDER BY $list $sort LIMIT $ttlq, $set[p_str]";

} else {
	
$qsearch = "SELECT * FROM `gallery_foto` where  `photo_seeing` = '0' ORDER BY $list $sort LIMIT $ttlq, $set[p_str]";	

}


?>




<? if ($kzftch322>0) {?>
	<div class="phtFlxmAlmb">
<? } ?>


<?

$q = $pdo->query($qsearch);

while ($post = $q->fetch())
{
	?>
	
	
	<div class="phtAlmbLstDv" onclick="window.location = '/foto/foto.php?id=<?=$post['id'];?>';">
			<img class="AlmbPhotDspW" src="/images/gallery/640/<?=$post['photo_addr'];?>.jpg"> 	
			
	</div>



<?
}


?>


<? if ($kzftch322>0) {?>
	</div>
<? } ?>





<div class='NavFoot' style="margin-top:10px;">
<a href='/foto/my.php?id=<?php echo $user['id'];?>'> My photos </a>
</div>

<?

$qq->setPage("/foto/", $navigation);
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();


?>




<?
include '../inc/footer.php';
?>
