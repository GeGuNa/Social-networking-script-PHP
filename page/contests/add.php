<?
 
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';




include 'review.php';


if ($user['level']<4) {
	header("location: /");
	exit;
}



if (isset($_POST['post']))
{



if (!empty($_FILES['photo']['name'])) {

$picture = $_FILES['photo']['name'];

if (!ifImage($picture)) { 
$_SESSION['message'] = "დაშვებული ფორმატები gif, png, jpg, jpeg, webp";
header("Location: add.php");
exit; 
}

}

$name = my_esc($_POST['Name']);
$description = my_esc($_POST['Desc']);
$howmany = my_esc($_POST['howmany']);
$endingtime = my_esc($_POST['endtime']);


if ($howmany<2 or $howmany>60){
$_SESSION['message'] = "მონაწილეთა რაოდენობა უნდა ვარირებდეს 2 დან 60 მდე";
header("Location: ?");
exit; 	
}


if ($endingtime<2 or $endingtime>60){
$_SESSION['message'] = "დასრულების ვადა უნდა ვარირებდეს 2 დღიდან  60 დღემდე";
header("Location: ?");
exit; 	
}


if (!is_numeric($howmany) || !is_numeric($endingtime)) {
$_SESSION['message'] = "დაფიქსირდა შეცდომა";
header("Location: ?");
exit; 	
}

if (strlen2($name)>60 or strlen2($name)<2){
$_SESSION['message'] = "სახელი არ უნდა იყოს 2 სიმბოლოზე ნაკლები და 60 სიმბოლოზე მეტი";
header("Location: ?");
exit; 	
}
	


if (strlen2($description)>5096 or strlen2($description)<2) {
$_SESSION['message'] = "აღწერა არ უნდა აღემატებოდეს 5096 სიმბოლოს და არ უნდა იყოს 2 სიმბოლოზე ნაკლები";
header("Location: ?");
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

$picturePath = $_SERVER['DOCUMENT_ROOT'].'/page/contests/covers/'.$id_foto.'.jpg';


ConvertImage($picture, $picturePath);	

$flmsqwe = $id_foto;	

} else {

$flmsqwe = '';

}

$name = my_esc($_POST['Name']);
$description = my_esc($_POST['Desc']);
$howmany = my_esc((int)$_POST['howmany']);
$endingtime = my_esc((int)$_POST['endtime']);

$calendingtime = abs((int)($endingtime*3600*24)+$time); 


$prize = abs((int)$_POST['prize']); 

if (!$prize) {
	$pqwe1 = '0';
} else {
	$pqwe1 = $prize;
}


$pdo->query("INSERT INTO `contests` (`prize`,`when`, `name`, `user_id`, `cover`, `description`,`howmanypeople`,`end`) values(?,?,?,?,?,?,?,?)", [$pqwe1, $time, $name, $user['id'], $flmsqwe, $description, $howmany, ($calendingtime)]);




$st = $pdo->getLastInsertedId();


$_SESSION['message'] = 'წარმატებით დაემატა';
header("Location: /page/contests/contest.php?id=$st");
exit;



}




include '../../inc/header.php';
title();
aut();


?>














<div class='ftrwithborder'>
<form method='post' enctype="multipart/form-data"  action='add.php'>


<div class="form-group">
<label class="form-label">  სახელი </label>
<input type="text" name="Name" minlength="2" maxlength="60" required value="" placeholder="სახელი">
</div>


<div class="form-group">
<label class="form-label"> აღწერა </label>
<textarea name="Desc" rows="5" minlength="2" maxlength="5096" required placeholder="აღწერა"></textarea>  
</div>


<div class="form-group"> 
<label class="form-label">ფოტო გარეკანის (აუცილებელია)</label>
<input type="file" name="photo" id="subject" required> 
</div>


<div class="form-group">
<label class="form-label"> მონაწილეთა რაოდენობა </label>
<input name="howmany" rows="5" minlength="1" maxlength="60" required placeholder="მაქსიმუმ მონაწილეთა რაოდენობა"> 
</div>

<div class="form-group">
<label class="form-label"> დასრულდეს რამდენ დღეში ? </label>
<input name="endtime" rows="5" minlength="1" maxlength="60" required placeholder="რამდენ დღეში დასრულდეს კონკურსი"> 
</div>


<div class="form-group">
<label class="form-label"> პირველ ადგილზე გასულს გადაეცეს რამდენი მონეტა  </label>
<input name="prize" rows="5" minlength="1" maxlength="11" required placeholder="0 დან ზემოთ"> 
</div>




<div class="form-group"> 
	<input name="post" type="submit" value="შექმნა">
</div>	




</form>
</div>


<div class='break'>
 <a href='/page/contests/'>უკან</a>
</div>


<?
include '../../inc/footer.php';
?>
