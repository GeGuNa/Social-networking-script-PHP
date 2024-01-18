<?
 
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';


include 'review.php';



include '../../inc/header.php';
title();
aut();



$qq = new Pagination();




?>




<style>


.appearancehiding {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
}

.contestMain {
    width: 100%;
    display: block;
    padding: 10px;
    background: #fff;
    margin-bottom: 10px;

}


.contestFilling {
    width: 100%;
    display: grid;
    grid-gap: 5px;
    grid-template-columns: repeat(auto-fill, minmax(30%, 1fr));
}


.rosYGirlsD {
	
	object-fit: cover;
    width: 100%;
    max-width: 100%;
    height: 250px;
}


.srchMainFrm {
	display:flex;width:100%;background:#fff;gap: 10px;padding: 10px;overflow:hidden;flex-wrap:nowrap;
}


.srchMainFrm1 {
	flex-basis:50%;
}

.srchMainFrm2 {
	display:flex;width:100%;flex-wrap:nowrap;overflow:hidden;height: 44px !important;
}


.srchMainFrm3 {
	width: calc(100% - 44px);height: 44px;
}

.stmqw111 {
	width:100%;margin-top: 0px;margin-bottom: 0px;height: 44px;border-left: 1px solid #ccc;border-top: 1px solid #ccc;border-bottom: 1px solid #ccc;    font-size: 16px;
}

.pp123aq {
	width:44px;background:#f2f2f2;height:44px;border: 1px solid #ccc;
}

.ppap123 {
	color:#000;    font-family: 'Material Symbols Outlined';font-weight: 300; font-style: normal;font-size: 28px;display:flex;justify-content:center;
}

</style>










<?


$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `contest_participants` where `user_id` = ?",[$user['id']]);

?>




<div class="TtlWzw221s fnt">ჩემი კონკურსები (<?=$kzftch322;?>) </div>




<?

$ttlq = $qq->calculation($kzftch322, $set['p_str']);





$qfetch = $pdo->query("SELECT * FROM `contest_participants` where `user_id` = ?  ORDER BY `pid` DESC LIMIT $ttlq, $set[p_str]",[$user['id']]);;



if ($kzftch322 == 0) { ?>
	
<div class='mess mTop'>
არ არის კონკურსები
</div>

<? } ?>


<div class="mBottom"></div>



<div class="contestMain">

<div class="contestFilling">


<?


while ($post312 = $qfetch->fetch())
{
	
	
$post = $pdo->fetchOne("select * from `contests` where `cid` = ?",[$post312['object_id']]);	



$participants = $pdo->queryFetchColumn("select count(`pid`) from `contest_participants` where `object_id` = ?",[$post['cid']]);


?>


<div onclick="window.location = 'contest.php?id=<?=$post['cid'];?>'" class="pointer">
	<img src="/page/contests/covers/<?=detect($post['cover']).'.jpg';?>" class="rosYGirlsD">
	



	<div style="width:100%;display:block;border:1px solid #ccc;">
		
	<div style="padding:10px;text-align:center;display:block;">	
		
	
	
	<a href="contest.php?id=<?=$post['cid'];?>">
		<?=detect($post['name']);?>
	</a>	
		
	
	</div>
	
	
	
	<div style="    background: cornflowerblue;padding:10px;text-align:center;display:flex;justify-content:space-between;">	
		
	<div style="color:#fff;"><i class="fa fa-user  fa-fw"></i>  
	<a style="color:#fff;" href="participants.php?id=<?=$post['cid'];?>"> (<?=$participants;?> of <?=$post['howmanypeople'];?>) </a>
	
	</div>
	<div  style="color:#fff;"><i class="fa fa-eye  fa-fw"></i> <?=$post['views'];?></div>
	
	</div>
	
	
	
		
	</div>



	
	
</div>



<?

}
?>

</div>


</div>





<?



$qq->setPage("");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();
?>


<div class="pcstpgnr2z21dvt21" style="margin-bottom:10px;">
<a href="/page/contests/">
	<i class="fa fa-home  fa-fw"></i>  უკან
</a>
</div>





<?
include '../../inc/footer.php';
?>
