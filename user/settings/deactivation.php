<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';






if (isset($_GET['act']) && $_GET['act']=='deact') {
	$pdo->exec("update `user` set `active` = '0' where `id` = '".$user['id']."'");
	header("location: /");
	exit;
}



include '../../inc/header.php';
title();
aut();



?>




<div class="fnt ">
	

<div class="cztr1frnd21">


<div><?=$usojbid->photo50(640,48,48);?></div>

<div>
	<div><?=$usojbid->nick();?></div>
	<div>Your last visit: <?=tmdt($usojbid->date_last);?></div>
	
	
</div>

</div>

<div class="czn123nav2mNR2 ">
After your will activate this function your profile will be not ... <br>
1. seen by anyone ...  <br>
2. be able to get text messages from anyone even from the admins ...  <br>
3. your profile will go offline ...  <br>
4. no one will be able to visit your page but people will be able to see your posts and your photos in some pages maybe ..  <br>
5. profile of yours will be deactivated until you will actviate it or you will notify Administrator to activate it (only the founder not some ordinary admins can do so) ..  <br>
6. every posts every text messages everything you have after reactivating your profile you will have all of them, this function doesn't remove anything it will just deactivate your page and it will be inaccessible for anyone even for the founder himself ...  <br>
7. this function will help you if you just want to leave the site for some time ,  or you want just to go without removing your page so you just can deactivate it ...  <br>
8. if you have some questions you can ask it at <a href="/page/support">Support</a> page and we will try to help you out = ))
</div>	


</div>

<div> 
	

</div>

<a href="?act=deact">
<div class="cnst123_bntcatv">Deactivate</div>
</a>

<div class="RGQWEMHm">
<a href='/user/settings/'> Account settings</a>
</div>



<?
include '../../inc/footer.php';
?>
