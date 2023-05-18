"use strict";
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
          logError("fetch_payment", "Congratulations No Recurring Orders");
        }
      }
      if (action === "search_payment") {
        try {
          fetch_payment(JSON.parse(output));
        } catch (err) {
          err = "";
          logError("fetch_payment", "Data Not Exist");
        }
      } //fetch_payment(JSON.parse(output));
      if (action === "view_order") fetch_user_order(JSON.parse(output));
      if (action === "view_payment") fetch_user_payment(JSON.parse(output));
      if (action === "verify_order_status") {
        document.getElementById("user_order").innerHTML = "";
        document.getElementById("payment_id").innerHTML = "";
        document.getElementById("user_id").innerHTML = "";
        document.getElementById("user_phone_num").innerHTML = "";
        document.getElementById("amount").innerHTML = "";
        document.getElementById("payment_status").innerHTML = "";
        document.getElementById("btn").innerHTML = "";
        get_payment();
        window.open(
          `https://api.whatsapp.com/send?phone=${phone_num}&text=Your%20order%20is%20Completed`
        );
      }
    }
  };
  request.send(data);
};

const logError = function (id, message) {
  document.getElementById(
    `${id}`
  ).innerHTML = `<div class="alert alert-warning" role="alert"><center>${message}</center></div>`;
};

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
      <td><button class="btn btn-primary" onclick="get_view_cart_payment(${
        data[i].user_id
      })">View</button></td>
      </tr>
      `;
    document.getElementById("fetch_payment").innerHTML = output;
  }
};

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
  document.getElementById("payment_id").innerHTML =
    "<b>Payment Id :</b>" + payment_id;
  document.getElementById("user_id").innerHTML = "<b>User Id :</b>" + user_id;
  document.getElementById("user_phone_num").innerHTML =
    "<b>Phone Number :</b>" + user_phone_num;
  document.getElementById("amount").innerHTML =
    "<b>Total Amount :RM</b> " + amount;
  document.getElementById("payment_status").innerHTML =
    "<b>Status :</b>" + payment_status;

  if (state === "IN PROGRESS") {
    output += `<button class="btn btn-success" onclick="get_verify_order_status(${payment_id},${user_phone_num})">Verify As Complete</button>`;
  }
  document.getElementById("btn").innerHTML = output;
};

const get_verify_order_status = (data, phone_num) =>
  loadAjax(
    "verify_order_status",
    "verify_order_status=" + "&payment_id=" + data,
    phone_num
  );
