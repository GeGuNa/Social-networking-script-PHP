<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';






if (!isset($_GET['id'])) {
header("Location: index.php");
exit;
}
	
if (!is_numeric($_GET['id'])) {
header("Location: index.php");
exit;
}	


$ank=get_user(nums($_GET['id']));

if (!$ank)
{
header("Location: /index.php");
exit;
}





include '../inc/header.php';
title();
aut();



/*-------------------close / ignor / off / block------------------*/


if ($user['id']!=$ank['id']) {


if_blocked($ank);

if_blacklisted($ank);

if_closed($ank);

}


/*-------------------end------------------*/






if (isset($_POST['give']))
{



$give = filter($_POST['balls']);
$tanxa = $give;


if ($tanxa>$user['balls'])$error="არ გაქვთ $tanxa მონეტა!";
if ($give<10000)$error="მინიმუმ 10000 მონეტა.";
if ($give==0)$error="მონეტების რაოდენობა მიუთითეთ!";
if (!is_numeric($_POST['balls']))$error="უუპს!";


if (!isset($error)) {
	
$kl123zz = filter($user['balls']-$tanxa);	
$kl123zz3 = filter($ank['balls']+$tanxa);	
		
	
$pdo->query("UPDATE `user` SET `balls` = ? WHERE `id` = ?", [$kl123zz, $user['id']]);
$pdo->query("UPDATE `user` SET `balls` = ? WHERE `id` = ?", [$kl123zz3, $ank['id']]);



user_activity($ank['id'], $user['id'], $time, "/", 'giving_balls', $user['id'], "$give");


$_SESSION['message'] = "წარმატებით აჩუქეთ $give მონეტა!";
header("Location: ?id=$ank[id]"); 
exit;

} else {
	
$_SESSION['message'] = $error;
header("Location: ?id=$ank[id]"); 
exit;	

}


}


$qz = new user($ank['id']);

?>


<div class="cqwe_zz_2t1cq1231">

	<div><?=$qz->photo3(48);?></div>
	
	<div class="us_gf_pd">
		<div><span><?=$qz->nick();?></span></div>
		<div class="czntkwqpprq">view profile</div>
	</div>

</div>





<div class="ClDataDiv">

<div class="ClDataDiv2">
You have <b><?echo $user['balls'];?></b> coins<br />
</div>

<div class="ClDataDiv2">
He has <b><?echo $ank['balls'];?></b> coins<br />
</div>

<div class="ClDataDiv3">
<form method='post' action='?id=<?echo $ank['id'];?>'>


<div class="pHPD1FRM1">	
	<input type="text" placeholder="How much?" name="balls" value="" size="32"> <br>	
</div>


<input type="submit" value="Give" name="give">


</form>
</div>
</div>


<div class="cl_foot3">
	<a href="/"> Home</a>
</div>



<?
include '../inc/footer.php';
?>
