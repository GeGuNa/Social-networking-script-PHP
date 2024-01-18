<?

include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';



if (!isset($_GET['id'])) {
header("Location: index.php");
exit;
}
	
if (!is_numeric($_GET['id'])) {
header("Location: index.php");
exit;
}	


$ank=get_user(nums($_GET['id']));

if (!$ank)
{
header("Location: /index.php");
exit;
}

if ($user['id'] == $ank['id']) {
header("Location: /index.php");
exit;
}



include '../../inc/header.php';
title();
aut();



/*-------------------close / ignor / off / block------------------*/


if ($user['id']!=$ank['id']) {


if_blocked($ank);

if_blacklisted($ank);

if_closed($ank);

}


/*-------------------end------------------*/





$price = 10000;
	


$time2 = $time+60*60*24;


if (isset($_POST['gifting']))
{


if (!is_numeric($_POST['sticker'])) {
header("Location: /index.php");
exit;
}	


 

$idpst = filter($_POST['sticker']);	
	

if ($idpst<=0)$er1 = 'uups';	
if ($idpst>18)$er1 = 'uups';
if ($user['balls']<$price)$er1 = 'Not enough money';	

if (isset($er1)) {
	
	
	$_SESSION['message'] = $er1;
	header("Location: ?id=".$ank['id']);
	exit;
	
} else {
	
	
	$pdo->query("INSERT INTO `user_stickers` (`who`, `user`, `time`, `sticker_id`, `when`, `type`) VALUES(?,?,?,?,?,?)", [$ank['id'], $user['id'], $time2, $idpst, $time, 'love']);


	$pdo->exec("UPDATE `user` SET `balls` = `balls` - $price  WHERE `id` = $user[id]");


	$_SESSION['message'] = 'წარმატებით დაასტიკერეთ';
	header("Location: /info.php?id=".$ank['id']);
	exit;

	
	
	
}


	




}

?>






<div class="ksmz_mnt11_zlmqe1">
	Gifting the stickers to the user
</div>




<div class="kz_strk11">
	
<div class="pointer">
	<img class="mqk_mx1psot1" onclick="window.location='love.php?id=<?=$ank['id'];?>';" src="/img/stickers/love/1.png">
</div>

<div class="pointer">
	<img class="mqk_mx1psot1" onclick="window.location='wedding.php?id=<?=$ank['id'];?>';" src="/img/stickers/wedding/1.png">
</div>

<div class="pointer">
	<img class="mqk_mx1psot1" onclick="window.location='bday.php?id=<?=$ank['id'];?>';" src="/img/stickers/bday/4.png">
</div>


</div>




<form class='nav2' method='post' action='?id=<?php echo $ank['id'];?>'>

<? foreach(range(1,18) as $val) { ?>

<img width="60" height="60" src='/img/stickers/love/<?php echo $val;?>.png'>
  <input name='sticker' type='radio' value='<?php echo $val;?>'>
	
<? } ?>



<br><input type='submit' name='gifting' value='Send' />
</form>




<div class='cl_foot1'>
	<a href='/user/gifts.php?id=<?php echo $ank['id'];?>'>Back to gifts</a>
</div>


<div class='cl_foot2'>
<a href='/'>Home</a>
</div>

<?
include '../../inc/footer.php';
?>
