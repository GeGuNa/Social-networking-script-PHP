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


$kqp123idd1 = filter($_GET['id']);	

$note = $pdo->fetchOne("SELECT * FROM `notes` WHERE `id` = ?", [$kqp123idd1]);

if (!$note)
{
	header('Location: /index.php');
	exit;
}

$author = new user($note['id_user']);



if ($note['post_type']!='post') {
	header('Location: /index.php');
	exit;	
}



/* */


if (isset($_GET['comment'])) {
	
if (!is_numeric($_GET['comment'])){
header('Location: /index.php');
exit;
}	


$kqlkpid = filter($_GET['comment']);


	
$post = $pdo->fetchOne("SELECT * FROM `notes_komm` WHERE `id` = ? and `id_notes` = ?", [$kqlkpid, $note['id']]);

if (!$post)
{
	header('Location: /index.php');
	exit;
}



$ank = $pdo->fetchOne("SELECT * FROM `user` WHERE `id` = ?",[$post['id_user']]);


if ($user['id'] == $author->id || $user['id'] == $ank['id'] || ($user['level']> 0 && $user['level']>=$ank['level']) || $user['level']>=5) {
	
$pdo->query("DELETE FROM `notes_komm` WHERE `id` = ? and `id_notes` = ?", [$post['id'], $note['id']]);	

header("Location: ?id=$note[id]");
exit;

} else {
header("Location: /index.php");
exit;	
}

}


/* */




if (isset($_POST['post']))
{
	
$text = my_esc($_POST['text']);

if (strlen2($text)>1024)$_SESSION['err'] = 'კომენტარი არ უნდა აღემატებოდეს 1024 სიმბოლოს';
if (strlen2($text)<1)$_SESSION['err'] = 'კომენტარი არ უნდა იყოს ცარიელი';


if (strlen2($_FILES['file1']['name'])>3 && !if_img_upls($_FILES['file1']['name'])) {
	$_SESSION['err'] = 'You cant just everything you want ... only images for this time ... so pick it up carefully';
}

/*
if ($author['id']!=$user['id']) {

	if ($notes['can_post'] == 1 && $friend == 0)$_SESSION['err'] = 'Only friends can post';
	if ($notes['can_post'] == 2)$_SESSION['err'] = 'No one is able to comment here';

}*/





if (isset($_SESSION['err'])){
	header("Location: ?id=$note[id]");
	exit;	
}





if (!isset($_SESSION['err'])){

parseUserNameMentioned($text, '/page/posts/?id='.$note['id'].'', 'mentioned_inPosts');

	
if (isset($reply) && $reply['id']!=$user['id']) {
		
	//mysql_query("INSERT INTO `notification` (`avtor`, `id_user`, `id_object`, `type`, `time`) VALUES ('$user[id]', '$reply[id]', '$note[id]', 'notes_komm', '$time')");	

}



if (strlen2($_FILES['file1']['name'])>3 && if_img_upls($_FILES['file1']['name'])) {


  
	
   $picture = $_FILES['file1']['tmp_name'];
   
   $qq2f2l2_zz_type = 'jpg';
   $cqwe_rndm = str_shuffle("1234567804512451_1231_4123_abvczxcqwqtytyiypu-_]]");
   $qwez_r122 = str_shuffle($time);


$flnmn = my_esc("".$time."".rand(0,9999999)."_".rand(0,9999999)."_pic.".$qq2f2l2_zz_type);



   $img = new Imagick($picture);
   //$img->cropThumbnailImage($img->getImageWidth(), $img->getImageHeight());
   $img->setImageFormat('jpeg');
   //$img->setImageCompressionQuality(90);
   $img->writeImage($_SERVER['DOCUMENT_ROOT'].'/page/notes/files/'.$flnmn);


   $img->clear(); 
   $img->destroy();  
  

} else {

	$flnmn = '';
  	
	
}



$pdo->query("INSERT INTO `notes_komm` (`id_user`, `time`, `msg`, `id_notes`,`pfile`,`post_type`) values(?, ?, ?, ?,?,?)", [$user['id'], $time, $text, $note['id'], $flnmn, 'post']);


header("Location: ?id=$note[id]");
exit;
}

}
















	if (isset($_GET['act']) && $_GET['act'] == "heart")
	{
		
		if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `notes_like` WHERE `id_user` = '".$user['id']."' AND `id_notes` = '".$note['id']."'") == 0)
		{
			$pdo->query("INSERT INTO `notes_like` (`id_notes`, `id_user`, `like`,`when`) VALUES (?, ?, ?, ?)", [$note['id'],$user['id'],'1', $time]);

		} else {
		
			$pdo->query("delete from `notes_like` where `id_user` = ? and `id_notes` = ?", [$user['id'],$note['id']]);
			
		}
		
			header("Location: ?id=$note[id]");
			exit;	
		
	}







