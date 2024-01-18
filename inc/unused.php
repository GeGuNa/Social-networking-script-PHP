<?php

defined('in') or die('uups');

?>


<?php




preg_match('~https?://(?:www\.)?tiktok\.com/\S*/video/(\d+)|https?://(?:www\.)?vm.tiktok.com/\S*/~', $msg, $patternForTik);


if (isset($matche333s[1])) {
   // $tiktokVideoURL = "https://www.tiktok.com/@{$matche333s[1]}/video/{$matche333s[2]}";
    
    
 // echo "tok ".$matche333s[0];
   
   
   
    $qweqw31a = file_get_contents("https://www.tiktok.com/oembed?url=".$matche333s[0]."");
  	$lqdc = json_decode($qweqw31a);
	$tkqmeqvid  =  $lqdc->html;
    $tkqmeqvidurl  =  $lqdc->author_url;
    //$updatedURL = "$tkqmeqvidurl/video/$matches3[1]";

   
	//echo $updatedURL;
	$msg = preg_replace('~https?://(?:www\.)?tiktok\.com/\S*/video/(\d+)|https?://(?:www\.)?vm.tiktok.com/\S*/~', $tkqmeqvid, $msg);
} 

    
    
    
    
    
    
    
preg_match('/https:\/\/www\.tiktok\.com\/@.*\/video\/(\d+)/', $msg, $matches3);


if (isset($matches3[1])) {


    $tiktokVideoID = $matches3[0].$matches3[1];

var_dump($matches3[0]);

	$qweqw31a = file_get_contents("https://www.tiktok.com/oembed?url=".$matches3[0]."");
	$lqdc = json_decode($qweqw31a);
	$tkqmeqvid  =  $lqdc->html;
    $tkqmeqvidurl  =  $lqdc->author_url;
    $updatedURL = "$tkqmeqvidurl/video/$matches3[1]";
   
   
	//echo $updatedURL;
	$msg = preg_replace('/https:\/\/www\.tiktok\.com\/@.*\/video\/(\d+)/', $tkqmeqvid, $msg);
}




?>


    <form>
        <label for="inputField">Input:</label>
        <input type="text" id="inputField" name="inputField" minlength="5" maxlength="5" required>
        <button type="submit">Submit</button>
    </form>


<?php


  function str_rand(int $length = 16){
        $x = '';
        for($i = 1; $i <= $length; $i++){
            $x .= dechex(random_int(0,255));
        }
        return substr($x, 0, $length);
    }
    
    
    
function encode_number($num) {
    $binary_rep = decbin($num); 
    $encoded_string = str_replace(['0', '1'], ['A', 'B'], $binary_rep);
    return $encoded_string;
}

function decode_number($encoded_string) {
    $binary_rep = str_replace(['A', 'B'], ['0', '1'], $encoded_string);
    $decoded_num = bindec($binary_rep); // Convert binary to decimal
    return $decoded_num;
}



?>


<?php

// Rows per page
$rowsPerPage = 10;

// Desired id
$desiredId = 11;
/*
// Create a PDO connection
try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
*/
// Query the total number of records
//$totalRecordsQuery = "SELECT COUNT(*) FROM your_table";
//$totalRecords = $pdo->query($totalRecordsQuery)->fetchColumn();

$totalRecords = 1250;

// Calculate total number of pages
$totalPages = ceil($totalRecords / $rowsPerPage);

// Calculate the page for the desired id
$desiredPage = ceil($desiredId / $rowsPerPage);


// Display the result
echo "Total Records: $totalRecords \n";
echo "Total Pages: $totalPages \n";
echo "Desired ID: $desiredId is on Page: $desiredPage \n";



?>




<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

function cropImage($imagePath, $width, $height) {
    $imagick = new Imagick($imagePath);
  //  $imagick->resizeImage($width, $height, Imagick::FILTER_LANCZOS, 1);
  $imagick->scaleImage(800, 150, true);
   // $imagick->writeImage($destinationPath.'/'.$fileName);

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}


//cropImage($_SERVER['DOCUMENT_ROOT'].'/page/notes/pics/b12f7b64f7387f139ac14ee4d603c357.jpg',570,660);



