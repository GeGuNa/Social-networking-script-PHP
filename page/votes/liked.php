<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';







if (!isset($_GET['id'])) {
header("Location: /?"); 
exit;	
}	
	


if (!is_numeric($_GET['id'])) {
header("Location: /?"); 
exit;	
}	


$likd1 = nums($_GET['id']);
	

if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `poll` WHERE `id` = ?",[$likd1]) == 0)
{
header("Location: /index.php");
exit;
}


	
$note = $pdo->fetchOne("SELECT * FROM `poll` WHERE `id` = ?",[$likd1]);
$ank = $pdo->fetchOne("SELECT * FROM `user` WHERE `id` = '".$note['id_user']."'");



include '../../inc/header.php';
title();
aut();





/*-------------------close / ignor / off / block------------------*/


if ($user['id']!=$ank['id']) {


if_blocked($ank);

if_blacklisted($ank);

if_closed($ank);

}


/*-------------------end------------------*/





$qq = new Pagination();




$kzftch322=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `poll_like` WHERE `poll` = '".$note['id']."'");


$ttlq = $qq->calculation($kzftch322, $set['p_str']);









?>


<div class="pzqwe2_ttlqw2z">Who likes the post</div>






<?


if ($kzftch322==0)
{
echo '<div class="mess">';
echo 'ცარიელია...';
echo '</div>';
}


$query = $pdo->query("SELECT * FROM `poll_like` WHERE `poll` = '".$note['id']."' ORDER BY `id` DESC LIMIT $ttlq, $set[p_str]");


while ($data = $query->fetch())
{
	
$pst = new user($data['user']);
	




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

	
<div class="msgflx">

<div class="messaging">
<a href="/mail/who.php?who=<?=$pst->id;?>">Message</a>
</div>

</div>

	
	



</div>
<!-- -->



</div>





<?

}
?>




<div class='czFTr21 brdrtop'>
	<a href="poll.php?id=<?=$note['id'];?>">Back</a>
</div>


<?


$qq->setPage("/page/votes/liked.php?","id=$note[id]");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();


 

include '../../inc/footer.php';

?>
