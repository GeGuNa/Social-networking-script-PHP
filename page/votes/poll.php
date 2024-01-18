<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';







if (!isset($_GET['id'])) {
	header("Location: index.php");
	exit;
}
	

if (!is_numeric($_GET['id'])) {
	header("Location: index.php");
	exit;
}	


$ID = filter($_GET['id']);

$poll = $pdo->fetchOne("SELECT * FROM `poll` WHERE `id` = ?",[$ID]);

if (!$poll)
{
	header('Location: index.php');
	exit;
}

$ank = get_user($poll['id_user']);


$qauthor = new user($ank['id']);


include '../../inc/header.php';
title();
aut(); 





/*-------------------close / ignor / off / block------------------*/


if ($user['id']!=$ank['id']) {

if_blocked($ank);

if_blacklisted($ank);

if_closed($ank);

}


/*-------------------end------------------*/




if (isset($_GET['act']) && $_GET['act']=='revoking') {
	
if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `poll_votes` WHERE `id_poll` = '".$poll['id']."' AND `id_user` = '$user[id]'") > 0) {

	$pdo->exec("delete from `poll_votes` where `id_poll` = '".$poll['id']."' and `id_user` = '".$user['id']."'");
	
	$_SESSION['message'] = 'წარმატებით მოხდა ანულირება თქვენი ხმის';
	
} else {

	$_SESSION['message'] = 'არ მიგიციათ ხმა';
	
}	
	
	
	header('Location: ?id='.$ID);
	exit;	
	
}


if (isset($_GET['qp_v4752879'])) { 
	
if (!is_numeric($_GET['qp_v4752879'])) {
	header("location: /");
	exit;
}

$dqpdvarid = number($_GET['qp_v4752879']);


if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `poll_votes` WHERE `id_user` = '$user[id]' AND `id_poll` = '$poll[id]'")>0) {
	header("location: /");
	exit;	
}




$pdo->query("INSERT INTO `poll_votes` (`id_answer`, `id_user`, `id_poll`, `time`) values(?,?,?,?)", [$dqpdvarid, $user['id'], $ID, $time]);



	
	$_SESSION['message'] = 'თქვენი ხმა დაფიქსირდა';
	header('Location: ?id='.$ID);
	exit;
 
	
	
	
}




if (isset($_GET['act']) && $_GET['act']=="heart") {
	

if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `poll_like` WHERE `poll` = '$poll[id]' AND `user` = '$user[id]'") == 1) {
		
$pdo->exec("delete from `poll_like` where `user` = '$user[id]' and `poll` = '$poll[id]'");

header('Location: ?id='.$ID);
exit;
} else {

$pdo->exec("INSERT INTO `poll_like` (`user`, `poll`, `like`, `when`) values('$user[id]', '$poll[id]', '1', '$time')");

$_SESSION['message'] = 'თქვენი ხმა მიღებულია';
header('Location: ?id='.$ID);
exit;
}

}





/* */


if (isset($_GET['comment'])) {
	
if (!is_numeric($_GET['comment'])){
header('Location: /index.php');
exit;
}	


$kqlkpid = filter($_GET['comment']);


	
$post = $pdo->fetchOne("SELECT * FROM `poll_comments` WHERE `id` = ? and `poll` = ?", [$kqlkpid, $poll['id']]);

if (!$post)
{
	header('Location: /index.php');
	exit;
}



$ankz = $pdo->fetchOne("SELECT * FROM `user` WHERE `id` = ?",[$post['user']]);


if ($user['id'] == $ank['id'] || $user['id'] == $ankz['id'] || ($user['level']> 0 && $user['level']>=$ankz['level']) || $user['level']>=5) {
	
$pdo->query("DELETE FROM `poll_comments` WHERE `id` = ? and `poll` = ?", [$post['id'], $poll['id']]);	

header("Location: ?id=$poll[id]");
exit;

} else {
header("Location: /index.php");
exit;	
}

}


/* */












