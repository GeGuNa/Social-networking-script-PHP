<?php
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';

include '../../inc/header.php';
title();
aut();


?>

<div class="privacyh3">777</div>

<?


if ($user['balls']<1000)
{
echo "<div class='nav2'>tamashshi minimaluri fsonia <b>1000</b> moneta.<br>tqven ki gaqvt <b>".detect($user['balls'])."</b> moneta.</div>";
}
else
{

$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']-1000)."' WHERE `id` = '".filter($user['id'])."'");

$num_a1 = rand(1, 6);
$num_b1 = rand(1, 6);
$num_c1 = rand(1, 9);
$num_d1 = array($num_a1, $num_b1, $num_c1);
$num_e1 = rand(0, 2);
$num1 = $num_d1[$num_e1];
$num_a2 = rand(1, 6);
$num_b2 = rand(1, 6);
$num_c2 = rand(1, 9);
$num_d2 = array($num_a2, $num_b2, $num_c2);
$num_e2 = rand(0, 2);
$num2 = $num_d2[$num_e2];
$num_a3 = rand(1, 6);
$num_b3 = rand(1, 6);
$num_c3 = rand(1, 9);
$num_d3 = array($num_a3, $num_b3, $num_c3);
$num_e3 = rand(0, 2);
$num3 = $num_d3[$num_e3];


if ($num1 == 7 and $num2 == 7 and $num3 == 7)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+100000)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'tqven moiget 100000 moneta!';
redirection("?");
}

elseif ($num1 == 7 and $num2 == 7 or $num2 == 7 and $num3 == 7 or $num1 == 7 and $num3 == 7)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+100)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'tqven moiget 100 moneta!';
redirection("?");
}

elseif ($num1 == 7 or $num2 == 7 or $num3 == 7)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+20)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'tqven moiget 20 moneta!';
redirection("?");
}

else
{


if ($num1 == 9 and $num2 == 9 and $num3 == 9)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+9000)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'tqven moiget 9000 moneta!';
redirection("?");
}

if ($num1 == 8 and $num2 == 8 and $num3 == 8 )
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+8000)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'tqven moiget 8000 moneta!';
redirection("?");
}

if ($num1 == 6 and $num2 == 6 and $num3 == 6)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+6000)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'tqven moiget 6000 moneta!';
redirection("?");
}

if ($num1 == 5 and $num2 == 5 and $num3 == 5)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+5000)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'tqven moiget 5000 moneta!';
redirection("?");
}

if ($num1 == 4 and $num2 == 4 and $num3 == 4)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+4000)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'tqven moiget 4000 moneta!';
redirection("?");
}

if ($num1 == 3 and $num2 == 3 and $num3 == 3)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+3000)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'tqven moiget 3000 moneta!';
redirection("?");
}

if ($num1 == 2 and $num2 == 2 and $num3 == 2)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+2000)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'tqven moiget 2000 moneta!';
redirection("?");
}

if ($num1 == 1 and $num2 == 1 and $num3 == 1)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+1000)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'tqven moiget 1000 moneta!';
redirection("?");
}

}

$num1=str_replace('1', '<img src="img/1.png">', $num1);
$num1=str_replace('2', '<img src="img/2.png">', $num1);
$num1=str_replace('3', '<img src="img/3.png">', $num1);
$num1=str_replace('4', '<img src="img/4.png">', $num1);
$num1=str_replace('5', '<img src="img/5.png">', $num1);
$num1=str_replace('6', '<img src="img/6.png">', $num1);
$num1=str_replace('7', '<img src="img/7.png">', $num1);
$num1=str_replace('8', '<img src="img/8.png">', $num1);
$num1=str_replace('9', '<img src="img/9.png">', $num1);

$num2=str_replace('1', '<img src="img/1.png">', $num2);
$num2=str_replace('2', '<img src="img/2.png">', $num2);
$num2=str_replace('3', '<img src="img/3.png">', $num2);
$num2=str_replace('4', '<img src="img/4.png">', $num2);
$num2=str_replace('5', '<img src="img/5.png">', $num2);
$num2=str_replace('6', '<img src="img/6.png">', $num2);
$num2=str_replace('7', '<img src="img/7.png">', $num2);
$num2=str_replace('8', '<img src="img/8.png">', $num2);
$num2=str_replace('9', '<img src="img/9.png">', $num2);

$num3=str_replace('1', '<img src="img/1.png">', $num3);
$num3=str_replace('2', '<img src="img/2.png">', $num3);
$num3=str_replace('3', '<img src="img/3.png">', $num3);
$num3=str_replace('4', '<img src="img/4.png">', $num3);
$num3=str_replace('5', '<img src="img/5.png">', $num3);
$num3=str_replace('6', '<img src="img/6.png">', $num3);
$num3=str_replace('7', '<img src="img/7.png">', $num3);
$num3=str_replace('8', '<img src="img/8.png">', $num3);
$num3=str_replace('9', '<img src="img/9.png">', $num3);





echo "<div class='nav2'>balansi ".detect($user['balls'])." moneta</div>";
echo "<div class='nav2'>Bid: 1000 ball</div>";
echo "<div class='nav2' style='text-align: center;'>";
echo "$num1 $num2 $num3";
echo "<br><a href='777.php'><img src='/style/icons/refresh.png'></a></div>";
}

echo "<div class='cl_foot1'>";
echo "<a href='/apps/'>Games</a>";
echo "</div>";

echo "<div class='cl_foot2'>";
echo "<a href='/'>Home</a>";
echo "</div>";

include '../../inc/footer.php';
?>
