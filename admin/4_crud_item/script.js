"use strict";
// const get_create_item = function () {
//   alert("djjd");
//   const a = document.getElementById("create_item_category").value;
//   alert(a);
// };
"use strict";
const loadAjax = function (action, data) {
  var request = new XMLHttpRequest();
  request.open("POST", "systemBridge.php", true);
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  request.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      const output = this.responseText;
      if (action === "load") {
        try {
          fetch_item(JSON.parse(output));
        } catch (err) {
          err = "";
          logError("fetch_item", "The item is empty");
        }
      }
      if (action === "search") {
        try {
          fetch_item(JSON.parse(output));
        } catch (err) {
          err = "";
          logError("fetch_item", "The item does not exist");
        }
      }
      if (action === "load_category") {
        try {
          fetch_item_category(JSON.parse(output));
        } catch (err) {
          err = "";
          logError("btn_search_item", "No Category available");
        }
      }
      if (action === "search_item_category") {
        try {
          fetch_item(JSON.parse(output));
        } catch (err) {
          err = "";
          logError("fetch_item", "No Item In The Category");
        }
      }
      if (action === "edit") fetch_edit_item(JSON.parse(output));
      if (action === "create") {
        get_item();
        reset();
      }
      if (action === "save") {
        get_item();
        reset();
      }
      if (action === "delete") {
        get_item();
        reset();
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

const get_item = () => loadAjax("load", "load=load");
get_item();

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

const fetch_item = function (data) {
  let output = "";

  output += `<table class="table">
  <tr>
  <th>No</th>
  <th> Item Category Name</th>
  <th> Item Name </th>
  <th> Item Price</th>
  <th>Edit</th>
  <th>Delete</th>
  `;

  for (let i = 0; i < data.length; i++) {
    output += `
      <tr>
      <td>${i + 1}</td>
      <td>${data[i].item_category_name}</td>
      <td>${data[i].item_name}</td>
      <td>${data[i].item_price}</td>
      
      <td><button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-warning" onclick="get_edit_item(${
        data[i].item_id
      })">Edit</button></td>
      <td><button class="btn btn-danger" onclick="get_delete_item(${
        data[i].item_id
      })">Delete</button></td>
    
      </tr>
      `;
  }
  output += `</table>`;

  document.getElementById("fetch_item").innerHTML = output;
};

const reset = function () {
  document.getElementById("create_item_category").value = "";
  document.getElementById("create_item_name").value = "";
  document.getElementById("create_item_price").value = "";
  document.getElementById("edit_item_id").value = "";
  document.getElementById("edit_item_category").value = "";
  document.getElementById("edit_item_name").value = "";
  document.getElementById("edit_item_price").value = "";
};

const get_create_item = function () {
  const item_category_id = document.getElementById(
    "create_item_category"
  ).value;
  const item_name = document.getElementById("create_item_name").value;
  const item_price = document.getElementById("create_item_price").value;

  loadAjax(
    "create",
    "create=" +
      "&item_category_id=" +
      item_category_id +
      "&item_name=" +
      item_name +
      "&item_price=" +
      item_price
  );
};

const get_edit_item = (data) => loadAjax("edit", "edit=" + "&item_id=" + data);

const fetch_edit_item = function (data) {
  let item_name = "";
  let item_id = "";
  let item_category_id = "";
  let item_price = "";

  for (let i = 0; i < data.length; i++) {
    item_id = data[i].item_id;
    item_category_id = data[i].item_category_id;
    item_name = data[i].item_name;
    item_price = data[i].item_price;
  }
  document.getElementById("edit_item_id").value = item_id;
  document.getElementById("edit_item_category").value = item_category_id;
  document.getElementById("edit_item_name").value = item_name;
  document.getElementById("edit_item_price").value = item_price;
};

const save_edit_item = function () {
  const item_id = document.getElementById("edit_item_id").value;
  const item_category_id = document.getElementById("edit_item_category").value;
  const item_name = document.getElementById("edit_item_name").value;
  const item_price = document.getElementById("edit_item_price").value;
  loadAjax(
    "save",
    "save=" +
      "&item_id=" +
      item_id +
      "&item_category_id=" +
      item_category_id +
      "&item_name=" +
      item_name +
      "+&item_price=" +
      item_price
  );
};

const get_delete_item = (data) =>
  loadAjax("delete", "delete=" + "&item_id=" + data);