if (($user['id'] == $ank['id'] || $user['level']>$ank['level'] || $user['level']>4) && isset($_GET['delete']))
{
	
if ($user['id'] != $ank['id']) {
	admin_log('გამოკითხვა','წაშლა',"წაუშალა გამოკითხვა  $ank[nick] -ს ");
}
	
	$pdo->query("DELETE FROM `poll` WHERE `id` = ?", [$ID]);
	$pdo->query("DELETE FROM `poll_variant` WHERE `id_poll` = ?", [$ID]);
	$pdo->query("DELETE FROM `poll_votes` WHERE `id_poll` = ?", [$ID]);
	$pdo->query("DELETE FROM `poll_like` WHERE `poll` = ?", [$ID]);
	$pdo->query("DELETE FROM `poll_comments` WHERE `poll` = ?", [$ID]);
	

	
	$_SESSION['message'] = 'Been removed';
	header('Location: index.php');
	exit;
}







if (isset($_POST['add'])) {
	
$text = my_esc($_POST['text']);

if (strlen2($text)>1024)$_SESSION['err'] = 'კომენტარი ძალიან დიდია';
if (strlen2($text)<1)$_SESSION['err'] = 'კომენტარი არ უნდა იყოს ცარიელი';


if (strlen2($_FILES['file1']['name'])>3 && !if_img_upls($_FILES['file1']['name'])) {
	$_SESSION['err'] = 'You cant just everything you want ... only images for this time ... so pick it up carefully';
}





if (isset($_SESSION['err'])) {
header("Location: ?id=$poll[id]");
exit;	
}


if (!isset($_SESSION['err'])) {

	
if (isset($reply) && $reply['id']!=$user['id']) {
	


}


parseUserNameMentioned($text, '/page/votes/poll.php?id='.$poll['id'].'', 'mentioned_inVoting');




if (strlen2($_FILES['file1']['name'])>3 && if_img_upls($_FILES['file1']['name'])) {


  
	
   $picture = $_FILES['file1']['tmp_name'];
   
   $qq2f2l2_zz_type = 'jpg';
   $cqwe_rndm = str_shuffle("1234567804512451_1231_4123_abvczxcqwqtytyiypu-_]]");
   $qwez_r122 = str_shuffle($time);
   $flnmn = my_esc("".$time."".rand(0,9999999)."_".rand(0,9999999)."_pic.".$qq2f2l2_zz_type);



	$img = new Imagick($picture);
	$img->setImageFormat('jpeg');
	$img->writeImage('./files/'.$flnmn);


	
	$img->clear(); 
	$img->destroy();  
  

} else {

$flnmn = '';
  	
	
}



$pdo->query("INSERT INTO `poll_comments` (`user`, `time`, `text`, `poll`,`typef`) values(?,?,?,?,?)",[$user['id'], $time, $text, $poll['id'], $flnmn]);

header("Location: ?id=$poll[id]");
exit;
}


}




$qzpollvoted = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `poll_votes` WHERE `id_poll` = '".$poll['id']."'");




?>







<div class="csPollMN">

<div>
	
	
<div class="pScTNCkWith">

<div><?=$qauthor->photo3(48);?></div>


<div>


<div><?=$qauthor->nick();?></div>
<div><?echo times($poll['time']);?></div>

</div>

</div>	
	

</div>







<div>
	
<? if ($user['id'] == $ank['id'] || $user['level']>$ank['level'] || $user['level']>4) { ?>	


<span onclick="ShowThings(this, 'main')" class="Drpdnw material-symbols-outlined czg21gstr1123" data_id="<?=$poll['id'];?>">more_horiz</span>



<div class="drpdmain" pstevents="<?=$poll['id'];?>" style="display:none;">

<div class="drpd">
	<div>
			<img src="/pics/bgc.g.png" width="20"> 
			<a href="?id=<?=$ID;?>&amp;delete">Delete post</a>
	</div>
</div>

</div>

		
	
<? } ?>

</div>




	

</div>











<? if (strlen2($poll['image'])>0) { ?>
	
<div class="PollTit">
<img src="images/<?=$poll['id'];?>.jpg" style="width: calc(100%);">
</div>

<? } ?>



<?

