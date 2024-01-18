<?

include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';


if (!isset($_GET['id'])) {
	header("Location: /");
	exit;
} 

if (!is_numeric($_GET['id'])) {
	header("Location: /");
	exit;
} 

if (!isset($_GET['category'])) {
	header("Location: /");
	exit;
} 

if (!is_numeric($_GET['category'])) {
	header("Location: /");
	exit;
} 


$gcat = filter($_GET['category']);

$category = $pdo->fetchOne("SELECT * FROM `gift_categories` WHERE `id` = ?", [$gcat]);



if (!$category)
{
header("Location: /index.php");
exit;
}


$ank=get_user(nums($_GET['id']));

if (!$ank)
{
header("Location: /index.php");
exit;
}



if ($ank['id'] == $user['id'])
{
header("Location: /index.php");
exit;
}




include '../../inc/header.php';
title();
aut();
	
	


/*-------------------close / ignor / off / block------------------*/


if ($user['id']!=$ank['id']) {


if_blocked($ank);

if_blacklisted($ank);

if_closed($ank);

}


/*-------------------end------------------*/

	
$category = $pdo->fetchOne("SELECT * FROM `gift_categories` WHERE `id` = ?", [$gcat]);

$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(id) FROM `gift_list` WHERE `id_category` = ?", [$gcat]);
?>


<div class="pzqwe2_ttlqw2z">Gifts list</div>


<?


$qq = new Pagination();


$ttlq = $qq->calculation($kzftch322, $set['p_str']);


if ($kzftch322==0)
{
echo '<div class="mess">';
echo 'Empty';
echo '</div>';
}



$qlist = $pdo->query("SELECT id,money FROM `gift_list` WHERE `id_category` = '".$category['id']."' ORDER BY `id` DESC LIMIT $ttlq, $set[p_str]");


while ($post = $qlist->fetch())
{?>

<div class="pchtr1">

<div>
	
<img src="/img/gift/<?=$post['id'];?>.png" class="gwWmxw"><br>

	<a href="send.php?gift=<?=$post['id'];?>&amp;id=<?=$ank['id'];?>">
		<b>Price <?=detect($post['money']);?> </b>
	</a>

</div>

</div>

<?}


//if ($k_page>1)str('?id='.$ank['id'].'&amp;category='.($category['id']).'&amp;',$k_page,$page); 


$qq->setPage("/user/gift/list.php?", "id=$ank[id]&category=$category[id]");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();


?>



<div class='cl_foot2'>
	<a href="categories.php?id=<?=$ank['id'];?>">Back to categories</a>
</div>

<div class='czFTr21 brdrtop'>
 <a href="/">Home</a>
</div>

<?
include '../../inc/footer.php';
?>
