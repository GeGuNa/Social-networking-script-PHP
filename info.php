<?
include 'inc/db.php';
include 'inc/main.php';
include 'inc/functions.php';
include 'inc/user.php';



if (isset($user))$usid=$user['id'];
if (isset($_GET['id']))$usid=filter($_GET['id']);





$ank = get_user($usid);


if (!$ank) {
	header("Location: /index.php");
	exit;
}


include 'inc/header.php';

title();
aut();




	
	


if ($ank['id'] != $user['id']) {
	
	

if (isset($_GET['ignor']) && $_GET['ignor']=='del') {
	
$pdo->query("DELETE FROM `user_ignor` WHERE `user` = ? AND `who` = ?",[$user['id'],$ank['id']]);

header("location:  /info.php?id=$ank[id]");
exit;

}


if (isset($_GET['ignor']) && $_GET['ignor']=='add') {
	
if ($ank['level']>$user['level']) {

$_SESSION['message']="ადმინს ვერ დააიგნორებ";
header("location:  /info.php?id=$ank[id]");
exit;

} else {

if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `user_ignor` WHERE `user` = ? AND `who` = ?",[$user['id'],$ank['id']]) > 0) {
	
header("Location: /index.php");
exit;

}


$pdo->query("INSERT INTO `user_ignor` (`user`, `who`, `when`) values(?, ?, ?)",[$user['id'],$ank['id'], $time]);

header("location:  /info.php?id=$ank[id]");
exit;

}

} 	
	
	
}










/*-------------------close / ignor / off / block------------------*/


if ($user['id']!=$ank['id']) {


if_blocked($ank);

if_blacklisted($ank);

if_closed($ank);

}


/*-------------------end------------------*/






$friends = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends` WHERE `user` = ? AND `who` = ?",[$user['id'],$ank['id']]);


$friends_newbythem = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends_requests` WHERE `user` = ? AND `who` = ?",[$user['id'],$ank['id']]);


$friends_new = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends_requests` WHERE `user` = ? AND `who` = ?",[$ank['id'],$user['id']]);



$my_black = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `user_ignor` WHERE `user` = ? AND `who` = ?",[$user['id'],$ank['id']]);


$mconnections = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends` WHERE `user` = ?", [$ank['id']]);



/////////






if (isset($_POST['post']) && $user['id'] == $ank['id'])
{



if (!empty($_FILES['file1']['name'])) {

$picture = $_FILES['file1']['name'];

if (!if_img_upls($picture)) { 
$_SESSION['message'] = "დაშვებული ფორმატები gif, png, jpg, jpeg, webp, bmp";
header("Location: /info.php?id=$ank[id]");
exit; 
}

}



$text = my_esc($_POST['subject']);

$cansee = number($_POST['can_see']);
//$canpost = number($_POST['can_post']);


if (!in_array($cansee, array('0','1','2')))Error('უუპს'); 
//if (!in_array($canpost, array('0','1','2')))Error('უუპს'); 



if (strlen2($text)>40000){
$_SESSION['message'] = "ტექსტი არ უნდა აღემატებოდეს 40000 სიმბოლოს";
header("Location: /info.php?id=$ank[id]");
exit; 	
}



if (strlen2($text)<1){
$_SESSION['message'] = "ტექსტი არ უნდა იყოს ცარიელი";
header("Location: /info.php?id=$ank[id]");
exit; 	
}


$ftsqee  = $user['id'];
$r3nd5s = rand(0,999999999);
$rn4ds2 = rand(0,999999999);
$rn4ds3 = rand(0,999999999);
$r3nd544s = rand(0,time());
$r3nd5s234123 = rand($r3nd5s,$r3nd544s);


$id_foto = $r3nd5s.$rn4ds3.$rn4ds2."_".time()."$r3nd544s.$r3nd5s234123";


if (!empty($_FILES['file1']['name'])) {
	
	
$picture = $_FILES['file1']['tmp_name'];

$picturePath = $_SERVER['DOCUMENT_ROOT'].'/page/notes/images/'.$id_foto.'.jpg';
$picturePath3 = $_SERVER['DOCUMENT_ROOT'].'/page/notes/images/mini/'.$id_foto.'.jpg';


convertAndBlurForPosts($picture, $picturePath);	
convertAndBlurForPosts($picture, $picturePath3, 'scaled');	


$flmsqwe = $id_foto;	

} else {

$flmsqwe = '';

}
$type = '';



$pdo->query("INSERT INTO `notes` (`time`, `msg`, `id_user`, `typef`,`image`,`can_see`, `post_type`) values(?, ?, ?, ?, ?, ?, ?)", [$time, $text, $user['id'], $type, $flmsqwe, $cansee, 'post']);



header("Location: /info.php?id=$ank[id]");
exit;



}




