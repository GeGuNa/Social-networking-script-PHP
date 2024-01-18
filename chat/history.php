<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';









if (isset($_GET['act']) && $_GET['act']=='clean') {
	
	
	$pdo->exec("delete from `chat_hist` where  `user_id` = '".$user['id']."'");
	header("location: ?");
	exit;
}




?>



<?


$qq = new Pagination();


include '../inc/header.php';
title();
aut(); 
?>












<?

$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `chat_hist` where  `user_id` = ?", [$user['id']]);





$ttlq = $qq->calculation($kzftch322, $set['p_str']);


	
$info = $pdo->query("SELECT * FROM `chat_hist` where `user_id` = ? ORDER BY `id` DESC LIMIT $ttlq, $set[p_str]", [$user['id']]);	
	


?> 




<div class="kAppPagePhtChatHeading">
		<div class="klmanchlq1illumniation"></div>
		<div class="knmaninhedq123q">Chat rooms</div>
		<div class="lmkmnaingq331">Answers in the chats</div>
</div>









<div class="knChatMnqz3261">

<?

while ($post = $info->fetch()) {

$user123 = new user($post['anke_id']);

$chatid = $pdo->fetchOne("SELECT * FROM `chat_cats` WHERE `id` = ?", [$post['chat_id']]);


?>				  


<div class="knChatstr1">



	<div class="knChatstr2">
		<div><?php echo $user123->photo3(48);?></div>
		
		
		<div>
				<div><?echo $user123->nick();?></div>
				<div class="textgrey"><?echo when($post['post_time']);?></div>
		
		</div>
		
		
	</div>
	
	
	
	<div class="kpdng10az"><?php echo output_text($post['text']);?></div>
	
	
	
<div class="brdrbtmqz012zd1"></div>	
	
<div class="knChatstr31zq1">
	<div><a href="room.php?id=<?php echo $chatid['id'];?>"><?=$chatid['name'];?></a></div>
	<div><a href="" class="bSuccess" style="">Reply</a></div>
</div>	
				
	
	
	
</div>		
		

<?

}

?>  

</div>

<?

$qq->setPage("/chat/history.php");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();


 ?>   


<? if ($kzftch322 > 0 ){ ?>

<div class="RGQWEMHm">
		<a href="?act=clean">  Clean  </a>
</div>

<? } ?>


<div class="RGQWEMHmz2">
		<a href="/chat/"> Back  </a>
</div>


<?
include '../inc/footer.php';
?>


