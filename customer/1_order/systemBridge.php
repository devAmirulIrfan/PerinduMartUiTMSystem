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
if(isset($_POST["load_category"])){
    $sql = "SELECT * FROM 1_item_category ";
    load($sql);  
}
if(isset($_POST["load"])){
    $sql = "SELECT * FROM 2_item INNER JOIN 1_item_category ON 2_item.item_category_id = 1_item_category.item_category_id ";
    load($sql); 
}
if(isset($_POST["search"])){
    $search = $_POST["search"];
    $sql = "SELECT * FROM 2_item INNER JOIN 1_item_category ON 2_item.item_category_id = 1_item_category.item_category_id WHERE 2_item.item_name LIKE '%$search%'";
    load($sql);
}
if(isset($_POST["search_item_category"])){
    $item_category_id = $_POST["item_category_id"];
    $sql = "SELECT * FROM 2_item INNER JOIN 1_item_category ON 2_item.item_category_id = 1_item_category.item_category_id WHERE 2_item.item_category_id = '$item_category_id'";
    load($sql);
}
if(isset($_POST["load_cart"])){
    $user_id = $_SESSION["user_id"];
    $sql = "SELECT * FROM 3_cart INNER JOIN 2_item ON 3_cart.item_id=2_item.item_id  WHERE user_id='$user_id'";
    load($sql);
}
if(isset($_POST["add_to_cart"])){
    $user_id = $_SESSION["user_id"];
    $item_id = $_POST["item_id"];
    $check = "SELECT * FROM 3_cart WHERE user_id=$user_id AND item_id=$item_id ";
    $result_check = mysqli_query(connect(),$check);
    if(mysqli_fetch_assoc($result_check)){
        echo "error";
    }
    else{
        $sql = "INSERT INTO 3_cart(user_id,item_id,item_quantity) VALUES('$user_id','$item_id','1') ";
        if(connect()->query($sql)){
            $sql = "SELECT * FROM 3_cart";
            load($sql);
        }
    }    
}
if(isset($_POST["edit_item_quantity"])){
    $user_id = $_SESSION["user_id"];
    $item_id = $_POST["item_id"];
    $method = $_POST["method"];
    
    if($method == "increment"){
        $sql = "UPDATE 3_cart SET item_quantity=item_quantity+1 WHERE user_id=$user_id AND item_id=$item_id ";
        connect()->query($sql);
    }
    if($method == "decrement"){
        $sql = "UPDATE 3_cart SET item_quantity=item_quantity-1 WHERE user_id=$user_id AND item_id=$item_id ";
        connect()->query($sql);
    }
}
if(isset($_POST["remove_item_from_cart"])){
    $user_id = $_SESSION["user_id"];
    $item_id = $_POST["item_id"];
    $sql = "DELETE FROM 3_cart WHERE user_id=$user_id AND item_id = $item_id  ";
    connect()->query($sql);
}
?>