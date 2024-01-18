<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';






if ($user['level']<3)
{
header("Location: /index.php");
exit;
} 
	
	
if (isset($_GET['user']) && is_numeric($_GET['user'])) {
	
$profile = get_user_data(abs((int)$_GET['user']));

if (!$profile) {
	header("Location: /index.php");
	exit;
}

//echo var_dump($profile);

$data2 = "select * from `admin_activities` where `by_whom` = '".$profile->id."' group by kind";


//$kzftch322 = "SELECT COUNT(*) FROM `admin_activities` WHERE `by_whom` = '".$profile['id']."'";

$navi =  "/apanel/log/stuff.php?user=$profile->id&";

	
} else {
	
	
$data2 = "select * from `admin_activities`  group by kind";
	
	
//$kzftch322 = "SELECT COUNT(*) FROM `admin_activities` WHERE `by_whom` = '".$profile['id']."'";

$navi =  "/apanel/log/stuff.php?";

	
}
	
	
	 
	 
	 
include '../../inc/header.php'; 
	 

title();
aut();	 
?>

<div class="pstrHr1d fnt">Admin activities</div>


<?

	
//$kzftch322 = mysql_result(mysql_query($kzftch322),0);



$kz = $pdo->query("$data2");

while($kz1 = $kz->fetch()) {

?>

<div class="nav1">

<a href="<?=$navi;?>stuff=<?=Unescaped($kz1['kind']);?>"><?=Unescaped($kz1['kind']);?> </a>

</div>



<? } ?>



<div class="cl_foot2">
	<a href="/apanel/">Admin</a>
</div>



<div class="cl_foot1">
	<a href='/'>Home</a>
</div>

<?
include '../../inc/footer.php';
?>
