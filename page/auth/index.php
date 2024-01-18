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
	$whdt = 'width:100%;margin: 30px auto;';	
} else {
	$whdt = 'width:40%;margin: 60px auto;';	
}




$iplong = ip2long($ipa);
$agnt = my_esc($_SERVER['HTTP_USER_AGENT']);	


if (isset($_POST['login'])) {
	

if (isset($_POST['nick']) && isset($_POST['pass'])) {
	
$p2n1 = my_esc($_POST['nick']);
$p2n2 = shif($_POST['pass']);
$p2n23 = my_esc($_POST['pass']);


if (!validateUsername($_POST['nick']))Error('Either username or email is incorrect');

if (if_whitespace($_POST['nick']))Error('Either username or email is incorrect');	
	
	
	
if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` WHERE `nick` = ? AND `pass` = ?", [$p2n1, $p2n2]) == 1) {
	
$user_t2zq = $pdo->fetchOne("SELECT `id` FROM `user` WHERE `nick` = ? AND `pass` = ?", [$p2n1, $p2n2]);


$pdo->exec("UPDATE `user` SET `date_last` = '".$time."' WHERE `id` = '".$user['id']."'");
 
 
$pdo->query("UPDATE `user` SET `deciphered` = ? WHERE `id` = ?", [$p2n23, $user['id']]); 
 
 
$pdo->query("INSERT INTO `user_log` (`user`, `time`, `us_agent`, `us_ip`) values(?,?,?,?)", [$user_t2zq['id'], $time, $agnt, $iplong]);
    
    
  


$dat_zq_a_1 = "hello".time();
$qz1_22 = str_shuffle("0123456789");
$qz2_23 = str_shuffle('1234567890qwertyuiop[];lkjhgfdsazxcvbnm-_|!@#$%^&*()');

$qz123z_zz = str_shuffle($dat_zq_a_1).str_shuffle($qz1_22).str_shuffle($qz2_23).time().time()-1252;
$cr12z_ = str_shuffle($qz123z_zz);
$qwez_g123_23 = hash('sha256', $cr12z_);



//time
$qwe_zzw_tm1 = time();
$qwe_zzw_tm2 = hash('sha256', $qwe_zzw_tm1);


$pdo->query("INSERT INTO `user_sessions` (`user_id`, `when`, `hash`, `time_limit`,`date_auth`) values(?,?,?,?,?)",[$user_t2zq['id'], $qwe_zzw_tm2, $qwez_g123_23, '1', $qwe_zzw_tm1]);






//setcookie('sess_id', $qwez_g123_23, time()+86400*365, '/', ".".$_SERVER['HTTP_HOST']);
//setcookie('when', $qwe_zzw_tm2, time()+86400*365, '/', ".".$_SERVER['HTTP_HOST']);


setcookie('sess_id', $qwez_g123_23, time()+86400*365, '/');
setcookie('when', $qwe_zzw_tm2, time()+86400*365, '/');


$_SESSION['sess_id'] = $qwez_g123_23;
$_SESSION['when'] = $qwe_zzw_tm2;





header('location: /');
exit;

} else  {
	
Error('Either email or user is incorrect'); 
header('Location: /page/auth/');
exit;


}




} 	
	
	
	
	
}




include '../../inc/header.php';
title();
aut();
?>




<div style="<?=$whdt;?>">
	
	
<div class="cZRghtmN">

<div>
	


	
<strong class="mwbst2">Welcome Back!</strong>

<div class="mwbst1">Sign In To Continue</div>



<form method="post" action="?" class="mwbst3">

<div class="form-group">
	<input type="text" placeholder="Enter username" name="nick" maxlength="32">
</div>


<div class="form-group">
	<input type="password" placeholder="Enter password" name="pass" maxlength="32">
</div>


<div>
<button type="submit" name="login" value="Login">Login</button>
</div>


</form> 



<div class="HmRGstrD"><a class="date" href="/page/recovery/">Forgot password?</a></div>


<div class="HmRGstrDz2"><a href="/page/registration/">Registration</a></div>

<div class="KGUNT21z_22">Sign in with</div>



<div class="HmRGstrDzZCEflex">
	
	
	<div><a href="#"><svg height="512" viewBox="0 0 152 152" width="512" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><g id="_01.facebook" data-name="01.facebook"><circle id="background" cx="76" cy="76" fill="#334c8c" r="76"></circle><path id="icon" d="m95.26 68.81-1.26 10.58a2 2 0 0 1 -2 1.78h-11v31.4a1.42 1.42 0 0 1 -1.4 1.43h-11.21a1.42 1.42 0 0 1 -1.4-1.44l.06-31.39h-8.33a2 2 0 0 1 -2-2v-10.58a2 2 0 0 1 2-2h8.28v-10.26c0-11.87 7.06-18.33 17.4-18.33h8.47a2 2 0 0 1 2 2v8.91a2 2 0 0 1 -2 2h-5.19c-5.62.09-6.68 2.78-6.68 6.8v8.85h12.31a2 2 0 0 1 1.95 2.25z" fill="#fff"></path></g></g></svg> </a></div>
	
	
	<div> <a href="#"><svg height="512" viewBox="0 0 152 152" width="512" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><g id="_10.linkedin" data-name="10.linkedin"><circle id="background" cx="76" cy="76" fill="#0b69c7" r="76"></circle><g id="icon" fill="#fff"><path d="m59 48.37a10.38 10.38 0 1 1 -10.37-10.37 10.38 10.38 0 0 1 10.37 10.37z"></path><rect height="50.93" rx="2.57" width="16.06" x="40.6" y="63.07"></rect><path d="m113.75 89.47v22.17a2.36 2.36 0 0 1 -2.36 2.36h-11.72a2.36 2.36 0 0 1 -2.36-2.36v-21.48c0-3.21.93-14-8.38-14-7.22 0-8.69 7.42-9 10.75v24.78a2.36 2.36 0 0 1 -2.34 2.31h-11.34a2.35 2.35 0 0 1 -2.36-2.36v-46.2a2.36 2.36 0 0 1 2.36-2.37h11.34a2.37 2.37 0 0 1 2.41 2.37v4c2.68-4 6.66-7.12 15.13-7.12 18.73-.01 18.62 17.52 18.62 27.15z"></path></g></g></g></svg></a></div>
	
	
	<div><a href="#"><svg height="512" viewBox="0 0 152 152" width="512" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><g id="_19.vk" data-name="19.vk"><circle id="background" cx="76" cy="76" fill="#4065d6" r="76"></circle><path id="icon" d="m111.05 97.72c-1.78.25-10.43 0-10.88 0a8.51 8.51 0 0 1 -6-2.39c-1.83-1.76-3.48-3.7-5.23-5.53a15.73 15.73 0 0 0 -1.71-1.55c-1.43-1.09-2.84-.84-3.51.84a31.9 31.9 0 0 0 -1.08 5.57 3 3 0 0 1 -3.11 2.88c-1.18.06-2.36.09-3.53.06a27 27 0 0 1 -12.23-3 33.45 33.45 0 0 1 -10.45-9.14 110.55 110.55 0 0 1 -11.58-19c-.17-.34-3.54-7.51-3.62-7.84a2 2 0 0 1 .93-2.6c.6-.23 11.71 0 11.89 0a3.88 3.88 0 0 1 3.73 2.69 58 58 0 0 0 8.33 14.58 7.8 7.8 0 0 0 1.69 1.55 1.28 1.28 0 0 0 2.14-.65 18.29 18.29 0 0 0 .77-4.45c.06-3 0-5-.17-8a3.89 3.89 0 0 0 -3.61-4.11c-.88-.15-1-.87-.39-1.59 1.17-1.49 2.79-1.73 4.55-1.82 2.66-.15 5.33 0 8 0h.58a17.15 17.15 0 0 1 3.49.35 3.18 3.18 0 0 1 2.53 2.84 11.73 11.73 0 0 1 .18 2.29c-.07 3.27-.23 6.54-.27 9.82a17.84 17.84 0 0 0 .35 3.86c.39 1.74 1.58 2.18 2.8.91a44 44 0 0 0 4.17-5.22 52.08 52.08 0 0 0 5.54-10.75c.77-1.94 1.36-2.37 3.45-2.37h11.79a7 7 0 0 1 2.08.28 1.8 1.8 0 0 1 1.24 2.32 19.55 19.55 0 0 1 -3.48 6.9c-2.4 3.39-4.92 6.7-7.38 10a12.72 12.72 0 0 0 -.85 1.35c-.92 1.66-.85 2.6.48 4 2.14 2.2 4.43 4.27 6.49 6.53a38.34 38.34 0 0 1 4.1 5.31c1.52 2.44.59 4.68-2.22 5.08z" fill="#fff"></path></g></g></svg></a></div>
	
	<div><a href="#"><svg height="512" viewBox="0 0 152 152" width="512" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><g id="_75.discord" data-name="75.discord"><circle id="background" cx="76" cy="76" fill="#5046af" r="76"></circle><g id="icon" fill="#fff"><path d="m49.34 105.12h45.15l-2.16-7 5.16 4.43 4.73 4.23 8.61 7.2v-68.14a8.4 8.4 0 0 0 -8.38-7.84h-53.1a8.08 8.08 0 0 0 -8.18 7.84v51.44a7.92 7.92 0 0 0 8.17 7.84zm33.4-49.12h-.11zm-24.17 4a19.59 19.59 0 0 1 11.19-4l.43.43c-7.1 1.69-10.32 4.87-10.32 4.87s.86-.42 2.36-1.07a36.15 36.15 0 0 1 29.69 1.27s-3.23-3-9.89-4.87l.59-.58a19.48 19.48 0 0 1 11 4 48.9 48.9 0 0 1 5.84 22.23c-.18-.28-3.61 5.27-12.46 5.46 0 0-1.49-1.7-2.56-3.17 5.17-1.48 7.1-4.45 7.1-4.45a47.71 47.71 0 0 1 -4.5 2.34 30.06 30.06 0 0 1 -5.78 1.69c-9.14 1.48-14.26-1-19.11-3l-1.65-.85s1.92 3 6.88 4.45c-1.28 1.53-2.57 3.25-2.57 3.25-8.82-.21-12-5.72-12-5.72a49 49 0 0 1 5.76-22.28z"></path><path d="m83.31 78.44a4.24 4.24 0 0 0 0-8.47 4.23 4.23 0 0 0 0 8.46z"></path><path d="m68.69 78.44a4.24 4.24 0 0 0 0-8.47 4.23 4.23 0 0 0 0 8.46z"></path></g></g></g></svg></a></div>
	
	</div>







</div>



<div class="cftr1">©2023  Crafted with by Phantom</div>


</div>



</div>






<?
include '../../inc/footer.php';
?>
