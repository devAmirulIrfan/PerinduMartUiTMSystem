<html>

<head>
    <script src="script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="alert alert-primary" role="alert">
        <center>Admin Login</center>
    </div>
    <a style="margin-left:3px;margin-top:2px;" type="button" class="btn btn-warning" href="../../">Home Page</a>


    <div class="card" style="width: 18rem;margin-left: 33rem;margin-top: 10rem;">
        <div class="card-body">
            <center>
                <p>
                <h3>Admin Login</h3>
                </p>
            </center>
            <label>Username :</label>
            <input class="form-control" type="text" id="username">
            <br>
            <label>Password :</label>
            <input class="form-control" type="password" id="password">
            <br><br>
            <center>
                <button class="btn btn-success" onclick="login()" type="button" id="login">Admin Login</button>
            </center>
        </div>
    </div>
</body>

</html>