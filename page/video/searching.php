<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';

include '../../inc/header.php';

$qq = new Pagination();


title();
aut();
?>




<div class="kmnaiqn1headgings1">
		<div class="klmanchlq1illumniation"></div>
		<div class="knmaninhedq123q">Video searching</div>
		<div class="lmkmnaingq331">Find the video you are looking for</div>
</div>



<div class="pBlueWw2" style="margin-top:0;">
	


<div class="lLTl21zblt"> 
<a href="./">All</a>
</div>	


<div class="lLTl21zblt"> 
<a href="./top.php">Popular</a>
</div> 

<div class="lLTl21zblt">  
<a href="./book.php">Bookmarks</a>
</div>
	
	
</div>











<?
	
$navigation='';
$usearch = '';
$usearch2lk2kug = '';




$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `video`");
$ttlq = $qq->calculation($kzftch322, $set['p_str']);
$z1fusr1 = $pdo->query("SELECT * FROM `video` ORDER BY `id` DESC LIMIT $ttlq, $set[p_str]");




if (isset($_GET['search']) && strlen2($_GET['search'])>0) {
	
	
	$usearch = my_esc($_GET['search']);
	$usearch2lk2kug = when_editing($usearch);
	
	
	$k1pzll = filter($usearch);	
	$c2z1z = '%'.$usearch.'%';
	
	$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `video` where `name` LIKE ?",[$c2z1z]);
	$ttlq = $qq->calculation($kzftch322, $set['p_str']);



	$z1fusr1 = $pdo->query("SELECT * FROM `video` where  `name` LIKE ? ORDER BY `id` DESC LIMIT ".$ttlq.", ".$set['p_str']."",[$c2z1z]);
	$navigation='?search='.when_editing($usearch).'';

	
	
}
		

?>

<div class="ContainerForDivs">

<form method="get" action="?">
	
<div class="czntussrchglb">	
	
<div class="czntussrchglb90">
	<input type="text" placeholder="Nickname or id " name="search" maxlength="32" value="<?=$usearch2lk2kug;?>">
</div>	

<div class="czntussrchglb10 phAlcntrDv">
		<button type="submit" class="k_srhchMinq1zz"><i class="fa fa-search"></i> Find</button>
</div>


</div>	

 
</form>
</div>
 



<div class="margVidSrpq_1z"></div>




<?





if ($kzftch322 == 0) {
	echo "<div class='SpanInfoTime'>";	
	echo "Nothing is here";	
	echo "</div>";
}



?>


	<?if ($kzftch322 > 0): ?>

	<div class="vidMnLstMq1">

	<? endif; ?>

<? while ($video = $z1fusr1->fetch()){

	
	if ($video['picurl']!='') {
		$kurlq = '/page/video/images/'.$video['picurl'].'.jpg';
	} else {
		$kurlq = 'https://img.youtube.com/vi/'.detect($video['url']).'/mqdefault.jpg';
	}



$liked3 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `video_like` WHERE `id_video` = '".$video['id']."'");	

$paUa1s = new user($video['id_user']);
	
?>
	
	
	


<div class="vidchldPso13Zq1z">

	<div class="vidchldPso13z" onclick="window.location = '/page/video/video.php?id=<?echo $video['id'];?>';">
	
	<!--
			<img class="AlmbPhotDspW" src="<?echo detect($kurlq);?>"> 	
					
		-->
		
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




<? } ?>



	<?if ($kzftch322 > 0): ?>

	</div>

	<? endif; ?>

<?



$qq->setPage("/page/video/searching.php", "$navigation");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();



?>



<?
include '../../inc/footer.php';
?>
