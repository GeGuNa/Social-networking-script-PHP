<?php

defined('in') or die('uups');

?> 

<?
header("Content-Type: text/html; charset=utf-8");

if (!isset($user) && $browser=='web'){$set['version']=$set['version2'];}

if (isset($user) && $browser=='web'){$user['version']=$user['version2'];}

$set['background'] = '00b85c'; 

?>



<!DOCTYPE html>
<html>

<head> 
<meta charset="UTF-8">




<link rel="icon" href="/pics/hrt2.png" type="image/png">
<link rel="shortcut icon" href="/pics/hrt2.png" type="image/png">


<link rel="canonical" href="/">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">

<!--

<meta name="viewport" content="width=device-width, user-scalable=no">

<link rel="manifest" href="/assets/manifest.json">

-->

<meta property="og:title" content="Last.Ge social network" />
<meta property="og:type" content="website" />
<meta property="og:description"  content="last.ge - შემოგვიერთდი და შეიძინე მეგობრები." />
<meta property="og:site_name" content="Last" />


<meta name="description" content="" />
<meta name="keywords" content="" />



<link rel="stylesheet" href="/css/Home.css" type="text/css">
<link rel="stylesheet" href="/css/Stuff.css" type="text/css">
<link rel="stylesheet" href="/css/user_space.css" type="text/css">
<link rel="stylesheet" href="/css/Album.css" type="text/css">


<title id="titleq2"> test </title>

<meta name="viewport" content="width=device-width" />


<link rel="stylesheet" href="/assets/css/awesome/all.css" type="text/css">
<link rel="stylesheet" href="/assets/css/rest.css" type="text/css">




<? if (isset($user) && $user['version']=='wap') { ?>

<link rel="stylesheet" href="/css/mobile.css" type="text/css">

<? } else if (isset($user) && $user['version']=='web') { ?>

<link rel="stylesheet" href="/css/web.css" type="text/css">

<? } else if (!isset($user) && $set['version']=='web') { ?>

<link rel="stylesheet" href="/css/notauth/web.css" type="text/css">

<?	} else if (!isset($user) && $set['version']=='wap') { ?>
	
<link rel="stylesheet" href="/css/notauth/mobile.css" type="text/css">

<? } else { ?>

<? } ?>






<script src="/assets/javascript/jquery-3.6.0.js"></script>

<script src="/assets/javascript/rest.js"></script>

<script src="/assets/javascript/axios.min.js"></script>
<script src="/assets/javascript/emoji.js"></script>



<script src="/assets/javascript/main.js"></script>



<!--

<script src="/js/soundmanagerv297a-20170601/script/soundmanager2.js"></script>


<script data-main="/assets/javascript/" src="/assets/javascript/require_js.js"></script>

-->



<script>

/*requirejs(["alert"], function(swal) {
   swal.fire(
  'Good job!',
  'You clicked the button!',
  'success'
)
});*/

</script>



</head>


<!-- <body onmouseup="ActiveDiv()">  -->

<body>