include '../../inc/header.php';
title();
aut();


$akn213a = get_user($author->id);

if ($user['id']!=$author->id) {


if_blocked($akn213a);

if_blacklisted($akn213a);

if_closed($akn213a);





$friend = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends` WHERE `user` = '".$user['id']."' AND `who` = '".$akn213a['id']."'");


if ($note['can_see'] == 1 && $user['level']<=$akn213a['level'] && $friend == 0)
{
	
echo '<div class="mess">';
echo 'Only friends can see this page';
echo '</div>';

include '../../inc/footer.php';
exit;
}


if ($note['can_see'] == 2 && $user['level']<=$akn213a['level'])
{
	
echo '<div class="mess">';
echo 'No one can see this page';
echo '</div>';

include '../../inc/footer.php';
exit;
}





}







if (strlen2($note['image'])>0)
	$qlzd = '<img src="/page/notes/images/'.detect($note['image']).'.jpg" style="width: calc(100%);"/>';
else 
	$qlzd = '';

//`post_type` = 'post'
?>





<div class="u_Blog_Mian" style="margin-top:0;">
	
<div class="u_Blog"> 




<div> 
	
	
<div class="u_Blog_Be_Spc">


<div>


	
<div class="u_Blog_first">

<div><?=$author->photoRounded(48,48,50);?></div>

<div> 


		
<div class="pTxtWithoutOverflowing">
	   
	   
<div class="u_Blog_nick">

<?=$author->nick();?>

</div>
	  
	  
<div>
	<span class="date"><?php echo when($note['time']); ?> </span>
</div>	   
	   




</div>


</div>

</div>	
	



</div>



<div>


<span onclick="ShowThings(this, 'main')" class="Drpdnw material-symbols-outlined czg21gstr1123" data_id="<?=$note['id'];?>">more_horiz</span>


<div class="drpdmain" pstevents="<?=$note['id'];?>" style="display:none">
	
<div class="drpd">



<? if ($user['level']>0 && $user['level']>=$author->level  || $author->id==$user['id'] || $user['level']>=5) {  ?>

	<div>
	<img src="/pics/bgc.g.png" width="20"> 
		<a href="delete.php?note=<?=$note['id'];?>">Delete post</a>
	</div>
	
<div>
<img src="/pics/cnh.svg" width="20"> 
	<a href="edit.php?id=<?=$note['id'];?>">Edit post</a>
</div>	
	
<? } ?>





<div>

<img src="/pics/AWk.png" width="20"> 
<a href="report.php?id=<?=$note['id'];?>">Report post</a>


</div>





 


</div>	
	
	
</div>


</div>




</div>	
	
	


</div>	
		





<div>
	
	

<div class="u_Blog_distance" shw_nffl2="<?=$note['id'];?>"> 

<? if ($qlzd) { ?>

<div class="U_PST_MPR"><?=$qlzd;?> <br/><br/>	</div>
	
<? } ?>	
	

	
	
	<?=text($note['msg']);?> </div>

</div>



</div>	




<?

$liked = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `notes_like` WHERE `id_notes` = '".$note['id']."'");

$comments = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `notes_komm` WHERE `id_notes` = '".$note['id']."'");


if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `notes_like` WHERE `id_user` = '".$user['id']."' AND `id_notes` = '".$note['id']."'")==1) { 
$plnkhr = 'material-symbols-outlined2 red';
} else {
$plnkhr = 'material-symbols-outlined';
}




?>
	
	
	
	
<div  class="uu_Blgoq_PUse1">


<div>
	
<a href="liked.php?id=<?=$note['id'];?>">
	<img src="/pics/sections/bscr.svg" width="20" style="padding-right:2px;">   <?=$liked;?> 
</a>
	
</div>
	
	
<div> <?=$comments;?>  Comments  </div>


</div>	
	
	
	
	
	
	


<div>
	

<div class="u_blog_Sections">

<div> <a href="/page/posts/?id=<?=$note['id'];?>&act=heart"> <span class="<?=$plnkhr;?>">favorite</span> <?=$liked;?> </a> </div>
<div> <a href="/page/posts/?id=<?=$note['id'];?>"> <span class="material-symbols-outlined">chat</span> <?=$comments;?> </a> </div>

<div><span class="material-symbols-outlined">share</span> 0 </div>

</div>


</div>


	


</div>




<!-- comments -->






<div class='form'>
<form enctype="multipart/form-data" id="reply_id" method='post' action='?id=<?=filter($_GET['id']);?>'>

<input type="file" class="none" name="file1" id="imgInp" accept="image/*;capture=camera">

	<div class="c_d1">
		
		<div>
			<?=$author->photo3('48');?>
		</div>


		<div class="c_d2">
			
			<textarea onfocus="setFcs1Btn()" onblur="setUnFcs1Btn()" id="bb_textarea" name='text' minlength="1" required maxlength="1024" placeholder="text goes here"><?= (isset($insert) ? $insert : '');?></textarea>
			
			<div id="dispEmojiPicker"></div>

		</div>

	</div>

<div class="css1drwh4k"> </div>



<div class="CPosTFleXjust">
	
<div>

<img src="/pics/1jV.png" class="crzPDNGR" onclick="funRndrEmojis()" id="dsplEmojiChk">
<img src="/pics/1rn.png" onclick="SlPHt();" class="crzPDNGR">
<img src="/img/crs2.png" onclick="rMDfpHOT();" class="none pointer" id="flrmvd">

<? if (isset($_GET['response'])) { ?>
	<a href="?id=<?=$note['id'];?>">Cancel</a>
<? } ?>

</div>	
	

	
	



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



<div><input value="Send" class="c_v_zr2" type="submit" name="post" /></div>	


</div>



</form>

</div>







<div class="u_POST_IMGR_BF">
	<img src="" id="blah" class="U_Post_IMG_w">
</div>	



<!-- end of commenting -->









<?


$qq = new Pagination();

$k_post = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `notes_komm` WHERE `id_notes` = ? and `post_type` = 'post'", [$note['id']]);

$kzftch322 = $k_post;

$ttlq = $qq->calculation($kzftch322, $set['p_str']);


$query = $pdo->query("SELECT * FROM `notes_komm` WHERE `id_notes` = '".$note['id']."' and `post_type` = 'post' ORDER BY `id` DESC  LIMIT $ttlq, $set[p_str]");

?>

<div class="pCqmn2_22z">
<span class="badgei"><?php echo $k_post;?></span> Comments
</div>
	


<div class="czgosspig">

<?



while ($post = $query->fetch())
{

$ank = get_user($post['id_user']);

$posterank = new user($post['id_user']);

$kqrct = json_decode($post['reactions']);

 
$kq_zz = $kqrct->wow + $kqrct->sad + $kqrct->angry + $kqrct->frown + $kqrct->love;
 


$kzftch3222 = $pdo->fetchOne("SELECT * FROM `user_post_reaction` WHERE 
	`post_id` = '".$post['id']."' and 
	`where` = 'blogs' and 
	`user` = '".$user['id']."'
	");

if ($kzftch3222) {
	$tpRc1 = $kzftch3222['type'];
	$lstreacte = 1;
} else {
	$tpRc1 = '';
	$lstreacte = 0;
}



$qnewrct = new Reactions('blogs', $post['id'], '/page/notes/');


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



<div class="drpdmain" style="display:none;" pstevents="<?php echo $post['id'];?>">
	
	
<div class="drpd">


<? if ($user['id'] == $author->id || ($user['level']> 0 && $user['level']>=$posterank->level) || $user['id'] == $posterank->id || $user['level']>=5){ ?>
	
	<div><span class="material-symbols-outlined">delete</span> <a href="?id=<?=$note['id'];?>&comment=<?=$post['id'];?>">Delete</a></div>

	<div><span class="material-symbols-outlined">edit_note</span> <a href="post_edit.php?note=<?=$note['id'];?>&pid=<?=$post['id'];?>">Edit</a></div>


<? } ?>


<div><span class="material-symbols-outlined">flag</span> <a href="report.php?id=<?=$note['id'];?>&pid=<?=$post['id'];?>">Report</a></div>


</div>


</div>


</div>

</div>	
	
	
	



</div>

<div>

<div class="textChat2">
	<?=output_text($post['msg']); ?>
</div>


	
<?=$qnewrct->addReactions("/page/posts/reacts.php?post=$post[id]", $kqrct, $kq_zz);?>


</div>	

</div>	


<div>
	
	
<? if (strlen2($post['pfile'])>1) { ?>
	
	<div class='Live_Chat7'></div>
	
	<a href='/page/notes/files/<?=detect($post['pfile']);?>'> <img class='Live_Chat8' src='/page/notes/files/<?=detect($post['pfile']);?>'>  </a> 
	
<? } ?>



	
<?=$qnewrct->ShowReactionButton("?id=$note[id]&response=$posterank->id", $post['time']);?>


</div>


	


</div>





</div>

</div>




</div>








<? } ?>

</div>


















<? 


if ($k_post == 0)
{
echo "<div class='SometimesDiplay'>";
echo 'Empty';
echo "</div>";
}




$qq->setPage("/page/posts/?", "id=$note[id]");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();





?>

	
	


	  

<?

include '../../inc/footer.php';
?>
