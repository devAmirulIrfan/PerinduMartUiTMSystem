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
    $sql = "SELECT * FROM 1_item_category ";
    load($sql);  
}
if(isset($_POST["search"])){
    $search = $_POST["search"];
    $sql = "SELECT * FROM 1_item_category WHERE item_category_name LIKE '%$search%'  ";
    load($sql);  
}
if(isset($_POST["edit"])){
    $edit = $_POST["edit"];
    $sql = "SELECT * FROM 1_item_category WHERE item_category_id ='$edit' ";
    load($sql);
}
if(isset($_POST["create"])){
    $item_category_name = $_POST["item_name"];
    $sql ="INSERT INTO 1_item_category(item_category_name) VALUES('$item_category_name') ";
    connect()->query($sql);
}
if(isset($_POST["save"])){
    $item_category_id = $_POST["save_category_id"];
    $item_category_name = $_POST["save_category_name"];
    $sql = "UPDATE 1_item_category SET item_category_name = '$item_category_name' WHERE item_category_id = $item_category_id  ";
    connect()->query($sql);
}

?>