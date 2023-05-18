<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="instascan.min.js"></script>
</head>

<body>
    <div class="alert alert-primary" role="alert">
        <center>Admin Edit Pickup</center>
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
    <div class="card" style="height:30rem;width:47rem;margin-left:2rem;margin-top:1rem;">
        <!-- <div class="card-body"> -->
        <video id="preview" style="width:300px;height200px;"></video><br>
        <center><input style="width:90%;" class="form-control" type="text" id="search_payment"
                onkeyup="get_search_payment()" placeholder="Search Payment ID"></center><br>
        <div style="overflow:scroll;" id="fetch_payment"></div>
        <!-- </div> -->

    </div>

    <div class="card" style="height:30rem;width:34rem;margin-left:50rem;margin-top:-30rem;">
        <div class="card-body" style="overflow:scroll;">
            <div id="user_order"></div>
            <br><br>
            <div id="payment_id"></div>
            <div id="user_id"></div>
            <div id="user_phone_num"></div>
            <div id="amount"></div>
            <div id="payment_status"></div>
            <div id="btn"></div>
        </div>
    </div>
</body>
<script src=" script.js"></script>

</html>