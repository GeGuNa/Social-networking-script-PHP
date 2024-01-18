<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';


if (isset($_GET['id'])) {
	
if (!is_numeric($_GET['id'])) {
header("Location: /index.php");
exit;		
}

$ank = get_user(nums($_GET['id']));

if (!$ank) {
header("Location: /index.php");
exit;		
}
		

} else {
	
	$ank = get_user($user['id']);
}


if (isset($_GET['act']) && $_GET['act']=='clean') {
	$pdo->query("DELETE FROM `friends_requests` WHERE `user` = ?", [$user['id']]);
	header("location:  ?id=$ank[id]");
	exit;
}




include '../../inc/header.php';


title();
aut();

$qq = new Pagination();



/*-------------------close / ignor / off / block------------------*/


if ($user['id']!=$ank['id']) {


if_blocked($ank);

if_blacklisted($ank);

if_closed($ank);

}


/*-------------------end------------------*/




$n1 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends` WHERE `user` = '".$ank['id']."'");

$snrq1 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends_requests` WHERE `who` = '".$user['id']."'");

	$tpsrqwe = 'desc';
	$huhulnkqwe = "";
	$hlsqwme123_1 = '';
	$hlsqwme123_2 = '';


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

	<div style="position:relative;display: flex;width: 100%;justify-content: center;align-items: center;height: 290px;flex-direction:column;">
		
		<div style="position:absolute;">
			<div><?=$qwe->photo2(128, 128, 128, "50%"); ?></div>
			<div style="color: #fff !important;line-height: 1.7;display: block;margin-top: 5px;text-align: center;"><?=$qwe->nick; ?></div>
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


<div class="lLTl21zblt active" active>  
<a href="javascript:(0)">Friends</a>
</div>


<div class="lLTl21zblt">  
<a href="/foto/my.php?id=<?=$ank['id'];?>">Photos</a>
</div>
	
	
</div>




<div style="">


			

		<div class="phtshnq11a">
			
			
			<div>

				<div class="phthdrsctns">
					<div>Friends</div>
				</div>			
				
			</div>


			<div>
				
				
				<? if ($browser != 'wap') { ?>
				
					<input type="text" value="" placeholder="Search" style="border-radius:20px;height:35px;">
				
				<? } else { ?>
				
				
<select name="friends" class="cnt12ffr" onchange="Reloc(this.value)">
	
<option <?=(!isset($_GET['type']) ? 'selected' : '');?> value="?id=<?=$ank['id'];?>">All</option>

<? if ($ank['id']!=$user['id']) { ?>
	
<option <?=(isset($_GET['type']) && $_GET['type']=='common' ? 'selected' : '');?> value="?id=<?=$ank['id'];?>&type=common">Common</option>

<? } ?>

<option <?=(isset($_GET['type']) && $_GET['type']=='online' ? 'selected' : '');?> value="?id=<?=$ank['id'];?>&type=online">Online</option>


<? if ($ank['id'] == $user['id']) { ?>
	
<option <?=(isset($_GET['type']) && $_GET['type']=='sent' ? 'selected' : '');?> value="?id=<?=$ank['id'];?>&type=sent">Sent</option>

<option <?=(isset($_GET['type']) && $_GET['type']=='new' ? 'selected' : '');?> value="?id=<?=$ank['id'];?>&type=new">Requests</option>

<? } ?>

</select>
				
				<? } ?>
				<script>
				
					function Chngqlqnk(event) {
						window.location = "?id=<?=$ank['id'];?>&type="+event.value;
						//console.log(event.value)
					}
					
					
					function Reloc(val) {
						window.location = val
					}

					
				</script>
			
			</div>
		
		
		</div>




</div>








