<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';


if (!isset($_GET['id'])) {
	header('Location: /index.php');
	exit;
}

if (!is_numeric($_GET['id'])){
	header('Location: /index.php');
	exit;
}


$ID = number($_GET['id']);

$video = $pdo->fetchOne("SELECT * FROM `video` WHERE `id` = ?", [$ID]);


if (!$video)
{
header('Location: /index.php');
exit;
}




$ank = get_user($video['id_user']);



$videocnt = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `video_views` WHERE `video` = '$video[id]' and `user` = '$user[id]'");



if ($videocnt == 0)
{
	$pdo->exec("UPDATE `video` SET `count` = '".($video['count']+1)."' WHERE `id` = '$video[id]'");
	$pdo->exec("insert into `video_views` (`user`, `video`, `when`) values('$user[id]', '$video[id]', '$time')");
}




if (isset($_GET['act']) && $_GET['act'] == 'remove' && ($user['id'] == $ank['id'] || $user['level']>3))
{
	
	admin_log('ვიდეოგალერეა','ვიდეოს წაშლა',"წაშალა ვიდეო სახელად >> [b] $vidpst[name] [/b] <<  ");
	
	$pdo->query("DELETE FROM `video` WHERE `id` = ?", [$ID]);
	$pdo->query("DELETE FROM `video_like` WHERE `id_video` = ?", [$ID]);
	$pdo->query("DELETE FROM `video_komm` WHERE `id_video` = ?", [$ID]);
	$pdo->query("DELETE FROM `video_views` WHERE `video` = ?", [$ID]);
	$pdo->query("DELETE FROM `bookmarks` WHERE `object_id` = ? and `book_type` = 'video'", [$ID]);
	
	
	header('Location: /plugins/video/');
	exit;
}





/* */


if (isset($_GET['comment'])) {
	
if (!is_numeric($_GET['comment'])){
header('Location: /index.php');
exit;
}	


$kqlkpid = filter($_GET['comment']);


	
$post = $pdo->fetchOne("SELECT * FROM `video_komm` WHERE `id` = ? and `id_video` = ?", [$kqlkpid, $video['id']]);

if (!$post)
{
	header('Location: /index.php');
	exit;
}



$ankz = $pdo->fetchOne("SELECT * FROM `user` WHERE `id` = ?",[$post['id_user']]);


if ($user['id'] == $ank['id'] || $user['id'] == $ankz['id'] || ($user['level']> 0 && $user['level']>=$ankz['level']) || $user['level']>=5) {
	
$pdo->query("DELETE FROM `video_komm` WHERE `id` = ? and `id_video` = ?", [$post['id'], $video['id']]);	

header("Location: ?id=$video[id]");
exit;

} else {
header("Location: /index.php");
exit;	
}

}


/* */

















if (isset($_POST['add'])) {
	
$msg = my_esc($_POST['text']);

if (strlen2($msg)>512){$err='ტექსტი ძალიან დიდია';}
if (strlen2($msg)<2){$err='ტექსტი არ უნდა იყოს 2 სიმბოლოზე ნაკლები';}

if(!isset($err)){

parseUserNameMentioned($msg, '/page/video/video.php?id='.$video['id'].'', 'mentioned_inVideos');
	
	

if (strlen2($_FILES['file1']['name'])>3 && if_img_upls($_FILES['file1']['name'])) {


  
	
   $picture = $_FILES['file1']['tmp_name'];
   
   $qq2f2l2_zz_type = 'jpg';
   $cqwe_rndm = str_shuffle("1234567804512451_1231_4123_abvczxcqwqtytyiypu-_]]");
   $qwez_r122 = str_shuffle($time);
  // $flnmn = my_esc("".$time."".$qwez_r122."".$cqwe_rndm."".rand(0,9999999)."_".rand(0,9999999)."_pic.".$qq2f2l2_zz_type);

$flnmn = my_esc("".$time."".rand(0,9999999)."_".rand(0,9999999)."_pic.".$qq2f2l2_zz_type);



   $img = new Imagick($picture);
   $img->cropThumbnailImage($img->getImageWidth(), $img->getImageHeight());
   $img->setImageFormat('jpeg');
   $img->setImageCompressionQuality(90);
   $img->writeImage($_SERVER['DOCUMENT_ROOT'].'/page/video/files/'.$flnmn);


   $img->clear(); 
   $img->destroy();  
  

} else {

$flnmn = '';
  	
	
}	


	$pdo->query("INSERT INTO `video_komm` (`id_user`, `time`, `msg`, `id_video`, `file`) values(?,?,?,?,?)", [$user['id'], $time, $msg, $ID, $flnmn]);
	

	header ("Location: video.php?id=" . $video['id']);
	exit;

} else {

	$_SESSION['message'] = $err;
	header ("Location: video.php?id=" . $video['id']);
	exit;	

}

}


