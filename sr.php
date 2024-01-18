<?php


function Qqwe() { 
	
$text = "qweq @buha and if you dont like  tell us \rn ";

//$index = strpos($kq, "@");


$text = "do@buha and if you dont like tell us";

$index = strpos($text, "@");



echo "$index \n";



$end = strpos($text, "@bu");


var_dump($end);

if ($end == false ) {
	echo "\n\n 1  false \n\n";
}

if ($end === false ) {
	echo "\n\n 2  false \n\n";
}


if ($end !== false ) {
	echo "\n\n   !==   \n\n";
}


if ($end != false ) {
	echo "\n\n !=  \n\n";
}


//$end_index = $index;




//while ($text[$end]) {
    //$end++;
//

/*
$buha = substr($text, $index, 


substr($text, $index, $end)


);


$end = strpos($text, "@");



echo "

$buha    \n\n   index : $index   endindex $end \n



\n";


<?php
$first_token  = strtok(' qweqwe  @something ქწექწექწ ', '/');
$second_token = strtok('@');
var_dump($first_token, $second_token);
?>
The above example will output:

    string(9) "something"
    bool(false)



*/




	
}

//$first_token  = strtok('@something qweqwe', '@');
//$second_token = strtok('@');
//var_dump($first_token, $second_token);


$qw = "qweqweqw   @ქწექწე213123-_  blah";

$pattern = "/@(.*)/";
$pattern2 = '/@[a-zA-Z]\w+/';
$pattern333 = "/@[\p{L}0-9\_\-]+/u";

preg_match($pattern333, $qw, $matches);

$lwqe1 = (string)$matches[0];

echo $lwqe1."\n";

//var_dump($matches);

//Qqwe();

exit;

foreach (glob("{./user/*.php,./user/*/*.php,./user/*/*/*.php,./user/*/*/*/*.php}", GLOB_BRACE) as $filename) {

$qqq = file_get_contents($filename);


$qq123 = str_replace(
[

],

[

], 

$qqq);

file_put_contents($filename, $qq123);


}