<? if ($browser == 'wap') { ?>

<?


if (!isset($_GET['type'])) {
	$tp21z = 'selected';
} else if (isset($_GET['type']) && $_GET['type']=='online') {
	
} else if (isset($_GET['type']) && $_GET['type']=='sent') {
	
} else if (isset($_GET['type']) && $_GET['type']=='new') {
	
} else if (isset($_GET['type']) && $_GET['type']=='common') {
	
} else {
	
}
	
	
	 
	
	
?>




<? }  else { ?>
	

	
	
	

<div class="cztr1frnd21">
	

<div class="cnf213zble"> 
<a href="?id=<?=$ank['id'];?>">All</a>
</div> 

<div class="cnf213zble"> 
<a href="?id=<?=$ank['id'];?>&type=online">Online </a>
</div> 

<? if ($ank['id']!=$user['id']) { ?>
<div class="cnf213zble"> 
<a href="?id=<?=$ank['id'];?>&type=common">Common </a>
</div> 
<? } ?>


 


<? if ($ank['id']==$user['id']) { ?>
	
<? if ($snrq1>0) { ?>
<div class="cnf213zble"> 
<a href="?id=<?=$ank['id'];?>&type=sent">Sent </a>
</div>
<? } ?>	
	
	
<div class="cnf213zble"> 
<a href="?id=<?=$ank['id'];?>&type=new">Requests </a>
</div>	

<? } ?>
	
</div>


<? } ?>






<?




