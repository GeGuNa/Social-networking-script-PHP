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

?>


<div class="prfST1 prfST121_brd">

<div><a href="/profile.php?id=<?=$ank['id'];?>"><img src="/pics/9kN.webp" width="20"></a></div>

<div>User stuff</div>

</div>



<?


echo '<div class="nav2">';
echo "<span class='Icons'>account_circle</span> <a href='history_nick.php?id=$ank[id]'> Nick history</a>";
echo '</div>';


if ($user['level']>=5 && $user['id']!=$ank['id']) {
	echo '<div class="nav2">';
	echo "<span class='Icons'>mail</span> <a href='fosta.php?id=$ank[id]'> See messages</a>";
	echo '</div>';
}





if ($user['level']>=3) {
	echo '<div class="nav2">';
	echo '<span class="Icons">manage_accounts</span> <a href="user.php?id='.$ank['id'].'"> Edit</a>';
	echo '</div>';
}


if ($user['id']!=$ank['id']) {
	echo '<div class="nav2">';
	echo '<span class="Icons">block</span><a href="ban.php?id='.$ank['id'].'"> Block</a>';
	echo '</div>';
}

if ($user['level']>=4) {
	echo '<div class="nav2">';
	echo '<span class="Icons">rss_feed</span> <a href="/apanel/moderate.php?user='.$ank['id'].'"> User access</a>';
	echo '</div>';
}

echo '<div class="nav2">';
echo '<span class="Icons">rss_feed</span> <a href="/apanel/log/?user='.$ank['id'].'"> Admin logs</a>';
echo '</div>';


echo '<div class="nav2">';
echo '<span class="Icons">history</span> <a href="auth.php?id='.$ank['id'].'"> User logs</a>';
echo '</div>';





include '../inc/footer.php';


?>

