<?php

	$id = p('emailid');

	$mail = isle("SELECT * FROM mail_sistem WHERE id='$id'", 1);

	if(!empty($mail)){
		require ARACLAR.'PHPMailerAutoload.php';
		$emails  = new PHPMailer();
		$emails->IsSMTP();
		$emails->SMTPAuth     = true;
		$emails->Host         = "mail.localdriver.online";
		$emails->Port         = 25;
		$emails->Username     = "support@localdriver.online";
		$emails->Password     = "Grandoria2015";
		$emails->IsHTML(true);
		$emails->From         = $mail['froma'];
		$emails->FromName     = $mail['fromname'];
		$emails->AddAddress($mail['addaddress']);
		$emails->Subject      = $mail['subject'];
		$emails->Body 		 = 	$mail['body'];
		$emails->CharSet 	= "utf-8";		

		if($emails->Send()){
			isle("UPDATE mail_sistem SET durum=1 WHERE id='$id'", 2);

				$gel=isle("SELECT * FROM mail_sistem WHERE durum=1");
				$zaman=strtotime("now")-3600*25;
				foreach($gel as $geldi){
					if($geldi['tarih_strtotime'] < $zaman){
						$idim=$geldi['id'];
						isle("DELETE FROM mail_sistem WHERE id=$idim", 3);
					}
				}
		}else{
			isle("UPDATE mail_sistem SET durum=2 WHERE id='$id'", 2);
		}
	}