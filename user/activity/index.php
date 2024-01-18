<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';


include '../../inc/header.php';


title();
aut();
 
 

$kzftch322=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `notes_komm`  WHERE `id_user` = ?",[$user['id']]);

$qq = new Pagination();

$ttlq = $qq->calculation($kzftch322, $set['p_str']);

$qf12 = $pdo->query("SELECT * FROM `notes_komm` WHERE `id_user` = ? ORDER BY `time` DESC LIMIT $ttlq, $set[p_str]",[$user['id']]);


?>


<div class="uu_bbcprq22 t_ttlqabt">My activity</div>

<?


if ($kzftch322 == 0)
{
echo "<div class='SometimesDiplay'>";
echo "Here's nothing";
echo "</div>";
}

?>


<?

while ($post = $qf12->fetch())
{

$nt2s = $pdo->fetchOne("SELECT * FROM `notes` WHERE `id` = ?", [$post['id_notes']]);


if ($nt2s['post_type'] == 'post')
	$purll1 = '/page/posts/';
else 
	$purll1 = '/page/notes/list.php'; 


$pank = new user($post['id_user']);	
?>


<div class="mact_2">




	<div class="mact_1"><?=utf_substr(Unescaped($post['msg']),0,200);?> </div>
	<div>
		

		<div> 
			<? if ($nt2s['post_type'] != 'post'){ ?>
	
			<span class="black"> Commented on </span> 
					<a class="clbble" href="<?=$purll1;?>?id=<?=$nt2s['id'];?>"><?=utf_substr(Unescaped($nt2s['name']),0,50);?></a>
			<? } else { ?>
					<a class="clbble" href="<?=$purll1;?>?id=<?=$nt2s['id'];?>">See the post</a>
			<? } ?>
			
			
		</div>

		
		
		<div class="date"><?=when($post['time']);?></div>
		
	</div>




</div>










<?
} ?>



<div class="cl_foot1">
<a href="/">Home</a>
</div>


<?

$qq->setPage("/user/activity/");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();


?>







<?

include '../../inc/footer.php';
?>
