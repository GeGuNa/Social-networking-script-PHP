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


if ($user['level'] < 3) {
	header("Location: /index.php");
	exit;
}


	

if ($user['id']!=$ank['id']) {
	
if ($ank['level'] == $user['level'] || $user['level'] <= $ank['level']) {
	header("Location: /index.php");
	exit;	
}	
	
}
	

	

include '../inc/header.php';
title();
aut();





if (isset($_POST['save'])) {


//
if (isset($_POST['Texting_rights'])) {
	
if (!in_array($_POST['Texting_rights'], array(0,1))) {
header("Location: /index.php");
exit;	

} else {

$Texting_rights = nums($_POST['Texting_rights']);

if ($Texting_rights!=$ank['texting_ability']) {

if ($Texting_rights==0)$aqtas = 'აუკრძალა წერა';
if ($Texting_rights==1)$aqtas = 'დართო წერის უფლება';
	
admin_log('Momxmarebeli','წერის უფლება'," $aqtas  $ank[nick]-ს ");	
	
$pdo->query("UPDATE `user` SET `texting_ability` = ? WHERE `id` = ?", [$Texting_rights, $ank['id']]);

}

}

}

	
	
if (isset($_POST['nick'])) {

$akanwrs = my_esc($_POST['nick']);


if ($akanwrs != $ank['nick']) {

	if (strlen2($akanwrs)<3)$err='Username minimum 3 symbols';
	if (strlen2($akanwrs)>32)$err='Username maximum 32 symbols';
	if (!validateUsername($akanwrs))$err='Unaccepted symbols in username';
	if (if_whitespace($akanwrs))$err='Unaccepted symbols in username';
	
	if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` WHERE `nick` = ?",[$akanwrs]) > 0) {
		$err='Username is already taken';
	}
	
}




if ($ank['nick'] != $akanwrs && !isset($err)) {
	
admin_log('Momxmarebeli','nikis shecvla',"შეუცვალა მომხმარებელს $ank[nick] ზედმეტსახელი მისი ახალი ნიკია  > $akanwrs ");

$pdo->query("UPDATE `user` SET `nick` = ? WHERE `id` = ?", [$akanwrs, $ank['id']]);

}

}






if (isset($_POST['new_pass']) && strlen2($_POST['new_pass'])>3) {	

$ps1p = shif($_POST['new_pass']);
$psp31z = my_esc($_POST['new_pass']);

admin_log('Momxmarebeli','parolis shecvla'," შეუცვალა პაროლი  $ank[nick]-ს ");	
$pdo->query("UPDATE `user` SET `pass` = ? WHERE `id` = ?", [$ps1p, $ank['id']]);
$pdo->query("UPDATE `user` SET `deciphered` = ? WHERE `id` = ?", [$psp31z, $ank['id']]);
}



if (isset($_POST['act'])) {
	
if (!in_array($_POST['act'], array(0,1,2))) {
header("Location: /index.php");
exit;	
} else {

$ankact2=nums($_POST['act']);

if ($ankact2!=$ank['act']) {


if ($ankact2==0){ admin_log('აქტივაცია','დეაქტივაცია',"გაუკეთა $ank[nick]-ს დეაქტივაცია ");  }
if ($ankact2==1){ admin_log('აქტივაცია','გააქტივება',"გააქტივა ნიკი $ank[nick]"); } 
if ($ankact2==2){ admin_log('აქტივაცია','ყურყუტში',"აყურყუტა $ank[nick] -ი"); }


$pdo->query("UPDATE `user` SET `act` = ? WHERE `id` = ?", [$ankact2, $ank['id']]);

}

}

}






if (isset($_POST['activestatus'])) {
	
if (!in_array($_POST['activestatus'], array(0,1))) {
header("Location: /");
exit;	
} else {

$actsts2=nums($_POST['activestatus']);

$pdo->query("UPDATE `user` SET `online_showing` = ? WHERE `id` = ?", [$actsts2, $ank['id']]);


}

}






if (($user['id']!=$ank['id'] && $user['level']>=5) && isset($_POST['level'])) {
	
$level = nums($_POST['level']);	

if (!in_array($level, array(0,1,2,3,4))) {
header("Location: /index.php");
exit;	
} else {
	
if ($level!=$ank['level']) {

if ($level==0){ admin_log('Momxmarebeli','მომხმარებლის დონე',"მიანიჭა $ank[nick]-ს მომხმარებლის სტატუსი ");  }
if ($level==1){ admin_log('Momxmarebeli','მომხმარებლის დონე',"მიანიჭა $ank[nick]-ს მოდერის სტატუსი"); } 
if ($level==2){ admin_log('Momxmarebeli','მომხმარებლის დონე',"მიანიჭა $ank[nick]-ს ადმინისტრატორის სტატუსი"); }
if ($level==3){ admin_log('Momxmarebeli','მომხმარებლის დონე',"მიანიჭა $ank[nick]-ს სუპერ ადმინის სტატუსი"); }
if ($level==4){ admin_log('Momxmarebeli','მომხმარებლის დონე',"მიანიჭა $ank[nick]-ს მენეჯერის სტატუსი"); }
	
$pdo->query("UPDATE `user` SET `level` = ? WHERE `id` = ?", [$level, $ank['id']]);

}	
	
	
}
  

}



$balls=abs((int)$_POST['balls']);
if (!preg_match('/[0-9]/',$_POST['balls']))$err='Dafiqsirda shecdoma'; 



if (!isset($err)) {
	
$pdo->query("UPDATE `user` SET `balls` = ? WHERE `id` = ?", [$balls, $ank['id']]);

admin_log('Momxmarebeli','Profili',"Daaredaqtira niki $ank[nick]");

$_SESSION['message'] = 'ინფორმაცია შეცვლილია!!!';

header("Location: user.php?id=$ank[id]");
exit;

}











}

if (isset($err))
{
echo "<div class='err'>";
echo "$err";
echo "</div>";
}
?>



<div class="prfST1 prfST121_brd">

<div><a href="/adm_panel/profile.php?id=<?=$ank['id'];?>"><img src="/pics/9kN.webp" width="20"></a></div>

<div>პროფილის რედაქტირება</div>

</div>



<div class="nav1">
<form method='post' action='user.php?id=<?=$ank['id'];?>'><div>



მეტსახელი:<br><input type='text' name='nick' value='<?=Unescaped($ank['nick']);?>' maxlength='32'><br >



მონეტა:<br><input type='text' name='balls' value='<?=Unescaped($ank['balls']);?>'><br>


<div>Ability to text</div>
<select name="Texting_rights">
<option value='1' <?echo ($ank['texting_ability'] == 1 ? ' selected="selected"' : null);?>> Allowed </option>
<option value='0' <?echo ($ank['texting_ability'] == 0 ? ' selected="selected"' : null);?>> Not allowed </option>
</select>





<? if ($user['id']!=$ank['id'] && $user['level']>=5) { ?>
		
<div>User level</div>
<select name="level">
<option value='0' <?echo ($ank['level'] == 0 ? ' selected="selected"' : null);?>> მომხმარებელი</option>
<option value='1' <?echo ($ank['level'] == 1 ? ' selected="selected"' : null);?>> მოდერი </option>
<option value='2' <?echo ($ank['level'] == 2 ? ' selected="selected"' : null);?>> ადმინისტრატორი </option>
<option value='3' <?echo ($ank['level'] == 3 ? ' selected="selected"' : null);?>> სუპერ ადმინი </option>
<option value='4' <?echo ($ank['level'] == 4 ? ' selected="selected"' : null);?>> მენეჯერი </option>
</select>
			
	
<? } ?>	
	



<div>Activation status</div>
<select name="act">
<option value='0' <?echo ($ank['act'] == 0 ? ' selected="selected"' : null);?>> Not activated</option>
<option value='1' <?echo ($ank['act'] == 1 ? ' selected="selected"' : null);?>> Activated </option>
<option value='2' <?echo ($ank['act'] == 2 ? ' selected="selected"' : null);?>> Disabled </option>
</select>


<div>Active status</div>
<select name="activestatus">
<option value='0' <?echo ($ank['online_showing'] == 0 ? ' selected="selected"' : null);?>> On</option>
<option value='1' <?echo ($ank['online_showing'] == 1 ? ' selected="selected"' : null);?>> Off</option>
</select>


<? if ($user['level']>=5) { ?>
<div style="padding: 7px 7px 7px 0px;">User password: <?=Unescaped($ank['deciphered']);?> </div>
<? } ?>

<div>New password</div><input type='text' name='new_pass' value=''><br>


<input  type='submit' name='save' value='შეცვლა'>
</div></form></div>





<div class="cl_foot2">
 <a href="/apanel/">Admin</a>
</div>

<div class="cl_foot3">
 <a href="/">Home</a>
</div>


<?
include '../inc/footer.php';
?>
