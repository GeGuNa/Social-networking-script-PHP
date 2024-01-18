<?

include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';


if (!isset($_GET['id'])) {
	header("Location: /");
	exit;
} 

if (!is_numeric($_GET['id'])) {
	header("Location: /");
	exit;
} 

if (!isset($_GET['gift'])) {
	header("Location: /");
	exit;
} 

if (!is_numeric($_GET['gift'])) {
	header("Location: /");
	exit;
} 


$kgfgt1 = filter($_GET['gift']);

$gift = $pdo->fetchOne("SELECT * FROM `gift_list` WHERE `id` = ?", [$kgfgt1]);



if (!$gift)
{
header("Location: /index.php");
exit;
}


$ank=get_user(nums($_GET['id']));

if (!$ank)
{
header("Location: /index.php");
exit;
}



if ($ank['id'] == $user['id'])
{
header("Location: /index.php");
exit;
}







include '../../inc/header.php';
title();
aut();
	
	

/*-------------------close / ignor / off / block------------------*/


if ($user['id']!=$ank['id']) {


if_blocked($ank);

if_blacklisted($ank);

if_closed($ank);

}


/*-------------------end------------------*/

	






$category = $pdo->fetchOne("SELECT * FROM `gift_categories` WHERE `id` = '".$gift['id_category']."'");



if (isset($_POST['cfms']))
{
	
$message = my_esc($_POST['message']);
$giftm = abs((int)$_POST['Mode']);
	
	
	
	
	
if ($user['balls']<$gift['money'])$_SESSION['err'] = 'არ გაქვთ '.detect($gift['money']).' მონეტა ';
if (strlen2($message)>200)$_SESSION['err'] = 'კომენტარი არ უნდა აღემატებოდეს 200 სიმბოლოს';

if (!in_array($giftm, array(0,1,2))){
header("Location: ?id=".($ank['id'])."&gift=$gift[id]");
exit;
}




if (isset($_SESSION['err'])) {
header("Location: ?id=$poll[id]");
exit;	
}

if (!isset($_SESSION['err'])) {


$pdo->exec("UPDATE `user` SET `balls` = '".($user['balls']-$gift['money'])."' WHERE `id` = '".$user['id']."'");

$pdo->query("INSERT INTO `gifts_user` (`id_user`, `id_ank`, `id_gift`,`time`,`type`,`coment`) values(?,?,?,?,?,?)", [$ank['id'], $user['id'], $gift['id'], $time, $giftm, $message]);



user_activity($ank['id'], $user['id'], $time, "/", 'giving_presents', $gift['id']);

$_SESSION['message'] = 'Has been sent!!!';
header("Location: /");
exit;
}


}


$ank1 = new user($ank['id']);

?>


<div class="cztr1frnd21">


<div><?=$ank1->photo50(640,48,48);?></div>

<div class="dflexAcenter">
	<div><?=$ank1->nick();?></div>
</div>

</div>


<div class="czn123nav2mNR2"> 


<div class="form-group">
	
<img src="/img/gift/<? echo $gift['id'];?>.png" class="gwWmxw">

<br> 
Price: <span class="green"><b><? echo detect($gift['money']); ?></b></span> 
<br> 
You have:  <span class="green"><b><? echo detect($user['balls']); ?></b></span>   
      
</div> 


<form action="?gift=<? echo $gift['id'];?>&id=<? echo $ank['id'];?>" method="post">  

   



<div class="form-group">

<label class="form-label">Gift type:</label>     


<div> 
	<input style="height:15px;" type="radio" name="Mode" id="Mode0" value="0" checked="checked"> Public 
</div> 

<div> 
	<input style="height:15px;" type="radio" class="" name="Mode" id="Mode1" value="1"> Private
</div> 

<div> 
	<input style="height:15px;" type="radio" name="Mode" id="Mode2" value="2"> Aninimously
</div> 

    
</div>



<div class="form-group">
	
<label class="form-label"> Text:  </label>   

<textarea style="resize:none;" rows="3" cols="17" maxlength="200" name="message" maxlength="220" placeholder="Put text here">
</textarea>   
  
</div>


<button name="cfms" class="btn" value="snd">
	Send
</button> 


     

</form>


 </div>  
  
  
  
<div class='cl_foot3'>
	<a href="categories.php?id=<?=$ank['id'];?>">Back to categories</a>
</div>  


<div class='cl_foot2'>
 <a href="/">Home</a>
</div>


 


<?

include '../../inc/footer.php';
?>
