<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="alert alert-primary" role="alert">
        <center>Admin Home Page</center>
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
    <div class="card" style="height:23rem;width: 20rem;margin-left: 33rem;margin-top: 5rem;">
        <div class="card-body">
            <div class="alert alert-success" role="alert">
                Welcome Admin!
            </div><br>

            <div class="alert alert-primary" role="alert">
                <div id="payment_collection"></div>
            </div>
            <div class="alert alert-primary" role="alert">
                <div id="total_orders"></div>
            </div>
            <div class="alert alert-primary" role="alert">
                <div id="total_pickups"></div>
            </div>
        </div>
    </div>

</body>

</html>
<script src="script.js"></script>