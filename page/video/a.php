<?php


$id ="7056806911955";


//https://ok.ru/video/7056806911955
//https://ok.ru/videoembed/7056806911955
$html = file_get_contents("https://ok.ru/videoembed/".$id);


$qweqw = "https://ok.ru/video/   qweqwe qeqweqweqwe";


/*
array(3) { 
	
[0]=> array(2) { [0]=> string(25) "ok.ru/video/7056806911955" [1]=> string(24) "ok.ru/live/7056806911955" } 
[1]=> array(2) { [0]=> string(5) "video" [1]=> string(4) "live" } 
[2]=> array(2) { [0]=> string(13) "7056806911955" [1]=> string(13) "7056806911955" } 

}*/



//$kqwe = preg_match_all("/ok.ru\/(video|live)\/(\d+)/ui", $qweqw, $matches);

//var_dump($matches);

if (preg_match('|<div class="vp_video_stub_txt">Видео не найдено</div>|i', $html)) {
	echo 'ვიდეო არ არსებობს';
	exit;
} else {
	
	
preg_match('|<title>(.*?)</title>|i', $html, $mnqwe);
	
var_dump($mnqwe);	
	
//preg_match('|<div class="vp_video_stub_txt">Видео не найдено</div>|i', $html, $match);
	
	
//<img src="https://i.mycdn.me/image?id=982604599251&amp;t=50&amp;plc=WEB&amp;tkn=*igrv0BeeZCsZIeqmMdRXSjzJduI&amp;fn=external_8" area-hidden="true" class="vid-card_img" style="">	
	
}

echo $html;

//https://ok.ru/live/1620013293514
?>




<script>


function parseOkRuDomain(url) {
  // Find the index of the first "ok.ru" substring.
  const okRuIndex = url.indexOf("https://ok.ru/live");

	//const okRuIndex = url.indexOf("https://ok.ru/video");



  // If the "ok.ru" substring is found, return the substring from the index of "ok.ru" to the next white space character.
  if (okRuIndex !== -1) {
    const nextWhiteSpaceIndex = url.indexOf(" ", okRuIndex);
    return url.substring(okRuIndex, nextWhiteSpaceIndex !== -1 ? nextWhiteSpaceIndex : url.length);
  }

  // If the "ok.ru" substring is not found, return an empty string.
  return "";
}



function parseOkRuDomain2(url) {
  // Find the index of the first "ok.ru" substring.
  //const okRuIndex = url.indexOf("https://ok.ru/live");

	const okRuIndex = url.indexOf("https://ok.ru/video");

console.log(okRuIndex)

  // If the "ok.ru" substring is found, return the substring from the index of "ok.ru" to the next white space character.
  if (okRuIndex !== -1) {
    const nextWhiteSpaceIndex = url.indexOf(" ", okRuIndex);
    return url.substring(okRuIndex, nextWhiteSpaceIndex !== -1 ? nextWhiteSpaceIndex : url.length);
  }

  // If the "ok.ru" substring is not found, return an empty string.
  return "";
}



const url = "qhttps://ok.ru/live/1620013293514  https://ok.ru/video/1620013293514 qweq eqw eqwe";
const okRuDomain = parseOkRuDomain2(url);

console.log(okRuDomain); // Output: "ok.ru"



</script>
