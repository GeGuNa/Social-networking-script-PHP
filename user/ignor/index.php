<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';
include '../../inc/header.php';
title();
aut();




if (isset($_GET['del']))
{
	
	
if (!is_numeric($_GET['del'])) {
header("Location: ?");
exit;	
}		
	
	
$no = filter($_GET['del']);


if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `user_ignor` WHERE `user` = ? AND `who` = ?", [$user['id'],$no]) == 0){
header("Location: /index.php");
exit;
}


$pdo->query("DELETE FROM `user_ignor` WHERE `user` = ? AND `who` = ?", [$user['id'],$no]);


$_SESSION['message'] = 'წარმატებით წაიშალა'; 
header("Location: ?");
exit;

}



$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `user_ignor` WHERE `user` = '$user[id]'");




$qq = new Pagination();



$ttlq = $qq->calculation($kzftch322, $set['p_str']);

?>







<div class="pzqwe2_ttlqw2z">Blocked users</div>


<?
if ($kzftch322 == 0) {
	echo '<div class="mess">Empty </div>';
}
?>


<?
$query = $pdo->query("SELECT * FROM `user_ignor` WHERE `user` = '$user[id]' ORDER BY uid DESC LIMIT $ttlq, $set[p_str]");
while ($data = $query->fetch())
{
	
	
$pst = new user($data['who']);
?>




<div class="pchtr1">


<div class="pchrt21">
<div><?echo $pst->photo(48);?></div>

<div class="dflexAcenter">
	<div><?echo $pst->nick();?></div>
	<div class="date"><?echo tmdt($data['when']);?></div>
</div>

</div>



<!-- -->
<div>

	
<div class="GrayButton">
<a href="?del=<?=$pst->id;?>">Remove</a>
</div>


	
	



</div>
<!-- -->



</div>






<?


}
?>



<?

$qq->setPage("/user/ignor/");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();; 
?>









<div class='cl_foot1'>
 <a href="/">Home</a>
</div>



<?
include '../../inc/footer.php';
?>
