<?php

defined('in') or die('uups');

?>

<? 

 

?>

</div>
			
</div>
			
			

			
<div class="mm_webflx_right">
	
	
	
<div class="ymnknow">



<div class="uu_bbcprq22">

<div class="ProfFlexIngDescAbout">About</div>


<div class="TextWhite"><?=detect($ank['bio']);?></div>

<div class="fmnttext">
	<div><span class="Icons">calendar_month</span> </div>
	<div>Born:  <b class="opct0_8"><?=Tdd_months($ank['birth_month']);?> <?=$ank['birth_day'];?>, <?=$ank['birth_year'];?></b></div>
</div>



<?

if ($ank['wed']>0) { 
	$relation = new user($ank['wed']);
	$tqsrptxt = "in a relationship with ".$relation->nick();
 } else {
	$tqsrptxt = "Single ";
 }; 
	
?>


<div class="fmnttext">
	<div><span class="Icons">favorite</span> </div>
	<div>Status: <b class="opct0_8"><?=$tqsrptxt;?></b></div>
</div>


<? if (strlen2($ank['ank_city'])>0) { ?>
<div class="fmnttext">
	<div><span class="Icons">home_pin</span> </div>
	<div>City:  <b class="opct0_8"><?=detect($ank['ank_city']);?></b></div>
</div>
<? } ?>



</div>
	

	
	
	
</div>	
	
	
	
	
	
	

	
	
	
	
	
	
	
	
	
	
	

	
<!-- friends -->



		

	
	
<div class="ymnknow">



<div class="ProfFlexIng"> 
	<div class="ProfFlexIngDesc">Friends</div>
	<div><a href="/user/friends/?id=<?=$ank['id'];?>">See all</a></div>
</div>

	
	
	
<div>

 

<!-- -->
<div class="ff_rght_mph">

<?
$kz_usmnkn2pht = $pdo->query("select * from friends where `user` = ? order by fid desc limit 9", [$ank['id']]);

while($phid = $kz_usmnkn2pht->fetch()) {
$ff_usrq11 = new user($phid['who']);
?>

			<div class="ff_22_33_flx">
						<?=$ff_usrq11->PhotoForProfile();?>
			</div>


<? } ?> 
 

</div>

 
<!-- -->




 


 



 





  


</div>
	   

	
	
	
</div>	
	
	
	
	
	
	

	
	
	
	
	
	
	
	

	

	





<!-- -->	
	
	
	
	



<!-- end of friends -->	
	
	
	
	
	
	
	
<!-- photos -->



		

	
	
<div class="ymnknow">



<div class="ProfFlexIng"> 
	<div class="ProfFlexIngDesc">Photos</div>
	<div><a href="/foto/my.php?id=<?=$ank['id'];?>">See all photos</a></div>
</div>

	
	
	
<div>

<!-- -->
<div class="ff_rght_mph">
<?
$kz_usmnkn2pht = $pdo->query("select * from gallery_foto where `id_user` = ? order by id desc limit 9",[$ank['id']]);

while($phid = $kz_usmnkn2pht->fetch()) {

?>


	<div class="ff_22_33_flx"> 
		<img onclick="window.location = '/foto/foto.php?id=<?=$phid['id'];?>';" src="/images/gallery/128/<?=$phid['photo_addr'];?>.jpg"> 	
	</div>




<? } ?> 
 

</div>

 
<!-- -->

 



 





  


</div>
	   

	
	
	
</div>	
	
	
	
	
	
	

	
	
	
	
	
	
	
	

	

	





<!-- -->	
	
	
	
	



<!-- end of photos -->	
	
	
	
	
	
		
	
	
	
	
	
		
	
	
	</div>		
			
	
	
	

	
	
	
	
			
		</div>
		

	

<br>








</html>
</body>











<script>
	
	
function Redirection(url) {
	return  window.location = url;
}	

/*
$("img").on("keypress", function(event){
	
if (event.keyCode == ) {
event.returnValue = false;
}	
	
	
	
	
});*/



/*
function ort() {
     // if { OR } OR | OR ~ are pressed. (Character codes 122-127)
     if ((event.keyCode >  32 && event.keyCode <  48) || 
   (event.keyCode >  57 && event.keyCode <  65) ||
   (event.keyCode >  90 && event.keyCode <  97) ||
   (event.keyCode > 122 && event.keyCode < 127)) {

        // prevent default behaviour
        event.preventDefault();

        return false;
    }
}*/

/*

$("img").click(function(){

var e = window.event

    e.stopPropagation();
    e.preventDefault();
    e.stopImmediatePropagation();
    return false;
});

$("img").contextmenu(function() {
	
var e = window.event 
var keyunicode = e.keyCode || e.charCode 
	
			//console.log(e.button)
	
	
            event.returnValue = false;
            event.keyCode = 0;
            
           
    e.stopPropagation();
    e.preventDefault();
    e.stopImmediatePropagation();
    return false;
            
            //return false;



});



*/

/*
var charfield=document.querySelector("img")

charfield.onkeydown = function(e){
	
var e=window.event || e
var keyunicode=e.charCode || e.keyCode
	
	
	//e.returnValue = false;
	console.log(keyunicode)
};
*/

/*
function WhichButton(event) {
  let text = "You pressed button: " + event.button;
  document.getElementById("demo").innerHTML = text;
}*/






//var cqwe = document.querySelector("a");

/*
$("a").click(function(){
	
	
	console.log('qweqwe')
	event.preventDefault()
	
	//return false;
	
});	
	*/
	
	
	

//console.log(document.querySelectorAll("img"))






/*
for (const a of document.querySelectorAll("a")) {
	
}*/


/*
$("a").click(function(){

var e = window.event


console.log('yeap')	
	
    e.stopPropagation();
    e.preventDefault();
    e.stopImmediatePropagation();
    return false;
});
*/
/*

var qweqw = document.querySelector("a")

qweqw.onlick = (event) => {
	
var e = window.event || event

console.log('yeap')	
	
    e.stopPropagation();
    e.preventDefault();
    e.stopImmediatePropagation();
    return false;	
};
*/


/*


*/





/*
without Selecting all elemnts you cant pass somethings without doing it directly and attaching it some function 
var imgs=document.querySelector("a")



imgs.onclick = function(e){
	
var e=window.event || e
var keyunicode=e.charCode || e.keyCode
	
	
	//e.returnValue = false;
	console.log(keyunicode)
	e.preventDefault()
	
	return false;
};
*/


</script>




<!--  czgstrpps  -->



 
 
