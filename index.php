<?php
$userid   = isset($_GET['nomer'])               ? $_GET['nomer']               : null;
$message   = isset($_GET['pesan'])               ? $_GET['pesan']               : null;
$url = "https://pesan.inipulsa.my.id:443/sms.php?c=sms&a=kirim";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "user-agent: Mozilla/5.0 (Linux; Android 10; M2010J19SG Build/QKQ1.200830.002; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/96.0.4664.45 Mobile Safari/537.36",
   "content-type: application/x-www-form-urlencoded"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = 'phone='.$userid.'&message='.$message.'&submit=1';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($curl);

$dom = new DOMDocument();
@$dom->loadHTML($response);

$data = [];
$json2 = [
    "message"=>"Proses pengiriman 2 menit"];
    echo json_encode($json2);

?>

