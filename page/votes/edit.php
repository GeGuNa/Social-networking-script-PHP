<?php

include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';


if (!isset($_GET['id'])){
	header('Location: index.php');
	exit;
}


if (!is_numeric($_GET['id'])){
	header('Location: /');
	exit;
}	


$pid = filter($_GET['id']);

$post = $pdo->fetchOne("SELECT * FROM `poll_comments` WHERE `id` = ?",[$pid]);
$poll = $pdo->fetchOne("SELECT * FROM `poll` WHERE `id` = '".$post['poll']."'");



if (!$post || !$poll)
{
	header('Location: /');
	exit;
}


$author = get_user($post['user']);
$pauthor = get_user($poll['id_user']);



if (!($user['id'] == $author['id'] || $user['id'] == $pauthor['id'] || $user['level'] > 0 && $user['level']>=$author['level'] || $user['level']>=5)) {

	header('Location: /index.php');
	exit;
}




include '../../inc/header.php';
title();
aut();




if (isset($_POST['change']))
{
		
$text = my_esc($_POST['text']);

if (strlen2($text)>1024)Error('ტექსტი არ უნდა აღემატებოდეს 1024 სიმბოლოს', "?id=$post_id[id]");
if (strlen2($text)<1)Error('ტექსტი არ უნდა იყოს 1 სიმბოლოზე ნაკლები', "?id=$post_id[id]");

if (!isset($_SESSION['err'])) {
	

$pdo->query("UPDATE `poll_comments` SET `text` = ? WHERE `id` = ? and `poll` = ?", [$text, $pid, $poll['id']]);

header("Location: poll.php?id=".$poll['id']);
exit;

}

}




?>






<div class="pzqwe2_ttlqw2z">Text editing</div>









<div class='ftrwithborder'>
<form method='post' action='?id=<?php echo $post['id'];?>'>




<div class="form-group">
<label class="form-label">Text</label>
<textarea  name="text" rows="5" minlength="1" maxlength="1024" required placeholder="Put text here"><?php echo detect($post['text']);?></textarea> 

</div>




<input name="change" type="submit" value="შეცვლა">


</form>
</div>











<div class='break'>
	<a href='poll.php?id=<?=$post_id['poll'];?>'>უკან</a>
</div>


<?
include '../../inc/footer.php';

?>
