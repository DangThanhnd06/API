<?php
    include("../../require_inc.php");
    require_once ROOTF.'mail/email/sendmail_changepass.php';
    $pass = trim($_POST['fnp']);
    $data['password_f'] = mahoa(trim($_POST['fnp']));
    $id = $_POST['idff'];
    $s = $h->query("select father_email,father_name from children where id=$id");
    $r = $h->fetch_array($s);
    $toemail = trim($r['father_email']);
    $fullname = trim($r['father_name']);
    $ss = $h->update($data,"children"," where id=$id");
    if($toemail != ''){
        changepass_mail (
			$toemail, 
			$fullname, 
			"sunrisekidz.vn2016@gmail.com",
			"Sunrise Kidz", 
			_titlemailcp, 
			"changepass.html",
            $pass
        );
    } 
    echo '1';
?>