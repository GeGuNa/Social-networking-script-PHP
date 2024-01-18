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


	
	
	
?>


<div class="pzqwe2_ttlqw2z">Categories of the gifts</div>



<?	

	
	
$k_post = $pdo->queryFetchColumn("SELECT COUNT(id) FROM `gift_categories`");


if ($k_post==0)
{
echo '<div class="mess">';
echo 'Empty';
echo '</div>';
}


$q123 = $pdo->query("SELECT * FROM `gift_categories` ORDER BY id DESC LIMIT 50");
while ($post = $q123->fetch())
{ ?>
	
<div class="pchtr1">	
	<div><a href="list.php?category=<?=$post['id'];?>&amp;id=<?=$ank['id'];?>"><?=detect($post['name']);?></a> </div>
	<div>(<?=$pdo->queryFetchColumn("SELECT COUNT(id) FROM `gift_list` WHERE `id_category` = '".$post['id']."'");?>)
</div>	


</div>

<?}


?>

<div class='cl_foot2'>
 <a href="/">Home</a>
</div>




<?
include '../../inc/footer.php';
?>
