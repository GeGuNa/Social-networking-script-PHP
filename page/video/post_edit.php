<?php

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

//$note = $pdo->fetchOne("SELECT * FROM `notes` WHERE `id` = ?", [$nid]);
//$post = $pdo->fetchOne("SELECT * FROM `notes_komm` WHERE `id` = ? and `id_notes` = ?", [$pid, $note['id']]);


$pid = number(GET('pid'));

$post = $pdo->fetchOne("SELECT * FROM `video_komm` WHERE `id` = ?",[$pid]);
$video = $pdo->fetchOne("SELECT * FROM `video` WHERE `id` = '".$post['id_video']."'");

	

if (!$video || !$post)
{
	header('Location: /index.php');
	exit;
}


$author = get_user($video['id_user']);
$pauthor = get_user($post['id_user']);


if (!($user['id'] == $author['id'] || $user['id'] == $pauthor['id'] || $user['level'] > 0 && $user['level']>=$author['level'] || $user['level']>=5)) {

	header('Location: /index.php');
	exit;
}





include '../../inc/header.php';
title();
aut();




if ( isset($_POST['change']))
{
	
	
$text = my_esc($_POST['text']);



if (strlen2($text)>1024)Error('ტექსტი არ უნდა აღემატებოდეს 1024 სიმბოლოს', "?pid=$pid");
if (strlen2($text)<3)Error('ტექსტი არ უნდა იყოს 3 სიმბოლოზე ნაკლები', "?pid=$pid");
 



if (!isset($_SESSION['err'])) {
		
$pdo->query("UPDATE `video_komm` SET `msg` = ? WHERE `id` = ? and `id_video` = ?", [$text, $pid, $video['id']]);

header("Location: video.php?id=".$video['id']);
exit;

}

}




?>




<div class="cztfrprstrng2">

<div><a href="video.php?id=<?=$video['id'];?>"><img src="/pics/9kN.webp" width="20"></a></div>

<div>ტექსტის რედაქტირება</div>

</div>









<div class='ftrwithborder'>
<form method='post' action='?pid=<?=$pid;?>'>


<label class="form-label">ტექსტი (1024 სიმბოლო):</label>
<textarea class="input-txt" rows="4" cols="4" name="text" minlength="3" maxlength="1024" required placeholder="What's on your mind?"><?php echo detect($post['msg']);?></textarea> 
 



<input class="button wide_button fb_buttoni" name="change" type="submit" value="Change">


</form>
</div>

<div class="ftrwithoutborder">
	<a href='video.php?id=<?=$video['id'];?>'>Back</a>
</div>


<?

include '../../inc/footer.php';

?>
