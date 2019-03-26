<?php
    // usage
	function registerMail (
			  $toEmail,            // Email address of recipient
			  $toName,             // Name of recipient
			  $fromEmail,          // Email Address of sender
			  $fromName,           // Name of sender 
			  $emailSubject,       // Subject of email
			  $emailTemplate      // email Templates found under WEB_ROOT/email-templates/ folder
 
    ) {
		require_once ROOT_FOLDER.'mail/php-mailer/PHPMailerAutoload.php';        
		$mail = new PHPMailer();

		// set up email recipients and sender
        $mail->CharSet = "UTF-8";
		$mail->From     = $fromEmail;
		$mail->FromName = $fromName;
		$mail->Subject  = $emailSubject;
		$mail->addAddress( $toEmail, $toName );
		$mail->AddReplyTo($fromEmail,$fromName);
		$mail->isHTML( true );
/*
	// Other SETTINGS TO SETUP IN THE FUTURE
		$mail->Host     = 'smtp1.m-powered.org;smtp2.m-powered.org';
		$mail->Mailer   = 'smtp';            
		$mail->SMTPDebug = 3;            
		$mail->isSMTP();
		$mail->Host = "smtp.gmail.com";            
		$mail->SMTPAuth = true;
		$mail->Username = "name@gmail.com";                 
		$mail->Password = "super_secret_password";            
		$mail->SMTPSecure = "tls";            
		$mail->Port = 587;
*/

		//read the email template file
		$message = '';
		$template_file = ROOT_FOLDER."mail/email/templates/" . $emailTemplate ;
		$fh = fopen($template_file, "r");	
		
		while(!feof($fh)) {
			$body = fgets($fh);
            $body = str_replace( "{dear}", _dear, $body);
			$body = str_replace( "{first_name}", $toName, $body);
            $body = str_replace( "{camondkxe}", _camondkgarage, $body);
            /*
            $body = str_replace( "{hoanthanhdk}", _hoanthanhdk, $body);
			$body = str_replace( "{activation_code}", $activation_code, $body);
            $body = str_replace( "{thongtindn}", _thongtindn, $body);	
            $body = str_replace( "{email}", $toEmail, $body);
            $body = str_replace( "{matkhau}", _password, $body);
            $body = str_replace( "{password}", $mkhau, $body);
            */
            $body = str_replace( "{work23}", _work23, $body);
            $body = str_replace( "{hoptac}", _hoptacthanhcong, $body);
            $body = str_replace( "{trantrong}", _trantrong, $body);
            $body = str_replace( "{cluboto}", _clotvn, $body);
            #$body = str_replace( "{logoo}", 'logo_'.$lang.'.png', $body);		
			$message .=$body;
		}
		if ( empty($msgSuccess) ) {
			 $msgSuccess = 'Mail has been sent';
		}
		if ( empty($msgFailed) ) {
			 $msgFailed = 'There has been an error sending email';
		}
		$mail->Body = $message;    
		if(!$mail->send()){
			  echo $msgFailed;
		} else {
			  echo '';
		}
		$mail->clearAddresses();  
	}