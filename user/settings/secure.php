<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';



include '../../inc/header.php';
title();
aut();




if (isset($_POST['save']))
{


$npass = my_esc(shif($_POST['pass'])); //new 
$opass = my_esc($_POST['opass']); // old
$rpass = my_esc($_POST['rpass']); //repeating

$qnpass = my_esc($_POST['pass']); //new pass without encoding/cyphering


if ($user['pass'] != shif($opass))$err='Old password is incorrect';

if ($user['pass'] == $npass)$err='New password cannot be same as the old one';

if ($qnpass != $rpass)$err='New and repeating password ain\'t the same';



if (strlen2($qnpass)<6)$err='Password must consist of 6 letters minimum';
if (strlen2($qnpass)>32)$err='Password must not be more than 32 letters';

if (strlen2($opass)<6)$err='Repeating Password must be more than 6 letters';
if (strlen2($opass)>32)$err='Repeating Password must not be more than 32 letters';

if (strlen2($rpass)<6)$err='Repeating Password must not be less than 6 letters';
if (strlen2($rpass)>32)$err='Repeating Password must not be greather than 32 letters';







if (!isset($err)) {
	
$pdo->query("UPDATE `user` SET `pass` = ? WHERE `id` = ?", [$npass, $user['id']]);

//mysql_query("UPDATE `user` SET `deciphered` = '".my_esc($_POST['pass'])."' WHERE `id` = '".abs((int)$user['id'])."'");

$_SESSION['message'] = 'Has been changed';

} else {
	
$_SESSION['message'] = $err;	
	
}

header("Location: secure.php");
exit;	


}



if (isset($err))
{
echo "<div class='err'>";
echo "$err";
echo "</div>";
}

?>

<div class="cztfrprstrng2">

<div><a href="/user/settings/"><img src="/pics/9kN.webp" width="20"></a></div>

<div>Password</div>

</div>



<div class='ftrwithborder'>
	
<form method='post' action='secure.php'>
	
	

	<div class="uSpaced">

		<div class="uSpaced50">

			<div class="pHPD1FRM1">
				<label class="pHPD1FRM2">New Password</label>
				<input type='text' name='pass' placeholder='Current Password' value='' required min='6'  maxlength='32'>
			</div>

		</div>


		<div class="uSpaced50">

			<div class="pHPD1FRM1">
				<label class="pHPD1FRM2">Repeat Password</label>
				<input type='text' name='rpass' placeholder='Repeat Password' value='' required min='6'  maxlength='32'>
			</div>

		</div>

	</div>


	<div class="pHPD1FRM1">
		<label class="pHPD1FRM2">Old Password</label>
		<input type='text' name='opass' placeholder='Enter old password' value='' required min='6'  maxlength='32'>
	</div>




<input type='submit' name='save' value='Change password'>


</form>
</div>


<div class="ftrwithoutborder">
	<a href="/user/settings/"> Account settings </a>
</div>



<?
include '../../inc/footer.php';
?>
