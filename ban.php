<?
include 'inc/db.php';
include 'inc/main.php';
include 'inc/functions.php';
include 'inc/user.php';
include 'inc/header.php';

title();
aut();


?>

<?

if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `ban` WHERE `id_user` = ? AND `time` > ?",[$user['id'],$time]) == 0)
{
header("Location: /index.php");
exit;
}
?>


<div class="ksmz_mnt11_zlmqe1">
You have been blocked
</div>

<?

$q = $pdo->query("SELECT * FROM `ban` WHERE `id_user` = ? ORDER BY `time` DESC LIMIT 5", [$user['id']]);

while ($post = $q->fetch())
{
?>

<div class="WidgeT">

<div>
<b>Ban will expire:</b><br/>
<?=date("H:i:s d-M-y", $post['time']);?>
</div>




<div>
<b>The reason:</b><br/>
<?=Unescaped($post['reason']);?>
</div>



<div>
<b>Ban status:</b>
<?=(($post['time']<$time) ? "Expired" : "Active"); ?>
</div>







</div>

<? } ?>



<div class="cl_foot3">
	<a href="/">Home</a>
</div>

<?
include_once 'inc/footer.php';
?>