//////////


/*
if (isset($_POST['status']) && $user['id']==$ank['id'])
{
	
$msg=$_POST['status'];

if (strlen2($msg)>1024)$err='მაქსიმუმ 1024 სიმბოლო';
if (strlen2($msg)<3)$err='მინიმუმ 3 სიმბოლო';

if(!isset($err))
{
	
//mysql_query("INSERT INTO `user_ignor` (`user`, `who`, `when`) values('$user[id]', '$ank[id]', '$time')");


header("Location: ?id=".$ank['id']."");
exit;

} 

}*/









	
if ($user['id']!=$ank['id'] && $user['anonim']<$time) { 
	
if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `visitors` WHERE `user` = '".$ank['id']."' AND `who` = '".$user['id']."'")==0) {
	
$pdo->exec("INSERT INTO `visitors` (`user`, `who`, `when`) values('".$ank['id']."', '".$user['id']."', '".$time."')");

} else {	
	
$pdo->exec("UPDATE `visitors` SET `when` = '".$time."', `read` = '0' WHERE `user` = '".$ank['id']."' AND `who` = '".$user['id']."'");

}		
	
} 	








$qwe = new user($ank['id']);


if ($qwe->cover_id == 0){
	$cvrln = "/images/mail/Abstract+stars.jpg";
	$cqwleq11 = "";
	$kf1_z = false;
} else {

$kf1_z = false;	

$oklcvri = $pdo->fetchOne("SELECT * FROM `gallery_foto` where `id` = ?", [$qwe->cover_id]);	
		
//$kq1_zzcntlwmw  = $_SERVER['DOCUMENT_ROOT']."/images/gallery/48/".$oklcvri['photo_addr'].".jpg";	
	
if ($oklcvri) {
	$cvrln = "/images/gallery/640/".$oklcvri['photo_addr'].".jpg";
	$cqwleq11 = "onclick='window.location=\"/foto/foto.php?id=$qwe->cover_id\"'";
	
	$kf1_z = true;
	
} else {
	$cvrln = "/images/mail/Abstract+stars.jpg";
	$cqwleq11 = "";
}
	
}


?>

<style>


.aKDiplayImage12 img {
 max-width: 100%;
 width: 100%;
 max-height: 100%;
 background-size: contain;
}

.aKDiplayImage12 {
 height: 317px;
 width: 100%;
 object-fit: fill;
}


.aKDiplayImage {
  width: 100%;
  height: 290px;
  background-image: url('<?=$cvrln;?>');
  background-size: cover;
  background-position: center;
}

</style>


<div class="uoppfr_crbrrMain borderBottom">
	<!--   ("/sys/gallery/48/$foto[id].jpg") -->
	
	 
<div class="<?=($kf1_z == true ? '' : '');?> aKDiplayImage kpsRel">



<?if ($qwe->id == $user['id']) { ?>
		<div class="kpsAbs" onclick="window.location='/foto/add.php';">

			<div class="kBacBl">	
				<i  class="fa fa-camera"></i>
			</div>
			
			
		</div>
<? } ?>

<!-- photo -->


	<div class="kPqwem243zqa">
		
	
		<div>  <?=$qwe->photo2(128, 80, 80, "50%"); ?> </div>

		
	</div>



<!-- -->




</div>


