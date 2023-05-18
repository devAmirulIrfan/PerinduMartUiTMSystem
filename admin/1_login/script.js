const login = function () {
  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;

  if (username && password) {
    if (username === "admin" && password === "admin")
      window.location.replace("../2_main_page");
    else alert("incorrect");
  } else {
    alert("please enter username and password");
  }
};
