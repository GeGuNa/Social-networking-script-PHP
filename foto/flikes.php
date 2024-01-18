<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';

if (!isset($_GET['id'])) {
header("Location: /?"); 
exit;	
}	
	


if (!is_numeric($_GET['id'])) {
header("Location: /?"); 
exit;	
}	

$KkkK2_id = filter($_GET['id']);
	

if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `gallery_foto` WHERE `id` = ?",[$KkkK2_id])==0)
{
header("Location: /index.php");
exit;
}


$foto = $pdo->fetchOne("SELECT * FROM `gallery_foto` WHERE `id` = ?",[$KkkK2_id]);

$ank = $pdo->fetchOne("SELECT * FROM `user` WHERE `id` = ?",[$foto['id_user']]);


include '../inc/header.php';
title();
aut();




/*-------------------close / ignor / off / block------------------*/



if ($user['id']!=$ank['id']) {
	
	
$friend = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends` WHERE `user` = ? AND `who` = ?", [$user['id'],$ank['id']]);	
	

if_blocked($ank);

if_blacklisted($ank);

if_closed($ank);



if ($user['level']<=$ank['level'] && $foto['photo_seeing']==1 && $friend == 0)
{
	
echo '<div class="mess">';
echo 'Only friends can see this page!';
echo '</div>';

include '../inc/footer.php';
exit;
}

if ($user['level']<=$ank['level'] && $foto['photo_seeing']==2)
{
	
echo '<div class="mess">';
echo 'No one can see this page';
echo '</div>';

include '../inc/footer.php';
exit;
}

/*-------------------end------------------*/



}




///////////////////


$qq = new Pagination();



$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `photo_like` WHERE `foto` = ?",[$foto['id']]);



$ttlq = $qq->calculation($kzftch322, $set['p_str']);






?>





<div class="Background mBottom">
 <a href="/foto/foto.php?id=<?=$foto['id'];?>">უკან</a> 
</div>




<?


if ($kzftch322 == 0)
{
echo '<div class="mess">';
echo 'Empty';
echo '</div>';
}


$query = $pdo->query("SELECT * FROM `photo_like` WHERE `foto` = ? ORDER BY `when` DESC LIMIT $ttlq, $set[p_str]", [$foto['id']]);



while ($data = $query->fetch())
{
	
$ank = new user($data['user']);
	


?>



<div class="frlst21_22">

<div>
	
<div class="pchrt21">
	
<div><?=$ank->photo50('48');?></div>

<div>
<div><?=$ank->nick();?></div>
<div class="date"><?=tmdt($data['when']);?></div>
</div>


</div>

</div>



<div class="dflexAcenter">


<span onclick="ShowThings(this)" class="Drpdnw material-symbols-outlined CursorUser" data_id="<?=$ank->id;?>">more_horiz</span>


<div class="drpdmain" pstevents="<?=$ank->id;?>" style="display: none;">
	
	
<div class="drpd">


<? if ($user['id'] != $ank->id) { ?>
<div>
	<span class="material-symbols-outlined">Send</span> 
	<a href="/mail/who.php?who=<?=$ank->id;?>">Message</a>
</div>
<? } ?>

<div>
	<span class="material-symbols-outlined">group</span> 
	<a href="/user/frends/?id=<?=$ank->id;?>">Friend list</a>
</div>

</div>


</div>




</div>



</div>



<?

}




$qq->setPage("/foto/flikes.php?", "id=$foto[id]");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();




?>
 


 


<?
include '../inc/footer.php';

?>
