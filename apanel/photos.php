<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';


if ($user['level'] < 1) {
header("Location: /index.php");
exit;
}
	

if (isset($_GET['nofoto'])) {
	
if (!is_numeric($_GET['nofoto'])){
header("Location: ?");
exit;
} else {
	
$nfts = filter($_GET['nofoto']);	
	
$foto = $pdo->fetchOne("SELECT * FROM `gallery_foto` WHERE `id` = ? AND `active` = '0'", [$nfts]);
$ank = $pdo->fetchOne("SELECT * FROM `user` WHERE `id` = '".$foto['id_user']."'");	

if ($foto) {	

unlink($_SERVER["DOCUMENT_ROOT"]."/images/gallery/48/".$foto['photo_addr'].".jpg");
unlink($_SERVER["DOCUMENT_ROOT"]."/images/gallery/50/".$foto['photo_addr'].".jpg");
unlink($_SERVER["DOCUMENT_ROOT"]."/images/gallery/128/".$foto['photo_addr'].".jpg");
unlink($_SERVER["DOCUMENT_ROOT"]."/images/gallery/640/".$foto['photo_addr'].".jpg");
unlink($_SERVER["DOCUMENT_ROOT"]."/images/gallery/foto/".$foto['photo_addr'].".jpg");

//mysql_query("DELETE FROM `notification` WHERE `id_object` = '".$nfts."' AND `type` = 'photo_like'");
//mysql_query("DELETE FROM `notification` WHERE `id_object` = '".$nfts."' AND `type` = 'photo_unlike'");

$pdo->query("DELETE FROM `gallery_komm` WHERE `id_foto` = ?", [$nfts]);
$pdo->query("DELETE FROM `gallery_foto` WHERE `id` = ?", [$nfts]);
$pdo->query("DELETE FROM `photo_like` WHERE `foto` = ?", [$nfts]);

$pdo->query("DELETE FROM `user_activity` WHERE `type` = ? AND `object_id` = ?", ['photo_comm', $nfts]);
$pdo->query("DELETE FROM `user_activity` WHERE `type` = ? AND `object_id` = ?", ['replied_on_photo', $nfts]);	
$pdo->query("DELETE FROM `user_activity` WHERE `type` = ? AND `object_id` = ?", ['replied_ony_photo', $nfts]);
$pdo->query("DELETE FROM `user_activity` WHERE `type` = ? AND `object_id` = ?", ['photo_like', $nfts]);



admin_log('Fotoalbomi','ახალი ფოტო'," არ გაუქატიურა  '".my_esc($ank['nick'])."'-ს ფოტო !");



header("Location: ?");
exit;

} else {
	
header("Location: ?");
exit;	

}

} //end

}	//end

if (isset($_GET['yesfoto'])) {
	
if (!is_numeric($_GET['yesfoto'])){
header("Location: /?");
exit;

} else {
	
$nftsy = filter($_GET['yesfoto']);		

$foto=$pdo->fetchOne("SELECT * FROM `gallery_foto` WHERE `id` = ? AND `active` = '0'", [$nftsy]);
	
if ($foto) {
	
$pdo->query("UPDATE `gallery_foto` SET `active` = '1' WHERE `id` = ?", [$nftsy]);

admin_log('Fotoalbomi','ახალი ფოტო',"გააქტიურა [url=/foto/foto.php?id=$foto[id]]ფოტო[/url] ");

header("Location: ?");
exit;

} else {
	
header("Location: ?");
exit;

}

}


}




include '../inc/header.php';
title();
aut();
?>


<div class="PHeadLine fnt">Photo moderation</div>


	
<?



$qq = new Pagination();


$k_post=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `gallery_foto` WHERE `active` = '0'");


$ttlq = $qq->calculation($k_post, $set['p_str']);


$query = $pdo->query("SELECT * FROM `gallery_foto` WHERE `active` = '0' ORDER BY `time` DESC  LIMIT $ttlq, $set[p_str]");

while ($data = $query->fetch()) {

$baasaa = new user($data['id_user']);	

?>

<div class="displaying bordrBottom">

<div>
<a href="/foto/foto.php?id=<?=$data['id'];?>">
	<img src="/images/gallery/128/<?=$data['photo_addr'];?>.jpg">
</a>

</div>




<div>By: <?echo $baasaa->nick(); ?></div>
<div class="TextDisplaYing">Name: <?=detect($data['name']);?> </div>
<div>When: <span class="date"> <?=tmdt($data['time']);?> </span></div>




<div class="pchrt21">
	<div>	<a href="?yesfoto=<?=$data['id'];?>"><button>Allow</button></a>	</div>
	<div>	<a href="?nofoto=<?=$data['id'];?>"><button>Remove</button></a>	</div>
</div>





</div>


<? } ?>


<? if ($k_post==0){ ?>
	
	<div class='mess'>Nothing</div>
	
<? } ?>



<? 

$qq->setPage("/apanel/photos.php");
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
