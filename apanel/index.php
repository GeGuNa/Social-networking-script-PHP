<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';


if ($user['level']!=6) {
	
	header("Location: /index.php");
	exit;
	
}



if (isset($_POST['srch'])) {

	if (strlen2($_POST['txt'])<1) {
		header("Location: ?");
		exit;	
	} 

	if (!in_array($_POST['scpr2'], array('0','1','2'))) {
		header("Location: ?");
		exit;	
	}	
	
$xqwezz2 = my_esc($_POST['txt']);	
	
	if ($_POST['scpr2'] == 0) {
		header("Location: index.php?search=$xqwezz2");
		exit;
	} else if ($_POST['scpr2'] == 1) {	
		header("Location: search.php?search=$xqwezz2");
		exit;	
	} else {
		header("Location: search_f.php?search=$xqwezz2");
		exit;
	}	
	
	
}



include '../inc/header.php';
title();
aut();


?>

	
<div class='nav2'>Searching for the comments:<br>
<form method='post' action='?'>


<input type='text' name='txt' placeholder="What are you looking for?" maxlength='1024' value=''>

<div class="cztrddivingflx2">
	
<div>

<select name="scpr2">
<option value="1" selected>Private message</option>
<option value="2">Photo comments</option>
</select>

</div>


<div><input type='submit' name="srch" value='Searching'></div>


</div>	
	
	


</form></div>



<div class="pstr2_22">


		
	<a class='fnt' href='hidden.php'> hidden list</a>
	<a class='fnt' href='admins.php'> Admins </a>
	<a class='fnt' href='day_topics.php'> Day topic </a>
	<a class='fnt' href='ip.php'> IP searching</a>	
	<a class='fnt' href='systems.php'> System settings</a>
	<a class='fnt' href='banlist.php'> Ban list</a>
	<a class='fnt' href='frozen.php'> Frozen users</a>
	<a class='fnt' href='photos.php'> Photo moderation</a>
	<a class='fnt' href='users.php'> User moderation</a>



</div>







<?

include '../inc/footer.php';
?>
