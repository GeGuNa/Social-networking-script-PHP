<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';


if ($user['level']<4)
{
header("Location: /index.php");
exit;
}


if (isset($_POST['save'])) {

$reg_rights = filter($_POST['reg']);
$gossip_rights = filter($_POST['gossip']);

if (!in_array($reg_rights, array('0','1')))Error('უუპს'); 
if (!in_array($gossip_rights, array('0','1')))Error('უუპს'); 

if (!isset($_SESSION['err'])) {

$pdo->query("UPDATE `admin_site` SET `reg_select` = ?,`chorbiuro` = ? WHERE `id` = '1'",[$reg_rights, $gossip_rights]);

admin_log('Parametrebi','Sistema','Parametrebis shecvla');

$_SESSION['message'] = 'წარმატებით შეიცვალა';

header("Location: ?"); 
exit;

} 


}


include '../inc/header.php';
title();
aut();
err();



echo '<div class="nav2">';
echo "<form method=\"post\" action=\"?\">\n";


echo "რეგისტრაცია<br>"; 
echo "<select name='reg'>";
echo '<option value="1"'.($param['reg_select']==1?" selected='selected'":null).'>გახსნილი</option>';
echo '<option value="0"'.($param['reg_select']==0?" selected='selected'":null).'>დახურული</option>';
echo "</select><br>";


echo "ჭორბიურო<br>"; 
echo "<select name='gossip'>";
echo '<option value="1"'.($param['chorbiuro']==1?" selected='selected'":null).'>ჩართული</option>';
echo '<option value="0"'.($param['chorbiuro']==0?" selected='selected'":null).'>გამორთული</option>';
echo "</select><br>";






echo '<input value="შენახვა" type="submit" name="save">';
echo "</form></div>";

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
