<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';


if (!isset($_GET['post'])) {

header("Location: /");
exit;   

} 


if (!is_numeric($_GET['post'])){
    
header("Location: /");
exit;     
    
}

$fflp1213 = filter($_GET['post']);

$post = $pdo->fetchOne("select * from `chat_posts` where `id` = ?", [$fflp1213]);


//abs((int)$_GET['post'])

if (!$post) {
header("Location: /");
exit;     
    
}


$qq = new Pagination();




$kzftch322=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `user_post_reaction` WHERE `post_id` = ? and `where` = 'chat'", [$post['id']]);


$ttlq = $qq->calculation($kzftch322, $set['p_str']);




include '../inc/header.php';
title();
aut();





?>

<div class="cl_foot33">
	<div>Who reacted </div>
	<div><?=$kzftch322;?></div>
</div>

<?
$query = $pdo->query("SELECT * FROM `user_post_reaction` WHERE `post_id` = ? and `where` = 'chat' ORDER BY `when` DESC LIMIT $ttlq, $set[p_str]", [$post['id']]); ?>



<?while ($glum = $query->fetch()): ?>

<?

$fank = new user($glum['user']);



if ($glum['type']=='wow')$kq_1pty = '😂';
else if ($glum['type']=='sad')$kq_1pty = '😢';
else if ($glum['type']=='frown')$kq_1pty = '🙄';
else if ($glum['type']=='angry')$kq_1pty = '😡';
else if ($glum['type']=='love')$kq_1pty = '😍';
else $kq_1pty = '';

?>








<div class="frlst21_22">




<div>	
	
<div class="pchrt21">
	
<div>
	<?echo $fank->photo50(128,60,60,'50%'); ?> 

<div class="relative">
	<div class="rr_ctt_bottom">	<?=$kq_1pty;?></div>
</div>

</div>	

<div class="dflexAcenter">

    
	
	
	<div><?echo $fank->nick(); ?></div>
	

	

	
	
</div>


</div>	
		


</div>




<div class="dflexAcenter">


	
<span onclick="ShowThings(this)" class="Drpdnw material-symbols-outlined CursorUser" data_id="<?=$fank->id;?>">more_horiz</span>


<div class="drpdmain" pstevents="<?=$fank->id;?>" style="display: none;">
	
	
<div class="drpd">


<? if ($fank->id != $user['id']) { ?>
<div>
	<span class="material-symbols-outlined">Send</span> 
	<a href="/mail/who.php?who=<?=$fank->id;?>">Message</a>
</div>
<? } ?>

<div>
	<span class="material-symbols-outlined">group</span> 
	<a href="/user/friends/?id=<?=$fank->id;?>">Friend list</a>
</div>

</div>


</div>




</div>

</div>






<? endwhile; ?>


<?
$qq->setPage("/chat/reacts.php?", "post=$post[id]");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();


?>






<div class="Lfoot">
 <a href="/chat/room.php?id=<?=$post['chat_id'];?>">Back</a>
</div>





<?
include '../inc/footer.php';
?>