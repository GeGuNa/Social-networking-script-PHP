<?
include 'inc/db.php';
include 'inc/main.php';
include 'inc/functions.php';
include 'inc/user.php';

if (isset($_GET['act']) && $_GET['act']=='react') {
	$pdo->exec("update `user` set `active` = '1' where `id` = '".$user['id']."'");
	header("location: /");
	exit;
}

include 'inc/header.php';

title();
aut();
?>




<div class="fnt">
	

<div class="cztr1frnd21">


<div><?=$usojbid->photo50(640,48,48);?></div>

<div>
	<div><?=$usojbid->nick();?></div>
	<div>Your last visit: <?=tmdt($usojbid->date_last);?></div>
	
	
</div>

</div>

<div class="czn123nav2mNR2">
Your account is deactivated by your choice ... <br>
if you want to reactivate it you should  click button below ...  <br>
<span class="red">* While your account being deactivated it was inaccessible for any users even for the admins themselves ... </span>
<span class="red"><br>* And if even you visited this page by entering your password and login, still your login never went to online list since its deactivated you can be sure about that no one will be able to see even if you visted this page many times not even admins themselves  ... </span>
</div>	


<div> 
	
<a href="?act=react">
<div class="cnst123_bntcatv">Activate</div>
</a>

</div>


</div>



<?
include_once 'inc/footer.php';
?>
