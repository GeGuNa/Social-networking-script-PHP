<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';




function convertAndBlur($imgo, $dst, $type = '') {


   $img = new Imagick();
   $img->readImageBlob($imgo);

   //$img->cropThumbnailImage($width,$height);
   //$img->resizeImage(800, 420, Imagick::FILTER_LANCZOS,1);
   //$img->setImageFormat('jpeg');
  // $img->setImageCompressionQuality(100);
 

   $img->cropThumbnailImage(480, 360);


   $img->setImagePage(0, 0, 0, 0);
   $img->setImageFormat('jpeg');
   $img->writeImage($dst);


   $img->clear(); 
   $img->destroy();



}



if (isset($_POST['add']))
{

	$youtube = my_esc($_POST['url']);
	


	$url = my_esc($youtube);

	$desc = my_esc($_POST['description']);

	if (strlen2($desc)>1024)Error('აღწერა არ უნდა აღემატებოდეს 1024 სიმბოლოს', "?");
	

	$file = get_vidOK($url);
		

	if ($file==false)Error('ვიდეო არ მოიძებნა', "?");


if (!isset($_SESSION['err'])) {

$name2 = my_esc($file);


$kqwe = preg_match("/ok.ru\/(video|live)\/(\d+)/ui", $url, $matchV);

if ($kqwe) {
	
$vidUlrqp = $matchV[0];
	
$lqwke3zsq3 = str_replace(['live','video'], ['videoembed','videoembed'], $vidUlrqp);


$html2Da = file_get_contents("https://$lqwke3zsq3");


	
preg_match('|<img src="(.*?)" area-hidden="true" class="vid-card_img" style="">|i', $html2Da, $kvidImg);
	
	

$kimgqq  = str_replace('&amp;','&', $kvidImg[1]);

$picture = file_get_contents("$kimgqq");	
	
//$picture = $_FILES['photo']['tmp_name'];


$ftsqee  = $user['id'];
$r3nd5s = rand(0,999999999);
$rn4ds2 = rand(0,999999999);
$rn4ds3 = rand(0,999999999);
$r3nd544s = rand(0,time());
$r3nd5s234123 = rand($r3nd5s,$r3nd544s);


$id_foto = $r3nd5s.$rn4ds3.$rn4ds2."_".time()."$r3nd544s.$r3nd5s234123";


	
	






$picturePath = $_SERVER['DOCUMENT_ROOT'].'/page/video/images/'.$id_foto.'.jpg';


convertAndBlur($picture, $picturePath);		

$flmsqwe = $id_foto;	
 

} else {

$flmsqwe = '';

}
	







$pdo->query("INSERT INTO `video` (`name`,`url`,`description`,`time`,`id_user`,`picurl`) values(?,?,?,?,?,?)",[$name2,$url, $desc, $time, $user['id'], "$flmsqwe"]);
		
		
		
$video = $pdo->getLastInsertedId();
	
	
	
		


header('Location: video.php?id='.$video);
exit;

}

}




include '../../inc/header.php';

title();
aut();






?>


	<div class="TtlWzw221s fnt">Add new video</div>

	<div class="nav1">
		
		<form method="post" action="?">

			<div class="form-group">
			<label class="form-label">Youtube video id:</label>
			<input type="text"  value="" name="url" maxlength="250" required placeholder="youtube video id"/>
			</div>


			<div class="form-group">
			<label class="form-label">Description:</label>
			<textarea name="description" maxlength="1024" placeholder="video description"></textarea>
			</div>


			<input value="Add" name="add" type="submit">

		</form>

	</div>


<div class="cl_foot2">
<a href="./">Back</a><br />
</div>



<div class="cl_foot3">
 <a href="/index.php"> Home </a>
</div>

<?
include '../../inc/footer.php';
?>
