<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';






if ($user['level']<3){header("Location: /index.php");exit;} 
$set['title']='yuryuti';

include '../inc/header.php';

title();
aut();

$k_post=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` WHERE `act` = '2'");


$qq = new Pagination();



$ttlq = $qq->calculation($k_post, $set['p_str']);




?>


<div class="pstrHr1d fnt">Waiting list</div>

<?

if ($k_post==0)
{
echo "<div class='mess'>An empty page</div>\n";
}


$q31z = $pdo->query("SELECT * FROM `user` WHERE `act` = '2' ORDER BY `date_last` DESC LIMIT $ttlq, $set[p_str]");


while ($ank = $q31z->fetch())
{
	
$fank = new user($ank['id']);	
	
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


	
<span onclick="redirect2('/apanel/profile.php?id=<?=$fank->id;?>')" class="material-symbols-outlined CursorUser">manage_accounts</span>

</div>

</div>








<?
}




$qq->setPage("/apanel/frozen.php");
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
