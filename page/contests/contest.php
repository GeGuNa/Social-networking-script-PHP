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


$hwmparticipantsarethere = $pdo->queryFetchColumn("select count(`pid`) from `contest_participants` where `object_id` = ?",[$contest['cid']]);



$pdo->Exec("update `contests` set `views` = '".($contest['views']+1)."' where `cid` = '$kpid1_ll';");

if ($user['level']>3 && (isset($_GET['act']) && $_GET['act'] == 'delete')) {
	$pdo->Exec("DELETE FROM `contests` where `cid` = '$contest[cid]';");
	header('Location: /page/contests/');
	exit;	
}




if (isset($_GET['act']) && $_GET['act'] == 'participate') {
	
if ($contest['contest_status']=='closed') {
	header('Location: /index.php');
	exit;	
}


if ($pdo->queryFetchColumn("select count(`pid`) from `contest_participants` where `user_id` = ? and `object_id` = ?",[$user['id'], $contest['cid']])>0) {
	header('Location: /index.php');
	exit;		
}



if ($hwmparticipantsarethere>=$contest['howmanypeople']) {
	$_SESSION['message'] = 'კონკურსში მონაწილეობა უკვე შეულებელია რადგანაც არ არის ცარიელი ადგილი';
	header('Location: /index.php');
	exit;	
}


$pdo->exec("insert into `contest_participants` (`user_id`, `object_id`,`when`) values('$user[id]','$contest[cid]', '$time')");	
	
	header("Location: add_photo.php?id=$contest[cid]");
	exit;		
}



$author = get_user($contest['user_id']);

include '../../inc/header.php';

title();
aut(); 

?>





<?
/*
$ReviewingData31s = $pdo->query("SELECT 
*,
`contests`.`cid` as IdOfContest,
`contest_participants`.`likes` as LikesfOFtheuser,
`contest_participants`.`user_id` as usrid1,
`contests`.`prize` as winnersPrize


FROM `contest_participants`  
	JOIN  
	`contests` 
		ON 
	`contests`.`cid` = `contest_participants`.`object_id` 
	
	WHERE
		`contests`.`cid` = ? and `contests`.`end` < ? and `contests`.`contest_status` != 'closed'  ORDER BY `contest_participants`.`likes` DESC LIMIT 1;", [$contest['cid'],$time]);

while ($qq31zzwe = $ReviewingData31s->fetch()) {

	//var_dump($qq31zzwe);

	$qwqe3qzq12 = get_user($qq31zzwe['usrid1']);

	$pdo->query("update `contests` set `thewinner` = ?,`contest_status` = ? where `cid` = ?", [
		$qwqe3qzq12['id'], 
		"closed", 
		$qq31zzwe['IdOfContest']
	]);


$pdo->query("update `user` set `balls` = ? where `id` = ?", [abs((int)$qwqe3qzq12['balls']+$qq31zzwe['winnersPrize']), $qwqe3qzq12['id']]);


}

*/
?>



<style>


.rosYGirlsD {
	object-fit: contain;
    width: 100%;
    height:100%;
}


</style>


<div style="height:400px;background:#fff;padding:10px;">


<img src="/page/contests/covers/<?=detect($contest['cover']).'.jpg';?>" class="rosYGirlsD">

</div>




	
	<? if ($contest['contest_status'] == 'closed') { ?>


<? $winner1 = get_user($contest['thewinner']);  ?>

	<div style="margin-top:10px;background-color: #09F;color:#fff;display:flex;height:60px;justify-content:center;align-items: center;font-size: 20px;">
	
		კონკურსი დასრულდა და გაიმარჯვებულია:  <a style="color:black;padding-left:10px;" href="/info.php?id=<?=$winner1['id'];?>"> <?=$winner1['nick'];?> </a>
	
	</div>
	
	<? } ?>



<?

$qq = $pdo->fetchOne("select * from `contest_participants`  where `user_id` = ? and `object_id` = ?", [$user['id'], $contest['cid']]);

?>


