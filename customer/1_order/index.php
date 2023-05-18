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
        <center>User Home Page</center>
    </div>
    <a style="margin-left:3px;margin-top:0px;" type="button" class="btn btn-warning" href="../../">Home Page</a>
    <div class="card" style="width: 18rem;margin-left: 33rem;margin-top: 10rem;">
        <div class="card-body">
            <center>
                <p>
                <h3>Welcome to Perindu Mart!</h3>
                </p>
            </center>
            <form action="main_order_page.php" method="POST">
                <label>Enter Your Phone number</label>
                <input class="form-control" type="text" name="phone_num" placeholder="Eg:60196643494">
                <input type="hidden" name="user_id" value="<?php echo rand(); ?>">
                <br><br>
                <center>
                    <input class="btn btn-success" type="submit" value="Lets Go!" name="submit">
                </center>

            </form>

        </div>
    </div>
</body>

</html>