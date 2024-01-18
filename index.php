<?php


include 'inc/db.php';
include 'inc/main.php';
include 'inc/functions.php';
include 'inc/user.php';
include 'inc/header.php';


title();
aut();
 


 
if (!isset($user)) { 
	redirection('/page/auth');
	exit;
}  
	


 

 







$online=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` WHERE `date_last` > ".intval($time-$set['online'])."");

//$qwqe = "abaa";
//$qw211 = "აბაა";

//echo text_size($qwqe)."<br/>".text_size($qw211)."<br/>";
//echo iconv_substr($qwqe, 0, 2, 'utf-8')."<br/>".iconv_substr($qw211, 0, 2, 'utf-8')."<br/>";


	$lkqwe123qlKNlk1 = 'onclick="window.location=\'/?pAlikeid=15&pAType=like\'"';
	$lkqwe123qlKNlk2 = 'onclick="window.location=\'/?pAlikeid=15&pAType=dislike\'"';
?>












	<onLineDivFlex>

		<div><a href='/online.php?'> Online <?=$online;?></a> </div>
		
	<?if ($user['level']>1): ?>	
			<div><a href="/page/admin/">Admin</a></div>
	<?endif;?>


	</onLineDivFlex>





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




<div class="ftrwithborder">
<form method="post" enctype="multipart/form-data" action="/info.php?id=<?=$usojbid->id;?>">


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
<option value="0" selected>For everyone</option>
<option value="1">For friends</option>
<option value="2">For no one</option> 
</select>

</div>



	
</div>



</form>
</div>





<div class="skscht_2">
	<img src="" id="blah" class="skscht_3">
</div>



<YmaYknoWsome>

<div class="Onldv222Pl2">

		<div> <strong>People you may know</strong></div>
		
		
			<div><a href="/page/users/">See all</a></div>
	

	</div>




<div class="YmaYknoWsome">

<?php




if ($browser == "web") {
	
if ($user['version'] != "web")	
	$verlhwm = 6;
else 	$verlhwm = 5;
	
	
} else {
	 $verlhwm = 2;
}


$query = $pdo->query("SELECT * FROM `user` WHERE 

`id` NOT IN (SELECT `who` FROM `friends` WHERE `user` = '".$user['id']."')  
and `id` NOT IN (SELECT `who` FROM `friends_requests` where `user` = '".$user['id']."') 
and  `id` NOT IN (SELECT `user` FROM `friends_requests` where `who` = '".$user['id']."') 
and `id` NOT IN (SELECT `who` FROM `user_ignor` where `user` = '".$user['id']."') 
and  `id` NOT IN (SELECT `user` FROM `user_ignor` where `who` = '".$user['id']."') 
and `id` != '".$user['id']."'
ORDER BY RAND() LIMIT $verlhwm");


while ($quser = $query->fetch()) {

$pq2 = new user($quser['id']);


$ifcmnfrs = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends` WHERE `user` = ? AND `who` in (select `who` from `friends` where user = ?)", [$user['id'], $pq2->id]);	

?>


	<div class="Ymqnknn">
		
		<div class="Photo_GallWd">
		<div class="pointer">
			
			<?=$pq2->PhotoFoRMayKnow('640');?>
			
			<div class="ymayKnowChld">
				<div> <div class="ymaYKNowFnT"> <?=$pq2->nick();?> </div>  </div>
			    <div> <div class="date"> <?=$pq2->age('en');?> </div>  </div>
			    
			    <? if ($ifcmnfrs>0):?>
			    <div> <div class="date"><?=$ifcmnfrs;?> mutual friend </div> </div>
			    <? endif; ?>
			    <div>
					<div class="ymamqwKnowLastBtn">
						<button onclick="window.location='/user/friends/create.php?send=<?=$pq2->id;?>'">Add friend</button>
					</div>
			    </div>
			</div>
			
			
		</div>
	</div>
		

</div>

<?php } ?>


</div>





</YmaYknoWsome>



<?

$qfeth1 = $pdo->query("SELECT * FROM `notes` ORDER BY `id` DESC LIMIT 5");

while($post = $qfeth1->fetch()) {

$author = new user($post['id_user']);


if (strlen2($post['image'])>0)
	$qlzd = '<img src="/page/notes/images/mini/'.detect($post['image']).'.jpg" style="width: calc(100%);"/>';
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


if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `notes_like` WHERE `id_user` = '".$user['id']."' AND `id_notes` = '".$post['id']."'")==1) { 
$plnkhr = 'material-symbols-outlined2 red';
} else {
$plnkhr = 'material-symbols-outlined';
}


if ($post['post_type'] == 'post')
	$purll1 = '/page/posts/';
else 
	$purll1 = '/page/notes/list.php'; 

?>



<div><a href="<?=$purll1;?>?id=<?=$post['id'];?>&act=heart"> <span class="<?=$plnkhr;?>">favorite</span> <?=$liked;?> </a> </div>

<div> <a href="<?=$purll1;?>?id=<?=$post['id'];?>"> <span class="material-symbols-outlined">chat</span> <?=$comments;?> </a> </div>

<div><span class="material-symbols-outlined">share</span> 0 </div>

</div>


</div>


	


</div>




  
<? } ?>
















<script>
	
	
window.onclick = function(event) {

	let cztel = event.target
	
  if (!cztel.matches('.Drpdnw') && !cztel.matches('.DrpdnwMain')) {
	  
    var dropdowns = document.getElementsByClassName("drpdmain");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
    	var openDropdown = dropdowns[i];
			openDropdown.style.display = 'none'
    }
    
    
    var dropdowns = document.getElementsByClassName("Drpdnw2");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
    	var openDropdown = dropdowns[i];
			openDropdown.style.display = 'none'
    }    
    
    
  }
}


	
	

function ShowThings(evs){
	
    var dropdowns = document.getElementsByClassName("Drpdnw2");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
    	var openDropdown = dropdowns[i];
			openDropdown.style.display = 'none'
    }    
    	

const l1 = evs.getAttribute("data_id") 

const l2 = document.querySelector("div[pstevents='"+l1+"']")
	

    var dropdowns = document.getElementsByClassName("drpdmain");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
		
     var openDropdown = dropdowns[i];
     
		if (openDropdown.getAttribute("pstevents") != l1){
			openDropdown.style.display = 'none'
		}
    }	

// /assets/fonts/static/NotoSansGeorgian/NotoSansGeorgian-Regular.ttf
//http://nbgl2q22.ge/assets/fonts/static/NotoSansGeorgian/NotoSansGeorgian-Regular.ttf
//data_id=

//pstevents=
	


if (l2.style.display == 'none') {
	l2.style.display="block"
} else if (l2.style.display == 'block') {
	l2.style.display="none"
} else {
	l2.style.display="none"
}

console.log(l2.style.display)
	
	
	//console.log(l2.style.display=='none')
	
}
	
	

</script>
 



<?
include_once 'inc/footer.php';
?>