<? if ($contest['contest_status'] != 'closed') { ?>

<? if (!$qq) { ?>
	
	

	
<? if ($hwmparticipantsarethere<$contest['howmanypeople']) { ?>
	<div style="margin-top:10px;background-color: #09F;color:#fff;display:flex;height:60px;justify-content:center;align-items: center;font-size: 20px;cursor:pointer;" onclick="window.location='?id=<?=$contest['cid'];?>&act=participate';">
		მონაწილეობის მიღება
	</div>
<? } ?>


	
<? } else { ?>


<?if ($pdo->queryFetchColumn("select count(`pid`) from `contest_participant_photos` where `user_id` = ? and `object_id` = ?",[$user['id'], $contest['cid']])<1) { ?>
	
	<div style="margin-top:10px;background-color: #af0000;color:#fff;display:flex;height:60px;justify-content:center;align-items: center;font-size: 20px;cursor:pointer;" onclick="window.location='add_photo.php?id=<?=$contest['cid'];?>';">
		ფოტოს ატვირთვა
	</div>	
	
	
<? } else { ?>

	<div style="margin-top:10px;background-color: #390;color:#fff;display:flex;height:60px;justify-content:center;align-items: center;font-size: 20px;">
		უკვე მონაწილეობთ
	</div>


<?  }  ?>




<?  }  } ?>


<?


$participants = $pdo->queryFetchColumn("select count(`pid`) from `contest_participants` where `object_id` = ?",[$contest['cid']]);

?>



<div style="display:block;padding:10px;background:#fff;margin-top:15px;margin-bottom:15px;">

	<div> <?=detect($contest['name']);?> </div>
	<div> ავტორი: <?=detect($author['nick']);?> </div>
	<div> ნახვები: <?=$contest['views'];?> </div>
	<div> დასრულდება: <?=date("H:i:s",$contest['end']);?> </div>
	<div> დაიწყო: <?=times($contest['when']);?> </div>
	<div>მონაწილეები:  <a href="participants.php?id=<?=$contest['cid'];?>"> (<?=$participants;?> of <?=$contest['howmanypeople'];?>) </a> </div>
	
	

	
	
	<div style="word-break:break-word;"><br/>
		<?=output_text($contest['description']);?>
	</div>
	



<!--
<ul class="pc-social"><li class="pc-showlink"><i class="fa fa-lg fa-link"></i></li><li class="pc-showqrcode"><i class="fa fa-lg fa-qrcode"></i></li><li><a href="https://www.facebook.com/sharer.php?u=https%3A%2F%2Fgalleryplugins.com%2Fphoto-contest%2Fdemo-4-columns%2F%3Fcontest%3Dphoto-detail%26photo_id%3D187&amp;t=People-42" target="_blank"><i class="fa fa-fw fa-lg fa-facebook"></i></a></li><li><a href="https://twitter.com/intent/tweet?source=SOURCE&amp;text=People-42&amp;url=https%3A%2F%2Fgalleryplugins.com%2Fphoto-contest%2Fdemo-4-columns%2F%3Fcontest%3Dphoto-detail%26photo_id%3D187" target="_blank"><i class="fa fa-fw fa-lg fa-twitter"></i></a></li><li><a href="https://plus.google.com/share?url=https%3A%2F%2Fgalleryplugins.com%2Fphoto-contest%2Fdemo-4-columns%2F%3Fcontest%3Dphoto-detail%26photo_id%3D187" target="_blank"><i class="fa fa-fw fa-lg fa-google-plus"></i></a></li><li><a href="https://pinterest.com/pin/create/link/?url=https%3A%2F%2Fgalleryplugins.com%2Fphoto-contest%2Fdemo-4-columns%2F%3Fcontest%3Dphoto-detail%26photo_id%3D187&amp;description=People-42&amp;media=https%3A%2F%2Fgalleryplugins.com%2Fphoto-contest%2Fwp-content%2Fuploads%2Fsites%2F2%2F2017%2F09%2FPeople-42.jpg" target="_blank"><i class="fa fa-fw fa-lg fa-pinterest"></i></a></li><li><a href="https://www.tumblr.com/share/link?url=https%3A%2F%2Fgalleryplugins.com%2Fphoto-contest%2Fdemo-4-columns%2F%3Fcontest%3Dphoto-detail%26photo_id%3D187&amp;name=People-42" target="_blank"><i class="fa fa-fw fa-lg fa-tumblr"></i></a></li><li><a href="https://reddit.com/submit?url=https%3A%2F%2Fgalleryplugins.com%2Fphoto-contest%2Fdemo-4-columns%2F%3Fcontest%3Dphoto-detail%26photo_id%3D187&amp;title=People-42" target="_blank"><i class="fa fa-fw fa-lg fa-reddit"></i></a></li><li><a href="https://del.icio.us/post?url=https%3A%2F%2Fgalleryplugins.com%2Fphoto-contest%2Fdemo-4-columns%2F%3Fcontest%3Dphoto-detail%26photo_id%3D187&amp;title=People-42" target="_blank"><i class="fa fa-lg fa-delicious"></i></a></li><li><a href="https://digg.com/submit?url=https%3A%2F%2Fgalleryplugins.com%2Fphoto-contest%2Fdemo-4-columns%2F%3Fcontest%3Dphoto-detail%26photo_id%3D187&amp;title=People-42" target="_blank"><i class="fa fa-fw fa-lg fa-digg"></i></a></li><li><a href="https://www.stumbleupon.com/submit?url=https%3A%2F%2Fgalleryplugins.com%2Fphoto-contest%2Fdemo-4-columns%2F%3Fcontest%3Dphoto-detail%26photo_id%3D187&amp;title=People-42" target="_blank"><i class="fa fa-fw fa-lg fa-stumbleupon"></i></a></li><li><a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Fgalleryplugins.com%2Fphoto-contest%2Fdemo-4-columns%2F%3Fcontest%3Dphoto-detail%26photo_id%3D187&amp;title=People-42" target="_blank"><i class="fa fa-fw fa-lg fa-linkedin"></i></a></li><li><a href="https://vk.com/share.php?url=https%3A%2F%2Fgalleryplugins.com%2Fphoto-contest%2Fdemo-4-columns%2F%3Fcontest%3Dphoto-detail%26photo_id%3D187" target="_blank"><i class="fa fa-fw fa-lg fa-vk"></i></a></li><li><a href="whatsapp://send?text=https%3A%2F%2Fgalleryplugins.com%2Fphoto-contest%2Fdemo-4-columns%2F%3Fcontest%3Dphoto-detail%26photo_id%3D187" data-action="share/whatsapp/share" target="_blank"><i class="fa fa-fw fa-lg fa-whatsapp"></i></a></li></ul>
-->

