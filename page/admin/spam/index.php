<?
include '../../../inc/db.php';
include '../../../inc/main.php';
include '../../../inc/functions.php';
include '../../../inc/user.php';






include '../../../inc/header.php';
title();
aut(); 


if ($user['level']<3)
{
header("Location: /index.php");
exit;
}

 
if (isset($_GET['del']) && is_numeric($_GET['del'])) {
		
$kdqll31 = filter($_GET['del']);
		
$pdo->query("DELETE FROM `reporting` WHERE `report_id` = ?",[$kdqll31]);

header("Location: ?");
exit;


}


?>



<style>

.sts_2 {
	word-break: break-all;
	
}

</style>


<div class="pstrHr1d fnt">Spammings</div>


<?


if (isset($err))
{
echo "<div class='err'>";
echo "$err";
echo "</div>";
}


$qq = new Pagination();



$k_post=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `reporting`");


$ttlq = $qq->calculation($k_post, $set['p_str']);




if ($k_post==0)
{
echo "<div class='mess'>";
echo "ცარიელია...";
echo "</div>";
}

$q1132 = $pdo->query("SELECT * FROM `reporting` ORDER BY report_id DESC LIMIT $ttlq, $set[p_str]");


while ($post = $q1132->fetch())
{
	
	
echo '<div class="nav1">';	

$ank = new user($post['user']);
$spamer = new user($post['whom']);
?>


<b>სად:</b> 

<font color='red'><?=Unescaped($post['where']);?></font>

<br><b>ვისგან:</b>
<?=$ank->nick(); ?>

 <span class="date"><?=when($post['when']);?></span><br>


<b>დამრღვევი:</b> 
<?=$spamer->nick();?>



<br><b>კომენტარზე:</b> <span style='word-break:break-word;'><?=Unescaped($post['problem']);?></span><br>



<b>საჩივრის ტექსტი:</b> <span style='word-break:break-word;'><?=Unescaped($post['why']);?></span><br>



<? if ($spamer->level < $user['level']) { ?>
	[<a href='/apanel/ban.php?id=<?=$spamer->id;?>'>BAN</a>] 
<? } ?>


[<a href='?del=<?=$post['report_id'];?>'>წაშლა</a>] 



  </div>

<?
}

$qq->setPage("/page/admin/spam/");
$qq->setTotal($k_post);
$qq->setPerPage($set['p_str']);

$qq->rendering();

?>



<div class="nav23"><a href="/page/admin/">საადმინო</a></div>



<? include '../../../inc/footer.php'; ?>
