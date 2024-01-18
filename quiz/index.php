<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';

include '../inc/header.php';
title();
aut();

?>




<style>

.quiz_main {
	background:#fff;
	width:100%;
	padding:10px;
}

.quiz_main2 {
	border-top:1px solid #dadada;
	background:#fff;
	width:100%;
	padding:10px;
}

.quiz_main2 div:hover {
	background:#dadada;
	/*border-radius:40px;*/
}

.quiz_main2 > div {
	/*padding: 0 10px 7px 4px;*/
}

.cr_z2_z1 {
	background: var(--time-button);
	padding: 10px 10px 8px;
	margin-bottom:4px;
}

.cr_z2_z1 i {
	padding-right:4px;
	color: var(--button-color);
}

.cr_z2_z1 a {
	color: var(--header-bg-color);
}

.RGQWEMHm {
	border-top:1px solid #dadada;
	background:#fff;
	padding:10px;
}


</style>

<div class="quiz_main">
	
<div style="text-align:center;">
	<img style="max-width:20%;" src="/images/61051a9ed28511627724446.jpg">
	<br/>
	ვიქტორინა 
</div>	
	


</div>



<div class="quiz_main2">
	
<div>
	
<div class="cr_z2_z1"> 	
	<i class="fa-solid fa-gamepad"></i>  <a href="/user/info/settings.php">ვითამაშოთ</a>
		</div>
	</div>
<div>
	
	
<div class="cr_z2_z1"> 	 
	<i class="fa-solid fa-user"></i> 
<a href="/user/info/settings.php">მოთამაშეთა სია</a>
</div>	



</div>
</div>



<div class="RGQWEMHm">
 <a href="/"> მთავარზე</a>
</div>



<?
include '../inc/footer.php';
?>
