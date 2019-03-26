<?php
    include("../../require_inc.php");
    require_once ROOTF.'mail/email/sendmail_changepass.php';
    $pass = trim($_POST['mnp']);
    $data['password_m'] = mahoa(trim($_POST['mnp']));
    $id = $_POST['idmm'];
    $s = $h->query("select mother_email,mother_name from children where id=$id");
    $r = $h->fetch_array($s);
    $toemail = trim($r['mother_email']);
    $fullname = trim($r['mother_name']);
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