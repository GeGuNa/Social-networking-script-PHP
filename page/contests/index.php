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
	
	
<?

$qweq123 = '';

if (isset($_COOKIE['sortingContests'])) {
	
$newq1 = ($_COOKIE['sortingContests'] == "newests" ? "selected" : "");
$newq2 = ($_COOKIE['sortingContests'] == "oldests" ? "selected" : "");
$newq3 = ($_COOKIE['sortingContests'] == "completed" ? "selected" : "");
$newq4 = ($_COOKIE['sortingContests'] == "pending" ? "selected" : "");


if ($_COOKIE['sortingContests'] == 'newests') {
	$ordr1 = 'order by `when` desc limit';
} else if ($_COOKIE['sortingContests'] == 'oldests') {
		$ordr1 = 'order by `when` asc limit';
} else if ($_COOKIE['sortingContests'] == 'completed') {
		$ordr1 = ' where `contest_status` = "closed"  order by `when` desc limit';
		$qweq123 = ' where `contest_status` = "closed"';
		
} else if ($_COOKIE['sortingContests'] == 'pending') {
	$ordr1 = ' where `contest_status` = "pending"  order by `when` desc limit';
	$qweq123 = ' where `contest_status` = "pending"';
} else {
	$ordr1 = 'order by `when` desc limit';
}
	
	
	
	
	
} else {
	
$newq1 = "selected";
$newq2 = "";
$newq3 = "";
$newq4 = "";

$ordr1 = 'order by `when` desc limit';
}


?>
			
						<div class="srchMainFrm3" style="width:100%;">
							
							<select name="orderType" id="orderizationofcontests" class="appearancehiding stmqw111" onchange="setType(this)">
							<option value="newests" <?=$newq1;?>>ახლები</option>
							<option value="oldests" <?=$newq2;?>>ძველები</option>
							<option value="completed" <?=$newq3;?>>დასრულებულები</option>
							<option value="pending" <?=$newq4;?>>მიმდინარე კონკურსები</option>
							</select>
						
						</div>
					
					<!--
					<div class="pp123aq">
						
					<span class="ppap123" onclick="">arrow_drop_down</span>
				
					</div>	
		
	-->
	<script>
	
			function setType(val){
				//console.log(val.value)
				setCookies('sortingContests', val.value)
				location.reload()
			}
			
			

function setCookies(name, value = '1') {
	document.cookie = ""+name+"="+value+";path=/;";
}



function remove_cookies(name) {
	document.cookie = ""+name+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

}

			
			
	
	</script>
		
	
	</div>

		
		
				
	
			
			
			




		
	</div>












	<div class="srchMainFrm1">
			
		<div class="srchMainFrm2">	
			
						<div class="srchMainFrm3">	
							<input type="text" id="valforsearching" value="" onkeyup="parsginDataForSearching(this)" placeholder="Search" style="margin-top:0; ">	
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


$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `contests` ".$qweq123."");



$ttlq = $qq->calculation($kzftch322, $set['p_str']);





$qfetch = $pdo->query("SELECT * FROM `contests` ".$ordr1."  $ttlq, $set[p_str]");



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


<?



$qq->setPage("");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();
?>


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
