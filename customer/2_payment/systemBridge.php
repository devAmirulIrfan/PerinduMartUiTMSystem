<?php
session_start();

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
if(isset($_POST["load_user_cart"])){
    $user_id = $_SESSION["user_id"];
    $sql = "SELECT * FROM 3_cart INNER JOIN 2_item ON 3_cart.item_id=2_item.item_id  WHERE user_id='$user_id'";
    load($sql);
}
if(isset($_POST["load_user_payment"])){
    $user_id = $_POST["user_id"];
    $sql = "SELECT * FROM 4_payment WHERE user_id=$user_id";
    load($sql);
    
}
 ?>