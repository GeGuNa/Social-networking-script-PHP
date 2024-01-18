<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';
include '../../inc/header.php';
title();
aut();



$qq = new Pagination();




if (isset($_GET['act']) && $_GET['act']=='clean')
{
	
if ($user['level']<1) {
	header("location: /");
	exit;
}


$pdo->exec("delete from `lataria` where `finish` = '1'"); 

$_SESSION['message']='წარმატებით დასუფთავდა'; 
header("location: ?");
exit;

}


if (isset($_GET['del']) && is_numeric($_GET['del'])) {
	
$ct2id = filter($_GET['del']);	
	
$post=$pdo->fetchOne("SELECT * FROM `lataria` WHERE `id` = ?", [$ct2id]);

if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `lataria` WHERE `id` = ?", [$ct2id]) == 0) {
	
header("Location: /apps/lataria"); 
exit;

} else if ($user['level']>0) {
	
$_SESSION['message']='წარმატებით წაიშალა'; 

$pdo->query("DELETE FROM `lataria` WHERE `id` = ?", [$ct2id]);
$pdo->query("DELETE FROM `lataria_gamers` WHERE `id_game` = ?", [$ct2id]);

header("Location: /apps/lataria"); 
exit;

} else {
	
header("Location: /apps/lataria"); 
exit;

}

}


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
	
$id = filter($_GET['id']);

if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `lataria` WHERE `id` = ?", [$id]) == 0) {
	
header("Location: /apps/lataria");
exit;

} else {
	
$bzzz = $pdo->fetchOne("SELECT * FROM `lataria` WHERE `id` = ? LIMIT 1", [$id]);

$monawile = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `lataria_gamers` WHERE `id_game` = ? and `id_gamer` = '".$user['id']."'",[$id]);

if ($user['balls']<$bzzz['fsoni'])Error('არ გაქვთ '.$bzzz['fsoni'].' მონეტა');

if ($monawile>0)Error("თქვენ უკვე მონაწილეობთ ამ ლატარიაში");

if ($bzzz['finish'] == 1) {
	header("location: ?");
	exit;
}

if (!isset($_SESSION['err'])) {
	
$pdo->exec("UPDATE `user` SET `balls` = `balls` - '".filter($bzzz['fsoni'])."' WHERE `id` = '".$user['id']."'");

$pdo->query("INSERT INTO `lataria_gamers` (`id_game`, `id_gamer`, `time`) values(?, ?, ?)", [$id, $user['id'], $time]);

$bbbz2 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `lataria_gamers` WHERE `id_game` = ?", [$id]);
	
if ($bbbz2 == $bzzz['gamers']) {
	
$mogeba=filter($bzzz['gamers']*$bzzz['fsoni']);


$winer=$pdo->fetchOne("SELECT * FROM `lataria_gamers` WHERE  `id_game` = ? ORDER BY RAND() LIMIT 1", [$id]);

$loginnnn = get_user($winer['id_gamer']);

$youwon = filter(($bzzz['gamers']*$bzzz['fsoni'])+$loginnnn['balls']);


 if ($loginnnn['id'] == $user['id'])
	$_SESSION['message'] = 'თქვენ ხართ ბოლო მონაწილე, და თქვენ მოიგეთ '.$mogeba.' მონეტა !!!'; 
 else 
	$_SESSION['message'] = 'თქვენ ხართ ბოლო მონაწილე,  სამწუხარდო თქვენ წააგეთ !!!'; 


$pdo->query("UPDATE `user` SET `balls` = ? WHERE `id` = ?", [$youwon, $loginnnn['id']]);


$pdo->query("UPDATE `lataria` SET `finish` = '1', `winer` = '".$loginnnn['id']."' WHERE `id` = ?", [$id]);


$msg = my_esc($loginnnn['nick'].' მოიგო ლატარეაში '.$mogeba.' მონეტა, მიულოცეთ!!!');


//$pdo->query("INSERT INTO `info` (`info`, `time`, `type`) values(?,?,?)", [$msg, $time, 'lataria']);


} else {
	
$_SESSION['message'] = 'ფსონი მიღებულია, ჩამოგეჭრათ '.$bzzz['fsoni'].' მონეტა!!!'; 

}

header("Location: /apps/lataria");
exit;

}


}


}



