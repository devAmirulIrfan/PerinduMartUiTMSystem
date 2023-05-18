<html>

<head>
    <?php session_start();?>
    <script src="qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div id="receipt" style="margin-top:1%;margin-left:40%">
        <div id="user_cart"></div><br>
        <div id="user_payment"></div>
        <div id="payment_id"></div>
        <div id="user_id"></div>
        <div id="user_phone_num"></div>
        <div id="amount"></div>
        <div id="payment_status"></div>
        <br><br>
        <div id="qr_code"></div>
    </div>

</body>

</html>
<script>
"use strict";
const loadAjax = function(action, data) {
    var request = new XMLHttpRequest();
    request.open("POST", "systemBridge.php", true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    request.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            const output = this.responseText;
            if (action === "load_user_cart") fetch_user_cart(JSON.parse(output));
            if (action === "load_user_payment") fetch_user_payment(JSON.parse(output));
        }
    };
    request.send(data);
};

const get_user_orders_payment = function() {
    loadAjax("load_user_cart", "load_user_cart=" + "&user_id=" + <?php echo $_SESSION["user_id"]; ?>);
    loadAjax("load_user_payment", "load_user_payment=" + "&user_id=" + <?php echo $_SESSION["user_id"]; ?>);
}
get_user_orders_payment();

const fetch_user_cart = function(data) {
    let output = "";
    let total_price = 0;

    output += `
  <table>
  <tr>
  <th>Item Name</th>
  <th>Item Price</th>
  <th>Quantity</th>
  <th>Total</th>
  <tr>
  `;
    for (let i = 0; i < data.length; i++) {
        total_price += data[i].item_price * data[i].item_quantity;
        output += `
    <tr>
    <td>${data[i].item_name}</td>
    <td>${data[i].item_price}</td>
    <td>${data[i].item_quantity}</td>
    <td>${data[i].item_price * data[i].item_quantity}</td>
    </tr>
    `;
    }
    output += `
  </table>
  `;
    document.getElementById("user_cart").innerHTML = output;
}

const fetch_user_payment = function(data) {

    let output = '',
        payment_id = '',
        user_id = '',
        user_phone_num = '',
        amount = '',
        payment_status = '';



    for (let i = 0; i < data.length; i++) {
        payment_id = data[i].payment_id;
        user_id = data[i].user_id;
        user_phone_num = data[i].user_phone_num;
        amount = data[i].amount;
        payment_status = data[i].payment_status;
    }
    document.getElementById("payment_id").innerHTML = "Payment Id :" + payment_id;
    document.getElementById("user_id").innerHTML = "User Id :" +
        user_id;
    document.getElementById("user_phone_num").innerHTML = "Phone Number :" + user_phone_num;
    document.getElementById("amount").innerHTML = "Total Amount :RM " +
        amount;
    document.getElementById("payment_status").innerHTML = "Status :" +
        payment_status;

    new QRCode(document.getElementById("qr_code"), user_id);
    const element = document.getElementById("receipt");
    html2pdf().from(element).save();
}
</script>