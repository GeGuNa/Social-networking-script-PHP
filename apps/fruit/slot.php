<?php
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';

include '../../inc/header.php';
title();
aut();

echo '<div class="privacyh3">Fruit cocktail</div>';


if ($user['balls']<10)
{
echo "<div class='nav2'>";
echo "tamashshi minimaluri fsonia <b>10</b> moneta.<br>";
echo "</div>";
}
else
{

$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']-10)."' WHERE `id` = '".filter($user['id'])."'");

$num_a1 = rand(1, 6);
$num_b1 = rand(1, 6);
$num_c1 = rand(1, 9);
$num_d1 = array($num_a1, $num_b1, $num_c1);
$num_e1 = rand(0, 2);
$num1 = $num_d1[$num_e1];

$num_a1 = rand(1, 6);
$num_b1 = rand(1, 6);
$num_c1 = rand(1, 9);
$num_d1 = array($num_a1, $num_b1, $num_c1);
$num_e1 = rand(0, 2);
$num2 = $num_d1[$num_e1];

$num_a1 = rand(1, 6);
$num_b1 = rand(1, 6);
$num_c1 = rand(1, 9);
$num_d1 = array($num_a1, $num_b1, $num_c1);
$num_e1 = rand(0, 2);
$num3 = $num_d1[$num_e1];

$num_a1 = rand(1, 6);
$num_b1 = rand(1, 6);
$num_c1 = rand(1, 9);
$num_d1 = array($num_a1, $num_b1, $num_c1);
$num_e1 = rand(0, 2);
$num4 = $num_d1[$num_e1];

$num_a1 = rand(1, 6);
$num_b1 = rand(1, 6);
$num_c1 = rand(1, 9);
$num_d1 = array($num_a1, $num_b1, $num_c1);
$num_e1 = rand(0, 2);
$num5 = $num_d1[$num_e1];

$num_a1 = rand(1, 6);
$num_b1 = rand(1, 6);
$num_c1 = rand(1, 9);
$num_d1 = array($num_a1, $num_b1, $num_c1);
$num_e1 = rand(0, 2);
$num6 = $num_d1[$num_e1];

$num_a1 = rand(1, 6);
$num_b1 = rand(1, 6);
$num_c1 = rand(1, 9);
$num_d1 = array($num_a1, $num_b1, $num_c1);
$num_e1 = rand(0, 2);
$num7 = $num_d1[$num_e1];

$num_a1 = rand(1, 6);
$num_b1 = rand(1, 6);
$num_c1 = rand(1, 9);
$num_d1 = array($num_a1, $num_b1, $num_c1);
$num_e1 = rand(0, 2);
$num8 = $num_d1[$num_e1];

$num_a1 = rand(1, 6);
$num_b1 = rand(1, 6);
$num_c1 = rand(1, 9);
$num_d1 = array($num_a1, $num_b1, $num_c1);
$num_e1 = rand(0, 2);
$num9 = $num_d1[$num_e1];

if ($num1 == 1 && $num2 == 1 && $num3 == 1)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+1)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 1 moneta!';
redirection("?");
}
if ($num4 == 1 && $num5 == 1 && $num6 == 1)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+1)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 1 moneta!';
redirection("?");
}
if ($num7 == 1 && $num8 == 1 && $num9 == 1)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+1)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 1 moneta!';
redirection("?");
}
if ($num1 == 1 && $num5 == 1 && $num9 == 1)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+1)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 1 moneta!';
redirection("?");
}
if ($num3 == 1 && $num5 == 1 && $num7 == 1)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+1)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 1 moneta!';
redirection("?");
}
if ($num1 == 1 && $num4 == 1 && $num7 == 1)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+1)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 1 moneta!';
redirection("?");
}
if ($num2 == 1 && $num5 == 1 && $num8 == 1)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+1)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 1 moneta!';
redirection("?");
}
if ($num3 == 1 && $num6 == 1 && $num9 == 1)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+1)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 1 moneta!';
redirection("?");
}
if ($num1 == 2 && $num2 == 2 && $num3 == 2)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+2)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 2 moneta!';
redirection("?");
}
if ($num4 == 2 && $num5 == 2 && $num6 == 2)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+2)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 2 moneta!';
redirection("?");
}
if ($num7 == 2 && $num8 == 2 && $num9 == 2)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+2)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 2 moneta!';
redirection("?");
}
if ($num1 == 2 && $num5 == 2 && $num9 == 2)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+2)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 2 moneta!';
redirection("?");
}
if ($num3 == 2 && $num5 == 2 && $num7 == 2)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+2)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 2 moneta!';
redirection("?");
}
if ($num1 == 2 && $num4 == 2 && $num7 == 2)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+2)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 2 moneta!';
redirection("?");
}
if ($num2 == 2 && $num5 == 2 && $num8 == 2)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+2)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 2 moneta!';
redirection("?");
}
if ($num3 == 2 && $num6 == 2 && $num9 == 2)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+2)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 2 moneta!';
redirection("?");
}
if ($num1 == 3 && $num2 == 3 && $num3 == 3)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+3)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 3 moneta!';
redirection("?");
}
if ($num4 == 3 && $num5 == 3 && $num6 == 3)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+3)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 3 moneta!';
redirection("?");
}
if ($num7 == 3 && $num8 == 3 && $num9 == 3)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+3)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 3 moneta!';
redirection("?");
}
if ($num1 == 3 && $num5 == 3 && $num9 == 3)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+3)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 3 moneta!';
redirection("?");
}
if ($num3 == 3 && $num5 == 3 && $num7 == 3)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+3)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 3 moneta!';
redirection("?");
}
if ($num1 == 3 && $num4 == 3 && $num7 == 3)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+3)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 3 moneta!';
redirection("?");
}
if ($num2 == 3 && $num5 == 3 && $num8 == 3)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+3)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 3 moneta!';
redirection("?");
}
if ($num3 == 3 && $num6 == 3 && $num9 == 3)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+3)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 3 moneta!';
redirection("?");
}
if ($num1 == 4 && $num2 == 4 && $num3 == 4)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+4)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 4 moneta!';
redirection("?");
}
if ($num4 == 4 && $num5 == 4 && $num6 == 4)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+4)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 4 moneta!';
redirection("?");
}
if ($num7 == 4 && $num8 == 4 && $num9 == 4)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+4)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 4 moneta!';
redirection("?");
}
if ($num1 == 4 && $num5 == 4 && $num9 == 4)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+4)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 4 moneta!';
redirection("?");
}
if ($num3 == 4 && $num5 == 4 && $num7 == 4)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+4)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 4 moneta!';
redirection("?");
}
if ($num1 == 4 && $num4 == 4 && $num7 == 4)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+4)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 4 moneta!';
redirection("?");
}
if ($num2 == 4 && $num5 == 4 && $num8 == 4)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+4)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 4 moneta!';
redirection("?");
}
if ($num3 == 4 && $num6 == 4 && $num9 == 4)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+4)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 4 moneta!';
redirection("?");
}
if ($num1 == 5 && $num2 == 5 && $num3 == 5)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+5)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 5 moneta!';
redirection("?");
}
if ($num4 == 5 && $num5 == 5 && $num6 == 5)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+5)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 5 moneta!';
redirection("?");
}
if ($num7 == 5 && $num8 == 5 && $num9 == 5)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+5)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 5 moneta!';
redirection("?");
}
if ($num1 == 5 && $num5 == 5 && $num9 == 5)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+5)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 5 moneta!';
redirection("?");
}
if ($num3 == 5 && $num5 == 5 && $num7 == 5)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+5)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 5 moneta!';
redirection("?");
}
if ($num1 == 5 && $num4 == 5 && $num7 == 5)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+5)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 5 moneta!';
redirection("?");
}
if ($num2 == 5 && $num5 == 5 && $num8 == 5)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+5)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 5 moneta!';
redirection("?");
}
if ($num3 == 5 && $num6 == 5 && $num9 == 5)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+5)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 5 moneta!';
redirection("?");
}
if ($num1 == 6 && $num2 == 6 && $num3 == 6)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+6)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 6 moneta!';
redirection("?");
}
if ($num4 == 6 && $num5 == 6 && $num6 == 6)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+6)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 6 moneta!';
redirection("?");
}
if ($num7 == 6 && $num8 == 6 && $num9 == 6)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+6)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 6 moneta!';
redirection("?");
}
if ($num1 == 6 && $num5 == 6 && $num9 == 6)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+6)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 6 moneta!';
redirection("?");
}
if ($num3 == 6 && $num5 == 6 && $num7 == 6)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+6)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 6 moneta!';
redirection("?");
}
if ($num1 == 6 && $num4 == 6 && $num7 == 6)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+6)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 6 moneta!';
redirection("?");
}
if ($num2 == 6 && $num5 == 6 && $num8 == 6)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+6)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 6 moneta!';
redirection("?");
}
if ($num3 == 6 && $num6 == 6 && $num9 == 6)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+6)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 6 moneta!';
redirection("?");
}
if ($num1 == 7 && $num2 == 7 && $num3 == 7)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+7)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 7 moneta!';
redirection("?");
}
if ($num4 == 7 && $num5 == 7 && $num6 == 7)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+7)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 7 moneta!';
redirection("?");
}
if ($num7 == 7 && $num8 == 7 && $num9 == 7)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+7)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 7 moneta!';
redirection("?");
}
if ($num1 == 7 && $num5 == 7 && $num9 == 7)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+7)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 7 moneta!';
redirection("?");
}
if ($num3 == 7 && $num5 == 7 && $num7 == 7)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+7)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 7 moneta!';
redirection("?");
}
if ($num1 == 7 && $num4 == 7 && $num7 == 7)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+7)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 7 moneta!';
redirection("?");
}
if ($num2 == 7 && $num5 == 7 && $num8 == 7)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+7)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 7 moneta!';
redirection("?");
}
if ($num3 == 7 && $num6 == 7 && $num9 == 7)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+7)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 7 moneta!';
redirection("?");
}

