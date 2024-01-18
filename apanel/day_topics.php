<?php

include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';





if ($user['level']<1){header("Location: /index.php?");exit;} 

if (isset($_POST['add']))
{

$qtxtq = my_esc($_POST['text']);
		
	
if (strlen2($qtxtq)<1)$_SESSION['err']='გზავნილი მიმიმუმ 3 სიმბოლო';
if (strlen2($qtxtq)>10000)$_SESSION['err']='გზავნილი მაქსმუმ 10000 სიმბოლო';






if (isset($_SESSION['err'])) {
header("Location: ?");
exit;	
} else {
	
	


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
   $img->writeImage($_SERVER['DOCUMENT_ROOT'].'/guest/topics/'.$flnmn);


   $img->clear(); 
   $img->destroy();  
  

} else {

$flnmn = '';
  	
	
}
	
	


$pdo->Exec("update `gossip_daily_topics` set `status` = 'close'");




$pdo->query("INSERT INTO `gossip_daily_topics` (`user`, `text`, `when`,`pfile`) VALUES (?,?,?,?)",[$user['id'], $qtxtq, $time, $flnmn]);





$_SESSION['message'] = 'დღის თემა წარმატებით დაემატა';

header("Location: ?");
exit;	
}

}


include '../inc/header.php';
title();
aut();


?>


<div class="hdnvtttl1">Add new daily topic</div>



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
 

<div class='nav2'>
	
<form method='post' action='?' enctype='multipart/form-data'>

<input style="display:none;" type="file" name="file1" id="imgInp" accept="image/*;capture=camera">

<div class="CPosTFleXjust3">
	

<div class="flex5">
	<?=$usojbid->photo3('48');?>
</div>	

<div class="flex95">

<textarea onfocus="setFcs1Btn()" onblur="setUnFcs1Btn()" id="bb_textarea" name="text" placeholder="What's on your mind?"></textarea>
<div id="dispEmojiPicker"></div>
</div>	
	
</div>




<div style="margin-top:10px;"> </div>


<div class="CPosTFleXjust">
	
<div>

<span class="Icons pointer" onclick="funRndrEmojis()" id="dsplEmojiChk">mood</span>
<span class="Icons pointer" onclick="SlPHt();">photo_camera</span>

<img src="/img/crs2.png" onclick="rMDfpHOT();" class="none pointer" id="flrmvd">


</div>	
	

	
	





<div>

<button id="okButton" type="submit" name="add" class="cznt21btn">
<span style="font-size:16px;">Send</span>
</button>



</div>	


</div>

 












</form></div>





<div id='smiles_frame'></div>



<div class="skscht_2">
	<img src="" id="blah" class="skscht_3">
</div>



<div class="cl_foot2">
 <a href="/apanel/">Admin</a>
</div>

<div class="cl_foot3">
 <a href="/">Home</a>
</div>




<?

include '../inc/footer.php';

?>
