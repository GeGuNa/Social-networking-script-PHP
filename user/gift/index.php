<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';

$ank = $user;



if (isset($_GET['removing']) && is_numeric($_GET['removing'])) {


if (!is_numeric($_GET['removing'])) {
	header("Location: /");
	exit;
} 

	
$rmid = number($_GET['removing']);


$giftse = $pdo->fetchOne("SELECT * FROM `gifts_user` WHERE `id` = ? and `id_user` = ?", [$rmid, $user['id']]);


if ($giftse) {
	
	
$pdo->query("DELETE FROM `gifts_user` WHERE `id` = ? and `id_user` = ?", [$rmid, $user['id']]);


header("Location: ?"); 
exit;

} else {

header("Location: /");
exit;

}


}



include '../../inc/header.php';
title();
aut();




	

?>



<div class="pzqwe2_ttlqw2z">Gifts list</div>
 
	  
<?


$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `gifts_user` WHERE `id_user` = '".intval($ank['id'])."'");


$qq = new Pagination();




$ttlq = $qq->calculation($kzftch322, $set['p_str']);




if ($kzftch322 == 0)
{
	echo '<div class="mess">';
	echo 'Empty';
	echo '</div>';
}
	



$qgift = $pdo->query("SELECT * FROM `gifts_user` WHERE `id_user` = '".intval($ank['id'])."' ORDER BY `time` DESC LIMIT $ttlq, $set[p_str]");


while ($post = $qgift->fetch())
{
	
$gift = $pdo->fetchOne("SELECT * FROM `gift_list` WHERE `id` = '".intval($post['id_gift'])."'");

$anketa = new user ($post['id_ank']);	
	
?>		

<div class="czn123nav2mNR2">   



<div class="form-group">  
	<img class="gwWmxw" src="/img/gift/<? echo detect($gift['id']);?>.png">
</div>



	


<div class="form-group"> 

<strong>By whom:</strong> <?=$anketa->nick();?>

</div> 



<div class="form-group"> 
	
	<strong>When:</strong>	<span class="date"><? echo when($post['time']) ;?></span> 
	
		<a href="?id=<? echo $ank['id'];?>&removing=<?=$post['id'];?>">
			<span class="material-symbols-outlined">delete</span>
		</a>	
	
</div> 



<? if (strlen2($post['coment'])>0) { ?>

<div class="form-group"> 
	<? echo output_text($post['coment']);?>
</div> 
  
<? } ?>
  




</div> 
<? } ?>


<?
   
$qq->setPage("/user/gift/");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();
   
?>
        
             

<div class='cl_foot1'>
 <a href="/">Home</a>
</div>




<?

include '../../inc/footer.php';
?>
