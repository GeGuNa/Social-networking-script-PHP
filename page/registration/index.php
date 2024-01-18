<?
 
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';

if (isset($user)) {
	header("location: /");
	exit;
}


if ($browser!= 'web') { 
	$whdt = 'width:100%;margin: 60px auto;';	
} else {
	$whdt = 'width:40%;margin: 60px auto;';	
}



include '../../inc/header.php';
title();
aut();
?>


<?



if ($set['reg_select'] == 0)
{

echo "<div class='nav2'>";
echo "You cannot sign up for this time";
echo "</div>";

echo "<div class='nav2'><img src='/img/home.png'> <a href='index.php'>Home</a></div>";


include '../../inc/footer.php';
exit;
}





if (isset($_POST['save']))
{

$dgee=number($_POST['day']);
$tvee=number($_POST['month']);
$welii=number($_POST['year']);

$gender=my_esc($_POST['gender']);
$pass=shif($_POST['pass']);
$pswrdru=my_esc($_POST['pass']);
$ips1=my_esc($_SERVER['REMOTE_ADDR']);
$uas1=my_esc($_SERVER['HTTP_USER_AGENT']);
$niki=my_esc($_POST['nick']);


if ($dgee<1 || $dgee>31)Error('მიუთითეთ დღე სწორად!'); 
if ($tvee<1 || $tvee>12)Error('მიუთითეთ თვე სწორად!'); 
if ($welii<1960 || $welii>date("Y")+1)Error('დაფიქსირდა შეცდომა!');

if (!in_array($gender, array('female','male')))Error('მიუთითეთ სქესი'); 




if (strlen2($niki)<3)Error('ნიკი არუნდა იყოს 3 სიმბოლოზე ნაკლები');
if (strlen2($niki)>32)Error('ნიკი არუნდა იყოს 32 სიმბოლოზე მეტი');
if (strlen2($pswrdru)<6)Error('პაროლი არუნდა იყოს 6 სიმბოლოზე ნაკლები');
if (strlen2($pswrdru)>32)Error('პაროლი არუნდა იყოს 32 სიმბოლოზე მეტი');


if (!validateUsername($niki))Error('დაუშვებელი სიმბოლოები ნიკში');

if (if_whitespace($niki))Error('დაშორება არ უნდა იქნას გამოყენებული მეტსახელის დასაწყისში ან ბოლოში');



if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` WHERE `nick` = ?", [$niki]) > 0) {
	Error('ეს ნიკი დაკავებულია!');
}


if (!isset($_SESSION['err'])) {
	
$pdo->query("INSERT INTO `user` (`nick`, `pass`, `deciphered`, `birth_day`, `birth_month`, `birth_year`, `date_reg`, `date_last`, `gender`,`ua`,`ip`)
values(?,?,?,?,?,?,?,?,?,?,?)", [$niki,$pass,$pswrdru,$dgee,$tvee,$welii,$time,$time,$gender,$uas1,$ips1]);


$user = $pdo->query("SELECT * FROM `user` WHERE `nick` = ? AND `pass` = ?", [$niki, $pass])->fetch();


$dat_zq_a_1 = "hello".time();
$qz1_22 = str_shuffle("0123456789");
$qz2_23 = str_shuffle('1234567890qwertyuiop[];lkjhgfdsazxcvbnm-_|!@#$%^&*()');

$qz123z_zz = str_shuffle($dat_zq_a_1).str_shuffle($qz1_22).str_shuffle($qz2_23).time().time()-1252;
$cr12z_ = str_shuffle($qz123z_zz);
$qwez_g123_23 = hash('sha256', $cr12z_);


$qwe_zzw_tm1 = time();
$qwe_zzw_tm2 = hash('sha256', $qwe_zzw_tm1);


$pdo->query("INSERT INTO `user_sessions` (`user_id`, `when`, `hash`, `time_limit`,`date_auth`) values(?,?,?,?,?)", [$user['id'], $qwe_zzw_tm2, $qwez_g123_23, '1', $qwe_zzw_tm1]);


setcookie('sess_id', $qwez_g123_23, time()+86400*365, '/');
setcookie('when', $qwe_zzw_tm2, time()+86400*365, '/');


$_SESSION['sess_id'] = $qwez_g123_23;
$_SESSION['when'] = $qwe_zzw_tm2;


header('location: /index.php');
exit;
}


}


?>



<?


if ($browser!= 'web') { 
	$whdt = 'width:100%;margin: 60px auto;';	
} else {
	$whdt = 'width:40%;margin: 60px auto;';	
}

?>





<div style="<?=$whdt;?>">
	
	
<div class="TLMnRGQQ">

<div>
	
	
	
	
<!-- -->




<strong class="mwbst2">Register Account</strong>

<div class="mwbst1" >Get your free Doot account now.</div>




<div class="nav2 mrg1">


<form method='post' action='?'>




<div class="form-group">
	<label>Username</label>
	<input type="text" placeholder="Enter username" name="nick" maxlength="32">
</div>



<div class="form-group">
	<label>Password</label>
	<input type="password" placeholder="Enter password" name="pass" maxlength="32">
</div>





<div class="form-group">
	<label>Birth day</label>

    <select name="day">
	<option value="0" selected>Day</option>
    <?   for($dz = 1;  $dz < 32; $dz++) { ?>	
		<option value="<?=$dz;?>"><?=$dz;?></option>
	<? } ?>
	</select>
</div>
        

<div class="form-group">
	<label>Birth month</label>
  <select name="month">
			<option selected="" value="0">თვე</option>
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
            </select> 
</div>       
		
		
<div class="form-group">
<label>Birth Year</label>	
	
<select name="year">
	
	
	
<?
$ndate = date("Y")+1;


 for($dz = 1950;  $dz < $ndate; $dz++) { ?>	
<option value="<?=$dz;?>" <?=($dz == date("Y")  ? 'selected' : '');?>><?=$dz;?></option>
<? } ?>

</select>              


</div> 


<div class="form-group">
<label>Your gender</label>	
<select name="gender">
<option value="2">Select the gender</option>
<option value="male">Man</option>
<option value="female">Woman</option>
</select>

</div> 

<div style="margin-bottom:15px;">

By registering you agree to the Doot <a  href="/page/rules/">Terms of Use</a>

</div>

<button type="submit" style="margin-top:4px;" name="save" value="Sign up">Sign up</button>

</form> 





</div>  


<div class="RGQWEMHm">
 <a href="/" class="სclknk1_1"> Home</a>
</div>



<!-- -->
	
	


</div>

</div>

</div>













<?
include '../../inc/footer.php';
?>
