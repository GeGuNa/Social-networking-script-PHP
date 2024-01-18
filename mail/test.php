<?php 


include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';


include '../inc/header.php';

$qq = new Pagination();

title();
aut();

?>

<div class="pmm_cardtitle bcwhite">
Messages
</div>



<?
//echo parseUserNameMentioned('i love you   zuzutio', '/guest/')
?>




<?




$qftch1 = $pdo->query("SELECT * FROM `contacts` 
JOIN 
`user` ON  
	`user`.`id` = `contacts`.`whom`  

WHERE 

`contacts`.`user` = '".$user['id']."' ORDER BY `contacts`.`when` DESC LIMIT 50");

?>

<div class="ActivePeople"> 


<?
while($pank2 = $qftch1->fetch()){

$psankz21 = new user($pank2['id']);		
?>

<div class="pointer" onclick="window.location='who.php?who=<?=$psankz21->id;?>'">
	
	<div>
			
		<div class="ActiveRoundedPhotos3">
			<?echo $psankz21->photoRounded22();?>	
		</div>

	</div>
	
	
	<div class="textBreakingforActive"> 
		<?echo Unescaped($psankz21->nick); ?>
	</div>
	
</div>



<?
} ?>

</div>








<?
include '../inc/footer.php';
?>
