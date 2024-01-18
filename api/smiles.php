<?


include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';


if (!isset($user)) {
exit;	
}
	


if (if_ajax()) {


echo "<div class='simptom_mail_70'>";



if (!isset($_GET['id'])) {
	
echo "<div class='simptom_mail_71'>";
echo "<b>აირჩიეთ კატეგორია</b>";
echo "</div>";


echo "<div class='simptom_mail_74'>";
$k_post=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `smile_dir`");

if ($k_post==0) {
	
echo "<div class='err'>";
echo "საქაღალდეები არ არის";
echo "</div>";

} else {
	
$q1zz = $pdo->query("SELECT * FROM `smile_dir` ORDER BY `id` ASC");

while ($dir=$q1zz->fetch()) {
	
echo '<a style="cursor:pointer;" onclick="display_smiles('.$dir['id'].')">';
echo "".detect($dir['name'])." ";
echo "(".$pdo->queryFetchColumn("SELECT COUNT(*) FROM `smile` WHERE `dir` = '".$dir['id']."'").")";
echo "</a>";

}

}


echo "</div>";

} else {
	
	
$where = filter($_GET['id']);
$cat=$pdo->fetchOne("SELECT * FROM `smile_dir` WHERE `id` = ?",[$where]);		
	
echo "<div class='simptom_mail_71'>";
echo "<b>აირჩიეთ სმაილი</b>";
echo "</div>";

echo "<div class='simptom_mail_74'>";

$k_post=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `smile` WHERE `dir` = '".$cat['id']."'");

if ($k_post==0) {
	
echo "<div class='err'>";
echo "სმაილები არ არის!";
echo "</div>";

} else {
	
$q1zwqwe=$pdo->query("SELECT * FROM `smile` WHERE `dir` = '".$cat['id']."' ORDER BY `id` ASC");

while ($post=$q1zwqwe->fetch()) {
?>	
	

<span style="cursor:pointer;" onclick="textArea('<?=detect($post['smile']);?>')">
<img src='/style/smiles/<?=$post['id'];?>.gif' style='max-width: 80px;border-radius: 5px;'>
</span>

<?
}

}


echo "</div>";

}

echo "</div>";

}

?>
