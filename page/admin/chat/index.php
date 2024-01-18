<?
include '../../../inc/db.php';
include '../../../inc/main.php';
include '../../../inc/functions.php';
include '../../../inc/user.php';






if ($user['level']<1)
{
header("Location: /index.php");
exit;
}

include '../../../inc/header.php';
title();
aut(); 

$qq = new Pagination();

if ($user['level']>3 && isset($_GET['act']) && $_GET['act']=='wall')
{
	$pdo->exec("TRUNCATE TABLE `adm_chat`");
	header("Location: ?");
	exit;
}

if (isset($_GET['del']))
{
	
if (!is_numeric($_GET['del'])) {
	header("Location: ?");
	exit;	
}	

$p1pep3 = number($_GET['del']);

	
$post=$pdo->fetchOne("SELECT * FROM `adm_chat` WHERE `id` = ?",[$p1pep3]);
$ank=$pdo->fetchOne("SELECT * FROM `user` WHERE `id` = '".$post['id_user']."'");

if (!$post) { 
	
header("Location: /index.php");
exit;

} else if ($user['level']>$ank['level'] || $user['level']!=0 && $user['id'] == $ank['id'] || $user['level']>=5) {
	
$pdo->exec("DELETE FROM `adm_chat` WHERE `id` = '".$post['id']."'");
header("Location: ?");
exit;

} else {
	
header("Location: /index.php");
exit;

}


}


if (isset($_POST['send']))
{
	
$text = my_esc($_POST['text']);


if (strlen2($text)<3)Error('გზავნილი მინიმუმ 3 სიმბოლო');
if (strlen2($text)>1024)Error('გზავნილი მაქსიმუმ 1024 სიმბოლო');




if (!isset($_SESSION['err'])) {
	

if (isset($reply) && $reply['id']!=$user['id']) {
	
user_activity($reply['id'], $user['id'], $time, "/page/admin/chat/", 'admin_chat', $reply['id']);

}


parseUserNameMentioned($text, '/page/admin/chat/', 'mentioned_inAdminChat');




$pdo->query("INSERT INTO `adm_chat` (id_user, time, msg) values(?,?,?)", [$user['id'], $time, $text]);

$_SESSION['message'] = 'წარმატებით დაემატა';

header("Location: ?");
exit;

}


} 

if (isset($err))
{
echo "<div class='err'>";
echo "$err";
echo "</div>";
}

$k_post=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `adm_chat`");


$ttlq = $qq->calculation($k_post, $set['p_str']);



?>


<div class="hdnvtttl1">Admin chat</div>



<div class="form">
	
<form method="post" action="?">


<div class="form_Styling">
	
<div class="form_stFirsT">
	<?=$usojbid->photo3('48');?>
</div>	

<div class="form_stLastElement">
	<textarea  onfocus="setFcs1Btn()" onblur="setUnFcs1Btn()" id="bb_textarea" name="text" placeholder="What's on your mind?"><?=$insert;?></textarea>
	
	<div id="dispEmojiPicker"></div>
	
	
</div>	
	
</div>


<div class="MTop"> </div>

<div class="CPosTFleXjust">
	
<div>

<span class="material-symbols-outlined pointer" onclick="funRndrEmojis()" id="dsplEmojiChk">mood</span>


</div>	
	

	
	





<div>

<button id="okButton" name="send" type="submit" class="cznt21btn">
	<span class="material-symbols-outlined">send</span>
	<span style="font-size:16px;">Send</span>
	
</button>



</div>	


</div>

</form>

</div>





<div class="mTop"></div>


<? if ($k_post == 0) { ?>

<div class="ftrwithborder">
ცარიელია...
</div>


<?  } ?>



<div class="KDaTA">



<?

$query = $pdo->query("SELECT * FROM `adm_chat` ORDER BY id DESC LIMIT $ttlq, $set[p_str]");
while ($post = $query->fetch())
{
	

$ank = new user($post['id_user']);
?>	
	
	
	
<div class="PCHatMAin">


<!-- 2 -->
<div class="PCHatMAin2">




<!-- 4 -->
<div>

<!-- 3-->
<div class="PCHatMAin3">
	
	<div><?=$ank->photo50(48,40,40);?></div>
	
	<div class="PCHatMAin34">
		<div><?=$ank->nick(); ?> </div>
		<div class="TextChunking"><?=output_text($post['msg']);?>  </div>
	</div>
	
</div>	
<!-- 3-->


</div>
<!-- 4-->


<!-- -->
<div class="pndgl60">

<div class="czRz22z_24"> 
	
	<span><a href="?id=<?=$post['id'];?>" class="clrWpstofLink">Like</a></span> 	

	<span><a href="?response=<?=$ank->id;?>" class="clrWpstofLink">Reply</a> </span> 

<?if ($user['level']>$ank->level || $user['level']!=0 && $user['id']==$ank->id || $user['level']>3){ ?>
	<a href='?del=<?=$post['id'];?>' class='clrWpstofLink'>Del</a>
<? }  ?> 


	<span class="czRz22z_25"> <?=when($post['time']);?> </span>
		
</div>


</div>
<!-- -->


</div>
<!-- 2 -->







</div>

<? } ?>



</div>


<? 

$qq->setPage("/page/admin/chat/");
$qq->setTotal($k_post);
$qq->setPerPage($set['p_str']);

$qq->rendering();



 ?>



<div class="MTop">

<? if($user['level']>3 && $k_post>0) { ?>
	
<div class='break2'>
	<a href='?act=wall'>ჩათის დასუფთავება</a>
</div>

<? }  ?>

<div class="break">
	 <a href="/page/admin/">უკან</a>
</div>

</div>





<?
include '../../../inc/footer.php';
?>
