<?
 
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';



if (!isset($_GET['pid'])){
header('Location: /index.php');
exit;
}


if (!is_numeric($_GET['pid'])){
header('Location: /index.php');
exit;
}	


$pid = number($_GET['pid']);


$rpostid = $pdo->fetchOne("SELECT * FROM `video_komm` WHERE `id` = ?",[$pid]);

if (!$rpostid)
{
	header('Location: /index.php');
	exit;
}


$qbaduser = new user($rpostid['id_user']);






include '../../inc/header.php';
title();
aut();



$msgspam = my_esc($rpostid['msg']);
	
	

if (isset($_POST['send']))
{
	
$types = abs((int)$_POST['type']);
$msg = my_esc($_POST['text']);




if (strlen2($msg)<3)Error('მინიმუმ 3 სიმბოლო', "?pid=$pid");
if (strlen2($msg)>500)Error('მაქსიმუმ 500 სიმბოლო', "?pid=$pid");
if ($types<1 || $types>8)Error('მიუთითეთ მიზეზი!!!', "?pid=$pid");




if (!isset($_SESSION['err'])) {
	

$qt2z = ['','Nudity','Frauding','Spam','Ad','Hate speech','Violence','Harrasment','Something else'];


$directlink = my_esc("/page/video/video.php?id=$rpostid[id_video]");


$pdo->query("INSERT INTO `reporting` (`user`, `why`, `whom`, `when`, `type`, `problem`, `where`) values(?, ?, ?, ?, ?, ?, ?)",[$user['id'], $msg, $qbaduser->id, $time, my_esc($qt2z[$types]), $msgspam, $directlink]);


$_SESSION['message'] = 'საჩივარი გაიგზავნა'; 
header("Location: video.php?id=".$rpostid['id_video']);
exit;
}


}

	if (isset($err)) {
		echo "<div class='err'>";
		echo "$err";
		echo "</div>";
	}



?>


<div class="TtlWzw221s fnt">Reporting</div>


<div class='nav2'>
მცდარმა ინფორმაციამ შესაძლოა თქვენი ნიკის დაბლოკვა გამოიწვიოს. თუ ვინმე გაწუხებთ შეგიძლიათ მოათავსოთ შავ სიაში.
</div>



<div class='ftrwithborder'>
	
<? 



$frmurl  = "?pid=$rpostid[id]";


?>	
	
<form  method='post' action='<?=$frmurl;?>'>

<label>Please select a problem:</label><br>
<select name='type'>
<option value='1' selected='selected'>Nudity</option>
<option value='2'>Frauding</option>
<option value='3'>Spam</option>
<option value='4'>Ad</option>
<option value='5'>Hate speech</option>
<option value='6'>Violence</option>
<option value='7'>Harassment</option>
<option value='8'>Something else</option>
</select><br>

<label>Comment</label>
<textarea name='text' placeholder="Report text here"></textarea><br>
<input value='გასაჩივრება' name='send' type='submit'>

</form></div>



<div class='ftrwithoutborder'>
	<a href='video.php?id=<?=$rpostid['id_video'];?>'>უკან</a>
</div>	
	

<?
	include '../../inc/footer.php';
?>
