<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';
include '../../inc/header.php';
title();
aut();


if (isset($_POST['change'])) {

$closem = filter($_POST['closemail']);
$closep = filter($_POST['closeprofile']);
$whocansee = filter($_POST['whocansee']);
$whocanfriend = filter($_POST['whocanf']);


if (!in_array($closem, array('0','1','2'))){
header("location: /index.php");
exit;
}

if (!in_array($closep, array('0','1','2'))){
header("location: /index.php");
exit;
}



if (!in_array($whocansee, array('0','1','2'))){
header("location: /index.php");
exit;
}

if (!in_array($whocanfriend, array('0','1','2'))){
header("location: /index.php");
exit;
}



$pdo->query("UPDATE `user` SET `mail_private` = ?, `private` = ?,`seeing_friend` = ?,`who_canfriend` = ?  WHERE `id` = ?", [$closem, $closep, $whocansee, $whocanfriend,  $user['id']]);



$closeo = filter($_POST['online']);

if (!in_array($closeo, array('0','1'))){
header("location: /index.php");
exit;
}

$qwmeqwe = time()-3600*24*360*50;


$pdo->query("UPDATE `user` SET `online_showing` = ?, date_last = ?  WHERE `id` = ?", [$closeo, $qwmeqwe, $user['id']]);






$_SESSION['message'] = 'Has been changed';
header("Location: ?");
exit;

}


if (isset($err))
{
echo "<div class='err'>";
echo "$err";
echo "</div>";
}




?>






<div class="cztfrprstrng2">

	<div><a href="/user/settings/"><img src="/pics/9kN.webp" width="20"></a></div>

	<div>Privacy Settings</div>

</div>


<div class='ftrwithborder'>
<form action='?' method='post'>







<div class="pHPD1FRM1">
	
	<label class="pHPD1FRM2">Who can see your page</label>

	<select name="closeprofile">
		<option value="0" <?echo ($user['private'] == 0 ? ' selected' : null);?>>Everyone</option>
		<option value="1" <?echo ($user['private'] == 1 ? ' selected' : null);?>>Only friends</option>
		<option value="2" <?echo ($user['private'] == 2 ? ' selected' : null);?>>No one</option>
	</select>

</div>	




<div class="pHPD1FRM1">
	
	<label class="pHPD1FRM2">Who can text you</label>

	<select name="closemail">
		<option value="0" <?echo ($user['mail_private'] == 0 ? ' selected' : null);?>>Everyone</option>
		<option value="1" <?echo ($user['mail_private'] == 1 ? ' selected' : null);?>>Only friends</option>
		<option value="2" <?echo ($user['mail_private'] == 2 ? ' selected' : null);?>>No one</option>
	</select>

</div>	





<div class="pHPD1FRM1">
	
	<label class="pHPD1FRM2">Active status</label>

	<select name="online">
		<option value="0" <?echo ($user['online_showing'] == 0 ? 'selected' : null);?>>On</option>
		<option value="1" <?echo ($user['online_showing'] == 1 ? 'selected' : null);?>>Off</option>
	</select>

</div>	




<!-- new functions being placed below -->



<div class="pHPD1FRM1">
	
	<label class="pHPD1FRM2">Who can befriend you</label>

	<select name="whocanf">
		<option value="0" <?echo ($user['who_canfriend'] == 0 ? ' selected' : null);?>>Everyone</option>
		<option value="1" <?echo ($user['who_canfriend'] == 1 ? ' selected' : null);?>>Only friends</option>
		<option value="2" <?echo ($user['who_canfriend'] == 2 ? ' selected' : null);?>>Friends of friends</option>
	</select>

</div>	



<div class="pHPD1FRM1">
	
	<label class="pHPD1FRM2">Who can see your friends list</label>

	<select name="whocansee">
		<option value="0" <?echo ($user['seeing_friend'] == 0 ? ' selected' : null);?>>Everyone</option>
		<option value="1" <?echo ($user['seeing_friend'] == 1 ? ' selected' : null);?>>Only me</option>
		<option value="2" <?echo ($user['seeing_friend'] == 2 ? ' selected' : null);?>>Friends</option>
	</select>

</div>	







<input class="nav2" type='submit' name='change' value='Save'>
</form>
</div>


<div class="ftrwithoutborder">
<a href="/user/settings/"> Account settings </a>
</div>



<?
include '../../inc/footer.php';
?>
