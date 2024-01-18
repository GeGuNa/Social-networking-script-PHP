<?

include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';


if (!isset($_GET['id'])) {
header("Location: /index.php");
exit;
}
	
if (!is_numeric($_GET['id'])) {
header("Location: /index.php");
exit;
}	


$ank=get_user(nums($_GET['id']));

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

if ($user['id'] == $ank['id'])
{

if (isset($_GET['act']) && $_GET['act'] == 'trashing')
{
	$pdo->exec("DELETE FROM `user_stickers` WHERE `who` = '$user[id]'");
	$_SESSION['message'] = 'წარმატებით წაიშალა სტიკერები';
	header("Location: ?id=$user[id]");
	exit;
}


if (isset($_GET['del'])) {
	
if (!is_numeric($_GET['del'])) {
	header("Location: index.php");
	exit;
}	

$dllgqwek123 = filter($_GET['del']);
	
$pdo->query("DELETE FROM `user_stickers` WHERE `who` = ? and `id` = ?", [$user['id'], $dllgqwek123]);

header("Location: ?id=$ank[id]");
exit;
}

}



$kzftch322=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `user_stickers` WHERE `who` = $ank[id]");
?>



<div class="ksmz_mnt11_zlmqe1">
Stickers 
</div>


<? if ($kzftch322 == 0){ ?>
 <div class='SometimesDiplay'>Nothing is here</div>

<? }?>


<style>


.stck21 {
	display:block;
	width:100%;
	//background:var(--color-secondary);
	background: #c0392b;
	color:#fff;
	padding:8px;
}

.stck21 a {
	color: white !important;
}

</style>

<?





$qq = new Pagination();



$ttlq = $qq->calculation($kzftch322, $set['p_str']);




$qf1 = $pdo->query("SELECT * FROM `user_stickers` WHERE `who` = ? order by id DESC LIMIT $ttlq, $set[p_str]", [$ank['id']]);

while ($ava = $qf1->fetch())
{
	
$usojbid = new user($ava['user']);
	
	

$tpofstckr = $ava['type'];


if ($ava['time']>=$time)$stst22z_z = 'დასრულებული';

?>

<div class='nav2'>


<div><img src='/img/stickers/<?=$tpofstckr;?>/<?=$ava['sticker_id'];?>.png' style='max-width:10%;' /> </div>

<div>Author: <?=$usojbid->nick();?>  

</div>


<div>როდის: <?=times($ava['time']-(60*60*24));?></div>


<? if ($user['id'] == $ank['id']) { ?>	

<div class="stck21">

<a href="?id=<?=$ank['id'];?>&amp;del=<?=$ava['id'];?>">
	<span class="material-symbols-outlined">delete</span> Remove
</a>	

</div>
	
<? } ?>

</div>

<?
}



$qq->setPage("/user/stickers.php?", "id=$ank[id]");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();



if ($kzftch322>0 && $user['id']==$ank['id']) {
	echo "<div class='nav2'> <img src='/style/icons/str.gif'>  <a href='?id=$user[id]&act=trashing'>[გასუფთავება]</a></div>";
}

include '../inc/footer.php';
?>
