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
if(isset($_POST["load_filter_payment"])){
    $date1 = $_POST["date1"];
    $date2 = $_POST["date2"];

    $sql = "SELECT * FROM 4_payment WHERE payment_status='PAID' AND payment_date BETWEEN '$date1' AND '$date2' ORDER BY payment_date ASC ";
    load($sql);
}
if(isset($_POST["load_today_payment"])){
    $today = date("Y-m-d");
    $sql = "SELECT * FROM 4_payment WHERE payment_status='PAID' AND payment_date='$today'";
    load($sql);
}
if(isset($_POST["load_all_time_payment"])){
    $sql = "SELECT * FROM 4_payment WHERE payment_status='PAID'";
    load($sql);
}
?>