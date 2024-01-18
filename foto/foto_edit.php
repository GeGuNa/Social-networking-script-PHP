<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';


if (!isset($_GET['id'])) {
header("Location: /?"); 
exit;	
}	
	

if (!is_numeric($_GET['id'])) {
header("Location: /?"); 
exit;	
}	
	
	
$KkkK2_id = filter($_GET['id']);
	


if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `gallery_foto` WHERE `id` = ?",[$KkkK2_id])==0)
{
header("Location: /index.php");
exit;
}


	
$foto = $pdo->fetchOne("SELECT * FROM `gallery_foto` WHERE `id` = ?",[$KkkK2_id]);

$ank = $pdo->fetchOne("SELECT * FROM `user` WHERE `id` = ?",[$foto['id_user']]);

$gallery = $ank;




if ($user['id'] != $ank['id'])
{
header("Location: /index.php");
exit;
}



include '../inc/header.php';
title();
aut();





/*-------------------close / ignor / off / block------------------*/


$friend = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends` WHERE `user` = ? AND `who` = ?", [$user['id'],$ank['id']]);	
	


if ($user['id']!=$ank['id']) {
	
		
if_blocked($ank);

if_blacklisted($ank);

if_closed($ank);




if ($user['level']<=$ank['level'] && $foto['photo_seeing']==1 && $friend == 0)
{
	
echo '<div class="mess">';
echo 'Only friends can see this page!';
echo '</div>';

include '../inc/footer.php';
exit;
}


if ($user['level']<=$ank['level'] && $foto['photo_seeing']==2)
{
	
echo '<div class="mess">';
echo 'No one can see this page';
echo '</div>';

include '../inc/footer.php';
exit;
}


}


/*-------------------end------------------*/





if (isset($_POST['cfms']))
{

	if (strlen2($_POST['name'])<3)Error('სახელი მინიმუმ უნდა შეიცავდეს 3 სიმბოლოს მინიმუმ', '?id='.$foto['id']);
	if (strlen2($_POST['name'])>500)Error('სახელი არ უნდა აღემატებოდეს 500 სიმბოლოს', '?id='.$foto['id']);

if (strlen2($_POST['description'])>0)
{
	if (strlen2($_POST['description'])<3)Error('აღწერა მინიმუმ 3 სიმბოლოსგან უნდა შედგებოდეს', '?id='.$foto['id']);
	if (strlen2($_POST['description'])>500)Error('აღწერა არ უნდა აღემატებოდეს 500 სიმბოლოს', '?id='.$foto['id']);
}




$cansee = number($_POST['can_see']);
$canpost = number($_POST['can_post']);


if (!in_array($cansee, array('0','1','2')))Error('უუპს', "?id=$foto[id]"); 
if (!in_array($canpost, array('0','1','2')))Error('უუპს', "?id=$foto[id]"); 



if (!isset($_SESSION['err'])) {

if ($user['id']!=$ank['id']) {
   admin_log('Fotoalbomi','foto',"დაარედაქტირა '[url=/foto/foto.php?id=$foto[id]]ფოტო[/url]'");
}

$pdo->query("UPDATE `gallery_foto` SET `name` = ?, `description` = ?, `photo_comment`= ?, `photo_seeing` = ? WHERE `id` = ?",[my_esc($_POST['name']),my_esc($_POST['description']),$canpost,$cansee,$foto['id']]);




header("Location: foto.php?id=".$foto['id']);
exit;



}



}





?>




<div class="foot">
<form style="padding:4px;" action="?id=<?echo $foto['id'];?>" method="post">

<div class="form-group">
<label class="form-label">  Name </label>
<input name="name" type="text" value="<?echo detect($foto['name']);?>" maxlength="500">
</div>


<div class="form-group">
<label class="form-label">  Description </label>
<textarea maxlength="500" name="description"><?echo detect($foto['description']);?></textarea>
</div>

		

<div class="form-group"> 
<label class="form-label">Who can see:</label>
<select name="can_see">  
<option value="0" <?=($foto['photo_seeing'] == 0 ? "selected" : "");?>>Everyone</option>
<option value="1" <?=($foto['photo_seeing'] == 1 ? "selected" : "");?>>Only friends</option>
<option value="2" <?=($foto['photo_seeing'] == 2 ? "selected" : "");?>>No one</option> 
</select>
</div>


<div class="form-group"> 
<label class="form-label">Who can comment:</label>
<select name="can_post">  
<option value="0" <?=($foto['photo_comment'] == 0 ? "selected" : "");?>>Everyone</option>
<option value="1" <?=($foto['photo_comment'] == 1 ? "selected" : "");?>>Only friends</option>
<option value="2" <?=($foto['photo_comment'] == 2 ? "selected" : "");?>>No one</option> 
</select>
</div>		
		


<input class="submit" type="submit" name="cfms" value="Change"> 
</form></div>




<div class='nav2'>
<img src="/img/cl0.g.png" width="15"> <a href='foto.php?id=<?php echo $foto['id'];?>'> Back </a>
</div>

<?
include '../inc/footer.php';
?>
