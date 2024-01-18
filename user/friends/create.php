<?

include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';


if (isset($_GET['unrequest'])) {
	
if (!is_numeric($_GET['unrequest'])) {
header("location: /index.php");
exit;	
}
		
$no = number($_GET['unrequest']);

if ($no == $user['id']) {
header("location: /index.php");
exit;
} 



$pdo->query("DELETE FROM `friends_requests` WHERE `user` = ? AND `who` = ?", [$no, $user['id']]);
$pdo->query("DELETE FROM `friends_requests` WHERE `user` = ? AND `who` = ?", [$user['id'], $no]);	




header("Location: /info.php?id=".$no."");
exit;
}



if (isset($_GET['cancel'])) {
	
if (!is_numeric($_GET['cancel'])) {
header("location: /index.php");
exit;	
}
		
$no = number($_GET['cancel']);

if ($no == $user['id']) {
header("location: /index.php");
exit;
} 




$pdo->query("DELETE FROM `friends_requests` WHERE `user` = ? AND `who` = ?", [$no, $user['id']]);
$pdo->query("DELETE FROM `friends_requests` WHERE `user` = ? AND `who` = ?", [$user['id'], $no]);	



header("Location: /user/friends/?id=".$user['id']."&type=new");
exit;
}



///



if (isset($_GET['accepting']))
{
	
if (!is_numeric($_GET['accepting'])) {
header("location: /index.php");
exit;	
}	
		
$ok = number($_GET['accepting']);


if ($ok == $user['id'])
{
header("location: /index.php");
exit;
}

if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends` WHERE `user` = ? AND `who` = ?", [$user['id'], $ok]) > 0) {
header("location: /index.php");
exit;
}

if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends_requests` WHERE `user` = ? AND `who` = ?", [$user['id'], $ok]) == 0)
{
header("location: /index.php");
exit;
}


$pdo->query("INSERT INTO `friends` (`user`, `who`, `when`) values(?, ?, ?)", [$user['id'], $ok, $time]);
$pdo->query("INSERT INTO `friends` (`user`, `who`, `when`) values(?, ?, ?)", [$ok, $user['id'], $time]);



$pdo->query("DELETE FROM `friends_requests` WHERE `user` = ? AND `who` = ?", [$ok, $user['id']]);
$pdo->query("DELETE FROM `friends_requests` WHERE `user` = ? AND `who` = ?", [$user['id'], $ok]);	


header("Location: /info.php?id=".$ok."");
exit;

}





///




if (isset($_GET['accept']))
{
	
if (!is_numeric($_GET['accept'])) {
header("location: /index.php");
exit;	
}	
		
$ok = number($_GET['accept']);


if ($ok == $user['id'])
{
header("location: /index.php");
exit;
}

if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends` WHERE `user` = ? AND `who` = ?", [$user['id'], $ok]) > 0) {
header("location: /index.php");
exit;
}

if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends_requests` WHERE `user` = ? AND `who` = ?", [$user['id'], $ok]) == 0)
{
header("location: /index.php");
exit;
}



$pdo->query("INSERT INTO `friends` (`user`, `who`, `when`) values(?, ?, ?)", [$user['id'], $ok, $time]);
$pdo->query("INSERT INTO `friends` (`user`, `who`, `when`) values(?, ?, ?)", [$ok, $user['id'], $time]);



$pdo->query("DELETE FROM `friends_requests` WHERE `user` = ? AND `who` = ?", [$ok, $user['id']]);
$pdo->query("DELETE FROM `friends_requests` WHERE `user` = ? AND `who` = ?", [$user['id'], $ok]);	



header("Location: /user/friends/?id=".$user['id']."&type=new");
exit;

}



if (isset($_GET['delete']))
{
	
	
if (!is_numeric($_GET['delete'])) {
header("location: /index.php");
exit;	
}	
	
	
$no = nums($_GET['delete']);


if ($no == $user['id'])
{
header("location: /index.php");
exit;
}


if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends` WHERE `user` = ? AND `who` = ?", [$no, $user['id']]) == 0) {

header("location: /index.php");
exit;

} else {

$pdo->query("DELETE FROM `friends` WHERE `user` = ? AND `who` = ?", [$no, $user['id']]);
$pdo->query("DELETE FROM `friends` WHERE `user` = ? AND `who` = ?", [$user['id'], $no]);	

header('Location:  /info.php?id='.$no.'');
exit;

}
}









if (isset($_GET['send']))
{
	
if (!is_numeric($_GET['send'])) {
header("location: /index.php");
exit;	
}		
	
$add=nums($_GET['send']);

if ($add == $user['id'])
{
header("location: /index.php");
exit;
}



//if user already send request to me
if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends_requests` WHERE `who` = ? AND  `user` = ?", [$add, $user['id']]) == 1)
{
	
$pdo->query("INSERT INTO `friends` (`user`, `who`, `when`) values(?, ?, ?)", [$user['id'], $add, $time]);
$pdo->query("INSERT INTO `friends` (`user`, `who`, `when`) values(?, ?, ?)", [$add, $user['id'], $time]);

$pdo->query("DELETE FROM `friends_requests` WHERE `user` = ? AND `who` = ?", [$add, $user['id']]);
$pdo->query("DELETE FROM `friends_requests` WHERE `user` = ? AND `who` = ?", [$user['id'], $add]);	

header('Location:  /info.php?id='.$add.'');
exit;

}
///




if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends` WHERE `user` = ? AND  `who` = ?", [$add, $user['id']]) == 1)
{
header("location: /index.php");
exit;
}


if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends_requests` WHERE `user` = ? AND  `who` = ?", [$user['id'], $add]) == 1)
{
header("location: /index.php");
exit;
}

if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends_requests` WHERE `user` = ? AND  `who` = ?", [$add, $user['id']]) == 1)
{
header("location: /index.php");
exit;
}


$pdo->query("INSERT INTO `friends_requests` (`user`, `who`, `when`) values(?,?,?)", [$add, $user['id'], $time]);


header('Location:  /info.php?id='.$add.'');
exit;



}


?>
