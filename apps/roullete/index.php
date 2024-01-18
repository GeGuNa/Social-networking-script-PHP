<?php
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';
include '../../inc/header.php';



if (isset($_POST['specify']))
{
	
	
if (!isset($_POST['bid'])) {
	$_SESSION['message'] = 'ჰმმმ';
	header("location: ?");
	exit;
}

if (!is_numeric($_POST['bid']))
{
	$_SESSION['message'] = 'ჰმმმ';
	header("location: ?");
	exit;
}



	$bid = abs((int)$_POST['bid']);
	

	
	
if ($bid>1000){
	$_SESSION['message'] = 'მაქსიმალური ფსონი 1000 მონეტა';
	header("location: ?");
	exit;
}


if ($bid<10) {
	$_SESSION['message'] = 'მინიმალური ფსონი 10 მონეტა';
	header("location: ?");
	exit;
}


if ($user['balls']<$bid)
{
	$_SESSION['message'] = 'არ გაქვთ საკმარისი მონეტა';
	header("location: ?");
	exit;
}
	
	
	
header("location: ricxvi.php?bid=$bid");
exit;
	
	
}



title();
aut();
?>

<div class="nav2">
	ამ თამაშში თქვენ უნდა გამოიცნოთ რიცხვი (1 დან 36-მდე) ან/და ფერი (შავი ან წითელი)
</div>


	<div class="nav2">
		<form action='?' method='post'>
			ფსონი <br><input type="number" required min="10" max="1000" name="bid" value="" />
			<br><input type="submit" value="Start" name="specify" />
		</form>
	</div>

<div class="nav2">
	მაქსიმალური ფსონია 100 000 მონეტა
</div>
	
<div class="ftrwithborder">
	<a href="./">უკან</a>
</div>

<?
include '../../inc/footer.php';
?>
