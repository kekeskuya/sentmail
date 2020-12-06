<?php
	class Call {
		private $api;
		private $host = "http://localhost/mailer";
		function __construct($api) {
			$this->api = $api;
		}
		/*
		function login($username, $password) {
			$data = array("username" => $username, "password" => $password);
			$result = $this->api->CallAPI('POST', $this->host . '/api/user/auth', $data);
			return $result;
		}
		*/
		function mail_it($email,$nama,$subjek,$pesan){
			$data = array("email" => $email, "nama" => $nama, "subjek" => $subjek, "pesan" => $pesan, "youremail" => "xxxxxx@gmail.com", "yourpwd" => "xxxxx" );
			 print_r($data);exit;
            $result = $this->api->CallAPI('POST', $this->host.'/kirim.php', $data);
			$json = json_encode($result);


			return $result;			
			
		}
	}
?>