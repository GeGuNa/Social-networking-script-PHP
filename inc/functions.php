<?php


defined('in') or die('uups');

?> 

<?php






function bbcodehightlight($arr) {
$arr[0]=html_entity_decode($arr[0], ENT_QUOTES, 'UTF-8');
return '
<div class="cit" style="overflow:scroll;clip:auto;max-width:480px;">
'.preg_replace('#<code>(.*?)</code>#si', '\\1' ,highlight_string($arr[0],1)).'</div>'."\n";
}




##############################################
function BBcode3($msg){
global $set,$user;









$bbcode = array(
'/\[i\](.+)\[\/i\]/isU' => '<em>$1</em>',
'/\[dotss\](.+)\[\/dotss\]/isU' => '<span style="text-decoration:underline">$1</span>',
'/\[b\](.+)\[\/b\]/isU' => '<strong>$1</strong>',
'/\[u\](.+)\[\/u\]/isU' => '<span style="text-decoration:underline;">$1</span>',
'/\[ut\](.+)\[\/ut\]/isU' => '<span style="border-bottom: 1px dotted;">$1</span>',
'/\[xx-small\](.+)\[\/xx-small\]/isU' => '<span style="font-size:xx-small;">$1</span>',
'/\[x-small\](.+)\[\/x-small\]/isU' => '<span style="font-size:x-small;">$1</span>',
'/\[in\](.+)\[\/in\]/isU' => '<input type="text" value="$1" />',
'/\[das\](.+)\[\/das\]/isU' => '<span style="border:1px dashed;">$1</span>',
'/\[marq\](.+)\[\/marq\]/isU' => '<marquee>$1</marquee>',
'/\[c\](.+)\[\/c\]/isU' => '<center>$1</center>',
'/\[sol\](.+)\[\/sol\]/isU' => '<span style="border:1px solid;">$1</span>',
'/\[ex\](.+)\[\/ex\]/isU' => '<span style="text-decoration:line-through;">$1</span>',
'/\[up\](.+)\[\/up\]/isU' => '<span style="text-decoration:overline;">$1</span>',
'/\[bl\](.+)\[\/bl\]/isU' => '<span style="text-decoration:blink;">$1</span>',
'/\[bblue\](.+)\[\/bblue\]/isU' => '<span style="background-color : blue;">$1</span>',
'/\[bDeepPink\](.+)\[\/bDeepPink\]/isU' => '<span style="background-color : bDeepPink;">$1</span>',
'/\[bLightSalmon\](.+)\[\/bLightSalmon\]/isU' => '<span style="background-color : bLightSalmon;">$1</span>',
'/\[bLime\](.+)\[\/bLime\]/isU' => '<span style="background-color : bLime;">$1</span>',
'/\[bDarkOrange\](.+)\[\/bDarkOrange\]/isU' => '<span style="background-color : bDarkOrange;">$1</span>',
'/\[dLimeGreen\](.+)\[\/dLimeGreen\]/isU' => '<span style="background-color : LimeGreen;">$1</span>',
'/\[bFireBrick\](.+)\[\/bFireBrick\]/isU' => '<span style="background-color : bFireBrick;">$1</span>',
'/\[bOrangeRed\](.+)\[\/bOrangeRed\]/isU' => '<span style="background-color : bOrangeRed;">$1</span>',
'/\[bGoldenrod\](.+)\[\/bGoldenrod\]/isU' => '<span style="background-color : Goldenrod;">$1</span>',
'/\[bTurquoise\](.+)\[\/bTurquoise\]/isU' => '<span style="background-color : Turquoise;">$1</span>',
'/\[byellow\](.+)\[\/byellow\]/isU' => '<span style="background-color : yellow;">$1</span>',
'/\[bbrown\](.+)\[\/bbrown\]/isU' => '<span style="background-color : brown;">$1</span>',
'/\[bwhite\](.+)\[\/bwhite\]/isU' => '<span style="background-color : white;">$1</span>',
'/\[borange\](.+)\[\/borange\]/isU' => '<span style="background-color : orange;">$1</span>',
'/\[bblack\](.+)\[\/bblack\]/isU' => '<span style="background-color : black;">$1</span>',
'/\[bgrey\](.+)\[\/bgrey\]/isU' => '<span style="background-color : grey;">$1</span>',
'/\[bpink\](.+)\[\/bpink\]/isU' => '<span style="background-color : pink;">$1</span>',
'/\[bviolet\](.+)\[\/bviolet\]/isU' => '<span style="background-color : violet;">$1</span>','/\[bblue\](.+)\[\/bblue\]/isU' => '<span style="background-color : blue;">$1</span>',
'/\[byellow\](.+)\[\/byellow\]/isU' => '<span style="background-color : yellow;">$1</span>',
'/\[bbrown\](.+)\[\/bbrown\]/isU' => '<span style="background-color : brown;">$1</span>',
'/\[bwhite\](.+)\[\/bwhite\]/isU' => '<span style="background-color : white;">$1</span>',
'/\[borange\](.+)\[\/borange\]/isU' => '<span style="background-color : orange;">$1</span>',
'/\[bblack\](.+)\[\/bblack\]/isU' => '<span style="background-color : black;">$1</span>',
'/\[bgrey\](.+)\[\/bgrey\]/isU' => '<span style="background-color : grey;">$1</span>',
'/\[bpink\](.+)\[\/bpink\]/isU' => '<span style="background-color : pink;">$1</span>',
'/\[bviolet\](.+)\[\/bviolet\]/isU' => '<span style="background-color : violet;">$1</span>','/\[bred\](.+)\[\/bred\]/isU' => '<span style="background-color : red;">$1</span>',
'/\[bgreen\](.+)\[\/bgreen\]/isU' => '<span style="background-color : green;">$1</span>','/\[big\](.+)\[\/big\]/isU' => '<span style="font-size:large;">$1</span>',
'/\[das\](.+)\[\/das\]/isU' => '<span style="border:1px dashed;">$1</span>',
'/\[dot\](.+)\[\/dot\]/isU' => '<span style="border:1px dotted;">$1</span>',
'/\[dou\](.+)\[\/dou\]/isU' => '<span style="border:3px double #E1E1E4;">$1</span>','/\[dot\](.+)\[\/dot\]/isU' => '<span style="border:1px dotted;">$1</span>',
'/\[dou\](.+)\[\/dot\]/isU' => '<span style="border:3px double #E1E1E4;">$1</span>','/\[dot\](.+)\[\/dot\]/isU' => '<span style="border:1px dotted;">$1</span>',

'/\[scr-1\](.+)\[\/scr-1\]/isU' => '<span style="background-color:Peru;"><span style="color:LightPink;"><span style="border:1px dashed;">$1</span></span></span>',

'/\[scr-w\](.+)\[\/scr-w\]/isU' => '<span style="background-color:#ffffff;"><span style="color:#ffffff;"><span style="border:1px dashed;">$1</span></span></span>',
'/\[scr-b\](.+)\[\/scr-b\]/isU' => '<span style="background-color:#000000;"><span style="color:#000000;"><span style="border:1px dashed;">$1</span></span></span>',
'/\[scr-bl\](.+)\[\/scr-bl\]/isU' => '<span style="background-color:Blue;"><span style="color:Blue;"><span style="border:1px dashed;">$1</span></span></span>',
'/\[scr-r\](.+)\[\/scr-r\]/isU' => '<span style="background-color:red;"><span style="color:red;"><span style="border:1px dashed;">$1</span></span></span>',
'/\[scr-g\](.+)\[\/scr-g\]/isU' => '<span style="background-color:green;"><span style="color:green;"><span style="border:1px dashed;">$1</span></span></span>',
'/\[scr-d\](.+)\[\/scr-d\]/isU' => '<span style="background-color:DarkMagenta;"><span style="color:DarkMagenta;"><span style="border:1px dashed;">$1</span></span></span>',
'/\[scr-c\](.+)\[\/scr-c\]/isU' => '<span style="background-color:Crimson;"><span style="color:Crimson;"><span style="border:1px dashed;">$1</span></span></span>',
'/\[scr-bu\](.+)\[\/scr-bu\]/isU' => '<span style="background-color:Burlywood;"><span style="color:Burlywood;"><span style="border:1px dashed;">$1</span></span></span>',
'/\[scr-k\](.+)\[\/scr-k\]/isU' => '<span style="background-color:Khaki;"><span style="color:Khaki;"><span style="border:1px dashed;">$1</span></span></span>',
'/\[scr-bl\](.+)\[\/scr-bl\]/isU' => '<span style="background-color:Blue;"><span style="color:Blue;"><span style="border:1px dashed;">$1</span></span></span>',
'/\[scr-r\](.+)\[\/scr-r\]/isU' => '<span style="background-color:red;"><span style="color:red;"><span style="border:1px dashed;">$1</span></span></span>',
'/\[scr-g\](.+)\[\/scr-g\]/isU' => '<span style="background-color:green;"><span style="color:green;"><span style="border:1px dashed;">$1</span></span></span>',
'/\[scr-d\](.+)\[\/scr-d\]/isU' => '<span style="background-color:DarkMagenta;"><span style="color:DarkMagenta;"><span style="border:1px dashed;">$1</span></span></span>',
'/\[scr-c\](.+)\[\/scr-c\]/isU' => '<span style="background-color:Crimson;"><span style="color:Crimson;"><span style="border:1px dashed;">$1</span></span></span>',
'/\[scr-bu\](.+)\[\/scr-bu\]/isU' => '<span style="background-color:Burlywood;"><span style="color:Burlywood;"><span style="border:1px dashed;">$1</span></span></span>',
'/\[scr-k\](.+)\[\/scr-k\]/isU' => '<span style="background-color:Khaki;"><span style="color:Khaki;"><span style="border:1px dashed;">$1</span></span></span>',
'/\[ramk-1\](.+)\[\/ramk-1\]/isU' => '<span style="background-color:LightGreen;"><span style="color:Khaki;"><span style="border:1px dashed;">$1</span></span></span>',
'/\[ramk-2\](.+)\[\/ramk-2\]/isU' => '<span style="background-color:MediumSeaGreen;"><span style="color:Khaki;"><span style="border:1px dashed;">$1</span></span></span>',
'/\[ramk-3\](.+)\[\/ramk-3\]/isU' => '<span style="background-color:ForestGreen;"><span style="color:Khaki;"><span style="border:1px dashed;">$1</span></span></span>',
'/\[ramk-4\](.+)\[\/ramk-4\]/isU' => '<span style="background-color:PaleTurquoise;"><span style="color:Khaki;"><span style="border:1px dashed;">$1</span></span></span>',
'/\[ramk-5\](.+)\[\/ramk-5\]/isU' => '<span style="background-color:SteelBlue;"><span style="color:Khaki;"><span style="border:1px dashed;">$1</span></span></span>',
'/\[ramk-6\](.+)\[\/ramk-6\]/isU' => '<span style="background-color:Orchid;"><span style="color:Khaki;"><span style="border:1px dashed;">$1</span></span></span>',
'/\[ramk-7\](.+)\[\/ramk-7\]/isU' => '<span style="background-color:DimGray;"><span style="color:Khaki;"><span style="border:1px dashed;">$1</span></span></span>',
'/\[bit\](.+)\[\/bit\]/isU' => '<marquee behavior=alternate>$1</marquee>',
'/\[sizem1\](.+)\[\/sizem1\]/isU' => '<font size=-1>$1</font size>',
'/\[sizem2\](.+)\[\/sizem2\]/isU' => '<font size=-2>$1</font size>',
'/\[sizem3\](.+)\[\/sizem3\]/isU' => '<font size=3>$1</font size>',
'/\[sizem4\](.+)\[\/sizem4\]/isU' => '<font size=4>$1</font size>',
'/\[sizem5\](.+)\[\/sizem5\]/isU' => '<font size=5>$1</font size>',
'/\[sizem6\](.+)\[\/sizem6\]/isU' => '<font size=6>$1</font size>',
'/\[sizem7\](.+)\[\/sizem7\]/isU' => '<font size=7>$1</font size>',
'/\[textp\](.+)\[\/textp\]/isU' => '<p align="right">$1</p>',
'/\[prlink\](.+)\[\/prlink\]/isU' => '<blockquote style="border: 3px solid rgb(218, 112, 214); margin: 0px; padding: 5px;">$1</blockquote>',
'/\[prlink2\](.+)\[\/prlink2\]/isU' => '<blockquote style="border: 1px solid rgb(218, 112, 214); margin: 0px; padding: 5px;">$1</blockquote>',
'/\[prlink3\](.+)\[\/prlink3\]/isU' => '<blockquote style="border: 1px solid rgb(218, 112, 214); margin: 1px; padding: 1px;">$1</blockquote>',
'/\[prlink4\](.+)\[\/prlink4\]/isU' => '<blockquote style="border: 1px solid rgb(110, 112, 214); margin: 1px; padding: 1px;">$1</blockquote>',
'/\[prlink5\](.+)\[\/prlink5\]/isU' => '<blockquote style="border: 1px solid rgb(666, 43, 211); margin: 1px; padding: 1px;">$1</blockquote>',
'/\[prlink6\](.+)\[\/prlink6\]/isU' => '<blockquote style="border: 3px solid rgb(218, 112, 214); margin: 0px; padding: 5px;">$1</blockquote>',
'/\[prlink7\](.+)\[\/prlink7\]/isU' => '<blockquote style="border: 1px solid rgb(777, 43, 666); center: 0px; padding: 1px;">$1</blockquote>',
'/\[ramkt\](.+)\[\/ramkt\]/isU' => '<blockquote style="BORDER-LEFT: #F70000 3px solid; padding: 15px; BORDER-TOP: #999931 3px solid; padding: 15px; BORDER-BOTTOM: #E3AF40 3px solid; padding: 15px; BORDER-RIGHT: #924E96 3px solid" padding: 15px>$1</blockquote>',
'/\[rams\](.+)\[\/rams\]/isU' => '<blockquote style="BORDER-LEFT: #F70000 3px solid; padding: 15px; BORDER-TOP: #119931 3px solid; padding: 15px; BORDER-BOTTOM: #E3AF40 3px solid; padding: 15px; BORDER-RIGHT: #924E96 3px solid" padding: 15px>$1</blockquote>',
'/\[rams2\](.+)\[\/rams2\]/isU' => '<blockquote style=:BORDER-LEFT: #F70000 1px solid; padding: 5px; BORDER-TOP: #119931 1px solid; padding: 3px; BORDER-BOTTOM: red 3px solid; padding: 1px; BORDER-RIGHT: #924E96 3px solid: padding: 1px>$1</blockquote>>',
'/\[ramkt2\](.+)\[\/ramkt2\]/isU' => '<span style="border-style: dashed; border-color:yellow">$1</span> <br />',
'/\[ramkt3\](.+)\[\/ramkt3\]/isU' => '<span style="border-style: dashed; border-color:LightGreen">$1</span>',
'/\[ramkt4\](.+)\[\/ramkt4\]/isU' => '<span style="border-style: dashed; border-color:SteelBlue">$1</span>',
'/\[ramkt5\](.+)\[\/ramkt5\]/isU' => '<span style="border-style: dashed; border-color:LightPink">$1</span>',
'/\[ramkt6\](.+)\[\/ramkt6\]/isU' => '<span style="border-style: dashed; border-color:Gray">$1</span>',
'/\[ramkt7\](.+)\[\/ramkt7\]/isU' => '<span style="border-style: dashed; border-color:White">$1</span>',
'/\[ramkt8\](.+)\[\/ramkt8\]/isU' => '<span style="border-style: dashed; border-color:MediumSlateBlue">$1</span> ',
'/\[ramkt9\](.+)\[\/ramkt9\]/isU' => '<span style="border-style: dashed; border-color:LightSalmon">$1</span>',
'/\[ramkt10\](.+)\[\/ramkt10\]/isU' => '<span style="border-style: dashed; border-color:DarkOrange">$1</span>',
'/\[ramkt11\](.+)\[\/ramkt11\]/isU' => '<span style="border-style: dashed; border-color:SpringGreen">$1</span>',
'/\[ramkt12\](.+)\[\/ramkt12\]/isU' => '<span style="border-style: dashed; border-color:Yellow">$1</span>',
'/\[ramkt13\](.+)\[\/ramkt13\]/isU' => '<span style="border-style: dashed; border-color:Gold">$1</span>',
'/\[ramkt14\](.+)\[\/ramkt14\]/isU' => '<span style="border-style: dashed; border-color:DarkRed">$1</span>',
'/\[ramkt15\](.+)\[\/ramkt15\]/isU' => '<span style="border-style: dashed; border-color:DeepPink">$1</span>',
'/\[dou\](.+)\[\/dou\]/isU' => '<span style="border:3px double #E1E1E4;">$1</span>',
'/\[dou\](.+)\[\/dou\]/isU' => '<span style="border:3px double #E1E1E4;">$1</span>',
'/\[big\](.+)\[\/big\]/isU' => '<span style="font-size:large;">$1</span>',
'/\[small\](.+)\[\/small\]/isU' => '<span style="font-size:small;">$1</span>',
'/\[code\](.+)\[\/code\]/isU' => '<code>$1</code>',
'/\[f=([0-9]+)\/([0-9]+)\/([0-9]+)\](.+)\[\/f\]/isU' => "<a href='/forum/$1/$2/$3'>$4</a>",
'/\[u=([0-9]+)\](.+)\[\/u\]/isU' => "<a href='/info.php?id=$1'>$2</a>",
'/\[red\](.+)\[\/red\]/isU' => '<span style="color:#ff0000;">$1</span>',
'/\[yellow\](.+)\[\/yellow\]/isU' => '<span style="color:#ffff22;">$1</span>',
'/\[green\](.+)\[\/green\]/isU' => '<span style="color:#00bb00;">$1</span>',
'/\[blue\](.+)\[\/blue\]/isU' => '<span style="color:#0000bb;">$1</span>',
'/\[brown\](.+)\[\/brown\]/isU' => '<span style="color:brown;">$1</span>',
'/\[white\](.+)\[\/white\]/isU' => '<span style="color:#ffffff;">$1</span>',
'/\[black\](.+)\[\/black\]/isU' => '<span style="color:black;">$1</span>',
'/\[orange\](.+)\[\/orange\]/isU' => '<span style="color:orange;">$1</span>',
'/\[pink\](.+)\[\/pink\]/isU' => '<span style="color:pink;">$1</span>',
'/\[violet\](.+)\[\/violet\]/isU' => '<span style="color:violet;">$1</span>',
'/\[gray\](.+)\[\/gray\]/isU' => '<span style="color:gray;">$1</span>',
'/\[size=([0-9]+)\](.+)\[\/size\]/isU' => '<span style="font-size:$1px;">$2</span>',
'/\[maroon\](.+)\[\/maroon\]/isU' => '<span style="color:maroon;">$1</span>',
'/\[teal\](.+)\[\/teal\]/isU' => '<span style="color:teal;">$1</span>',
'/\[scarlet\](.+)\[\/scarlet\]/isU' => '<span style="color:scarlet;">$1</span>',
'/\[carmine\](.+)\[\/carmine\]/isU' => '<span style="color:carmine;">$1</span>',
'/\[vermilion\](.+)\[\/vermilion\]/isU' => '<span style="color:vermilion;">$1</span>',
'/\[alizarin\](.+)\[\/alizarin\]/isU' => '<span style="color:alizarin;">$1</span>',
'/\[chestnut\](.+)\[\/chestnut\]/isU' => '<span style="color:chestnut;">$1</span>',
'/\[crimson\](.+)\[\/crimson\]/isU' => '<span style="color:crimson;">$1</span>',
'/\[darkcoral\](.+)\[\/darkcoral\]/isU' => '<span style="color:darkcoral;">$1</span>',
'/\[burntsiena\](.+)\[\/burntsiena\]/isU' => '<span style="color:burntsiena;">$1</span>',
'/\[burntsiena\](.+)\[\/burntsiena\]/isU' => '<span style="color:burntsiena;">$1</span>',
'/\[coral\](.+)\[\/coral\]/isU' => '<span style="color:coral;">$1</span>',
'/\[salmon\](.+)\[\/salmon\]/isU' => '<span style="color:salmon;">$1</span>',
'/\[pinkorange\](.+)\[\/pinkorange\]/isU' => '<span style="color:#ff9966;">$1</span>',
'/\[palepink\](.+)\[\/palepink\]/isU' => '<span style="color:palepink;">$1</span>',
'/\[lavenderblush\](.+)\[\/lavenderblush\]/isU' => '<span style="color:lavenderblush;">$1</span>',
'/\[carrot\](.+)\[\/carrot\]/isU' => '<span style="color:carrot;">$1</span>',
'/\[jaco\](.+)\[\/jaco\]/isU' => '<span style="color:jaco;">$1</span>',
'/\[tangerine\](.+)\[\/tangerine\]/isU' => '<span style="color:#ff8800;">$1</span>',
'/\[margarine\](.+)\[\/margarine\]/isU' => '<span style="color:margarine;">$1</span>',
'/\[safetyorange\](.+)\[\/safetyorange\]/isU' => '<span style="color:safetyorange;">$1</span>',
'/\[palebrown\](.+)\[\/palebrown\]/isU' => '<span style="color:#987654;">$1</span>',
'/\[palebrown\](.+)\[\/palebrown\]/isU' => '<span style="color:#442d25;">$1</span>',
'/\[coffee\](.+)\[\/coffee\]/isU' => '<span style="color:#442d25;">$1</span>',
'/\[bistre\](.+)\[\/bistre\]/isU' => '<span style="color:#3d2b1f;">$1</span>',
'/\[cinnamon\](.+)\[\/cinnamon\]/isU' => '<span style="color:cinnamon;">$1</span>',
'/\[byron\](.+)\[\/byron\]/isU' => '<span style="color:byron;">$1</span>',
'/\[sepia\](.+)\[\/sepia\]/isU' => '<span style="color:sepia;">$1</span>',
'/\[umber\](.+)\[\/umber\]/isU' => '<span style="color:umber;">$1</span>',
'/\[schoolbus\](.+)\[\/schoolbus\]/isU' => '<span style="color:#ff8d00;">$1</span>',
'/\[gold\](.+)\[\/gold\]/isU' => '<span style="color:gold;">$1</span>',
'/\[mustard\](.+)\[\/mustard\]/isU' => '<span style="color:#ffdb58;">$1</span>',
'/\[sandybrown\](.+)\[\/sandybrown\]/isU' => '<span style="color:#fcdd78;">$1</span>',
'/\[lemon\](.+)\[\/lemon\]/isU' => '<span style="color:#fde910;">$1</span>',
'/\[lime\](.+)\[\/lime\]/isU' => '<span style="color:lime;">$1</span>',
'/\[olive\](.+)\[\/olive\]/isU' => '<span style="color:olive;">$1</span>',
'/\[asparagus\](.+)\[\/asparagus\]/isU' => '<span style="color:asparagus;">$1</span>',
'/\[ferngreen\](.+)\[\/ferngreen\]/isU' => '<span style="color:#4f7942;">$1</span>',
'/\[toadinlove\](.+)\[\/toadinlove\]/isU' => '<span style="color:toadinlove;">$1</span>',
'/\[vertdepomme\](.+)\[\/vertdepomme\]/isU' => '<span style="color:#34c924;">$1</span>',
'/\[brightgreen\](.+)\[\/brightgreen\]/isU' => '<span style="color:#66ff00;">$1</span>',
'/\[pistachio\](.+)\[\/pistachio\]/isU' => '<span style="color:#bef574;">$1</span>',
'/\[Saint\](.+)\[\/Saint\]/isU' => ' <span style="color:green;"><marquee><span style="border:0px dotted;"><em><span style="text-decoration:underline;">TEKCT 3aMEHeH Ha  CEKPETHbIN bb code <br /> </span></em></span></marquee><strong>xakep by Saint  JumanG.ru i WmSait.ru</strong>  </span>',
'/\[greenyellow\](.+)\[\/greenyellow\]/isU' => '<span style="color:#adff2f;">$1</span>',
'/\[chartreuse\](.+)\[\/chartreuse\]/isU' => '<span style="color:chartreuse;">$1</span>',
'/\[mossgreen\](.+)\[\/mossgreen\]/isU' => '<span style="color:mossgreen;">$1</span>',
'/\[palegreen\](.+)\[\/palegreen\]/isU' => '<span style="color:palegreen;">$1</span>',
'/\[darkspringgreen\](.+)\[\/darkspringgreen\]/isU' => '<span style="color:#177245;">$1</span>',
'/\[jade\](.+)\[\/jade\]/isU' => '<span style="color:jade;">$1</span>',
'/\[navy\](.+)\[\/navy\]/isU' => '<span style="color:navy;">$1</span>',
'/\[aqua\](.+)\[\/aqua\]/isU' => '<span style="color:aqua;">$1</span>',
'/\[st\](.+)\[\/st\]/isU' => '<span style="color:#082567;"><span style="color:red;">[SUPPORT]</span>  kidaem HA koh R329486466357 deneg 100000000 dolars  i bb code propadet :D Saint</span>',
'/\[moray\](.+)\[\/moray\]/isU' => '<span style="color:moray;">$1</span>',
'/\[pinegreen\](.+)\[\/pinegreen\]/isU' => '<span style="color:#01796f;">$1</span>',
'/\[robineggblue\](.+)\[\/robineggblue\]/isU' => '<span style="color:#00cccc;">$1</span>',
'/\[turquoise\](.+)\[\/turquoise\]/isU' => '<span style="color:turquoise;">$1</span>',
'/\[brightturquoise\](.+)\[\/brightturquoise\]/isU' => '<span style="color:#08e0de;">$1</span>',
'/\[electric\](.+)\[\/electric\]/isU' => '<span style="color:#7df9ff;">$1</span>',
'/\[paleblue\](.+)\[\/paleblue\]/isU' => '<span style="color:#afeeee;">$1</span>',
'/\[sapphire\](.+)\[\/sapphire\]/isU' => '<span style="color:#082567;">$1</span>',
'/\[powderblue\](.+)\[\/powderblue\]/isU' => '<span style="color:powderblue;">$1</span>',
'/\[blacksea\](.+)\[\/blacksea\]/isU' => '<span style="color:#1a4780;">$1</span>',
'/\[cobalt\](.+)\[\/cobalt\]/isU' => '<span style="color:cobalt;">$1</span>',
'/\[denim\](.+)\[\/denim\]/isU' => '<span style="color:#0047ab;">$1</span>',
'/\[royalblue\](.+)\[\/royalblue\]/isU' => '<span style="color:royalblue;">$1</span>',
'/\[kleinblue\](.+)\[\/kleinblue\]/isU' => '<span style="color:#3a75c4;">$1</span>',
'/\[azure\](.+)\[\/azure\]/isU' => '<span style="color:#007fff;">$1</span>',
'/\[purple\](.+)\[\/purple\]/isU' => '<span style="color:purple;">$1</span>',
'/\[amethyst\](.+)\[\/amethyst\]/isU' => '<span style="color:amethyst;">$1</span>',
'/\[seroburomalinovyj\](.+)\[\/seroburomalinovyj\]/isU' => '<span style="color:#735184;">$1</span>',
'/\[darkviolet\](.+)\[\/darkviolet\]/isU' => '<span style="color:#423181;">$1</span>',
'/\[indigo\](.+)\[\/indigo\]/isU' => '<span style="color:indigo;">$1</span>',
'/\[plum\](.+)\[\/plum\]/isU' => '<span style="color:plum;">$1</span>',
'/\[silver\](.+)\[\/silver\]/isU' => '<span style="color:silver;">$1</span>',
'/\[wetasphalt\](.+)\[\/wetasphalt\]/isU' => '<span style="color:#505050;">$1</span>',
'/\[anthracite\](.+)\[\/anthracite\]/isU' => '<span style="color:#808080;">$1</span>',
'/\[slategray\](.+)\[\/slategray\]/isU' => '<span style="color:slategray;">$1</span>',
'/\[lightgrey\](.+)\[\/lightgrey\]/isU' => '<span style="color:lightgrey;">$1</span>',
'/\[quartz\](.+)\[\/quartz\]/isU' => '<span style="color:quartz;">$1</span>',
'/\[darkbrown\](.+)\[\/darkbrown\]/isU' => '<span style="color:darkbrown;">$1</span>',
'/\[f=([0-9]+)\/([0-9]+)\/([0-9]+)\](.+)\[\/f\]/isU' => "<a href='/forum/$1/$2/$3'>$4</a>",
'/\[u=([0-9]+)\](.+)\[\/u\]/isU' => "<a href='/info.php?id=$1'>$2</a>",
'/\[img\](.+)\[\/img\]/isU' => '<img src="$1" alt="" />');
$msg=preg_replace('/\[br\]/isU', '<br>', $msg);	
$msg=preg_replace('/\[img\](.+)\[\/img\]/isU', '<img style="max-width:40%" src="$1">', $msg);
$msg=preg_replace('/\[color=([\#0-9a-zA-Z]+)\](.+)\[\/color\]/isU', '<span style="color:$1;">$2</span>', $msg);
$msg= preg_replace(array_keys($bbcode), array_values($bbcode), $msg);
$msg=preg_replace_callback('#&lt;\?(.*?)\?&gt;#sui', 'bbcodehightlight', $msg);
$msg=preg_replace('#\[you100\](.*?)\[/you100\]#si', '
<object width="100" height="80">
<param name="movie" value="http://www.youtube.com/v/\1?version=3">
</param>
<param name="allowFullScreen" value="true">
</param>
<embed src="http://www.youtube.com/v/\1?version=3" type="application/x-shockwave-flash" width="100" height="80" allowfullscreen="true">
</embed></object>', $msg);#
$msg=preg_replace('#\[you150\](.*?)\[/you150\]#si', '
<object width="150" height="100">
<param name="movie" value="http://www.youtube.com/v/\1?version=3">
</param>
<param name="allowFullScreen" value="true">
</param>
<embed src="http://www.youtube.com/v/\1?version=3" type="application/x-shockwave-flash" width="150" height="100" allowfullscreen="true">
</embed></object>', $msg);#
$msg=preg_replace('#\[you300\](.*?)\[/you300\]#si', '
<object width="300" height="300">
<param name="movie" value="http://www.youtube.com/v/\1?version=3">
</param>
<param name="allowFullScreen" value="true">
</param>
<embed src="http://www.youtube.com/v/\1?version=3" type="application/x-shockwave-flash" width="300" height="300" allowfullscreen="true">
</embed></object>', $msg);#
$msg=preg_replace('#\[you250\](.*?)\[/you250\]#si', '
<object width="250" height="200">
<param name="movie" value="http://www.youtube.com/v/\1?version=3">
</param>
<param name="allowFullScreen" value="true">
</param>
<embed src="http://www.youtube.com/v/\1?version=3" type="application/x-shockwave-flash" width="250" height="200" allowfullscreen="true">
</embed></object>', $msg);#
$msg=preg_replace('#\[you400\](.*?)\[/you400\]#si', '
<object width="400" height="250">
<param name="movie" value="http://www.youtube.com/v/\1?version=3">
</param>
<param name="allowFullScreen" value="true">
</param>
<embed src="http://www.youtube.com/v/\1?version=3" type="application/x-shockwave-flash" width="400" height="250" allowfullscreen="true">
</embed></object>', $msg);#
$msg=preg_replace('#\[you500\](.*?)\[/you500\]#si', '
<object width="500" height="340">
<param name="movie" value="http://www.youtube.com/v/\1?version=3">
</param>
<param name="allowFullScreen" value="true">
</param>

<embed src="http://www.youtube.com/v/\1?version=3" type="application/x-shockwave-flash" width="450" height="340" allowfullscreen="true">
</embed></object>', $msg);#

$msg=preg_replace('#\[you250\](.*?)\[/you250\]#si', '
<object width="250" height="150">
<param name="movie" value="http://www.youtube.com/v/\1?version=3">
</param>
<param name="allowFullScreen" value="true">
</param>
<embed src="http://www.youtube.com/v/\1?version=3" type="application/x-shockwave-flash" width="250" height="150" allowfullscreen="true">
</embed></object>', $msg);#
$msg = preg_replace('#\[google\](.*?)\[/google\]#si', '
<a href="http://www.google.ru/search?q=$1">Link  <span style="color:#6600ff">G</span><span style="color:green">o</span><span style="color:black">o</span><span style="color:#0000ff">g</span><span style="color:#008000">l</span><span style="color:#7700ff">e</span> <i>  :$1</i></a> ', $msg);
$msg = preg_replace('#\[googleimg\](.*?)\[/googleimg\]#si', '<a href="http://www.google.com.ua/images?q=$1">Link imG <span style="color:#6600ff">G</span><span style="color:green">o</span><span style="color:black">o</span><span style="color:#0000ff">g</span><span style="color:#008000">l</span><span style="color:#7700ff">e</span> <i>$1</i></a> ', $msg);
$msg = preg_replace('#\[vkman\](.*?)\[/vkman\]#si', '<a href=http://vkontakte.ru/gsearch.php?section=people&q=$1">vkontakte <i>$1</i></a> ', $msg);
$msg = preg_replace('#\[vkmusic\](.*?)\[/vkmusic\]#si', '<a href="http://vkontakte.ru/gsearch.php?section=audio&q=$1"><span style="color:#6600ff">Music</span> vkontake <i>$1</i></a> ', $msg);
$msg = preg_replace('#\[vkvideo\](.*?)\[/vkvideo\]#si', '<a href="http://vkontakte.ru/gsearch.php?section=video&q=$1">Video <span style="color:#6600ff">vkontakte </span><i>\1</i></a> ', $msg);
$msg = preg_replace('#\[wiki\](.*?)\[/wiki\]#si', '[url=http://ru.wikipedia.org/wiki/\1]Wiki <i>\1</i>[/url] ', $msg);
$msg = preg_replace('#\[ya\](.*?)\[/ya\]#si', '<a href="http://yandex.ru/yandsearch?text=$1"> <span style="color:#ff0000">Y</span>andex <span style="color:#6600ff">Link </span> <i>$1</i></a> ', $msg);
$msg = preg_replace('#\[yaimg\](.*?)\[/yaimg\]#si', '<a href="http://images.yandex.ru/yandsearch?text=$1"> <span style="color:#ff0000">Y</span>andex <span style="color:#6600ff">Link </span> <i>$1</i></a> ', $msg);
$msg = preg_replace('#\[yaavto\](.*?)\[/yaavto\]#si', '<a href="http://auto.yandex.ru/models.xml?text=$1"> Avto <span style="color:#ff0000">Y</span>andex <span style="color:#6600ff">Link </span> <i>$1</i></a> ', $msg);
$msg = preg_replace('#\[yavideo\](.*?)\[/yavideo\]#si', '<a href="http://video.yandex.ru/#search?text=$1">Video <span style="color:#ff0000">Y</span>andex <span style="color:#6600ff">Link </span> <i>$1</i></a> ', $msg);
$msg = preg_replace('#\[yamusic\](.*?)\[/yamusic\]#si', '<a href="http://music.yandex.ru/#!/search?text=$1">Music <span style="color:#ff0000">Y</span>andex <span style="color:#6600ff">Link </span> <i>$1</i></a> ', $msg);
$msg = preg_replace('#\[yaPeople\](.*?)\[/yaPeople\]#si', '<a href="http://yandex.ru/yandsearch?text=$1">People <span style="color:#ff0000">Y</span>andex <span style="color:#6600ff">Link </span> <i>$1</i></a> ', $msg);
$msg = preg_replace('#\[yablogs\](.*?)\[/yablogs\]#si', '<a href="http://blogs.yandex.ru/search.xml?text=$1">blogs <span style="color:#ff0000">Y</span>andex <span style="color:#6600ff">Link </span> <i>$1</i></a> ', $msg);
$msg = preg_replace('#\[translateru\](.*?)\[/translateru\]#si', '<a href="http://translate.google.ru/#ru/en/$1">translate ru-en <span style="color:#ff0000">G</span>oogle translate <span style="color:#6600ff">The text of the translation Link </span> <i>$1</i></a> ', $msg);

$msg = preg_replace('#\[translateen\](.*?)\[/translateen\]#si', '<a href="http://translate.google.ru/#en/ru/$1">translate en-ru <span style="color:#ff0000">G</span>oogle translate <span style="color:#6600ff">The text of the translation Link </span> <i>$1</i></a> ', $msg);

$msg = preg_replace('#\[translateruuk\](.*?)\[/translateruuk\]#si', '<a href="http://translate.google.ru/#ru/uk/$1">translate ru-uk <span style="color:#ff0000">G</span>oogle translate <span style="color:#6600ff">The text of the translation Link </span> <i>$1</i></a> ', $msg);

$msg = preg_replace('#\[translateukru\](.*?)\[/translateukru\]#si', '<a href="http://translate.google.ru/#ru/uk/$1">translate uk-ru <span style="color:#ff0000">G</span>oogle translate <span style="color:#6600ff">The text of the translation Link </span> <i>$1</i></a> ', $msg);

$msg = preg_replace('#\[bing\](.*?)\[/bing\]#si', '<a href="http://www.bing.com/search?q=$1">bing Link </span> <i>$1</i></a> ', $msg);




//https://www.tiktok.com/@kuronushi_/video/7278649121777421576

//$patternTikTok = '/https:\/\/www\.tiktok\.com\/@\w+\/video\/\d+\??[\w=&]*\b/';




$patternTikTok = '~(^|\s)(htt(p|ps)://(.*?)tiktok.com(.*?))(\s|$)~ui';

// Use preg_match_all to find all matches in the text
preg_match_all($patternTikTok, $msg, $matches);


$patte331srnRmvng = '/\?[^?]*$/';



if (!empty($matches[0])) {
    // Iterate through the matched URLs
    foreach ($matches[0] as $url) {
		
	//$qweqw123 = preg_replace('/https://www.tiktok.com/@kuronushi_/video/7278649121777421576/')	
	
	
//$cleanedText = preg_replace($url, 'https:\/\/www.tiktok.com\/@(\w+)\/video\/(\d+)/', $url);
	
	
	//$msg = preg_replace('~(^|\s)(htt(p|ps)://(.*?))(\s|$)~ui', "<a href='$2'>$2</a>", $msg);

	//$msg = preg_replace($patternTikTok, "~()~", $msg);

		//str_replace('','',$url)
		
		
		
	//$qweqweqpUrl123 = '~(^|\s)(htt(p|ps)://(.*?)tiktok.com/@(.*?)/video/(\d+)/)(\s|$)~ui';
		
	//$ExpreSm123s = preg_replace('~(^|\s)(htt(p|ps)://(.*?))(\s|$)~ui', $qweqweqpUrl123, $url);
	
	
	
	$cleanedText31z = str_replace(" ", "",preg_replace($patte331srnRmvng, '', $url));

		
		
		//str_replace(" ", "",$cleanedText31z)
	
	$qweqw31a = file_get_contents("https://www.tiktok.com/oembed?url=".$cleanedText31z."");
	
	//var_dump($qweqw31a);
	
  	$lqdc = json_decode($qweqw31a);
	$tkqmeqvid  =  $lqdc->html;
   $tkqmeqvidurl  =  $lqdc->author_url;
    
	$msg = preg_replace($patternTikTok, $tkqmeqvid, $msg);
		
	//$msg = preg_replace('/https:\/\/www\.tiktok\.com\/@.*\/video\/(\d+)/', $tkqmeqvid, $msg);
		
	
	//echo "(".$cleanedText31z.")   ==== ";
		
		
		//
		
       // echo "TikTok Video URL: $url   \n";
        
    }
}


    








return $msg;


}









if (isset($user)) {
	
	if (isset($_GET['response'])) {
		
		$krplq11_rpl2 = filter($_GET['response']);	
		
		$reply = $pdo->fetchOne("SELECT * FROM `user` WHERE `id` = ?",[$krplq11_rpl2]);

		//if (!$reply) {
		//	header("location: /?");
		//	exit;
		//} 

		$insert = ''.when_editing($reply['nick']).', ';

		$go_link = '?response='.$reply['id'];

	} else {
		
		$reply = NULL;
		$insert = NULL;
		$go_link = NULL;

	}

}




function unsafeChar($var)
{
    return str_replace(array("&gt;", "&lt;", "&quot;", "&amp;"), array(">", "<", "\"", "&"), $var);
}

function safechar($var)
{
    return htmlspecialchars(unsafeChar($var));
}

function safe($var)
{
    return str_replace(array('&', '>', '<', '"', '\''), array('&amp;', '&gt;', '&lt;', '&quot;', '&#039;'), str_replace(array('&gt;', '&lt;', '&quot;', '&#039;', '&amp;'), array('>', '<', '"', '\'', '&'), $var));
}


function is_valid_id($id)
{
  return is_numeric($id) && ($id > 0) && (floor($id) == $id);
}



function generate_card_arrays() {
  $suits = array('diamond', 'heart', 'spade', 'club');
  $cards_per_suit = 13;

  $card_arrays = array();

  foreach ($suits as $suit) {
    $card_array = array();
    for ($i = 1; $i <= $cards_per_suit; $i++) {
      $card_array[] = array('value' => $i, 'suit' => $suit);
    }
    $card_arrays[$suit] = $card_array;
  }

  return $card_arrays;
}



function shuffle_deck($deck) {
  // Shuffle the deck using Fisher-Yates algorithm
  $count = count($deck);
  for ($i = $count - 1; $i > 0; $i--) {
    $j = mt_rand(0, $i);
    // Swap $deck[$i] and $deck[$j]
    $temp = $deck[$i];
    $deck[$i] = $deck[$j];
    $deck[$j] = $temp;
  }
  return $deck;
}

function distribute_cards($card_arrays, $num_players) {
  $shuffled_cards = array();
  foreach ($card_arrays as $suit => $cards) {
    $shuffled_cards[$suit] = shuffle_deck($cards);
  }

  $players = array_fill(0, $num_players, array());

  $current_player = 0;
  foreach ($shuffled_cards as $suit => $cards) {
    foreach ($cards as $card) {
      $players[$current_player][] = $card;
      $current_player = ($current_player + 1) % $num_players;
    }
  }

  return $players;
}

/*
// Call the function to generate the arrays
$card_arrays = generate_card_arrays();

// Define the number of players
$num_players = 4;

// Distribute the cards to the players
$players = distribute_cards($card_arrays, $num_players);

// Print the cards for each player
for ($i = 0; $i < $num_players; $i++) {
  echo "Cards for Player " . ($i + 1) . ": " . json_encode($players[$i]) . "\n";
}*/



/*
// Call the function to generate the arrays
$card_arrays = generate_card_arrays();

// Print the arrays for each suit
foreach ($card_arrays as $suit => $cards) {
  echo "Cards for $suit: " . json_encode($cards) . "\n";
}
*/













function blog_output($content) 
{
	//global $config;
	$search     = array('/\[b\](.*?)\[\/b\]/ms', '/\[i\](.*?)\[\/i\]/ms', '/\[u\](.*?)\[\/u\]/ms',
						'/\[img\](.*?)\[\/img\]/ms', '/\[email\](.*?)\[\/email\]/ms', '/\[url\="?(.*?)"?\](.*?)\[\/url\]/ms',
						'/\[size\="?(.*?)"?\](.*?)\[\/size\]/ms', '/\[color\="?(.*?)"?\](.*?)\[\/color\]/ms', '/\[quote](.*?)\[\/quote\]/ms',
						'/\[list\=(.*?)\](.*?)\[\/list\]/ms', '/\[list\](.*?)\[\/list\]/ms', '/\[\*\]\s?(.*?)\n/ms');
	$replace    = array('<strong>\1</strong>', '<em>\1</em>', '<u>\1</u>', '<img src="\1" alt="\1" />',
						'<a href="mailto:\1">\1</a>', '<a href="\1">\2</a>', '<span style="font-size:\1%">\2</span>',
						'<span style="color:\1">\2</span>', '<blockquote>\1</blockquote>', '<ol start="\1">\2</ol>',
						'<ul>\1</ul>', '<li>\1</li>');
	$content    = preg_replace($search, $replace, $content);
	$content    = preg_replace('/\[photo=(.*?)\]/ms', '<div class="row"><div class="col-md-8 col-md-offset-2"><center><img src="' .$config['BASE_URL']. '/media/photos/\1.jpg" alt="" class="blog_image" /></center></div></div>', $content);
	
	
	//$content    = preg_replace('/\[video=(.*?)\]/ms', '<div class="row"><div class="col-md-8 col-md-offset-2"><div class="blog_video"><div id="blog_video_\1"><iframe src="' .$config['BASE_URL'].'/view.php?VID=\1" frameborder="0" allowfullscreen></iframe></div></div></div></div>', $content);
	
	
	$content    = str_replace("\r", "", $content);
	$content    = "<p>".preg_replace("/(\n)/", "</p><p>", $content)."</p>";
	
	return $content;
}


function check_image($path, $ext)
{
	$check = FALSE;
    if ($ext == 'gif') {
        $check = imagecreatefromgif($path);
    } elseif ($ext == 'png') {
        $check = imagecreatefrompng($path);
    } elseif ($ext == 'jpeg' OR $ext = 'jpg') {
        $check = imagecreatefromjpeg($path);
    }

	if ($ext == 'gif' && $check) {
  		$contents = file_get_contents($path);
  		if (strpos($contents, 'php') !== FALSE) {
      		$check = FALSE;
  		}
	}

    return ($check) ? TRUE : FALSE;
}





function ConvertImage($imgo, $dst, $type = '') {


   $img = new Imagick($imgo);
   //$img->cropThumbnailImage($width,$height);
   //$img->resizeImage(800, 420, Imagick::FILTER_LANCZOS,1);
   //$img->setImageFormat('jpeg');
  // $img->setImageCompressionQuality(100);
 
if ($type == 'scaled') {
   $img->cropThumbnailImage(800,420);
}
   $img->setImagePage(0, 0, 0, 0);
   $img->setImageFormat('jpeg');
   $img->writeImage($dst);


   $img->clear(); 
   $img->destroy();



}

function ifImage($name, $filep = null) {

$allowedFiles =  array('gif', 'png', 'jpg', 'jpeg', 'webp'); 

$ext = pathinfo($name, PATHINFO_EXTENSION);





	if ($ext == 'gif' && $filep != null) {
		
			$contents = file_get_contents($filep);
			if (strpos($contents, 'php') !== FALSE) {
				return false;
			}
			
	} else {



		if (!in_array($ext, $allowedFiles)) {
			return false;
		} else {
			return true;
		}

	}


}

function disp_message($message){
	if (isset($message->type)){
		return '<div class="alert '.$message->type.'"><a class="alert-close" href="#" title="Fermer">×</a>'.$message->text.'</div>';
	}
}


	function size_convert($size){
		$unit=array('B','Kb','Mb','Gb','Tb','Pt');
		$string_to_return = round($size/pow(1024,($i=floor(log($size,1024)))),2);
		return number_format($string_to_return,2,".",' ').' '.$unit[$i];
	}
	
	
	
	
	function string_to_url($string){
		//normalize it BEFORE replacing the unacepted chars
		$string = normalize_characters($string);
		//
		$string = preg_replace("/[^A-Za-z0-9]/", "-", $string);
		$string = preg_replace("/[-]+/", '-', $string);
		$string = trim($string,"-");
		$string = strtolower($string);
		return $string;
	}
	
	
		function normalize_characters($string){
		// !!!
		// !!! NOTE that SPECIAL chars like "ă" might convert themselfs into "a" in this file; 
		// in that case, you need to pick UTF-8 when saving this file with NOTEPAD
		// OR in Dreamwever it seems to work ok when saving the file and picking "C (Canonical Decomposition, followed by ...)" under file name
		$string = str_replace(array("ä", "ă", "î", "ş", "ţ", "â", "ő", "ö", "í", "Ă", "Î", "Ş", "Ţ", "Â", "Ő", "Ö", "ĺ", "Á", "á", "É", "é", "Í", "í", "Ñ", "ñ", "Ó", "ó", "Ú", "ú", "Ü", "ü", "¿", "¡", "è", "È", "Ā", "ß", "Ä"), array("a", "a", "i", "s", "t", "a", "o", "o", "i", "A", "I", "S", "T", "A", "O", "O", "I", "A", "a", "E", "e", "I", "i", "N", "n", "O", "o", "U", "u", "U", "u", "?", "i", "e", "E", "A", "ss", "A"), $string);
		return $string;
	}	



//this function will not work unless you have private server not some kind of shared
	function crop_image($original_file, $destination_file, $new_width = 120, $new_height = 90){

		list($original_width,$original_height) = getimagesize($original_file);

		// first test if difference between old/new width are larger than diff betwern old/new height
		$width_difference = $original_width/$new_width;
		$height_difference = $original_height/$new_height;
		
		// resize width first if width difference < height difference or if differences are the same (old/new image have same proportions);

		// resize width first if width difference is smaller than height difference
		if($width_difference<=$height_difference){
			$resize_first = "width";
		}
		// resize height first if height difference is smaller than width difference
		if($height_difference<$width_difference){
			$resize_first = "height";
		}
		
		if($resize_first == "width"){
			exec("convert ".escapeshellarg($original_file)." -auto-orient -resize ".$new_width."x -flatten -gravity center -crop ".$new_width."x".$new_height."+0+0 -quality 100 ".escapeshellarg($destination_file));
		} else {
			exec("convert ".escapeshellarg($original_file)." -auto-orient -resize x".$new_height." -flatten -gravity center -crop ".$new_width."x".$new_height."+0+0 -quality 100 ".escapeshellarg($destination_file));
		}
		
	}
// crop_image("ferrari.jpg","ferrari_new.jpg",120,90);



	function resize_in_limits($original_file, $destination_file, $max_width = 125, $max_height = 200){

		list($original_width,$original_height) = getimagesize($original_file);
		
		// prevent scalling up smaller images ? (get the smaller one...)
		$max_width = min($max_width,$original_width);
		$max_height = min($max_height,$original_height);
		
		// first test if difference between old/new width are larger than diff betwern old/new height
		$width_difference = $original_width/$max_width;
		$height_difference = $original_height/$max_height;
		
		// resize by width if width_difference is smaller than height_difference
		if($width_difference>=$height_difference){
			exec("convert ".escapeshellarg($original_file)." -auto-orient -resize ".$max_width."x -quality 100 -flatten ".escapeshellarg($destination_file));
		}
		// resize by height if width_difference is smaller than height_difference
		if($width_difference<$height_difference){
			exec("convert ".escapeshellarg($original_file)." -auto-orient -resize x".$max_height." -quality 100 -flatten ".escapeshellarg($destination_file));
		}
	}
// resize_in_limits("ferrari.jpg","ferrari_new.jpg",600,400);


	function string_to_file_name($string){
		
		$string = strip_tags($string);
		$string = trim($string);
		
		$string = str_replace("#", "", $string);
		$string = str_replace("&", "", $string);
		$string = str_replace("+", "", $string);
		$string = str_replace("/", "", $string);
		$string = str_replace("\\", "", $string);
		$string = str_replace("?", "", $string);
		
		$string = str_replace(":", "", $string);
		$string = str_replace("*", "", $string);
		$string = str_replace("<", "", $string);
		$string = str_replace(">", "", $string);
		// Dreamweaver shows this car as reserved when renaming a folder, so don't allow it here eider
		$string = str_replace("|", "", $string);
		// windows doesn't accept " but accepts '
		$string = str_replace('"', "", $string);
		
		
		// trim it again after removed some characters that might have been on margins after a space
		$string = trim($string);
		
		return $string;
	}
	
	








function random_string($length) {
    $str = random_bytes($length);
    $str = base64_encode($str);
    $str = str_replace(["+", "/", "="], "", $str);
    $str = substr($str, 0, $length);
    return $str;
}





function reverseGeo($msg)
{
    $replacements = array(
        'a' => 'ა', 'b' => 'ბ', 'g' => 'გ', 'd' => 'დ', 'e' => 'ე', 'v' => 'ვ', 'z' => 'ზ', 't' => 'თ',
        'i' => 'ი', 'k' => 'კ', 'l' => 'ლ', 'm' => 'მ', 'n' => 'ნ', 'o' => 'ო', 'p' => 'პ', 'j' => 'ჟ',
        'r' => 'რ', 's' => 'ს', 'u' => 'უ', 'f' => 'ფ', 'q' => 'ქ', 'y' => 'ყ', 'sh' => 'შ', 'ch' => 'ჩ',
        'c' => 'ც', 'dz' => 'ძ', 'j' => 'ჭ', 'w' => 'წ', 'x' => 'ხ', 'j' => 'ჯ', 'h' => 'ჰ'
    );

    foreach ($replacements as $original => $replacement) {
        $msg = str_replace($replacement, $original, $msg);
    }

    return $msg;
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








function parseUserNameMentioned($text, $where, $type) {
	
global $pdo, $user, $time;	
	
	$qw = $text;
	$pattern333 = "/@[\p{L}0-9\_\-]+/u";

	preg_match($pattern333, $qw, $matches);


	if (count($matches)>0) {
		
		$lwqe1 = str_replace('@', '', $matches[0]);

		if ($pget = $pdo->fetchOne("select `id`  from `user` where `nick` = ?", [$lwqe1])) {
			
		// user_activity($user, $author, $when, $where, 'mentioned_inguest', '0')

		user_activity($pget['id'], $user['id'], $time, $where, $type, $user['id']);
			
		}
			
		//function user_activity($user, $author, $when, $where, $type, $obj, string $text = "")
		//var_dump($matches);

	}




}


function to_CalculatePage(string $desired_id, string $total, string $dataInArow) {
	
	
	

// Rows per page
$rowsPerPage = $dataInArow;

// Desired id
$desired_id = 11;
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

$totalRecords = $total;

// Calculate total number of pages
$totalPages = ceil($totalRecords / $rowsPerPage);

// Calculate the page for the desired id
$desiredPage = ceil($desiredId / $rowsPerPage);


// Display the result
//echo "Total Records: $totalRecords \n";
//echo "Total Pages: $totalPages \n";
//echo "Desired ID: $desiredId is on Page: $desiredPage \n";
	
	//now lets return page number
	return $desiredPage;
}



class Text {

public $text;


public function __construct(string $text) {
	$this->text = $text;
}


public function escaped() {

$str = $this->text;

$str = htmlentities($str, ENT_QUOTES, 'UTF-8'); 
//$str=makeUrltoLink($str); 
$str = smiles($str); 
$str = $this->bbcode($str); 
$str = nl2br($str); 
$str = stripslashes($str);

return $str;

    
}


public function unescaped() {
	
$str = $this->text;

$str = htmlentities($str, ENT_QUOTES, 'UTF-8'); 
$str = nl2br($str); 
$str = stripslashes($str);

return $str;


}



function makeUrltoLink() {
	
	
$text = $this->text;	


//$text = htmlentities($text, ENT_QUOTES, 'UTF-8'); 
//$text = nl2br($str);

$q21 = "#ht(tp|tps)((://www\.)|(://))(\w+)\.(\w+)#i";

$qq2 = preg_replace($q21, '<a href="$0">$0</a>', $text);

 return $qq2;
}
 
 





function BBcode(string $msg) {
	
	
//$msg = $this->text;		


/*
$bbcode = array(
'/\[red\](.+)\[\/red\]/isU' => '<span style="color:#ff0000;">$1</span>',
'/\[b\](.+)\[\/b\]/isU' => '<b>$1</b>',
'/\[yellow\](.+)\[\/yellow\]/isU' => '<span style="color:#ffff22;">$1</span>',
'/\[green\](.+)\[\/green\]/isU' => '<span style="color:#00bb00;">$1</span>',
'/\[blue\](.+)\[\/blue\]/isU' => '<span style="color:#0000bb;">$1</span>',
'/\[brown\](.+)\[\/brown\]/isU' => '<span style="color:brown;">$1</span>',
'/\[white\](.+)\[\/white\]/isU' => '<span style="color:#ffffff;">$1</span>',
'/\[black\](.+)\[\/black\]/isU' => '<span style="color:black;">$1</span>',
'/\[orange\](.+)\[\/orange\]/isU' => '<span style="color:orange;">$1</span>',
'/\[pink\](.+)\[\/pink\]/isU' => '<span style="color:pink;">$1</span>',
'/\[violet\](.+)\[\/violet\]/isU' => '<span style="color:violet;">$1</span>',
'/\[gray\](.+)\[\/gray\]/isU' => '<span style="color:gray;">$1</span>',
'/\[c\](.+)\[\/c\]/isU' => '<center>$1</center>'
);
*/
$msg = preg_replace('/\[br\]/isU', '<br>', $msg);	
$msg = preg_replace('/\[url=(.*?)\](.+)\[\/url\]/isU', "<a href='$1'>$2</a>", $msg);
//$msg = preg_replace('/\[color=([\#0-9a-zA-Z]+)\](.+)\[\/color\]/isU', '<span style="color:$1;">$2</span>', $msg);
$msg = preg_replace('/\[img\](.+)\[\/img\]/isU', '<img style="max-width:40%" src="$1">', $msg);

$msg = preg_replace('~(^|\s)(htt(p|ps)://(.*?))(\s|$)~ui', "<a href='$2'>$2</a>", $msg);

//$msg = preg_replace(array_keys($bbcode), array_values($bbcode), $msg);

return $msg;
}





}




class Reactions {
	
public $type;
public $post;
public $where;	
public $st_reactSts;
public $lastbtn;
public $whereLink;	


	
public function __construct(string $type, string $post, string $where) {
	$this->type = $type;
	$this->post = $post;
	$this->where = $where;
	$this->whereLink = $where;
	
}	


public function addReactions($linkTo, $kqrct, $kq_zz){
?>



	<div class="relative pointer" onclick="window.location='<?=$linkTo;?>'">
				
		<div st_reactSts="<?=$this->st_reactSts;?>" lastbtn="<?=$this->lastbtn;?>"  id="React_Main" post="<?=$this->post;?>" class="  <?=($kq_zz == 0 ? " dddl1241_1 " : "");?>   flreacRendshow1">
								
					<span react_Type="wow" val="<?=$kqrct->wow;?>" post="<?=$this->post;?>" <?=($kqrct->wow == 0 ? "class='none'" : "");?>>😂</span>
								
					<span react_Type="sad" val="<?=$kqrct->sad;?>" post="<?=$this->post;?>" <?=($kqrct->sad == 0 ? "class='none'" : "");?>>😢</span>
								
					<span react_Type="frown" val="<?=$kqrct->frown;?>" post="<?=$this->post;?>" <?=($kqrct->frown == 0 ? "class='none'" : "");?>>🙄</span>
							
					<span react_Type="angry" val="<?=$kqrct->angry;?>" post="<?=$this->post;?>" <?=($kqrct->angry == 0 ? "class='none'" : "");?>>😡</span>
							
					<span react_Type="love" val="<?=$kqrct->love;?>" post="<?=$this->post;?>" <?=($kqrct->love == 0 ? "class='none'" : "");?>>😍 </span>
							
							
					<span class="rpqwe_22_zlnt pointer" post_react="<?=$this->post;?>"> <?=$kq_zz;?> </span>
												
		 </div>
								
	</div>	



<?	
}



public function ShowReactionButton($replyToLink, $when_tm){
?>
	

<div class="chat_zq_5"> 
		
		<div>
			
			
	<div class="relative none rel22rctq1312" reaction="<?=$this->post;?>" id="">
					
	<div class="Up_Reaction_Main">


		
		
	<div class="Up_Reaction_Main_d1 pointer Up_Reaction_Main_d1_sacling">
		
		<div class="relative">
			<div class="cs1_zwow" onclick="Reacts(<?=$this->post;?>, 'wow', this)" type="<?=$this->type;?>"> 😂</div>
		</div>
		
	</div>	
		

		
	<div class="Up_Reaction_Main_d1 pointer Up_Reaction_Main_d1_sacling">
	
		<div class="relative">
			<div class="cs1_zcry" onclick="Reacts(<?=$this->post;?>, 'sad', this)" type="<?=$this->type;?>"> 😢</div>
		</div>
	
	</div>	
	
	
	<div class="Up_Reaction_Main_d1 pointer Up_Reaction_Main_d1_sacling">
	
		<div class="relative">
			<div class="cs1_zFrown" onclick="Reacts(<?=$this->post;?>, 'frown', this)" type="<?=$this->type;?>"> 🙄</div>
		</div>
	
	</div>	
	
	
	<div class="Up_Reaction_Main_d1 pointer Up_Reaction_Main_d1_sacling">
	
		<div class="relative">
			<div class="cs1_zAngry" onclick="Reacts(<?=$this->post;?>, 'angry', this)" type="<?=$this->type;?>"> 😡</div>
		</div>
	
	</div>	
	
	
	<div class="Up_Reaction_Main_d1 pointer Up_Reaction_Main_d1_sacling">
	
		<div class="relative">
			<div class="cs1_zlove" onclick="Reacts(<?=$this->post;?>, 'love', this)" type="<?=$this->type;?>"> 😍</div>
		</div>	
	
	</div>	
	
		


	</div>
								
				</div>			
			
			
			
			<a rct="btn1shSt2" onclick="ShowingReactionDiv(<?=$this->post;?>)" href="?id=4_rct" class="clrWpstofLink pointer">Like</a>
			
		</div> 	

		<div>
			<a href="<?=$replyToLink;?>" class="clrWpstofLink">Reply</a>
		</div> 


	
<div>

	




</div>


		<div> 
			<span class="czrz22z_25"> <?=when($when_tm);?> </span> 
		</div>
		
	</div>

	
	
	
	<?
	
}

}







function Tdd_months(int $tt) : string {


$qq=['Jan','Feb','Mar','Apr','May','jun','Jul','Aug','Sep','Oct','Nov','Dec'];
$qq2=['January','February','March','April','May','June','July','August','September','October','November','December'];





	return $qq2[$tt-1];
	
}


function thumbnail($image, $new_w, $new_h, $focus = 'center')
{
    $w = $image->getImageWidth();
    $h = $image->getImageHeight();

    if ($w > $h) {
        $resize_w = $w * $new_h / $h;
        $resize_h = $new_h;
    }
    else {
        $resize_w = $new_w;
        $resize_h = $h * $new_w / $w;
    }
    $image->resizeImage($resize_w, $resize_h, Imagick::FILTER_LANCZOS, 0.9);

    switch ($focus) {
        case 'northwest':
            $image->cropImage($new_w, $new_h, 0, 0);
            break;

        case 'center':
            $image->cropImage($new_w, $new_h, ($resize_w - $new_w) / 2, ($resize_h - $new_h) / 2);
            break;

        case 'northeast':
            $image->cropImage($new_w, $new_h, $resize_w - $new_w, 0);
            break;

        case 'southwest':
            $image->cropImage($new_w, $new_h, 0, $resize_h - $new_h);
            break;

        case 'southeast':
            $image->cropImage($new_w, $new_h, $resize_w - $new_w, $resize_h - $new_h);
            break;
    }
}

//https://ok.ru/live/1620013293514

function get_vidOK($vid) {
	
	
$kqwe = preg_match_all("/ok.ru\/(video|live)\/(\d+)/ui", $vid, $matches);

$frsQ = $matches[0][0];	
//$frsQ2 = $matches[0][1];
	
	
//var_dump($frsQ);	
	
//exit;	
	
if (strlen2($frsQ)>5) {


$lqwke3 = str_replace(['live','video'], ['videoembed','videoembed'], $frsQ);


$html2Da = file_get_contents("https://$lqwke3");


if (preg_match('|<div class="vp_video_stub_txt">Видео не найдено</div>|i', $html2Da)) {
	
	return false;
	
} else {
	
	preg_match('|<title>(.*?)</title>|i', $html2Da, $mnqwe);

	//preg_match('|<img src="(.*?)" area-hidden="true" class="vid-card_img" style="">|i', $html2Da, $kvidImg);


//var_dump($kvidImg[1]);


	return $mnqwe[1];
	
}

	
} else {
	
		
	
	$data = file_get_contents("https://youtube.com/oembed?format=json&url=http://www.youtube.com/watch?v=$vid");
		
	if ($data == 'Bad Request'){ 

	return false; 

	} else {

	$json = json_decode($data);
	return $json->title;

	}

}
	
}


function get_vid($vid){
	
$data = file_get_contents("https://youtube.com/oembed?format=json&url=http://www.youtube.com/watch?v=$vid");
	
if ($data == 'Bad Request'){ 

return false; 

} else {

$json = json_decode($data);
return $json->title;

}
	
}




function RemoveSpecialChar($str) {

//$res = str_replace( array( "'", '"',',' , ';', '<', '>' ,'^','/', "\\", '.'), '', $str);

$res = preg_replace('/[^a-zA-Z0-9]/s','', $str);
$res = str_replace(array("&gt;", '&lt;'), '', $str);
  
return $res;
}





function if_whitespace(string $text){

if (trim($text) == $text) {
	return false;
} else {
	return true;
}


}


function censure($s, $delta = 3, $continue = "\xe2\x80\xa6")
{

return false;

}

function cnkwwCheckiFbackslashthere(){

preg_replace( '/\x5c\w+\.php$/i', '<b>${0}</b>', __FILE__);	
	
}

	//string first parameter
	//returns false if is not valid
    function validateUsername(string $username): bool 
    {
        if (preg_match("/^[\p{L}\p{Extended_Pictographic}\s\,\=_.\-0-9]{3,32}$/ui", $username)) return true;

        return false;
    }
    
    //if you dont want to use complicated use this one
    function validateUsername2(string $username): bool {


	$str = $username;
	$chars = ['&', '.', '!', '+', '<', '>', '\\', '"', '\'', '\x5c'];
	$length = strlen($str);

	$sts = false;

	for ($i = 0; $i < $length; $i++) {
		if (in_array($str[$i], $chars)) {
			$sts = true;
			break;
		}
	}

	
	
        return $sts;
    } 
    
    
    //check if we are in friends
     //returns booloean ; if we are in friends returns  true if not then false;
     //for this time this functions ain't realized
      function checkContact(int $tid, int $uid): bool
    {
		$ign = 0;
        
        if ($ign > 0) return true;

        return false;
    }  
   
   
    /**
     * Password encryption
     *
     * @param string $password
     * @return string
     */
    function passwordEncrypt(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * Verify password
     *
     * @param string $password
     * @param string $hash
     * @return bool
     */
    function passwordCheck(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    } 
    
   
  //counting how many times user tried to login
   function loginAttemptCount(int $seconds, string $username, string $ip): int
    {
        // First we delete old attempts from the table
        $oldest = strtotime(date("Y-m-d H:i:s") . " - " . $seconds . " seconds");
        $oldest = date("Y-m-d H:i:s", $oldest);
       // $this->db->delete('login_attempts', "`datetime` < '{$oldest}'");
        
        // Next we insert this attempt into the table
        $values = array(
        'address' => $ip,
        'datetime' =>  date("Y-m-d H:i:s"),
        'username' => $username
        );
       // $this->db->insert('login_attempts', $values);
        
        // Finally we count the number of recent attempts from this ip address  
       // $attempts = $this->db->countRow('login_attempts', " `address` = '{$_SERVER['REMOTE_ADDR']}' AND `username` = '{$username}'");

        return $attempts;
    } 
   
    

function checkEvenOrOdd($number){
    if($number % 2 == 0){
        echo "Even"; 
    }
    else{
        echo "Odd";
    }
}

function number(string $num){
	
	//for the protection purpose only )) cuz who knows what will be result in some cases ))
	//since we need just an integer  lets check it in many ways ))
	
	if (!is_numeric($num))return 0;
	
	$num1 = (int)$num;
	
	return abs($num1);
}
  
  
  
function time_counter(int $ab){


if ($ab>60) {
	$cnt1 = round($ab / 300);
} else  {
	$cnt1 = 1;
}

return $cnt1." min read";
} 


function Get(string $val) {
	return $_GET[$val];
}

function Post(string $val) {
	return $_POST[$val];
}

function Cookie(string $name) {
	return $_COOKIE[$val];
}

function Session(string $name,  string $val = '') {
	
	if ($val == '') { 
		return $_SESSION[$name];
    } else {
		$_SESSION[$name] = $val;
	}
	
}

function spec_smbls(string $string) {
	//function RemoveSpecialChar($str) {

//$res = str_replace( array( "'", '"',',' , ';', '<', '>' ,'^','/', "\\", '.'), '', $str);

$res = preg_replace('/[^a-zA-Z0-9]/s','', $str);
$res = str_replace(array( "&gt;", '&lt;'), '', $str);
  
return $res;
//}

//header("Content-type: text/css; charset: UTF-8");
}


function get_Data($ip){
	$url = 'http://ip-api.com/json/'; 
	
	return file_get_contents($url."".$ip);
}

function get_DataOfIp($ip){
	//example
	
/*	

https://api.iplocation.net/?ip=193.176.214.42 = {
 
{"ip":"193.176.214.42","ip_number":"3249591850","ip_version":4,"country_name":"Georgia","country_code2":"GE","isp":"LLC Skytel","response_code":"200","response_message":"OK"}

}


https://api.iplocation.net/?ip=8.8.8.8 = {

{"ip":"8.8.8.8","ip_number":"134744072","ip_version":4,"country_name":"United States of America","country_code2":"US","isp":"Google LLC","response_code":"200","response_message":"OK"}
 }
	
*/	
	$url = 'https://api.iplocation.net/?ip='; 
	
	return file_get_contents($url."".$ip);
}



function convertAndBlurForPosts($imgo, $dst, $type = '') {


   $img = new Imagick($imgo);
   //$img->cropThumbnailImage($width,$height);
   //$img->resizeImage(800, 420, Imagick::FILTER_LANCZOS,1);
   //$img->setImageFormat('jpeg');
  // $img->setImageCompressionQuality(100);
 
if ($type == 'scaled') {
   $img->cropThumbnailImage(800,420);
}
   $img->setImagePage(0, 0, 0, 0);
   $img->setImageFormat('jpeg');
   $img->writeImage($dst);


   $img->clear(); 
   $img->destroy();



}



function if_img_upls($name) {

$allowedFiles =  array('gif', 'png', 'jpg', 'jpeg', 'webp','bmp'); 

$ext = pathinfo($name, PATHINFO_EXTENSION);

if (!in_array($ext, $allowedFiles)) {
    return false;
} else {
	return true;
}

}


function rplc22($text){

$string = $text;
$patterns = array('.php','.phar','.phps','.pht','.html','.xhtml','.wml','.css','.phtml','.sql','.js',',');
$replacements = '';
return str_replace($patterns, $replacements, $string);	
	
}





function Where($ref)
{
if (preg_match('#^/online\.php#',$ref))$sad='Online';
else if (preg_match('#^/exit\.php#',$ref))$sad='გავიდა';
else if (preg_match('#^/ban\.php#',$ref))$sad='ბლოკირებული';
else if (preg_match('#^/act\.php#',$ref))$sad='გასააქტიურებელი';
else if (preg_match('#^/index\.php#',$ref))$sad='მთავარი გვერდზე';
else if (preg_match('#^/info\.php#',$ref))$sad='პროფილი';
else if (preg_match('#^/viqtorina/#',$ref))$sad='ვიქტორინა';
else if (preg_match('#^/adm_panel/#',$ref))$sad='მთავარი';
else if (preg_match('#^/foto/#',$ref))$sad='ფოტოალბომი';
else if (preg_match('#^/news/#',$ref))$sad='News';
else if (preg_match('#^/forum/#',$ref))$sad='Forum';
else if (preg_match('#^/chat/#',$ref))$sad='ჩათში';
else if (preg_match('#^/guest/#',$ref))$sad='ჭორბიურო';
else if (preg_match('#^/apps/#',$ref))$sad='თამაშები';
else if (preg_match('#^/apps/fruit_cocktail/#',$ref))$sad='სლოტი';
else if (preg_match('#^/apps/black_jack/#',$ref))$sad='ბლექ ჯეკი';
else if (preg_match('#^/apps/duraka/#',$ref))$sad='დურაკა';
else if (preg_match('#^/apps/lataria/#',$ref))$sad='ლატარია';
else if (preg_match('#^/mail/#',$ref))$sad='წერილები';
else if (preg_match('#^/apps/ruletka/#',$ref))$sad='რულეტკა';
else if (preg_match('#^/apps/777/#',$ref))$sad='[7]-[7]-[7]';
else if (preg_match('#^/apps/hangman/#',$ref))$sad='ჩამოხრჩობანა';
else if (preg_match('#^/plugins/rules/#',$ref))$sad='საინფორმაციო';
else if (preg_match('#^/plugins/poll/#',$ref))$sad='გამოკითხვა';
else if (preg_match('#^/plugins/video/#',$ref))$sad='ათვალიერებს ვიდეოგალერეას';
else if (preg_match('#^/plugins/smiles/#',$ref))$sad='ათვალიერებს სმაილებს';
else if (preg_match('#^/plugins/notes/#',$ref))$sad='ჩანაწერებში';
else if (preg_match('#^/user/smiles\.php#',$ref))$sad='სმაილები';
else if (preg_match('#^/user/info/edit\.php#',$ref))$sad='ცვლის ანკეტა';
else if (preg_match('#^/user/info/anketa\.php#',$ref))$sad='ათვალიერებს ანკეტას';
else if (preg_match('#^/user/info/#',$ref))$sad='პარამეტრები';
else if (preg_match('#^/user/bbcode/#',$ref))$sad='კოდები';
else if (preg_match('#^/user/frends/#',$ref))$sad='მეგობრები';
else if (preg_match('#^/page/send/#',$ref))$sad='საჩუქრის ჩუქებაში';
else if (preg_match('#^/user/index\.php#',$ref))$sad='მომხმარებლები';
else if (preg_match('#^/user/money/#',$ref))$sad='სერვისები';
else if (preg_match('#^/user/gift/#',$ref))$sad='საჩუქრები';
else if (preg_match('#^/user/myguest/#',$ref))$sad='სტუმრები';
else if (preg_match('#^/user/notification/#',$ref))$sad='განხილვები';
else if (preg_match('#^/user/ignor/#',$ref))$sad='შავი სია';
else if (preg_match('#^/user/users\.php#',$ref))$sad='მომხმარებლები';
else $sad='...';
return $sad;
}







function cal_percentage($num_amount, $num_total) {
	
//if you dont want to see an error
if ($num_total==0) return 0; 	
	
  $count1 = $num_amount / $num_total;
  $count2 = $count1 * 100;
  $count = number_format($count2, 0);
  
  return $count;
}


function convert($size) {
    $unit=array('b','kb','mb','gb','tb','pb');
    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
 }


//echo convert(memory_get_usage(true));



function escape($str) {
	$trans = array('&' => '&amp;', '<' => '&lt;', '>' => '&gt;', '"' => '&quot;', '\'' => "&#x27;", '\\' => '&#8726;');
	return strtr($str, $trans);
}




function validate_ip($ip) {
    if (strtolower($ip) === 'unknown')
        return false;
    $ip = ip2long($ip);
    if ($ip !== false && $ip !== -1) {
        $ip = sprintf('%u', $ip);
        if ($ip >= 0 && $ip <= 50331647)
            return false;
        if ($ip >= 167772160 && $ip <= 184549375)
            return false;
        if ($ip >= 2130706432 && $ip <= 2147483647)
            return false;
        if ($ip >= 2851995648 && $ip <= 2852061183)
            return false;
        if ($ip >= 2886729728 && $ip <= 2887778303)
            return false;
        if ($ip >= 3221225984 && $ip <= 3221226239)
            return false;
        if ($ip >= 3232235520 && $ip <= 3232301055)
            return false;
        if ($ip >= 4294967040)
            return false;
    }
    return true;
}

function get_ip_address() {
    if (!empty($_SERVER['HTTP_X_FORWARDED']) && validate_ip($_SERVER['HTTP_X_FORWARDED']))
        return $_SERVER['HTTP_X_FORWARDED'];
    if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
        return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && validate_ip($_SERVER['HTTP_FORWARDED_FOR']))
        return $_SERVER['HTTP_FORWARDED_FOR'];
    if (!empty($_SERVER['HTTP_FORWARDED']) && validate_ip($_SERVER['HTTP_FORWARDED']))
        return $_SERVER['HTTP_FORWARDED'];
    return $_SERVER['REMOTE_ADDR'];
}


function getBytesFromHexString($hexdata)
{
  for($count = 0; $count < strlen($hexdata); $count+=2)
    $bytes[] = chr(hexdec(substr($hexdata, $count, 2)));

  return implode($bytes);
}

function getImageMimeType($imagedata)
{
  $imagemimetypes = array( 
    "jpeg" => "FFD8", 
    "png" => "89504E470D0A1A0A", 
    "gif" => "474946",
    "bmp" => "424D", 
    "tiff" => "4949",
    "tiff" => "4D4D"
  );

  foreach ($imagemimetypes as $mime => $hexbytes)
  {
    $bytes = getBytesFromHexString($hexbytes);
    if (substr($imagedata, 0, strlen($bytes)) == $bytes)
      return $mime;
  }

  return NULL;
}


function erase_cookie($name) {
	setcookie($name, "", time()-3600, "/");
}

function set_cookie($name, $value, $time) {
	setcookie($name, $value, $time, "/");
}






/* user functions */

function if_friend($me, $them){
	

global $pdo;	
	
//$frend = mysql_result(mysql_query("SELECT COUNT(*) FROM `frends` WHERE (`user` = '".intval($user['id'])."' AND `frend` = '".intval($ank['id'])."') OR (`user` = '".intval($ank['id'])."' AND `frend` = '".intval($user['id'])."')"),0);


$qrifrm2 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends` WHERE `user` = ? and `who` = ?",[$me,$them]);


if ($qrifrm2>0) {
	return 1;
} else {
	return 0;
}
	

}


function if_blocked($ank) {
	
global $user, $time, $pdo;

if ($user['id']!=$ank['id']) {


$block = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `ban` WHERE `id_user` = ? AND `time` > ?", [$ank['id'],$time]);


if ($block>0)
{
?>

		

<div class='czFTr21'>
<span>This page has been blocked</span>
</div>	



<? if ($user['level']>$ank['level']) { ?>

<div class="czFTr21 brdrtop">
  <a href="/apanel/ban.php?id=<?=$ank['id'];?>">ბლოკირება</a> 
</div>

<? } ?>

	

<?
include_once 'footer.php';
exit;

}	

}

}




function if_blacklisted($ank) {
	
global $user, $time, $pdo;

if ($user['id']!=$ank['id']) {


$black = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `user_ignor` WHERE `user` = ? AND `who` = ?",[$ank['id'],$user['id']]);


$my_black = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `user_ignor` WHERE `user` = ? AND `who` = ?",[$user['id'],$ank['id']]);


$qwe = new user($ank['id']);


if ($black>0) {
?>
			
<div class='czFTr21 bordrBottom'>
<?=$qwe->photo();?>
<?=$qwe->nick();?>
</div>

<div class='czFTr21'>
<span>You have been ignored and you cant see this page</span>
</div>


<div class="czFTr21 brdrtop">

<?if ($my_black == 0) { ?>
  <a href="/info.php?id=<?=$ank['id'];?>&amp;ignor=add">დაიგნორება</a>
<? } else { ?>
  <a href="/info.php?id=<?=$ank['id'];?>&amp;ignor=del">იგნორის მოხსნა</a>
<? } ?>

</div>

<?
include_once 'footer.php';
exit;

}	

}

}





function if_closed($ank) {
	
global $user, $time, $pdo;

if ($user['id']!=$ank['id']) {

$my_black = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `user_ignor` WHERE `user` = ? AND `who` = ?",[$user['id'],$ank['id']]);

$friends = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends` WHERE `user` = ? AND `who` = ?",[$user['id'],$ank['id']]);


$friends_new = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends_requests` WHERE (`user` = ? AND `who` = ?) OR (`user` = ? AND `who` = ?)",[$user['id'],$ank['id'],$ank['id'],$user['id']]);


$friends_newbythem = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends_requests` WHERE `user` = ? AND `who` = ?",[$user['id'],$ank['id']]);



$qwe = new user($ank['id']);

if ($user['level']<=$ank['level'] && $ank['private']==2)
{	
?>	
	
<div class='czFTr21 bordrBottom'>
<?=$qwe->photo();?>
<?=$qwe->nick();?>
</div>

<div class='czFTr21'>
<span>No one can see this page</span>
</div>


<div class="czFTr21 brdrtop">


<? if ($my_black == 0) { ?>
	 <a href="/info.php?id=<?=$ank['id'];?>&amp;ignor=add">დაიგნორება</a>
<? } else { ?>
	 <a href="/info.php?id=<?=$ank['id'];?>&amp;ignor=del">იგნორის მოხსნა</a>
<?} ?>

</div>


<?
include_once 'footer.php';
exit;
}



if ($user['level']<=$ank['level'] && $ank['private']==1 && $friends == 0)
{
?>	
	
<div class='czFTr21 bordrBottom'>
<?=$qwe->photo();?>
<?=$qwe->nick();?>
</div>

<div class='czFTr21'>
Only friends can see this page
</div>

<div class="czFTr21 brdrtop">



<!-- -->

<? if ($friends_newbythem>0) { ?>
	<a href='/user/friends/create.php?accepting=<?=$ank['id'];?>'>Accept</a>
<? } else if ($friends_new>0) { ?>
	<a href='/user/friends/create.php?unrequest=<?=$ank['id'];?>'>Unrequest</a>
<? } else if ($friends>0) { ?>
	<a href='/user/friends/create.php?delete=<?=$ank['id'];?>'>Unfriend </a>
<? } else { ?>
	<a href='/user/friends/create.php?send=<?=$ank['id'];?>'>Befriend</a>
<? } ?>

<!-- -->


</div>

<div class="czFTr21 brdrtop">

<? if ($my_black == 0) { ?>
	 <a href="/info.php?id=<?=$ank['id'];?>&amp;ignor=add">დაიგნორება</a>
<? } else { ?>
	 <a href="/info.php?id=<?=$ank['id'];?>&amp;ignor=del">იგნორის მოხსნა</a>
<? } ?>

</div>

<?
include_once 'footer.php';
exit;
}


}

}



/* end of user functions */



function user_activity($user, $author, $when, $where, $type, $obj, string $text = "") {
	
	
global $time, $pdo;


$text = my_esc($text);


$pdo->query("INSERT INTO `user_activity` (`user`, `author`, `when`, `where`, `type`,`object_id`,`text`) VALUES(?, ?, ?, ?, ?, ?, ?)", [$user, $author, $when, $where, $type, $obj, $text]);


}



function admin_log(string $mod, string $act, string $desc) {
	
	
global $user, $time, $pdo;

//admin_log('Chorbiuro','დასუფთავება',"დაასუფთავა სასაუბრო");
//admin_log('Chorbiuro','წაშლა',"წაუშალა პოსტი $ank[nick]");

$mod = my_esc($mod);
$act = my_esc($act);
$desc = my_esc($desc);


$pdo->query("INSERT INTO `admin_activities` (`when`, `by_whom`, `kind`, `subcat`, `what`) VALUES(?,?, ?, ?, ?)", [$time,$user['id'], my_esc($mod), my_esc($act), my_esc($desc)]);



}


/*
function seo_friendly_url($string){
    $string = str_replace(array('[\', \']'), '', $string);
    $string = preg_replace('/\[.*\]/U', '', $string);
    $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
    $string = htmlentities($string, ENT_COMPAT, 'utf-8');
    $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
    $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
    return strtolower(trim($string, '-'));
}*/



function err(){

global $err;

if ($err)
echo "<div class='err'>$err</div>\n";

}

?>






<?php


class Pagination {
	
public $totalRecords;
public $page;
public $perPage;
public $currentPage;
	
public function __construct(){
	
	$this->currentPage();

}


public function calculation(string $totalRecords, string $dataPerPage) {
	
	
//if ($totalRecords>$set['p_str']) {
	
$pge1d231z = $this->currentPage ;

$pge12mx31 = ceil($totalRecords/$dataPerPage);

$pge2z1aa = $dataPerPage*$pge1d231z-$dataPerPage;

//}

	return $pge2z1aa;
}

public function currentPage(){
	
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
	$this->currentPage = filter($_GET['page']);
} else {
	$this->currentPage = 1;
}	
	
}

//address of a page
public function setPage(string $page, string $rest = '') {
	
	
		if (!empty($rest))
			$this->page = [$page,$rest];
		else 
			$this->page = $page;
}

//how many rows are there
public function setTotal(string $total){
	$this->totalRecords = $total;
}

//how many rows must be shown in one page
public function setPerPage(string $num){
	$this->perPage = $num;
}

public function render(){
	
$numPages = ceil($this->count / $this->perPage);	

$current = $this->currentPage();


}




public function rendering() {
	
//$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$currentPage = $this->currentPage;

$resultsPerPage = $this->perPage;

$startFrom = ($currentPage - 1) * $resultsPerPage;

$totalRecords = $this->totalRecords;

// ... (query execution and fetching data)

$totalPages = ceil($totalRecords / $resultsPerPage);

// Limit the number of displayed page links
$displayedPages = 5;


$halfDisplayed = floor($displayedPages / 2);
$startPage = max(1, $currentPage - $halfDisplayed);
$endPage = min($totalPages, $startPage + $displayedPages - 1);


//echo $totalPages

if ($totalPages !=0 && $totalPages<$currentPage) {
	redirection("/");	
}


if (!is_array($this->page)) {
	
	$pgadsp1 = $this->page;
	$pgadsp2 = '';	
	$pgwe3 = $pgadsp1.'?page=';
	
} else {
	
	$pgadsp1 = $this->page[0];
	$pgadsp2 = $this->page[1];		
	$pgwe3 = $pgadsp1.$pgadsp2.'&page=';
	
}

?>
	
	
    <div class="pp_22_p1">
        <?php if ($currentPage > 1): ?>
           <div> <a class="pgn_1" href="<?=$pgwe3;?><?php echo $currentPage - 1; ?>">Prev</a> </div>
        <?php endif; ?>

        <?php for ($i = $startPage; $i <= $endPage; $i++): ?>
             <div> <a class="pgn_1 <?=($currentPage == $i ? "active" : "");?>" href="<?=$pgwe3;?><?php echo $i; ?>"><?php echo $i; ?></a> </div>
        <?php endfor; ?>

        <?php if ($currentPage < $totalPages): ?>
            <div> <a class="pgn_1" href="<?=$pgwe3;?><?php echo $currentPage + 1; ?>">Next</a>  </div>
        <?php endif; ?>
    </div>	
	
	
<?
}




public function __destruct(){
	
}	


	
}


?>









<?


function Error($text, $url = "?"){
	$_SESSION['err'] = $text; 
	header("Location: $url"); 
	exit; 
}



function if_ajax(){
	
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	return true;  
} else {
	return false;
}

}




function aut()
{
global $user;	
global $set;	
global $browser;



if (isset($user)) {
	
/*	
if ($user['level']>1){
$spamus=mysql_result(mysql_query("SELECT COUNT(*) FROM `spamus`"),0);
if ($spamus > 0){echo "<div class='nav2'><center><a href='/user/admin/spam/index.php'><b><span style='color:red'>საჩივარი ($spamus) ადმინებო ნახეთ</span></b></a></center></div>";}
}
*/


}
 




if (isset($_SESSION['message'])) {
?>
  <div id="success_sts" class="uusr_qlppScss11">
     <?php echo $_SESSION['message'];?>
  </div>

<?
$_SESSION['message'] = NULL;
}

if (isset($_SESSION['err'])) {
?>
  <div id="mistake_sts" class="uusr_qlppScss11">
	<?php echo $_SESSION['err'];?>
  </div>

<?
$_SESSION['err'] = NULL;
}

?>

<? } ?>




<?


function size_file($filesize = 0)
{
	$filesize_ed = 'B';

	if ($filesize >= 1024)
	{
		$filesize = round($filesize / 1024 , 2);
		$filesize_ed = 'Kb';
	}

	elseif ($filesize >= 1024)
	{
		$filesize = round($filesize / 1024 , 2);
		$filesize_ed = 'Mb';
	}

	elseif ($filesize >= 1024)
	{
		$filesize = round($filesize / 1024 , 2);
		$filesize_ed = 'Gb';
	}

	elseif ($filesize >= 1024)
	{
		$filesize = round($filesize / 1024 , 2);
		$filesize_ed = 'Tb';
	}

	return $filesize . $filesize_ed;
}







function get_user($user) {

	global $pdo;		
	
	$qzcnt = filter($user);
	
	
	$usr = $pdo->fetchOne("SELECT * FROM `user` WHERE `id` = ?",[$qzcnt]);

	
	if (!$usr) {
		
		$ank = false;
		
	} else {
		
		$ank = $usr;
		
	}
	

	return  $ank;

}


function get_user_data(string $user) {
	
	global $pdo;	
	
	$qzcnt = filter($user);
	
	
	$usr = $pdo->fetchOne("SELECT * FROM `user` WHERE `id` = ?",[$qzcnt]);


	if (!$usr) {
		
		$ank = false;
		
	} else {
		
		$ank = new user($qzcnt);
		
	}
	

	return  $ank;
	
	
	

}




function user_status($level){ 
if($level==0){$statusi='';}
else if($level==1){$statusi='მოდერატორი';}
else if($level==2){$statusi='ადმინისტრატორი';}
else if($level==3){$statusi='სუპერ ადმინი';}
else if($level==4){$statusi='მენეჯერი';}
else if($level==5){$statusi='მფლობელი';}
else if($level==6){$statusi='მფლობელი';}
return $statusi;  
}	




class user {

public $user;
public $id;


public function __construct($id){
	$this->getData($id);
	$this->id = $id;
}

public function getData($id){

global $pdo;	
	
	$this->user = $pdo->fetchOne("SELECT * FROM `user` WHERE `id` = ?",[$id]);
	
}


public function user_status() { 
	

$level = $this->user['level'];	
	
if ($level==0)$status='';
else if($level==1)$status='მოდერატორი';
else if($level==2)$status='ადმინისტრატორი';
else if($level==3)$status='სუპერ ადმინი';
else if($level==4)$status='მენეჯერი';
else if($level==5)$status='მფლობელი';
else if($level==6)$status='მფლობელი';

return $status;  

}


public function online_status() { 
	

global $time;	
	

//$level = $this->user['date_last'];	
	

if ($this->user['date_last']>$time-60*10)return true;


return false;  

}


public function nickWithColor($color) {
	return '
	<a href="/info.php?id='.$this->user['id'].'">
		<span style="color:'.$color.'">'.detect($this->user['nick']).'</span>
	</a>'; 
}


public function nick() {
	return '
	<a href="/info.php?id='.$this->user['id'].'">
		<span class="nickCOlorQzk1zq">'.detect($this->user['nick']).'</span>
	</a>'; 
}

public function NickForText() {
	return '
	<a href="/info.php?id='.$this->user['id'].'">
		<span class="pgmsg_31z13">'.detect($this->user['nick']).'</span>
	</a>'; 
}








public function gender() {
	
if ($this->user['gender'] == 'male')return 'ბიჭი';
else if ($this->user['gender'] == 'female')return'გოგო';
else if ($this->user['gender'] == 'none')return'უცნობია';
else return '';

}

public function age($engl = " ") {
	

if ($engl == " ")$dt = "  წლის.";
else $dt = "  years old";
	
$dateOfBirth = "".$this->user['birth_day']."-".$this->user['birth_month']."-".$this->user['birth_year']."";
 
// Create a datetime object using date of birth
$dob = new DateTime($dateOfBirth);
 
// Get current date
$now = new DateTime();
 
// Calculate the time difference between the two dates
$diff = $now->diff($dob);
 
// Get the age in years, months and days
return "".$diff->y." $dt";
 
// Get the age in years, months and days
//echo "Your current age is ".$diff->y." years ".$diff->m." months ".$diff->d." days.";	
	
}	
	


public function existzs() {
	if (!is_scalar($this->user)) {
		header("Location: /foto");
		exit;
	}
}




public function PhotoFoRMayKnow($size) {
	
global $pdo;	
	
$avatar = $pdo->fetchOne("SELECT id,id_gallery,photo_addr FROM `gallery_foto` WHERE `id_user` = ? AND `avatar` = '1'", [$this->id]);	
	

$zz = "style='border-radius: 5px 5px 0 0px;'";

	//width='$wh' height='$hg'
	
if ($avatar>0) {
	
	return "<img $zz src='/images/gallery/$size/$avatar[photo_addr].jpg' class='Photo_GallWd'>";
	
} else {
	
	
if ($this->user['gender']=='female')
	return " <img $zz src='/style/icons/user_ank/us_woman.png' class='Photo_GallWd'>";
else if ($this->user['gender']=='male')
	return " <img $zz src='/style/icons/user_ank/us_man.png' class='Photo_GallWd'>";
else if ($this->user['gender']=='none')
	return " <img $zz src='/img/unknow.png' class='Photo_GallWd'>";
else 
	return "<img $zz src='/img/143086968_2856368904622192_1959732218791162458_n.png' class='Photo_GallWd'>";
	
}	
	
	
}



public function photoRounded($size, $wh = 48, $hg = 48, $rn = '20') {
	
global $pdo;	
	
$avatar = $pdo->fetchOne("SELECT id,id_gallery,photo_addr FROM `gallery_foto` WHERE `id_user` = ? AND `avatar` = '1'", [$this->id]);	
	

$zz = "style='border-radius:".$rn."px;'";

	
if ($avatar>0) {
	return "<img $zz src='/images/gallery/$size/$avatar[photo_addr].jpg'  width='$wh' height='$hg'>";
} else {
	
	
if ($this->user['gender']=='female')
	return " <img $zz src='/style/icons/user_ank/us_woman.png' width='$wh' height='$hg'>";
else if ($this->user['gender']=='male')
	return " <img $zz src='/style/icons/user_ank/us_man.png' width='$wh' height='$hg'>";
else if ($this->user['gender']=='none')
	return " <img $zz src='/img/unknow.png' width='$wh' height='$hg'>";
else 
	return "<img $zz src='/img/143086968_2856368904622192_1959732218791162458_n.png' width='$wh' height='$hg'>";
}	
	
	
}

///



public function photoRounded22() {
	
	
global $pdo;	
	
$avatar = $pdo->fetchOne("SELECT id,id_gallery,photo_addr FROM `gallery_foto` WHERE `id_user` = ? AND `avatar` = '1'", [$this->id]);	
	


	
if ($avatar>0) {
	
return "
	<div class='ActiveRoundedPhotos' 
	style='
	background-image: url(\"/images/gallery/128/$avatar[photo_addr].jpg\");'>
	
			<div class='ActiveRoundedPhotos2'></div>
	
	</div>";
	
} else {
	
	
if ($this->user['gender']=='female')$genlnk = '/style/icons/user_ank/us_woman.png';
else if ($this->user['gender']=='male')$genlnk = '/style/icons/user_ank/us_man.png';
else if ($this->user['gender']=='none')$genlnk = '/img/unknow.png';
else $genlnk = '/img/143086968_2856368904622192_1959732218791162458_n.png';

	
return "
	<div class='ActiveRoundedPhotos' 
	style='
	background-image: url(\"$genlnk\");'>	
		<div class='ActiveRoundedPhotos2'></div>
	</div>";
	
	
}	
	
	
}


/////



public function photo3($size, $wh = 48, $hg = 48) {
	
	
global $pdo;	
	
$avatar = $pdo->fetchOne("SELECT id,id_gallery,photo_addr FROM `gallery_foto` WHERE `id_user` = ? AND `avatar` = '1'", [$this->id]);	
	

$zz = 'style="border-radius:10px;"';

	
if ($avatar>0) {
return "<img $zz src='/images/gallery/$size/$avatar[photo_addr].jpg'  width='$wh' height='$hg'>";
} else {
	
	
if ($this->user['gender']=='female')return " <img $zz src='/style/icons/user_ank/us_woman.png' width='$wh' height='$hg'>";
else if ($this->user['gender']=='male')return " <img $zz src='/style/icons/user_ank/us_man.png' width='$wh' height='$hg'>";
else if ($this->user['gender']=='none')return " <img $zz src='/img/unknow.png' width='$wh' height='$hg'>";
else return "<img $zz src='/img/143086968_2856368904622192_1959732218791162458_n.png' width='$wh' height='$hg'>";
}	
	
	
}


public function pnick($size) {
	
	

	
	
		return '
	<a href="/info.php?id='.$this->user['id'].'"><div> 
	'.$this->photo3($size,24,24).'
	
		<span style="color:#000 !important;font-weight:bold;vertical-align:middle;">
		'.detect($this->user['nick']).'
		
		</span>
	
	
	
	</div></a>'; 
	
}


public function nickWithphotoandlink($size) {
	
	
	
return '
	<a href="/info.php?id='.$this->user['id'].'">
		<div> 
		'.$this->photo50($size,48,48).'
		</div>
	</a>'; 
	
}


public function PhotoForProfile() {
	
	
	
return '	
		
			'.$this->photo50(128,100,100, '10%').'	
		
	
					<div class="uus_tplqweq1_1">'.$this->nick().'</div>
	'; 
	
}



public function UserFullname() {
	
	return ''.detect($this->user['ank_name']).' '.detect($this->user['gvari']).''; 
	
}





public function NickWithLinkForUser() {
	
	

	
	
return '
	<a href="/info.php?id='.$this->user['id'].'"><div> 
		<span style="color:#000 !important;font-weight:bold;vertical-align:middle;">
		'.detect($this->user['nick']).'
		</span>
	
	
	
	</div></a>'; 
	
}



public function PhotoForUserZs() {
	
	
global $pdo;	
	
$avatar = $pdo->fetchOne("SELECT id,id_gallery,photo_addr FROM `gallery_foto` WHERE `id_user` = ? AND `avatar` = '1'", [$this->id]);	
	
	
$pdaddr = "";	
	
	
if ($avatar>0) {
	
	$pdaddr = "/images/gallery/640/".$avatar['photo_addr'].".jpg";	

} else {

	if ($this->user['gender']=='female')$pdaddr = "/components/images/avatars/img_avatar2.png";	
	else if ($this->user['gender']=='male')$pdaddr = "/components/images/avatars/avatar6.png";	
	else if ($this->user['gender']=='none')return "/components/images/avatars/avatar6.png";
	else return "/components/images/avatars/avatar6.png";

}	
	
	return " <img src='$pdaddr' class='usr_Phoqz_frz_al1' />   ";
}



public function PhotoForUsers() {
	
	
global $pdo;	
	
$avatar = $pdo->fetchOne("SELECT id,id_gallery,photo_addr FROM `gallery_foto` WHERE `id_user` = ? AND `avatar` = '1'", [$this->id]);	
	
	

$zz = 'style="border-radius:5px;width:120px;height:90px;"';

	
if ($avatar>0) {
	
	return "<div class='PuserAvas_Rest' style='background:url(\"/images/gallery/128/".$avatar['photo_addr'].".jpg\");'></div>";

} else {
	
	
	if ($this->user['gender']=='female')return " <div class='PuserAvas_WoMen'></div>";
	else if ($this->user['gender']=='male')return " <div class='PuserAvas_Men'></div>";
	else if ($this->user['gender']=='none')return " <div class='PuserAvas_Men'></div>";
	else return " <div class='PuserAvas_Men'></div>";

}	
	
	
}








public function photo50($size, $wh = 48, $hg = 48, $pz = '50%') {
	
	
global $pdo;	
	
$avatar = $pdo->fetchOne("SELECT id,id_gallery,photo_addr FROM `gallery_foto` WHERE `id_user` = ? AND `avatar` = '1'", [$this->id]);	
	
	

$zz = 'style="border-radius:'.$pz.';"';

	
if ($avatar>0) {
return "<img $zz src='/images/gallery/$size/$avatar[photo_addr].jpg'  width='$wh' height='$hg'>";
} else {
	
	
if ($this->user['gender']=='female')return " <img $zz src='/style/icons/user_ank/us_woman.png' width='$wh' height='$hg'>";
else if ($this->user['gender']=='male')return " <img $zz src='/style/icons/user_ank/us_man.png' width='$wh' height='$hg'>";
else if ($this->user['gender']=='none')return " <img $zz src='/img/unknow.png' width='$wh' height='$hg'>";
else return "<img $zz src='/img/143086968_2856368904622192_1959732218791162458_n.png' width='$wh' height='$hg'>";
}	
	
	
}


public function photo2($size, $wh = 48, $hg = 48, $brd = '40px') {
	
	
global $pdo;	
	
$avatar = $pdo->fetchOne("SELECT id,id_gallery,photo_addr FROM `gallery_foto` WHERE `id_user` = ? AND `avatar` = '1'", [$this->id]);	
	
	

$zz = 'style="border-radius:'.$brd.';"';

	
if ($avatar>0) {
return "<img $zz class='kPhoBrWhtCir' src='/images/gallery/$size/$avatar[photo_addr].jpg'  width='$wh' height='$hg'>";
} else {
	
	
if ($this->user['gender']=='female')return " <img $zz src='/style/icons/user_ank/us_woman.png' width='$wh' height='$hg'>";
else if ($this->user['gender']=='male')return " <img $zz src='/style/icons/user_ank/us_man.png' width='$wh' height='$hg'>";
else if ($this->user['gender']=='none')return " <img $zz src='/img/unknow.png' width='$wh' height='$hg'>";
else return "<img $zz src='/img/143086968_2856368904622192_1959732218791162458_n.png' width='$wh' height='$hg'>";
}	
	
	
}



public function photo($size = 48) {
	
	
global $pdo;	
	
$avatar = $pdo->fetchOne("SELECT id,id_gallery,photo_addr FROM `gallery_foto` WHERE `id_user` = ? AND `avatar` = '1'", [$this->id]);	
	
	
$wh = 48;
$hg = 48;	
$zz = 'style="border-radius:40px;"';

	
if ($avatar>0) {
return "<img $zz src='/images/gallery/$size/$avatar[photo_addr].jpg'  width='$wh' height='$hg'>";
} else {
	
	
if ($this->user['gender']=='female')return " <img $zz src='/style/icons/user_ank/us_woman.png' width='$wh' height='$hg'>";
else if ($this->user['gender']=='male')return " <img $zz src='/style/icons/user_ank/us_man.png' width='$wh' height='$hg'>";
else if ($this->user['gender']=='none')return " <img $zz src='/img/unknow.png' width='$wh' height='$hg'>";
else return "<img $zz src='/img/143086968_2856368904622192_1959732218791162458_n.png' width='$wh' height='$hg'>";
}	
	
	
}


public function __invoke() {
	
}	

public function __get($zz){
	return $this->user[$zz];
}


public function  Profile_Closed(){
	return 0;
}

public function  Profile_for_friends(){
	return 0;
}

public function  isIgnored(){
	return 0;
}

public function ifignored(){
	
}

public function  isBlocked(){
	return 0;
}


   public function findIpAddress(): string
    {
        if (isset($_SERVER['HTTP_X_REAL_IP']) && preg_match("/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/", $_SERVER['HTTP_X_REAL_IP'])) {
            $ip = $_SERVER['HTTP_X_REAL_IP'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && preg_match("/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/", $_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (isset($_SERVER['HTTP_CLIENT_IP']) && preg_match("/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/", $_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } else {
            $ip = preg_replace("/[^0-9.]/", "", $_SERVER['REMOTE_ADDR']);
        }
        return htmlspecialchars(stripslashes($ip));
    }

    /**
     * Check if user is online
     *
     * @param string $login
     * @return string
     */
    public function userOnline(string $login): string
    {
        //$xuser = $this->getIdFromNick($login);
       // $statwho = '<font color="#CCCCCC">[Off]</font>';

      //  $result = $this->db->countRow('online', "user='{$xuser}'");

      //  if ($result > 0 && $xuser > 0) $statwho = '<font color="#00FF00">[On]</font>';

       // return $statwho;
       return "for this time lets not show this function nowhere ";
    }


public function userBrowser(): string  {
       // $detectBrowser = new BrowserDetection();
      //  $userBrowser = rtrim($detectBrowser->detect()->getBrowser() . ' ' . $detectBrowser->getVersion());

      //  $userBrowser = !empty($userBrowser) ? $userBrowser : 'Browser not detected';

       // return $userBrowser;
       return "ss";
}
	
	
}




?>




<?


function makeUrltoLink(string $text) {


//$text = htmlentities($text, ENT_QUOTES, 'UTF-8'); 
//$text = nl2br($str);

$q21 = "#ht(tp|tps)((://www\.)|(://))(\w+)\.(\w+)#i";

$qq2 = preg_replace($q21, '<a href="$0">$0</a>', $text);

 return $qq2;
}
 
 





function BBcode($msg) {

$bbcode = array(
'/\[red\](.+)\[\/red\]/isU' => '<span style="color:#ff0000;">$1</span>',
'/\[b\](.+)\[\/b\]/isU' => '<b>$1</b>',
'/\[yellow\](.+)\[\/yellow\]/isU' => '<span style="color:#ffff22;">$1</span>',
'/\[green\](.+)\[\/green\]/isU' => '<span style="color:#00bb00;">$1</span>',
'/\[blue\](.+)\[\/blue\]/isU' => '<span style="color:#0000bb;">$1</span>',
'/\[brown\](.+)\[\/brown\]/isU' => '<span style="color:brown;">$1</span>',
'/\[white\](.+)\[\/white\]/isU' => '<span style="color:#ffffff;">$1</span>',
'/\[black\](.+)\[\/black\]/isU' => '<span style="color:black;">$1</span>',
'/\[orange\](.+)\[\/orange\]/isU' => '<span style="color:orange;">$1</span>',
'/\[pink\](.+)\[\/pink\]/isU' => '<span style="color:pink;">$1</span>',
'/\[violet\](.+)\[\/violet\]/isU' => '<span style="color:violet;">$1</span>',
'/\[gray\](.+)\[\/gray\]/isU' => '<span style="color:gray;">$1</span>',
'/\[c\](.+)\[\/c\]/isU' => '<center>$1</center>'
);

//$msg = preg_replace('/\[br\]/isU', '<br>', $msg);	
$msg = preg_replace('/\[url=(.*?)\](.+)\[\/url\]/isU', "<a href='$1'>$2</a>", $msg);
$msg = preg_replace('/\[color=([\#0-9a-zA-Z]+)\](.+)\[\/color\]/isU', '<span style="color:$1;">$2</span>', $msg);
$msg = preg_replace('/\[img\](.+)\[\/img\]/isU', '<img style="max-width:40%" src="$1">', $msg);

$msg = preg_replace('~(^|\s)(htt(p|ps)://(.*?))(\s|$)~ui', "<a href='$2'>$2</a>", $msg);

$msg = preg_replace(array_keys($bbcode), array_values($bbcode), $msg);


return $msg;
}



function rplcBr(string $text): string {

//$qq = str_replace("<br>","\n", $text);

return $text;

}


function smiles(string $msg) {

/*
$q = mysql_query("SELECT `id`, `smile` FROM `smile`");

while ($post = mysql_fetch_array($q)) {
	
$post['smile'] = htmlentities($post['smile'], ENT_QUOTES, 'UTF-8');

$msg=str_replace((string)$post['smile'], '<img src="/style/smiles/'.$post['id'].'.gif" style="max-width: 100px;">', $msg);
	
}*/


return $msg;
}








function rplc($text){

$string = $text;
$patterns = '/(.php|.phar|.phps|.pht|.html|.xhtml|.wml|.css|.phtml|.sql|.js)/i';
$replacements = '';
return preg_replace($patterns, $replacements, $string);	
	
}




function nums($a) {

	return abs((int)$a);

}



function filter(string $stuff, string $type = 'num') {

if ($type == 'num')
	return abs((int)$stuff);
else 
	return mysql_real_escape_string($stuff);
	
}


/*
function redirection(string $text, string $link = '') {
$_SESSION['message'] = $text;
header("Location: $link");
exit;
}*/
	


function redirection(string $link) {
	header("location: $link");
	exit;
}


function replaceEscapeString(string $text)
{

$text = str_replace(["\x5C","\x5c"], ['∖','∖'], $text);

//$text = str_replace('\\', '&#92;', $text);

$text = stripslashes($text);

return $text;   

//return htmlentities($text, ENT_QUOTES, 'utf-8');

}




function mysql_real_escape_string(string $text): string {
	$k1 = replaceEscapeString($text);
	//return remove_chars($k1);
	return $k1;
}


function my_esc(string $str): string {
	$k1 = replaceEscapeString($str);
	//return remove_chars($k1);
	return $k1;
}



function remove_chars(string $string) : string {

  $new_string = "";
  for ($i = 0; $i < strlen($string); $i++) {
    $char = ord($string[$i]);
 
  /* || $char == 13 */
  
  if ($char == 10) {
	  $new_string .= "<br>";  
	  continue;
  }
    
    
    if ($char > 31) {
		$new_string .= $string[$i];
    } else {
		$new_string .= "".(int)$char."";
	}
	
	
	
  }
  return $new_string;
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


function esc($text,$br=NULL){ 

if ($br!=NULL)

for ($i=0;$i<=31;$i++)$text=str_replace(chr($i), NULL, $text);

else{

for ($i=0;$i<10;$i++)$text=str_replace(chr($i), NULL, $text);

for ($i=11;$i<20;$i++)$text=str_replace(chr($i), NULL, $text);

for ($i=21;$i<=31;$i++)$text=str_replace(chr($i), NULL, $text);}

return $text;
}











function msg($msg) {
	echo "<div class='msg'>$msg</div>\n";
} 




function output_text(string $str) {

$str = htmlspecialchars($str);

//$str = str_replace('<br>', '', $str);
//$str = rplcBr($str); 
$str = nl2br($str); 
//$str = htmlentities($str, ENT_QUOTES, 'UTF-8'); 
//$str = makeUrltoLink($str); 
//$str = bbcode($str); 


$str = stripslashes($str);

return $str;

    
}



function textForAlarm(string $str) {

$str = htmlentities($str, ENT_QUOTES, 'UTF-8'); 
//$str = makeUrltoLink($str); 
//$str = smiles($str); 
$str = bbcode($str); 
$str = nl2br($str); 
$str = stripslashes($str);

return $str;

    
}


function text(string $str) {

$str = htmlentities($str, ENT_QUOTES, 'UTF-8'); 
//$str = makeUrltoLink($str); 
//$str = smiles($str); 
//$str = bbcode($str); 
$str = nl2br($str); 
$str = stripslashes($str);

return $str;

    
}




function walltext(string $msg){
	

	return br(smiles($msg));
	
}




function detect(string $str) {

$str = htmlentities($str, ENT_QUOTES, 'UTF-8'); 
$str = nl2br($str); 
$str = stripslashes($str);

return $str;


}




function Escaped(string $str) {

$str = htmlentities($str, ENT_QUOTES, 'UTF-8'); 
//$str=makeUrltoLink($str); 
//$str = smiles($str); 
//$str = bbcode($str); 
$str = nl2br($str); 
$str = stripslashes($str);

return $str;

    
}


function Unescaped(string $str) {

$str = htmlentities($str, ENT_QUOTES, 'UTF-8'); 
$str = nl2br($str); 
$str = stripslashes($str);

return $str;


}



function when_editing(string $text)
{

//$qkl = str_replace(['"','\'', '\\', '`','>','<','/'],['&#34;','&#39;', '&#92;', '&#96;','&gt;','&lt;','&#47;'],$text);

$text = stripslashes($text);


//return $text;


return htmlentities($text, ENT_QUOTES, 'utf-8');


}





function strlen2($msg) {

		 $msg = trim($msg);

         if (function_exists('mb_strlen')) return mb_strlen($msg, 'utf-8');
         if (function_exists('iconv_strlen')) return iconv_strlen($msg, 'utf-8');
         if (function_exists('utf8_decode')) return strlen(utf8_decode($msg));
         return strlen($msg);
         
}



function text_size($msg) {

		 $msg = trim($msg);

         if (function_exists('mb_strlen')) return mb_strlen($msg, 'utf-8');
         if (function_exists('iconv_strlen')) return iconv_strlen($msg, 'utf-8');
         if (function_exists('utf8_decode')) return strlen(utf8_decode($msg));
         return strlen($msg);
         
}


function utf_strlen($msg) {

		 $msg = trim($msg);

         if (function_exists('mb_strlen')) return mb_strlen($msg, 'utf-8');
         if (function_exists('iconv_strlen')) return iconv_strlen($msg, 'utf-8');
         if (function_exists('utf8_decode')) return strlen(utf8_decode($msg));
         return strlen($msg);
    
} 


function utf_substr($text, $min, $max) {

		$text = trim($text);

        if (function_exists('mb_substr')) return mb_substr($text, $min, $max, 'utf-8');
        else if (function_exists('mb_strcut')) return mb_strcut($text, $min, $max, 'utf-8');
        else if (function_exists('iconv_substr')) return iconv_substr($text, $min, $max, 'utf-8');
        else return substr($text, $min, $max);
    
} 





//even georgian words can be split by using this function 
function Split_String_utf8($str, $qz = 0) {
	if ($qz == 0)return preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);
	else return mb_str_split($str);
}




function user_able($level, $post = null) {

global $user, $pdo;	



if ($post!=null) {
	
if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `user_level` WHERE `access_type` = ? AND `user_id` = ?", [$level, $user['id']])>0) {
	return true;
} else {
	return false;
}
	
	
} else {
	

if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `user_level` WHERE `access_type` = ? AND `user_id` = ?", [$level, $user['id']])>0) {
	
		$qqf = $pdo->fetchOne("select * from ".my_esc($level)." where `id` = ?",[$post]);
		
		$ank = get_user($qqf['id_user']);
	
		if ($ank['level']>0) {
			return false;
		}  else if ($ank['level'] == 0) {
			return true;
		}  else {
			return false;
		} 
	
}
	 
	return false;
	
	
}


	
}


function passgen($k_simb = 8, $types = 3) 
{
	$password = null;	
	$small = 'abcdefghijklmnopqrstuvwxyz';	
	$large = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';	
	$numbers = '1234567890';	
	
	mt_srand((double)microtime()*1000000);	 
	
	for ($i = 0; $i < $k_simb; $i++) 
	{		
		$type = mt_rand(1,min($types,3));	
			
		switch ($type) 
		{		
			case 3:		
			$password .= $large[mt_rand(0,25)];			
			break;			
			case 2:			
			$password .= $small[mt_rand(0,25)];			
			break;			
			case 1:			
			$password .= $numbers[mt_rand(0,9)];			
			break;		
		}	
	}	

	return $password;
}

$passgen = @passgen();














function wu_smile($msg){
	$text = preg_replace('/:smile_([1-9]|[1-6][0-9]|7[0-1]):/', '<i class="wu-smile wu-$1"></i>', $msg);
	return $text;
}



function wudateago($date)
{
$stf = 0;
$cur_time = time();
$diff = $cur_time - $date;
$seconds = 'წმ';
$minutes = 'წთ';
$hours = 'სთ';
$days = 'დღე';
$weeks = 'კვირა';
$months = 'თვე';
$years = 'წელი';
$decades = 'ათწლეულის';

$phrase = array($seconds, $minutes, $hours, $days, $weeks, $months, $years, $decades );
$length = array(1, 60, 3600, 86400, 604800, 2630880, 31570560, 315705600);

$value = '';

return $value.' უკან';
}



function wudate($time=0) {
	
$param = 'j M Y  H:i';
$param2 = ' H:i';

$nowt = time();
$minused = $nowt - $time;

if (intval($time) == 0) { $time=time(); }


$MN = array("იან", "თებ", "მარ", "აპრ", "მაი", "ივნ", "ივლ", "აგვ", "სექ", "ოქტ", "ნოე", "დეკ");


$MN=array("კვი", "ორშ", "სამ", "ოთხ", "ხუთ", "პარ", "შაბ");

if ($minused < 5) { return ' now'; }
if ($minused < 60) { return $minused.' წმ უკან'; }
else if ($minused < 3600) { return round($minused/60).' min ago'; }
else if ($minused < 86400) { return round($minused/3600).' hr ago'; }
else if ($minused < 172800) { return 'yesterday at '.date("H:i", $time); }
else if ($minused < 172800*2) { return '2 days ago '.date("H:i", $time); }
else { 
	return date("d M Y H:i", $time); 
}

}







function times($time) {


/*
if(!$time) $time = time();

$data = date('j.n.y', $time);

if($data == date('j.n.y')) $times = ''.date('H:i', $time);
else if($data == date('j.n.y', time() - 86400)) $times = 'გუშინ '.date('H:i', $time);
else if($data == date('j.n.y', time() - 172800)) $times = 'გუშინწინ '.date('H:i', $time);

else {
$m = array('0',' იან',' თებ',' მარ',' აპრ',' მაი',' ივნ',' ივლ',' აგვ',' სექ',' ოქტ',' ნოე',' დეკ');

$times = date('j' .$m[date('n', $time)].' Y H:i', $time);

$times = str_replace(date('Y'), '', $times);

}

return $times;
*/



$param = 'j M Y  H:i';
$param2 = ' H:i';

$nowt = time();
$minused = $nowt - $time;

if (intval($time) == 0) { $time=time(); }


$MN = array("იან", "თებ", "მარ", "აპრ", "მაი", "ივნ", "ივლ", "აგვ", "სექ", "ოქტ", "ნოე", "დეკ");


$MN=array("კვი", "ორშ", "სამ", "ოთხ", "ხუთ", "პარ", "შაბ");

if ($minused < 5) { return ' now'; }
if ($minused < 60) { return $minused.' sec ago'; }
else if ($minused < 3600) { return round($minused/60).' min ago'; }
else if ($minused < 86400) { return round($minused/3600).' hr ago'; }
else if ($minused < 172800) { return 'yesterday  at '.date("H:i", $time); }
else { 
	return date("d M Y H:i:s", $time); 
}


}


function Old_Time($time) {

/*
if (date("d") == date("d", $time)) {
	return "".date("H:i", $time)."";
} else if (date("d") - 1 == date("d", $time)) {
	return "გუშინ ".date("H:i", $time)."";
} else {
	return " ".date("d M Y", $time)."";
}*/



$param = 'j M Y  H:i';
$param2 = ' H:i';

$nowt = time();
$minused = $nowt - $time;

if (intval($time) == 0) { $time=time(); }


$MN = array("იან", "თებ", "მარ", "აპრ", "მაი", "ივნ", "ივლ", "აგვ", "სექ", "ოქტ", "ნოე", "დეკ");


$MN=array("კვი", "ორშ", "სამ", "ოთხ", "ხუთ", "პარ", "შაბ");

if ($minused < 5) { return ' now'; }
if ($minused < 60) { return $minused.' sec ago'; }
else if ($minused < 3600) { return round($minused/60).' min ago'; }
else if ($minused < 86400) { return round($minused/3600).' hr ago'; }
else if ($minused < 172800) { return 'yesterday  at '.date("H:i", $time); }
else { 
	return date("d M Y H:i:s", $time); 
}

}





function tmdt($time){
	//return date("d M y, H:i:s",$tm);
	//return date("H:i:s",$tm);
	
	

$param = 'j M Y  H:i';
$param2 = ' H:i';

$nowt = time();
$minused = $nowt - $time;

if (intval($time) == 0) { $time=time(); }


$MN = array("იან", "თებ", "მარ", "აპრ", "მაი", "ივნ", "ივლ", "აგვ", "სექ", "ოქტ", "ნოე", "დეკ");


$MN=array("კვი", "ორშ", "სამ", "ოთხ", "ხუთ", "პარ", "შაბ");

if ($minused < 5) { return ' now'; }
if ($minused < 60) { return $minused.' sec ago'; }
else if ($minused < 3600) { return round($minused/60).' min ago'; }
else if ($minused < 86400) { return round($minused/3600).' hr ago'; }
else if ($minused < 172800) { return 'yesterday  at '.date("H:i", $time); }
else { 
	return date("d M Y H:i", $time); 
}	
	
	
	
}




function when($time=0) {
	
$param = 'j M Y  H:i';
$param2 = ' H:i';

$nowt = time();
$minused = $nowt - $time;

if (abs((int)$time) == 0) { $time=time(); }


$MN = array("იან", "თებ", "მარ", "აპრ", "მაი", "ივნ", "ივლ", "აგვ", "სექ", "ოქტ", "ნოე", "დეკ");


$MN=array("კვი", "ორშ", "სამ", "ოთხ", "ხუთ", "პარ", "შაბ");

if ($minused < 5) { return ' now'; }
if ($minused < 60) { return $minused.' sec ago'; }
else if ($minused < 3600) { return round($minused/60).' min ago'; }
else if ($minused < 86400) { return round($minused/3600).' hr ago'; }
else if ($minused < 172800) { return 'yesterday  at '.date("H:i", $time); }
else if ($minused < 172800*2) { return '2 days ago '.date("H:i", $time); }
else { 
	return date("d M Y H:i", $time); 
}

}





function whenTm($time=0) {
	
$param = 'j M Y  H:i';
$param2 = ' H:i';

$nowt = time();
$minused = $nowt - $time;

if (abs((int)$time) == 0) { $time=time(); }


$MN = array("იან", "თებ", "მარ", "აპრ", "მაი", "ივნ", "ივლ", "აგვ", "სექ", "ოქტ", "ნოე", "დეკ");


$MN=array("კვი", "ორშ", "სამ", "ოთხ", "ხუთ", "პარ", "შაბ");

if ($minused < 5) { return ' now'; }
if ($minused < 60) { return $minused.' sec ago'; }
else if ($minused < 3600) { return round($minused/60).' min ago'; }
else if ($minused < 86400) { return round($minused/3600).' hr ago'; }
else if ($minused < 172800) { return 'yesterday  at '.date("H:i", $time); }
else if ($minused < 172800*2) { return '2 days ago '.date("H:i", $time); }
else { 
	return date("d M, Y", $time); 
}

}




?>



<?


///////




///////



  
function title()
{
	
global $set, $user, $browser, $usojbid, $pdo;

$set['online'] = 11000;
$time = time();

if (!isset($user) && $browser=='web'){$set['version']=$set['version2'];}
if (isset($user) && $browser=='web'){$user['version']=$user['version2'];}

if (isset($user) && $user['version']=='wap' || !isset($user) && $set['version']=='wap') {
	
if (isset($user)) {


$k_frend = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends_requests` WHERE `user` = ?",[$user['id']]); 	
$k_notif = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `user_activity` WHERE `user` = ? AND `read` = '0'",[$user['id']]); 			 

$sms = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `messages` WHERE `whom` = ? AND `read` = '0'",[$user['id']]);

$pgeurl1 = $_SERVER['REQUEST_URI'];
?>


<div class="knhdnmn2">


<div><a href="/" class="mnlnkstl"><img src="/images/logo.svg" alt="logo"></a></div>


<div><a href="/profile.php?id=<?=$usojbid->id;?>"><?=$usojbid->photoRounded(48,48,48,50);?></a></div>

</div>



<div class="qNavSMQW2">

<div class="headNavSmeu">


<div>
	<div class="mob_hhdkl123l1q1 pointer" onclick="window.location='/'">	
		<span class="mnn2_zzlf_31_zl13"></span>
	</div>
</div>
	
	
<div>
	<div class="mob_hhdkl123l1q1 pointer" onclick="window.location='/user/alarms/'">	
		
	<?if ($k_notif):?>
		<div class="relative">
			<div class="kkz_qll11_redbck1"></div>
		</div>		
	<? endif;?>	
		
		
		<span class="mnn2_zzlf_31_zl12"></span>
	</div>
</div>





	<div>
	<div class="mob_hhdkl123l1q1 pointer" onclick="window.location='/mail/'">	
		
	<?if ($sms):?>
		<div class="relative">
			<div class="kkz_qll11_redbck1"></div>
		</div>		
	<? endif;?>		
		
			<span class="mnn2_zzlf_31_zl14"></span>	
		</div>	
	</div>
		
	
	

<div>

	<div class="mob_hhdkl123l1q1 pointer" onclick="window.location='/user/friends/?id=<?=$user['id'];?>'">	
	
	<?if ($k_frend):?>
		<div class="relative">
			<div class="kkz_qll11_redbck1"></div>
		</div>		
	<? endif;?>
	
		<span class="mnn2_zzlf_31_zl15"></span>
	</div>

</div>
	
	
	
	
	
	<div>
			
	<div class="mob_hhdkl123l1q1 pointer" onclick="window.location='/page/'">	
			<span class="mnn2_zzlf_31_zl1"></span>
		</div>

	</div>	
	
	
	
	
	
	
	
	
	
</div>

<!-- <div><div style="text-align:center;"><i class="fa fa-map"></i></div></div> -->

</div>










<?


}

if (!isset($user))
{



 

?>


<div class="HDrTTTL2z_fq123z">
	<a href="/">faceebook.com</a>
</div>

<?

 

}



}

if (isset($user) && $user['version']=='web' || !isset($user) && $set['version']=='web') {



if (!isset($user)) { 


?>

<div class="HDrTTTL2z_fq123z">
	<a href="/">faceebook.com</a>
</div>









<?

 } else { 

$k_frend = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends_requests` WHERE `user` = ?",[$user['id']]);		
	 
$k_notif = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `user_activity` WHERE `user` = ? AND `read` = '0'",[$user['id']]);		 

$sms = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `messages` WHERE `whom` = ? AND `read` = '0'",[$user['id']]);

$avatariq = $pdo->fetchOne("SELECT * FROM `gallery_foto` WHERE `id_user` = ? AND `avatar` = '1'",[$user['id']]);



if ($avatariq>0)  {
	
	$ffoto = '<img class="hgh" src="/images/gallery/48/'.$avatariq['photo_addr'].'.jpg">';

} else {
	
	$ffoto = '<img class="hgh" src="/img/info/avatar.gif">';

}

	

?>




	<div class="pHntNV12_3">
	
	
	<div class="col-3">
		
		<div class="leftRegionWeb">
			
			<div class="leftRegWeb1"><a href="/" class="mnlnkstl"><img src="/images/logo.svg" alt="logo"></a></div>
			
			<div class="leftregb100w">
				
				<div class="leftregb100w">
					<form><input class="ppng1_3213" type="buha" placeholder="Search for the things" maxlength="128"></form>
				</div>
	
	
	</div>
		</div>
		
		 
		 
	</div>
	
	
	<div class="col-6">
	
		<div class="MiddleRegionWeb">
			<div onclick="rRRedRction('/')"><span class="MatiCons">home</span></div>
			<div onclick="rRRedRction('/user/alarms/')"><span class="MatiCons">feed</span></div>
			<div onclick="rRRedRction('/user/friends/?id=<?=$user['id'];?>')"><span class="MatiCons">group</span></div>
			<div onclick="rRRedRction('/page/video/')"><span class="MatiCons">smart_display</span></div>
				
				
			
			
			
		</div>

	</div>
	
	
		<div class="col-3">
	
	
		<div class="rightMenuMAz23">
		
	
<div onclick="rRRedRction('/user/settings/')"> 
	<div class="rightWebHdrB"> <span class="MatiCons30">settings_account_box</span> </div>	
</div>


<div  onclick="rRRedRction('/page/users/')"> 
	<div class="rightWebHdrB"> <span class="MatiCons30">travel_explore</span> </div>	
</div>


<div  onclick="rRRedRction('/mail/')" style="position:relative;"> 
	
	<? if ($sms>0): ?>
	
	<? if ($sms<=99)$ksmq1 = $sms; else $ksmq1 = "99"; 
	?>
		
	<div class="hdrAbsCntnt">
		<?=$ksmq1;?>
	</div>
	
	<? endif; ?>
	
	<div class="rightWebHdrB"> <span class="MatiCons30">Mail</span></div> 
</div> 
 	

<div class="kPstRel" tabindex="0" id="ckifUsrbClicked" onclick="hdrChDpqwe();"> 
	
	<div> <?=$usojbid->photo3(48);?> </div> 
	
<!-- dropdoWN -->

<div class="pdropDMainContainer HdrDp11_id" id="HdrDp11_id">
	

<div class="drpRightSide1zq"> 
	<div><?=$usojbid->photo2(48,'40','40');?></div>	
	<div class="alignSelfWhw1z"><?=$usojbid->nick();?></div>
</div>
	
	
<div class="alqmSeparator1zq"></div>

	
<div class="pDropDvChlPar">
	
	
	<div>   
		
		<div class="pFlexDiv" onclick="rRRedRction('/page/')">
			<div><span class="MatiCons30">widgets</span></div>
			<div class="pFlexAlCenter"> Personal page </div>
		</div>
		
		
		
		</div>	
	
	
	
	<div>   
		
		<div class="pFlexDiv" onclick="rRRedRction('/user/settings/')">
			<div><span class="MatiCons30">Settings</span></div>
			<div class="pFlexAlCenter"> Settings & privacy </div>
		</div>
		
		
		
		</div>
	
	
	<div>
	
	
	
	<div class="pFlexDiv" onclick="rRRedRction('/page/support/')">
			<div><span class="MatiCons30">Help</span></div>
			<div class="pFlexAlCenter"> Help & support </div>
		</div>
	
	
	
	
	</div>
	
	
	
	<div>
	
	
		
		<div class="pFlexDiv" onclick="rRRedRction('/apps/')">
			<div><span class="MatiCons30">apps</span></div>
			<div class="pFlexAlCenter"> Applications  </div>
		</div>
	
	
	
	
	</div>
		
	
	

	
	
	
	<div> 
	
	
		<div class="pFlexDiv" onclick="rRRedRction('/exit.php')">
			<div><span class="MatiCons30">login</span></div>
			<div class="pFlexAlCenter">Logout </div>
		</div>
	
	
	
	
	
	
	
	</div>
	
	
	
	
</div>	



</div>

<!-- dropdoWN -->
	
</div> 
	
		


		
		</div>
	
	
	
	</div>
	
	
		

</div>



	
	


	<div class="home">
		<div class="" style="margin-top:10px;">
			
			
			<div class="MM_WWEMain">
					
		<div class="mm_webflx_left">
			


<? if ($_SERVER['PHP_SELF']=='/index.php') { ?>

<div class="w_us_pflrql11">
	
	<div><?=$usojbid->photo3(48);?></div>
	
		<div>
			
			<div><?=$usojbid->nick();?> </div>
			<div><a href="/page/">More</a></div>
		
		</div>
	
	
</div>
  

<? } ?>
		

			
			<div class="nvm_lfmn">

		



				<a href="/" class="">
					<div> 
						<span class="material-symbols-outlined svg">home</span>
						<span>Home</span> 
					</div>
				 </a>
				



		
<a href="/page/notes/">
	<div>
	  <span class="material-symbols-outlined svg">newspaper</span>
	  <span>Blogs</span>  
    </div>
</a>	

<a href="/page/video/">
<div> <span class="material-symbols-outlined svg">play_circle</span>  <span>Videos</span></div>
</a>


		


<a href="/chat/">
<div> 
  <span class="material-symbols-outlined svg">chat</span>
  <span>Chat</span>
</div>
</a>



		
<a href="/page/votes/">
<div> 
	<span class="material-symbols-outlined svg">ballot</span>
	<span>Votes</span>
</div>
</a>
		
	<a href="/apps/">	
		<div> 
			<span class="material-symbols-outlined svg">sports_esports</span>
			<span>Games</span>
		</div>	
	</a>	
	

	
	
	
	
	
		<a href="/page/users/">	
			<div>
				<span class="material-symbols-outlined svg">person_search</span>	
				<span>Users</span>
			</div>
		</a>	
	
	
	

	

	
	
	
	
		
<a href="/user/settings/">	
<div>
	<span class="material-symbols-outlined svg">manage_accounts</span>
	<span>Settings</span>
</div>
</a>	
	
	
	
	
	

	<a href="/page/support/">	
		<div>	
			<span class="material-symbols-outlined svg">help</span>
			<span>Support & help</span>
		</div>
	</a>	
	
	
	
	
		
<a href="/exit.php">	
<div>
	<span class="material-symbols-outlined svg">logout</span>
	<span>Logout</span>
</div>
</a>	
		
	
	
	
	
	
	
	


				
<? if ($user['level']>=2) { ?>	

<a href="/page/admin/">
	
<div>  
<span class="material-symbols-outlined svg">admin_panel_settings</span>
 <span> Admin  </span>
</div>

</a> 


<? } ?>
							
					
				</div>  
				
	
	
<!-- </div>	 -->
			
</div>  









<div class="mm_webflx_inbetween">
	
<div class="uusrspc_Hmdvs1">
	
	
	
	
	<?






}

}



}
?>







<?
function shif($str)
{
	global $set;
	$key=$set['shif'];
	$str1=md5((string)$str);
	$str2=md5($key);
	return md5($key.$str1.$str2.$key);
}


function cookie_encrypt($str,$id=0)
{
	if (function_exists('mcrypt_module_open'))
	{
		$td = mcrypt_module_open ('rijndael-256', '', 'ofb', '');
		if (!$iv = @file_get_contents(H.'sys/dat/shif_iv.dat'))
		{
			$iv=base64_encode( mcrypt_create_iv (mcrypt_enc_get_iv_size($td), MCRYPT_DEV_RANDOM));
			file_put_contents(H.'sys/dat/shif_iv.dat', $iv);
			chmod(H.'sys/dat/shif_iv.dat', 0777);
		}
		$ks = @mcrypt_enc_get_key_size ($td);
		/* Создать ключ */
		$key = substr (md5 ($id.@$_SERVER['HTTP_USER_AGENT']), 0, $ks);
		@mcrypt_generic_init ($td, $key, base64_decode($iv));
		$str = @mcrypt_generic ($td, $str);
		@mcrypt_generic_deinit ($td);
		@mcrypt_module_close ($td);
	}

	$str = base64_encode($str);
	return $str;
}

function cookie_decrypt($str,$id=0)
{
	$str=base64_decode($str);

	if (function_exists('mcrypt_module_open'))
	{
		$td = mcrypt_module_open ('rijndael-256', '', 'ofb', '');

		if (!$iv = @file_get_contents(H.'sys/dat/shif_iv.dat'))
		{
			$iv = base64_encode( mcrypt_create_iv (mcrypt_enc_get_iv_size($td), MCRYPT_DEV_RANDOM));
			file_put_contents(H.'sys/dat/shif_iv.dat', $iv);
			chmod(H.'sys/dat/shif_iv.dat', 0777);
		}
		$ks = @mcrypt_enc_get_key_size ($td);		
		/* Создать ключ */
		$key = substr (md5 ($id.@$_SERVER['HTTP_USER_AGENT']), 0, $ks);
		@mcrypt_generic_init ($td, $key, base64_decode($iv));
		$str = @mdecrypt_generic ($td, $str);
		@mcrypt_generic_deinit ($td);
		@mcrypt_module_close ($td);
	}
	return $str;
}
?>





<?


///////




///////



  
function webPage()
{
	
global $set, $user, $browser, $usojbid, $pdo;

$set['online'] = 600;
$time = time();


   

$k_frend = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends_requests` WHERE `user` = ?",[$user['id']]);		
	 
$k_notif = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `user_activity` WHERE `user` = ? AND `read` = '0'",[$user['id']]);		 

$sms = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `messages` WHERE `whom` = ? AND `read` = '0'",[$user['id']]);

$avatariq = $pdo->fetchOne("SELECT * FROM `gallery_foto` WHERE `id_user` = ? AND `avatar` = '1'",[$user['id']]);



if ($avatariq>0)  {
	
	$ffoto = '<img class="hgh" src="/images/gallery/48/'.$avatariq['photo_addr'].'.jpg">';

} else {
	
	$ffoto = '<img class="hgh" src="/img/info/avatar.gif">';

}



$pgeurl1 = $_SERVER['REQUEST_URI'];
?>




	<div class="pHntNV12_3">
	
	
	<div class="col-3">
		
		<div class="leftRegionWeb">
			
			<div class="leftRegWeb1"><a href="/" class="mnlnkstl"><img src="/images/logo.svg" alt="logo"></a></div>
			
			<div class="leftregb100w">
				
				<div class="leftregb100w">
					<form><input class="ppng1_3213" type="buha" placeholder="Search for the things" maxlength="128"></form>
				</div>
	
	
	</div>
		</div>
		
		 
		 
	</div>
	
	
	<div class="col-6">
	
		<div class="MiddleRegionWeb">
			<div onclick="rRRedRction('/')"><span class="MatiCons">home</span></div>
			<div onclick="rRRedRction('/user/alarms/')"><span class="MatiCons">feed</span></div>
			<div onclick="rRRedRction('/user/friends/?id=<?=$user['id'];?>')"><span class="MatiCons">group</span></div>
			<div onclick="rRRedRction('/page/video/')"><span class="MatiCons">smart_display</span></div>
				
				
			
			
			
		</div>

	</div>
	
	
		<div class="col-3">
	
	
		<div class="rightMenuMAz23">
		
	
<div onclick="rRRedRction('/user/settings/')"> 
	<div class="rightWebHdrB"> <span class="MatiCons30">settings_account_box</span> </div>	
</div>


<div  onclick="rRRedRction('/page/users/')"> 
	<div class="rightWebHdrB"> <span class="MatiCons30">travel_explore</span> </div>	
</div>


<div  onclick="rRRedRction('/mail/')" style="position:relative;"> 
	
	<? if ($sms>0): ?>
	
	<? if ($sms<=99)$ksmq1 = $sms; else $ksmq1 = "99"; 
	?>
		
	<div class="hdrAbsCntnt">
		<?=$ksmq1;?>
	</div>
	
	<? endif; ?>
	
	<div class="rightWebHdrB"> <span class="MatiCons30">Mail</span></div> 
</div> 
 	

<div class="kPstRel" tabindex="0" id="ckifUsrbClicked" onclick="hdrChDpqwe();"> 
	
	<div> <?=$usojbid->photo3(48);?> </div> 
	
<!-- dropdoWN -->

<div class="pdropDMainContainer HdrDp11_id" id="HdrDp11_id">
	

<div class="drpRightSide1zq"> 
	<div><?=$usojbid->photo2(48,'40','40');?></div>	
	<div class="alignSelfWhw1z"><?=$usojbid->nick();?></div>
</div>
	
	
<div class="alqmSeparator1zq"></div>

	
<div class="pDropDvChlPar">
	
	
	<div>   
		
		<div class="pFlexDiv" onclick="rRRedRction('/page/')">
			<div><span class="MatiCons30">widgets</span></div>
			<div class="pFlexAlCenter"> Personal page </div>
		</div>
		
		
		
		</div>	
	
	
	
	<div>   
		
		<div class="pFlexDiv" onclick="rRRedRction('/user/settings/')">
			<div><span class="MatiCons30">Settings</span></div>
			<div class="pFlexAlCenter"> Settings & privacy </div>
		</div>
		
		
		
		</div>
	
	
	<div>
	
	
	
	<div class="pFlexDiv" onclick="rRRedRction('/page/support/')">
			<div><span class="MatiCons30">Help</span></div>
			<div class="pFlexAlCenter"> Help & support </div>
		</div>
	
	
	
	
	</div>
	
	
	
	<div>
	
	
<div class="pFlexDiv" onclick="rRRedRction('/apps/')">
			<div><span class="MatiCons30">apps</span></div>
			<div class="pFlexAlCenter"> Applications  </div>
		</div>
	
	
	
	
	</div>
		
	
	

	
	
	
	<div> 
	
	
		<div class="pFlexDiv" onclick="rRRedRction('/exit.php')">
			<div><span class="MatiCons30">login</span></div>
			<div class="pFlexAlCenter">Logout </div>
		</div>
	
	
	
	
	
	
	
	</div>
	
	
	
	
</div>	



</div>

<!-- dropdoWN -->
	
</div> 
	
		


		
		</div>
	
	
	
	</div>
	
	
		

</div>



	
	

	
<?


}
?>

