<?php



$some_data = array(
    'billCode' =>  $_GET['billcode']



  );

  

  $curl = curl_init();

  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_URL, 'https://dev.toyyibpay.com/index.php/api/getBillTransactions');
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);

  
  $result = curl_exec($curl);
  $info = curl_getinfo($curl);
  curl_close($curl);

  $data = json_decode($result,true);

  // print_r($data);

  // Array ( [0] => Array ( [billName] => TEST BILL [billDescription] => TEST BILL [billTo] => arfan [billEmail] => ewtkdsystems@gmail.com [billPhone] => 0196643494 [billStatus] => 1 [billpaymentStatus] => 4 [billpaymentChannel] => FPX [billpaymentAmount] => 10.00 [billpaymentInvoiceNo] => TP97625094224410110122 [billSplitPayment] => 0 [billSplitPaymentArgs] => [billpaymentSettlement] => Pending Settlement [billpaymentSettlementDate] => 0000-00-00 00:00:00 [billPaymentDate] => 11-01-2022 10:44:22 [billExternalReferenceNo] => 747301378 ) ) 
  
  foreach($data as $row){
    $status = $row["billpaymentStatus"];
    $user_id = $row["billExternalReferenceNo"];
  }

  echo $status." ".$user_id;

  if($status == 1){
    echo $status."-".$user_id;
    session_start();

    $conn = mysqli_connect("localhost","root","","isp550");

    $sql = "UPDATE 4_payment SET payment_status ='PAID' WHERE user_id=$user_id ";

    

    if($conn->query($sql)===TRUE){
      echo("records updated");
      $_SESSION["user_id"] = $user_id;
      header("Location:rezeipt.php");
    }
  }



    ?>