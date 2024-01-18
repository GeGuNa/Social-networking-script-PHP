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

$kqp123idd1 = filter($_GET['id']);
	

$chatrm=$pdo->fetchOne("SELECT * FROM `chat_cats` WHERE `id` = ?", [$kqp123idd1]);


if (!$chatrm) {
header("Location: /?"); 
exit;	
}	




if (isset($_GET['response']) && isset($_GET['postid'])) {

if (!is_numeric($_GET['response']) || !is_numeric($_GET['postid'])) {
	header("Location: /");
	exit;
}



$respid = filter($_GET['response']);
$respps = filter($_GET['postid']);



if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `chat_posts` where `chat_id` = ? and `post_user` = ? and 
`id` = ?",[$chatrm['id'], $respid, $respps]) == 0) {
	
	header("Location: /");
	exit;
		
}




if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` WHERE `id` = ?", [$respid]) == 0) {
	header("Location: /");
	exit;	
}


$respuser = get_user($respid);

$respuserin = $pdo->fetchOne("SELECT * FROM `chat_posts` WHERE `id` = ?", [$respps]);

}



if (isset($_GET['response']) && isset($_GET['postid'])) { 
$pstresp = $respuser['nick'].', ';
$postlnk = '?id='.$chatrm['id'].'&response='.$respuser['id'].'&postid='.$respuserin['id'];
} else {
$pstresp = null;
$postlnk = '?id='.$chatrm['id'];
}















if (isset($_POST['cfms']))
{
	
$gttms2z = nums($_SERVER['REQUEST_TIME']); 


if (strlen2($_POST['message'])<1)$_SESSION['err']='შეტყობინება არ უნდა იყოს ცარიელი';
if (strlen2($_POST['message'])>1024)$_SESSION['err']='შეტყობინება არ უნდა აღემატებოდეს 1024 სიმბოლოს';



if (strlen2($_FILES['file1']['name'])>3 && !if_img_upls($_FILES['file1']['name'])) {
	$_SESSION['err'] = 'You cant just everything you want ... only images for this time ... so pick it up carefully';
}





if (isset($_SESSION['err'])){
header("Location: ?id=$chatrm[id]");
exit;	
}





if (!isset($_SESSION['err'])){


parseUserNameMentioned($ptstext, '/chat/room.php?id='.$chatrm['id'].'', 'mentioned_inchat');



if (strlen2($_FILES['file1']['name'])>3 && if_img_upls($_FILES['file1']['name'])) {

	
   $picture = $_FILES['file1']['tmp_name'];
   
   $qq2f2l2_zz_type = 'jpg';
   $cqwe_rndm = str_shuffle("1234567804512451_1231_4123_abvczxcqwqtytyiypu-_]]");
	$qwez_r122 = str_shuffle($time);
  // $flnmn = my_esc("".$time."".$qwez_r122."".$cqwe_rndm."".rand(0,9999999)."_".rand(0,9999999)."_pic.".$qq2f2l2_zz_type);

$flnmn = my_esc("".$time."".rand(0,9999999)."_".rand(0,9999999)."_pic.".$qq2f2l2_zz_type);



   $img = new Imagick($picture);
  // $img->cropThumbnailImage($img->getImageWidth(), $img->getImageHeight());
   $img->setImageFormat('jpeg');
 //  $img->setImageCompressionQuality(90);
   $img->writeImage('files/'.$flnmn);


   $img->clear(); 
   $img->destroy();  
  

} else {

$flnmn = '';
  	
	
}










$ptstext = my_esc($_POST['message']);	




if (isset($_POST['to_user_id']) && isset($_POST['msg_id']) && isset($_POST['private'])) {
	

if (!in_array($_POST['private'], array('0','1'))){
header("Location: ?id='".$chatrm['id']."'");
exit;	
}

if (!is_numeric($_POST['to_user_id']) || !is_numeric($_POST['msg_id'])) {
header("Location: ?id='".$chatrm['id']."'");
exit;
}	

$tous = filter($_POST['to_user_id']);
$msgi = filter($_POST['msg_id']);
$prvt = filter($_POST['private']);	


$respuser = get_user($tous);

$respuserin = $pdo->fetchOne("SELECT * FROM `chat_posts` where `chat_id` = ? and `post_user` = ? and `id` = ?", [$chatrm['id'], $tous, $msgi]);


if (!$respuser || !$respuserin) {
	header("Location: /");
	exit;	
}

$usrn = $respuser;
$chtps = $respuserin;


if ($prvt == 1) {		

	$pdo->query("INSERT INTO `chat_posts` (`post_user`, `text`, `post_time`, `chat_id`, `post_reply`, `post_privacy`, `pfile`) values(?, ?, ?, ?, ?, ?, ?)",[$user['id'], $ptstext, $gttms2z, $chatrm['id'], $usrn['id'], '1', $flnmn]);

} else {
	
	$pdo->query("INSERT INTO `chat_posts` (`post_user`, `text`, `post_time`, `chat_id`, `post_reply`, `post_privacy`, `pfile`) values(?, ?, ?, ?, ?, ?, ?)",[$user['id'], $ptstext, $gttms2z, $chatrm['id'], $usrn['id'], '0', $flnmn]);
	
}

	$pdo->query("INSERT INTO `chat_hist` (`user_id`, `anke_id`, `post_time`, `chat_id`,`text`) values(?, ?, ?, ?, ?)",[$usrn['id'], $user['id'], $gttms2z, $chatrm['id'], $ptstext]);
	
	
} else {
	
	$pdo->query("INSERT INTO `chat_posts` (`post_user`, `text`, `post_time`, `chat_id`, `pfile`) values(?, ?, ?, ?, ?)",[$user['id'], $ptstext, $gttms2z, $chatrm['id'], $flnmn]);
	
}

	header("Location: ?id=".$chatrm['id']);
	exit;	

}

}



include '../inc/header.php';
title();
aut();



$qq = new Pagination();






if (isset($err))
{	
echo "<div class='err'>";
echo "$err";
echo "</div>";
}



if (isset($_GET['del']))
{
	
	
if (!is_numeric($_GET['del'])) {
header("Location: /index.php");
exit;
}	

$ppdle = filter($_GET['del']);	
	
$post = $pdo->fetchOne("SELECT * FROM `chat_posts` WHERE `id` = ? and `chat_id` = ?",[$ppdle, $chatrm['id']]);


$ank = get_user($post['post_user']);


if (!$post)
{ 
header("Location: ?id=$chatrm[id]");  
exit;
}
else if ($user['level'] > 0 && $user['level']>=$ank['level'] || $user['level'] == 6)
{
	
//$ank2->level<$user['level']  || $user['level']>4 || $user['id'] == $ank2->level && $user['level']>0	
	
$_SESSION['message']='წარმატებით წაიშალა'; 
admin_log('ჩატი','წაშლა',"წაუშალა პოსტი $ank[nick]-ს");


$pdo->exec("DELETE FROM `chat_posts` WHERE `id` = '".$post['id']."'");

header("Location: ?id=$chatrm[id]"); 
exit;
}
else
{
header("Location: ?id=$chatrm[id]"); 
exit;
}


}


if (isset($_GET['act']) && $_GET['act']=='clean')
{


if ($user['level']>=4)
{
	
$_SESSION['message']='წარმატებით დასუფთავდა'; 
admin_log('ჩატი','დასუფთავება',"დაასუფთავა ჩატი > $chatrm[name] ");


$pdo->exec("DELETE FROM `chat_posts` WHERE `chat_id` = '".$chatrm['id']."'");

header("Location: ?id=$chatrm[id]"); 
exit;
}
else
{
header("Location: ?id=$chatrm[id]"); 
exit;
}


}








$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `chat_posts` WHERE `chat_id` = ?", [$chatrm['id']]);


$ttlq = $qq->calculation($kzftch322, $set['p_str']);





?>






<div class="header">
	
<div><?=detect($chatrm['name']);?></div>


<div>

<a href="/chat/"> <svg stroke="#fff" fill="#fff" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path></svg> </a>

</div>

</div>







<div class="pSUDQWZz">


<form action="<?php echo $postlnk; ?>" method="post" enctype="multipart/form-data">

<? if (isset($_GET['response']) && isset($_GET['postid'])) { ?>
	
<input type="hidden" name="to_user_id" value="<?=escaped($_GET['response']);?>">

<input type="hidden" name="msg_id" value="<?=escaped($_GET['postid']);?>">

<input type="hidden" name="private" value="0">	
	
	
<? } ?>

 <input type="file" class="none" name="file1" id="imgInp" accept="image/*;capture=camera">



<div class="c_d1">
	
<div>
	<?=$usojbid->photo50(48,40,40);?>
</div>	
	
<div class="c_d2">

<textarea onfocus="setFcs1Btn()" onblur="setUnFcs1Btn()" name="message" id="bb_textarea" class="csttxt2_3z" maxlength="1024" placeholder="What's on your mind?"><?php echo $pstresp;?></textarea>


<div id="dispEmojiPicker" class="kZm213Mo"></div>


</div>	










</div>


<div class="CPosTFleXjust">
	

	


<div>

<div class="skscht_1">
	
	<img src="/pics/1jV.png" class="crzPDNGR" onclick="funRndrEmojis()" id="dsplEmojiChk">
	<img src="/pics/1rn.png" onclick="SlPHt();" class="crzPDNGR">
	<img src="/img/crs2.png" onclick="rMDfpHOT();" style="display:none;cursor: pointer;" id="flrmvd">
		
</div>


</div>	


<div>





<button name="cfms" class="cc_btn2">
	
	<span class="ccl21_z2">
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
			<path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
		</svg>
	</span>
	
</button>


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




</div>



</form>





</div>




<div class="skscht_2">
	<img src="" id="blah" class="skscht_3">
</div>

<?



$query = $pdo->query("SELECT * FROM `chat_posts` WHERE `chat_id` = ? ORDER BY `id` DESC LIMIT $ttlq, $set[p_str]", [$chatrm['id']]);



?>



<div class="chat_zq_3">
<?

while ($post = $query->fetch()) {

$ank2 = new user($post['post_user']);

$kqrct = json_decode($post['reactions']);


$kq_zz = $kqrct->wow + $kqrct->sad + $kqrct->angry + $kqrct->frown + $kqrct->love;
 


$kzftch3222 = $pdo->fetchOne("SELECT * FROM `user_post_reaction` WHERE `post_id` = ? and `where` = 'chat' and `user` = ?",[$post['id'],$user['id']]);
	
	

if ($kzftch3222) {
	$tpRc1 = $kzftch3222['type'];
	$lstreacte = 1;
} else {
	$tpRc1 = '';
	$lstreacte = 0;
}


?>


<div class="chat_zq_1">
	

		<div>
			<? echo $ank2->photo3(48); ?>
		</div>





		
<div class="chat_zq_4"> 

			<div class="chat_zq_2"> 
							
<div> 
	
	<?echo $ank2->nick(); ?>  
	

								
	
	
	</div>
								
								
								 
								<div>	
									<span class="textChat"> <? echo output_text($post['text']); ?> </span>  
								</div>
								
				<div class="relative pointer" onclick="window.location='/chat/reacts.php?post=<?=$post['id'];?>'">
				
							<div st_reactSts="<?=$lstreacte;?>" lastbtn="<?=$tpRc1;?>"     id="React_Main" post="<?=$post['id'];?>" class="  <?=($kq_zz == 0 ? " dddl1241_1 " : "");?>   flreacRendshow1">
								
							<span react_Type="wow" val="<?=$kqrct->wow;?>" post="<?=$post['id'];?>" <?=($kqrct->wow == 0 ? "class='none'" : "");?>>😂</span>
								
							<span react_Type="sad" val="<?=$kqrct->sad;?>" post="<?=$post['id'];?>" <?=($kqrct->sad == 0 ? "class='none'" : "");?>>😢</span>
								
							<span react_Type="frown" val="<?=$kqrct->frown;?>" post="<?=$post['id'];?>" <?=($kqrct->frown == 0 ? "class='none'" : "");?>>🙄</span>
							
							<span react_Type="angry" val="<?=$kqrct->angry;?>" post="<?=$post['id'];?>" <?=($kqrct->angry == 0 ? "class='none'" : "");?>>😡</span>
							
							<span react_Type="love" val="<?=$kqrct->love;?>" post="<?=$post['id'];?>" <?=($kqrct->love == 0 ? "class='none'" : "");?>>😍 </span>
							
							
			<span class="rpqwe_22_zlnt pointer"  post_react="<?=$post['id'];?>"><?=$kq_zz;?></span>
								
							
							</div>
								
				</div>
							

						</div>



<? if (strlen2($post['pfile'])>2) { ?>
	
	<div class="skscht_6"></div>
	
		<a href='/chat/files/<?=detect($post['pfile']);?>'> 
			<img class='Live_Chat8' src='/chat/files/<?=detect($post['pfile']);?>'>  
		</a> 
	 
<? } ?>	


<div>

	<div class="chat_zq_5"> 
		
		<div>
			
			
	<div class="relative none rel22rctq1312" reaction="<?=$post['id'];?>" id="">
					
	<div class="Up_Reaction_Main">


		
		
	<div class="Up_Reaction_Main_d1 pointer Up_Reaction_Main_d1_sacling">
		
		<div class="relative">
			<div class="cs1_zwow" onclick="Reacts(<?=$post['id'];?>, 'wow', this)" type="chat"> 😂</div>
		</div>
		
	</div>	
		

		
	<div class="Up_Reaction_Main_d1 pointer Up_Reaction_Main_d1_sacling">
	
		<div class="relative">
			<div class="cs1_zcry" onclick="Reacts(<?=$post['id'];?>, 'sad', this)" type="chat"> 😢</div>
		</div>
	
	</div>	
	
	
	<div class="Up_Reaction_Main_d1 pointer Up_Reaction_Main_d1_sacling">
	
		<div class="relative">
			<div class="cs1_zFrown" onclick="Reacts(<?=$post['id'];?>, 'frown', this)" type="chat"> 🙄</div>
		</div>
	
	</div>	
	
	
	<div class="Up_Reaction_Main_d1 pointer Up_Reaction_Main_d1_sacling">
	
		<div class="relative">
			<div class="cs1_zAngry" onclick="Reacts(<?=$post['id'];?>, 'angry', this)" type="chat"> 😡</div>
		</div>
	
	</div>	
	
	
	<div class="Up_Reaction_Main_d1 pointer Up_Reaction_Main_d1_sacling">
	
		<div class="relative">
			<div class="cs1_zlove" onclick="Reacts(<?=$post['id'];?>, 'love', this)" type="chat"> 😍</div>
		</div>	
	
	</div>	
	
		


	</div>
								
				</div>			
			
			
			
			<a Rct="btn1shSt2" onclick="ShowingReactionDiv(<?=$post['id'];?>)" href="?id=4_rct" class="clrWpstofLink">Like</a>
		</div> 	

		<div>
			<a href="?id=<?=$chatrm['id'];?>&response=<?=$ank2->id;?>&postid=<?=$post['id'];?>" class="clrWpstofLink">Reply</a>
		</div> 


	<? if ($user['level'] > 0 && $user['level']>=$ank2->level || $user['level'] == 6): ?>

<div>

	

		
		<a class="clrWpstofLink" href="?id=<?=$chatrm['id'];?>&del=<?=$post['id'];?>">
		
	Del
		
		
		</a>



</div>

<? endif; ?>

		<div"> <span class="czRz22z_25"> <? echo tmdt($post['post_time']); ?> </span> </div>
		
	


</div>


</div>

			

				


	<!-- second -->	






</div>

<? 
}

?>
</div>





<? if ($user['level']>=4) { ?>
	
<div class="RGQWEMHm">
<a href="?id=<?=$chatrm['id'];?>&act=clean"> Clean the room  </a>
</div>

<? } ?>





<?



$qq->setPage("/chat/room.php?","id=$chatrm[id]");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();


 
?>






<?

include '../inc/footer.php';

?>



