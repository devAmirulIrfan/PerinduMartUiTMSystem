<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
    <div class="alert alert-primary" role="alert">
        <center>Admin View Payment Collection</center>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Filter Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label>From</label><br>
                    <input type="date" id="date1"><br>
                    <label>To</label><br>
                    <input type="date" id="date2"><br><br>
                    <button onclick="get_filter_payment()" class="btn btn-success"
                        data-bs-dismiss="modal">Search</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <br>
    <center>
        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">Filter Date</button>
        <button onclick="get_today_payment()" class="btn btn-warning">Today</button>
        <button onclick="get_all_time_payment()" class="btn btn-info">All Time</button>
        <button onclick="printToPDF()" class="btn btn-success">Print PDF</button>
    </center>
    <br>
    <div id="pdf">
        <center>
            <div id="description"></div>
        </center>
        <div id="total_amount"></div>
        <div id="fetch_result"></div>
    </div>


</body>

</html>
<script src="script.js"></script>