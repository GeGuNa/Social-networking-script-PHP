<?php
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';


$feri1 = 'black';
$feri2 = 'black';



if (!isset($_GET['bid'])) {
	header("location: ./");
	exit;
}

if (!is_numeric($_GET['bid']))
{
	header("location: ./");
	exit;
}




$bid = abs((int)$_GET['bid']);






if (isset($_POST['num']) || isset($_POST['feri'])|| isset($_POST['shedegi']) || isset($_POST['raodenoba']))
{
	
	
	
	
	
if ($bid>1000){
	$_SESSION['message'] = 'მაქსიმალური ფსონი 1000 მონეტა';
	header("location: ?bid=$bid");
	exit;
}


if ($bid<10) {
	$_SESSION['message'] = 'მინიმალური ფსონი 10 მონეტა';
	header("location: ?bid=$bid");
	exit;
}


if ($user['balls']<$bid)
{
	$_SESSION['message'] = 'არ გაქვთ საკმარისი მონეტა';
	header("location: ?bid=$bid");
	exit;
}
	
	
	
$pdo->exec("UPDATE `user` SET `balls` = '".($user['balls']-$bid)."' WHERE `id` = '$user[id]'");






if (isset($_POST['num'])) {
	
$num2 = rand(0, 36);
$num1 = abs((int)$_POST['num']);	
	
	
$_SESSION['chosenby_me'] = $num1;
$_SESSION['the_result'] = $num2;	
	
	
if ($num1 == $num2) {
$mogeba = $bid*10;

$pdo->exec("UPDATE `user` SET `balls` = '".($user['balls']+$mogeba)."' WHERE `id` = '$user[id]'");
$_SESSION['message'] = 'თქვენ მოიგეთ '.$mogeba.' მონეტა!';
}



}




if (isset($_POST['feri'])) {


$feri1 = strip_tags($_POST['feri']);
	
	
$colorGenerated = ['Red','Black'];
$feri2 = $colorGenerated[array_rand($colorGenerated)];


$_SESSION['chosenby_me'] = $feri1;
$_SESSION['the_result'] = $feri2;


if ($feri1 == $feri2) {
	
$mogeba = $bid*3;
$pdo->exec("UPDATE `user` SET `balls` = '".($user['balls']+$mogeba)."' WHERE `id` = '$user[id]'");


$_SESSION['message'] = 'თქვენ მოიგეთ '.$mogeba.' მონეტა!';

}



	
	
}





if (isset($_POST['raodenoba'])) {
	
	$raodenoba1 = strip_tags($_POST['raodenoba']);
	
	
	$howmuch = ['1-18','19-36'];
	$raodenoba2 = $howmuch[array_rand($howmuch)];


$_SESSION['chosenby_me'] = $raodenoba1;
$_SESSION['the_result'] = $raodenoba2;
	


if ($raodenoba1 == $raodenoba2) {
	
	
$mogeba=$bid*3;
$pdo->exec("UPDATE `user` SET `balls` = '".($user['balls']+$mogeba)."' WHERE `id` = '$user[id]'");

$_SESSION['message'] = 'თქვენ მოიგეთ '.$mogeba.' მონეტა!';



} 	
	
	
	
	
}




if (isset($_POST['shedegi'])) {
	$shedegi1 = strip_tags($_POST['shedegi']);
	
	
	$result = ['EVEN','ODD'];
	$shedegi2 = $result[array_rand($result)];


	$_SESSION['chosenby_me'] = $shedegi1;
	$_SESSION['the_result'] = $shedegi2;



if ($shedegi1 == $shedegi2) {
	
	
$mogeba=$bid*3;
$pdo->exec("UPDATE `user` SET `balls` = '".($user['balls']+$mogeba)."' WHERE `id` = '$user[id]'");

$_SESSION['message'] = 'თქვენ მოიგეთ '.$mogeba.' მონეტა!';



} 



	
	
}



header("location: ?bid=$bid");
exit;



}





include '../../inc/header.php';
title();
aut();



?>
<style type="text/css">
input.shavi {
background: #000;
padding: 9px;
margin-top: 2px;
color: #ffffff;
width: 40px;
}
input.witeli {
background: #ff0000;
padding: 9px;
margin-top: 2px;
color: #ffffff;
width: 40px;
}
input.black {
background: #000;
padding: 9px;
margin-top: 2px;
color: #ffffff;
width: 40px;
}
input.red {
background: #ff0000;
padding: 9px;
margin-top: 2px;
color: #ffffff;
width: 40px;
}
input.green {
background: #173B0B;
padding: 9px;
margin-top: 2px;
color: #ffffff;
width: 40px;
height: 98%;
border-radius: 6px;
}
.other {
background: #003333;
padding: 9px;
margin-top: 2px;
color: #ffffff;
width: 40px;
}



