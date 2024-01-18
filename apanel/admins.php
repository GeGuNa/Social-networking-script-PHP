<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';






include '../inc/header.php';
title();
aut();


if ($user['level']<2)
{
header("Location: /index.php");
exit;
}


$qq = new Pagination();


$k_post=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` where `level` > '0'");


$ttlq = $qq->calculation($k_post, $set['p_str']);




?>


<div class="pstrHr1d fnt" style="margin-bottom:10px;">ადმინისტრაცია</div>

<?

$q3z1 = $pdo->query("SELECT `id` FROM `user` where `level` > '0' ORDER BY `id` ASC LIMIT $ttlq, $set[p_str]");

while ($ank = $q3z1->fetch())
{
	

$fank = new user($ank['id']);



?>







<div class="frlst21_22">




<div>	
	
<div class="pchrt21">
	
<div><?echo $fank->photo50(128,60,60,'50%'); ?></div>	

<div style="align-self: center;">

    
	
	
	<div><?echo $fank->nick(); ?></div>
	<div><?=$fank->user_status();?></div>
	

	
	
</div>


</div>	
		


</div>




<div class="pCntr2">


	
<span onclick="ShowThings(this)" class="Drpdnw material-symbols-outlined" style="cursor:pointer;user-select:none;" data_id="<?=$fank->id;?>">more_horiz</span>

<span class="taddfrd" style="display:none;">Add Friend</span>


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


$qq->setPage("/apanel/admins.php");
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
