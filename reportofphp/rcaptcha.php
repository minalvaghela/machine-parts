<?php
namespace PHPReportMaker12\project1;

// Session
session_start();

// Autoload
include_once "rautoload.php";

// Captcha
$captcha = new Captcha("aftershock");
$_SESSION[SESSION_CAPTCHA_CODE] = $captcha->show();
?>