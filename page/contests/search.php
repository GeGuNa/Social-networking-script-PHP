<?
 
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';

include 'review.php';

if (!isset($_GET['search'])) {
	header("location: /");
	exit;
}

if (strlen2($_GET['search'])<1) {
	header("location: /");
	exit;
}


$daqwe123datF231 = my_esc($_GET['search']);

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
	flex-basis:100%;
}

.srchMainFrm2 {
	display:flex;width:100%;flex-wrap:nowrap;overflow:hidden;height: 44px !important;
}


.srchMainFrm3 {
	width: calc(100% - 44px);height: 44px;
}

.stmqw111 {
	width:100%;margin-top: 0px;
	margin-bottom: 0px;height: 44px;
	/*border-left: 1px solid #ccc;
	border-top: 1px solid #ccc;
	border-bottom: 1px solid #ccc;    */
	font-size: 16px;
}

.pp123aq {
	width:44px;background:#f2f2f2;height:44px;border: 1px solid #ccc;
}

.ppap123 {
	color:#000;    font-family: 'Material Symbols Outlined';font-weight: 300; font-style: normal;font-size: 28px;display:flex;justify-content:center;
}

</style>






<div class="srchMainFrm">
	


	<div class="srchMainFrm1">
			
		<div class="srchMainFrm2">	
			
						<div class="srchMainFrm3">	
							<input id="valforsearching" type="text" onkeyup="parsginDataForSearching(this)" placeholder="Search" value="<?=htmlspecialchars($daqwe123datF231);?>" style="margin-top:0; ">	
						</div>

						<div class="pp123aq" style="border: 0;">
							<button onclick="SubmintingData()" type="button" style="height: 44px;border-radius:0;" class="pc-btn"><i class="fa fa-search"></i></button>
						</div>	

		</div>

	</div>



<script>

let valfrqwe131q

function parsginDataForSearching(val) {
	valfrqwe131q = val.value
}

function SubmintingData() {
	if (valfrqwe131q.length>0) {

	window.location = 'search.php?search='+valfrqwe131q;
	return false;
	} else {
	
	}
}

</script>












</div>










<?


$c2z1123qdzdqz = '%'.$daqwe123datF231.'%';

$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `contests` where `name` LIKE ? or `description` LIKE ?", [$c2z1123qdzdqz, $c2z1123qdzdqz]);


$ttlq = $qq->calculation($kzftch322, $set['p_str']);





$qfetch = $pdo->query("SELECT * FROM `contests` where `name` LIKE ? or `description` LIKE ? order by `when` desc limit 20", [$c2z1123qdzdqz, $daqwe123datF231]);



if ($kzftch322 == 0) { ?>
	
<div class='mess mTop'>
არ არის კონკურსები
</div>

<? } else { ?>


<div class="mBottom"></div>



<div class="contestMain">

<div class="contestFilling">


<?


while ($post = $qfetch->fetch())
{

$author = new user($post['user_id']);


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


<? } ?>





<div class="pcstpgnr2z21dvt21" style="margin-bottom:10px;">
<a href="/page/contests/my.php">
	<i class="fa fa-user  fa-fw"></i>  ჩემი კონკურსები (<?=$pdo->queryFetchColumn("select count(`pid`) from `contest_participants` where `user_id` = ?",[$user['id']]);?>)
</a>
</div>



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
