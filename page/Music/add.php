<?
 
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';








function convertAndBlur($imgo, $dst, $type = '') {


   $img = new Imagick($imgo);
   //$img->cropThumbnailImage($width,$height);
   //$img->resizeImage(800, 420, Imagick::FILTER_LANCZOS,1);
   //$img->setImageFormat('jpeg');
  // $img->setImageCompressionQuality(100);
 
if ($type == 'scaled') {
   $img->cropThumbnailImage(100, 120);
}
   $img->setImagePage(0, 0, 0, 0);
   $img->setImageFormat('jpeg');
   $img->writeImage($dst);


   $img->clear(); 
   $img->destroy();



}

function is_image($name) {

$allowedFiles =  array('gif', 'png', 'jpg', 'jpeg', 'webp'); 

$ext = pathinfo($name, PATHINFO_EXTENSION);

if (!in_array($ext, $allowedFiles)) {
    return false;
} else {
	return true;
}

}



if (isset($_POST['post']))
{




	if (empty($_FILES['Music']['name'])) {

			$_SESSION['message'] = "აირჩიეთ ფაილი";
			header("Location: add.php");
			exit; 
	

	} else {
		$qweFqlms = $_FILES['Music']['name'];
		
		
	$musfil1qz = explode(".", $qweFqlms); 
	$musEndz = end($musfil1qz);
		
		if ($musEndz!='mp3') {
			$_SESSION['message'] = "დაშვებულია მხოლოდ mp3 ფორმატი";
			header("Location: add.php");
			exit; 
		} else {
			
			$r3nzqd5szz_1 = rand(0,999999999);
			$rn4dqs2qq_2 = rand(0,999999999);
			
			$kkekeq1 = '/page/Music/Files/'.$r3nzqd5szz_1.'_'.$rn4dqs2qq_2.'.mp3';
			$musPqaq = $_SERVER['DOCUMENT_ROOT'].'/page/Music/Files/'.$r3nzqd5szz_1.'_'.$rn4dqs2qq_2.'.mp3';
			

			move_uploaded_file($_FILES['Music']['tmp_name'], $musPqaq);
			
		}
		
		
	}
	
	
	




	if (!empty($_FILES['photo']['name'])) {

		$picture = $_FILES['photo']['name'];

		if (!is_image($picture)) { 
			$_SESSION['message'] = "დაშვებული ფორმატები gif, png, jpg, jpeg, webp";
			header("Location: add.php");
			exit; 
		}

	}


$Name = my_esc($_POST['name']);
$Desc = my_esc($_POST['desc']);

$pCat_ID = abs((int)$_POST['kID']);


$KcatIFxe = $pdo->fetchOne("SELECT * FROM `post_music_category` WHERE `cid` = ?", [$pCat_ID]);

if (!$KcatIFxe) {
	$_SESSION['message'] = "კატეგორია არ არსებობს";
	header("Location: add.php");
	exit; 	
}


if (strlen2($Name)<3){
$_SESSION['message'] = "სახელი არ უნდა იყოს 3 სიმბოლოზე ნაკლები";
header("Location: add.php");
exit; 	
}



if (strlen2($Name)>100){
$_SESSION['message'] = "სახელი არ უნდა აღემატებოდეს 100 სიმბოლოს";
header("Location: add.php");
exit; 	
}


if (strlen2($Desc)>40000){
$_SESSION['message'] = "აღწერა არ უნდა აღემატებოდეს 40000 სიმბოლოს";
header("Location: add.php");
exit; 	
}




$ftsqee  = $user['id'];
$r3nd5s = rand(0,999999999);
$rn4ds2 = rand(0,999999999);
$rn4ds3 = rand(0,999999999);
$r3nd544s = rand(0,time());
$r3nd5s234123 = rand($r3nd5s,$r3nd544s);


$id_foto = $r3nd5s.$rn4ds3.$rn4ds2."_".time()."$r3nd544s.$r3nd5s234123";


if (!empty($_FILES['photo']['name'])) {
	
	
$picture = $_FILES['photo']['tmp_name'];

$picturePath = $_SERVER['DOCUMENT_ROOT'].'/page/Music/images/'.$id_foto.'.jpg';


convertAndBlur($picture, $picturePath);	


$flmsqwe = $id_foto;	

} else {

$flmsqwe = '';

}



$pdo->query("INSERT INTO `post_music` (`when`, `name`, `desc`, `whom`, `pimage`,`cid`, `musLnk`) values(?,?,?,?,?,?,?)", [$time, $Name, $Desc, $user['id'], $flmsqwe, $pCat_ID, $kkekeq1]);




$st = $pdo->getLastInsertedId();


$_SESSION['message'] = 'ჩანაწერი წარმატებით დაემატა';
header("Location: post.php?id=$st");
exit;



}


$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `notes` where `post_type` = 'note' ");



include '../../inc/header.php';
title();
aut();


?>










<div class="kAppPagePhtMusicHeading">
		<div class="klmanchlq1illumniation"></div>
		<div class="knmaninhedq123q">Music</div>
		<div class="lmkmnaingq331">Post new music and listen music uploaded by others</div>
</div>








<div class="pBlueWw2" style="margin-top:0;">
	
	
<div class="lLTl21zblt"> 
<a href="./">Latest</a>
</div>	

<div class="lLTl21zblt"> 
<a href="./my.php">My</a>
</div> 


<div class="lLTl21zblt">  
<a href="./popular.php">Popular</a>
</div>



	
	
</div>








<div class='ftrwithborder'>
<form method='post' enctype="multipart/form-data"  action='add.php'>


<div class="form-group">
<label class="form-label">  Name </label>
<input type="text" name="name" minlength="3" maxlength="100" required value="" placeholder="Name">
</div>


<div class="form-group">
<label class="form-label">Description </label>
<textarea name="desc" rows="5" minlength="3" maxlength="40000" required placeholder="Description"></textarea>  
</div>


	<div class="form-group"> 
		<label class="form-label">Category</label>
		<select  name="kID" class="form-label">
		
		<?
		
		$qfetch = $pdo->query("SELECT * FROM `post_music_category` ORDER BY `cid`");

		while($kq13 = $qfetch->fetch()) {
			echo "<option value='$kq13[cid]'>$kq13[name]</option>";
		}
		
		
		?>
		
		</select>
	</div>





	<div class="form-group"> 
		<label class="form-label">* File (Audio file)</label>
		<input type="file" name="Music" accept="audio/*" id="subject" value="" required> 
	</div>

	<div class="form-group"> 
		<label class="form-label">Photo</label>
		<input type="file" name="photo" id="subject" value=""> 
	</div>







<div class="form-group"> 
	<input name="post" type="submit" value="Post">
</div>	

</form>
</div>


<div class='break'>
 <a href='./'>Back</a>
</div>


<?
include '../../inc/footer.php';
?>
