<?php

include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';


if (!isset($_GET['pid']) || !isset($_GET['note'])){
header('Location: index.php');
exit;
}


if (!is_numeric($_GET['pid']) || !is_numeric($_GET['note'])){
header('Location: index.php');
exit;
}	


$nid = number(GET('note'));
$pid = number(GET('pid'));



///////


$note = $pdo->fetchOne("SELECT * FROM `notes` WHERE `id` = ?", [$nid]);

	
$post = $pdo->fetchOne("SELECT * FROM `notes_komm` WHERE `id` = ? and `id_notes` = ?", [$pid, $note['id']]);


if (!$note || !$post)
{
	header('Location: /index.php');
	exit;
}


/////////


$author = get_user($note['id_user']);
$pauthor = get_user($post['id_user']);



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

if (strlen2($text)>1024)Error('ტექსტი არ უნდა აღემატებოდეს 1024 სიმბოლოს', "?note=".$nid."&pid=$pid");
if (strlen2($text)<3)Error('ტექსტი არ უნდა იყოს 3 სიმბოლოზე ნაკლები', "?note=".$nid."&pid=$pid");

if (!isset($_SESSION['err'])) {
	
$pdo->query("UPDATE `notes_komm` SET `msg` = ? WHERE `id`= ? and `id_notes` = ?", [$text, $pid, $note['id']]);

header("Location: /page/posts/?id=".$nid);
exit;

}

}




?>




<div class="cztfrprstrng2">

<div><a href="/page/posts/?id=<?=$note['id'];?>"><img src="/pics/9kN.webp" width="20"></a></div>

<div>ტექსტის რედაქტირება</div>

</div>









<div class='ftrwithborder'>
<form method='post' action='?note=<?php echo $nid;?>&pid=<?=$pid;?>'>


<label class="form-label">ტექსტი (1024 სიმბოლო):</label>
<textarea class="input-txt" rows="4" cols="4" name="text" minlength="3" maxlength="1024" required placeholder="ჩანაწერი"><?php echo detect($post['msg']);?></textarea> 
 



<input class="button wide_button fb_buttoni" name="change" type="submit" value="შეცვლა">


</form>
</div>

<div class="ftrwithoutborder">
	<a href='/page/posts/?id=<?=$note['id'];?>'>უკან</a>
</div>


<?

include '../../inc/footer.php';

?>