if (isset($_GET['post']) && ($user['level']>0 || $user['id'] == $video['id_user'])) {

if (!is_numeric($_GET['post'])) {
	header ("Location: ?id=".$video['id']);
	exit;	
}


$pstidvk = filter($_GET['post']);

$videodw4 = $pdo->fetchOne("SELECT * FROM `video_komm` WHERE `id_video` = '".$video['id']."' AND `id` = ?",[$pstidvk]);


$vidauthor = $pdo->fetchOne("SELECT * FROM `video` WHERE `id` = '".$video['id']."'");

$vidpst = get_user($vidauthor['id_user']);	



if (!$videodw4) {	
header ("Location: ?iqweqwed=".$video['id']);
exit;	
}


$qz_y = 0;

if ($user['id'] == $vidpst['id']) {
	
	$pdo->query("DELETE FROM `video_komm` WHERE `id_video` = '".$video['id']."' AND `id` = ?",[$pstidvk]);
	
	$qz_y = 1;		
		
} else if ($vidpst['id']!=$user['id'] && ($user['level']>$vidpst['level'] || $user['level']>4)) {
	
	$pdo->query("DELETE FROM `video_komm` WHERE `id_video` = '".$video['id']."' AND `id` = ?",[$pstidvk]);
	
	admin_log('ვიდეოგალერეა','პოსტი',"წაუშალა პოსტი $vidpst[nick] -ს");
	
	$qz_y = 1;
}

	

	if ($qz_y==1)$_SESSION['message']='წარმატებით წაიშალა';
	header ("Location: ?id=".$video['id']);
	exit;
}


$ifalreadylikedbyme = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `video_like` WHERE `id_user` = '".$user['id']."' AND `id_video` = '".$video['id']."'");


$liked = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `video_like` WHERE `like` = '1' AND `id_video` = '".$video['id']."' and `id_user` = $user[id]");
$unliked = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `video_like` WHERE `like` = '0' AND `id_video` = '".$video['id']."' and `id_user` = $user[id]");



//if (isset($_GET['like']) &&  $ifalreadylikedbyme == 0 && ($_GET['like'] == 1 || $_GET['like'] == 0)) {


if (isset($_GET['like'])  && ($_GET['like'] == 1 || $_GET['like'] == 0)) {


if ($ifalreadylikedbyme>0) {
	
	
$ifalreadylikedbyme = $pdo->fetchOne("SELECT * FROM `video_like` WHERE `id_user` = '".$user['id']."' AND `id_video` = '".$video['id']."'");	

if ($ifalreadylikedbyme['like']==1 && $_GET['like'] == 0)  {
	   $pdo->Exec("update  `video_like` set `like` = '0' where `id_user` = '$user[id]' and `id_video` = '$video[id]'");
} else if ($ifalreadylikedbyme['like']==0 && $_GET['like'] == 1)  {
		$pdo->Exec("update  `video_like` set `like` = '1' where `id_user` = '$user[id]' and `id_video` = '$video[id]'");
} else if ($ifalreadylikedbyme['like'] == $_GET['like'])  {
	   $pdo->Exec("delete from `video_like` where `id_user` = '$user[id]' and `id_video` = '$video[id]'");
}

	
} else {


$qwereact = filter($_GET['like']);

	$pdo->query("INSERT INTO `video_like` (`id_video`, `id_user`, `like`) VALUES (?, ?, ?)",[$video['id'], $user['id'], $qwereact]);

}


header("Location: video.php?id=$video[id]");
exit;



}

