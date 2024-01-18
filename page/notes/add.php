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
   $img->cropThumbnailImage(100,120);
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



if (!empty($_FILES['photo']['name'])) {

$picture = $_FILES['photo']['name'];

if (!is_image($picture)) { 
$_SESSION['message'] = "დაშვებული ფორმატები gif, png, jpg, jpeg, webp";
header("Location: add.php");
exit; 
}

}


$title = my_esc($_POST['title']);
$msg = my_esc($_POST['subject']);

$cansee = number($_POST['can_see']);
$canpost = number($_POST['can_post']);


if (!in_array($cansee, array('0','1','2')))Error('უუპს'); 
if (!in_array($canpost, array('0','1','2')))Error('უუპს'); 


if (strlen2($title)>100){
$_SESSION['message'] = "სათაური არ უნდა აღემატებოდეს 100 სიმბოლოს";
header("Location: add.php");
exit; 	
}
	
	
if (strlen2($title)<1){
$_SESSION['message'] = "სათაური არ უნდა იყოს ცარიელი";
header("Location: add.php");
exit; 	
}

if (strlen2($msg)>40000){
$_SESSION['message'] = "ტექსტი არ უნდა აღემატებოდეს 40000 სიმბოლოს";
header("Location: add.php");
exit; 	
}



if (strlen2($msg)<3){
$_SESSION['message'] = "ტექსტი არ უნდა იყოს 3 სიმბოლოზე ნაკლები";
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

$picturePath = $_SERVER['DOCUMENT_ROOT'].'/page/notes/images/'.$id_foto.'.jpg';
$picturePath3 = $_SERVER['DOCUMENT_ROOT'].'/page/notes/images/mini/'.$id_foto.'.jpg';


convertAndBlur($picture, $picturePath);	
convertAndBlur($picture, $picturePath3, 'scaled');	


$flmsqwe = $id_foto;	

} else {

$flmsqwe = '';

}




$pdo->query("INSERT INTO `notes` (`time`, `msg`, `name`, `id_user`, `typef`,`image`,`can_see`, `can_post`) values(?,?,?,?,?,?,?,?)", [$time, $msg, $title, $user['id'], $type, $flmsqwe, $cansee, $canpost]);




$st = $pdo->getLastInsertedId();


$_SESSION['message'] = 'ჩანაწერი წარმატებით დაემატა';
header("Location: list.php?id=$st");
exit;



}


$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `notes` where `post_type` = 'note' ");



include '../../inc/header.php';
title();
aut();


?>






<div style="">


			

		<div class="phtshnq11a">
			
			
			<div>

				<div class="phthdrsctns">
					<div>Blog Posts</div>
					<div class="phAlcntrDv"><div class="HdrFrqThngs1z"><?=$kzftch322;?></div></div>
				</div>			
				
			</div>


			<div>
				
				
	<a href="./add.php">Post new</a>
			
			</div>
		
		
		</div>




</div>



<div class="pBlueWw2" style="margin-top:0;">
	
	
<div class="lLTl21zblt"> 
<a href="./">Latest</a>
</div>	

<div class="lLTl21zblt"> 
<a href="./user.php">My</a>
</div> 


<div class="lLTl21zblt">  
<a href="./rating.php">Popular</a>
</div>



	
	
</div>











<div class='ftrwithborder'>
<form method='post' enctype="multipart/form-data"  action='add.php'>


<div class="form-group">
<label class="form-label">  Title </label>
<input type="text" name="title" minlength="3" maxlength="100" required value="" placeholder="Title">
</div>


<div class="form-group">
<label class="form-label">Text </label>
<textarea name="subject" rows="5" minlength="3" maxlength="40000" required placeholder="Text goes here"></textarea>  
</div>


<div class="form-group"> 
<label class="form-label">Photo:</label>
<input type="file" name="photo" id="subject" value=""> 
</div>


<div class="form-group"> 
<label class="form-label">Who can see:</label>
<select name="can_see">  
<option value="0" selected>Everyone</option>
<option value="1">Only friends</option>
<option value="2">No one</option> 
</select>
</div>


<div class="form-group"> 
<label class="form-label">Who can comment:</label>
<select name="can_post">  
<option value="0" selected>Everyone</option>
<option value="1">Only friends</option>
<option value="2">No one</option> 
</select>
</div>

<div class="form-group"> 
	<input name="post" type="submit" value="Post">
</div>	

</form>
</div>


<div class='break'>
 <a href='/page/notes/'>Back</a>
</div>


<?
include '../../inc/footer.php';
?>
