<?php
# DB_CONNECTION.PHP
# Database connection
// Database info
if (!defined('INDEX')) exit;
//include_once("common/functions_mysql.php");
$database['server'] = "localhost"; // host
$database['user'] = "sunrisekidz"; //  username access to database
$database['pwd'] = "#sunrisekidz123#"; // password access to databse 
$database['name'] = "sunrisekidz"; // database name
// Create connection
$DB = new mysql();
$con=$DB->connect($database['server'],$database['user'],$database['pwd'],$database['name']);
$DB->query("SET NAMES 'utf8'");
$adminemail = "hoai@enablecode.vn";
?>