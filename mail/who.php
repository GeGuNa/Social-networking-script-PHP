<?php 


include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';


if (!isset($_GET['who'])) {
	redirection("/");
}

if (!is_numeric($_GET['who'])) {
	redirection("/");
}




$ida =  filter($_GET['who']);


$ank = get_user_data($ida);

//var_dump($ank);


if (!$ank or empty($ank)) {
	redirection("/");
}


/*
print_r($_POST);
exit;
*/
if  (isset($_POST['send']))	{
					
$text = my_esc($_POST['text']);
							

	
if (strlen2($text)<1)$_SESSION['err']='გზავნილი მიმიმუმ 1 სიმბოლო';
if (strlen2($text)>10000)$_SESSION['err']='გზავნილი მაქსმუმ 10000 სიმბოლო';



if (!empty($_FILES['file1']['name'])  && !if_img_upls($_FILES['file1']['name'])) {
	$_SESSION['err'] = "დაშვებული ფორმატები gif, png, jpg, jpeg, webp";
}





if (isset($_SESSION['err'])) {
	redirection("/mail/who.php?who=".$ank->id."");	
}


if (isset($_FILES['file1']) && strlen2($_FILES['file1']['name'])>3 && if_img_upls($_FILES['file1']['name'])) {
  
	
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
   $img->writeImage($_SERVER['DOCUMENT_ROOT'].'/mail/files/'.$flnmn);


   $img->clear(); 
   $img->destroy();  
  

} else {

$flnmn = '';
  	
	
}




if (isset($_FILES['qwew_audio']) && strlen2($_FILES['qwew_audio']['name'])>3) {
	
$qq2f2l2 = 'm4a';
	
$ppwwad = my_esc("$time-_-".rand(0,9999999)."_".rand(0,9999999)."_audio.".$qq2f2l2);
		
move_uploaded_file($_FILES['qwew_audio']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/guest/files/".$ppwwad);

	
} else {
	
$ppwwad = '';
	
}




$pdo->query("INSERT INTO `messages` (`user`, `whom`, `text`, `when`) values(?, ?, ?, ?)", [$user['id'], $ank->id, $text, $time]);





$kzkt1 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `contacts` WHERE `user` = '".$user['id']."' and `whom` = '".$ank->id."'");

if ($kzkt1 == 0) {


$pdo->query("INSERT INTO `contacts` (`user`, `whom`, `when`) 
values
('".$ank->id."', '".$user['id']."', '".$time."'),
('".$user['id']."', '".$ank->id."', '".$time."')");

	
} else {
	
$pdo->exec("update `contacts` set `when` = '".$time."' where `user` = '".$user['id']."' and `whom` = '".$ank->id."'");
$pdo->exec("update `contacts` set `when` = '".$time."' where `user` = '".$ank->id."' and `whom` = '".$user['id']."'");

}



redirection("/mail/who.php?who=".$ank->id."");	
				
					
}
				
				
	
	


if (isset($_GET['delete'])) {
	
if (!is_numeric($_GET['delete'])){
	header('Location: /index.php');
	exit;
}	



$delid = number($_GET['delete']);
	
	
$post = $pdo->fetchOne("SELECT * FROM `messages` WHERE `mid` = ?", [$delid]);

if (!$post) { 
	
	header("Location: /"); 
	exit;

} 


if ($post['user'] == $user['id'] || $post['whom'] == $user['id']) {
	
	
if ($post['deleted_by']>0 && $post['deleted_by']!=$user['id']) {
	
	$pdo->exec("DELETE FROM `messages` WHERE `mid` = '".$post['mid']."'");
	
} else {
	
	$pdo->exec("UPDATE `messages` SET `deleted_by` = '".$user['id']."' WHERE  `mid` = '".$post['mid']."'");
	
}


	redirection("/mail/who.php?who=".$ank->id."");	
	exit;

} 


}



if (isset($_GET['act']) && $_GET['act']=='clean') {

$pdo->exec("delete from `contacts`  where `user` = '".$user['id']."' and `whom` = '".$ank->id."'");



$pdo->exec("delete from `messages` where 
`user` = '".$user['id']."' and `whom` = '".$ank->id."' and `deleted_by` = '".$ank->id."'  or 
`whom` = '".$user['id']."' and `user` = '".$ank->id."' and `deleted_by` = '".$ank->id."' 
");





$pdo->exec("update `messages` set  `deleted_by` = '".$user['id']."' where 
`user` = '".$user['id']."' and `whom` = '".$ank->id."' 
or 
`whom` = '".$user['id']."' and `user` = '".$ank->id."' ");



redirection("/mail/who.php?who=".$ank->id."");	
exit;
}
			


/*
$ank2 = get_user($ida);


if ($ank->user == NULL) {
	redirection("/");
}*/


$qq = new Pagination();

include '../inc/header.php';

if ($user['version']=='web') {
	webPage();
}  else {
	title();
	aut();
}
?>


<?


$q12ft1 = $pdo->query("select `mid` from `messages` where `whom` = '".$user['id']."' and `user` = '".$ank->id."' and `read` = '0'");

$ifmynq1_zw = $q12ft1->rowCount();

if ($ifmynq1_zw>0) {

	while ($kd1_d = $q12ft1->fetch()) {
		$pdo->exec("update `messages` set `read` = '1' where `mid` = '".$kd1_d['mid']."'");
	}

}


?>





<script>

var user = {
	me: <?=$user['id'];?>,
	them: <?=$ank->id;?>,
}


</script>

<link rel="stylesheet" href="/css/messenger.css">





<div class="lr12_11" style="display:none;">
	
	
<div class="msgmdl2">
		
	<div class="msgmodal">
			<div class="red" id="rptpsid">Report</div>
			<div id="dltpsid">Delete</div>
			<div onclick="Cnclmdl();">Cancel</div>			
	</div>

			
	</div>
	
	
</div>



<? if ($user['version']=='web') { ?>
	
<div class="mess_5">
	
<? } else {?>

<div class="mob_mess2">


<? }?>



<? if ($user['version']=='web') { ?>

<div class="msg_mn12_z1">
	
	
	
		<div class="Titling_3">
			
			<?
			$kzftch32z2z22 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `contacts` WHERE `user` = '".$user['id']."' ");
			?>	


			<div>	<span class="Titling23">Messages</span>	</div>
			<div> <span onclick="window.location='/user/settings/privacy.php'" class="black pointer material-symbols-outlined">settings</span> </div>



	

		</div>	


<div class="mess_2"></div>


<!--  users -->
    
<div class="mess_6">


<?



$kz_mfhmn1_213 =  $pdo->queryFetchColumn("SELECT COUNT(*) FROM `contacts` WHERE `user` = '".$user['id']."' ");

$ttlq = $qq->calculation($kz_mfhmn1_213, $set['p_str']);





$kzftch131 = $pdo->query("SELECT * from `contacts`  where  `user` = '".$user['id']."' ORDER BY `when` DESC LIMIT ".$ttlq.", ".$set['p_str']."");


if ($kz_mfhmn1_213>0) { 

while ($kdata = $kzftch131->fetch()) { 

$psank1 = new user($kdata['whom']);		

$kzfetch1 = $pdo->fetchOne("select * from messages  where  
 `user`  = '".$user['id']."' and `whom` = '".$psank1->id."' and `deleted_by` != '".$user['id']."' or 
 `whom`  = '".$user['id']."' and `user` = '".$psank1->id."' and `deleted_by` != '".$user['id']."'
 order by `when` desc limit 1");


$hmntxtz41z_cnt =  $pdo->queryFetchColumn("select count(*) from `messages`  where  `whom`  = '".$user['id']."' and `user` = '".$psank1->id."'  and `read` = '0'");	


?>




	<div class="pointer p_s_shover <?=($ank->id == $psank1->id ? 'p_s_hoveractive' : '');?>" onclick="window.location='/mail/who.php?who=<?=$psank1->id;?>'">
		
		
	<!-- first -->

		
		
		<div class="rmsmsg1_1">
	
		
				<div style=""><?=$psank1->photoRounded(128,56,56,50);?></div>


<!-- second -->

<div class="rmsmsg1_2">
	
	
	
				<div>
					
						<div class="rmsmsg1_3">
				
							
							<div> <span class="Username"> <?=$psank1->nick();?> </span>	</div>	
							<div>
								
								<span class="SpanInfoTime">
							
							<? 
								if ($kzfetch1)
									echo tmdt($kzfetch1['when']); 
								else 
									echo '';
							?>
								
							</span>
							
							</div>
										
						</div>
				
				</div>
		
	
	
				<div>
			
					<div class="rmsmsg1_4">		
					
					
							
							<div> 
								
								<span class="SpanInfoTime">
									<? 
									if ($kzfetch1)
										echo utf_substr(Unescaped($kzfetch1['text']),0,30); 
									else
										echo '';
									?>
								</span>
							</div>
							<div> 
								
								<? if ($hmntxtz41z_cnt>0) {?>
									<span class="kggren123"> <?=$hmntxtz41z_cnt;?></span>
								 <? } ?>
								</div>
							
					</div>		
					
					
				</div>	
				
				
			</div>	
			<!--  end of second-->	
		
		
		
			</div>
		
		
		
		
		</div>
	<!-- -->	
		

	

	
	
	



<? } } ?>


<?
if ($kz_mfhmn1_213>$set['p_str']) { 
	
$jstcnt = ceil($kz_mfhmn1_213/$set['p_str']);	
echo '
<script>
var hwmnch = '.$jstcnt.'; 
var ntqpw = 1;
</script>
';

?>

	<div class="Titling_4 Titling_5 pointer" id="whmnchleft" value="<?=$jstcnt;?>" onclick="showCnt_2()"> 
	<span class="material-symbols-outlined mmmrr_gl21">autorenew</span>	 Load More</div>
	
<? } ?>


</div>
	
<!--  end of users -->	



</div>

<? } ?>
<? if ($user['version']=='web') { ?>

<div class="msg_mn12_z2">
	
<? } else {?>
	
<div class="mob_mess1">	
		

<? } ?>		
		
	<div class="mess_7">
		
	
	<div>
	
	
	<div class="mess_9">
		
			<div><?=$ank->photoRounded(48);?></div>

		<div>
				<div><?=$ank->nick();?></div>
				
						<div class="date"> 
						
							<div class="mess_11">
							
								<? if ($ank->online_status()) { ?>
									<div><span class="messs_10"></span></div>
									<div>Active now</div>
								<? } else { ?>
									<div>Active <?=when($ank->date_last);?> ago</div>
								<? } ?>
							
							</div>	
				
						
						</div>


		</div>
	
	</div>
			


	
	
	</div>	
		


<div>
<!-- -->


<div onclick="window.location='/mail/who.php?act=clean&who=<?=$ank->id;?>'" class="pointer xx_d_sm1">
	<span class="material-symbols-outlined">delete</span>	
</div>


<!-- -->
</div>


	</div>		
		
		
		
		





























<?

$kz_mfhmn1_2134 =  $pdo->queryFetchColumn("SELECT COUNT(*) FROM	`messages`  where  ((`user`  = '".$user['id']."' and `whom` = '".$ank->id."' or `whom`  = '".$user['id']."' and `user` = '".$ank->id."') and `deleted_by` != '".$user['id']."')");

$ttlqzw21 = $qq->calculation($kz_mfhmn1_2134, $set['p_str']);


$kzftch = $pdo->query("select * from messages  where  
(

(`user`  = '".$user['id']."' and `whom` = '".$ank->id."'  or  `whom`  = '".$user['id']."' and `user` = '".$ank->id."') 
and `deleted_by` != '".$user['id']."') 
order by `mid` DESC limit 
".$ttlqzw21.", ".$set['p_str']."");


$kzddmsg = [];

while ($kdata = $kzftch->fetch()) { 
	$kzddmsg[] = [
	'mid'=> $kdata['mid'],	
	'user'=> $kdata['user'], 
	'text'=> $kdata['text'], 
	'when'=> $kdata['when'],
	'read'=> $kdata['read']
];
	
}	

//sorting associative arrays  
asort($kzddmsg);
	

?>	
	
	
	





	


<div id="displaying" class="messs_20">





<!-- loading for more -->



<?
if ($kz_mfhmn1_2134>$set['p_str']) { 
	
$jstcnt2 = ceil($kz_mfhmn1_2134/$set['p_str']);	

echo '
<script>
var hwmnchmsg_1 = '.$jstcnt2.'; 
var ntqpw_msg1z = 1;
</script>
';

?>

	<div class="c_mes131" id="whmnchleftmsg" value="<?=$jstcnt2;?>" onclick="showCnt_23z()"> 
	<span class="material-symbols-outlined mmmrr_gl21">autorenew</span>	 Load More</div>
	
<? } ?>



<!-- end of loading -->


	
<?	
	
foreach ($kzddmsg as $key=>$kdata) {

//var_dump($value);

//exit;	

$psusr1 = new user($kdata['user']);	

?>	





<? if ($psusr1->id == $user['id']) { ?>
	
		<div class="cm_stex_1">
		
		
		<div><?=$psusr1->photoRounded(48, 50, 50, 50);?></div>
		
		
		
		
		<!-- -->
			
			<div class="cm_stex_2">
				
			
		<div> 
		
		
		
	<div class="XX_msg1">
			
		
		<div class="cm_stex_2">
			<div> <?=text($kdata['text']);?>  </div>
			<div> <span onclick="ShwMdlFRm(<?=$kdata['mid'];?>);" class="Xmsg1">more_horiz</span> </div>
		</div>	
			
			
		
			
			
		</div>
				
				
				<div class="cm_stex_3">
					
					<?=when($kdata['when']);?>   
				
				
					<span class="my_msg1">
						
						<? if ($kdata['read']==0) { ?>
							
							<svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="15" width="15" xmlns="http://www.w3.org/2000/svg"><polyline points="20 6 9 17 4 12"></polyline></svg>
							
						<? } else { ?>
							
							<svg stroke="currentColor" fill="#43A047" stroke-width="0" viewBox="0 0 24 24" height="20" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m2.394 13.742 4.743 3.62 7.616-8.704-1.506-1.316-6.384 7.296-3.257-2.486zm19.359-5.084-1.506-1.316-6.369 7.279-.753-.602-1.25 1.562 2.247 1.798z"></path></svg>
							
						<? } ?>
						
						</span>
				
				
				
				</div>
		
		
		
		
		</div>
		

		
			</div>
			
			
			<!-- -->
	
				
		
			</div>
			
			
			
		
<? } else { ?>
	
		<div class="cm_stex_4">
		
		
	
		
		
		
		<!-- -->
			
	<div class="cm_stex_2">
				
			
		<div> 
		
		
		
		<div class="XX_msg31">

			 
			 
	<div class="cm_stex_22">
			<div>	<?=text($kdata['text']);?>   </div>
			<div> <span onclick="ShwMdlFRm(<?=$kdata['mid'];?>);" class="Xmsg1">more_horiz</span> </div>
		</div>				 
			 
			 
			 
			 
			 
			 
		</div>
				
				
				<div class="cm_stex_3">
					
					<?=when($kdata['when']);?> 

				
				</div>
		
		
		
		
		</div>
		

		
			</div>
			
			
			<!-- -->
	
		<div><?=$psusr1->photoRounded(48, 50, 50, 50);?></div>
		
				
		
			</div>
			
			
			
<? } ?>



		





	


<? } ?>







<div id="msg_ldt2"></div>


</div>	

	


<script>

function sbmt2(){
	console.log('triggered')
	//e.submit()
	//$("#send_msg").trigger("submit");
	
	//$("#send_msg").trigger('submit')
	
	
	var ss1 =  document.querySelector('#send_msg')
	ss1.submit();

	
	event.preventDefault()
	//return false;
}

 /* $("#send_msg").submit(function(event){
		//$("#send_msg").trigger("submit");

		//event.preventDefault()
 });*/


</script>



<div class="mob_mess3">
	
	
	<div class="fmEssQ6">


			<div class="fmEssQ6pl10">
					<div class="fmEssQ6pl10FlexGap">
						<span class="ico_gallery"><i class="fmEssQ5 fa-regular fa-face-grin-wink"></i></span>
						<span class="ico_emoji-happy"><i class="fmEssQ5 fa-solid fa-camera-retro"></i></span>
					</div>
			</div>


	</div>	

<div class="fmEssQ1 ">
	
	<div class="editable-container">
		<div class="cfm1_mess45 editable fmEssQ4"  onkeyup="RmWhiteSpacesbfandaf(this)" contenteditable="true" data-placeholder="Enter text here..."></div>
	</div>
	
</div>

	
<div class="fmEssQ3">
	
		<div class="fmEssQ3FlexGapWH">
			<span class="fmEssQ3FlexGapWHAsC"><i class="fmEssQ5 fa-solid fa-microphone"></i></span>
			<div class="cfm1_mess46 pointer" style="width: 100%;" onclick="func_sendMess('<?=$ank->id;?>')"> Post</div>
		</div>

	
	

</div>
	
	
</div>





<!-- starting the form -->

<!-- 

<form id="send_msg" class="mmss_gg2"  action="/mail/who.php?who=<?=$ank->id;?>" method="post" enctype=
"multipart/form-data">


<div class="foRm11" id="scrl">


<form action="?who=<?=$ank->id;?>" method="post" class="mob_mess6">

<div class="mob_mess3">
	

<div>			
	<div>
		<span class="frmSmileSvg">sentiment_satisfied</span>
	</div>
</div>	


<div class="mob_mess4">
	<textarea name="text" class="mob_mess5" minlength="2" required maxlength="512" placeholder="What do you think"></textarea>
</div>	


<div>
	<button name="send" value="1">
		Send
	</button>
</div>	


</div>
			

	
</form>	

-->		



	
	
	
	
	
<!-- </form> end of form -->	







</div>



<!-- end of mess -->

</div>



<!--
for scrolling


<button onclick="scrollToBottom('scrl');return false;">ee</button>

-->

<script>


    //  function scrollFunction() {
     //   const element = document.getElementById("endmsg2");
    //    element.scrollIntoView({ behavior: 'smooth', block: 'end'});
    //  }

//console.log(document.querySelectorAll(".messs_20")[0].scrollHeight)

//window.scrollTo(0, document.querySelectorAll(".messs_20")[0].scrollHeight);


	// element which needs to be scrolled to
//var element32 = document.querySelector("#endmsg2");

// scroll to element
//element32.scrollIntoView();


$(function(){

var element2 = document.querySelector("#displaying");

// scroll to element
element2.scrollTo(0,element2.scrollHeight);
	
	
	
})




function ShwMdlFRm(pstid = ''){

/*	
	
var user = {
	me: <?=$user['id'];?>,
	them: <?=$ank->id;?>,
}
	
	
*/	
	var s1321 = document.querySelectorAll("body")[0]	
	s1321.style.overflow = "hidden"
	
	
	var s1322 = document.querySelectorAll(".lr12_11")[0]
	
	s1322.style.display = "block"
	
	
	rptpsid.setAttribute('onclick',`window.location='/mail/report.php?id=${pstid}'`)
	dltpsid.setAttribute('onclick',`window.location='/mail/who.php?delete=${pstid}&who=${user.them}'`)
	

	

	
}



function Cnclmdl(){
	
	
	var s1321 = document.querySelectorAll("body")[0]	
	s1321.style.overflow = ""
	
	
	var s1322 = document.querySelectorAll(".lr12_11")[0]
	
	s1322.style.display = "none"
	
	

	
}



function showCnt_2(){

ntqpw++;
	
if (ntqpw<=hwmnch) { 
	console.log(ntqpw)	
	get_Data_contacts(ntqpw);	
}	
	


if (ntqpw == hwmnch) { 
	var ss21 = document.getElementById("whmnchleft")
	ss21.style.display = 'none';
}
	

		
}








function showCnt_23z(){

ntqpw_msg1z++;
	
if (ntqpw_msg1z<=hwmnchmsg_1) { 
	//console.log(ntqpw_msg1z)	
	get_Data_Messages(ntqpw_msg1z, user.them, user.me);	
}	
	


if (ntqpw_msg1z == hwmnchmsg_1) { 
	var ss21 = document.getElementById("whmnchleftmsg")
	ss21.style.display = 'none';
}
	

		
}




</script>





</body>
</html>

<?

?>
