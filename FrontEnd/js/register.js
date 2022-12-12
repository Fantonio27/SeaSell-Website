function onload(){
    date();
    randomnum();
    number();
}

const username = document.getElementById("username");
const password = document.getElementById("password");
const region = document.getElementById("region");
const city = document.getElementById("city");
const email = document.getElementById("email");
const mobile_no = document.getElementById("mobile_no");
const submit = document.getElementById("register");

let special_char_user =/[^a-zA-Z0-9-_.]/; 
let special_char_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
let key1 = key2 = key3 = key4 = key5 = key6 = 0;

region.addEventListener("click", enablecity);

function onlyNumberKey(evt) { //only number in mobile no textbox
        
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
    return true;
}

function enablecity(){ //change of disabled of dropdown-city
    if(region.value){
        document.getElementById("city").disabled = false;
    }else{
        document.getElementById("city").disabled = true;
    }
}

function validation(a){ //validation text
    const valid1 = document.getElementById("req1");
    const valid2 = document.getElementById("req2");
    const valid3 = document.getElementById("req3");
    const valid4 = document.getElementById("req4");
    const valid5 = document.getElementById("req5");
    const valid6 = document.getElementById("req6");
    let listOption = document.querySelectorAll("#list option");
    let listOption1 = document.querySelectorAll("#list1 option");


    if(a == "username"){      //for username validation

        valid1.style.color = "red";

        if (username.value.length === 0){
            valid1.innerHTML ='Username is required';
            key1 = 0;
        }else if (special_char_user.test(username.value)){
            key1 = 0;
            valid1.innerHTML ='Username may contain only letters (a-z), numbers (0-9), dashes (-), underscores ( _ ),or periods (.) ';
            //valid.insertAdjacentText('beforeend', 'Username may contain only letters (a-z), numbers (0-9), dashes (-), underscores (_),or periods (.) ');
        }else if (username.value.length < 5 || username.value.length > 30){
            key1 = 0;
            valid1.innerHTML ='Username must be 5-30 characters long';  
        }else{   
            for (let i = 0;i < listOption.length; i ++){
                if(listOption[i].value === username.value){
                    valid1.style.color = "RED";
                    valid1.innerHTML ='Username is already exist'; 
                    key1 = 0;
                    break;
                }else{
                    key1 = 1;
                    valid1.style.color = "white"
                    valid1.innerHTML ='Username'; 
                }
            }
        }
    }

    if(a == "password"){     //for password validation

        valid2.style.color = "red";

        if (password.value.length === 0){
            key2 = 0;
            valid2.innerHTML ='Password is required';
        }else if (password.value.length < 8 || password.value.length > 20){
            key2 = 0;
            valid2.innerHTML ='Password must be 8-20 characters long';  
        }else{
            key2 = 1;
            valid2.style.color = "white"; 
        }
    }
    
    
    if(a == "region"){     //for region validation
        valid3.style.color = "red";

        if (region.selectedIndex === 0){
            key3 = 0;
            valid3.innerHTML ='Select a Region'; 
        }else{
            key3 = 1;
            valid3.style.color = "white";
        }
    }

    if(a == "city"){     //for city validation
        valid4.style.color = "red";
        
        if (city.selectedIndex === 0){
            key4 = 0;
            valid4.innerHTML ='Select a City'; 
        }else{
            key4 = 1;
            valid4.style.color = "white";
        }
    }
    
    if(a == "email"){   //for email validation

        valid5.style.color = "red";

        if (email.value.length === 0){
            key5 = 0;
            valid5.innerHTML ='Email Address is required';
        }else if (!(special_char_email.test(email.value))){
            key5 = 0;
            valid5.innerHTML ='Enter a valid email (Email@yahoo.com)';
            //valid.insertAdjacentText('beforeend', 'Username may contain only letters (a-z), numbers (0-9), dashes (-), underscores (_),or periods (.) ');
        }else if (email.value.length < 9 || email.value.length > 30){
            key5 = 0;
            valid5.innerHTML ='Email Address must be 9-30 characters long';  
        }else{
            for (let i = 0;i < listOption1.length; i ++){
                if(listOption1[i].value === email.value){
                    valid5.style.color = "RED";
                    valid5.innerHTML ='Email is already exist'; 
                    key5 = 0;
                    break;
                }else{
                    key5 = 1;
                    valid5.style.color = "white"
                    valid5.innerHTML ='Username'; 
                }
            }
        }
    }

    if(a == "mobile"){    //for mobile validation
        
        valid6.style.color = "red";
        
        if (mobile_no.value.length === 0){
            key6 = 0;
            valid6.innerHTML ='Mobile number is required';
        }else if (mobile_no.value.length < 11){
            key6 = 0;
            valid6.innerHTML ='Mobile number must be at least 11 numbers';  
        }else{
            key6 = 1;
            valid6.style.color = "white";
        }
    }

    disabled_btn(key1,key2,key3,key4,key5,key6);
}

function disabled_btn(a,b,c,d,e,f){     //disabled the register button
    if(a && b && c && d && e && f == 1 ){
        submit.disabled = false;
    }else{
        submit.disabled = true;
    }
}

function showpass(){ //show password

    const eye = document.getElementById("pass-icon");
    const check = document.getElementById("checkbox");

    if(check.checked == true ){
        eye.style.backgroundImage = "url('../includes/images/icon/eye-off-outline.svg')";
        check.checked = false; 
        password.type = "password";
    }else if (check.checked == false ){
        eye.style.backgroundImage = "url('../includes/images/icon/eye-outline.svg')";
        check.checked = true;
        password.type = "text";
    }
}

function randomnum(){
    let r = (Math.random() + 1).toString(36).substring(2);
    document.getElementById("randomid").value = r;
}

function number(){
    let n = Math.floor(Math.random() * 1000);
    document.getElementById("no").value = n;
}

function date(){
    const day = new Date().toLocaleDateString('en-us',{day:"numeric"});
    const month = new Date().toLocaleDateString('en-us',{month:"numeric"});
    const year = new Date().toLocaleDateString('en-us',{year:"numeric"});
    
    document.getElementById("text-time1").value = year +"-"+month + "-"+day;
}