if ($num1 == 8 && $num2 == 8 && $num3 == 8)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+8)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 8 moneta!';
redirection("?");
}
if ($num4 == 8 && $num5 == 8 && $num6 == 8)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+8)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 8 moneta!';
redirection("?");
}
if ($num7 == 8 && $num8 == 8 && $num9 == 8)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+8)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 8 moneta!';
redirection("?");
}
if ($num1 == 8 && $num5 == 8 && $num9 == 8)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+8)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 8 moneta!';
redirection("?");
}
if ($num3 == 8 && $num5 == 8 && $num7 == 8)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+8)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 8 moneta!';
redirection("?");
}
if ($num1 == 8 && $num4 == 8 && $num7 == 8)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+8)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 8 moneta!';
redirection("?");
}
if ($num2 == 8 && $num5 == 8 && $num8 == 8)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+8)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 8 moneta!';
redirection("?");
}
if ($num3 == 8 && $num6 == 8 && $num9 == 8)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+8)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'Mogeba 8 moneta!';
redirection("?");
}
if ($num1 == 9 && $num2 == 9 && $num3 == 9)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+1000)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'JACKPOT - Mogeba 1000 moneta!';
redirection("?");
}
if ($num4 == 9 && $num5 == 9 && $num6 == 9)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+1000)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'JACKPOT - Mogeba 1000 moneta!';
redirection("?");
}
if ($num7 == 9 && $num8 == 9 && $num9 == 9)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+1000)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'JACKPOT - Mogeba 1000 moneta!';
redirection("?");
}
if ($num1 == 9 && $num5 == 9 && $num9 == 9)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+1000)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'JACKPOT - Mogeba 1000 moneta!';
redirection("?");
}
if ($num3 == 9 && $num5 == 9 && $num7 == 9)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+1000)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'JACKPOT - Mogeba 1000 moneta!';
redirection("?");
}
if ($num1 == 9 && $num4 == 9 && $num7 == 9)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+1000)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'JACKPOT - Mogeba 1000 moneta!';
redirection("?");
}
if ($num2 == 9 && $num5 == 9 && $num8 == 9)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+1000)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'JACKPOT - Mogeba 1000 moneta!';
redirection("?");
}
if ($num3 == 9 && $num6 == 9 && $num9 == 9)
{
$pdo->exec("UPDATE `user` SET `balls` = '".filter($user['balls']+1000)."' WHERE `id` = '".filter($user['id'])."'");
$_SESSION['message'] = 'JACKPOT - Mogeba 1000 moneta!';
redirection("?");
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
$num4=str_replace('1', '<img src="img/1.png">', $num4);
$num4=str_replace('2', '<img src="img/2.png">', $num4);
$num4=str_replace('3', '<img src="img/3.png">', $num4);
$num4=str_replace('4', '<img src="img/4.png">', $num4);
$num4=str_replace('5', '<img src="img/5.png">', $num4);
$num4=str_replace('6', '<img src="img/6.png">', $num4);
$num4=str_replace('7', '<img src="img/7.png">', $num4);
$num4=str_replace('8', '<img src="img/8.png">', $num4);
$num4=str_replace('9', '<img src="img/9.png">', $num4);
$num5=str_replace('1', '<img src="img/1.png">', $num5);
$num5=str_replace('2', '<img src="img/2.png">', $num5);
$num5=str_replace('3', '<img src="img/3.png">', $num5);
$num5=str_replace('4', '<img src="img/4.png">', $num5);
$num5=str_replace('5', '<img src="img/5.png">', $num5);
$num5=str_replace('6', '<img src="img/6.png">', $num5);
$num5=str_replace('7', '<img src="img/7.png">', $num5);
$num5=str_replace('8', '<img src="img/8.png">', $num5);
$num5=str_replace('9', '<img src="img/9.png">', $num5);
$num6=str_replace('1', '<img src="img/1.png">', $num6);
$num6=str_replace('2', '<img src="img/2.png">', $num6);
$num6=str_replace('3', '<img src="img/3.png">', $num6);
$num6=str_replace('4', '<img src="img/4.png">', $num6);
$num6=str_replace('5', '<img src="img/5.png">', $num6);
$num6=str_replace('6', '<img src="img/6.png">', $num6);
$num6=str_replace('7', '<img src="img/7.png">', $num6);
$num6=str_replace('8', '<img src="img/8.png">', $num6);
$num6=str_replace('9', '<img src="img/9.png">', $num6);
$num7=str_replace('1', '<img src="img/1.png">', $num7);
$num7=str_replace('2', '<img src="img/2.png">', $num7);
$num7=str_replace('3', '<img src="img/3.png">', $num7);
$num7=str_replace('4', '<img src="img/4.png">', $num7);
$num7=str_replace('5', '<img src="img/5.png">', $num7);
$num7=str_replace('6', '<img src="img/6.png">', $num7);
$num7=str_replace('7', '<img src="img/7.png">', $num7);
$num7=str_replace('8', '<img src="img/8.png">', $num7);
$num7=str_replace('9', '<img src="img/9.png">', $num7);
$num8=str_replace('1', '<img src="img/1.png">', $num8);
$num8=str_replace('2', '<img src="img/2.png">', $num8);
$num8=str_replace('3', '<img src="img/3.png">', $num8);
$num8=str_replace('4', '<img src="img/4.png">', $num8);
$num8=str_replace('5', '<img src="img/5.png">', $num8);
$num8=str_replace('6', '<img src="img/6.png">', $num8);
$num8=str_replace('7', '<img src="img/7.png">', $num8);
$num8=str_replace('8', '<img src="img/8.png">', $num8);
$num8=str_replace('9', '<img src="img/9.png">', $num8);
$num9=str_replace('1', '<img src="img/1.png">', $num9);
$num9=str_replace('2', '<img src="img/2.png">', $num9);
$num9=str_replace('3', '<img src="img/3.png">', $num9);
$num9=str_replace('4', '<img src="img/4.png">', $num9);
$num9=str_replace('5', '<img src="img/5.png">', $num9);
$num9=str_replace('6', '<img src="img/6.png">', $num9);
$num9=str_replace('7', '<img src="img/7.png">', $num9);
$num9=str_replace('8', '<img src="img/8.png">', $num9);
$num9=str_replace('9', '<img src="img/9.png">', $num9);

echo "<div class='nav2'>";
echo "Moneta: ".detect($user['balls'])."";
echo "</div>";
?>

<div class="nav2">Bid: 10 ball</div>

<?
echo "<div class='nav2' style='text-align: center;'>";
echo "<div>$num1 $num2 $num3</div>";
echo "<div>$num4 $num5 $num6</div>";
echo "<div>$num7 $num8 $num9</div>";
echo "<a href='slot.php'><img src='/style/icons/refresh.png'></a>";
echo "</div>";
}


echo "<div class='cl_foot1'>";
echo "<a href='/apps/'>Games</a>";
echo "</div>";

echo "<div class='cl_foot2'>";
echo "<a href='/'>Home</a>";
echo "</div>";

include '../../inc/footer.php';

?>
