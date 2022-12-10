function onload_func(){
    listcount();
    option_region();
    option_city();
    validation1('4');
    option_gender();
    load_user();
}

function load_user(){
    const seller = document.getElementById("seller");
    const user = document.getElementById("user_id");
    const a2 = document.getElementById("a2");
    const a4 = document.getElementById("a3");
    const a5 = document.getElementById("a4");
    const logout = document.getElementById("logout");
    const stat_box = document.querySelectorAll(".status_box");
    const edit = document.querySelectorAll(".ed");
    var i = document.getElementById("countlist").value;

    if(seller.value == ""){
    }else{
        if(seller.value === user.value){

        }else{
            a2.style.float = "none";
            a4.style.display = "none";
            a5.style.display = "none";
            logout.style.display = "none";
            for (let n = 0; n < i; n++) {
                edit[n].style.display = "none";
                stat_box[n].style.display = "none";
            }
        }
    }
}

function listcount(){
    var i = document.getElementById("countlist").value;
    document.getElementById("i").innerHTML += " ("+ i + ")";
}

function option_region(){
    var reg = document.getElementById("reg");
    var region = document.getElementById("region");

    for (var i= 0, n= region.length; i < n ; i++) {
        if (region[i].value==reg.value) {
            region.selectedIndex = i;
            break;
        }
    }
}

function option_city(){
    var cit = document.getElementById("cit");
    var city = document.getElementById("city");

    for (var i= 0, n= city.length; i < n ; i++) {
        if (city[i].value==cit.value) {
            city.selectedIndex = i;
            break;
        }
    }
}

function option_gender(){
    var gen = document.getElementById("gen");
    var gender = document.getElementById("gender");

    for (var i= 0, n= gender.length; i < n ; i++) {
        if (gender[i].value==gen.value) {
            gender.selectedIndex = i;
            break;
        }
    }
}

function onlyNumberKey(evt) { //only number in mobile no textbox
        
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
    return true;
}

function nexttab(a,b){
    var divs = document.querySelectorAll('.tab'), i;
    var p = document.querySelectorAll('.cat-1-txt');

    for (i = 0 ; i < 4 ; i++){
        divs[i].style.display = "none";
        p[i].style.color = "black";
    }

    document.getElementById(a).style.display = "block";
    document.getElementById(b).style.color = "#008fee";
}

function en(){
    var x = document.getElementById("edit_check");
    var en = document.querySelectorAll('.en');
    var pr = document.getElementById('en1');
    var btn = document.getElementById('save_btn');

    if(x.checked == true){
        x.checked = false;
        pr.style.display = "block";
        btn.style.display = "block";
        for(let i = 0; i < 12; i++){
            en[i].disabled = false;
        }  

    }else if (x.checked == false){
        x.checked = true;
        pr.style.display = "none";
        btn.style.display = "none";

        for(let i = 0; i < 12; i++){
            en[i].disabled = true;
        }
        
    }
}

var input = document.getElementById( 'file' );
var infoArea = document.getElementById( 'profile-txt' );

input.addEventListener( 'change', showFileName );

function showFileName( event ) {

    var input = event.srcElement;
    
    var fileName = input.files[0].name;
    
    infoArea.value = fileName;
}

function handleEnter (field, event) {
    
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)){
        return false;
    return true;
    }

    var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
    if (keyCode == 13) {
        var i;
        for (i = 0; i < field.form.elements.length; i++)
            if (field == field.form.elements[i])
                break;
        i = (i + 1) % field.form.elements.length;
        field.form.elements[i].focus();
        return false;
    } 
    else
    return true;
}    

let key1 = key2 = key3 = key7 = key8 = 1;
let special_char_user =/[^a-zA-Z0-9-_.]/; 
let special_char_name =/[^a-zA-Z ]/; 
let special_char_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

var u = document.getElementById("user1");
var fn = document.getElementById("fname");
var ln = document.getElementById("lname");
var b = document.getElementById("bio");
var e = document.getElementById("email");
var m = document.getElementById("mobile");
var btn = document.getElementById("save_btn");

let listOption = document.querySelectorAll("#list option");
let listOption1 = document.querySelectorAll("#list1 option");
var v1 = document.getElementById("v1");
var v2 = document.getElementById("v2");
var v3 = document.getElementById("v3");
var v7 = document.getElementById("v7");
var v8 = document.getElementById("v8");


