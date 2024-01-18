<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';
include '../../inc/header.php';
title();
aut();




$fasi = 100000;

if (isset($_POST['save'])) {
	
$nick = my_esc($_POST['nick']);	
$onick = my_esc($user['nick']);	
	
if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` WHERE `nick` = ?",[$nick]) == 1)Error('Already taken');


if (strlen2($nick)<3)Error('Minimum 3 symbols');

if (strlen2($nick)>32)Error('Maximum 32 symbols');


if (!validateUsername($nick))Error('Unaccepted symbols');

if (if_whitespace($nick))Error('Unaccepted symbols');



if (!isset($_SESSION['err'])) {	
	
if ($user['nick'] != $nick) {
	
$pdo->query("INSERT INTO `history_nick` SET `nick_last` = ?, `nick_new` = ?, `user_id` = ?, `who` = ?, `time` = ?", [$onick, $nick, $user['id'],$user['id'], $time]	);
	
	
}
	
$pdo->query("UPDATE `user` SET `nick` = ? WHERE `id` = ?", [$nick, $user['id']]);

$_SESSION['message'] = 'Changed successfully';

header("Location: nick.php");
exit;

}

}




?>



<div class='ftrwithborder'>
	
<h3 style="margin:10px;">Chaning the username</h3>	
	
<form method='post' action='nick.php'>


	<div class="form-group">
	<input type='text' name='nick' minlength="3" required placeholder="Enter username" value='' maxlength='32'>
	</div>

	<div class="form-group">
	<input type='submit' name='save' value='Change'>
	</div>


</form>


</div>


<div class='ftrwithborder'>
* You can use every letter from every language and all numbers in your nickname along with  =_.-, 
</div>




<div class="ftrwithborder">
	<a href="./">Back</a>
</div>


<?
include '../../inc/footer.php';
?>
