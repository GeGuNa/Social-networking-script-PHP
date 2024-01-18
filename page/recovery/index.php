<?
 
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once '../../lib/vendor/phpmailer/phpmailer/src/PHPMailer.php';
include_once '../../lib/vendor/phpmailer/phpmailer/src/SMTP.php';
include_once '../../lib/vendor/phpmailer/phpmailer/src/Exception.php';

$mail = new PHPMailer();



if ($browser!= 'web') { 
	$whdt = 'width:100%;margin: 30px auto;';	
} else {
	$whdt = 'width:40%;margin: 60px auto;';	
}


include '../../inc/header.php';
title();
aut();
?>





<?
if (isset($_GET['nick']) && isset($_GET['sees'])){


$ss_sessionid = my_esc($_GET['sees']);
$ssnick1 = my_esc($_GET['nick']);


if (!validateUsername($_GET['nick']))Error('uups');

if (if_whitespace($_GET['nick']))Error('uups');
	
	
if (in_array($_GET['sees'], array('','0',0,null,'null',' '))) {
	
	
header("Location: /page/auth/");
exit;


} else if ($_GET['sees'] == '' || $_GET['sees'] == '0' || $_GET['sees'] == 0  || $_GET['sees'] == null || empty($_GET['sees'])) {
	
	
header("Location: /page/auth/");
exit;


} else if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` WHERE `nick` = ?", [$ssnick1]) == 0) {
	
	
header('location: /page/auth/');
exit;	


} else if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` WHERE `nick` = ? AND `sess` = ?", [$ssnick1, $ss_sessionid]) == 0) {

header('location: /page/auth/');
exit;	

} else 	 {

$usnick = $pdo->fetchOne("SELECT * FROM `user` WHERE `nick` = ?", [$ssnick1]);

if (isset($_POST['edit']))
{
	
if (strlen2($_POST['pass'])<6)$err='პაროლი არ უნდა იყოს 6 სიმბოლოზე ნაკლები';
if (strlen2($_POST['pass'])>32)$err='პაროლი არ უნდა იყოს 32 სიმბოლოზე მეტი';

if (strlen2($_POST['pass2'])<6)$err='პაროლი არ უნდა იყოს 6 სიმბოლოზე ნაკლები';
if (strlen2($_POST['pass2'])>32)$err='პაროლი არ უნდა იყოს 32 simboloze მეტი';

if ($_POST['pass']!=$_POST['pass2'])$err='ახალი პაროლი და განმეორებითი პაროლი არ ემთხვევა ერთმანეთს';

if (!isset($err))
{	
	
$ps = shif($_POST['pass']);


$pdo->query("UPDATE `user` SET `pass` = ?, `sess` = ? WHERE `id` = ?",  [$ps, '', $usnick['id']]);

$_SESSION['message'] = 'პაროლი წარმატებით შეიცვალა';
header('location: /index.php');
exit;
}
}


if (isset($err))
{
echo "<div class='err'>";
echo "$err";
echo "</div>";
}

//http://127.0.15.21:1236/password.php?nick=tttt&sees=a080933067de25b5147124db382806bd
?>


	
	
<div style="<?=$whdt;?>">
	
	
<div class="TLMnRGQQ">

<div>
	
	
	
	
<!-- -->
	

<strong class="mwbst2">Reset Password</strong>

<div class="mwbst1" >Reset Password with Doot.</div>



<div class="nav2 pdnrst1">
	
<form action="?nick=<?echo detect($_GET['nick']);?>&sees=<?echo detect($_GET['sees']);?>" method="post">




<div>
<label>Username</label>
<input type="text" disabled placeholder="Enter username" value="<?echo detect($usnick['nick']);?>" maxlength="32">
</div>


<div>
<label>New password</label>
<input type="text" placeholder="Enter passowrd" name="pass" value="" maxlength="32">
</div>

<div>
<label>Repeat new password</label>
<input type="text" placeholder="Repeat username" name="pass2" value="" maxlength="32">
</div>




<button type="submit" name="edit" value="Change">Change</button>



</form></div>


<div class="RGQWEMHm">
 <a href="/" class="სclknk1_1"> Home</a>
</div>

	
	
	
<!-- -->

</div>
</div>
</div>	
	
	





<?
include '../../inc/footer.php';
exit;

}
}



if (isset($_POST['nick']) && isset($_POST['mail']))
{
	
	
	

$ssnick1 = my_esc($_POST['nick']);	
$ssmail3 = my_esc($_POST['mail']);


	

if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))Error('Enter email correctly');

