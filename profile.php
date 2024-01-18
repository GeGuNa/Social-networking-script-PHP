<?
include 'inc/db.php';
include 'inc/main.php';
include 'inc/functions.php';
include 'inc/user.php';


if (!isset($_GET['id'])) {
header("Location: /index.php");
exit;
}
	
if (!is_numeric($_GET['id'])) {
header("Location: /index.php");
exit;
}	


$ank=get_user(nums($_GET['id']));

if (!$ank)
{
header("Location: /index.php");
exit;
}






exit(header('Location: /info.php?id='.$ank['id']));



?>
