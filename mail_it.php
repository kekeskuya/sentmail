<?php
include 'API.php';
include 'call.php';
$API = new API();
$Call = new Call($API);

$email = @$_POST['nama'];
$nama = @$_POST['email'];
$subjek = @$_POST['subjek'];
$pesan = @$_POST['pesan'];


// To Proses Login
$result = $Call->mail_it($email,$nama,$subjek,$pesan);

// output json
$json = json_encode($result);

// output string
echo $result;

?>