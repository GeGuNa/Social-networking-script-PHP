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
	
$gender=my_esc($_POST['gender']);


$dgee=filter($_POST['day']);
$tvee=filter($_POST['month']);
$welii=filter($_POST['year']);
$name=my_esc($_POST['ank_name']);
$surn=my_esc($_POST['ank_surname']);
$city=my_esc($_POST['ank_city']);
$mail=my_esc($_POST['ank_mail']);
$info=my_esc($_POST['bio']);
$intrst=my_esc($_POST['interests']);
$langs=my_esc($_POST['languages']);



if (strlen2($name)>64)$err='სახელი არ უნდა აღემატებოდეს 64 სიმბოლოს';
if (strlen2($surn)>64)$err='გვარი არ უნდა აღემატებოდეს 64 სიმბოლოს';
if (strlen2($city)>64)$err='ქალაქის ხაელი არ უნდა აღემატებოდეს 64 სიმბოლოს';

if (strlen2($intrst)>64)$err='ინტერესი არ უნდა აღემატებოდეს 124 სიმბოლოს';
if (strlen2($langs)>64)$err='ენები არ უნდა აღემატებოდეს 124 სიმბოლოს';





if (strlen2($_POST['ank_mail'])>0 && !filter_var($_POST['ank_mail'], FILTER_VALIDATE_EMAIL))$err='ემაილი არასწორად იქნა მითითებული';
if (strlen2($_POST['bio'])>512)$err='Bio არ უნდა აღემატებოდეს 512 სიმბოლოს';




if (!in_array($gender, array('female','male')))$err='დაფიქსირდა შეცდომა სქესსში'; 



if ($welii<1960 || $welii>date("Y"))$err='წელი არასწორად იქნა მითითებული'; 
if ($tvee<1 || $tvee>12)$err='თვე არასწორად იქნა მითითებული'; 
if ($tvee==1){if ($dgee<1 || $dgee>31)$err='დაფიქსირდა შეცდომა';}
if ($tvee==2){if ($dgee<1 || $dgee>28)$err='დაფიქსირდა შეცდომა';}
if ($tvee==3){if ($dgee<1 || $dgee>31)$err='დაფიქსირდა შეცდომა';}
if ($tvee==4){if ($dgee<1 || $dgee>30)$err='დაფიქსირდა შეცდომა';}
if ($tvee==5){if ($dgee<1 || $dgee>31)$err='დაფიქსირდა შეცდომა';}
if ($tvee==6){if ($dgee<1 || $dgee>30)$err='დაფიქსირდა შეცდომა';}
if ($tvee==7){if ($dgee<1 || $dgee>31)$err='დაფიქსირდა შეცდომა';}
if ($tvee==8){if ($dgee<1 || $dgee>31)$err='დაფიქსირდა შეცდომა';}
if ($tvee==9){if ($dgee<1 || $dgee>30)$err='დაფიქსირდა შეცდომა';}
if ($tvee==10){if ($dgee<1 || $dgee>31)$err='დაფიქსირდა შეცდომა';}
if ($tvee==11){if ($dgee<1 || $dgee>30)$err='დაფიქსირდა შეცდომა';}
if ($tvee==12){if ($dgee<1 || $dgee>31)$err='დაფიქსირდა შეცდომა';}

