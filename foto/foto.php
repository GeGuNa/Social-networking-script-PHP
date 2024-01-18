<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';


if (!isset($_GET['id'])) {
header("Location: /?"); 
exit;	
}	
	


if (!is_numeric($_GET['id'])) {
header("Location: /?"); 
exit;	
}	
	
$kqqWWpHTTid = filter($_GET['id']);	
	

if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `gallery_foto` WHERE `id` = ?",[$kqqWWpHTTid]) == 0)
{
header("Location: /index.php");
exit;
}




$foto = $pdo->fetchOne("SELECT * FROM `gallery_foto` WHERE `id` = ?",[$kqqWWpHTTid]);

$gallery = $pdo->fetchOne("SELECT * FROM `user` WHERE `id` = ?", [$foto['id_user']]);

$ank = $pdo->fetchOne("SELECT * FROM `user` WHERE `id` = ?", [$foto['id_user']]);

$user_like = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `photo_like` WHERE `user` = ? AND `foto` = ?", [$user['id'],$foto['id']]);





include '../inc/header.php';
title();
aut();





/*-------------------close / ignor / off / block------------------*/





$friend = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends` WHERE `user` = ? AND `who` = ?",[$user['id'],$ank['id']]);




if ($user['id']!=$ank['id']) {


/*-------------------close / ignor / off / block------------------*/


if_blocked($ank);

if_blacklisted($ank);

if_closed($ank);



/*-------------------end------------------*/



if ($user['level']<=$ank['level'] && $foto['photo_seeing']==1 && $friend == 0)
{
	
echo '<div class="mess">';
echo 'Only friends can see this page!';
echo '</div>';

include '../inc/footer.php';
exit;
}

if ($user['level']<=$ank['level'] && $foto['photo_seeing']==2)
{
	
echo '<div class="mess">';
echo 'No one can see this page';
echo '</div>';

include '../inc/footer.php';
exit;
}

}


/*-------------------end------------------*/

//set=as_photo
//set=as_cover
//act=remove_cover

if ($user['id'] == $ank['id']) {


if (isset($_GET['set']) && $_GET['set']=='as_photo') {

	$pdo->exec("UPDATE `gallery_foto` SET `avatar` = '0' WHERE `id_user` = '".$user['id']."'");
	$pdo->exec("UPDATE `gallery_foto` SET `avatar` = '1' WHERE `id` = '".$foto['id']."'");


	header("Location: /foto/foto.php?id=".$foto['id']."");
	exit;

}


if (isset($_GET['set']) && $_GET['set']=='as_cover') {

	$pdo->exec("UPDATE `user` SET `cover_id` = '".$foto['id']."' WHERE `id` = '".$user['id']."'");
	header("Location: /foto/foto.php?id=".$foto['id']."");
	exit;

}


if (isset($_GET['act']) && $_GET['act']=='remove_photo') {

	$pdo->exec("UPDATE `gallery_foto` SET `avatar` = '0' WHERE `id_user` = '".$user['id']."' and `avatar` = '1'");

	header("Location: /foto/foto.php?id=".$foto['id']."");
	exit;

}


if (isset($_GET['act']) && $_GET['act']=='remove_cover') {

	$pdo->exec("UPDATE `user` SET `cover_id` = '0' WHERE `id` = '".$user['id']."'");
	header("Location: /foto/foto.php?id=".$foto['id']."");
	exit;

}


}




if (($user['level']>=5 || $user['id']==$ank['id']) && isset($_GET['act']) && $_GET['act'] == 'delete')
{
	
	
if ($user['id']!=$ank['id']) {
	admin_log('Fotoalbomi','foto'," washala foto '[url=/info.php?id=$ank[id]]$ank[nick][/url]'");
}


unlink(H."images/gallery/48/".$foto['photo_addr'].".jpg");
unlink(H."images/gallery/128/".$foto['photo_addr'].".jpg");
unlink(H."images/gallery/640/".$foto['photo_addr'].".jpg");
unlink(H."images/gallery/foto/".$foto['photo_addr'].".jpg");	

$pdo->exec("DELETE FROM `gallery_foto` WHERE `id` = '".$foto['id']."'");
$pdo->exec("DELETE FROM `gallery_komm` WHERE `id_foto` = '".$foto['id']."'");
$pdo->exec("DELETE FROM `photo_like` WHERE `foto` = '".$foto['id']."'");

$pdo->query("DELETE FROM `user_activity` WHERE `type` = ? AND `object_id` = ?", ['photo_comm', $foto['id']]);
$pdo->query("DELETE FROM `user_activity` WHERE `type` = ? AND `object_id` = ?", ['replied_on_photo', $foto['id']]);	
$pdo->query("DELETE FROM `user_activity` WHERE `type` = ? AND `object_id` = ?", ['replied_ony_photo', $foto['id']]);
$pdo->query("DELETE FROM `user_activity` WHERE `type` = ? AND `object_id` = ?", ['photo_like', $foto['id']]);


redirection('წარმატებით წაიშალა', 'my.php?id='.$user['id']);
}








///////////////////






if (isset($_GET['act']) && $_GET['act'] == 'heart') {
		
if ($user_like>0) {

$pdo->exec("UPDATE `gallery_foto` SET `like` = '".($foto['like']-1)."' WHERE `id` = '".$foto['id']."'");

$pdo->exec("DELETE FROM `photo_like` WHERE `user` = '".$user['id']."' and `foto` = '".$foto['id']."'");
	
header("Location: foto.php?id=".$foto['id']."");
exit;

} else {

$pdo->exec("UPDATE `gallery_foto` SET `like` = '".intval($foto['like']+1)."' WHERE `id` = '".$foto['id']."'");

$pdo->query("INSERT INTO `photo_like` (`user`, `foto`, `type`, `when`) values(?, ?, ?, ?)", [$user['id'], $foto['id'], 'photo_like', $time]);	


//user_activity($user, $author, $when, $where, $type, $obj, string $text = "")

user_activity($ank['id'], $user['id'], $time, "/foto/foto.php?id=$foto[id]", 'photo_like', $foto['id']);


//user_activity($reply['id'], $time, "/foto/foto.php?id=$foto[id]", "photo_comm", $foto['id']);


//mysql_query("INSERT INTO `notification` (`avtor`, `id_user`, `id_object`,  `type`, `time`) VALUES ('".$user['id']."', '".$ank['id']."','".$foto['id']."', 'photo_like', '".$time."')");	



header("Location: foto.php?id=".$foto['id']."");
exit;

}

}







////////////////



if (isset($_POST['add'])) {
	
	
$qmsg2 = my_esc($_POST['text']);	
	

if(strlen2($qmsg2)<1)redirection('გზავნილი უნდა შეიცავდეს მინიმუმ 1 სიმბოლოს', '?id='.$foto['id']);

if(strlen2($qmsg2)>1024)redirection('გზავნილი არ უნდა აღემატებოდეს 1024 სიმბოლოს', '?id='.$foto['id']);



if ($user['id']!=$ank['id']) {

if ($foto['photo_comment']==1 && $friend == 0)redirection('კომენტარის დამატების უფლება აქვთ მხოლოდ მეგობრებს', '?id='.$foto['id']);

if ($foto['photo_comment']==2)redirection('კომენტარის დამატების უფლება არ გაქვთ', '?id='.$foto['id']);

}


if (isset($reply) || !isset($reply)) {
	
	
if (isset($reply)) {
	

if ($reply['id'] == $ank['id']) {
	
if ($ank['id'] != $user['id']) {
	
	user_activity($ank['id'], $user['id'], $time, "/foto/foto.php?id=$foto[id]", 'replied_ony_photo', $foto['id']);

}


} else if ($reply['id'] != $user['id']) {
	
	user_activity($reply['id'], $user['id'], $time, "/foto/foto.php?id=$foto[id]", 'replied_on_photo', $foto['id']);

if ($ank['id'] != $user['id']) {	
	user_activity($ank['id'], $user['id'], $time, "/foto/foto.php?id=$foto[id]", 'replied_ony_photo', $foto['id']);
}	
	
	
} else {
	
	user_activity($ank['id'], $user['id'], $time, "/foto/foto.php?id=$foto[id]", 'replied_ony_photo', $foto['id']);
	
}



} else {
	
if ($user['id'] != $ank['id']) {
	
	user_activity($ank['id'], $user['id'], $time, "/foto/foto.php?id=$foto[id]", 'photo_comm', $foto['id']);
}



}
				
	
}



if(!isset($err))
{
	
	parseUserNameMentioned($qmsg2, '/foto/foto.php?id='.$foto['id'].'', 'mentioned_inPhoto');

if (strlen2($_FILES['file1']['name'])>3 && if_img_upls($_FILES['file1']['name'])) {


  
	
   $picture = $_FILES['file1']['tmp_name'];
   
   $qq2f2l2_zz_type = 'jpg';
   $cqwe_rndm = str_shuffle("1234567804512451_1231_4123_abvczxcqwqtytyiypu-_]]");
   $qwez_r122 = str_shuffle($time);
   $flnmn = my_esc("".$time."".rand(0,9999999)."_".rand(0,9999999)."_pic.".$qq2f2l2_zz_type);



   $img = new Imagick($picture);
   //$img->cropThumbnailImage($img->getImageWidth(), $img->getImageHeight());
   $img->setImageFormat('jpeg');
  // $img->setImageCompressionQuality(100);
   $img->writeImage('./pics/'.$flnmn);


   $img->clear(); 
   $img->destroy();  
  

} else {

$flnmn = '';
  	
	
}	
	
	
if ($user['id']!=$gallery['id'])
{
//user_activity($reply['id'], $time, "/foto/foto.php?id=$foto[id]", "photo_comm", $foto['id']);
}

if (isset($reply) && $reply['id']!=$user['id'])
{
	//user_activity($reply['id'], $time, "/foto/foto.php?id=$foto[id]", "photo_comm", $foto['id']);
}


$pdo->query("INSERT INTO `gallery_komm` (`id_foto`, `id_user`, `time`, `msg`,`typef`) values(?, ?, ?, ?, ?)",[$foto['id'], $user['id'], $time, $qmsg2, $flnmn]);


redirection('?id='.$foto['id']);
}
}

if (isset($err))
{	
echo "<div class='err'>";
echo "$err";
echo "</div>";
}



if (isset($_GET['del']))
{
	
	if (!is_numeric($_GET['del'])) {
		header("Location: /?"); 
		exit;	
	}	
	$ppdlw1 = filter($_GET['del']);
	
	
/*	
	
	
$foto=mysql_fetch_assoc(mysql_query("SELECT * FROM `gallery_foto` WHERE `id` = '".nums($_GET['id'])."'"));

$gallery=mysql_fetch_assoc(mysql_query("SELECT * FROM `user` WHERE `id` = '".($foto['id_user'])."' LIMIT 1"));

$ank = mysql_fetch_assoc(mysql_query("SELECT * FROM `user` WHERE `id` = '".($foto['id_user'])."'"));

	id_foto
	id_user

*/	

	
$post = $pdo->fetchOne("SELECT * FROM `gallery_komm` WHERE `id` = ? and `id_foto` = ?", [$ppdlw1, $foto['id']]);

$ankaaaa = $pdo->fetchOne("SELECT * FROM `user` WHERE `id` = ?", [$post['id_user']]);


if (!$post) { 
	
header("Location: /foto/foto.php?id=".$foto['id']."");
exit;

} else if ($ankaaaa['level']<$user['level']  || $user['id']==$ank['id'] || $user['level']>=4) {
	
if ($user['id']!=$ankaaaa['id']) {
	admin_log('Fotoalbomi','foto comment'," წაუშალა კომენტარი $ankaaaa[nick] -ს ");
}	
	
$pdo->exec("DELETE FROM `gallery_komm` WHERE `id` = '".$post['id']."'");

header("Location: /foto/foto.php?id=".$foto['id']."");
exit;

} else {
	
header("Location: /foto/foto.php?id=".$foto['id']."");
exit;

}


}

$phank = new user($ank['id']);


$photols = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `photo_like` WHERE `foto` = '".$foto['id']."'");



?>


<div class="pcenter">

<div>
	<a  href='/images/gallery/640/<?=$foto['photo_addr'];?>.jpg'>
		<img class="lp_Photo_2" src='/images/gallery/640/<?=$foto['photo_addr'];?>.jpg'>
	</a>
</div>

</div>

<?

$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `gallery_komm` WHERE `id_foto` = '".intval($foto['id'])."'");

$qq = new Pagination();


$ttlq = $qq->calculation($kzftch322, $set['p_str']);





?>




<!-- -->


<div class="nav2">
	
	
	
<div class="psectoFCntr">


<div>



<div class="pScTNCkWith">

<div> <?=$phank->photo3(48);?> </div>

<div> 

<div> <? echo $phank->nick();   ?>  </div>	
<div><span><?echo wudate($foto['time']);?></span></div>

</div>


</div>






</div>



<div>



<span onclick="ShowThings(this)" class="Drpdnw material-symbols-outlined czg21gstr1123" data_id="<?php echo $foto['id'];?>">more_horiz</span>


<div class="drpdmain" pstevents="<?php echo $foto['id'];?>" style="display:none;">
	
	

<div class="drpd <?=($user['id'] == $ank['id'] ? "mXwd200" : "");?>">
	
<? if ($user['id'] == $ank['id']) { ?>
<div><a href="foto_edit.php?id=<?=$foto['id'];?>">  Edit photo</a></div>
<? } ?>	
	
<? if ($user['level']>=5 || $user['id']==$ank['id']) { ?>
<div><a href="?id=<?=$foto['id'];?>&act=delete">  Delete</a></div>
<? } ?>

<div><a href="/images/gallery/foto/<?=$foto['id'];?>.jpg"> Download </a></div>

<? if ($user['id']==$ank['id']) { ?>
	
	<? 
	if ($foto['avatar'] == 1) { 
			$cvr21333z = "act=remove_photo";
			$cvr21233z2z = "Remove the profile photo";
	} else {
			$cvr21333z = "set=as_photo";
			$cvr21233z2z = "Make profile picture";
	}
	?>


	
	<div><a href="?id=<?=$foto['id'];?>&<?=$cvr21333z;?>"> <?=$cvr21233z2z;?> </a></div>
	
	<? 
	if ($user['cover_id'] == $foto['id']) { 
			$cvr21 = "act=remove_cover";
			$cvr212 = "Remove the cover";
	} else {
			$cvr21 = "set=as_cover";
			$cvr212 = "Make cover photo";
	}
	?>
		
		
	<div><a href="?id=<?=$foto['id'];?>&<?=$cvr21;?>"> <?=$cvr212;?> </a></div>
	
<? } ?>


</div>


</div>

</div>

</div>	
	
	
	
<? if ($foto['description']!=NULL) { ?>
<span class="ptext"> <?=detect($foto['description']);?></span>
<? } ?>


</div>




<?if ($kzftch322>0 || $photols>0) { ?>

<div class="nav2">


<div class="psectoFCntr">


<div>

<?if ($photols>0) { ?>
	
	<img src="/pics/sections/bscr.svg" width="20">  <a href="flikes.php?id=<?=$foto['id'];?>"> <?=$photols;?> </a>
	
<? } ?>


</div>

<div>

<?if ($kzftch322>0) { ?>
	
  <?=$kzftch322;?>  Comments
	
<? } ?>


</div>


</div>



</div>



<? } ?>




<div class="cZSecTionSD">

<div>
	
<a href="?id=<?=$foto['id'];?>&act=heart">	

<? if ($user_like>0) { ?>
	
<span class="material-symbols-outlined2 red">favorite</span>

<? } else { ?>
	
<span class="material-symbols-outlined">favorite</span>

<? } ?>
	
	
 Like </a>
 
 </div>








<div><span class="material-symbols-outlined">chat</span> Comments</div>









</div>






<?







if ($user['id']!=$ank['id'] && $foto['photo_comment']==1 && $friend == 0) {
	
	echo '<div class="mess"> Only friends can post</div>';
	
} else if ($user['id']!=$ank['id'] && $foto['photo_comment']==2) {
	
	echo '<div class="mess"> No one is able to comment here</div>';
	
} else {

?>
	




<div class="form">
	
<form action="/foto/foto.php?id=<?=$foto['id'].$go_link;?>" method="post" enctype="multipart/form-data">

<input type="file" style="display:none;" name="file1" id="imgInp" accept="image/*;capture=camera">
	
<div class="CPosTFleXjust3">

<div class="flex5">
	<?=$usojbid->photo3('48');?>
</div>


<div class="flex95">
	
<textarea onfocus="setFcs1Btn()" onblur="setUnFcs1Btn()" id="bb_textarea" name="text" required minlength="1" maxlength="1024" placeholder="text goes here"><?= (isset($insert) ? $insert : '');?></textarea>

<div id="dispEmojiPicker"></div>


</div>

</div>



<div class="css1drwh4k"> </div>

	<div class="PstSecTionForThngsAligned">

		<div>
			
			<img src="/pics/1jV.png" onclick="funRndrEmojis()" id="dsplEmojiChk" class="crzPDNGR_Sect">

			<img src="/pics/1rn.png" onclick="SlPHt();" class="crzPDNGR_Sect">

			<img src="/img/crs2.png"  onclick="rMDfpHOT();" class="none pointer" id="flrmvd">

		</div>


		<div>
			
			<input value="Send" class="c_v_zr2" name="add" type="submit">
		</div>

	</div>

</form>	

</div>


<div id='smiles_frame'></div>





<div class="textAddImages">
	<img src="" id="blah" class="textAddImages2">
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



<?
}
?>








<?


$fquery = $pdo->query("SELECT * FROM `gallery_komm` WHERE `id_foto` = '".$foto['id']."' ORDER BY `id` DESC LIMIT $ttlq, $set[p_str]");

?>


<?if ($kzftch322>0) { ?>


<div class="pCqmn2_22z">
<span class="badgei"><?=$kzftch322;?></span> Comments
</div>


<div class="czgosspig">


<?


while ($post = $fquery->fetch())
{
	
$poster = new user($post['id_user']);	



$kqrct = json_decode($post['reactions']);

 
$kq_zz = $kqrct->wow + $kqrct->sad + $kqrct->angry + $kqrct->frown + $kqrct->love;
 


$kzftch3222 = $pdo->fetchOne("SELECT * FROM `user_post_reaction` WHERE 
	`post_id` = '".$post['id']."' and 
	`where` = 'foto' and 
	`user` = '".$user['id']."'
	");

if ($kzftch3222) {
	$tpRc1 = $kzftch3222['type'];
	$lstreacte = 1;
} else {
	$tpRc1 = '';
	$lstreacte = 0;
}



$qnewrct = new Reactions('foto', $post['id'], '/page/notes/');


$qnewrct->st_reactSts = $lstreacte;
$qnewrct->lastbtn = $tpRc1;




?>


<div class="pc21zggp2">


<div class="Live_Chat1">

	<div>
		<?=$poster->photo3(48);?>	
	</div>
	
<div class="Live_Chat2">
	
<div>
	
<div class="rsr21">
	

		<!-- starting point of first  -->
		
	<div>
	
	
	

<div class="pcr1_chtr12">

	<div><?=$poster->nick();?></div>	



	<div>
	
	
<!-- -->
		<span class="mphpq_z1">


		<span onclick="ShowThings(this)" class="Drpdnw material-symbols-outlined czg21gstr1123" data_id="<?php echo $post['id'];?>">more_horiz</span>

		<!-- -->
		<div class="drpdmain" pstevents="<?php echo $post['id'];?>" style="display:none;">


		<div class="drpd">
			
			
		<? if ($poster->level<$user['level']  || $user['level']>=4 || $user['id']==$ank['id']){?>
			
		<div>
			<a href="?id=<?=$foto['id'];?>&del=<?=$post['id'];?>">
				<span class="material-symbols-outlined">delete</span> Delete
			</a>
		</div>

		<? } ?>


		<div>
			<a href="/foto/spam.php?photo_id=<?=$foto['id'];?>&amp;post_id=<?=$post['id'];?>">
				<span class="material-symbols-outlined">flag</span> Report
			</a>
		</div>



		</div>


		</div>
	

		</span>

	<!-- -->
	
	
	
	
	</div>
		




	




			</div>	
		
		
		</div>	
		<!-- end of first -->
		
		
	<div>
	
			 	<div class="textChat2"> 
					<?=output_text($post['msg']);?> 
				</div>	
<?=$qnewrct->addReactions("/foto/reacts.php?post=$post[id]", $kqrct, $kq_zz);?>
	
	</div>	
		

 	





</div>	

 	
		   <div>
			 <?=$qnewrct->ShowReactionButton("?id=$foto[id]&response=$poster->id", $post['time']);?>   

		   </div>  	
 	
 

</div>
	
	


</div>	



</div>


<?  if (strlen2($post['typef'])>2) {  ?>
	
	<div class="iimgrfhop1"></div>
	
	<div class="upfgq_ff1mr">
		 <a href='/foto/pics/<?=detect($post['typef']);?>'> 
			<img class='mx_phomfq_70' src='/foto/pics/<?=detect($post['typef']);?>'>  
		 </a> 
	 </div>

 <? } ?> 












</div>





<?

}
?>

</div>

<? } ?>

<?

$qq->setPage("/foto/foto.php?", "id=$foto[id]");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();




include '../inc/footer.php';

?>









