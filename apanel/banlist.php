<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';





if ($user['level']<3)
{
header("Location: /index.php");
exit;
}
  

include '../inc/header.php';
title();
aut();

$k_post=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `ban` where `time` > ?", [$time]);


$qq = new Pagination();



$ttlq = $qq->calculation($k_post, $set['p_str']);




?>


<div class="pstrHr1d fnt">Ban list</div>

<?

if ($k_post==0)
{
echo "<div class='mess'>An empty page</div>\n";
}

$qz31 = $pdo->query("SELECT * FROM `ban` where `time` > ? ORDER BY `id` DESC LIMIT $ttlq, $set[p_str]", [$time]);

while ($post = $qz31->fetch()) {

$fank = new user($post['id_user']);

?>









<div class="frlst21_22">




<div>	
	
<div class="pchrt21">
	
<div><?echo $fank->photo50(128,60,60,'50%'); ?></div>	

<div class="dflexAcenter">

    
	
	
	<div><?echo $fank->nick(); ?></div>
	<div><?=$fank->user_status();?></div>
	

	
	
</div>


</div>	
		


</div>




<div class="dflexAcenter">


	
<span onclick="redirect2('/apanel/ban.php?id=<?=$fank->id;?>')" class="material-symbols-outlined CursorUser">block</span>

</div>

</div>











<?
}

$qq->setPage("/apanel/banlist.php");
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



<script>

function redirect2(url){
	return window.location = url
}

</script>

<?
include '../inc/footer.php';
?>
