<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';

if (!isset($_GET['id'])){
	header('Location: /index.php');
	exit;
}


if (!is_numeric($_GET['id'])){
	header('Location: /index.php');
	exit;
}	

$kpid1_ll = filter($_GET['id']);

$post = $pdo->fetchOne("SELECT * FROM `post_music` WHERE `uid` = ?", [$kpid1_ll]);

if (!$post)
{
	header('Location: /index.php');
	exit;
}

$author = get_user($post['whom']);


$kqwekqweLk1aq = $pdo->query("select count(*) from `post_music_likes` where `mid` = ?", [$post['uid']])->fetchColumn();


$ifiLikDmnMUSC = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `post_music_likes` WHERE `whom` = '".$user['id']."' AND `mid` = '".$post['uid']."'");


$ifiBkdDmnMUSC = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `post_music_bookmark` WHERE `whom` = '".$user['id']."' AND `mid` = '".$post['uid']."'");


if ($ifiLikDmnMUSC == 0)$clrForICn = 'color:white'; else $clrForICn = 'color:red';

if ($ifiBkdDmnMUSC == 0)$clrForICn31q = 'Favourite'; else $clrForICn31q = 'Remove from favourite';



include '../../inc/header.php';


title();
aut(); 









	if (isset($_GET['act']) && $_GET['act'] == "book")
	{
	
	
	
	
	
		if ($ifiBkdDmnMUSC == 0) {
			
			$pdo->exec("INSERT INTO `post_music_bookmark` (`mid`, `whom`, `when`) VALUES ('$post[uid]', '$user[id]', '$time')");
			
		
			
		}
		else {
			
			$pdo->exec("delete from  `post_music_bookmark` where `whom` = '$user[id]' and `mid` = '$post[uid]'");
			
	
	}
	
			header("Location: ?id=$post[uid]");
			exit;		
		
		
		
	}







	if (isset($_GET['act']) && $_GET['act'] == "heart")
	{
	
	
	
	
	
		if ($ifiLikDmnMUSC == 0) {
			$pdo->exec("INSERT INTO `post_music_likes` (`mid`, `whom`, `when`) VALUES ('$post[uid]', '$user[id]', '$time')");
			
			
				
		$pdo->query("update `post_music` set `likes` = ?  where `uid` = ?",[  
			abs($post['likes']+1), $post['uid']
		]);	
			
			
		}
		else {
			$pdo->exec("delete from  `post_music_likes` where `whom` = '$user[id]' and `mid` = '$post[uid]'");
	
		
		
			$pdo->query("update `post_music` set `likes` = ?  where `uid` = ?",[  
			abs($post['likes']-1), $post['uid']
		]);
		
		
		
	}
			header("Location: ?id=$post[uid]");
			exit;		
		
		
		
	}



	









?>



<?

$qauthor = new user($author['id']);
$qlzd = ((strlen2($post['pimage'])>0) ? '/page/Music/images/'.detect($post['pimage']).'.jpg' :  '/pics/no-thumbnail-image-placeholder-forums-blogs-websites-148010362.jpg'); 

$KcatIFxcqwe = $pdo->fetchOne("SELECT * FROM `post_music_category` WHERE `cid` = ?", [$post['cid']]);




?>


<style>
.pmus1 { 
	background:#fff;padding:10px;
}
.pmus2 {
	display:flex;gap:10px;padding-bottom:15px;padding-right:10px;padding-left:10px;
}
.pmus2imgz {
	width:150px;height:auto;border-radius:10px;
}
.pmus31 {
	display:flex;flex-direction:column;row-gap:5px;
}
</style>


<div class="pmus1">

<div class="pmus2">
	
<div><img class="pmus2imgz" src="<?=$qlzd;?>"></div>

	<div style="align-self: center;">
			<div class="pmus31">
				<div><span class="FHelAll"><?=detect($post['name']);?></span></div>
				<div><span class="FlolqLF1231z">Author:</span> <?=$qauthor->nick();?></div>
				<div><span class="FlolqLF1231z">When:</span> <?=when($post['when']);?></div>
				<div><span class="FlolqLF1231z">Introduction:</span> <?=detect($post['desc']);?></div>	
				<div><span class="FlolqLF1231z">Category:</span> <a href="./cat.php?id=<?=detect($KcatIFxcqwe['cid']);?>"><?=detect($KcatIFxcqwe['name']);?> </a></div>	
		</div>
	
	
	</div>


</div>

</div>


<div class="kekekh_mus1">
<audio style="width: 100%;" src="<?=detect($post['musLnk']);?>" controls></audio>
</div>


<?
$kekeqq = filesize($_SERVER['DOCUMENT_ROOT']."/".$post['musLnk']);
$ksizeOFmus = convert($kekeqq);
?>

<div class="kbrqwDv1z kekekh_mus1DowFlex">
	<div><div class="MusdOWlnk1z" onclick="window.location='<?=$post['musLnk'];?>';">Download</div></div>
	<div><div class="MusdOWlnk1z MusFsizeDiv">[<?=$ksizeOFmus;?>]</div></div>
</div>





	<!--	
	
