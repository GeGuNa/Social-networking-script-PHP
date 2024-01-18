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

$kfrc1 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends` 
JOIN `user` ON 
	`friends`.`who` = `user`.`id` 
WHERE 
`friends`.`user` = '$user[id]' AND `user`.`date_last` > '".($time-$set['online'])."'");
?>




<?

if ($kfrc1>0) { 


$qftch1 = $pdo->query("SELECT * FROM `friends` 
JOIN `user` ON 
	`friends`.`who` = `user`.`id` 
WHERE 
`friends`.`user` = '$user[id]' AND `user`.`date_last` > '".($time-$set['online'])."'  ORDER BY `user`.`date_last` DESC LIMIT 10");
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
}


?>



<? 


if (isset($_GET['search']) && strlen2($_GET['search'])>0) {
	$usearch2lk2kug = when_editing($_GET['search']);
} else {
	$usearch2lk2kug = '';
}





 ?>





	
<div class="mkzn2_2">

	<form method="get" action="?">
		
		<div class="FallMspace">	
			
		<div class="FallMspace3">
			<input type="text" placeholder="Searching by name" name="search" maxlength="32" value="<?=$usearch2lk2kug;?>">
		</div>	

		<div class="FallMspace4">
			<input type="submit" value="Search">
		</div>

		</div>	

	 
	</form>
	
</div>
 
	
	







<div class="mkzn2_1 msnglng_frpn1">




	
	
<?



if (isset($_GET['search']) && strlen2($_GET['search'])>0) {
	
	$usearch = my_esc($_GET['search']);

	$c2z1z = '%'.$usearch.'%'; 

	$navigation='?search='.when_editing($usearch).'';



/*

 and `user`.`nick` = ?
*/
	$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `contacts` 
JOIN 
`user` ON  
	`user`.`id` = `contacts`.`whom`  

WHERE 

`contacts`.`user` = ? and `user`.`nick` LIKE ? ORDER BY `contacts`.`when`", [$user['id'], $c2z1z]);


	$ttlq = $qq->calculation($kzftch322, $set['p_str']);



	$kzftch = $pdo->query("SELECT `user`.`id`,`user`.`nick` FROM `contacts` 
JOIN 
`user` ON  
	`user`.`id` = `contacts`.`whom`  

WHERE 

`contacts`.`user` = ? and `user`.`nick` LIKE ? ORDER BY `contacts`.`when` DESC LIMIT ".$ttlq.", ".$set['p_str']."", [$user['id'], $c2z1z]);




} else {



$navigation = '';


$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `contacts` WHERE `user` = '".$user['id']."' ");


$ttlq = $qq->calculation($kzftch322, $set['p_str']);



$kzftch = $pdo->query("SELECT * from `contacts`  where  `user` = '".$user['id']."' ORDER BY `when` DESC LIMIT ".$ttlq.", ".$set['p_str']."");


}







?>



 
<div class="mess_6">


<?

while ($kdata = $kzftch->fetch()) { 



//var_dump($kdata);
//exit;

if (!(isset($_GET['search']) && strlen2($_GET['search'])>0)) {
	$psank1 = new user($kdata['whom']);		
} else {
	$psank1 = new user($kdata['id']);	
}

$kzfetch1 = $pdo->fetchOne("select * from messages  where  
 `user`  = '".$user['id']."' and `whom` = '".$psank1->id."' and `deleted_by` != '".$user['id']."' or 
 `whom`  = '".$user['id']."' and `user` = '".$psank1->id."' and `deleted_by` != '".$user['id']."'
 order by `when` desc limit 1");


$hmntxtz41z_cnt = $pdo->queryFetchColumn("select count(*) from messages  where  `whom`  = '".$user['id']."' and `user` = '".$psank1->id."'  and `read` = '0'");	


?>


	<div class="pointer p_s_shover" onclick="window.location='/mail/who.php?who=<?=$psank1->id;?>'">
		
		
	<!-- first -->

		
		
		<div class="rmsmsg1_1">
	
		
				<div style=""><?=$psank1->photoRounded(48);?></div>


<!-- second -->

<div class="rmsmsg1_2">
	
	
	
				<div>
					
						<div class="rmsmsg1_3">
				
							
							<div><?=$psank1->nick();?></div>	
							<div>
								<span class="Live_Time"><? 
									if ($kzfetch1)
										echo tmdt($kzfetch1['when']); 
									else 
										echo '';
								?>
								</span></div>
										
						</div>
				
				</div>
		
	
	
				<div>
			
					<div class="rmsmsg1_4">		
							
							<div> 
								
								<span class="date">
									<? 
										if ($kzfetch1)
											echo utf_substr(Unescaped($kzfetch1['text']),0,30); 
										else 
											echo '';
									?>
								</span>
							</div>
							
							<div> 
								
								<? if ($hmntxtz41z_cnt>0) {?>
									<span class="kggren123"> <?=$hmntxtz41z_cnt;?></span>
								 <? } ?>
								</div>
							
					</div>		
					
					
				</div>	
				
				
			</div>	
			<!--  end of second-->	
		
		
		
			</div>
		
		
		
		
		</div>
	<!-- -->	
		

	

	
	
	



<? } ?>



</div>
	
<!--  end of users -->	








<?

$qq->setPage("/mail/", "$navigation");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();

?>






</div>

<?
include '../inc/footer.php';
?>
