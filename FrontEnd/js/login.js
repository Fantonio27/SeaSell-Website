//import Cookies from "js-cookie";
//import "../includes/js/jquery-3.6.1";

const usertxt = document.getElementById("username");
const passtxt = document.getElementById("password");
let user = "user1"; //example input
let pass = "password"; //example input
let keyuser = 0;
let keypass = 0;

function login() {
  $.get(
    "../../BackEnd/php/ajax/login.php",
    {
      username: usertxt.value,
      passhash: passtxt.value,
    },
    function (resp) {
        console.log(resp);
    }
  );
}

function valid(a){ //validation for username and password

  if(a == "username"){
    if (usertxt.value.length === 0){
        document.getElementById("req1").style.color = "red";
        keyuser = 0;
    }else if (!(usertxt.value.length === 0)){
        document.getElementById("req1").style.color = "white";
        keyuser = 1;
    }
  }else if(a == "password"){
    if (passtxt.value.length === 0){
      document.getElementById("req2").style.color = "red";
      keypass = 0;
    }else if (!(passtxt.value.length === 0)){
        document.getElementById("req2").style.color = "white";
        keypass = 1;
    }
  }

  disabledkey(keyuser, keypass);
}

function disabledkey(a, b){  //to disabled the login button
  if(a == 0 || b == 0 ){
    document.getElementById("login").disabled = true;
    //document.getElementById("login").style.backgroundColor = "#0f8adc";
  }else{
    document.getElementById("login").disabled = false;
   //document.getElementById("login").style.backgroundColor = "#008fee";
  }
}

function showpass(){  //show password
  var c = document.getElementById("check");

  if(c.checked == true){
    passtxt.type = "text";
  }else{
    passtxt.type = "password";
  }
}

