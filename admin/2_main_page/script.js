"use strict";
const loadAjax = function (action, data, dat) {
  var request = new XMLHttpRequest();
  request.open("POST", "systemBridge.php", true);
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  request.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      const output = this.responseText;
      if (action === "load_payment_collection")
        fetch_load_payment_collection(output);
      if (action === "load_orders") fetch_load_orders(output);
      if (action === "load_pickup") fetch_load_pickup(output);
    }
  };
  request.send(data);
};

const get_load_payment_collection = () =>
  loadAjax("load_payment_collection", "load_payment_collection=");
get_load_payment_collection();

const fetch_load_payment_collection = function (data) {
  document.getElementById(
    "payment_collection"
  ).innerHTML = `Today's payment collection: RM${data}`;
};

const get_load_orders = () => loadAjax("load_orders", "load_orders=");
get_load_orders();

const fetch_load_orders = function (data) {
  document.getElementById(
    "total_orders"
  ).innerHTML = `Total Uncompleted Orders : ${data}`;
};

const get_load_pickup = () => loadAjax("load_pickup", "load_pickup=");
get_load_pickup();

const fetch_load_pickup = function (data) {
  document.getElementById(
    "total_pickups"
  ).innerHTML = `Total Unpicked Orders : ${data}`;
};