$ifxr12 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `bookmarks` WHERE `user_id` = '$user[id]'  and `book_type` = 'video' and `object_id` = '$video[id]'");


if (isset($_GET['act']) && $_GET['act']=='book') {



if ($ifxr12 == 0) {

	$pdo->query("insert into `bookmarks` (`when`,`book_type`, `user_id`,`object_id`) values(?,?,?,?)",[$time,'video',$user['id'],$video['id']]);
	
} else {

	$pdo->query("delete from `bookmarks` where `user_id` = ?  and `book_type` = 'video' and `object_id` = ?",[$user['id'],$video['id']]);
	
}

header("Location: video.php?id=$video[id]");
exit;	
	
}



include '../../inc/header.php';

title();
aut(); 


$zqwe = new user($video['id_user']);

?>



<div class="cz_vid_1">
	
	
<? 

$kqwe = preg_match("/ok.ru\/(video|live)\/(\d+)/ui", $video['url'], $matchV);

if ($kqwe) {
	
$vidUlrqp = $matchV[0];
	
$qwekqweviduql = str_replace(['live','video'], ['videoembed','videoembed'], "https://".detect($vidUlrqp));	
	
?>

<iframe allowfullscreen frameborder="0" class="cifirm1frmae" src="<?=detect($qwekqweviduql);?>"></iframe>

<? } else { ?>

<iframe allowfullscreen frameborder="0" class="cifirm1frmae" src="//www.youtube.com/embed/<?=detect($video['url']);?>?feature=player_detailpage"></iframe>

	
<? } ?>

</div>


<div class="bwhite">


<div class="cz_vid_2"><?=detect($video['name']);?></div>

<div class="vid_flx">



<div>
	
	
	
	<div class="vidFlN22_12">
	
		<div>
			<?=$zqwe->photo50(128,60,60,"5px");?>
		</div>
	
		<div class="vl_hlMLitn21">
			<div><?=$zqwe->nick();?></div>
			<div> <?=$video['count'];?> views <span class="relative czraft_22_er"></span>  <?=when($video['time']);?></div>	
		</div>
	
	</div>
	
	
	
	</div>


<?

$hliked = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `video_like` WHERE `like` = '1' AND `id_video` = '".$video['id']."'");
$hunliked = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `video_like` WHERE `like` = '0' AND `id_video` = '".$video['id']."'");

?>

<div>

<div>

<div class="PlaceSdBS">



<a href="?id=<?=$video['id'];?>&act=book">

<div class="rOundLinks">

<?=($ifxr12 == 0 ? '<span class="material-symbols-outlined virlfp1_2zqz">playlist_add</span> Save' : '<span class="material-symbols-outlined virlfp1_2zqz">playlist_remove</span> Unsave');?>

   </span>
</div> 

</a>



	
<a href="?id=<?=$video['id'];?>&amp;like=1">


<div class="rOundLinks">
	

<?

if ($liked>0){ 
	$thumbsup = '<span class="material-symbols-outlined2">thumb_up</span>';
} else {
	$thumbsup = '<span class="material-symbols-outlined">thumb_up</span>';
}


if ($unliked>0){ 
	$thumbsdown = '<span class="material-symbols-outlined2">thumb_down</span>';
} else {
	$thumbsdown = '<span class="material-symbols-outlined">thumb_down</span>';
}

?>	
	
	

<?=$thumbsup;?>


<span class="virlfp1_2zq"><?=$hliked;?></span>
</div> 






	
<a class="black" href="?id=<?=$video['id'];?>&amp;like=0">

<div class="rOundLinks">
	
<?=$thumbsdown;?>

	<span class="virlfp1_2zq"><?=$hunliked;?></span>
</div>

</a> 

	
	


</div>

</div>



</div>


</div>


<div class='break'><?echo output_text($video['description']);?>

</div>



</div>


<? if ($user['id']==$ank['id'] || $user['level']>3) { ?>

	<div class="czlt2_z_dltb">
		<a href="?id=<?=$ID;?>&amp;act=remove"><span class="material-symbols-outlined">delete</span>  ვიდეოს წაშლა</a>
	</div>
	
<? } ?>





