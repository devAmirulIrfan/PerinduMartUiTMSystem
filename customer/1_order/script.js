"use strict";

const loadAjax = function (action, data) {
  var request = new XMLHttpRequest();
  request.open("POST", "systemBridge.php", true);
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  request.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      const output = this.responseText;
      if (action === "load_category") fetch_item_category(JSON.parse(output));
      if (action === "load") fetch_item(JSON.parse(output));
      if (action === "search") fetch_item(JSON.parse(output));
      if (action === "search_item_category") fetch_item(JSON.parse(output));
      if (action === "load_user_cart") {
        try {
          fetch_load_user_cart(JSON.parse(output));
        } catch (err) {
          document.getElementById("name").value = 0;
          err.message = `<div class="alert alert-warning" role="alert"><center>Your cart is empty :(</center></div>`;
          document.getElementById("user_cart").innerHTML = err.message;
        }
      }
      if (action === "add_to_cart") fetch_insert_item_to_cart(output);
      if (action === "remove_item_from_cart") get_load_user_cart();
      if (action === "edit_item_quantity") get_load_user_cart();
    }
  };
  request.send(data);
};

const search_item = function () {
  const search_result = document.getElementById("search_item").value;
  if (search_result) loadAjax("search", "search=" + search_result);
  else get_item();
};

const get_item_category = () => loadAjax("load_category", "load_category=load");
get_item_category();

const fetch_item_category = function (data) {
  let output = "";
  output += `<button class="btn btn-primary" onclick="get_item()">All</button>`;
  for (let i = 0; i < data.length; i++) {
    output += `<button class="btn btn-light" onclick="search_item_category(${data[i].item_category_id})">${data[i].item_category_name}</button>`;
  }
  document.getElementById("btn_search_item").innerHTML = output;
};

const search_item_category = (data) =>
  loadAjax(
    "search_item_category",
    "search_item_category=" + "&item_category_id=" + data
  );

const get_item = () => loadAjax("load", "load=load");
get_item();

const fetch_item = function (data) {
  let output = "";

  output += `<table class="table">
    <tr>
    <th>No</th>
    <th> Item Category Name</th>
    <th> Item Name </th>
    <th> Item Price</th>
    <th></th>
    `;

  for (let i = 0; i < data.length; i++) {
    output += `
        <tr>
        <td>${i + 1}</td>
        <td>${data[i].item_category_name}</td>
        <td>${data[i].item_name}</td>
        <td>${data[i].item_price}</td>
        
        <td><button class="btn btn-warning" onclick="get_insert_item_to_cart(${
          data[i].item_id
        })">Add To Cart</button></td>
        </tr>
        `;
  }
  output += `</table>`;

  document.getElementById("fetch_item").innerHTML = output;
  get_load_user_cart();
};

const get_load_user_cart = () => loadAjax("load_user_cart", "load_cart=");
get_load_user_cart();

const fetch_load_user_cart = function (data) {
  let output = "";
  let total_price = 0;

  output += `<button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success">Proceed to payment</button><br><br>`;

  output += `<div id="show_total_price"></div>`;

  output += `
  <table class="table table-stripped">
  <tr>
  <th>No</th>
  <th>Item Name</th>
  <th>Item Price</th>
  <th>Quantity</th>
  <th>Total</th>
  <th></th>
  <tr>
  `;
  for (let i = 0; i < data.length; i++) {
    total_price += data[i].item_price * data[i].item_quantity;
    output += `
    <tr>
    <td>${i + 1}</td>
    <td>${data[i].item_name}</td>
    <td>${data[i].item_price}</td>`;
    if (data[i].item_quantity == 1) {
      output += `<td><button class="btn btn-light"  disabled>-</button>${data[i].item_quantity}<button class="btn btn-light" onclick="get_edit_item_quantity(${data[i].item_id},'increment')" >+</button></td>`;
    } else {
      output += `<td><button class="btn btn-light"  onclick="get_edit_item_quantity(${data[i].item_id},'decrement')" >-</button>${data[i].item_quantity}<button class="btn btn-light"  onclick="get_edit_item_quantity(${data[i].item_id},'increment')">+</button></td>`;
    }
    output += `
    <td>${data[i].item_price * data[i].item_quantity}</td>
    <td><button class="btn btn-danger" onclick="get_remove_item_from_cart(${
      data[i].item_id
    })">Remove</button></td>
    </tr>
    `;
  }
  output += `
  </table>
  `;

  document.getElementById("user_cart").innerHTML = output;
  document.getElementById("name").value = total_price;
  document.getElementById(
    "show_price"
  ).innerHTML = `<p><h3><b>Your Total Price Is RM${total_price}</b></h3></p>`;
  document.getElementById(
    "show_total_price"
  ).innerHTML = `<div class="alert alert-success" role="alert"><center>Total Price : RM ${total_price}</center></div>`;
};

const get_insert_item_to_cart = (data) =>
  loadAjax("add_to_cart", "add_to_cart=" + "&item_id=" + data);

const fetch_insert_item_to_cart = function (data) {
  if (data !== "error") get_load_user_cart();
  else alert("Item already added to cart");
};

const get_edit_item_quantity = (item_id, method) =>
  loadAjax(
    "edit_item_quantity",
    "edit_item_quantity=" + "&item_id=" + item_id + "&method=" + method
  );

const get_remove_item_from_cart = (data) =>
  loadAjax(
    "remove_item_from_cart",
    "remove_item_from_cart=" + "&item_id=" + data
  );
