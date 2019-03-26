<?php 
@session_start();
ob_start();
define('INDEX',true);
error_reporting(E_ALL & ~E_NOTICE);
if (isset($_GET['set'])) $_SESSION['lang'] = $_GET['set'];
if (!isset($_SESSION['lang'])  || !in_array($_SESSION['lang'], array('vn', 'en'))){
	$_SESSION['lang'] = 'vn';
}
$lang =  $_SESSION['lang'];
// Include required files
include("define/define.php");
include("define/define_$lang.php");
include("common/functions_mysql.php");  // Mysql functions
include("common/functions_common.php");  // Common functions
include("common/function.php"); // Functions
include("config/db_connection.php");  // DB connections
$h = new mysql();
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>