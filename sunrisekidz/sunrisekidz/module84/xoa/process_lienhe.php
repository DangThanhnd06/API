<?php
    include('../require_inc.php');
	@session_start();
    include("smtp.php");
	$email = trim(addslashes($_POST['email']));
	$hoten = trim(addslashes($_POST['hoten']));
    $chude = trim(addslashes($_POST['chude']));
	$nd = trim(addslashes($_POST['nd']));
	$body .= "Họ tên: ".$hoten."<br />\n";
	$body .= "Email: ".$email."<br />\n";
    $body .= "Chủ đề liên hệ: ".$chude."<br />\n";
	$body .= "Nội dung liên hệ: ".$nd."<br />\n";
    SendMail($email,"info@nguyenquoc.com.vn","Liên hệ từ: ".$hoten, $body);
	echo '1';
?>
