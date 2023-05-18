<?php
session_start();
$user_id = $_SESSION["user_id"];
$user_phone_num = $_SESSION["phone_num"];
$amount = $_POST["name"];
 
function connect(){
    return mysqli_connect("localhost","root","","isp550");
}
$today = date("Y-m-d");
$sql = "INSERT INTO 4_payment(payment_date,user_id,user_phone_num,amount,payment_status,state) VALUES('$today','$user_id','$user_phone_num','$amount','UNPAID','IN PROGRESS')";
if(connect()->query($sql)){
    $some_data = array(
        'userSecretKey'=> 'tkou3br8-1l27-ug81-7n9n-wxc7ukr8cme7',
        'categoryCode'=> 'incj29ws',
        'billName'=> 'TEST BILL',
        'billDescription'=> 'TEST BILL',
        'billPriceSetting'=>1,
        'billPayorInfo'=>0,
        'billAmount'=>$amount*100,
        'billReturnUrl'=>'http://127.0.0.1/isp550/customer/2_payment/return_url.php',
        'billCallbackUrl'=>'',
        'billExternalReferenceNo'=>$user_id,
        'billTo'=>'Amirul',
        'billEmail'=>'arfankareem1002@gmail.com',
        'billPhone'=>'0196643494',
        'billSplitPayment'=>0,
        'billSplitPaymentArgs'=>'',
        'billPaymentChannel'=>0,
      
      );

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_URL, 'https://dev.toyyibpay.com/index.php/api/createBill');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);
    
    $result = curl_exec($curl);
    $info = curl_getinfo($curl);
    curl_close($curl);
    $obj = json_decode($result);
    $obj = json_decode($result,true);
    $billcode=$obj[0]['BillCode'];

        // echo $billcode;

    header("Location:https://dev.toyyibpay.com/".$billcode);
}
 
 ?>