onclick="window.location='https://www.facebook.com/sharer/sharer.php?u=https://geoclass.ge/page/Music/post.php?id=<?=$post['uid'];?>';"		

-->


<div class="kbrqwDv1z musSharingDivsFlex1z">
	
	
	
	
				<div><i class="fa-brands fa-viber" style="color: #0066eb;" onclick="window.location='viber://forward?text=https://geoclass.ge/page/Music/post.php?id=<?=$post['uid'];?>';"></i></div>
			
	
			

				
				
				<div><i class="fa-brands fa-whatsapp" onclick="window.location='https://web.whatsapp.com/send?text=https://geoclass.ge/page/Music/post.php?id=<?=$post['uid'];?>';"		
	 style="color: #25D366;"></i></div>
				
				
				<div><i class="fa-brands fa-facebook" onclick="window.location='https://www.facebook.com/sharer/sharer.php?u=https://geoclass.ge/page/Music/post.php?id=<?=$post['uid'];?>';"	 style="color: #4267B2;"></i></div>
				
		
				
				
				<div><i class="fa-brands fa-facebook-messenger" onclick="window.location='fb-messenger://share?link=https://geoclass.ge/page/Music/post.php?id=<?=$post['uid'];?>';" style="color:#00B2FF;"></i></div>
				
				
				<div><i class="fa-brands fa-twitter" onclick="window.location='https://twitter.com/intent/tweet?text=https://geoclass.ge/page/Music/post.php?id=<?=$post['uid'];?>';"  style="color:#00B2FF;"></i></div>
				
				
				
				
				
				
</div>


<style>

.musSharingDivsFlex1z {
	display:flex;gap:10px;background:#fff;padding:10px;
}

.musSharingDivsFlex1z div i {
	font-size:28px;
	cursor:pointer;
}

.MusdOWlnk1z {
		cursor:pointer;
		floaT: left;
		background: #FC427B;
		padding: 0px 10px;
		height: 40px;
		border-radius: 5px;
		line-height: 40px;
		color:#fff;
}
	
.MusFsizeDiv {
    background: #0097E6 !important;
    cursor: default !important;
}	
	
	
	.kekekh_mus1DowFlex {
		display:flex;
		width:100%;
		justify-content:space-between;
		background:#fff;
		padding:10px;
	}	
	
	
	.kekekh_mus1 {
	padding:10px;background:#fff;	
	}
.kekhl1qz {
	background-color: #4b58a8!important;color:#fff;padding: 4px 9px;border-radius: 4px;
}

.kekeh_musc321 {
	padding:10px;background:#fff;display:flex;width:100%;justify-content:space-between;
}

.kbrqwDv1z {
	border-top:1px solid #dddddd;
}

</style>


<div class="kbrqwDv1z">

<div class="kekeh_musc321">
	
	<div><a href="?id=<?=$post['uid'];?>&act=heart" class="kekhl1qz"><i class="fa-solid fa-heart" style="<?=$clrForICn;?>"></i> <?=$kqwekqweLk1aq;?></a></div>
	
	<div><a href="?id=<?=$post['uid'];?>&act=book" class="kekhl1qz"><?=$clrForICn31q;?></a></div>
	
	
	
</div>


</div>




<style>

.qweqk1_fl1 {
	padding:10px;
	background:#fff;
	display:flex;
	width:100%;
	flex-wrap:wrap;
}

.qweqk1_fl1 div {
	color:#fff;
	padding: 5px;
	flex: 100%;
	border:1px solid #dddddd;
	margin-bottom:5px;
}

.qweqk1_fl1 div:hover {
	background-color: #ff5f00!important;
}

.qweqk1_fl1 div:hover a {
	color: #fff!important;
}

.krndmmuscdes1 {
	background:#fff;padding:10px;
}

.rndMus1zq {
	display:flex;gap:10px;padding-bottom:15px;
}
.rndmsssmUMg1{ 
	height:auto;width:50px;border-radius:10px;
}
</style>


<div style="margin-top:15px;">
	
<div class="krndmmuscdes1">Random</div>

<? $qfetch = $pdo->query("SELECT * FROM `post_music` ORDER BY RAND() DESC LIMIT 5");


?>

<div style="padding:10px;background:#fff;">
<? while ($kqwe123 = $qfetch->fetch()): ?>

<?

$qauthor3zq = new user($kqwe123['whom']);
$qlzd = ((strlen2($kqwe123['pimage'])>0) ? '/page/Music/images/'.detect($kqwe123['pimage']).'.jpg' :  '/pics/no-thumbnail-image-placeholder-forums-blogs-websites-148010362.jpg'); 


?>


	<div class="rndMus1zq">
		<div><img src="<?=$qlzd;?>" class="rndmsssmUMg1" ></div>


		<div>
			<div style="cursor:pointer;" onclick="window.location='post.php?id=<?=$kqwe123['uid'];?>';"><span class="FHelAll"><?=detect($kqwe123['name']);?></span></div>
			<div><span class="FlolqLF1231z"></span> <?=$qauthor3zq->nick();?></div>
		</div>



	</div>




<? endwhile; ?>
</div>

</div>







<?
include '../../inc/footer.php';
?>