/*

$thumb = new Imagick();
$thumb->readImage('myimage.gif');    
$thumb->resizeImage(320,240,Imagick::FILTER_LANCZOS,1);
$thumb->writeImage('mythumb.gif');
$thumb->clear();
$thumb->destroy(); 


*/


set_cookie()

?>




<?php



function my_esc($str)
{
	return removeControlCharacters($str);
}



function removeControlCharacters($inputString) {
    // Remove characters with ASCII values from 0 to 31 using loop
    $outputString = '';
    for ($i = 0; $i < strlen($inputString); $i++) {
        $char = $inputString[$i];
        $asciiValue = ord($char);
        if ($asciiValue >= 32) {
            $outputString .= $char;
        }
    }
    return $outputString;
}



$inputString = "Hello\x0A\x1F World!";
$result = removeControlCharacters($inputString);
echo $result; // Output: "Hello World!"

?>



<?php


function covtime23($youtube_time){
        preg_match_all('/(\d+)/',$youtube_time,$parts);
        $hours = floor($parts[0][0]/60);
        $minutes = $parts[0][0]%60;
        $seconds = $parts[0][1];
        if($hours != 0)
            return $hours.':'.$minutes.':'.$seconds;
        else
            return $minutes.':'.$seconds;
    }   
    
    
    
   function covtim3e($youtube_time){
            preg_match_all('/(\d+)/',$youtube_time,$parts);
            $hours = $parts[0][0];
            $minutes = $parts[0][1];
            $seconds = $parts[0][2];
            if($seconds != 0)
                return $hours.':'.$minutes.':'.$seconds;
            else
                return $hours.':'.$minutes;
        }  



function covtimez($youtube_time){
    if($youtube_time) {
        $start = new DateTime('@0'); // Unix epoch
        $start->add(new DateInterval($youtube_time));
        $youtube_time = $start->format('H:i:s');
    }
    
    return $youtube_time;
}   

echo covtime('PT2H34M25S');




function covtime($youtube_time){
    if($youtube_time) {
        $start = new DateTime('@0'); // Unix epoch
        $start->add(new DateInterval($youtube_time));
        $youtube_time = $start->format('H:i:s');
    }
    
    return $youtube_time;
}   

//echo covtime('PT2H34M25S');


$duration = new \DateInterval($data['items'][0]['contentDetails']['duration']);
echo $duration->format('%H:%i:%s');


function YoutubeVideoInfo($video_id) {

       /* $url = 'https://www.googleapis.com/youtube/v3/videos?id='.$video_id.'&key=AIzaSyBKdP1gf7Ldhn71FKpzC4XTSa7Efjzlm54&part=snippet,contentDetails';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response);
        //print_t($response_a); if you want to get all video details
        return  $response_a->items[0]->contentDetails->duration; //get video duaration
        
        */
      
      
$api_key = "AIzaSyBKdP1gf7Ldhn71FKpzC4XTSa7Efjzlm54";

$url = "https://www.googleapis.com/youtube/v3/videos?id=" . $video_id . "&key=" . $api_key . "&part=snippet,contentDetails,statistics,status";
$json = file_get_contents($url);
$getData = json_decode($json , true);

/*foreach((array)$getData['items'] as $key => $gDat){
    $title = $gDat['snippet']['title'];
}*/
// Output title
var_dump($getData); 
        
        
        
        
      }
 //passing youtube videoId to function 
 YoutubeVideoInfo('RH2dkHpQu5E');



?>


<?php
// router.php
if (preg_match('/\.(?:png|jpg|jpeg|gif)$/', $_SERVER["REQUEST_URI"])) {
    return false;    // serve the requested resource as-is.
} else { 
    echo "<p>Welcome to PHP</p>";
}
?>



<?

function calculate_age( $date ) { 
    $age = date('Y') - $date; 
   if (date('md') < date('md', strtotime($date))) { 
       return $age - 1; 
   } 
   return $age; 
} 

echo calculate_age('1987')." years old.";




function get_age(){
	return floor((strtotime('2020-02-15') - strtotime('2019-02-14') ) / 31556926); 
}