</div>


<div style="padding:10px;background:#fff;margin-bottom:10px;">

გაზიარება:   <a href="https://www.facebook.com/sharer/sharer.php?u=https://geoclass.ge/page/contests/contest.php?id=<?=$contest['cid'];?>"> 
	
	
	<img src="/img/facebook.png">


	</a>  
	
	
	<a href="fb-messenger://share?link=https://geoclass.ge/page/contests/contest.php?id=<?=$contest['cid'];?>"> <img src="/img/messenger.png"> </a> 

<a href="https://web.whatsapp.com/send?text=https://geoclass.ge/page/contests/contest.php?id=<?=$contest['cid'];?>"> <img src="/img/social.png"> </a>




<a href="viber://forward?text=https://geoclass.ge/page/contests/contest.php?id=<?=$contest['cid'];?>"> <img src="/img/viber.png"> </a>

<a href="https://twitter.com/intent/tweet?source=SOURCE&amp;text=<?=detect($contest['name']);?>&amp;url=https://geoclass.ge/page/contests/contest.php?id=<?=$contest['cid'];?>"> <img src="icons8-twitter.svg"> </a>


</div>







<?

//$z123zzaqe = $pdo->fetchOne("SELECT * FROM `contest_participants` WHERE `user_id` = ? and `object_id` = ?", [$user['id'], $contest['cid']]);

?>

<? if ($pdo->queryFetchColumn("select count(`pid`) from `contest_participants` where `user_id` = ? and `object_id` = ?",[$user['id'], $contest['cid']])>0) {  ?>
<div class="pcstpgnr2z21dvt21">
	<i class="fa fa-user-circle" aria-hidden="true"></i>
 <a href="participant.php?user=<?=$user['id'];?>&contest=<?=$contest['cid'];?>"> 


  ჩემი ფოტოები</a>
</div>


<? } ?>


<? if ($user['level']>3) { ?>
<div class="pcstpgnr2z21dvt21" style="margin-bottom:10px;">
<a href="?id=<?=$contest['cid'];?>&act=delete">
	<i class="fa fa-trash  fa-fw"></i>  წაშლა
</a>
</div>

<? } ?>




<?
include '../../inc/footer.php';
?>