<? 

$k_post=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `video_komm` WHERE `id_video` = '$video[id]'");
?>




<script>
	
	
function SlPHt(){

$("#imgInp").click();	
	
var cZ1125 = document.querySelector("input[name='file1']")
	
cZ1125.onchange = (event) => {
	
if (!if_image(event.target.files[0].type)) {
		
rMDfpHOT();

} else {

var reader = new FileReader();
 
 reader.onload = function(){

       $('#blah').attr('src', reader.result);
       $("#blah").show();
       $('#okButton').prop('disabled', false);
	   $("#flrmvd").show();
	  
    };	
		
	 reader.readAsDataURL(event.target.files[0]);
	
}

};	
	
}	



function rMDfpHOT(){
var cfz = document.querySelectorAll("input[name=file1]");


cfz[0].value = null;
cfz[0].files = null;	


$("#flrmvd").hide();
$("#blah").hide();
$('#blah').attr('src', '');
	
}



var stsofsm = 0;

$(".crzPDNGR").click(function(){

	
if (stsofsm == 1) {

if ($("#simptom_mail_bb").css("display") =='none') {
	$("#simptom_mail_bb").show();
} else {	
	$("#simptom_mail_bb").hide();
}
	
stsofsm = 0;	
	
} else {
	
stsofsm = 1;

}

});

</script>
 

<div class="form">
	
<form method="post" action="?id=<?=$video['id'];?>" enctype="multipart/form-data">

<input style="display:none;" type="file" name="file1" id="imgInp" accept="image/*;capture=camera">

<div class="CPosTFleXjust3">
	
<div class="flex5">
	<?=$usojbid->photo3('48');?>
</div>	

<div class="flex95">

<textarea onfocus="setFcs1Btn()" onblur="setUnFcs1Btn()" id="bb_textarea" name="text" placeholder="What's on your mind?"><?=$insert;?></textarea>

<div id="dispEmojiPicker"></div>


</div>	
	
</div>


<div class="k_chlg21_zpp"> </div>

<div class="CPosTFleXjust">
	
	<div>

<div class="k_chlg21_zpp2">

		<span class="Icons pointer" onclick="funRndrEmojis()" id="dsplEmojiChk">mood</span>

		<span class="Icons pointer" onclick="SlPHt();">photo_camera</span>

		<span class="Icons none pointer" id="flrmvd" onclick="rMDfpHOT();">delete</span>

</div>



	</div>	
		

	
	





<div>

<button id="okButton" name="add" type="submit" class="cznt21btn">


<svg class="icon-20" width="18" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.8325 6.67463L8.10904 12.4592L1.59944 8.38767C0.66675 7.80414 0.860765 6.38744 1.91572 6.07893L17.3712 1.55277C18.3373 1.26963 19.2326 2.17283 18.9456 3.142L14.3731 18.5868C14.0598 19.6432 12.6512 19.832 12.0732 18.8953L8.10601 12.4602" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>	
	
	<span style="font-size:16px;">Send</span>
	
	</button>



</div>	


</div>

</form>

</div>



<div id='smiles_frame'></div>




<div class="skscht_2">
	<img src="" id="blah" class="skscht_3">
</div>





<!-- end of commenting -->







<?




$qq = new Pagination();


$kzftch322 = $k_post;


$ttlq = $qq->calculation($kzftch322, $set['p_str']);






?>









<!-- -->