if (!isset($_GET['type'])) {
	
$navigation = 'id='.$ank['id'].'';

$k_post = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends` WHERE `user` = ?", [$ank['id']]);

$ttlq = $qq->calculation($k_post, $set['p_str']);

$query = $pdo->query("SELECT * FROM `friends` WHERE `user` = ? ORDER BY `fid` DESC LIMIT $ttlq, $set[p_str]", [$ank['id']]);


} elseif (isset($_GET['type']) && $_GET['type'] == 'online') {

$navigation='id='.$ank['id'].'&type=online';

$k_post = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends` 
JOIN `user` ON 
	`friends`.`who` = `user`.`id` 
WHERE 
`friends`.`user` = ? AND `user`.`date_last` > ?", [$ank['id'], $time-$set['online']]);

$ttlq = $qq->calculation($k_post, $set['p_str']);

$query = $pdo->query("SELECT * FROM `friends` 
JOIN `user` ON 
	`friends`.`who` = `user`.`id` 
WHERE 
`friends`.`user` = ? AND `user`.`date_last` > ?  ORDER BY `user`.`date_last` DESC LIMIT $ttlq, $set[p_str]", [$ank['id'], $time-$set['online']]);




} elseif ($user['id']==$ank['id'] && isset($_GET['type']) && $_GET['type'] == 'new') {
	

$navigation = 'id='.$ank['id'].'&type=new';

$k_post = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends_requests` WHERE `user` = ?", [$user['id']]);

$ttlq = $qq->calculation($k_post, $set['p_str']);

$query = $pdo->query("SELECT * FROM `friends_requests` WHERE `user` = ? ORDER BY `fid` DESC LIMIT $ttlq, $set[p_str]", [$user['id']]);

}  elseif ($user['id']==$ank['id'] && isset($_GET['type']) && $_GET['type'] == 'sent') {

$navigation = 'id='.$ank['id'].'&type=sent';

$k_post = $pdo->queryFetchColumn("SELECT COUNT(*)	FROM `friends_requests` WHERE `who` = ?", [$user['id']]);

$ttlq = $qq->calculation($k_post, $set['p_str']);

$query = $pdo->query("SELECT * FROM `friends_requests` WHERE `who` = ? ORDER BY `fid` DESC LIMIT $ttlq, $set[p_str]", [$user['id']]);

}  elseif (isset($_GET['type']) && $_GET['type'] == 'common') {

$navigation = 'id='.$ank['id'].'&type=common';

$k_post = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends` WHERE `user` = ? AND `who` in (select `who` from `friends` where `user` = ?)", [$user['id'], $ank['id']]);

$ttlq = $qq->calculation($k_post, $set['p_str']);

$query = $pdo->query("SELECT *  FROM `friends` WHERE `user` = ? AND `who` in (select `who` from `friends` where `user` = ?) ORDER BY `fid` DESC LIMIT $ttlq, $set[p_str]", [$user['id'], $ank['id']]);

}  else {

$navigation = 'id='.$ank['id'].'&type=common';

$k_post = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends` WHERE `user` = ?", [$ank['id']]);

$ttlq = $qq->calculation($k_post, $set['p_str']);

$query = $pdo->query("SELECT * FROM `friends` WHERE `user` = ? ORDER BY when DESC LIMIT $ttlq, $set[p_str]", [$ank['id']]);

}



if ($k_post == 0) { ?>
	<div class="SometimesDiplay">Here's nothing</div>
<? }



//mysql_query("INSERT INTO `friends` (`user`, `who`, `when`) values('".$user['id']."', '3619', '".$time."')");
//mysql_query("INSERT INTO `friends` (`user`, `who`, `when`) values('3619', '".$user['id']."', '".$time."')");



?>



<style>

.crlscfn21 {
	
	    color: #808080 !important;
    font-family: sans-serif;

}

</style>



<?
while ($friend = $query->fetch())
{

//$frend = get_user($friend['frend']);



if ($user['id']==$ank['id'] && isset($_GET['type']) && $_GET['type'] == 'new') {
	$fank = new user($friend['who']);
} else if ($user['id']==$ank['id'] && isset($_GET['type']) && $_GET['type'] == 'sent') {
	$fank = new user($friend['user']);
} else if (isset($_GET['type']) && ($_GET['type'] == 'online' || $_GET['type'] == 'common')) {
	$fank = new user($friend['who']);
}  else {
	$fank = new user($friend['who']);
}



$k_pozst = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends` WHERE `user` = ? AND `who` in (select `who` from `friends` where `user` = ?)", [$user['id'], $fank->id]);

?>










<div class="cfrqwe12fr1">




<div>	
	
<div class="pchrt21">
	
<div><?echo $fank->photo3(128,70,70); ?></div>	

<div class="dflexAcenter">

    
	
	
	<div><?echo $fank->nick(); ?></div>
	
	<? if ($user['id']!=$fank->id && $k_pozst>0) { ?>	
	<div><a class="crlscfn21" href="/user/friends/?id=<?=$fank->id;?>&type=common"><?=$k_pozst;?> საერთო მეგობარი</a></div>
	<? } ?>
	
	<? if ($user['id']==$ank['id']) { ?>	
		<div><?php echo tmdt($friend['when']); ?> </div>
	<? } ?>
	
	
</div>


</div>	
		


</div>




<div class="dflexAuto">


<? if ($user['id']==$ank['id'] && isset($_GET['type']) && $_GET['type'] == 'new') { ?>
	
<a href='/user/friends/create.php?accept=<?php echo $fank->id;?>' style="padding-right:4px;">
<span class="czt21btn"> 
Accept
</span>
</a> 


<a href='/user/friends/create.php?cancel=<?php echo $fank->id;?>'>
<span class="czt21btn2"> 
Cancel request
</span>
</a>

	
	
	
<? } else if ($user['id']==$ank['id'] && isset($_GET['type']) && $_GET['type'] == 'sent') { ?>

<a href='/user/friends/create.php?cancel=<?php echo $fank->id;?>'>
<span class="czt21btn2"> 
Cancel request
</span>
</a>


<? } else { ?>

<? if ($user['id']!=$fank->id) { ?>	
	
<span onclick="ShowThings(this)" class="Drpdnw material-symbols-outlined czg21gstr1123" data_id="<?=$fank->id;?>">more_horiz</span>

<? } } ?>


<div class="drpdmain" pstevents="<?=$fank->id;?>" style="display: none;">
	
	
<div class="drpd">


<div>
	<span class="material-symbols-outlined">Send</span> 
	<a href="/mail.php?id=<?=$fank->id;?>">Message</a>
</div>

<? if ($user['id'] == $ank['id']) { ?>	
<div>
	<span class="material-symbols-outlined">group_remove</span> 
	<a href="/user/friends/create.php?delete=<?=$fank->id;?>">Delete</a>
</div>
<? } ?>

<div>
	<span class="material-symbols-outlined">group</span> 
	<a href="/user/friends/?id=<?=$fank->id;?>">Friend list</a>
</div>

</div>


</div>




</div>

</div>














<?
}

?>



<div class='cl_foot1'>
  <a href='/'>Home</a>
</div>



<?
//if ($k_page>1)str($navigation, $k_page, $page); 


$qq->setPage("/user/friends/?", "$navigation");
$qq->setTotal($k_post);
$qq->setPerPage($set['p_str']);

$qq->rendering();




include '../../inc/footer.php';
?>
