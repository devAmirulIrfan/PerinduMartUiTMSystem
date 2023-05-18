"use strict";
var describe;

document.getElementById("");

const loadAjax = function (action, data, phone_num) {
  var request = new XMLHttpRequest();
  request.open("POST", "systemBridge.php", true);
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  request.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      const output = this.responseText;
      if (action === "load_payment") {
        try {
          fetch_payment(JSON.parse(output));
        } catch (err) {
          err = "";
          logError("fetch_payment", "Congratulations All Orders Picked Up");
        }
      }
      if (action === "search_payment") {
        try {
          fetch_payment(JSON.parse(output));
        } catch (err) {
          err = "";
          logError("fetch_payment", "No Data Available");
        }
      } //fetch_payment(JSON.parse(output));
      if (action === "view_order") fetch_user_order(JSON.parse(output));
      if (action === "view_payment") fetch_user_payment(JSON.parse(output));
      if (action === "verify_pick_up_status") fetch_verify_pick_up_status();
    }
  };
  request.send(data);
};

const logError = function (id, message) {
  document.getElementById(
    `${id}`
  ).innerHTML = `<div class="alert alert-warning" role="alert"><center>${message}</center></div>`;
};

let scanner = new Instascan.Scanner({
  video: document.getElementById("preview"),
});
scanner.addListener("scan", function (content) {
  console.log(content);
  get_view_cart_payment(content);
});
Instascan.Camera.getCameras()
  .then(function (cameras) {
    if (cameras.length > 0) {
      scanner.start(cameras[0]);
    } else {
      console.error("No cameras found.");
    }
  })
  .catch(function (e) {
    console.error(e);
  });

const get_search_payment = function () {
  const payment_id = document.getElementById("search_payment").value;
  if (payment_id)
    loadAjax("search_payment", "search_payment=" + "&payment_id=" + payment_id);
  else get_payment();
};

const get_payment = () => loadAjax("load_payment", "load_payment=");
get_payment();

const fetch_payment = function (data) {
  let output = "";

  output += `
  <table class="table">
  <tr>
  <th>No</th>
  <th>Payment Id</th>
  <th>User Id</th>
  <th>Amount RM</th>
  <th>State</th>
  <th></th>
  <th></th>
  </tr>
  `;

  for (let i = 0; i < data.length; i++) {
    output += `
      <tr>
      <td>${i + 1}</td>
      <td>${data[i].payment_id}</td>
      <td>${data[i].user_id}</td>
      <td>${data[i].amount}</td>
      <td>${data[i].state}</td>
      <td><button class="btn btn-warning" onclick="get_notify_user(${
        data[i].user_phone_num
      })">Notify Again</button></td>
      <td><button class="btn btn-info"  onclick="get_view_cart_payment(${
        data[i].user_id
      })">View</button></td>
      </tr>
      `;
    document.getElementById("fetch_payment").innerHTML = output;
  }
};

const get_notify_user = (phone_num) =>
  window.open(
    `https://api.whatsapp.com/send?phone=${phone_num}&text=Your%20order%20is%20Completed`
  );

const get_view_cart_payment = function (data) {
  loadAjax("view_order", "view_order=" + "&user_id=" + data);
  loadAjax("view_payment", "view_payment=" + "&user_id=" + data);
};

const fetch_user_order = function (data) {
  let output = "";
  let total_price = 0;

  output += `
<table class="table table-striped">
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
  document.getElementById("user_order").innerHTML = output;
};

const fetch_user_payment = function (data) {
  let output = "",
    payment_id = "",
    user_id = "",
    user_phone_num = "",
    amount = "",
    payment_status = "",
    state = "";

  for (let i = 0; i < data.length; i++) {
    payment_id = data[i].payment_id;
    user_id = data[i].user_id;
    user_phone_num = data[i].user_phone_num;
    amount = data[i].amount;
    payment_status = data[i].payment_status;
    state = data[i].state;
  }
  document.getElementById("payment_id").innerHTML = "Payment Id :" + payment_id;
  document.getElementById("user_id").innerHTML = "User Id :" + user_id;
  document.getElementById("user_phone_num").innerHTML =
    "Phone Number :" + user_phone_num;
  document.getElementById("amount").innerHTML = "Total Amount :RM " + amount;
  document.getElementById("payment_status").innerHTML =
    "Status :" + payment_status;

  if (state === "ORDER COMPLETED") {
    output += `<button class="btn btn-success" onclick="get_verify_pick_up_status(${payment_id})">Verify As Picked Up</button>`;
  }
  document.getElementById("btn").innerHTML = output;
};

const get_verify_pick_up_status = (data) =>
  loadAjax(
    "verify_pick_up_status",
    "verify_pick_up_status=" + "&payment_id=" + data
  );

const fetch_verify_pick_up_status = function () {
  document.getElementById("user_order").innerHTML = "";
  document.getElementById("payment_id").innerHTML = "";
  document.getElementById("user_id").innerHTML = "";
  document.getElementById("user_phone_num").innerHTML = "";
  document.getElementById("amount").innerHTML = "";
  document.getElementById("payment_status").innerHTML = "";
  document.getElementById("btn").innerHTML = "";
  get_payment();
};
