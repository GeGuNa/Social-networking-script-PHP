<?

$qweqw = "qweqweqw   http://youtube.com/watch?v=q8dG3ptGlsU qweqweqwe";


$kqwe = preg_match("/youtube\.com\/watch\?v\=(\w+)/ui", $qweqw, $matches);


//$msg=preg_replace("/s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "<iframe style='max-width: 100%;'  src='//www.youtube.com/embed/$2' frameborder='0' allow='accelerometer; autoplay='0'; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>", $msg);

var_dump($matches);
