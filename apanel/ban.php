<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';







//echo $time+3600*8;

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




include '../inc/header.php';
title();
aut();


if ($user['level']<1)
{
header("Location: /index.php");
exit;
}	


if ($user['id'] == 2769)	{
	
if ($ank['level']>4) {
header("Location: /index.php");
exit;	
}	
	
	
	
} else {
	
if ($user['level']<=$ank['level'] || $user['id']==$ank['id'])
{
header("Location: /index.php");
exit;
}	
	
	
	
}




/*

if (isset($_GET['unset']) && mysql_result(mysql_query("SELECT COUNT(*) FROM `ban` WHERE `id_user` = '".intval($ank['id'])."' AND `id` = '".intval($_GET['unset'])."'"),0)){
$ban_info=mysql_fetch_array(mysql_query("SELECT * FROM `ban` WHERE `id_user` = '$ank[id]' AND `id` = '".intval($_GET['unset'])."'"));
$ank2=mysql_fetch_array(mysql_query("SELECT * FROM `user` WHERE `id` = '$ban_info[id_ban]' LIMIT 1"));


mysql_query("UPDATE `ban` SET `time` = '$time' WHERE `id` = '".intval($_GET['unset'])."' LIMIT 1");
}*/


if (isset($_GET['del'])) {


if (!is_numeric($_GET['del'])) {
	header("Location: /index.php");
	exit;
}	

$qqzrmq1 = number($_GET['del']);

	
if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `ban` WHERE `id_user` = ?", [$ank['id']]) == 0)$err='ar aris blokirebuli';


if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `ban` WHERE `id_user` = ? AND `id` = ?", [$ank['id'], $qqzrmq1]) == 0)$err='ar aris blokirebuli';



if (!isset($err))
{

admin_log('Momxmarebeli','Profili',"moxsna bani $ank[nick] -s");
//mysql_query("DELETE FROM `ban` WHERE `id` = '".intval($_GET['del'])."'");

$pdo->query("UPDATE `ban` SET `time` = ? WHERE `id` = ? and `id_user` = ?", [$time,$qqzrmq1,$ank['id']]);


header('Location: ban.php?id='.$ank['id'].'');
exit;
}

}



if (isset($_POST['block'])) {
	
$timeban = $time;
$droo = filter($_POST['time']);
$why1 = my_esc($_POST['reason']);
$bntmty = filter($_POST['ban_time_type']);


if ($bntmty == 1)$timeban+=(($droo)*60);
if ($bntmty == 2)$timeban+=(($droo)*60*60);
if ($bntmty == 3)$timeban+=(($droo)*60*60*24);
if ($bntmty == 4)$timeban+=(($droo)*60*60*24*30);


if ($droo<1)$err='Shecdoma Droshi';
if ($timeban<$time)$err='Shecdoma blokis droshi';
if (strlen2($why1)>100024)$err='Komentari Maximum 100024 simbolo';
if (!in_array($bntmty, array(1,2,3,4)))$err='Shecdoma Droshi';




if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `ban` WHERE `id_user` = ? AND `time` > ?", [$ank['id'],$time])>0) $err='ukve blokirebulia';



if (!isset($err)) {

$pdo->query("INSERT INTO `ban` (`id_user`, `id_ban`, `reason`,`time`,`when`) VALUES (?, ?,?, ?, ?)",[$ank['id'], $user['id'],$why1, $timeban, $time]);





$pdo->query("UPDATE `user` SET `act` = '1' WHERE `id` = ?",[$ank['id']]);



admin_log('Momxmarebeli','Profili',"Dabloka niki $ank[nick]");
header('Location: ban.php?id='.$ank['id'].'');
exit;
}


}

if (isset($err))
{
echo "<div class='err'>";
echo "$err";
echo "</div>";
}
?>



<div class="pstrHr1d fnt ftrwithborder">მომხმარებლის ბლოკირება</div>

<?


//$k_post=mysql_result(mysql_query("SELECT COUNT(*) FROM `ban` WHERE `id_user` = '".$ank['id']."'"),0);


$q=$pdo->query("SELECT * FROM `ban` WHERE `id_user` = ? ORDER BY `time` DESC LIMIT 5",[$ank['id']]);


while ($post = $q->fetch()) {
	
$ank2 = new user($post['id_ban']);
?>




<div class="ftrwithborder">

<strong>Blocked by</strong> 	<?=$ank2->nick();?> <br/>

	
<b>Why</b>: <?=Unescaped($post['reason']);?>





<br>

<b>When:</b>  <?=when($post['when']); ?></span><br>
<strong>Ban will expire:</strong> <?=date("H:i:s d-M-y", $post['time']); ?>

<? if ($post['time']>$time && $user['level']>=4){ ?>
	
   <a href='ban.php?id=<?=$ank['id'];?>&amp;del=<?=$post['id'];?>'><img src='/img/del.png'></a>

<? } ?>




</div>

<? } ?>


<div class='ftrwithborder'>
IP: <?=Unescaped($ank['ip']);?> <br>
Browser: <?=Unescaped($ank['ua']);?> <br>
</div>
	

<div class='ftrwithborder'>
ასეთ სოფტს და იპს ფლობენ:<br/>
<?
$q1 = $pdo->query("SELECT * FROM `user` WHERE `ip` = ? AND `ua` = ? order by id ASC limit 100",[my_esc($ank['ip']),my_esc($ank['ua'])]);

while ($us1 = $q1->fetch()) {
$q11 = new user($us1['id']);	
	echo $q11->nick().", ";
}
?>
</div>



<div class='ftrwithborder'>
ასეთ სოფტს ფლობენ:<br/>
<?
$q2=$pdo->query("SELECT * FROM `user` WHERE `ua` = ? order by id DESC LIMIT 5", [my_esc($ank['ua'])]);
while ($us2=$q2->fetch()) {
	
$q13 = new user($us2['id']);	
	echo $q13->nick().", ";

}
?>
</div>




<div class='ftrwithborder'>
ასეთ ip'ს ფლობენ:<br/>
<?
$q22=$pdo->query("SELECT * FROM `user` WHERE `ip` = ? order by id DESC LIMIT 5", [my_esc($ank['ip'])]);
while ($us23=$q22->fetch()) {
	
$q133 = new user($us23['id']);	
	echo $q133->nick().", ";

}
?>
</div>

<div class='ftrwithborder'>
<form action='ban.php?id=<?=$ank['id'];?>' method='post'>

<br>Why:<br>
<textarea name='reason'></textarea><br>

Time: <input type='text' name='time' value='20' maxlength='11' />

<select name='ban_time_type'>
<option value='1' selected>წუთი</option>
<option value='2'>საათი</option>
<option value='3'>დღე</option>
<option value='4'>თვე</option>
</select>


<br>

<input type='submit' name='block' value='Block'>
</form>
</div>


<div class="break">
	<a href="/info.php?id=<?=$ank['id'];?>">Back</a>
</div>


<?
include '../inc/footer.php';
?>