if (!isset($err)) {
	
$pdo->query("UPDATE `user` SET `ank_name` = ?,`gvari` = ?,`ank_city` = ?,`ank_mail` = ?,`bio` = ?,`gender` = ?,`birth_day` = ?,`birth_month` = ?,`birth_year` = ?,`interests` = ?,`languages` = ? WHERE `id` = ?", [$name, $surn, $city, $mail, $info, $gender, $dgee, $tvee, $welii, $intrst, $langs, $user['id']]);


$_SESSION['message'] = 'Been changed!';
header("Location: edit.php");
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





<div class="hdnvtttl1">Personal Information</div>

	<div class='ftrwithoutborder'>
		
		<div class="pHPD1FRM1">
			<?=$usojbid->photo50(640, 150, 150, '50%');?>
		</div>

	</div>


<div class='ftrwithborder'>
<form method='post' action='?'>



<div class="uSpaced">

	<div class="uSpaced50">
				
			<div class="pHPD1FRM1">
				<label class="pHPD1FRM2">Name</label>
				<input type='text' placeholder="Enter your name" name='ank_name' value='<?=detect($user['ank_name']);?>' maxlength='64' />
			</div>
	</div>

	<div class="uSpaced50">


<div class="pHPD1FRM1">
		<label class="pHPD1FRM2">Surname</label>
		<input type='text' placeholder="Enter your surname" name='ank_surname' value='<?=detect($user['gvari']);?>' maxlength='64' /><br />

	</div>


	</div>


</div>




<div class="uSpaced">



		<div class="uSpacedAround">
				<div class="pHPD1FRM1">
					<label class='pHPD1FRM2'>Day</label>
					<select name='day'>
					<?for ($dge=1;$dge<32;$dge++){ ?>
					<option value='<?=$dge;?>' <?=($user['birth_day']==$dge?" selected ":null);?>><?=$dge;?></option>
					<? } ?>
					</select> 
				</div>
		</div>

	<div class="uSpacedAround">
<div class="pHPD1FRM1">
		<label class='pHPD1FRM2'>Month</label>
		<select name='month'>

					<option value="1" <?=($user['birth_month']==1?" selected ":null);?>>January</option>
					<option value="2" <?=($user['birth_month']==2?" selected ":null);?>>February</option>
					<option value="3" <?=($user['birth_month']==3?" selected ":null);?>>March</option>
					<option value="4" <?=($user['birth_month']==4?" selected ":null);?>>April</option>
					<option value="5" <?=($user['birth_month']==5?" selected ":null);?>>May</option>
					<option value="6" <?=($user['birth_month']==6?" selected ":null);?>>June</option>
					<option value="7" <?=($user['birth_month']==7?" selected ":null);?>>July</option>
					<option value="8" <?=($user['birth_month']==8?" selected ":null);?>>August</option>
					<option value="9" <?=($user['birth_month']==9?" selected ":null);?>>September</option>
					<option value="10" <?=($user['birth_month']==10?" selected ":null);?>>October</option>
					<option value="11" <?=($user['birth_month']==11?" selected ":null);?>>November</option>
					<option value="12" <?=($user['birth_month']==12?" selected ":null);?>>December</option>



		</select>  
</div>



	</div>


	<div class="uSpacedAround">
<div class="pHPD1FRM1">
		<label class='pHPD1FRM2'>Year</label>
		<select name='year'>
		<? for ($weli=2014;$weli>1959;$weli--) { ?>
		<option value='<?=$weli;?>' <?=($user['birth_year']==$weli?" selected ":null);?>><?=$weli;?></option>
		<? } ?>
		</select>
		</div>

	</div>


</div>











<div class="pHPD1FRM1">
	
	<label class='pHPD1FRM2'>Gender<br></label>

	<select name='gender'>
		<option value="male" <?=($user['gender']=='male'?" selected ":null);?>>Male</option>
		<option value="female" <?=($user['gender']=='female'?" selected ":null);?> >Female</option>
	</select> 

</div>



<div class="pHPD1FRM1">
<label class='pHPD1FRM2'>City</label>
<input type='text' name='ank_city' placeholder="Your living city" value='<?=detect($user['ank_city']);?>' maxlength='64'>
</div>


<div class="pHPD1FRM1">
<label class='pHPD1FRM2'>Email</label>
<input type='text' name='ank_mail' placeholder="Email" value='<?=detect($user['ank_mail']);?>' maxlength='64'>
</div>


<div class="uSpaced">

<div class="uSpaced50">
		<div class="pHPD1FRM1">
		<label class='pHPD1FRM2'>Interested in</label>
		<input type='text' name='interests' placeholder="Interests" value='<?=detect($user['interests']);?>' maxlength='124'>
	</div>

</div>

	<div class="uSpaced50">
		<div class="pHPD1FRM1">
		<label class='pHPD1FRM2'>Languages</label>
		<input type='text' name='languages' value='<?=detect($user['languages']);?>' maxlength='124'>
		</div>
	</div>







</div>





<div class="pHPD1FRM1">
	<label class='pHPD1FRM2'>Bio</label>
	<textarea name="bio" maxlength="255"><?=detect($user['bio']);?></textarea>
</div>


<div class="bntpq1_2">
	<input type='submit' name='save' value='Save'>
</div>


</form>

</div>

<div class='ftrwithoutborder'><a href='/user/settings/'> Account settings</a></div><br>





<?

$ank = $user;

if ($user['version'] == 'wap')
	include '../../inc/footer.php';
else 
	include '../../inc/For_Profile.php';
	
	
?>