$allans = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `poll_votes` WHERE `id_poll` = ?", [$ID]);

?>


<div class="poll_Main">

<div class="czpt12232dvds llVoTe1p1">
	<div><span class="pblGHbblT_fpoll fnt black"><?=detect($poll['msg']);?></span></div>
	<div><span class="material-symbols-outlined">person</span> <?=$allans;?></div>
</div>


<div class="czptmnt21plll">
	
	
	
<form method="post" action="?id=<?=$ID;?>">	
	<div class="sPlr2z2">
<?	
	
$qz1qvar = $pdo->query("SELECT * FROM `poll_variant` WHERE `id_poll` = ? ORDER BY `num` ASC", [$ID]);

while ($vazr = $qz1qvar->fetch())  { 
	
$allonthis = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `poll_votes` WHERE `id_answer` = ? AND `id_poll` = ?", [$vazr['id'], $vazr['id_poll']]);

?>
		
<div>

<div class="czpt12232dvds">

<div>
	
	<? if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `poll_votes` WHERE `id_user` = '$user[id]' AND `id_poll` = '$poll[id]'") == 1) {  ?>	
	
		<span class="txtfrplr21z_zz"><?=output_text($vazr['answer']);?> </span>
	
	<? } else { ?>
	
		<a href="?id=<?=$ID;?>&qp_v4752879=<?=$vazr['id'];?>"><span class="txtfrplr21z_zz"><?=output_text($vazr['answer']);?> </span></a>
	
	<? } ?>

</div>

<div><strong><?=cal_percentage($allonthis, $allans);?>%</strong></div>

</div>	


<div class="clrvrt">
	

<? 
$zkl2 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `poll_votes` WHERE `id_user` = '$user[id]' AND `id_poll` = '$poll[id]'");
?>	

<div class="clrofsel clr_var_size" style="<?echo 'width:'.cal_percentage($allonthis, $allans);?>% !important;"></div>

</div>	
	
</div>	
	
	
<? } ?>





</form>


</div>



<? if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `poll_votes` WHERE `id_poll` = '".$poll['id']."' AND `id_user` = '$user[id]'") == 1) { ?>
	
<div class="jdvfrvot">
<a name="vote"  href="?id=<?=$poll['id'];?>&act=revoking" class="poll_viewing vote_nulling">ხმის ანულირება</a>
</div>

<? } ?>


</div>






</div>






<!-- end of polling -->

	
	







<?
 
$qq = new Pagination();


$liked = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `poll_like` WHERE `poll` = ?", [$poll['id']]);


$k_post = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `poll_comments` WHERE `poll` = ?", [$poll['id']]);


$kzftch322 = $k_post;


$ttlq = $qq->calculation($kzftch322, $set['p_str']);



?>


<div class="CS4_2_z213Scet">




<div class="">
<? if ($liked>0) { ?>		
<a href="liked.php?id=<?=$poll['id'];?>">
	<img src="/pics/sections/bscr.svg" width="20" style="padding-right:2px;">   <?=$liked;?>
</a>
<? } ?>
</div>


	
<div class="">
	
  <?=$k_post;?>  Comments
	
</div>


	

	

</div>



<div  class="csqSECt2_ss22">



<div>



<a href="?id=<?=$poll['id'];?>&act=heart">

<? if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `poll_like` WHERE `user` = '".$user['id']."' AND `poll` = '".$poll['id']."'")>0) { ?>
	
<svg version="1.0" xmlns="http://www.w3.org/2000/svg"
 width="60.000000pt" height="60.000000pt" viewBox="0 0 60.000000 60.000000"
 preserveAspectRatio="xMidYMid meet">

