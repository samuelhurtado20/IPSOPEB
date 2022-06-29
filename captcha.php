<?php
session_start();
include_once ('js/jpgraph_antispam-digits.php');
$spam = new AntiSpam();
$_SESSION['tmptxt']= $spam->Rand(1);
$spam->Stroke();
?>