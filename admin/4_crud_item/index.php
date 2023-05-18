<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="script.js"></script>
</head>

<body>
    <div class="alert alert-primary" role="alert">
        <center>Admin CRUD Items</center>
    </div>
    <div class="card" style="width:82rem;margin-top:-0.3rem;margin-left:2rem">
        <div class="card-body">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../7_payment_collection">Payment Collection</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../2_main_page">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../3_crud_item_category">Item Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../4_crud_item">Item List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../5_update_item_status">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../6_update_pickup_status">Pick up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../1_login">Logout</a>
                </li>
            </ul>
        </div>
    </div>

    <div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCreate" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <label>Item Name</label>
                            <input type="text" id="create_item_name"><br><br>
                            <label>Item Category</label>
                            <select id="create_item_category">
                                <?php
                                    $conn = mysqli_connect("localhost","root","","isp550");
                                    $sql = "SELECT * FROM 1_item_category";
                                    $result = mysqli_query($conn,$sql);
                                    while($row = mysqli_fetch_assoc($result)){?>
                                <option value="<?php echo $row["item_category_id"]?>">
                                    <?php echo $row["item_category_name"]?></option>
                                <?php
            }
            ?>
                            </select><br><br>
                            <label>Item Price</label>
                            <input type="number" id="create_item_price"><br><br>
                            <button data-bs-dismiss="modal" class="btn btn-danger" onclick="reset()">Cancel</button>
                        </div><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button data-bs-dismiss="modal" onclick="get_create_item()" type="button"
                            class="btn btn-success">Create</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal edit -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <input type="hidden" id="edit_item_id"><br><br>
                            <label>Item Name</label>
                            <input type="text" id="edit_item_name"><br><br>
                            <label>Item Category</label>
                            <select id="edit_item_category">
                                <option value=""></option>
                                <?php
                            $conn = mysqli_connect("localhost","root","","isp550");
                            $sql = "SELECT * FROM 1_item_category";
                            $result = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_assoc($result)){?>
                                <option value="<?php echo $row["item_category_id"]?>">
                                    <?php echo $row["item_category_name"]?></option>
                                <?php
            }
            ?>
                            </select><br><br>
                            <label>Item Price</label>
                            <input type="text" id="edit_item_price"><br><br>
                            <button class="btn btn-danger" onclick="reset()" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" onclick="save_edit_item()" data-bs-dismiss="modal"
                            class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" style="height:30rem;width:40rem;margin-top:1rem;margin-left:22rem">
            <!-- <div class="card-body"> -->
            <button style="width:5rem;" type="button" class="btn btn-success" data-bs-toggle="modal"
                data-bs-target="#exampleModalCreate">
                Create
            </button><br><br>
            <center>
                <div>
                    <input style="width:90%" class="form-control" type="text" id="search_item" onkeyup="search_item()"
                        placeholder="Search Item">
                    <br>
                    <div id="btn_search_item"></div>
                </div>
            </center>
            <!-- </div> -->
            <div style="overflow:scroll;" id="fetch_item"></div>

        </div>

</body>

</html>