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


$ank=get_user(nums($_GET['id']));

if (!$ank)
{
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






$k_post=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `history_nick` WHERE `user_id` = ?",[$ank['id']]);





$qq = new Pagination();



$ttlq = $qq->calculation($k_post, $set['p_str']);






$sql = $pdo->query("SELECT * FROM `history_nick` WHERE `user_id` = ? ORDER BY `id` DESC LIMIT $ttlq, $set[p_str]",[$ank['id']]);


if ($k_post==0)
{
echo "<div class='mess'>";	
echo 'Empty';	
echo "</div>";
}




while($a = $sql->fetch()) { 


echo '<div class="nav2">

Old one: <b>'.Unescaped($a['nick_last']).'</b> <br>
New one: <b>'.Unescaped($a['nick_new']).'</b>


<br>When:  ('.when($a['time']).')-ზე


</div>
';
}



$qq->setPage("/apanel/history_nick.php?", "id=$ank[id]");
$qq->setTotal($k_post);
$qq->setPerPage($set['p_str']);

$qq->rendering();


echo '<div class="cl_foot1">';
echo '<a href="/apanel/profile.php?id='.$ank['id'].'"> Back</a>';
echo '</div>';



include '../inc/footer.php';
?>
