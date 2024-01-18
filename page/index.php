<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';
include '../inc/header.php';
title();
aut();

$qz = new user($user['id']);


$visitors =  $pdo->queryFetchColumn("SELECT COUNT(*) FROM `visitors` WHERE `user` = ? AND `read` = '0'",[$user['id']]);


?>



<div class="cqwe_zz_2t1cq1231">

	<div><?=$qz->photo3(48);?></div>
	
	<div class="us_gf_pd">
		<div><span><?=$qz->nick();?></span></div>
		<div class="czntkwqpprq">view profile</div>
	</div>

</div>





<div class="pcstpgnr2z21dvt21">
<a href="/page/things.php">
	<span class="Icons">local_activity</span>  Gifts
</a>
</div>



<div class="pcstpgnr2z21dvt21">
<a href="/apps/">
	<span class="Icons">apps</span>  Apps
</a>
</div>


<div class="pcstpgnr2z21dvt21"> 
 <a href="/page/video/">
	<span class="Icons">play_circle</span>  Videos
</a>

</div>




<div class="pcstpgnr2z21dvt21"> 


 <a href="/page/users/">
	<span class="Icons">person_search</span>  Find friends
</a>


</div>





<div class="pcstpgnr2z21dvt21"> 
	
 <a href="/page/notes/">	
	<span class="Icons">newspaper</span>  Blogs
</a>

</div>





<div class="pcstpgnr2z21dvt21"> 
	
 <a href="/page/votes/">	
	<span class="Icons">ballot</span>  Votes
</a>

</div>



<div class="pcstpgnr2z21dvt21"> 
	
 <a href="/chat/">	
	<span class="Icons">chat</span> Chat
</a>

</div>









<div class="pcstpgnr2z21dvt21"> 

 <a href="/user/settings/">
	<span class="Icons">settings</span>  Settings
</a>

</div>


<div class="pcstpgnr2z21dvt21"> <i class="Icons">Public</i> Language</div>


<div class="pcstpgnr2z21dvt21"> 
	
 <a href="/page/support/">	
	<span class="Icons">help</span>  Help & support
</a>

</div>



<div class="pcstpgnr2z21dvt21"> 

 <a href="/exit.php">
	<span class="Icons">logout</span>  Logout
</a>

</div>
















	
	
	
	









<?
include '../inc/footer.php';

?>
