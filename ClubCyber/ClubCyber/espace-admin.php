<?php
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    header('Cache-Control: post-check=0, pre-check=0', false);
    header('Pragma: no-cache');
    session_start();
    include 'groups-6dcc69.php';
    function checkAccess($groups) {
        if(isset($_SESSION['user_groups'])) {
            return count(array_intersect($groups, $_SESSION['user_groups'])) > 0;
        }
        return FALSE;
    }
    if(isset($_SESSION['user_logged']) && 8 > 0) {
        $now = new DateTime();
        $fmt = "Y-m-d\TH:i:sP"; // ATOM
        $end = DateTime::createFromFormat($fmt, $_SESSION['user_logged']->format($fmt));
        $end->add(new DateInterval("PT8H"));
        $diff = $now->diff($end);
        if($diff->invert) {
            unset($_SESSION['session_id']);
            unset($_SESSION['user_id']);
            unset($_SESSION['username']);
            unset($_SESSION['user_name']);
            unset($_SESSION['user_surname']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_info']);
            unset($_SESSION['user_groups']);
            unset($_SESSION['user_logged']);
            unset($_SESSION['user_redirect']);
            unset($_SESSION['user_redirect_attempt']);
            $redirect = 'espace-admin.php';
            if(strlen($redirect) > 0) {
                $_SESSION['user_redirect'] = $redirect;
            }
            header('Location: connexion-utilisateur.html');
            exit;
        }
    }
    $acg = isset($access_control_groups['82DC134F-8710-41D3-A32B-F8CA575828C9']) ? $access_control_groups['82DC134F-8710-41D3-A32B-F8CA575828C9'] : NULL;
    if(!isset($_SESSION['session_id']) || $_SESSION['session_id'] !== '57F84E95-373D-451D-947E-9A6E0EAE0C00' || !isset($_SESSION['user_id']) || !isset($_SESSION['user_logged']) || $acg === NULL || !checkAccess($acg)) {
        $redirect = 'espace-admin.php';
        if(strlen($redirect) > 0) {
            $_SESSION['user_redirect'] = $redirect;
        }
        header('Location: connexion-utilisateur.html');
        exit;
    }
    unset($_SESSION['user_redirect']);
    unset($_SESSION['user_redirect_attempt']);

ini_set('default_charset','UTF-8');header('Content-Type: text/html; charset=UTF-8');header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');header('Cache-Control: post-check=0, pre-check=0', false);header('Pragma: no-cache'); ?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Espace Admin</title>
<meta name="referrer" content="same-origin">
<meta name="robots" content="max-image-preview:large">
<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
<link rel="preload" href="css/AbrilFatface-Regular.woff2" as="font" crossorigin>
<style>html,body{-webkit-text-zoom:reset !important}@font-face{font-display:block;font-family:"Abril Fatface";src:url('css/AbrilFatface-Regular.woff2') format('woff2'),url('css/AbrilFatface-Regular.woff') format('woff');font-weight:400}body>div{font-size:0}p,span,h1,h2,h3,h4,h5,h6,a,li{margin:0;word-spacing:normal;word-wrap:break-word;-ms-word-wrap:break-word;pointer-events:auto;-ms-text-size-adjust:none !important;-moz-text-size-adjust:none !important;-webkit-text-size-adjust:none !important;text-size-adjust:none !important;max-height:10000000px}sup{font-size:inherit;vertical-align:baseline;position:relative;top:-0.4em}sub{font-size:inherit;vertical-align:baseline;position:relative;top:0.4em}ul{display:block;word-spacing:normal;word-wrap:break-word;list-style-type:none;padding:0;margin:0;-moz-padding-start:0;-khtml-padding-start:0;-webkit-padding-start:0;-o-padding-start:0;-padding-start:0;-webkit-margin-before:0;-webkit-margin-after:0}li{display:block;white-space:normal}li p{-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;-o-user-select:none;user-select:none}form{display:inline-block}a{text-decoration:inherit;color:inherit;-webkit-tap-highlight-color:rgba(0,0,0,0)}textarea{resize:none}.shm-l{float:left;clear:left}.shm-r{float:right;clear:right}.btf{display:none}.plyr{min-width:0 !important}html{font-family:sans-serif}body{font-size:0;margin:0;--z:1;zoom:var(--z)}audio,video{display:inline-block;vertical-align:baseline}audio:not([controls]){display:none;height:0}[hidden],template{display:none}a{background:0 0;outline:0}b,strong{font-weight:700}dfn{font-style:italic}h1,h2,h3,h4,h5,h6{font-size:1em;line-height:1;margin:0}img{border:0}svg:not(:root){overflow:hidden}button,input,optgroup,select,textarea{color:inherit;font:inherit;margin:0}button{overflow:visible}button,select{text-transform:none}button,html input[type=button],input[type=submit]{-webkit-appearance:button;cursor:pointer;box-sizing:border-box;white-space:normal}input[type=date],input[type=email],input[type=number],input[type=password],input[type=text],textarea{-webkit-appearance:none;appearance:none;box-sizing:border-box}button[disabled],html input[disabled]{cursor:default}button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}input{line-height:normal}input[type=checkbox],input[type=radio]{box-sizing:border-box;padding:0}input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button{height:auto}input[type=search]{-webkit-appearance:textfield;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;box-sizing:content-box}input[type=search]::-webkit-search-cancel-button,input[type=search]::-webkit-search-decoration{-webkit-appearance:none}textarea{overflow:auto;box-sizing:border-box;border-color:#ddd}optgroup{font-weight:700}table{border-collapse:collapse;border-spacing:0}td,th{padding:0}blockquote{margin-block-start:0;margin-block-end:0;margin-inline-start:0;margin-inline-end:0}:-webkit-full-screen-ancestor:not(iframe){-webkit-clip-path:initial !important}
html{-webkit-font-smoothing:antialiased; -moz-osx-font-smoothing:grayscale}#b{background-color:#040e21}.ps1{position:relative;margin-top:0}.v1{display:block;vertical-align:top}.s1{pointer-events:none;min-width:1920px;width:1920px;margin-left:auto;margin-right:auto;min-height:496px}.v2{display:inline-block;vertical-align:top}.ps2{position:relative;margin-left:0;margin-top:0}.s2{min-width:1620px;width:1620px;min-height:496px}.s3{min-width:500px;width:500px;min-height:496px;height:496px}.c2{z-index:1;pointer-events:auto}.i1{position:absolute;left:2px;width:496px;height:496px;top:0;border:0}.i2{width:100%;height:100%;display:inline-block;-webkit-transform:translate3d(0,0,0)}.ps3{position:relative;margin-left:420px;margin-top:-326px}.s4{min-width:1200px;width:1200px;min-height:158px}.c3{z-index:2;pointer-events:auto;overflow:hidden;height:158px}.p1{text-indent:0;padding-bottom:0;padding-right:0;text-align:center}.f1{font-family:"Abril Fatface";font-size:70px;font-size:calc(70px * var(--f));line-height:1.901;font-weight:400;font-style:normal;text-decoration:none;text-transform:none;letter-spacing:normal;color:#fff;background-color:initial;text-shadow:none}.c4{display:inline-block;position:relative;margin-left:0;margin-top:0}body{--d:0;--s:1920}@media (max-width:1919px) {.s1{min-width:960px;width:960px;min-height:248px}.s2{min-width:810px;width:810px;min-height:248px}.s3{min-width:250px;width:250px;min-height:248px;height:248px}.i1{left:1px;width:248px;height:248px}.ps3{margin-left:210px;margin-top:-163px}.s4{min-width:600px;width:600px;min-height:79px}.c3{height:79px}.f1{font-size:35px;font-size:calc(35px * var(--f));line-height:1.887}body{--d:1;--s:960}}</style>
<link onload="this.media='all';this.onload=null;" rel="stylesheet" href="css/espace-admin.dc24ee.php" media="print">
</head>
<body id="b">
<script>var p=document.createElement("P");p.innerHTML="&nbsp;",p.style.cssText="position:fixed;visible:hidden;font-size:100px;zoom:1",document.body.appendChild(p);var rsz=function(e){return function(){var r=Math.trunc(1e3/parseFloat(window.getComputedStyle(e).getPropertyValue("font-size")))/10,t=document.body;r!=t.style.getPropertyValue("--f")&&t.style.setProperty("--f",r)}}(p);if("ResizeObserver"in window){var ro=new ResizeObserver(rsz);ro.observe(p)}else if("requestAnimationFrame"in window){var raf=function(){rsz(),requestAnimationFrame(raf)};requestAnimationFrame(raf)}else setInterval(rsz,100);</script>

<div class="ps1 v1 s1">
<div class="v2 ps2 s2 c1">
<div class="v2 ps2 s3 c2">
<picture class="i2">
<source srcset="images/logo-248-1.php 1x, images/logo-496-1.php 2x" type="image/webp" media="(max-width:1919px)">
<source srcset="images/logo-248.php 1x, images/logo-496.php 2x" media="(max-width:1919px)">
<source srcset="images/logo-496-3.php 1x" type="image/webp" media="(min-width:1920px)">
<source srcset="images/logo-496-2.php 1x" media="(min-width:1920px)">
<img src="images/logo-496-2.php" class="un1 i1">
</picture>
</div>
<div class="v2 ps3 s4 c3">
<p class="p1 f1">Espace administrateur</p>
</div>
</div>
</div>
<div class="c4">
</div>
<script>dpth="/";!function(){for(var e=["js/jquery.4f8f40.js","js/espace-admin.dc24ee.js"],n={},s=-1,t=function(t){var o=new XMLHttpRequest;o.open("GET",e[t],!0),o.onload=function(){for(n[t]=o.responseText;s<2&&void 0!==n[s+1];){s++;var e=document.createElement("script");e.textContent=n[s],document.body.appendChild(e)}},o.send()},o=0;o<2;o++)t(o)}();
</script>
</body>
</html>