<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';


if (isset($_GET['id'])) {
	

if (!is_numeric($_GET['id'])){
	header('Location: /index.php');
	exit;
}	


$kqp123idd1 = filter($_GET['id']);


$post = $pdo->fetchOne("SELECT * FROM `notes` WHERE `id` = ?", [$kqp123idd1]);

if (!$post)
{
	header('Location: /index.php');
	exit;
}




$ank = $pdo->fetchOne("SELECT * FROM `user` WHERE `id` = ?", [$post['id_user']]);

if ($ank['id'] == $user['id'] || ($user['level'] > 0 && $user['level']>=$ank['level']) || $user['level']>=5) {

	$pdo->query("DELETE FROM `notes` WHERE `id` = ?", [$post['id']]);	
	$pdo->query("DELETE FROM `notes_count` WHERE `id_notes` = ?", [$post['id']]);	
	$pdo->query("DELETE FROM `notes_komm` WHERE `id_notes` = ?", [$post['id']]);	
	$pdo->query("DELETE FROM `notes_like` WHERE `id_notes` = ?", [$post['id']]);	

header("Location: index.php");
exit;

} else {

header("Location: index.php");
exit;

}



} else {


header("Location: /index.php");
exit;	


}


?>
