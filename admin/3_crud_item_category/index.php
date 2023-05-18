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
        <center>Admin CRUD Item Category</center>
    </div>
    <div class="card" style="width:82rem;margin-top:1rem;margin-left:2rem">
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

    </div>
    <div class="card" style="height:29.7rem;width: 30rem;margin-left: 31rem;margin-top: 1rem;">
        <button style="width:6rem;" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal56">
            Create</button>
        <br>
        <center>
            <input style="width:90%" class="form-control" type="text" id="search_item_category"
                placeholder="Search Category" onkeyup="search_item_category()">
        </center>
        <!-- <div class="card-body"> -->
        <div style="overflow:scroll;" id="fetch_item_category"></div>
        <!-- </div> -->
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div><br>
                        <input type="hidden" id="edit_item_category_id"><br>
                        <label>Edit Category Name</label><br>
                        <input type="text" id="edit_item_category_name">
                        <button data-bs-dismiss="modal" class="btn btn-danger" onclick="clearInput()">Cancel</button>
                        <br><br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="save_edit_item_category()" class="btn btn-primary"
                        data-bs-dismiss="modal">Save changes</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal Create -->
    <div class="modal fade" id="exampleModal56" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <label>Category Name</label><br>
                        <input type="text" id="create_item_category_name">
                        <button class="btn btn-danger" onclick="clearInput()" data-bs-dismiss="modal"
                            class="btn btn-primary">Cancel</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="get_create_item_category()" data-bs-dismiss="modal"
                        class="btn btn-primary">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>