<div class="uu_prof_Dv1">


	<div class="pFlexAlCenter">
		<span class="authorName"><?=$qwe->nick;?></span>
	</div>



<div>


<div class="break">


<div class="uup_dorg">
	
	
<?if ($qwe->id != $user['id']) { ?>

<div> 
	

<div class="uu_mor_21">
	<a href="/page/stuff.php?id=<?=$qwe->id;?>">
		<span class="c_more"></span>
	</a>
</div>
	
</div>


<div> 

<div class="prfMpro22_4" onclick="window.location='/mail/who.php?who=<?=$qwe->id;?>'">
		<span class="black">Message</span>
</div>


</div>


<div> 

<div class="prfMpro22_3">


<?

if ($user['id']!=$ank['id']) {

if ($friends_newbythem>0) {
	echo "<a href='/user/friends/create.php?accepting=$ank[id]'>Accept</a>";
} else if ($friends_new>0) {
	echo "<a href='/user/friends/create.php?unrequest=$ank[id]'>Unrequest</a>";
} else if ($friends>0) {
	echo " <a href='/user/friends/create.php?delete=$ank[id]'>Unfriend </a>";
} else {
	echo "<a href='/user/friends/create.php?send=$ank[id]'>Befriend</a>";
}

}

?>
</div>


</div>



<? } else { ?>





<div> 

<div class="prfMpro22_3"><a href="/user/settings/edit.php">Edit profile</a></div>


</div>

<? } ?>



</div>	
	
	
	

</div>



</div>



</div>




<!-- -->
<div>

<!-- 
<div class="u_NICk2 borderBottom uu_1_zqw"> 
	<?=$qwe->nick;?>
</div>


<div class="u_NICk2">
	<div class="u_Opacitied"><?=$mconnections;?> Connections</div>
</div>
-->


<? if (utf_strlen($qwe->bio)>0) { ?>
	<div class="WhtTxe1">
	<?=detect($qwe->bio);?>
	</div>
<? } ?>

<div class="u_mn_profr1">

<? if (utf_strlen($qwe->ank_city)>0) { ?>
	<div>
		<div class="u_mn_flxin">
			<span class="Icons">home_pin</span> 
			<span class="umn_prof11"><?=text($qwe->ank_city);?> </span>  
		</div>
	</div>
<? } ?>
	
	<div>
		<div class="u_mn_flxin">
			 <span class="Icons">date_range</span> 
			 <span class="umn_prof11"><?=tmdt($qwe->date_reg);?> </span>  
		 </div>
	</div>


</div>



</div>


<!-- -->






</div>






<div class="pBlueWw2">
	
<div class="lLTl21zblt active"> 
<a href="javascript:(0)">Posts</a>
</div>	

<div class="lLTl21zblt "> 
<a href="/user/profile/?id=<?=$ank['id'];?>">About</a>
</div> 


<div class="lLTl21zblt ">  
<a href="/user/friends/?id=<?=$ank['id'];?>">Friends</a>
</div>


<div class="lLTl21zblt ">  
<a href="/foto/my.php?id=<?=$ank['id'];?>">Photos</a>
</div>
	
	
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



<? if ($user['id'] == $ank['id']): ?>

<div class="ftrwithborder">
<form method="post" enctype="multipart/form-data" action="?id=<?=$ank['id'];?>">


<input class="none" type="file" name="file1" id="imgInp" accept="image/*;capture=camera">


<div style="margin-bottom:10px;">
	

<div class="u_Profile_Posting">
	
	<div><?=$usojbid->photo3('48');?></div>

	<div class="uPROF_FLX1">
		
		<textarea onfocus="setFcs1Btn()" onblur="setUnFcs1Btn()" class="u_pROf_W" id="bb_textarea" name="subject" rows="5" minlength="1" maxlength="40000" required="" placeholder="Whats on your mind?"></textarea>  
		<div id="dispEmojiPicker"></div>
	</div>

	<div><input value="Post" class="u_pROf_W c_v_zr2" type="submit" name="post"></div>	

</div>	
	
	
	

</div>




