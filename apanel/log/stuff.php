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


if (empty($_GET['stuff'])) {
	header("Location: /index.php");
	exit;
}


$qq = new Pagination();

$q12 = my_esc($_GET['stuff']);


if (isset($_GET['user']) && is_numeric($_GET['user'])) {
	
$profile = get_user_data(abs((int)$_GET['user']));

if (!$profile) {
	header("Location: /index.php");
	exit;
}


$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `admin_activities` where `by_whom` = ? and `kind` = ? ",[$profile->id, $q12]	);
	
$ttlq = $qq->calculation($kzftch322, $set['p_str']);

$navi =  "stuff=$q12&user=$profile->id";

$kz = $pdo->query("select * from `admin_activities` where `by_whom` = ? and `kind` = ? ORDER BY `cid` DESC LIMIT $ttlq, $set[p_str]",[$profile->id, $q12]);
	
} else {

	
$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `admin_activities` where `kind` = ?",[$q12]);
	
$ttlq = $qq->calculation($kzftch322, $set['p_str']);
	
$navi =  "stuff=$q12";
	
$kz = $pdo->query("select * from `admin_activities` where `kind` = ?  ORDER BY `cid` DESC LIMIT $ttlq, $set[p_str]",[$q12]);
	
}

	 
	 
	 
include '../../inc/header.php'; 
	 

title();
aut();	 
?>

<div class="pstrHr1d fnt">Admin activities</div>


<?




while($kz1 = $kz->fetch()) {
	
	$who = new user($kz1['by_whom']);

?>

<div class="nav1">

<?=$who->nick();?> </span><br/>
When: <span class="date"><?=when($kz1['when']);?> <br/>
<?=escaped($kz1['what']);?> <br/>

</div>



<? } ?>



<?


$qq->setPage("/apanel/log/stuff.php?","$navi");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();




?>


<div class="cl_foot2">
	<a href="/apanel/">Admin</a>
</div>



<div class="cl_foot3">
	<a href='/'>Home</a>
</div>

<?
include '../../inc/footer.php';
?>
