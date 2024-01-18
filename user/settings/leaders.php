<?

include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';

include '../../inc/header.php';

title();
aut();




$st=100000;
$tm=$time+86400;


$tmtlmt = [
[0,0],
[100000,$time+86400],
[200000,$time+86400*2],
[300000,$time+86400*3],
[400000,$time+86400*4],
[500000,$time+86400*5],
[600000,$time+86400*6],
[700000,$time+86400*7],
[1400000,$time+86400*14],
[2100000,$time+86400*21],
[3100000,$time+86400*31],
[3100000*6,$time+86400*31*6],
[100000*365,$time+86400*365],
];





if (isset($_GET['off'])) {
		
$pdo->exec("UPDATE `user` SET `leader` = '0' WHERE `id` = '$user[id]'");

$_SESSION['message'] = 'Has been disabled';
header("Location: ?");
exit;


}



if ((isset($_GET['act']) && $_GET['act']=='do') && isset($_POST['days']) &&  $_POST['days']>0 && $_POST['days'] <= 12) {


$mntbls = abs((int)$user['balls']-$tmtlmt[$_POST['days']][0]);


if ($user['balls']<$mntbls){

$_SESSION['message'] = 'You dont have enough balls';
header("Location: ?");
exit;

}



if ($user['leader']>$time){

$_SESSION['message'] = 'Already purchased';
header("Location: ?");
exit;

}



if (!in_array($_POST['days'], array(1,2,3,4,5,6,7,8,9,10,11,12))) {
header("Location: ?");
exit;	
}

$kl1312zz = abs((int)$tmtlmt[$_POST['days']][1]);

if(!isset($err)) {
	
$pdo->query("UPDATE `user` SET `leader` = ?, `balls` = ? WHERE `id` = ?", [$kl1312zz, $mntbls, $user['id']]);

$_SESSION['message'] = 'Has been enabled successfully';

header("Location: ?");
exit;

}
}




?>

<div class="PHeadLine fnt">Leader service</div>





<?

 

if ($user['leader'] < $time)
{
?>


<form class="nav1"  method="post" action="?act=do">
<select name="days">
<option value="1">For one day</option>
<option value="2">For two days</option>
<option value="3">For three days</option>
<option value="4">For four days</option>
<option value="5">For five days</option>
<option value="6">For six days</option>
<option value="7">For seven days</option>
<option value="8">For two weeks</option>
<option value="9">For three weeks</option>
<option value="10">For one month</option>
<option value="11">For six month</option>
<option value="12">For one year</option>


</select> 
<input value="Enable" type="submit">
</form>


<? } else { 



	
	
?>	

<div class='nav2'>
	Expration time: <span class='date'> <?=date("d-M-Y H:i:s", $user['leader']);?>  </span>  
</div>

<div class='nav2'> if you want turn it off <strong><a href='?off'>Click here</a></strong>
</div>

<?

}


?>


<div class="nav2">
* The price for 1 day is 100000 ball! <br>
</div>


<div class="break">
 <a href="./">Back</a>
</div>


<?
include '../../inc/footer.php';
?>
