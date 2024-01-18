<?

include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';

if (isset($_GET['id'])) {
	
if (!isset($_GET['id'])) {
	header("Location: /index.php");
	exit;
}
	
if (!is_numeric($_GET['id'])) {
	header("Location: /index.php");
	exit;
}	
	

$ank = $pdo->fetchOne("SELECT * FROM `user` WHERE `id` = ?", [nums($_GET['id'])]);


if (!$ank) {
	header("Location: /index.php");
	exit;
}	

} else {
	

$ank = $pdo->fetchOne("SELECT * FROM `user` WHERE `id` = '".$user['id']."'");
  
}

$qz1 = new user($ank['id']);


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



<?
         
$ban=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `ban` WHERE `id_user` = '".intval($ank['id'])."'");

$prfpg = new user ($ank['id']);

$oneMinute=60;
$oneHour=60*60;
$hourfield=floor(($ank['time'])/$oneHour);
$minutes = floor($ank['time']/60); 
$hours = floor($ank['time']/3600); 
$minutefield = floor(($ank['time']-$hourfield*$oneHour)/$oneMinute); 


$qarrm = ['','იანვარი','თებერვალი','მარტი','აპრილი','მაისი','ივნისი','ივლისი','აგვისტო','სექტემბერი','ოქტომბერი','ნოემბერი','დეკემბერი'];



$tve = $qarrm[$ank['birth_month']];



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

<div class="lLTl21zblt active"> 
<a href="javascript:(0)">About</a>
</div> 


<div class="lLTl21zblt ">  
<a href="/user/friends/?id=<?=$ank['id'];?>">Friends</a>
</div>


<div class="lLTl21zblt">  
<a href="/foto/my.php?id=<?=$ank['id'];?>">Photos</a>
</div>
	
	
</div>














	
	
	<div class="cm_stex_8z21z">
	
	
	
<div class="cm_stex_5">Personal Information</div>




<? if (text_size($ank['ank_city'])>0) { ?>
	
	<div class="cm_stex_7">
		<div>
			<span class="cm_stex_6">Birthplace:</span> 
			<span class="cm_stex_8"><?=detect($ank['ank_city']);?></span> 
		</div>
	</div>

<? } ?>

<? if (text_size($ank['ank_name'])>0) { ?>

	<div class="cm_stex_7">
		<div>
			<span class="cm_stex_6">Full name:</span> 
			<span class="cm_stex_8"> <?=detect($ank['ank_name']);?> <?=detect($ank['gvari']);?> </span> 
		</div>
	</div>

<? } ?>




	<div class="cm_stex_7">
		<div>
			<span class="cm_stex_6">Birthday:</span> 
			<span class="cm_stex_8"> <?=$tve;?> <?=$ank['birth_day'];?>, <?=$ank['birth_year'];?> </span> 
		</div>
	</div>


<? if (text_size($ank['ank_mail'])>0) { ?>

	<div class="cm_stex_7">
		<div>
			<span class="cm_stex_6">Email:</span> 
			<span class="cm_stex_8">  <?=detect($ank['ank_mail']);?>  </span> 
		</div>
	</div>

<? } ?>


	<div class="cm_stex_7">
		<div>
			<span class="cm_stex_6">Gender:</span> 
			<span class="cm_stex_8">  <?=detect($ank['gender']);?>  </span> 
		</div>
	</div>


<? if (strlen2($ank['interests'])>0){ ?>

	<div class="cm_stex_7">
		<div>
			<span class="cm_stex_6">Interests:</span> 
			<span class="cm_stex_8">  <?=detect($ank['interests']);?>  </span> 
		</div>
	</div>

<? } ?>


<? if (strlen2($ank['languages'])>0){ ?>

	<div class="cm_stex_7">
		<div>
			<span class="cm_stex_6">Languages:</span> 
			<span class="cm_stex_8">  <?=detect($ank['languages']);?>  </span> 
		</div>
	</div>

<? } ?>





	<div class="cm_stex_7">
		<div>
			<span class="cm_stex_6">Joined:</span> 
			<span class="cm_stex_8">  <?=whenTm($ank['date_reg']);?>  </span> 
		</div>
	</div>



	<div class="cm_stex_7">
		<div>
			<span class="cm_stex_6">Last visit:</span> 
			<span class="cm_stex_8">  <?=tmdt($ank['date_last']);?>  </span> 
		</div>
	</div>


<? if (text_size($ank['bio'])>0) { ?>

<div class="cm_stex_6 p1_21z"> About me  </div>	
	
<div class="cm_stex_5 p1_z21z">

	<div class="cm_stex_8">	<?=detect($ank['bio']);?>	</div>

</div>



<? } ?>



<div class="kkppr_2"></div>

</div>


<? if ($user['id']==$ank['id']) { ?>
<div class="czkz2_edit">
<a href="/user/settings/edit.php">
<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 640 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h274.9c-2.4-6.8-3.4-14-2.6-21.3l6.8-60.9 1.2-11.1 7.9-7.9 77.3-77.3c-24.5-27.7-60-45.5-99.9-45.5zm45.3 145.3l-6.8 61c-1.1 10.2 7.5 18.8 17.6 17.6l60.9-6.8 137.9-137.9-71.7-71.7-137.9 137.8zM633 268.9L595.1 231c-9.3-9.3-24.5-9.3-33.8 0l-37.8 37.8-4.1 4.1 71.8 71.7 41.8-41.8c9.3-9.4 9.3-24.5 0-33.9z"></path></svg> Edit </a>
</div>
<? } ?>




<?
if ($user['version'] == 'wap')
	include '../../inc/footer.php';
else 
	include '../../inc/For_Profile.php';
?>
