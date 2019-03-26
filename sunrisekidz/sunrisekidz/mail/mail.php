<?php
    include("../define/define.php");
    include("../require_inc.php");
    require_once 'email/sendmail_changepass.php';				
    
    $email = 'hoai.pham1218@yahoo.com';
    $fullname = 'Hoai Pham';
    $add = 'admin';
    $pass = '123456';
    changepass_mail (
			$email, 
			$fullname, 
			"vy@enablecode.vn",
			"Sunrise Kidz", 
			_titlemailcp, 
			"changepass.html",
            $pass
   );
?>