<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';
include '../inc/header.php';
title();
aut();
?>



<div class="ksmz_mnt11_zlmqe1">
User login list
</div>

	
<?

$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `user_log` WHERE `user` = '$user[id]'");



$qq = new Pagination();



$ttlq = $qq->calculation($kzftch322, $set['p_str']);


$qfetch = $pdo->query("SELECT * FROM `user_log` WHERE `user` = '".$user['id']."' ORDER BY `time` DESC  LIMIT $ttlq, $set[p_str]");

while ($post = $qfetch->fetch())
{
	

echo '<div class="nav2">';


$ips = long2ip($post['us_ip']);

echo 'When: <span class="Live_Time">'.times($post['time']).'</span><br>';
echo "Login ip: ".detect($ips)."<br>";
echo "Browser: ".detect($post['us_agent'])."<br>";


echo "</div>";
}

if ($kzftch322==0)
{
echo "<div class='SometimesDiplay'>შემოსვლების სია ცარიელია...</div>";
}



$qq->setPage("/user/auth.php");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();



?>
	
<div class="cl_foot2">
   <a href="/"> Home </a>
</div>
	
<?
include '../inc/footer.php';
?>
