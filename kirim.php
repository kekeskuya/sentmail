<?php
print_r($_POST);exit;	
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


require_once "library/PHPMailer.php";
require_once "library/Exception.php";
require_once "library/OAuth.php";
require_once "library/POP3.php";
require_once "library/SMTP.php";
require_once "library/SMTP.php";
 
$response = array("error" => FALSE);

	
	if (isset($_POST['email']) && isset($_POST['nama']) && isset($_POST['subjek']) && isset($_POST['pesan']) && isset($_POST['youremail']) && isset($_POST['yourpwd']) ) {
		
	  print_r('masuk');exit;	
	  
	  $mail = new PHPMailer;
	  $mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	   );
	    
		$nama = $_POST['nama']; $email = $_POST['email']; $subject = $_POST['subjek']; $message = $_POST['pesan']; $sender = $_POST['youremail']; $sendpwd = $_POST['yourpwd'];
	   
		$mail->SMTPDebug = 3;                               
		$mail->isSMTP();            
		$mail->Host = "tls://smtp.gmail.com"; //host mail server
		$mail->SMTPAuth = true;                          
		$mail->Username = $sender;   //nama-email smtp          
		$mail->Password = $sendpwd;           //password email smtp
		$mail->SMTPSecure = "tls";                           
		$mail->Port = 587;                                   
	    $mail->From = $sender; //email pengirim
		$mail->FromName = "Ini adalah API Mail"; //nama pengirim
	 	$mail->addAddress($email, $nama); //email penerima
	 	$mail->isHTML(true);
	 	$mail->Subject = $subject; //subject
		$mail->Body    = $message; //isi email
		$mail->AltBody = "PHP mailer"; //body email (optional)
	
	
		if(!$mail->send()) 
		{
			/*
			$db = pg_connect("host=localhost port=5432 dbname=maildb user=root password=admin123");
			$query = "INSERT INTO mail_log VALUES ('$sender','$email',
			'$subject','gagal',current_timestamp)";
			$result = pg_query($query); 
			*/
			echo "Mailer Error: " . $mail->ErrorInfo;
			$response["error"];
			//$response["error_msg"] = "Message has been sent successfully";
		    echo json_encode($response);
		} 
		else 
		{
			/*
			$db = pg_connect("host=localhost port=5432 dbname=maildb user=root password=admin123");
			$query = "INSERT INTO mail_log VALUES ('$sender','$email',
			'$subject','sukses',current_timestamp)";
			$result = pg_query($query); 
			*/
			
			//echo "Message has been sent successfully";
			$response["error_msg"] = "Message has been sent successfully";
		    echo json_encode($response);
			
			
		}
	}else {
		$response["error"] = TRUE;
		$response["error_msg"] = "Parameter ada yang kurang";
		echo json_encode($response);
	}

?>