if ($user['level']>0 && isset($_POST['add']))
{

	
$give = filter($_POST['balls']);
$gamers = filter($_POST['gamers']);
$times = filter($_POST['times']);


if ($give<1000)$err="ფსონი მინიმუმ 1000 მონეტა";
if ($give>10000000)$err="ფსონი მაქსიმუმ 10000000 მონეტა";

if ($gamers<2)$err="მოთამაშეები რაოდენობა მინიმუმ 2";
if ($gamers>30)$err="მოთამაშეები აოდენობა მაქსიმუმ 30";

if ($times==0)$err="მინიმუმ 1 ჯერ";
if ($times>10)$err="მაქსიმუმ 10 ჯერ";

if (!isset($err)) {
    
    
for($i=0; $i<$times; $i++){
	$pdo->query("INSERT INTO `lataria` (`fsoni`, `time`, `gamers`) values(?,?,?)", [$give, $time, $gamers]);
}

$_SESSION['message'] = 'წარმატებით შეიქმნა'; 

header("Location: /apps/lataria");
exit;

}


}

if (isset($err))
{	
echo "<div class='err'>";
echo "$err";
echo "</div>";
}



$k_post=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `lataria`");


$ttlq = $qq->calculation($k_post, $set['p_str']);





?>


<div class="ContainerForDivs">Coins:  <b><?=$user['balls'];?></b> </div>



<div style="margin-top:10px;"></div>


<?

$q1231 = $pdo->query("SELECT * FROM `lataria` ORDER BY `time` DESC  LIMIT $ttlq, $set[p_str]");

while ($post = $q1231->fetch()) {
	
$ida = filter($post['id']);

$already = $pdo->fetchOne("SELECT * FROM `lataria_gamers` WHERE `id_game` = ? and `id_gamer` = ? LIMIT 1", [$post['id'], $user['id']]);

if ($post['finish']==0) {
	
	
if ($already>0) {
	$feri='blue';
	$cqwe123 = 'user-select:none;';
} else {
	$feri='green';
	$cqwe123 = '';
}	
	

} else {
	$cqwe123 = 'user-select:none;';
}

if ($post['finish']==1)$feri='red';	





?>

<div class="cointS21zzaq">


<div class="ContainerForDivsWithBorderbottom"> 

<?if ($user['level']>0) { ?>
	
<span class='box'>
	<a href='?del=<?=$post['id'];?>'>	<span class="MatiCons25">delete</span>	</a>
</span>

<? } ?>



<? if ($post['finish']==0 && !$already) { ?>
<a href="?id=<?=$post['id'];?>">
<? } ?>
<span style="color:<?=$feri;?>;<?=$cqwe123;?>"><?=$post['gamers'];?> კაციანი ლატარია, ფსონი <?=$post['fsoni'];?></span>

<? if ($post['finish']==0 && !$already) { ?>
	</a>
<? } ?>

</div>

<?
$mtvleli=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `lataria_gamers` WHERE `id_game` = ?", [$ida]);
?>
	
<div class="ContainerForDivs"> 
	
<?=($mtvleli==0 ? 'No one partake' : 
''.($post['finish']==1?'Participated:':'

'.($mtvleli == 1 ? 'Participates:' : 'Participants').'


').'');

?>	
	
<?
$result = $pdo->query("SELECT * FROM `lataria_gamers` WHERE `id_game` = ?", [$ida]); 


$zf1231 = $result->rowCount();
$czr123 = 1;

while($row = $result->fetch()) { 
	
$login = new user($row['id_gamer']);

if ($zf1231 < 1) {
		echo $login->nick();
} else {
		echo $login->nick()."".($zf1231!=$czr123 ? ", " : " ");
}

$czr123++;
}

if ($post['finish']==1) {	

$loginss = new user($post['winer']);

$havewon=filter($mtvleli*$post['fsoni']);

?>

<div>
<span style="color:blue;">Winner: </span>
<?echo $loginss->nick();?> and won <?=$havewon;?> coins

</div>


<?	 } ?>


</div>



</div>

<? } ?>







<?

$qq->setPage("/apps/lataria/");
$qq->setTotal($k_post);
$qq->setPerPage($set['p_str']);

$qq->rendering();




if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `lataria` WHERE `finish` = '1'")>0 && $user['level']>0) {
echo '<div class="nav2"><a href="?act=clean">Lets clean the finished ones</a></div>';	
}

if ($user['level']>0) { ?>
	
	
<div class='nav2'>
<form action='/apps/lataria/' method='post'>
Bid<br>
<input type='text' name='balls' placeholder="Price" value=''><br>
Participants<br>
<input type='text' name='gamers' placeholder="Maximum gamers" value=''><br>
How many times we should add it ?<br>
<input type='text' name='times' placeholder="how many times we should repeat this action?" value='1'><br>
<input type='submit' name='add' value='Create'>
</form>
</div>

<?
}




include '../../inc/footer.php';
?>
