<?

function convertAndBlur($imgo, $dst, $type = '') {


   $img = new Imagick($imgo);
   
   
	if ($type == 'scaled') {
	   $img->cropThumbnailImage(100, 120);
	}
   $img->setImagePage(0, 0, 0, 0);
   $img->setImageFormat('jpeg');
   $img->writeImage($dst);


   $img->clear(); 
   $img->destroy();



}

$id_foto = rand(1,99999);

$picture = './Black.jpeg';

$picturePath = './'.$id_foto.'.jpg';


convertAndBlur($picture, $picturePath);	
