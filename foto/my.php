<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';


if (isset($_GET['type'])) {
	
if ($_GET['type'] == 'desc') {
	$huhulnkqwe = "type=desc&";
	$tpsrqwe = 'desc';
	$hlsqwme123_1 = 'selected';
	$hlsqwme123_2 = '';
} else {
	$tpsrqwe = 'asc';
	$huhulnkqwe = "type=asc&";
	$hlsqwme123_1 = '';
	$hlsqwme123_2 = 'selected';
}	
	
	
	
} else {
	$tpsrqwe = 'desc';
	$huhulnkqwe = "";
	$hlsqwme123_1 = '';
	$hlsqwme123_2 = '';
}




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



$qq = new Pagination();


$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `gallery_foto` WHERE `id_user` = ?",[$ank['id']]);


$ttlq = $qq->calculation($kzftch322, $set['p_str']);





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
<a href="/profile.php?id=<?=$ank['id'];?>">Posts</a>
</div>	

<div class="lLTl21zblt "> 
<a href="/user/profile/?id=<?=$ank['id'];?>">About</a>
</div> 


<div class="lLTl21zblt ">  
<a href="/user/friends/?id=<?=$ank['id'];?>">Friends</a>
</div>


<div class="lLTl21zblt active">  
<a href="javascript:(0)">Photos</a>
</div>
	
	
</div>





			

		<div class="phtshnq11a">
			
			
			<div>

				<div class="phthdrsctns">
					<div><a href="./add.php" class="kPHoqzDv1z"><span class="MatiCons25">photo</span>  Post new</a></div>
				</div>			
				
			</div>


			<div>
				
					<select onchange="Chngqlqnk(this)">
						<option value="" disabled selected>Sorting</option>
						<option value="desc" <?=$hlsqwme123_1;?>>Descending</option>
						<option value="asc" <?=$hlsqwme123_2;?>>Ascending</option>
					</select>
				
				<script>
				
					function Chngqlqnk(event) {
						window.location = "?id=<?=$ank['id'];?>&type="+event.value;
						//console.log(event.value)
					}
					
				</script>
			
			</div>
		
		
		</div>










<? if ($kzftch322>0) { ?>

<div class="phtFlxmAlmb">

	
<?

$qfetch = $pdo->query("SELECT * FROM `gallery_foto` WHERE `id_user` = ? ORDER BY `id` $tpsrqwe LIMIT $ttlq, $set[p_str]",[$ank['id']]);

while ($post = $qfetch->fetch())
{


$photols = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `photo_like` WHERE `foto` = '".$post['id']."'");
?>

	<div class="phtAlmbLstDv" onclick="window.location = '/foto/foto.php?id=<?=$post['id'];?>';">
			<img class="AlmbPhotDspW" src="/images/gallery/640/<?=$post['photo_addr'];?>.jpg"> 	
			<div class="childp">
				<div class="mndvsdpfqsl1">
				<div class="phAlcntrDvCntqpFn1z"><i class="fa-solid fa-heart"></i> <?=$photols;?></div>
				<div class="phAlcntrDvCntqpFn1z"><?echo wudate($post['time']);?></div>
				</div>
			</div>
	</div>
 

<? } ?>



</div>


<? } ?>






<? 

$qq->setPage("/foto/my.php?$huhulnkqwe", "id=$ank[id]");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();

?>



<? if ($user['id'] == $ank['id']) { ?>
	<div style="background:#fff;padding:10px;border-radius:10px;"><a  href="add.php"> Post new photos </a></div>
<? } ?>



<? include '../inc/footer.php'; ?>
