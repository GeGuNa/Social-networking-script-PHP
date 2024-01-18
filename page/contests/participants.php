<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';

include 'review.php';

if (!isset($_GET['id'])) {
	header('Location: /index.php');
	exit;
}

if (!is_numeric($_GET['id'])) {
	header('Location: /index.php');
	exit;
}	

$kpid1_ll = filter($_GET['id']);

$contest = $pdo->fetchOne("SELECT * FROM `contests` WHERE `cid` = ?", [$kpid1_ll]);

if (!$contest)
{
	header('Location: /index.php');
	exit;
}


$qq = new Pagination();



$author = get_user($contest['user_id']);

include '../../inc/header.php';

title();
aut(); 

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


$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `contest_participants` where `object_id` = ?", [$contest['cid']]);


?>




<div class="TtlWzw221s fnt">მონაწილეთა სია (<?=$kzftch322;?>) </div>



<?
$ttlq = $qq->calculation($kzftch322, $set['p_str']);





$qfetch = $pdo->query("SELECT * FROM `contest_participants` where `object_id` = ?  ORDER BY `pid` DESC LIMIT $ttlq, $set[p_str]", [$contest['cid']]);



if ($kzftch322 == 0) { ?>
	
	<div class='mess mTop'>
	არავის მიუღია მონაწილეობა
	</div>

<? } else { ?>


<div class="mBottom"></div>



<div class="contestMain">

<div class="contestFilling">


<?


while ($post = $qfetch->fetch())
{

$author = new user($post['user_id']);


$q1 = $pdo->fetchOne("select * from `contest_participant_photos` where `user_id` = ? and `object_id` = ? order by `pid` desc limit 1", [$post['user_id'], $post['object_id']]);



$hmanylikes31a13z = $pdo->fetchOne("SELECT count(`lid`) as cntr  FROM `contest_participant_photo_likes` WHERE `object_id` = ?", [$post['pid']])['cntr'];



?>


<div onclick="window.location = 'participant.php?contest=<?=$post['object_id'];?>&user=<?=$author->id;?>'" class="pointer">

<? if ($q1) { ?>
<img src="/page/contests/images/<?=detect($q1['photo']);?>" class="rosYGirlsD">
<? } else { ?>
<img src="/images/143086968_2856368904622192_1959732218791162458_n.png" class="rosYGirlsD">
<? } ?>


	<div style="width:100%;display:block;">
		

	
	<div style="    background: cornflowerblue;padding:10px;text-align:center;display:flex;justify-content:space-between;">	
		
	<div style="color:#fff;"><?=$author->nick();?></div>
	
	
<div style="display:flex;flex-wrap:nowrap;overflow:hidden;justify-content:flex-start;gap:5px;">
	
	
	<div>
		<div style="color:#fff;"><i class="fa fa-eye  fa-fw"></i>   <?=$post['views'];?></div>
	</div>


<div>
		<div style="color:#fff;"><i class="fa fa-heart  fa-fw"></i>   <?=$hmanylikes31a13z;?></div>
			
	</div>
	


</div>
	
	
	
	
	</div>
	
	
	
		
	</div>



	
	
</div>



<?

}
?>

</div>


</div>


<? } ?>


<?



$qq->setPage("", "?id=$contest[cid]");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();
?>


<?if ($user['level']>3){ ?>
<div class="pcstpgnr2z21dvt21" style="margin-bottom:10px;">
<a href="add.php">
	<i class="fa fa-add  fa-fw"></i>  ახალის შექმნა
</a>
</div>
<? } ?>

















<?
include '../../inc/footer.php';
?>
