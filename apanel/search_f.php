<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';






if ($user['level']<5) {
header("location: /");
exit;	
}


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

$search = $_GET['search'];
$kkl21 = '%'.my_esc($search).'%';

$qq = new Pagination();

$k_post=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `gallery_komm` WHERE `msg` like ?",[$kkl21]);

$ttlq = $qq->calculation($k_post, $set['p_str']);

if ($k_post==0)
{
echo "<div class='nav2'>Nothing</div>";
}

$q11 = $pdo->query("SELECT * FROM `gallery_komm` WHERE `msg` like ? ORDER BY `id` DESC LIMIT $ttlq, $set[p_str]",[$kkl21]);


while ($post = $q11->fetch())
{


$ank1 = new user ($post['id_user']);

$foto = $pdo->fetchOne("SELECT * FROM `gallery_foto` WHERE `id` = '".$post['id_foto']."'");

?>


<div class='nav2'>


<?=$ank1->nick();?> >> <a href="/foto/foto.php?id=<?=$post['id_foto'];?>">ფოტოზე</a>




<br/>

<?=Unescaped($post['msg']);?>  <br/> <span class='date'><?=when($post['time']);?></span>  

</div>


<?
}


$qq->setPage("/apanel/search_f.php?", "search=".detect($search)."");
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

