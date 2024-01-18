<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';


//echo random_string(20);

function convertAndBlur($inputIMG, $dst, $width, $height, $quality) {


   $img = new Imagick($inputIMG);
   $img->cropThumbnailImage($width,$height);
   $img->setImageFormat('jpeg');
  // $img->setImageCompressionQuality($quality);
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




if (isset($_POST['add']) && isset($_FILES['file']))
{
	


if (strlen2($_POST['name'])<1){
	header("Location: ?");
	exit; 
}

if (strlen2($_POST['name'])>100){
	$_SESSION['message'] = 'სახელი მაქსიმუმ 100 სიმბოლო';
	header("Location: ?");
	exit; 
}



if (strlen2($_POST['description'])>0)
{

if (strlen2($_POST['description'])>500){
	header("Location: ?");
	exit; 
}

}


if (!in_array($_POST['can_post'], array('0','1','2'))){
	header("Location: ?");
	exit; 
}

if (!in_array($_POST['can_see'], array('0','1','2'))){
	header("Location: ?");
	exit; 
}


$cansee = number($_POST['can_see']);
$canpost = number($_POST['can_post']);


$picture = $_FILES['file']['name'];


if(!is_image($picture)) { 
$_SESSION['message'] = "დაშვებული ფორმატები gif, png, jpg, jpeg, webp";
header("Location: ?");
exit; 
}



$imgewweee = new Imagick($_FILES['file']['tmp_name']);



if (filesize($_FILES['file']['tmp_name'])>10*1024*1024)
{
$_SESSION['message'] = 'ფაილის ზომა დიდია: '.size_file($size);
header("Location: ?");
exit; 
}



if (!isset($_SESSION['message'])) {


   $mqwe = ['pic','photo','nphoot','jphoto','_pic_','foto','picture'];
   $kq = rand(0, count($mqwe)-1);
   $plmblah = $mqwe[$kq];
   $ph31_p4 = random_string(20);

   $ph31_p1 = str_shuffle("1234567804512451_1231_4123_abvczxcqwqtytyiypu");
   $ph31_p2 = str_shuffle($time);
   $ph31_p3 = my_esc("".$ph31_p4."".$plmblah."_".$time."".rand(0,9999999)."_".rand(0,9999999)."_pic".$ph31_p1);





$pdo->query("INSERT INTO `gallery_foto` (`id_gallery`, `name`, `photo_mime`, `type`, `description`, `id_user`, `time`, `photo_comment`, `photo_seeing`,`photo_addr`) values (?, ?, ?, ?, ?, ?, ?,?,?,?)",[$user['id'], my_esc($_POST['name']), 'jpg', 'image/jpeg', my_esc($_POST['description']), $user['id'], $time,$canpost,$cansee, $ph31_p3]);




$id_foto = $pdo->getLastInsertedId();
	
	
$picture = $_FILES['file']['tmp_name'];


$picturePath = $_SERVER['DOCUMENT_ROOT'].'/images/gallery/48/'.$ph31_p3.'.jpg';
convertAndBlur($picture, $picturePath, 50, 50, 100);


$picturePath = $_SERVER['DOCUMENT_ROOT'].'/images/gallery/128/'.$ph31_p3.'.jpg';
convertAndBlur($picture, $picturePath, 128, 128, 100);

	
$picturePath = $_SERVER['DOCUMENT_ROOT'].'/images/gallery/640/'.$ph31_p3.'.jpg';
convertAndBlur($picture, $picturePath, 640, 640, 100);

	
$picturePath = $_SERVER['DOCUMENT_ROOT'].'/images/gallery/foto/'.$ph31_p3.'.jpg';
convertAndBlur($picture, $picturePath, $imgewweee->getImageWidth(), $imgewweee->getImageHeight(), 100);



header("Location: /foto/foto.php?id=".$id_foto);
exit;
}







}



include '../inc/header.php';
title();
aut();


if (isset($err))
{	
echo "<div class='err'>";
echo "$err";
echo "</div>";
}
	


?>


<div class="PHeadLine fnt">Add photo</div>






<div class="form">
<form enctype="multipart/form-data" action="?" method="post">



<div class="form-group">
<label class="form-label">  Name </label>
<input name="name" type="text" required value="" minlength="1" maxlength="100">
</div>


<div class="form-group">
<label class="form-label"> Description </label>
<textarea maxlength="500" name="description"></textarea>
</div>


<div class="form-group"> 
<label class="form-label">Photo</label>
<input type="file" name="file" accept="image/*">
</div>		

		

<div class="form-group"> 
<label class="form-label">Who can see</label>
<select name="can_see">  
<option value="0" selected>Everyone</option>
<option value="1">Only friends</option>
<option value="2">No one</option> 
</select>
</div>


<div class="form-group"> 
<label class="form-label">Who can comment</label>
<select name="can_post">  
<option value="0" selected>Everyone</option>
<option value="1">Only friends</option>
<option value="2">No one</option> 
</select>
</div>		
		





<input class="submit" name="add" type="submit" value="Add"> 


</form></div>



<div class="czFTr21 brdrtop">
	
	<a href="my.php?id=<?echo $user['id'];?>">Back</a> 
 
</div>



 
 


<?
include '../inc/footer.php';

?>
