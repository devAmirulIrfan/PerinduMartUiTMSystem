"use strict";
const loadAjax = function (action, data, dat) {
  var request = new XMLHttpRequest();
  request.open("POST", "systemBridge.php", true);
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  request.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      const output = this.responseText;
      if (action === "load_filter_payment") {
        try {
          fetch_payment(JSON.parse(output));
        } catch (err) {
          err = "";
          logError("fetch_result", "Data Not Exist");
        }
        document.getElementById("date1").value = null;
        document.getElementById("date2").value = null;
      }
      if (action === "load_today_payment") {
        try {
          fetch_payment(JSON.parse(output));
        } catch (err) {
          err = "";
          logError("fetch_result", "Data Not Exist");
        }
      }
      if (action === "load_all_time_payment") {
        try {
          fetch_payment(JSON.parse(output));
        } catch (err) {
          err = "";
          logError("fetch_result", "Data Not Exist");
        }
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
const payment_description = function (data) {
  document.getElementById("description").innerHTML = data;
};
const get_filter_payment = function () {
  const date1 = document.getElementById("date1").value;
  const date2 = document.getElementById("date2").value;
  payment_description(`Payment from ${date1} to ${date2}`);
  loadAjax(
    "load_filter_payment",
    "load_filter_payment=" + "&date1=" + date1 + "&date2=" + date2
  );
};

const get_today_payment = function () {
  let today = new Date();
  let dd = String(today.getDate()).padStart(2, "0");
  let mm = String(today.getMonth() + 1).padStart(2, "0"); //January is 0!
  let yyyy = today.getFullYear();
  today = mm + "-" + dd + "-" + yyyy;
  payment_description(`Payment for ${today}`);
  loadAjax("load_today_payment", "load_today_payment");
};

const get_all_time_payment = function () {
  payment_description("All Time Payment");
  loadAjax("load_all_time_payment", "load_all_time_payment=");
};
get_all_time_payment();

const fetch_payment = function (data) {
  let output = "";
  let total_payment = 0;

  output += `<table class="table">
  <tr>
  <th>No</th>
  <th>Date</th>
  <th>Payment ID</th>
  <th>User ID</th>
  <th>Phone Number</th>
  <th>Amount RM</th>
  </tr>
  `;

  for (let i = 0; i < data.length; i++) {
    total_payment += data[i].amount * 1;
    output += `
      <tr>
      <td>${i + 1}</td>
      <td>${data[i].payment_date}</td>
      <td>${data[i].payment_id}</td>
      <td>${data[i].user_id}</td>
      <td>${data[i].user_phone_num}</td>
      <td>${data[i].amount}.00</td>
      </tr>
      `;
  }
  output += `</table>`;
  document.getElementById(
    "total_amount"
  ).innerHTML = `<div class="alert alert-success" role="alert"><center>Total Payment Collection : RM ${total_payment}</center></div>`;
  document.getElementById("fetch_result").innerHTML = output;
};

const printToPDF = function () {
  const element = document.getElementById("pdf");
  html2pdf().from(element).save();
};
