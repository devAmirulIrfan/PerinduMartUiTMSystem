"use strict";
const loadAjax = function (action, data, dat) {
  var request = new XMLHttpRequest();
  request.open("POST", "systemBridge.php", true);
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  request.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      const output = this.responseText;
      if (action === "load") {
        try {
          fetch_item_category(JSON.parse(output));
        } catch (err) {
          err = "";
          logError("fetch_item_category", "The category is empty");
        }
      }
      if (action === "search") {
        try {
          fetch_item_category(JSON.parse(output));
        } catch (err) {
          err = "";
          logError("fetch_item_category", "Data not exist");
        }
      }
      if (action === "edit") fetch_edit_item_category(JSON.parse(output));
      if (action === "create") {
        clearInput();
        get_item_category();
      }
      if (action === "save") {
        clearInput();
        get_item_category();
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

const search_item_category = function () {
  const search_result = document.getElementById("search_item_category").value;
  if (search_result) loadAjax("search", "search=" + search_result);
  else get_item_category();
};

const get_item_category = () => loadAjax("load", "load=load");
get_item_category();

const fetch_item_category = function (data) {
  let output = "";

  output += `<table class="table">
  <tr>
  <th>Category Id</th>
  <th>Name</th>
  <th>Edit</th>
  `;

  for (let i = 0; i < data.length; i++) {
    output += `
      <tr>
      <td>${data[i].item_category_id}</td>
      <td>${data[i].item_category_name}</td>
      <td><button data-bs-toggle="modal" data-bs-target="#exampleModal"  class="btn btn-warning" onclick="get_edit_item_category(${data[i].item_category_id})">Edit</button></td>
      </tr>
      `;
  }
  output += `</table>`;

  document.getElementById("fetch_item_category").innerHTML = output;
};
const clearInput = function () {
  document.getElementById("create_item_category_name").value = "";
  document.getElementById("edit_item_category_id").value = "";
  document.getElementById("edit_item_category_name").value = "";
};

const get_create_item_category = function () {
  const create_new_item_category_name = document.getElementById(
    "create_item_category_name"
  ).value;
  // alert(create_new_item_category_name);
  loadAjax("create", "create=" + "&item_name=" + create_new_item_category_name);
};

const get_edit_item_category = (data) => loadAjax("edit", "edit=" + data);

let item_category_name = "";
let item_category_id = "";

const fetch_edit_item_category = function (data) {
  for (let i = 0; i < data.length; i++) {
    item_category_id = data[i].item_category_id;
    item_category_name = data[i].item_category_name;
  }
  document.getElementById("edit_item_category_id").value = item_category_id;
  document.getElementById("edit_item_category_name").value = item_category_name;
};

const save_edit_item_category = function () {
  const save_category_id = document.getElementById(
    "edit_item_category_id"
  ).value;
  const save_category_name = document.getElementById(
    "edit_item_category_name"
  ).value;
  loadAjax(
    "save",
    "save=" +
      "&save_category_id=" +
      save_category_id +
      "&save_category_name=" +
      save_category_name
  );
};