</style>
<?




 
	
	
	




?>

	<div class='nav2'>
		მონეტა: <b><?=$user['balls'];?></b><br/>
		ფსონი: <b><?=$bid;?></b>
	</div>



	

<? if (isset($_SESSION['chosenby_me']) and isset($_SESSION['the_result']))  { ?>	
<div class='nav2'>


შედეგი: <span style='color:<?=$feri2;?>'><b><?=$_SESSION['the_result'];?></b></span><br/>
თქვენ აირჩიეთ: <span style='color:<?=$feri1;?>'><b><?=$_SESSION['chosenby_me'];?></b></span><br />	
</div>	
<?

$_SESSION['chosenby_me']  = null;
$_SESSION['the_result']  = null;
}


 
 
 ?>









<div class='nav2'>
	




<form action="?bid=<?=$bid;?>" method="post">

<div style="display:flex;flex-wrap:nowrap;overflow: hidden;justify-content: flex-start;gap: 10px;height: 110px;margin-bottom: 6px;">
	
	<div>
		<input class="green" type="submit" name="num" value="0" />
	</div>

	<div>
	<input class="witeli" type="submit" name="num" value="3" />
	<input class="shavi" type="submit" name="num" value="6" />
	<input class="witeli" type="submit" name="num" value="9" />
	<input class="witeli" type="submit" name="num" value="12" />
	<input class="shavi" type="submit" name="num" value="15" />
	<input class="witeli" type="submit" name="num" value="18" />
	<input class="witeli" type="submit" name="num" value="21" />
	<input class="shavi" type="submit" name="num" value="24" />
	<input class="witeli" type="submit" name="num" value="27" />
	<input class="witeli" type="submit" name="num" value="30" />
	<input class="shavi" type="submit" name="num" value="33" />
	<input class="witeli" type="submit" name="num" value="36" /><br />



	<input class="shavi" type="submit" name="num" value="2" />
	<input class="witeli" type="submit" name="num" value="5" />
	<input class="shavi" type="submit" name="num" value="8" />
	<input class="shavi" type="submit" name="num" value="11" />
	<input class="witeli" type="submit" name="num" value="14" />
	<input class="shavi" type="submit" name="num" value="17" />
	<input class="shavi" type="submit" name="num" value="20" />
	<input class="witeli" type="submit" name="num" value="23" />
	<input class="shavi" type="submit" name="num" value="26" />
	<input class="shavi" type="submit" name="num" value="29" />
	<input class="witeli" type="submit" name="num" value="32" />
	<input class="shavi" type="submit" name="num" value="35" /><br />

	<input class="witeli" type="submit" name="num" value="1" />
	<input class="shavi" type="submit" name="num" value="4" />
	<input class="witeli" type="submit" name="num" value="7" />
	<input class="shavi" type="submit" name="num" value="10" />
	<input class="shavi" type="submit" name="num" value="13" />
	<input class="witeli" type="submit" name="num" value="16" />
	<input class="witeli" type="submit" name="num" value="19" />
	<input class="shavi" type="submit" name="num" value="22" />
	<input class="witeli" type="submit" name="num" value="25" />
	<input class="shavi" type="submit" name="num" value="28" />
	<input class="shavi" type="submit" name="num" value="31" />
	<input class="witeli" type="submit" name="num" value="34" /><br />

	</div>



</div>

<form>
	
	
	
<style>
.restC1l231 {
	padding:10px;
    margin-top: 2px;
}

.blr11 {
	background:black !important;
}

.blr112 {
	background:red !important;
}

</style>	
	

<form action="?bid=<?=$bid;?>" method="post">
<div>

<input class="restC1l231" type="submit" name="raodenoba" value="1-18" />
<input class="restC1l231" type="submit" name="shedegi" value="ODD" />
<input class="restC1l231 blr11" type="submit" name="feri" value="Black" />
<input class="restC1l231 blr112" type="submit" name="feri" value="Red" />
<input class="restC1l231" type="submit" name="shedegi" value="EVEN" />
<input class="restC1l231" type="submit" name="raodenoba" value="19-36"  />

</div>
<form>

</td>






</div>


<div style="margin-top:10px;"></div>

<div class="ftrwithborder">
	<a href="./">უკან</a>
</div>

<div class="ftrwithborder">
	<a href="/apps/">თამაშებში</a>
</div>

<?
include '../../inc/footer.php';
?>
