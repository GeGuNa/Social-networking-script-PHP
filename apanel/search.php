<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';


if ($user['level']<5){header("Location: /index.php");exit;} 


if (!isset($_GET['search'])) {
	header("location: /");
	exit;
}

if (strlen2($_GET['search'])<1) {
	header("location: /");
	exit;
}


include '../inc/header.php';
title();
aut(); 




$search = my_esc($_GET['search']);
$kkl21 = '%'.my_esc($search).'%';

$qq = new Pagination();





$k_post=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `messages` WHERE `text` like ?", [$kkl21]);


$ttlq = $qq->calculation($k_post, $set['p_str']);




if ($k_post==0)
{
echo "<div class='nav2'>ცარიელია</div>";
}


$qft1 = $pdo->query("SELECT * FROM `messages` WHERE `text` like ? ORDER BY `mid` DESC LIMIT $ttlq, $set[p_str]", [$kkl21]);

while ($post = $qft1->fetch())
{


$ank1 = new user ($post['user']);
$ank2 = new user ($post['whom']);
?>


<div class='nav2'>


<?=$ank1->nick();?>

 &#187; Texted &#187; <?=$ank2->nick();?> 
 <span class='time'><?=tmdt($post['when']);?></span>  <br />

<? if ($post['read']==0){ ?>
	<img src='/img/deliver.gif'> 
<? } ?>


<?=output_text($post['text']);?>

</div>

<?
}



$qq->setPage("/apanel/search.php?", "search=".detect($search)."");
$qq->setTotal($k_post);
$qq->setPerPage($set['p_str']);

$qq->rendering();





?>


<div class="cl_foot2">
 <a href="/apanel/">Admin</a>
</div>

<div class="cl_foot3">
 <a href="/">Home</a>
</div>


<?
include '../inc/footer.php';
?>