<div class="u_Profile_Posting_Rest">


	
<div>
<img src="/pics/1jV.png" class="crzPDNGR" onclick="funRndrEmojis()" id="dsplEmojiChk">
<img src="/pics/1rn.png" onclick="SlPHt();" class="crzPDNGR">
<img src="/img/crs2.png" onclick="rMDfpHOT();" class="none pointer" id="flrmvd">
</div>	




<div> 

<select name="can_see" style="float:right;">  
<option value="0" selected>Everyone</option>
<option value="1">Only friends</option>
<option value="2">No one</option> 
</select>

</div>



	
</div>



</form>
</div>



<div id='smiles_frame'></div>




<div class="skscht_2">
	<img src="" id="blah" class="skscht_3">
</div>


<? endif; ?>



<?


$qqeqwe_uid = $ank['id'];

$k_post=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `notes` where `id_user` = ? and `post_type` = 'post'",[$qqeqwe_uid]);

$qq = new Pagination();

$ttlq = $qq->calculation($k_post, $set['p_str']);




$qww1po2 = $pdo->query("SELECT * FROM `notes` where `id_user` = ? and `post_type` = 'post' ORDER BY `id` DESC LIMIT $ttlq, $set[p_str]", [$qqeqwe_uid]);

while($post = $qww1po2->fetch()) {

$author = new user($post['id_user']);


if (strlen2($post['image'])>0)
	$qlzd = '<img src="/page/notes/images/mini/'.Unescaped($post['image']).'.jpg" style="width: calc(100%);"/>';
else 
	$qlzd = '';
	
?>



<div class="u_Blog_Mian">
	
<div class="u_Blog"> 




<div> 
	
	
<div class="u_Blog_first">

<div><?=$author->photoRounded(48,48,50);?></div>

<div> 


		
<div class="pTxtWithoutOverflowing">
	   
	   
<div class="u_Blog_nick">

<?=$author->nick();?>

</div>
	  
	  
<div>
	<span class="date"><?php echo when($post['time']); ?> </span>
</div>	   
	   




</div>


</div>

</div>	
	



</div>	
		





<div>
	
	

<div class="u_Blog_distance" shw_nffl2="<?=$post['id'];?>"> 

<? if ($qlzd) { ?>

<div class="U_PST_MPR"><?=$qlzd;?> <br/><br/>	</div>
	
<? } ?>	
	

	
	
	<?=Unescaped(utf_substr($post['msg'], 0, 500));?> </div>

</div>

<? if (utf_strlen($post['msg'])>500) { ?>
<div class="u_blogg21" shw_nffl="<?=$post['id'];?>">
	<div onclick="get_Data_Msg(<?=$post['id'];?>);" class="u_blog_Lnk2">Show more</div>
</div>
<? } ?>


</div>	
	


<div>

<div class="u_blog_Sections">
	
	


<?

$liked = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `notes_like` WHERE `id_notes` = '".$post['id']."'");
$comments = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `notes_komm` WHERE `id_notes` = '".$post['id']."'");


if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `notes_like` WHERE `id_user` = '".$user['id']."' AND `id_notes` = '".$post['id']."'") == 1) { 
$plnkhr = 'material-symbols-outlined2 red';
} else {
$plnkhr = 'material-symbols-outlined';
}




?>





<div> <a href="/page/posts/?id=<?=$post['id'];?>&act=heart"> <span class="<?=$plnkhr;?>">favorite</span> <?=$liked;?> </a> </div>
<div> <a href="/page/posts/?id=<?=$post['id'];?>"> <span class="material-symbols-outlined">chat</span> <?=$comments;?> </a> </div>

<div><span class="material-symbols-outlined">share</span> 0 </div>

</div>


</div>


	


</div>




  
<? } ?>






<?
$qq->setPage("/info.php?", "id=$ank[id]");
$qq->setTotal($k_post);
$qq->setPerPage($set['p_str']);

$qq->rendering();
?>
















<?
if ($user['version'] == 'wap')
	include 'inc/footer.php';
else 
	include_once 'inc/For_Profile.php';
?>