<?if ($k_post>0) { ?>
	
<div class="pCqmn2_22z">
<?php echo $k_post;?>  Comments
</div>
	


<div class="czgosspig">

<?
$query = $pdo->query("SELECT * FROM `video_komm`  WHERE `id_video` = '$video[id]' ORDER BY id DESC LIMIT $ttlq, $set[p_str]");



while ($post = $query->fetch())
{
	

$posterank = new user($post['id_user']);


$kqrct = json_decode($post['reactions']);

 
$kq_zz = $kqrct->wow + $kqrct->sad + $kqrct->angry + $kqrct->frown + $kqrct->love;
 


$kzftch3222 = $pdo->fetchOne("SELECT * FROM `user_post_reaction` WHERE 
	`post_id` = '".$post['id']."' and 
	`where` = 'video' and 
	`user` = '".$user['id']."'
	");

if ($kzftch3222) {
	$tpRc1 = $kzftch3222['type'];
	$lstreacte = 1;
} else {
	$tpRc1 = '';
	$lstreacte = 0;
}



$qnewrct = new Reactions('video', $post['id'], '/page/notes/');


$qnewrct->st_reactSts = $lstreacte;
$qnewrct->lastbtn = $tpRc1;


?>






<div class="pc21zggp2">



<div class="Live_Chat1">

<div>
<?=$posterank->photo3(48);?>	
</div>


<div class="Live_Chat2">




<div>


<div class="rsr21">
	
<div>
	
<div class="pcr1_chtr12">

<div><?=$posterank->nick();?>	</div>

<div>


	<span onclick="ShowThings(this, 'post')" class="Drpdnw material-symbols-outlined czg21gstr1123" data_id="<?php echo $post['id'];?>">more_horiz</span>



<div class="drpdmain" pstevents="<?php echo $post['id'];?>" style="display:none;">
	
	
<div class="drpd">


<? if ($user['id'] == $ank['id'] || ($user['level']> 0 && $user['level']>=$posterank->level) || $user['id'] == $posterank->id || $user['level']>=5){ ?>

   <div><span class="material-symbols-outlined">delete</span> <a href="?id=<?=$video['id'];?>&comment=<?=$post['id'];?>">Delete</a></div>
	
	<div><span class="material-symbols-outlined">edit_note</span> <a href="post_edit.php?pid=<?=$post['id'];?>">Edit</a></div>
	
<? } ?>



<div><span class="material-symbols-outlined">flag</span> <a href="report.php?pid=<?=$post['id'];?>">Report</a></div>


</div>


</div>


</div>

</div>	
	
	
	



</div>

<div>

<span class="ctzt1231c13">
	<?=output_text($post['msg']); ?>
</span>

<?=$qnewrct->addReactions("/page/video/reacts.php?post=$post[id]", $kqrct, $kq_zz);?>


</div>	

</div>	


<div>
	
	
<? if (strlen2($post['file'])>1) { ?>
	<div class='Live_Chat7'></div>
	<a href='/page/video/files/<?=detect($post['file']);?>'> <img class='Live_Chat8' src='/page/video/files/<?=detect($post['file']);?>'>  </a> 
<? } ?>





	<?=$qnewrct->ShowReactionButton("?id=$video[id]&response=$posterank->id", $post['time']);?>





</div>


	


</div>





</div>

</div>




</div>








<? } ?>

</div>

<? } ?>



<!-- -->
	
	
<? 

$qq->setPage("/page/video/video.php?", "id=$ID");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();

 ?>





<? 
$qvid = $pdo->query("SELECT * FROM `video` ORDER BY RAND() LIMIT 5");


if ($qvid->rowCount()>0) { 
?>


<div class="czgvdrndr_2z_2z">You may like</div>
	

<div class="pvii1Fll11Mian">


<div class="proVidGallary">
	
<? while($qvid2_z = $qvid->fetch()) { ?>


<?



if ($qvid2_z['picurl']!='') {
	$kurlq = '/page/video/images/'.$qvid2_z['picurl'].'.jpg';
} else {
	$kurlq = 'http://i.ytimg.com/vi_webp/'.detect($qvid2_z['url']).'/1.webp';
}


?>

		<div>
	
	<div class="pvdkcntr1AlCentering"> 
		<img class="fVidDpl1"  src="<?echo detect($kurlq);?>">
	</div>
		
	 
	<div>
		<b><a class="black" href="video.php?id=<?=$qvid2_z['id'];?>"><?=utf_substr(detect($qvid2_z['name']),0,20);?></a></b>
	</div>


	<div>
		<?=$qvid2_z['count'];?> view
	</div>
	 
		
		
		
		</div>
		
		
		
	 






<? } ?>

</div>

</div>

<? } ?>





<?

include '../../inc/footer.php';
?>