function gg($year, $month, $day){
	
$dateOfBirth = "$day-$month-$year";
 
// Create a datetime object using date of birth
$dob = new DateTime($dateOfBirth);
 
// Get current date
$now = new DateTime();
 
// Calculate the time difference between the two dates
$diff = $now->diff($dob);
 
// Get the age in years, months and days
echo "Your current age is ".$diff->y." years.";
 
// Get the age in years, months and days
echo "Your current age is ".$diff->y." years ".$diff->m." months ".$diff->d." days.";	
	
}

?>


<?php



function rek($msg)
{
//$msg =  preg_replace('#(mylov|my lov|m y l o v|my l o v|my lo v|mylo v|myl ov|m ylov|my l o v|vale|.mobi|.org|.com|shegide|yleooo|.ru)#i','Reklama',$msg);
return $msg;
}

function auto_bb($form, $field) {
    global $bb_start;
    $out = '';
    if (!$bb_start) {
        $out = '<script language="JavaScript" type="text/javascript">;
	function tag(text1, text2) {
	if ((document.selection)) {
	document.' . $form . '.' . $field . '.focus();
	document.' . $form . '.document.selection.createRange().text = text1+document.' . $form . '.document.selection.createRange().text+text2;
	} else if(document.forms[\'' . $form . '\'].elements[\'' . $field . '\'].selectionStart!=undefined) {
	var element = document.forms[\'' . $form . '\'].elements[\'' . $field . '\'];
	var str = element.value;
	var start = element.selectionStart;
	var length = element.selectionEnd - element.selectionStart;
	element.value = str.substr(0, start) + text1 + str.substr(start, length) + text2 + str.substr(start + length);
	document.forms[\'' . $form . '\'].elements[\'' . $field . '\'].focus();
	} else document.' . $form . '.' . $field . '.value += text1+text2;
	document.forms[\'' . $form . '\'].elements[\'' . $field . '\'].focus();}</script>';
        $bb_start = 1;
    }
    return $out . '<div style="margin:1px;margin-left: 5px;padding-left:2px;">
	<a href="javascript:tag(\'[b]\', \'[/b]\')"><img src="/img/bbcode/b.gif" height="18" width="18"></a>
	<a href="javascript:tag(\'[i]\', \'[/i]\')"><img src="/img/bbcode/i.gif" height="18" width="18"></a>
	<a href="javascript:tag(\'[u]\', \'[/u]\')"><img src="/img/bbcode/u.gif" height="18" width="18"></a>
	<a href="javascript:tag(\'[ex]\', \'[/ex]\')"><img src="/img/bbcode/s.gif" height="18" width="18"></a>
	<a href="javascript:tag(\'[url=]\', \'[/url]\')"><img src="/img/bbcode/url.gif" height="18" width="18"></a>
	<a href="javascript:tag(\'[red]\', \'[/red]\')"><img src="/img/bbcode/witeli.gif" height="18" width="18"></a>
	<a href="javascript:tag(\'[green]\', \'[/green]\')"><img src="/img/bbcode/mwvane.gif" height="18" width="18"></a>
	<a href="javascript:tag(\'[blue]\', \'[/blue]\')"><img src="/img/bbcode/lurji.gif" height="18" width="18"></a>
	<a href="javascript:tag(\'[black]\', \'[/black]\')"><img src="/img/bbcode/shavi.gif" height="18" width="18"></a>
	<a href="javascript:tag(\'[you400]\', \'[/you400]\')"><img src="/img/bbcode/youtube.png"></a>
<br/>
      </div>';
}




/*


function word_chunk($str, $len = 76, $end = "\n") {
    $pattern = '~.{1,'.$len.'}~u'; // like "~.{1,76}~u"
    $str = preg_replace($pattern, '$0' . $end, $str);
    return rtrim($str, $end);
}


$qweq = 'აბა';
//$po2zz = word_chunk($qweq,1);


$parts = preg_split('/\s{1}+/', $qweq, -1, PREG_SPLIT_NO_EMPTY);
//echo var_dump($parts);
//echo $parts[0];

$string = 'აბა';
$arr = preg_split('/\s+/', $string);

var_dump($arr);

echo "<br/>";
$searchStrin22g = 'ქწექწე';
$searchValues = preg_split("@[\s+　]@u", $searchStrin22g, -1, PREG_SPLIT_NO_EMPTY);

var_dump($searchValues);



echo "<br/>";

$str = 'string';
$chars = preg_split('//', $str, -1, PREG_SPLIT_NO_EMPTY);
print_r($chars);

echo "<br/>";



$str = 'ბუჯს';
$chars = preg_split('//u', $str,-1, PREG_SPLIT_NO_EMPTY);
print_r($chars);
*/




if (isset($_SERVER['HTTP_REFERER']) && !preg_match('#'.preg_quote($_SERVER['HTTP_HOST']).'#', $_SERVER['HTTP_REFERER']) && $ref=@parse_url($_SERVER['HTTP_REFERER'])){
if (isset($ref['host']))$_SESSION['http_referer']=$ref['host'];
}





function gradient($text, $from = '', $to = '', $mode = "hex")
{
  if($mode == "hex") {
    $to  =  hexdec($to[0].$to[1]).",".hexdec($to[2].$to[3]).",".hexdec($to[4].$to[5]);
    $from = hexdec($from[0].$from[1]).",".hexdec($from[2].$from[3]).",".hexdec($from[4].$from[5]);
  }

  if (empty($text)) {
    return '';
  } else {
    $levels = strlen($text);
  }
  
  if (empty($from)) {
    $from = array(0,0,255);
  } else {
    $from = explode(",", $from);
  }
  

  if (empty($to)){
    $to = array(255, 0, 0);
  } else {
    $to = explode(",", $to);
  }
     ///// $output .= "<font color=\"#" . $rgb[0].$rgb[1].$rgb[2] . "\">" . mb_substr($text, ($i - 1), 1, 'utf-8') . "</font>";

 $output = "";

  for ($i = 1; $i <= $levels; $i++) {
    for ($ii = 0; $ii < 3; $ii++) {
      $tmp[$ii] = $from[$ii] - $to[$ii];
      $tmp[$ii] = floor($tmp[$ii] / $levels);
      $rgb[$ii] = $from[$ii] - ($tmp[$ii] * $i);

      if ($rgb[$ii] > 255) $rgb[$ii] = 255;

      $rgb[$ii] = dechex($rgb[$ii]);
      $rgb[$ii] = strtoupper($rgb[$ii]);

      if (strlen($rgb[$ii]) < 2) {
         $rgb[$ii] = "0$rgb[$ii]";
      }
    }
    $output .= "<font color=\"#" . $rgb[0].$rgb[1].$rgb[2] . "\">" . mb_substr($text, ($i - 1), 1, 'utf-8') . "</font>";
  }
  return $output . "\n";
}

function geo($msg)
{
$msg=str_replace('ა', 'a', $msg);
$msg=str_replace('ბ', 'b', $msg);
$msg=str_replace('გ', 'g', $msg);
$msg=str_replace('დ', 'd', $msg);
$msg=str_replace('ე', 'e', $msg);
$msg=str_replace('ვ', 'v', $msg);
$msg=str_replace('ზ', 'z', $msg);
$msg=str_replace('თ', 't', $msg);
$msg=str_replace('ი', 'i', $msg);
$msg=str_replace('კ', 'k', $msg);
$msg=str_replace('ლ', 'l', $msg);
$msg=str_replace('მ', 'm', $msg);
$msg=str_replace('ნ', 'n', $msg);
$msg=str_replace('ო', 'o', $msg);
$msg=str_replace('პ', 'p', $msg);
$msg=str_replace('ჟ', 'j', $msg);
$msg=str_replace('რ', 'r', $msg);
$msg=str_replace('ს', 's', $msg);
$msg=str_replace('ტ', 't', $msg);
$msg=str_replace('უ', 'u', $msg);
$msg=str_replace('ფ', 'f', $msg);
$msg=str_replace('ქ', 'q', $msg);
$msg=str_replace('ღ', 'g', $msg);
$msg=str_replace('ყ', 'y', $msg);
$msg=str_replace('შ', 'sh', $msg);
$msg=str_replace('ჩ', 'ch', $msg);
$msg=str_replace('ც', 'c', $msg);
$msg=str_replace('ძ', 'dz', $msg);
$msg=str_replace('ჭ', 'j', $msg);
$msg=str_replace('წ', 'w', $msg);
$msg=str_replace('ხ', 'x', $msg);
$msg=str_replace('ჯ', 'j', $msg);
$msg=str_replace('ჰ', 'h', $msg);
return $msg;
}

function retranslit($in)
{

	$trans1= array("'",'`',',',' ',"Ё","Ж","Ч","Ш","Щ","Э","Ю","Я","ё","ж","ч","ш","щ","э","ю","я","А","Б","В","Г","Д","Е","З","И","Й","К","Л","М","Н","О","П","Р","С","Т","У","Ф","Х","Ц","Ь","Ы","а","б","в","г","д","е","з","и","й","к","л","м","н","о","п","р","с","т","у","ф","х","ц","ь","ы");
	
	$trans2= array('_','_','_','_',"JO","ZH","CH","SH","SCH","Je","Jy","Ja","jo","zh","ch","sh","sch","je","jy","ja","A","B","V","G","D","E","Z","I","J","K","L","M","N","O","P","R","S","T","U","F","H","C","","Y","a","b","v","g","d","e","z","i","j","k","l","m","n","o","p","r","s","t","u","f","h","c","","y");
	
	return str_replace($trans1,$trans2,$in);

}




function text($str)
{
	return stripcslashes(htmlspecialchars($str));
}


function translit($in)
{
	$trans1= array("JO","ZH","CH","SH","SCH","JE","JY","JA","jo","zh","ch","sh","sch","je","jy","ja","A","B","V","G","D","E","Z","I","J","K","L","M","N","O","P","R","S","T","U","F","H","C","'","Y","a","b","v","g","d","e","z","i","j","k","l","m","n","o","p","r","s","t","u","f","h","c","'","y");
	$trans2= array("Ё","Ж","Ч","Ш","Щ","Э","Ю","Я","ё","ж","ч","ш","щ","э","ю","я","А","Б","В","Г","Д","Е","З","И","Й","К","Л","М","Н","О","П","Р","С","Т","У","Ф","Х","Ц","Ь","Ы","а","б","в","г","д","е","з","и","й","к","л","м","н","о","п","р","с","т","у","ф","х","ц","ь","ы");
	return str_replace($trans1,$trans2,$in);
}





function cute($string, $length=30) 
{
$string = htmlspecialchars_decode($string, ENT_QUOTES);
$string = preg_replace('/[^\\pL\d]+/u', '-', $string);
$string = trim($string, '-');
$words = explode("-",$string);
if(count($words) > $length) 
{
$string = "";
for($i = 0; $i < $length; $i++) 
{
$string .= "-".$words[$i];
}
$string = trim($string, '-');
}
return $string;
}


function cute1($string, $length=20) 
{
$string = htmlspecialchars_decode($string, ENT_QUOTES);
$string = preg_replace('/[^\\pL\d]+/u', '-', $string);
$string = trim($string, '-');
$words = explode("-",$string);
if(count($words) > $length) 
{
$string = "";
for($i = 0; $i < $length; $i++) 
{
$string .= "-".$words[$i];
}
$string = trim($string, '-');
}
return $string;
}



function clear(string $text = '')
{
$text=str_replace('&#39','', $text);
$text=str_replace('ส็็็็็็็็็็็็็็็็็็็็็็็็็็็็็็็็็็','_', $text);
return $text;
}




function links_preg1($arr)
{
global $set;
if (preg_match('#^http://'.preg_quote($_SERVER['HTTP_HOST']).'#',$arr[1]) || !preg_match('#://#',$arr[1]))
return '<a href="'.$arr[1].'">'.$arr[2].'</a>';
else return '<a href="'.$arr[1].'">'.$arr[2].'</a>';
}




function clc_age (){
	
	       $birthday = '26/04/1994';
                                                            
       $dob = strtotime(str_replace("/", "-", $birthday));
       $tdate = time();
       echo date('Y', $tdate) - date('Y', $dob);
	
}



function links_preg2($arr)
{
global $set;
if (preg_match('#^http://'.preg_quote($_SERVER['HTTP_HOST']).'#',$arr[2]))


return '<a href="'.$arr[2].'">'.$arr[2].'</a>';
else return '<a href="'.$arr[2].'"><span style="color:green">'.$arr[2].'</span></a>';
}





function makeUrltoLink(string $text) {



$str = htmlentities($text, ENT_QUOTES, 'UTF-8'); 
$str = nl2br($str);
//$qq22z2 = '/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/';   
//$qq2= preg_replace($qq22z2, '<a href="$0">$0</a>', $str);

//$qq22z2 = '/(http|https|ftp|ftps):\/\/(\w+)\.(\w+)/i';   
//$qq2 = preg_replace($qq22z2, '<a href="$0">$0</a>', $str);

//$q21 = '/http:\/\/www\.(\w+)\.(\w+)/i';   
//$qq2 = preg_replace($q21, '<a href="$0">$0</a>', $str);




//$q21 = '/(http|https):\/\/www\.(\w+)\.(\w+)/i';   
//$qq2 = preg_replace($q21, '<a href="$0">$0</a>', $str);


//$q21 = '/((http|https):\/\/((\w+)|(\.www)\.(\w+).\(\w+)))\/i';   
//$qq2 = preg_replace($q21, '<a href="$0">$0</a>', $str);




//$q21 = '/((http|https):\/\/?((\w+)|(\.www)))\.(\w+)/i';

//$q21 = "#ht(tp|tps)://(((\w+)(\.)(\w+))|(\w+)(\.)(\w+)(\.)(\w+))#i";



//$q21 = "#ht(tp|tps)://(\w+\.?){0,50}#i";    

//(a-zA-z0-9\-\_)
//  ((://)|(://www\.))

//$q21 = "#ht(tp|tps)://(\w+)\.(\w+)#i";  

$q21 = "#ht(tp|tps)((://www\.)|(://))(\w+)\.(\w+)#i";


$qq2 = preg_replace($q21, '<a href="$0">$0</a>', $str);

//$q21 = "#ht(tp|tps)://(\w+)\.(\w+)#i";   
//$qq2 = preg_replace($q21, '<a href="$0">$0</a>', $str);




//$q21 = "#https://(\w+)\.(\w+)#i";   
//$qq2 = preg_replace($q21, '<a href="$0">$0</a>', $str);


//$qq22z2 = '/((http)|(https)):\/\/(\w+)\.(\w+)?=(.\w+)))/i';   
//$qq2= preg_replace($qq22z2, '<a href="$0">$0</a>', $str);




 return $qq2;
}
 



function links($msg)
{
	
//$msg=preg_replace("/s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "<iframe width='320' height='200' src='//www.youtube.com/embed/$2' frameborder='0' allow='accelerometer; autoplay='0'; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>",  $msg);


$msg=preg_replace_callback('/\[url=(.+)\](.+)\[\/url\]/isU', 'links_preg1', $msg);





//$msg=preg_replace_callback('~(^|\s)([a-z]+://([^ \r\n\t`\'"]+))(\s|$)~iu', 'links_preg2', $msg);

return $msg;
}




function georgian_Extended(string $text)
{


$trans = array(
"ა" => "ა", "Ბ" => "ბ","Გ" => "გ","Დ" => "დ","Ე" => "ე","Ვ" => "ვ","Ზ" => "ზ",
"Თ" => "თ","Ი" => "ი","Კ" => "კ","Ლ" => "ლ","Მ" => "მ","Ნ" => "ნ","Ო" => "ო",
"Პ" => "პ","Ჟ" => "ჟ", "Რ" => "რ", "Ს" => "ს", "Ტ" => "t", "Უ" => "უ", "Ფ" => "ფ", "Ქ" => "ქ", "Ღ" => "ღ", "Ყ" => "ყ","Შ" => "შ",
"Ჩ" => "ჩ", "Ც" => "ც", "Ძ" => "ძ", "Წ" => "წ", "Ჭ" => "ჭ",  "Ხ" => "ხ", "Ჯ" => "ჯ", "Ჰ" => "ჰ" 
);

//return strtr($text, $trans);
return $text;
}



class captcha
{
	var $str;
	var $x = 100;
	var $y = 40;
	var $img;
	var $gif=false;
	var $png=false;
	var $jpg=false;

	function captcha($str)
	{
		if (!function_exists('gd_info'))
		{
			header('Location: /style/errors/gd_err.gif');
			exit;
		}
		if (imagetypes() & IMG_PNG)$this->png=true;
		if (imagetypes() & IMG_GIF)$this->gif=true;
		if (imagetypes() & IMG_JPG)$this->jpg=true;
		$this->str=$str;

		$this->img=imagecreatetruecolor($this->x, $this->y);
		imagefill($this->img, 0, 0, imagecolorallocate ($this->img, 255, 255, 255));
	}

	function create()
	{
		for ($i=0; $i<5 ;$i++ ) 
		{
			$n = $this->str;
			if ($this->png)$num[$n]=imagecreatefrompng(H.'/style/captcha/'.$n.'.png');
			elseif ($this->gif)$num[$n]=imagecreatefromgif(H.'/style/captcha/'.$n.'.gif');
			elseif ($this->jpg)$num[$n]=imagecreatefromjpeg(H.'/style/captcha/'.$n.'.jpg');
			imagecopy($this->img, $num[$n], $i*15+10, 8, 0, 0, 15, 20);
		}
	}
	
	function MultiWave()
	{
		include_once H.'sys/inc/MultiWave.php';
		$this->img=MultiWave($this->img);
	}

	function colorize($value=90)
	{
		if (function_exists('imagefilter'))
		imagefilter($this->img, IMG_FILTER_COLORIZE, mt_rand(0, $value), mt_rand(0, $value), mt_rand(0, $value));
	}

	function output($q=50)
	{
		@ob_end_clean();
		if ($this->jpg)
		{
			header("Content-type: image/jpeg");
			imagejpeg($this->img,null,$q);
		}
		elseif ($this->png)
		{
			header("Content-type: image/png");
			imagepng($this->img);
		}
		elseif ($this->gif)
		{
			header("Content-type: image/gif");
			imagegif($this->img);
		}
		exit;
	}
}

?>
























<?php

//$qweqw = file_get_contents('https://vt.tiktok.com/ZSTD5bW7/');


//echo $qweqw;

?>


<iframe src="https://www.facebook.com/100064392864209/videos/315555814164017/?mibextid=zDhOQc"></iframe>



<iframe src="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2F100064392864209%2Fvideos%2F315555814164017%2F&show_text=false&width=428&t=0" width="428" height="476" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>





<script>

window.fbAsyncInit = function() {
  FB.init({
    xfbml      : true,
    version    : 'v3.2'
  });
  }; (function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
  
  
<div class="fb-video" data-href="https://www.facebook.com/video.php?v=10152795258318553" data-width="500" data-allowfullscreen="true"></div>


<br/>
<br/>
<br/>
<br/>


https://www.facebook.com/nikololok/videos/t.100000216422619/10153335471682286/?type=2
https://www.facebook.com/nikololok/videos/10153335471682286/
https://www.facebook.com/videos/10153335471682286/


/\/videos\/(?:t\.\d+\/)?(\d+)/gi
\/videos\/(?:t\.\d+\/)?(\d+)





    $f_video = "https://www.facebook.com/lshokeenfilms/videos/1668437920119681/";
    $y_video = "https://www.youtube.com/watch?v=N1rethmzohw";
    $v_video = "https://vimeo.com/groups/imotional/videos/131543976";

    //For facebook
    if ($f_video > ''){
       if (preg_match("~(?:t\.\d+/)?(\d+)~i", $f_video, $matches)) {
       print 'facebook: ' . $matches[1] . '<br />';
       }
    }
    //For youtube
    if ($y_video > ''){
       if (preg_match("/(?:.*)v=([a-zA-Z0-9]*)/i", $y_video, $matches)) {
       print 'youtube: ' . $matches[1] . '<br />';
       }
    }
    //For vimeo
    if ($v_video > ''){
       if (preg_match("/(?:.*)\/([0-9]*)/i", $v_video, $matches)) {
       print 'vimeo: ' . $matches[1] . '<br />';
       }
    }





















