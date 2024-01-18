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

$notes = $pdo->fetchOne("SELECT * FROM `notes` WHERE `id` = ?", [$kpid1_ll]);

if (!$notes)
{
	header('Location: /index.php');
	exit;
}

$author = get_user($notes['id_user']);




//mysql_query("UPDATE `notification` SET `read` = '1' WHERE `type` = 'notes_komm' AND `id_user` = '$user[id]' AND `id_object` = '$notes[id]'");

if (isset($_GET['del_comm'])) {
	
if (!is_numeric($_GET['del_comm'])) {
	header('Location: /index.php');
	exit;
}	

$kqp123idd1 = filter($_GET['del_comm']);

$post = $pdo->fetchOne("SELECT * FROM `notes_komm` WHERE `id` = ? and `id_notes` = ?", [$kqp123idd1, $notes['id']]);

if (!$post)
{
	header('Location: /index.php');
	exit;
}

$ank = $pdo->fetchOne("SELECT * FROM `user` WHERE `id` = ?",[$post['id_user']]);

if ($user['id'] == $author['id'] || $user['id'] == $ank['id'] || ($user['level']> 0 && $user['level']>=$ank['level']) || $user['level']>=5) {
	
$pdo->query("DELETE FROM `notes_komm` WHERE `id` = ? and `id_notes` = ?", [$post['id'], $notes['id']]);	

header("Location: ?id=$notes[id]");
exit;

} else {
header("Location: /index.php");
exit;	
}

}





include '../../inc/header.php';


title();
aut(); 



/*-------------------close / ignor / off / block------------------*/


