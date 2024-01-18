<?php

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

$kqlkpid = filter($_GET['id']);

$notes = $pdo->fetchOne("SELECT * FROM `notes` WHERE `id` = ?", [$kqlkpid]);

if (!$notes)
{
	header('Location: /index.php');
	exit;
}


$author = get_user($notes['id_user']);


if (!($user['id'] == $author['id'] || $user['level'] > 0 && $user['level']>=$author['level'] || $user['level']>=5)) {

	header('Location: /index.php');
	exit;
}



include '../../inc/header.php';
title();
aut();




if (isset($_POST['change']))
{
	
	
$msg=my_esc($_POST['subject']);

$cansee = number($_POST['can_see']);
$canpost = number($_POST['can_post']);


if (!in_array($cansee, array('0','1','2')))Error('უუპს', "?id=$notes[id]"); 
if (!in_array($canpost, array('0','1','2')))Error('უუპს', "?id=$notes[id]"); 


if (strlen2($msg)>40000)Error('ტექსტი არ უნდა აღემატებოდეს 40000 სიმბოლოს', "?id=$notes[id]");
if (strlen2($msg)<3)Error('ტექსტი არ უნდა იყოს 3 სიმბოლოზე ნაკლები', "?id=$notes[id]");
 
 
	if (!isset($_SESSION['err'])) {
		
		$pdo->query("UPDATE `notes` SET `msg` = ?,`can_see` = ?, `can_post` = ? WHERE `id` = ?", [$msg, $cansee, $canpost, $notes['id']]);
		
		header("Location: /page/posts/?id=".$notes['id']);
		exit;
	
	}

}




?>













<div class='ftrwithborder'>
<form method='post' action='?id=<?php echo $notes['id'];?>'>




<div class="form-group">
<label class="form-label">ტექსტი (40000 სიმბოლო):</label>
<textarea  name="subject" rows="5" minlength="3" maxlength="40000" required placeholder="What's on your mind?"><?php echo detect($notes['msg']);?></textarea> 
</div>




<div class="form-group"> 
<label class="form-label">Who can see:</label>
<select name="can_see">  
<option value="0" <?=($notes['can_see'] == 0 ? "selected" : "");?>>Everyone</option>
<option value="1" <?=($notes['can_see'] == 1 ? "selected" : "");?>>Only friends</option>
<option value="2" <?=($notes['can_see'] == 2 ? "selected" : "");?>>No one</option> 
</select>
</div>


<div class="form-group"> 
<label class="form-label">Who can comment:</label>
<select name="can_post">  
<option value="0" <?=($notes['can_post'] == 0 ? "selected" : "");?>>Everyone</option>
<option value="1" <?=($notes['can_post'] == 1 ? "selected" : "");?>>Only friends</option>
<option value="2" <?=($notes['can_post'] == 2 ? "selected" : "");?>>No one</option> 
</select>
</div>




<input name="change" type="submit" value="Change">


</form>
</div>











<div class='break'>
 <a href='/page/posts/?id=<?=$notes['id'];?>'>Back</a>
</div>


<?
include '../../inc/footer.php';

?>