<g transform="translate(0.000000,60.000000) scale(0.100000,-0.100000)"
fill="#ff0000" stroke="none">
<path d="M105 556 c-88 -39 -129 -158 -86 -251 19 -42 130 -154 224 -225 l57
-42 57 42 c94 71 205 183 224 225 55 121 -28 265 -152 265 -31 0 -82 -22 -111
-48 -16 -14 -20 -14 -35 0 -53 46 -121 59 -178 34z"/>
</g>
</svg>
	
	
<? } else { ?>

<svg version="1.0" xmlns="http://www.w3.org/2000/svg"
  width="64.000000pt" height="64.000000pt" viewBox="0 0 64.000000 64.000000"
 preserveAspectRatio="xMidYMid meet">

<g transform="translate(0.000000,64.000000) scale(0.100000,-0.100000)"
fill="#000000" stroke="none">
<path d="M115 587 c-40 -19 -90 -76 -105 -122 -18 -54 -7 -120 27 -168 37 -53
262 -257 283 -257 34 0 274 227 301 285 26 55 24 111 -6 171 -46 92 -141 127
-230 84 -26 -12 -49 -28 -52 -36 -3 -9 -17 -4 -48 18 -51 36 -123 46 -170 25z
m132 -71 c16 -14 38 -41 48 -60 11 -20 22 -36 25 -36 3 0 14 16 24 34 27 51
59 77 103 83 79 10 145 -73 129 -162 -8 -41 -75 -115 -199 -219 l-57 -48 -68
58 c-133 116 -180 168 -188 209 -22 117 101 210 183 141z"/>
</g>
</svg>	
	
<? } ?>

 Like </a>


</div>


<div><svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="30.000000pt" height="30.000000pt" viewBox="0 0 30.000000 30.000000" preserveAspectRatio="xMidYMid meet">

<g transform="translate(0.000000,30.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
<path d="M20 250 c-29 -29 -29 -141 0 -170 11 -11 25 -20 30 -20 6 0 10 -13
10 -30 0 -17 5 -30 11 -30 6 0 28 13 49 30 31 24 47 30 89 30 73 0 91 21 91
105 0 97 -11 105 -150 105 -97 0 -112 -2 -130 -20z m245 -85 l0 -70 -59 -3
c-41 -2 -67 -9 -85 -24 l-26 -20 -3 20 c-2 14 -12 22 -30 24 -25 3 -27 6 -30
62 -5 90 -9 87 120 84 l113 -3 0 -70z"></path>
</g>
</svg> <a href="javascript:(0)">Comments</a></div>


<div><svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="48.000000pt" height="48.000000pt" viewBox="0 0 48.000000 48.000000" preserveAspectRatio="xMidYMid meet">

<g transform="translate(0.000000,48.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
<path d="M200 341 c-107 -43 -196 -83 -198 -89 -4 -13 14 -18 121 -31 43 -5 81 -12 85 -15 3 -4 11 -49 18 -102 12 -98 18 -114 33 -98 16 16 161 396 155 405 -3 5 -8 9 -12 9 -4 -1 -95 -36 -202 -79z m170 21 c0 -4 -24 -68 -54 -142 -58 -144 -55 -142 -73 -35 l-8 50 -60 9 c-33 4 -67 10 -75 13 -8 2 43 29 115 58 132 54 155 61 155 47z"/>
</g>
</svg>  <a href="javascript:(0)">Share</a></div>




</div>




<div class='cpstm_22MN'>
	
<form enctype="multipart/form-data" id="reply_id" method='post' action='?id=<?=intval($_GET['id']);?>'>


 <input type="file" style="display:none;" name="file1" id="imgInp" accept="image/*;capture=camera">

<div class="c_d1">
	
<div>
<?=$usojbid->photo3('48');?>
</div>


<div class="c_d2">
	<textarea onfocus="setFcs1Btn()" onblur="setUnFcs1Btn()" id="bb_textarea" name='text' maxlength="1024" placeholder="text goes here"><?=$insert;?></textarea>
	<div id="dispEmojiPicker"></div>
</div>

</div>

<div class="css1drwh4k"> </div>



<div class="CPosTFleXjust">
	
<div>

<img src="/pics/1jV.png" class="crzPDNGR" onclick="funRndrEmojis()" id="dsplEmojiChk">
<img src="/pics/1rn.png" class="crzPDNGR" onclick="SlPHt();">
<img src="/img/crs2.png" class="none pointer" onclick="rMDfpHOT();" id="flrmvd">


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




