<?
 
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';


if (!isset($_GET['id'])){
	header('Location: /index.php');
	exit;
}


if (!is_numeric($_GET['id'])){
	header('Location: /index.php');
	exit;
}	


$nid = number($_GET['id']);


$notes = $pdo->fetchOne("SELECT * FROM `notes` WHERE `id` = ?", [$nid]);

if (!$notes)
{
	header('Location: /index.php');
	exit;
}


if (!isset($_GET['pid'])) {
	
$post = $pdo->fetchOne("SELECT * FROM `notes` WHERE `id` = ?", [$nid]);

$qbaduser = new user($post['id_user']);

}

if (isset($_GET['pid'])) {
	
	
if (!is_numeric($_GET['pid'])){
header('Location: /index.php');
exit;
}	


$pid = number(GET('pid'));

	
$post = $pdo->fetchOne("SELECT * FROM `notes_komm` WHERE `id` = ? and `id_notes` = ?", [$pid, $nid]);


if (!$post)
{
	header('Location: /index.php');
	exit;
}

$qbaduser = new user($post['id_user']);


	
}






include '../../inc/header.php';
title();
aut();



$msgspam = my_esc($post['msg']);
	
	

if (isset($_POST['send']))
{
	
$types = abs((int)$_POST['type']);
$msg = my_esc($_POST['text']);



$prlqwe = (isset($pid) ? "?id=$nid&pid=$pid" : "?id=$nid");


if (strlen2($msg)<3)Error('მინიმუმ 3 სიმბოლო', $prlqwe);
if (strlen2($msg)>500)Error('მაქსიმუმ 500 სიმბოლო', $prlqwe);
if ($types<1 || $types>8)Error('მიუთითეთ მიზეზი!!!', $prlqwe);





if (!isset($_SESSION['err'])) {
	

$qt2z = ['','Nudity','Frauding','Spam','Ad','Hate speech','Violence','Harrasment','Something else'];


$directlink = my_esc("/page/posts/?id=$notes[id]");


$pdo->query("INSERT INTO `reporting` (`user`, `why`, `whom`, `when`, `type`, `problem`, `where`) values(?, ?, ?, ?, ?, ?, ?)",[$user['id'], $msg, $qbaduser->id, $time, my_esc($qt2z[$types]), $msgspam, $directlink]);


header("Location: /page/posts/?id=".$notes['id']);
exit;
}



}

 


if (isset($err)) {
	
echo "<div class='err'>";
echo "$err";
echo "</div>";

}





?>





<div class='nav2'>
მცდარმა ინფორმაციამ შესაძლოა თქვენი ნიკის დაბლოკვა გამოიწვიოს. თუ ვინმე გაწუხებთ შეგიძლიათ მოათავსოთ შავ სიაში.
</div>



<div class='ftrwithborder'>
	
<? 


if (!isset($_GET['pid'])) {
	$frmurl  = "?id=$notes[id]";
} else {
	$frmurl  = "?id=".$notes['id']."&pid=$pid";
}

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
 <a href='/page/posts/?id=<?=$notes['id'];?>'>უკან</a>
</div>	
	
	
	

<?
include '../../inc/footer.php';
