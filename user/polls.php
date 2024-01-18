<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';


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



include '../inc/header.php';
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









<div class="pSectVoteSMLN" style="margin-top:10px;">


<div>Votes</div>

<?php if ($user['id']==$ank['id']) { ?>
	<div><a href="/page/votes/create.php">Add New</a></div>
<? } ?>

</div>

<?


$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `poll` WHERE `id_user` = '".$ank['id']."'");


$qq = new Pagination();



$ttlq = $qq->calculation($kzftch322, $set['p_str']);





if ($kzftch322 == 0) { ?>
<div class="SometimesDiplay">Nothing's here</div>
<? } else { ?>


<div class="k_pollusr12">


<? } ?>

<?

$query = $pdo->query("SELECT * FROM `poll` WHERE `id_user` = '".$ank['id']."' ORDER BY `id` DESC LIMIT $ttlq, $set[p_str]");

while ($post = $query->fetch())
{


	

	$pank =  new user($post['id_user']);
	
if (strlen2($post['image'])>0) {
	$picpll = '/page/votes/images/'.$post['id'].'.jpg';
} else {
	$picpll = '/images/default_picture.png';	
}
	
	
	
	?>	

<div class="k_pollusr1">		
	



<div>
	<img src="<?=$picpll;?>" class="kkk_pollimg"/>
</div>






<div class="zp213">
	
	<div>

		<div class="breakw">
			<a href="/page/votes/poll.php?id=<?=$post['id'];?>"><?=output_text($post['msg']);?></a> <br/>
		</div>
	</div>	


	<div>
		<div class="breakw">Author: <?=$pank->nick();?></a></div>
	</div>	
	

</div>






</div>
<? } ?>

<? if ($kzftch322>0) { ?>
</div>
<? } ?>

<div class='cl_foot2'>
 <a href="/page/votes/">Back</a>
</div>



<? 

$qq->setPage("/user/polls.php?", "id=$ank[id]");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();
 

?>







<? include '../inc/footer.php'; ?>
