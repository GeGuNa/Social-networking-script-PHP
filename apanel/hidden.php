<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';






if ($user['level']<5) {
header("location: /");
exit;	
}


include '../inc/header.php';
title();
aut();








if ($user['version']=='wap'){
	$bqweq = 'background-color: inherit !important;';
} else {
	$bqweq = '';
}






$k_post=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` WHERE `online_showing` = '1'");



$qq = new Pagination();



$ttlq = $qq->calculation($k_post, $set['p_str']);




$q3z = $pdo->query("SELECT * FROM `user` WHERE `online_showing` = '1' ORDER BY `hlast` DESC LIMIT $ttlq, $set[p_str]");


if ($k_post==0){	
echo "<div class='nav1'>";	
echo "ცარიელია ...";	
echo "</div>";
}


?>






<div class="PHeadLine fnt">Hidden users</div>






<?

while ($ank = $q3z->fetch())
{
	
$fank = new user($ank['id']);
	
if ($user['level']>0){
	$phzst211 = '80';
} else {
	$phzst211 = '60';
}	


?>
	
	
	
	
	

<div class="frlst21_22">




<div>	
	
<div class="pchrt21">
	
<div><?echo $fank->photo50(128,$phzst211,$phzst211,'50%'); ?></div>	

<div class="dflexAcenter">

    
	
	
	<div><?echo $fank->nick(); ?></div>
	<div>Where: <?=Where($fank->hrul); ?></div>
	<div>Last visit: <?=tmdt($fank->hlast); ?></div>



	
	
</div>


</div>	
		


</div>




<div class="dflexAcenter">


	
<span onclick="ShowThings(this)" class="Drpdnw material-symbols-outlined CursorUser"  data_id="<?=$fank->id;?>">more_horiz</span>


<div class="drpdmain" pstevents="<?=$fank->id;?>" style="display: none;">
	
	
<div class="drpd">


<? if ($fank->id != $user['id']) { ?>
<div>
	<span class="material-symbols-outlined">Send</span> 
	<a href="/mail/who.php?who=<?=$fank->id;?>">Message</a>
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



	

<?

$qq->setPage("/apanel/hidden.php");
$qq->setTotal($k_post);
$qq->setPerPage($set['p_str']);

$qq->rendering();

?>



<div class="cl_foot2">
 <a href="/apanel/">Admin</a>
</div>

<div class="cl_foot3">
 <a href="/">Home</a>
</div>



<?

include '../inc/footer.php';
?>
