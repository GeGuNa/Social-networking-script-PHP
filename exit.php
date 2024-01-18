<?
include 'inc/db.php';
include 'inc/main.php';
include 'inc/functions.php';
include 'inc/user.php';


if (!isset($user))
{
header("Location: /index.php");
exit;
}

if($user['act']==0)
{
	header("Location: /act.php");
	exit;
} 



if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `ban` WHERE `id_user` = ? AND `time` > ?",[$user['id'],$time]) > 0)
{
header("Location: /index.php");
exit;
}


session_destroy();


unset($_SESSION['sess_id']);
unset($_SESSION['when']);


setcookie('sess_id', '');
setcookie('when', '');

header("location: /");



?>