<div><input value="Send"  class="c_v_zr2" name="add" type="submit" /></div>	


</div>






</form></div>



<div id='smiles_frame'></div>


<div class="skscht_2">
	<img src="" id="blah" class="skscht_3">
</div>


<div class="pCqmn2_22z">
<span class="badgei"><?php echo $k_post;?></span> Comments
</div>









<?
if ($k_post==0)
{
echo '<div class="mess">';
echo "Empty";
echo '</div>';
}



?>


<div class="pFF_LFQCCCMNTSMain">


<?

$qqz21 = $pdo->query("SELECT * FROM `poll_comments` WHERE `poll` = '".$poll['id']."' ORDER BY id DESC LIMIT $ttlq, $set[p_str]");



while ($post = $qqz21->fetch()) {


$posterank = new user($post['user']);



$kqrct = json_decode($post['reactions']);

 
$kq_zz = $kqrct->wow + $kqrct->sad + $kqrct->angry + $kqrct->frown + $kqrct->love;
 


$kzftch3222 = $pdo->fetchOne("SELECT * FROM `user_post_reaction` WHERE 
	`post_id` = '".$post['id']."' and 
	`where` = 'votes' and 
	`user` = '".$user['id']."'
	");

if ($kzftch3222) {
	$tpRc1 = $kzftch3222['type'];
	$lstreacte = 1;
} else {
	$tpRc1 = '';
	$lstreacte = 0;
}



$qnewrct = new Reactions('votes', $post['id'], '/page/notes/');


$qnewrct->st_reactSts = $lstreacte;
$qnewrct->lastbtn = $tpRc1;



?>





<div class="pc21zggp2">
	
	
	
<div class="Live_Chat1">



<div>	<?=$posterank->photo(48);?>  </div>


<div class="Live_Chat2">



	
	
	
<div>
	
	
	
<div class="rsr21"> 


<div>
	
<div class="pcr1_chtr12">

<div>  <?=$posterank->nick();?>	</div>

<div>


<span onclick="ShowThings(this)" class="Drpdnw material-symbols-outlined czg21gstr1123" data_id="<?php echo $post['id'];?>">more_horiz</span>


<div class="drpdmain" pstevents="<?php echo $post['id'];?>" style="display:none;">
	
	
<div class="drpd">


<? if ($user['id'] == $qauthor->id || ($user['level']> 0 && $user['level']>=$posterank->level) || $user['id'] == $posterank->id || $user['level']>=5){ ?>

	<div>
		<a href="?comment=<?=$post['id'];?>&id=<?=$poll['id'];?>"><span class="material-symbols-outlined">delete</span> Delete</a>
	</div>

	<div><a href="edit.php?id=<?=$post['id'];?>"><span class="material-symbols-outlined">edit_note</span> Edit</a></div>
	
	<? } ?>



	<div>
	<a href="report.php?pid=<?=$post['id'];?>"> <span class="material-symbols-outlined">flag</span> Report</a>
	</div>





</div>


</div>




</div>

</div>	
	
	
	



</div>

<div>
		<div>


		<div>


		<div class="pT_xxt1break">
			
			<?echo output_text($post['text']);?></div>

		</div>


			
	<?=$qnewrct->addReactions("/page/votes/reacts.php?post=$post[id]", $kqrct, $kq_zz);?>




		</div>





</div>	





</div>	



		<? if (strlen2($post['typef'])>2) { ?>
		<div class="Live_Chat7"></div>
			 <a href='/page/votes/files/<?=detect($post['typef']);?>'> <img class='Live_Chat8' src='/page/votes/files/<?=detect($post['typef']);?>'>  </a> 
			 
		<? } ?>	



<div>



<?=$qnewrct->ShowReactionButton("?id=$poll[id]&response=$ank[id]", $post['time']);?>




</div>


	


</div>
	
	
	
	
	
	
	
	
	
	
	
	











</div>
	

	

</div>







</div>











<?
}
?>

</div>




<?


$qq->setPage("/page/votes/poll.php?","id=$poll[id]");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();



include '../../inc/footer.php';
?>
