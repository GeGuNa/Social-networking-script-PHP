<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';








if (!isset($_GET['post_id']) || !isset($_GET['photo_id']))
{
header("Location: /");
exit;	
}	
	
if (!is_numeric($_GET['post_id']) || !is_numeric($_GET['photo_id'])) {
header("Location: /");
exit;
}	


$idofpst = filter($_GET['post_id']);
$idophtt = filter($_GET['photo_id']);



if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `gallery_foto` WHERE `id` = ?", [$idophtt]) == 0)
{
header("Location: /index.php");
exit;
}


$qphotoid=$pdo->fetchOne("SELECT * FROM `gallery_foto` WHERE `id` = ?",[$idophtt]);

if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` WHERE `id` = ?",[$qphotoid['id_user']]) == 0)
{
header("Location: /");
exit;
}




$qftdata=$pdo->fetchOne("SELECT * FROM `gallery_komm` WHERE `id` = ? and `id_foto` = ?",[$idofpst,$idophtt]);



if (!$qftdata)
{
header("Location: /");
exit;
}


$qbaduser = new user($qftdata['id_user']);


$set['title']='Reporting';
include '../inc/header.php';
title();
aut();



	
$msgspam = my_esc($qftdata['msg']);


	
if (isset($_POST['send']))
{
	
$types = abs((int)$_POST['type']);
$msg = my_esc($_POST['text']);




if (strlen2($msg)<3)Error('მინიმუმ 3 სიმბოლო', "?photo_id=$idophtt&post_id=$idofpst");
if (strlen2($msg)>500)Error('მაქსიმუმ 500 სიმბოლო', "?photo_id=$idophtt&post_id=$idofpst");
if ($types<1 || $types>8)Error('მიუთითეთ მიზეზი!!!', "?photo_id=$idophtt&post_id=$idofpst");



if (!isset($_SESSION['err'])) {
	

$qt2z = ['','Nudity','Frauding','Spam','Ad','Hate speech','Violence','Harrasment','Something else'];


$directlink = my_esc("/foto/foto.php?id=$idophtt");


$pdo->query("INSERT INTO `reporting` (`user`, `why`, `whom`, `when`, `type`, `problem`, `where`) values(?, ?, ?, ?, ?, ?, ?)",[$user['id'], $msg, $qbaduser->id, $time, my_esc($qt2z[$types]), $msgspam, $directlink]);



$_SESSION['message'] = 'საჩივარი გაიგზავნა'; 
header("Location: foto.php?id=".$idophtt."");
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




<div class='nav2'>
მცდარმა ინფორმაციამ შესაძლოა თქვენი ნიკის დაბლოკვა გამოიწვიოს. თუ ვინმე გაწუხებთ შეგიძლიათ მოათავსოთ შავ სიაში.
</div>



<div class='ftrwithborder'>
<form method='post' action='?photo_id=<?=$idophtt;?>&post_id=<?=$idofpst;?>'>

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
	<a href='foto.php?id=<?=$idophtt;?>'>უკან</a>
</div>


<?
include '../inc/footer.php';
?>
