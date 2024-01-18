<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';

include 'review.php';


if (!isset($_GET['id'])) {
	header('Location: /index.php');
	exit;
}

if (!is_numeric($_GET['id'])) {
	header('Location: /index.php');
	exit;
}	

$kpid1_ll = filter($_GET['id']);

$contest = $pdo->fetchOne("SELECT * FROM `contests` WHERE `cid` = ?", [$kpid1_ll]);




if (!$contest)
{
	header('Location: /index.php');
	exit;
}


if ($contest['contest_status']=='closed') {
	header('Location: /index.php');
	exit;	
}






if ($pdo->queryFetchColumn("select count(`pid`) from `contest_participant_photos` where `user_id` = ? and `object_id` = ?",[$user['id'], $contest['cid']])>0) {
	header('Location: /index.php');
	exit;		
}




$hwmparticipantsarethere = $pdo->queryFetchColumn("select count(*) from `contest_participants` where `object_id` = ?",[$contest['cid']]);



$ifiamparticipating = $pdo->queryFetchColumn("select count(`pid`) from `contest_participants` where `user_id` = ? and `object_id` = ?",[$user['id'], $contest['cid']]);


if ($ifiamparticipating == 0) {

	header('Location: /index.php');
	exit;	

}




	
	if ($ifiamparticipating == 0 && $hwmparticipantsarethere>=$contest['howmanypeople']) {
		header('Location: /index.php');
		exit;		
	}




if (isset($_POST['add'])) {

//$qweq = count($_FILES['photos']);


$countfiles = count($_FILES['photos']['name']);


for ($i=0; $i<$countfiles; $i++) {
   
  $filename = $_FILES['photos'];
 
 
 
 $qqwe = str_shuffle("1234567890qwertyuioplkjhgfdsazxcvbnm_");
 
 
 $qwe312qq123  =  str_shuffle($time."".$qqwe);
 
 $qwe312qq1231_q = $qwe312qq123.$time;
 
 
 if (!ifImage($filename['name'][$i], $filename['tmp_name'][$i])) {
	 $_SESSION['message'] = "ჭკვიანო";
	 header('Location: /index.php');
	 exit;	 
 }
 
 
 
 
 
 
 
 
 
   move_uploaded_file($filename['tmp_name'][$i], $_SERVER['DOCUMENT_ROOT']."/page/contests/images/".$qwe312qq1231_q.".jpg");
   
   
   $pdo->exec("insert into `contest_participant_photos` (`when`,`photo`, `user_id`, `object_id`) values('$time', '$qwe312qq1231_q.jpg', '$user[id]', '$contest[cid]')");
   
 /*  create table `contest_participant_photos` (
`pid` bigint(64) unsigned not null auto_increment,
`when` bigint(64) unsigned not null,
`photo` varchar(1024) default '',
`user_id` bigint(64) unsigned not null,
`object_id` bigint(64) unsigned not null,
PRIMARY KEY (`pid`)
) AUTO_INCREMENT=1;
   */
   
   
   
   
   
   
   
   
   // echo($filename['name'][$i])."<br/>";
   // echo($filename['tmp_name'][$i])."<br/>";
    
   // qwe312qq1231_q
    
    
    
 }




header("location: contest.php?id=$contest[cid]");
exit;



//var_dump($qweq);

	
}





$author = get_user($contest['user_id']);

include '../../inc/header.php';

title();
aut(); 

?>




<div class="uusrspc_Hmdvs1">
	
	
	
	
	


<div class="TtlWzw221s fnt">ფოტოს დამატება</div>



<div class="nav1">

<form method="post" action="?id=<?=$contest['cid'];?>" enctype="multipart/form-data">



<div class="form-group">
<label class="form-label">ფოტო(ები)</label>
<input type="file" value="" name="photos[]" accept="image/*" multiple maxlength="3" required>
</div>


<div class="form-group">
<input value="ატვირთვა" name="add" type="submit">
</div>



</form></div>


<div class="cl_foot2">
<a href="/page/contests/contest.php?id=<?=$contest['cid'];?>">Back</a><br>
</div>



<div class="cl_foot3">
 <a href="/index.php"> მთავარზე </a>
</div>




	</div>













<?
include '../../inc/footer.php';
?>
