<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';




if (!isset($_GET['user'])) {
header("Location: index.php");
exit;
}
	


if (!is_numeric($_GET['user'])) {
header("Location: index.php");
exit;
}	
	




$ank=get_user(nums($_GET['user']));


if (!$ank)
{
header("Location: /index.php");
exit;
}


if ($user['level']<5) {
	header("Location: /index.php");
	exit;
}
	

include '../inc/header.php';
title();
aut();

$qqwe = $pdo->query("select * from user_level_cat"); 




if (isset($_POST['change'])) {



while ($qw1lqq = $qqwe->fetch()) {
	
//$qw123 = my_esc($_POST[$qw1lqq['level']]);	


foreach ($_POST as $name => $value) {
    
 $name = my_esc($name); 
 $value = my_esc($value);


if ($value == 0) {
	
$pdo->query("DELETE FROM `user_level` WHERE `user_id` = ? and `access_type` = ?", [$ank['id'], $name]);
	
} else {
	
	
if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `user_level` WHERE `access_type` = ? AND `user_id` = ?", [$name, $ank['id']]) == 0) {
$pdo->query("INSERT INTO `user_level` (`access_type`, `user_id`) values(?,?)", [$name, $ank['id']]);
} 


	//echo '111111111111';
}	
    
    
}


	
	
	
}

//var_dump($_POST);

	

//header("Location: /index.php");
//exit;	


//$pdo->query("UPDATE `user` SET `texting_ability` = ? WHERE `id` = ?", [$Texting_rights, $ank['id']]);

//$pdo->query("INSERT INTO `user_log` (`user`, `time`, `us_agent`, `us_ip`) values(?,?,?,?)", [$user_t2zq['id'], $time, $agnt, $iplong]);
    
//$_SESSION['message'] = $qw123;
header("Location: ?user=$ank[id]");
exit;	
	



}

/*


+-------------+---------------------+------+-----+---------+----------------+
| Field       | Type                | Null | Key | Default | Extra          |
+-------------+---------------------+------+-----+---------+----------------+
| uid         | bigint(64) unsigned | NO   | PRI | NULL    | auto_increment |
| when        | bigint(64) unsigned | NO   |     | NULL    |                |
| access_type | varchar(64)         | YES  |     | guest   |                |
| user_id     | bigint(64) unsigned | NO   |     | NULL    |                |
| by_whom     | bigint(64) unsigned | NO   |     | NULL    |                |
+-------------+---------------------+------+-----+---------+----------------+


*/

if (isset($err))
{
echo "<div class='err'>";
echo "$err";
echo "</div>";
}
?>



<div class="prfST1 prfST121_brd">

<div><a href="/adm_panel/profile.php?id=<?=$ank['id'];?>"><img src="/pics/9kN.webp" width="20"></a></div>

<div>პროფილის რედაქტირება</div>

</div>

<style>

#pslqwek111 input[type='checkbox'] {
	height:20px;
	margin-top:4px;
}


.lwqeqw111dl1 {
	display:flex;
	flex-wrap:nowrap;
	gap:5px;
	flex-direction:column;
}

</style>


<div class="nav1" id="pslqwek111">
<form method='post' action='?user=<?=$ank['id'];?>'><div>





<div style="margin-bottom:15px;">მოდერირება</div>




<? while($wq = $qqwe->fetch()):?>
<div class="lwqeqw111dl1">
	<div><label><?=detect($wq['desc']);?></label></div>
	<div>
	
<?

if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `user_level` WHERE `access_type` = ? AND `user_id` = ?", [$wq['level'], $ank['id']])>0) {
	$q1q1 = " selected";
	$q1q2 = "";
} else {
	$q1q1 = "";
	$q1q2 = " selected";	
}
	

?>	

	<select name="<?=detect($wq['level']);?>">
		<option value="<?=detect($wq['level']);?>"<?=$q1q1;?>>მოდერატორი</option>
		<option value="0"<?=$q1q2;?>>არა</option>
	</select>
	
	
	</div>
	
	
	
</div>
<? endwhile;?>

<br/>
<input  type='submit' name='change' value='შეცვლა'>
</div></form></div>





<div class="cl_foot2">
 <a href="/apanel/">Admin</a>
</div>

<div class="cl_foot3">
 <a href="/">Home</a>
</div>


<?
include '../inc/footer.php';
?>
