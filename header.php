<?php
if(!isset($_SESSION['id']))
    {
        session_start();
    }
    else
    {
        session_unset();
        session_start();
    }
    error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
<title>Stok</title>
<meta charset="utf-8">
<meta name=viewport content="width=device-width initial-scale=1">
<link rel="stylesheet" type="text/css" href="stokstyle.css">
</head>
<body class="arkaplan">
