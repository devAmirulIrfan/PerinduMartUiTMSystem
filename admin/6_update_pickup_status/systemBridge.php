<?php
function connect(){
    return mysqli_connect("localhost","root","","isp550");
}
function load($sql){
    $result = mysqli_query(connect(),$sql);
    while($row = mysqli_fetch_assoc($result)){
        $json_array[] = $row;
    }
    echo json_encode($json_array);
}
if(isset($_POST["load_payment"])){
 $sql = "SELECT * FROM 4_payment WHERE state = 'ORDER COMPLETED' AND payment_status = 'PAID'  ";
 load($sql);
}
if(isset($_POST["search_payment"])){
    $payment_id = $_POST["payment_id"];
    $sql = "SELECT * FROM 4_payment WHERE state = 'ORDER COMPLETED' AND payment_id LIKE '%$payment_id%' AND payment_status = 'PAID'  ";
    load($sql);  
}
if(isset($_POST["view_order"])){
    $user_id = $_POST["user_id"];
    $sql = "SELECT * FROM 3_cart INNER JOIN 2_item ON 3_cart.item_id=2_item.item_id  WHERE user_id='$user_id' ";
    load($sql);
}
if(isset($_POST["view_payment"])){
    $user_id = $_POST["user_id"];
    $sql = "SELECT * FROM 4_payment WHERE user_id=$user_id";
    load($sql);    
}
if(isset($_POST["verify_pick_up_status"])){
    $payment_id = $_POST["payment_id"];
    $sql = "UPDATE 4_payment SET state='PICKED UP' WHERE payment_id=$payment_id";
    connect()->query($sql);   
}

 ?>