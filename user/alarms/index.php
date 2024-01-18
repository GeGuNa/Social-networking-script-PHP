<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';




$q12ft1 = $pdo->query("select `uid` from `user_activity` where `user` = '".$user['id']."' and `read` = '0'");

$ifmynq1_zw = $q12ft1->rowCount();

if ($ifmynq1_zw>0) {

	while ($kd1_d = $q12ft1->fetch()) {
		$pdo->exec("update `user_activity` set `read` = '1' where `uid` = '".$kd1_d['uid']."'");
	}

}




include '../../inc/header.php';






title();
aut();
 
 


if (isset($_GET['act']) && $_GET['act']=='clean')
{
	$pdo->exec("DELETE FROM `user_activity` WHERE `user` = '".$user['id']."'");
	header("Location: ?");
	exit;
}


if (isset($_GET['del'])) 
{
	
	if (!is_numeric($_GET['del'])) {
		header("Location: /index.php");
		exit;
	}	
	
	
	$kkqdle1 = filter($_GET['del']);
		
	if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `user_activity`  WHERE `user` = ? AND `uid` = ?",[$user['id'],$kkqdle1]) == 1)
	{

	$pdo->query("DELETE FROM `user_activity` WHERE `user` = ? AND `uid` = ?",[$user['id'],$kkqdle1]);
	
	header('Location: ?');
	exit;
	
	}

}




if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `user_activity`  WHERE `user` = ? AND `read` = '0'", [$user['id']]) > 0)
{
$pdo->exec("UPDATE `user_activity` SET `read` = '1' WHERE `user` = '".$user['id']."'");
}




/////////




$kzftch322=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `user_activity`  WHERE `user` = ? ", [$user['id']]);

$qq = new Pagination();

$ttlq = $qq->calculation($kzftch322, $set['p_str']);






$qf12 = $pdo->query("SELECT * FROM `user_activity` WHERE `user` = ? ORDER BY `when` DESC LIMIT $ttlq, $set[p_str]", [$user['id']]);

?>


<div class="privacyh3">Notifications</div>

<?


////////

if ($kzftch322 == 0)
{
echo "<div class='SometimesDiplay'>";
echo "Here's nothing";
echo "</div>";
}




while ($post = $qf12->fetch())
{
	
$pank = new user($post['author']);	


$objid = $post['object_id'];

if ($post['type']=='gossip') {
	$what = 'Replied you in the live chat';
}


 else if ($post['type']=='photo_comm') {
	$what = "Commented on your [url=$post[where]]photo[/url]";
}  else if ($post['type']=='replied_on_photo') {
	$what = "Replied to you on the [url=$post[where]]photo[/url]";
}  else if ($post['type']=='replied_ony_photo') {
	$what = "Left a comment on your [url=$post[where]]photo[/url]";
} else if ($post['type']=='photo_like') {
	$what = "Liked your [url=$post[where]]photo[/url]";
} else if ($post['type']=='giving_balls') {
	$what = "Gifted to you $post[text] coins";
}  else if ($post['type']=='giving_presents') {
	$what = "Gifted to you a [url=/user/gift/]gift[/url]";
}  else if ($post['type']=='mentioned_inguest') {
	$what = "Mentioned you in a live  [url=$post[where]]Chat[/url]";
}  else if ($post['type']=='mentioned_inchat') {
	$what = "Mentioned you in a  [url=$post[where]]Chat room[/url]";
}   else if ($post['type']=='mentioned_innotes') {
	$what = "Mentioned you in a [url=$post[where]]Blogpost[/url]";
}    else if ($post['type']=='mentioned_inPosts') {
	$what = "Mentioned you in a [url=$post[where]]Post[/url]";
}  else if ($post['type']=='mentioned_inVideos') {
	$what = "Mentioned you in a [url=$post[where]]Video post[/url]";
}    else if ($post['type']=='mentioned_inVoting') {
	$what = "Mentioned you in a [url=$post[where]]Polls[/url]";
}    else if ($post['type']=='mentioned_inPhoto') {
	$what = "Mentioned you in a [url=$post[where]]Photo[/url]";
}     else if ($post['type']=='mentioned_inAdminChat') {
	$what = "Mentioned you in a [url=$post[where]]Admin chat[/url]";
} 




else {
	$what = 'something ';
}


?>

<div class="HeadingD22">

	<div>	<?echo $pank->photo50(128,60,60,'50%'); ?>	</div>

	<div>

		<div>	
			<?echo $pank->nick(); ?> 
			<span class="SpanTimeForText"> <?echo when($post['when']); ?> </span>	
		</div>
	

		<div> 
			<div class="SpanTimeForText"><?=textForAlarm($what);?></div>

		</div>



	</div>



</div>


<?
}


$qq->setPage("/user/alarms/");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();





?>

<? if($kzftch322>0) { ?>
<div class="cl_foot1">
<a href="?act=clean">Cleaning</a>
</div>
 <? } ?>



<div class="cl_foot2">
<a href="/">Home</a>
</div>

<?


include '../../inc/footer.php';
?>
