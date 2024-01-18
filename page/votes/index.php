<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';

include '../../inc/header.php';
title();
aut();


?>



<?

$qq = new Pagination();

$kzftch322 =$pdo->queryFetchColumn("SELECT COUNT(*) FROM `poll`");



$ttlq = $qq->calculation($kzftch322, $set['p_str']);


$q3zq1 = $pdo->query("SELECT * FROM `poll` ORDER BY `id` DESC LIMIT $ttlq, $set[p_str]");
?>



<div class="kAppPagePhtVoteHeading">
		<div class="klmanchlq1illumniation"></div>
		<div class="knmaninhedq123q">User polls</div>
		<div class="lmkmnaingq331">Here users will  create or participate in the polls</div>
</div>





<div class="qblogq1_zDv1">
	<div><div class="qblogq1_zDv1FrAd" onclick="window.location='create.php';"> Post new</div> </div>
	<div><div class="qblogq1_zDv1FrAd" onclick="window.location='/user/polls.php?id=<?echo $user['id'];?>';"> My</div> </div>
</div>





<div class="k_pollusr12">

<?
while ($post = $q3zq1->fetch())
{
	
	
	
	$pank =  new user($post['id_user']);
	
	
if (strlen2($post['image'])>0) {
	$picpll = '/page/votes/images/'.$post['id'].'.jpg';
} else {
	$picpll = '/images/default_picture.png';	
}
	
	
	
	?>	


<div class="k_pollusr1">		
	



<div>
	<img src="<?=$picpll;?>" class="kkk_pollimg"/>
</div>






<div class="zp213">
	
	<div>

		<div class="breakw">
			<a href="/page/votes/poll.php?id=<?=$post['id'];?>"><?=output_text($post['msg']);?></a> <br/>
		</div>
	</div>	


	<div>
		<div class="breakw">Author: <?=$pank->nick();?></a></div>
	</div>	
	

</div>






</div>

<?

} 

$qq->setPage("/page/votes/");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();




?>

</div>





	
	

	


	

<?
include '../../inc/footer.php';
?>
