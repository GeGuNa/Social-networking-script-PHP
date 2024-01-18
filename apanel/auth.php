<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';

if (!isset($_GET['id'])) {
header("Location: index.php");
exit;
}
	
if (!is_numeric($_GET['id'])) {
header("Location: index.php");
exit;
}	


$ank = get_user(nums($_GET['id']));

if (!$ank) {
header("Location: /index.php");
exit;
}



if ($user['level'] < 1) {
header("Location: /index.php");
exit;
}
	

if ($user['id']!=$ank['id']) {
	
if ($ank['level'] == $user['level'] || $user['level'] <= $ank['level']) {
header("Location: /index.php");
exit;	
}	
	
}
	
	




include '../inc/header.php';
title();
aut();
?>


<div class="PHeadLine fnt">User activity</div>


	
<?

$k_post=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `user_log` WHERE `user` = ?",[$ank['id']]);



$qq = new Pagination();



$ttlq = $qq->calculation($k_post, $set['p_str']);






$z231z = $pdo->query("SELECT * FROM `user_log` WHERE `user` = ? ORDER BY `time` DESC  LIMIT $ttlq, $set[p_str]",[$ank['id']]);

while ($post = $z231z->fetch()) {

$ips = long2ip($post['us_ip']);

?>
<div class="displaying bordrBottom">


When: <span class="time"><?=tmdt($post['time']);?></span><br>

IP: <?=detect($ips);?><br>


Browser: <?=detect($post['us_agent']);?>


</div>


<? }

if ($k_post==0)
{
echo "<div class='mess'>Nothing</div>";
}




$qq->setPage("/apanel/auth.php?", "id=$ank[id]");
$qq->setTotal($k_post);
$qq->setPerPage($set['p_str']);

$qq->rendering();




?>
	

<div class="cl_foot2">
 <a href="/apanel/">Admin</a>
</div>

<div class="cl_foot3">
 <a href="/">Home</a>
</div>

	
<?
include '../inc/footer.php';
?>
