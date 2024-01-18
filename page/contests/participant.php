<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';

include 'review.php';

if (!isset($_GET['user']) || !isset($_GET['contest'])) {
	header('Location: /index.php');
	exit;
}

if (!is_numeric($_GET['user']) || !is_numeric($_GET['contest'])) {
	header('Location: /index.php');
	exit;
}	

$kpid1_ll2 = filter($_GET['user']);
$kpid1_ll1 = filter($_GET['contest']);





$participan31231t = $pdo->fetchOne("SELECT * FROM `contest_participants` WHERE `user_id` = ? and `object_id` = ?", [$kpid1_ll2, $kpid1_ll1]);



$participant = $pdo->fetchOne("SELECT * FROM `contest_participants` WHERE `user_id` = ? and `object_id` = ?", [$kpid1_ll2, $kpid1_ll1]);

if (!$participant)
{
	header('Location: /index.php');
	exit;
}


$author = get_user($kpid1_ll2);



$pdo->Exec("update `contest_participants` set `views` = '".($participant['views']+1)."' where `pid` = '$participant[pid]';");


$ifiliked = $pdo->fetchOne("SELECT * FROM `contest_participant_photo_likes` WHERE `user_id` = ? and `object_id` = ? and `photo` = ?", [$user['id'], $participant['pid'], $author['id']]);
	


$hmanylikes13z = $pdo->fetchOne("SELECT count(`lid`) as cntr  FROM `contest_participant_photo_likes` WHERE `object_id` = ?", [$participant['pid']])['cntr'];



if (isset($_GET['act']) && $_GET['act']=='like') {
	
	
	
if (!$ifiliked) {
	
	$pdo->Exec("insert into `contest_participant_photo_likes` (`when`, `user_id`,`object_id`,`photo`) values('$time','$user[id]', '$participant[pid]', '$author[id]')");
	
	
	
	$pdo->query("update `contest_participants`  set `likes` = ? where `pid` = ? and `user_id` = ?", [abs($participan31231t['likes']+1), $participan31231t['pid'], $author['id']]);
	
	
	
	
} else {
	
	$pdo->Exec("delete from `contest_participant_photo_likes` where `user_id` = '$user[id]' and `object_id` = '$participant[pid]' and `photo` = '$author[id]'");
	
	
	
	$pdo->query("update `contest_participants`  set `likes` = ? where `pid` = ? and `user_id` = ?", [abs($participan31231t['likes']-1), $participan31231t['pid'], $author['id']]);
	
	
	
}


	$_SESSION['message'] = 'წარმატებით შესრულდა მოქმედება';
	header("Location: ?user=".$kpid1_ll2."&contest=".$kpid1_ll1."");
	exit;



/*
	

create table `contest_participant_photo_likes` (
`lid` bigint(64) unsigned not null auto_increment,
`when` bigint(64) unsigned not null,
`photo` bigint(64) unsigned not null,
`user_id` bigint(64) unsigned not null,
`object_id` bigint(64) unsigned not null,
PRIMARY KEY (`lid`)
) AUTO_INCREMENT=1;
	
	
*/


}











?>







<?
include '../../inc/header.php';
?>




  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>


<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


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
	
	object-fit: contain;
    width: 100%;
    max-width: 100%;
    height: 300px;
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


 .slick-prev, .slick-arrow, .slick-disabled {
	 display:none !important;
 } 

</style>


<?
title();
aut(); 

?>







<?




$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `contest_participant_photos` where `object_id` = ? and `user_id` = ? ", [$participant['object_id'], $participant['user_id']]);





$qfetch = $pdo->query("SELECT * FROM `contest_participant_photos` where `object_id` = ? and `user_id` = ?  ORDER BY `pid` DESC", [$participant['object_id'], $participant['user_id']]);



if ($kzftch322 == 0) { ?>
	
	<div class='mess mTop'>
	ფოტოები არ არის
	</div>

<? } ?>


<div class="mBottom"></div>


<div style="display:block;">
	
<div style="position:relative;">
	<div style="position:absolute;    top: 8px;left: 12px;display:flex;">
		
		
	<div style=" 
    background: red;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 99999;    padding: 2px 8px;color:#fff">
    <i class="fa fa-heart  fa-fw"></i> <?=$hmanylikes13z;?>
    </div>	
		
		
		
		
		
		
	</div>

</div>	
	

<div style="background:#fff;padding:10px;display:block;">	
	
 <div id="fornavigation" >


<?


while ($post = $qfetch->fetch())
{




?>


<div class="pointer">


	<a href="/page/contests/images/<?=detect($post['photo']);?>">
		<img src="/page/contests/images/<?=detect($post['photo']);?>" class="rosYGirlsD">
	</a>

</div>



<?

}
?>

</div>

</div>

</div>



<div style="display:block;width:100%;text-align:center;background:#09F;color: #fff;padding: 15px;cursor:pointer;" onclick="window.location='?user=<?=$kpid1_ll2;?>&contest=<?=$kpid1_ll1;?>&act=like';">
<?if (!$ifiliked) { ?>


 <i class="fa fa-heart  fa-fw"></i>	მომწონს


<? } else { ?>

<i class="fa fa-heart  fa-fw" style="trasfrom:rotate(180deg);"></i>	აღარ მომწონს

<? } ?>

</div>




<? if ($kzftch322>1) { ?>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#fornavigation').slick({

  centerPadding: '60px',
  slidesToShow: 3,

});
		
		
		
    });
  </script>

<? } ?>

<?


$cidf = $pdo->fetchOne("SELECT * FROM `contests` WHERE `cid` = ?", [$kpid1_ll1]);


?>


<div style="display:block;padding:10px;background:#fff;margin-top:15px;margin-bottom:15px;">

    <div> კონკურსში: <a href="contest.php?id=<?=$cidf['cid'];?>"><?=detect($cidf['name']);?></a> </div>
	<div> მონაწილე: <a href="/info.php?id=<?=$author['id'];?>"><?=detect($author['nick']);?></a> </div>
	   <div> ნანახია: <?=$participant['views'];?> -ჯერ</div>
	<div> როდის: <?=times($participant['when']);?> </div>
		
	

</div>





<?
include '../../inc/footer.php';
?>