function validation1(a){
    
    if(a == 1){     //username field
        v1.style.color = "red";

        if (u.value.length === 0){
            key1 = 0;
            v1.innerHTML ='Username is required';    
        }else if (special_char_user.test(u.value)){
            key1 = 0;
            v1.innerHTML ='Username may contain only letters (a-z), numbers (0-9), dashes (-), underscores ( _ ),or periods (.) ';
        }else if (u.value.length < 5 || u.value.length > 30){
            key1 = 0;
            v1.innerHTML ='Username must be 5-30 characters long';  
        }else{
            for (let i = 0;i < listOption.length; i ++){
                if(listOption[i].value === u.value){
                    v1.style.color = "RED";
                    v1.innerHTML ='Username is already exist'; 
                    break;
                }else{
                    key1 = 1;
                    v1.style.color = "white"
                    v1.innerHTML ='Username'; 
                }
            }
            
        }
    }

    if(a == 2){     //firstname field

        v2.style.color = "red";

		if (special_char_name.test(fn.value)){
			v2.innerHTML = "First name can only contain letters (a-z)";
			key2 = 0;
        }else if (fn.value.length > 30){
            key2 = 0;
            v1.innerHTML ='First name must be 30 characters and below';  
		}else{
			v2.style.color = "white";
			key2 = 1;
		}
    }

    if(a == 3){     //lastname field

        v3.style.color = "red";

        if (special_char_name.test(ln.value)){
			v3.innerHTML = "Last name can only contain letters (a-z)";
			key3 = 0;
        }else if (ln.value.length > 30){
            key3 = 0;
            v3.innerHTML ='Last name must be 30 characters and below';  
		}else{
			v3.style.color = "white";
			key3 = 1;
		}
    }

    if(a == 4){     //bio field
        
        document.getElementById("v5_5").innerHTML = b.value.length + "/255";
    }

    if(a == 5){     //region field

    }

    if(a == 6){     //city field
        
    }

    if(a == 7){     //email field
        v7.style.color = "red";

        if (e.value.length === 0){
            key7 = 0;
            v7.innerHTML ='Email Address is required';
        }else if (!(special_char_email.test(e.value))){
            key7 = 0;
            v7.innerHTML ='Enter a valid email (Email@yahoo.com)';
        }else if (e.value.length < 9 || e.value.length > 30){

            key7 = 0;
            v7.innerHTML ='Email Address must be 9-30 characters long';  
        }else{
            for (let i = 0;i < listOption1.length; i ++){
                if(listOption1[i].value === e.value){
                    v7.style.color = "RED";
                    v7.innerHTML ='Email is already exist'; 
                    key7 = 0;
                    break;
                }else{
                    key7 = 1;
                    v7.style.color = "white"
                    v7.innerHTML ='u'; 
                }
            }
        }
    }

    if(a == 8){     //mobile field
        v8.style.color = "red";
        
        if (m.value.length === 0){
            key8 = 0;
            v8.innerHTML ='Mobile number is required';
        }else{
            key8 = 1;
            v8.style.color = "white";
        }
    }

    if(a == 9){     //gender field
        
    }

    if(a == 10){     //birthday field
        
    }

    openkey(key1,key2,key3,key7,key8);
}

function openkey(a,b,c,d,e){
    if(a && b && c && d && e == 1){
        btn.disabled = false;
    }else{
        btn.disabled = true;
    }
}

let g = h = 0;

function validation_pass(num){
    var a = document.getElementById("pass_change");
    var b = document.getElementById("pass");
    var c = document.getElementById("confpass");
    var e = document.getElementById("v11");
    var f = document.getElementById("v12");

    if(num == 1){
        e.style.color = "red";

        if (b.value.length < 8 || b.value.length > 20){
            g = 0;
        }else{
            e.style.color = "white"; 
            g = 1;
        }
    }

    if(num == 2){
        f.style.color = "red";

        if(b.value == c.value){
            h = 1;
            f.style.color = "white";
        }else{
            h = 0;
        }
    }

    if(g == 1 && h == 1){
        a.disabled = false;
    }else{
        a.disabled = true;
    }
        
}

