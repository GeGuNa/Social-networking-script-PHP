<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';


if ($user['level'] < 1) {
header("Location: /index.php");
exit;
}
	


if (isset($_GET['allow']) && is_numeric($_GET['allow'])) {
	
	
$actank = filter($_GET['allow']);		
	
$ankid = get_user($actank);	

if (!$ankid) {
	
header("Location: /index.php");
exit;

} else {	
	
$pdo->query("UPDATE `user` SET `act` = '1' WHERE `id` = '".$ankid['id']."' and `act` = '0'");

admin_log('აქტივაცია','გააქტივება',"გააქტივა ნიკი $ankid[nick]");

header("Location: ?");
exit;
}




}


if (isset($_GET['freeze']) && is_numeric($_GET['freeze']))
{

$actanky = filter($_GET['freeze']);		

$fff = get_user($actanky);	

if (!$fff) {
	
header("Location: /index.php");
exit;

} else {	
		
$pdo->query("UPDATE `user` SET `act` = '2' WHERE `id` = ? and `act` = '0'", [$fff['id']]);

admin_log('აქტივაცია','ყურყუტში',"აყურყუტა $ankid[nick] -ი");

header("Location: ?");
exit;


}




}

include '../inc/header.php';
title();
aut();
?>


<div class="PHeadLine fnt">User moderation</div>


	
<?





$k_post=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` WHERE `act` = '0'");


$qq = new Pagination();



$ttlq = $qq->calculation($k_post, $set['p_str']);


$query = $pdo->query("SELECT * FROM `user` WHERE `act` = '0' ORDER BY `time` DESC  LIMIT $ttlq, $set[p_str]");

while ($data = $query->fetch()) {

$baasaa = new user($data['id']);	

?>

<div class="displaying bordrBottom">



<div>Username: <?echo $baasaa->nick(); ?></div>
<div>Registered: <span class="date"> <?=wudate($data['date_reg']);?> </span></div>
<div class="TextDisplaYing">User ip: <?=detect($data['ip']);?> </div>
<div>User agent: <span class="date"> <?=detect($data['ua']);?> </span></div>




<div class="pchrt21">
	<div>	<a href="?allow=<?=$data['id'];?>"><button>Allow</button></a>	</div>
	<div>	<a href="?freeze=<?=$data['id'];?>"><button>Froze</button></a>	</div>
	<div>	<a href="/apanel/ban.php?id=<?=$data['id'];?>"><button>Block</button></a>	</div>
</div>





</div>


<? } ?>


<? if ($k_post==0){ ?>
	
	<div class='mess'>Nothing</div>
	
<? } ?>



<?

$qq->setPage("/apanel/users.php");
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
