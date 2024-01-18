<?

include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';



if (!isset($_GET['id'])) {
header("Location: index.php");
exit;
}
	
if (!is_numeric($_GET['id'])) {
header("Location: index.php");
exit;
}	


$ank=get_user(nums($_GET['id']));

if (!$ank)
{
header("Location: /index.php");
exit;
}


if ($user['id'] == $ank['id']) {
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




?>





<center><div class="nav2"> Gifting the stickers to - <?echo detect($ank['nick']);?> </div> </center>





<div class="navzflfxl2123">

<div><a href="love.php?id=<?echo $ank['id'];?>"> <img src="/img/stickers/love/1.png"> </a> </div>
<div><a href="wedding.php?id=<?echo $ank['id'];?>"> <img src="/img/stickers/wedding/1.png"> </a> </div>
<div><a href="bday.php?id=<?echo $ank['id'];?>"> <img src="/img/stickers/bday/4.png"> </a> </div>

</div>





<div class='cl_foot1'>
	<a href='/user/gifts.php?id=<?php echo $ank['id'];?>'>Back to gifts</a>
</div>


<div class='cl_foot2'>
<a href='/'>Home</a>
</div>



<?
include '../../inc/footer.php';
?>
