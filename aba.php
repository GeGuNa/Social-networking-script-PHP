<?php

//echo "qweqweqwe";

//var_dump($_FILES);

//if (!isset($_POST))exit;


$qq = $_POST['text'];
$qq2 = $_FILES['Recording']['tmp_name'];

$eqwen = rand(1,99999)."_$time.wav";	
	
//mysql_query("INSERT INTO `mail` (`id_user`, `id_kont`, `msg`, `time`, `attachments`) values('".$user['id']."', '".$peer['id']."', '".$eqwen."', '".$time."', '1')");

//$id_mail = mysql_insert_id();
				
			
				
				
 copy($qq2, $_SERVER['DOCUMENT_ROOT']."/guest/files/$eqwen");


$qqq = [];
$qqq['lnk'] = $eqwen;



echo json_encode($qqq);
