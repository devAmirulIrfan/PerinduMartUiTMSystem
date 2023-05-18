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
    <?php 
            if(isset($_POST["submit"])){
                session_start();
                // echo ($_POST["phone_num"]."<br> ".$_POST["user_id"]);

                $_SESSION["phone_num"] = $_POST["phone_num"];
                $_SESSION["user_id"] = $_POST["user_id"];
            }

        ?>
    <div class="alert alert-primary" role="alert">
        <center>User Home Page</center>
    </div>

    <div class="card" style="height:35rem;width:40rem;margin-left:1rem;">
        <br>
        <!-- <div class="card-body"> -->
        <center><input style="width:90%;" class="form-control" type="text" id="search_item" onkeyup="search_item()"
                placeholder="Search Item">
        </center><br>
        <div id="btn_search_item"></div>
        <div style="overflow:scroll;" id="fetch_item"></div>
        <!-- </div> -->
    </div>

    <div style="height:35rem;width:40rem;margin-left:43rem;margin-top:-35rem;" class="card"
        style="height:35rem;width:40rem;margin-left:1rem;">
        <div id="user_cart"></div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Customer Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="show_price"></div>
                    <form action="../2_payment/" method="post">
                        <input type="hidden" id="name" name="name"><br>
                        <input class="btn btn-success" type="submit" name="submit" value="Pay Now">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>