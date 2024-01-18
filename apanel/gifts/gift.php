<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';


$qq = new Pagination();


if ($user['level']<3)
{
header("Location: /index.php");
exit;
} 



if (!isset($_GET['id'])){
	header('Location: /index.php');
	exit;
}


if (!is_numeric($_GET['id'])){
	header('Location: /index.php');
	exit;
}	




$gctid = number($_GET['id']);

if($pdo->queryFetchColumn("SELECT COUNT(*) FROM `gift_categories` WHERE `id` = ?", [$gctid]) == 0)
{
header("Location: /index.php");
exit;
}



if (isset($_GET['del']) && is_numeric($_GET['del'])) {

$lzrmrmq2 = number($_GET['del']);

if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `gift_list` WHERE `id` = ?", [$lzrmrmq2]) == 0) {
header('Location: gift.php?id='.$gctid.'');
exit;
} else {
$_SESSION['message'] = 'წარმატებით წაიშალა';

admin_log('Gifts','gift',"removed a gift [img]/img/gift/".$lzrmrmq2.".png[/img]");

$pdo->query("DELETE FROM `gift_list` WHERE `id` = ?", [$lzrmrmq2]);

header('Location: gift.php?id='.$gctid.'');
exit;

}


}

if (isset($_POST['add']))
{ 

$price=number($_POST['price']);

if ($price<1000)Error('ფასი მინიმუმ 1000 მონეტა',"?id=$gctid");
if ($price>10000000)Error('ფასი მაქსიმუმ 10000000 მონეტა',"?id=$gctid");

if (isset($_FILES['gift']['name']) && !if_img_upls($_FILES['gift']['name']) && strlen2($_FILES['gift']['name'])>2) {

Error("დაშვებული ფორმატები gif, png, jpg, jpeg, webp");

}


if (!isset($_SESSION['err'])) {


$pdo->query("INSERT INTO `gift_list` (`money`,`id_category`) values(?,?)", [$price, $gctid]);

$qk1p31 = $pdo->getLastInsertedId();

copy($_FILES['gift']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/img/gift/'.$qk1p31.'.png');

admin_log('Gifts','gift',"დაამატა საჩუქარი [img]/img/gift/".$qk1p31.".png[/img]");

$_SESSION['message'] = 'წარმატებით დაემატა';
header('Location: gift.php?id='.$gctid);
exit;

}


}


include '../../inc/header.php';
title();
aut();


if (isset($err))
{
echo "<div class='err'>";
echo "$err";
echo "</div>";
}

?>


<div class="PHeadLine fnt">Gift list</div>


<? if(isset($_GET['act']) && $_GET['act']=='add') { ?>

<div class="breakBottom">
<form enctype='multipart/form-data' action='?id=<?=$gctid;?>&amp;act=add' method='post'>
ფაილი:<br> 
<input name='gift' type='file' required><br>
ფასი:<br>
<input type='number' required name='price' maxlength='7' min='1000' max='10000000' value=''><br>
<input type='submit' name='add' value='დამატება'>

</form>
</div>

<? }


$k_post=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `gift_list` WHERE `id_category` = ?", [$gctid]);



$ttlq = $qq->calculation($k_post, $set['p_str']);



if ($k_post==0)
{
echo '<div class="mess">Empty...</div>';
}

$q3z = $pdo->query("SELECT * FROM `gift_list` WHERE `id_category` = ? ORDER BY id DESC LIMIT $ttlq, $set[p_str]", [$gctid]);

while($post = $q3z->fetch()){

echo '<div class="nav2">';	
echo '<img src="/img/gift/'.$post['id'].'.png" style="max-width:50%;"> ';

if ($user['level']>3)
{
echo '<a href="?id='.$gctid.'&amp;del='.$post['id'].'"><span class="box"><span class="material-symbols-outlined">delete</span></span></a>';
}

echo '</div>';

}



$qq->setPage("/apanel/gifts/gift.php?", "id=$gctid");
$qq->setTotal($k_post);
$qq->setPerPage($set['p_str']);

$qq->rendering();


?>

<div class="MTop">

<div class="break2">
 <a href='?id=<?=$gctid;?>&amp;act=add'>Add new</a>
</div>

<div class="break">
 <a href="./">Back</a>
</div>

</div>

<?
include '../../inc/footer.php';

