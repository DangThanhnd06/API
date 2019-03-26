<?php
@session_start();

//$langToSet = (!isset($_GET['set'])) ? 'en' : $_GET['set'];
if (isset($_GET['set'])) $langToSet = $_GET['set'];
if(!in_array($langToSet, array('vn', 'en', 'cn', 'no',))){
	$langToSet = 'vn';
} else $langToSet = $_REQUEST['set'];

$_SESSION['lang'] = strtolower($langToSet);

if(!isset($_SERVER['HTTP_REFERER'])){
	header('location: http://localhost/sunrise/');
} else {
	header('location: '.$_SERVER['HTTP_REFERER']);
}
?>