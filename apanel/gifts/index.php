<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';

if ($user['level']<3)
{
header("Location: /index.php");
exit;
} 
	 
if (isset($_GET['del']) && is_numeric($_GET['del'])) {

$nczis = filter($_GET['del']);

if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `gift_categories` WHERE `id` = ?", [$nczis]) == 0) {
header("Location: /index.php");
exit;
} else {

$_SESSION['message'] = 'წარმატებით წაიშალა';

$info = $pdo->fetchOne("SELECT * FROM `gift_categories` WHERE `id` = ?", [$nczis]);

admin_log('Gifts','category',"წაშალა კატეგორია $info[name]");

$pdo->query("DELETE FROM `gift_list` WHERE `id_category` = ?", [$nczis]);
$pdo->query("DELETE FROM `gift_categories` WHERE `id` = ?", [$nczis]);

header("Location: ?");
exit;


}

}

if(isset($_POST['save'])) {

$name=my_esc($_POST['name']);
if(strlen2($name)<3)Error('სახელი არ უნდა იყოს 3 სიმბოლოზე ნაკლები');
if(strlen2($name)>50)Error('სახელი არ უნდა იყოს 50 სიმბოლოზე მეტი');


if (!isset($_SESSION['err'])) {

admin_log('Gifts','category',"შექმნა ახალი კატეგორია >> $name <<");

$pdo->query("INSERT INTO `gift_categories` (`name`) VALUES (?)", [$name]);

$_SESSION['message'] = 'წარმატებით დაემატა';
header("Location: ?");
exit;

}

}



include '../../inc/header.php';
title();
aut(); 




?>

<div class="PHeadLine fnt">Gifts</div>

<?

if(isset($_GET['act']) && $_GET['act']=='add')
{
?>

<div class="breakBottom">
<form method='post' action='?act=add'>
სახელი:<br><input type='text' name='name' maxlength='32'><br>
<input type='submit' name='save' value='დამატება'>
</form>
</div>

<?
}

$k_post=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `gift_categories`");

if ($k_post==0)
{
echo "<div class='mess'>";
echo "Empty";
echo "</div>";
}


$q31z = $pdo->query("SELECT * FROM `gift_categories` ORDER BY id DESC LIMIT 50");
while($post = $q31z->fetch())
{
?>

<div class="pSRDat">

<div>
<span class="material-symbols-outlined">category</span> 

<a href="/apanel/gifts/gift.php?id=<?=$post['id'];?>"> <?=detect($post['name']);?> </a> 
(<?=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `gift_list` WHERE `id_category` = '".$post['id']."'");?>)
</div>


<div>

<a href="?del=<?=$post['id'];?>"><span class="material-symbols-outlined">delete</span> </a>
</div>


</div>

<? }
?>

<div class="MTop">

<div class="break2">
	<a href='?act=add'>New category</a>
</div>

<div class="break">
	<a href="/apanel/">Admin</a>
</div>

</div>


<?
include '../../inc/footer.php';
?>
