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
	
	
$k1p213 = nums($_GET['id']);

if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `notes` WHERE `id` = ?", [$k1p213]) == 0)
{
header("Location: /index.php");
exit;
}


	
	
$note = $pdo->fetchOne("SELECT * FROM `notes` WHERE `id` = ?", [$k1p213]);

$ank = $pdo->fetchOne("SELECT * FROM `user` WHERE `id` = '".$note['id_user']."'");




include '../../inc/header.php';
title();
aut();







/*-------------------close / ignor / off / block------------------*/


if ($user['id']!=$ank['id']) {


if_blocked($ank);

if_blacklisted($ank);

if_closed($ank);




$friend = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends` WHERE `user` = '".$user['id']."' AND `who` = '".$ank['id']."'");


if ($note['can_see'] == 1 && $user['level']<=$ank['level'] && $friend == 0)
{
	
echo '<div class="mess">';
echo 'Only friends can see this page';
echo '</div>';

include '../../inc/footer.php';
exit;
}


if ($note['can_see'] == 2 && $user['level']<=$ank['level'])
{
	
echo '<div class="mess">';
echo 'No one can see this page';
echo '</div>';

include '../../inc/footer.php';
exit;
}



}


/*-------------------end------------------*/








///////////////////











$qq = new Pagination();


$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `notes_like` WHERE `id_notes` = '".$note['id']."'");



$ttlq = $qq->calculation($kzftch322, $set['p_str']);





?>



<div class="pzqwe2_ttlqw2z">Who likes the post</div>







<?


if ($kzftch322 == 0)
{
	
	echo '<div class="mess">';
	echo 'ცარიელია...';
	echo '</div>';

}


$qfetch = $pdo->query("SELECT * FROM `notes_like` WHERE `id_notes` = '".$note['id']."' ORDER BY `id` DESC LIMIT $ttlq, $set[p_str]");



while ($data = $qfetch->fetch())
{
	
$pst = new user($data['id_user']);
	




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
<div class="msgflx">

<div class="messaging">
<a href="/mail/who.php?who=<?=$pst->id;?>">Message</a>
</div>

</div>
<!-- -->



</div>








<?

}
?>


<div class='czFTr21 brdrtop'>
	<a href="list.php?id=<?=$note['id'];?>">Back</a>
</div>


<?


$qq->setPage("/page/notes/liked.php?","id=$note[id]");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();
 
 

include '../../inc/footer.php';

?>
