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

if(isset($_POST["load"])){
    $sql = "SELECT * FROM 2_item INNER JOIN 1_item_category ON 2_item.item_category_id = 1_item_category.item_category_id ";
    load($sql); 
}
if(isset($_POST["search"])){
    $search = $_POST["search"];
    $sql = "SELECT * FROM 2_item INNER JOIN 1_item_category ON 2_item.item_category_id = 1_item_category.item_category_id WHERE 2_item.item_name LIKE '%$search%'";
    load($sql);
}
if(isset($_POST["load_category"])){
    $sql = "SELECT * FROM 1_item_category ";
    load($sql);  
}
if(isset($_POST["search_item_category"])){
    $item_category_id = $_POST["item_category_id"];
    $sql = "SELECT * FROM 2_item INNER JOIN 1_item_category ON 2_item.item_category_id = 1_item_category.item_category_id WHERE 2_item.item_category_id = '$item_category_id'";
    load($sql);
}
if(isset($_POST["edit"])){
    $item_id = $_POST["item_id"];
    $sql = "SELECT * FROM 2_item INNER JOIN 1_item_category ON 2_item.item_category_id = 1_item_category.item_category_id  WHERE 2_item.item_id ='$item_id' ";
    load($sql);
}
if(isset($_POST["create"])){
    $item_category_id = $_POST["item_category_id"];
    $item_name = $_POST["item_name"];
    $item_price = $_POST["item_price"];
    
    echo($item_category_id.$item_name.$item_price);
    $sql ="INSERT INTO 2_item(item_category_id,item_name,item_price) VALUES('$item_category_id','$item_name','$item_price') ";
    connect()->query($sql);
}
if(isset($_POST["save"])){
    $item_id = $_POST["item_id"];
    $item_category_id = $_POST["item_category_id"];
    $item_name = $_POST["item_name"];
    $item_price = $_POST["item_price"];
    $sql = "UPDATE 2_item SET item_category_id = '$item_category_id' , item_name = '$item_name' , item_price = '$item_price' WHERE item_id = $item_id  ";
    connect()->query($sql);
}
if(isset($_POST["delete"])){
    $item_id = $_POST["item_id"];
    $sql = "DELETE FROM 2_item WHERE item_id = $item_id ";
    connect()->query($sql);
}
?>