if (!validateUsername($_POST['nick']))Error('Unaccepted symbols in the fields');

if (if_whitespace($_POST['nick']))Error('Unaccepted symbols in the fields');
	

if (strlen2($_POST['nick'])>0 && $pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` WHERE `nick` = ?",[$ssnick1]) == 0)Error('In our database there is not such user');


if (strlen2($_POST['mail'])>0 && $pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` WHERE `ank_mail` = ?",[$ssmail3]) == 0)Error('Theres no such email in our database');


if (strlen2($_POST['mail'])>0 && $pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` WHERE `nick` = ? AND `ank_mail` = ?", [$ssnick1, $ssmail3]) == 0)Error('User was not found');


if (!isset($err))
{

$qreseq = ['-','_','@'];

$qreseq3=$qreseq[array_rand($qreseq)];

$usnick = $pdo->query("SELECT * FROM `user` WHERE `nick` = ?", [$ssnick1]);



$chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
$char332s = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$char33332s = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";

$qwwwwqqzz = substr(str_shuffle($chars),rand(0,10),rand(11,40));
$qwwwwqqzz2 = substr(str_shuffle($char332s),rand(0,10),rand(11,60));
$qwwwwqqzz3 = substr(str_shuffle($char33332s),rand(0,10),rand(11,30));

$sees2 = substr(str_shuffle($chars), 0, 7)."_".$qwwwwqqzz.$qwwwwqqzz3.str_shuffle($time).$qwwwwqqzz2.rand(1,1000000);


$mess = "<a href='https://$_SERVER[HTTP_HOST]/page/recovery/?nick=$usnick[nick]&sees=$sees2'> პაროლის შეცვლა </a>";


$message = 'გამარჯობა '.$usnick['nick'].', <br />
თქვენი მომხმარებლის პაროლის აღდგენა იქნა მოთხოვილი.  <br />
გადადით ქვემოთ მითითებულ ბმულზე რათა მოახდინოთ '.$mess.':  <br />
თუ ეს თქვენს მიერ არ იქნა მოთხოვნილი შეგიძლიათ უბრალოდ დააიგნოროთ ეს მოთხოვნა ... <br />
პაროლის შეცვლაზე მოთხოვნა იქნა განხორციელებული: '.get_ip_address().' IP\'ის მიერ ...
';


$title = "პაროლის აღდგენა";

$pdo->query("UPDATE `user` SET `sess` = ? WHERE `id` = ?", [$sees2, $usnick['id']]);


    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'fntmkbrdze@gmail.com';                     //SMTP username
    $mail->Password   = 'FntmkbrdzE_1252';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;  
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
    //$mail->Port       = 465;                                    

	$mail->CharSet = 'UTF-8';



    //Recipients
    $mail->setFrom('fntmkbrdze@gmail.com', 'პაროლის აღდგენა '.$_SERVER['HTTP_HOST']);
    $mail->addAddress($usnick['ank_mail'], $usnick['nick']);              	 //Name is optional
    $mail->addReplyTo('fntmkbrdze@gmail.com');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'პაროლის აღდგენა';
    $mail->Body = $message;
    //$mail->AltBody = 'non-html text';

    $mail->send();
	


/*

echo  '<div class="msg">ინფორმაცია გამოგზავნილი იქნა თქვენს მაილზე</div>';

*/


$_SESSION['message'] = 'ინფორმაცია გამოგზავნილი იქნა თქვენს მაილზე';
header('location: ?');
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



	


<div style="<?=$whdt;?>">
	
<div class="TLMnRGQQ">

<div>
	
	
	
	
<!-- -->

<strong class="mwbst2">Reset Password</strong>

<div class="mwbst1">Forgot Password</div>


<div class="dnpdn22_1">Enter your Email and instructions will be sent to you!</div>




<div class="nav2 pdnrst1">
	
	
<form action="?" method="post">
	
<div>
<input type="text" name="nick" placeholder="Enter username" value="" maxlength="32">
</div>


<div>
<input type="text" name="mail" placeholder="Enter email" value="" maxlength="32">
</div>

<button type="submit" name="save" value="Reset">Verify Mail</button>


</form>
</div>




<div class="kekeh1BottomSide1">

<div class="kekeh1bottqmqside2">
 <div onclick="window.location='/page/auth/';"> Login</div>
  <div onclick="window.location='/page/registration/';"> Create Account</div>
</div>


</div>

<!-- -->
	
	


</div>

</div>

</div>


	
	
	







<?
include '../../inc/footer.php';
?>
