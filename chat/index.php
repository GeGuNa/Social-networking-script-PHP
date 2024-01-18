<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';




include '../inc/header.php';
title();
aut();






$qsearch = "SELECT * FROM `chat_cats` ORDER BY id asc";	


?>


<div class="kAppPagePhtChatHeading">
		<div class="klmanchlq1illumniation"></div>
		<div class="knmaninhedq123q">Chat rooms</div>
		<div class="lmkmnaingq331">Chit-chatting with the people!</div>
</div>





	<div class="topic_match_for_you_cats chMarginTopBt1a">
		<a href="./history.php">Chat activity</a>
	</div>








<div class="gqchat_3">


<div class="gqchat2">






<?



$q21 = $pdo->query($qsearch);


$kqwle123 = $q21->rowCount();

$kqwe = 1;
while ($post = $q21->fetch())
{
	
	

?>

<div class="gqChat1">

	<div class="gqca51231">
		
			<div class="pchat1_m">
					
					<div>
						<img class="kPhx80x80" src="/chat/pics/<?=Escaped($post['pic']);?>">
					</div>
			 

					<div class="pFlexAlCenter">
						
						
						<div class="kchTDName1F2za">
							<a class="kchTDName1F" href="/chat/room.php?id=<?=$post['id'];?>"><?=Escaped($post['name']);?> </a>
						</div>
						
						<div class="mdtxtWhza1">Room is empty</div>
						
						
					</div>


			</div>
	</div>


</div>




<?

}




?>


	</div>

		</div>









<? include '../inc/footer.php'; ?>