$friend = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends` WHERE `user` = '".$user['id']."' AND `who` = '".$author['id']."'");



if ($user['id']!=$author['id']) {


if_blocked($author);

if_blacklisted($author);

if_closed($author);



if ($notes['can_see'] == 1 && $user['level']<=$author['level'] && $friend == 0)
{
	
echo '<div class="mess">';
echo 'Only friends can see this page';
echo '</div>';

include '../../inc/footer.php';
exit;
}


if ($notes['can_see'] == 2 && $user['level']<=$author['level'])
{
	
echo '<div class="mess">';
echo 'No one can see this page';
echo '</div>';

include '../../inc/footer.php';
exit;
}




}


/*-------------------end------------------*/






if (isset($_POST['post']))
{
	
$text = my_esc($_POST['text']);

if (strlen2($text)>1024)$_SESSION['err'] = 'კომენტარი არ უნდა აღემატებოდეს 1024 სიმბოლოს';
if (strlen2($text)<1)$_SESSION['err'] = 'კომენტარი არ უნდა იყოს ცარიელი';


if (strlen2($_FILES['file1']['name'])>3 && !if_img_upls($_FILES['file1']['name'])) {
	$_SESSION['err'] = 'You cant just everything you want ... only images for this time ... so pick it up carefully';
}


if ($author['id']!=$user['id']) {

	if ($notes['can_post'] == 1 && $friend == 0)$_SESSION['err'] = 'Only friends can post';
	if ($notes['can_post'] == 2)$_SESSION['err'] = 'No one is able to comment here';

}





if (isset($_SESSION['err'])){
	header("Location: list.php?id=$notes[id]");
	exit;	
}





if (!isset($_SESSION['err'])){



parseUserNameMentioned($text, '/page/notes/list.php?id='.$notes['id'].'', 'mentioned_innotes');
	
if (isset($reply) && $reply['id']!=$user['id']) {
		
	//mysql_query("INSERT INTO `notification` (`avtor`, `id_user`, `id_object`, `type`, `time`) VALUES ('$user[id]', '$reply[id]', '$notes[id]', 'notes_komm', '$time')");	

}



if (strlen2($_FILES['file1']['name'])>3 && if_img_upls($_FILES['file1']['name'])) {


  
	
   $picture = $_FILES['file1']['tmp_name'];
   
   $qq2f2l2_zz_type = 'jpg';
   $cqwe_rndm = str_shuffle("1234567804512451_1231_4123_abvczxcqwqtytyiypu-_]]");
   $qwez_r122 = str_shuffle($time);


$flnmn = my_esc("".$time."".rand(0,9999999)."_".rand(0,9999999)."_pic.".$qq2f2l2_zz_type);



   $img = new Imagick($picture);
   $img->cropThumbnailImage($img->getImageWidth(), $img->getImageHeight());
   $img->setImageFormat('jpeg');
   $img->setImageCompressionQuality(90);
   $img->writeImage('files/'.$flnmn);


   $img->clear(); 
   $img->destroy();  
  

} else {

$flnmn = '';
  	
	
}




$pdo->query("INSERT INTO `notes_komm` (`id_user`, `time`, `msg`, `id_notes`,`pfile`) values(?,?,?,?,?)", [$user['id'], $time, $text, $notes['id'],$flnmn]);


header("Location: list.php?id=$notes[id]");
exit;
}

}







	if (isset($_GET['act']) && $_GET['act'] == "heart")
	{
	
		if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `notes_like` WHERE `id_user` = '".$user['id']."' AND `id_notes` = '".$notes['id']."'") == 0)
			$pdo->exec("INSERT INTO `notes_like` (`id_notes`, `id_user`, `like`,`when`) VALUES ('$notes[id]', '$user[id]', '1', '$time')");
		else
			$pdo->exec("delete from  `notes_like` where `id_user` = $user[id] and `id_notes` = $notes[id]");
			
	
			header("Location: list.php?id=$notes[id]");
			exit;		
		
		
		
	}



	






$stat1 = $notes['msg'];




?>



<?



$qauthor = new user($author['id']);

?>






	


<div class="gsltpchtr2z">



</div>







<div class="gsltpchtr2z">
	

	
<div class="pblog">

<div>
	



<div class="pScTNCkWith">

<div> <?=$qauthor->photo50(48,48,48,'50%');?> </div>

<div>
<div>	<?=$qauthor->nick();?></div>

<div>

<div class="czlgmnlst21zffdivider">
<div class="date"><?echo times($notes['time']);?></div>	
<div class="BlPlMrl1">.</div>	
<div class="date"><?=time_counter((int)strlen2($notes['msg']));?></div> 
</div>

</div>



</div>

</div>



</div>



<div>


<span onclick="ShowThings(this, 'main')" class="Drpdnw material-symbols-outlined czg21gstr1123" data_id="<?=$notes['id'];?>">more_horiz</span>


<div class="drpdmain" pstevents="<?=$notes['id'];?>" style="display:none">
	
<div class="drpd">


<? if ($user['level']>0 && $user['level']>=$author['level'] || $author['id'] == $user['id'] || $user['level']>=5) {  ?>

	<div>
	<img src="/pics/bgc.g.png" width="20"> 
		<a href="delete.php?id=<?=$notes['id'];?>">Delete post</a>
	</div>
	
	<div>
	<img src="/pics/cnh.svg" width="20"> 
		<a href="edit.php?id=<?=$notes['id'];?>">Edit post</a>
	</div>	
	
<? } ?>


<div>
<img src="/pics/AWk.png" width="20"> 
	<a href="report.php?id=<?=$notes['id'];?>">Report post</a>
</div>



</div>	
	
	
</div>


</div>



</div>	
	
	


<div class="justifying">
	
<div class="plogHdTxt plblgtop plblgbottom"> 
	<span class="bloGname">
		<?echo detect($notes['name']);?> 
	</span> 
</div>
	
	
	
<? if (strlen2($notes['image'])>0) { ?>
	<div>
		<img src="images/<?echo detect($notes['image']);?>.jpg" style="width: calc(100%);">
	</div>	
<? } ?>

	

<p class="textChat3">
	<?echo output_text($stat1);?>
</p>


</div>


</div>





<?

$liked = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `notes_like` WHERE `id_notes` = '$notes[id]'");



$qq = new Pagination();


$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `notes_komm` WHERE `id_notes` = ?", [$notes['id']]);

$ttlq = $qq->calculation($kzftch322, $set['p_str']);



$k_post = $kzftch322;


?>





<?
if ($k_post>0 || $liked>0) { 
?>


<div  class="CS4_2_z213Scet">


<div>
	
<?if ($liked>0) { ?>
	
<a href="liked.php?id=<?=$notes['id'];?>">
	<img src="/pics/sections/bscr.svg" width="20" style="padding-right:2px;">   <?=$liked;?> 
</a>
	
<? } ?>	
	
</div>
	
	
<div>
<?if ($k_post>0) { ?>
  <?=$k_post;?>  Comments
<? } ?>
</div>


</div>

<? 
} else { ?>
	
<div style="border-bottom: 1px solid #caca;"></div>	
	
<? } ?>





<div  class="csqSECt2_ss22">

<div>



<a href="?id=<?=$notes['id'];?>&act=heart">

<? if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `notes_like` WHERE `id_user` = '".$user['id']."' AND `id_notes` = '".$notes['id']."'")==1) { ?>
	
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


<div>
	
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="800px" height="800px" viewBox="0 0 17 17" version="1.1">
	<path d="M15.5 0h-14c-0.827 0-1.5 0.673-1.5 1.5v10c0 0.827 0.673 1.5 1.5 1.5h0.5v4.102l4.688-4.102h8.812c0.827 0 1.5-0.673 1.5-1.5v-10c0-0.827-0.673-1.5-1.5-1.5zM16 11.5c0 0.275-0.224 0.5-0.5 0.5h-9.188l-3.312 2.898v-2.898h-1.5c-0.276 0-0.5-0.225-0.5-0.5v-10c0-0.275 0.224-0.5 0.5-0.5h14c0.276 0 0.5 0.225 0.5 0.5v10zM3 3h11v1h-11v-1zM3 5h11v1h-11v-1zM3 7h6v1h-6v-1z" fill="#000000"/>
</svg>
	
	 <a href="javascript:(0)">Comments</a></div>


<div><svg fill="#000000" width="800px" height="800px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
    <path d="M27 22c-1.646 0-3.103 0.8-4.013 2.028l-13.168-6.71c0.114-0.421 0.181-0.86 0.181-1.317 0-0.572-0.101-1.119-0.277-1.63l13.242-6.426c0.909 1.244 2.375 2.056 4.035 2.056 2.762 0 5-2.239 5-5s-2.238-5-5-5-5 2.239-5 5c0 0.388 0.049 0.764 0.133 1.127l-13.432 6.518c-0.915-1.009-2.231-1.646-3.7-1.646-2.761 0-5 2.239-5 5s2.239 5 5 5c1.59 0 3.004-0.744 3.92-1.902l13.222 6.739c-0.090 0.374-0.142 0.762-0.142 1.163 0 2.761 2.238 5 5 5s5-2.239 5-5-2.238-5-5-5zM27 2c1.657 0 3 1.343 3 3s-1.343 3-3 3-3-1.343-3-3 1.343-3 3-3zM5 19c-1.657 0-3-1.343-3-3s1.343-3 3-3c1.657 0 3 1.344 3 3s-1.343 3-3 3zM27 30c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z"></path>
</svg>  <a href="javascript:(0)">Share</a></div>




</div>







<?


?>








<? if ($author['id']!=$user['id'] && $notes['can_post'] == 1 && $friend == 0){ ?>	
	<div class="mess"> Only friends can post</div>	
<? } else if ($author['id']!=$user['id'] && $notes['can_post'] == 2) { ?>
	<div class="mess"> No one is able to comment here</div>
<? } else { ?>





<div class='form'>
<form enctype="multipart/form-data" id="reply_id" method='post' action='?id=<?=filter($_GET['id']);?>'>

<input type="file" style="display:none;" name="file1" id="imgInp" accept="image/*;capture=camera">

<div class="CPosTFleXjust3">
	
<div class="flex5">
	<?=$usojbid->photo3('48');?>
</div>


<div class="flex95">
	
	<textarea onfocus="setFcs1Btn()" onblur="setUnFcs1Btn()" id="bb_textarea" name='text' minlength="1" required maxlength="1024" placeholder="text goes here"><?=$insert;?></textarea>
	
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
	<a style="" href="?id=<?=$notes['id'];?>">Cancel</a>
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



<div><input value="Sending" class="c_v_zr2" type="submit" name="post" /></div>	


</div>



</form>

</div>

<? } ?>



<div id='smiles_frame'></div>


<div class="skscht_2">
	<img src="" id="blah" class="skscht_3">
</div>







<?if ($k_post>0) { ?>
	
<div class="pCqmn2_22z">
<span class="badgei"><?php echo $k_post;?></span> Comments
</div>
	


<div class="czgosspig">

<?

$qfetch = $pdo->query("SELECT * FROM `notes_komm` WHERE `id_notes` = ? ORDER BY id DESC LIMIT $ttlq, $set[p_str]", [$kpid1_ll]);



while ($post = $qfetch->fetch())
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



<div class="drpdmain" pstevents="<?php echo $post['id'];?>" style="display:none;">
	
	
<div class="drpd">







<? if ($user['id'] == $author['id'] || ($user['level']> 0 && $user['level']>=$posterank->level) || $user['id'] == $posterank->id || $user['level']>=5){ ?>
<div><span class="material-symbols-outlined">delete</span> <a href="?id=<?=$notes['id'];?>&del_comm=<?=$post['id'];?>">Delete</a></div>
<? } ?>



<? if ($user['id'] == $author['id'] || ($user['level']> 0 && $user['level']>=$posterank->level) || $user['id'] == $posterank->id || $user['level']>=5){ ?>
<div><span class="material-symbols-outlined">edit_note</span> <a href="post_edit.php?note=<?=$notes['id'];?>&pid=<?=$post['id'];?>">Edit</a></div>
<? } ?>

<div><span class="material-symbols-outlined">flag</span> <a href="report.php?id=<?=$notes['id'];?>&pid=<?=$post['id'];?>">Report</a></div>


</div>


</div>


</div>

</div>	
	
	
	



</div>

<div>

<span class="ctzt1231c13">
	<?=output_text($post['msg']); ?>
</span>


	
<?=$qnewrct->addReactions("/page/notes/reacts.php?post=$post[id]", $kqrct, $kq_zz);?>



</div>	

</div>	


<div>
	
	
<? if (strlen2($post['pfile'])>1) { ?>
	<div class='Live_Chat7'></div>
	<a href='/page/notes/files/<?=detect($post['pfile']);?>'> <img style='max-width:70%;' src='/page/notes/files/<?=detect($post['pfile']);?>'>  </a> 
<? } ?>






	
<?=$qnewrct->ShowReactionButton("?id=$notes[id]&response=$posterank->id", $post['time']);?>


</div>


	


</div>





</div>

</div>




</div>








<? } ?>

</div>

<? } ?>












<?

$qq->setPage("/page/notes/list.php?", "id=$notes[id]");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();

?>



<? if ($k_post>0) { ?>
	<div style="margin-top:25px;"></div>
<? } ?>

<div class="pRandomBlog">
	
<div class="PFFFnt">Random Blogs</div>


<? 

$qrand=$pdo->query("SELECT * FROM `notes`  where  `post_type` = 'note' ORDER BY RAND() DESC LIMIT 5");
?>

<div class="pRandomBlogC">
<?
while($qqpost = $qrand->fetch()) {
	
$author = new user($qqpost['id_user']);

?>


<div class="pRandomBlogC2">

<div><img src="/style/icons/user_ank/us_man.png" width="60"></div>

<div class="pRandomBlogC2p"> 
	
	<div><a href="/page/notes/list.php?id=<?=$qqpost['id'];?>"><?=detect($qqpost['name']);?></a></div>
	
	<div class="Live_Time"><?=$author->nick();?> - <?=when($qqpost['time']);?></div>
	
</div>


</div>


<? } ?>


</div>


</div>


<?
include '../../inc/footer.php';
?>
