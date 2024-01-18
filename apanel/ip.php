<?php

include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';


if ($user['level']<1) {
	header("Location: /");
	exit;
} 


include '../inc/header.php';
title();
aut();


?>


<div class="hdnvtttl1">IP ძებნა</div>

<?


$search = '';

if (isset($_GET['search']) && strlen2($_GET['search'])>0)
{

$search = my_esc($_GET['search']);
$kkl21 = '%'.my_esc($search).'%';
	


$k_post=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` WHERE `ip` like ?", [$kkl21]);



$qq = new Pagination();


$ttlq = $qq->calculation($k_post, $set['p_str']);


if ($k_post==0)
{

echo "<div class='mess'>Empty</div>\n";

}

$qz231 = $pdo->query("SELECT * FROM `user` WHERE `ip` like ? ORDER BY `date_last` DESC LIMIT $ttlq, $set[p_str]", [$kkl21]);


while ($post = $qz231->fetch()) {

echo "<div class='ftrwithborder'>";


$ank2 = new user($post['id']);



echo $ank2->nick();


echo '<a href="ban.php?id='.$ank2->id.'">[B]</a>';
echo '<a href="user.php?id='.$ank2->id.'">[R]</a>';
echo '<a href="profile.php?id='.$ank2->id.'">[A]</a>';
echo '</div>';

}

$qq->setPage("/apanel/ip.php?", "search=".detect($search)."");
$qq->setTotal($k_post);
$qq->setPerPage($set['p_str']);

$qq->rendering();

}

?>




<div class="ftrwithborder">
<form method='get' action='?'>
	
<div class="form-group">
<input name='search' type='text' value='<?=Unescaped($search);?>' placeholder='0.0.0.0'>
</div>

<div class="form-group">
<input type='submit' value='Search'>
</div>

</form>
</div>



<div class="cl_foot2">
 <a href="/apanel/">Admin</a>
</div>

<div class="cl_foot3">
 <a href="/">Home</a>
</div>





<?
include '../inc/footer.php';
?>
