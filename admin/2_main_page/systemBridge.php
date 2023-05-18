<?php
function connect(){
    return mysqli_connect("localhost","root","","isp550");
}
function load($sql,$action){
    $i = 0;
    $result = mysqli_query(connect(),$sql);
    if($action === "total"){
        while($row = mysqli_fetch_assoc($result)){
            $i = $row["amount"];
        }
    }
    if($action =="count"){
        while($row = mysqli_fetch_assoc($result)){
            $i = $i+1;
        }
    }
    echo ($i);
}
if(isset($_POST["load_payment_collection"])){
    $sql = "SELECT *  FROM 4_payment WHERE payment_status='PAID' ";
    load($sql,"total");
}
if(isset($_POST["load_orders"])){

    $sql = "SELECT *  FROM 4_payment WHERE payment_status='PAID' AND state='IN PROGRESS'";
    load($sql,"count");
}
if(isset($_POST["load_pickup"])){

    $sql = "SELECT *  FROM 4_payment WHERE payment_status='PAID' AND state='ORDER COMPLETED'";
    load($sql,"count");
}

 ?>