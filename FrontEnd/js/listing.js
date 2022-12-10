/*FOR BIKE*/ 
date();
let key1 = key2 = key3 = key4 = key5 = key6 = key7 = 0 ;

const productname = document.getElementById("productname_bike");
const type = document.getElementById("type_bike");
const prcinput = document.getElementById("prcinput_bike");
const meet = document.getElementById("meet_bike");
const mail = document.getElementById("mail_bike");
const desc_b = document.getElementById("desc_b");
const mail_txt = document.getElementById("mail-txtarea_bike");
const add = document.getElementById("location_bike");

const listbtn = document.getElementById("list_btn_bike");

let special_char_prod =/[^a-zA-Z0-9-()+:/&*""“” ]/; 

const val1 = document.getElementById("req1_bike");
const val2 = document.getElementById("req2_bike");
const val3 = document.getElementById("req3_bike");
const val4 = document.getElementById("req4_bike");
const val5 = document.getElementById("req5_bike");
const val6 = document.getElementById("req6_bike");

function onlyNumberKey(evt) { //only number in mobile no textbox
        
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
    return true;
}

function onChange(a){	//for 2 category
	if(a == 1){		//Bike
		document.getElementById("con-2").style.display = "block";
		document.getElementById("con-1").style.display = "none";
		
	}else if (a == 2){		//Fashion
		document.getElementById("con-2").style.display = "none";
		document.getElementById("con-1").style.display = "block";
	}
}

function changecon(b){
	
	const boxlist = document.querySelectorAll(".box-condition1");

	for (let i = 0; i < 5; i++) {
		boxlist[i].style.backgroundColor = "white";
		boxlist[i].style.color = "black";
	}

	document.querySelector("." + b).style.backgroundColor = "rgb(0, 143, 255, 0.85)";
	document.querySelector("." + b).style.color = "white"; 

	var con_value = document.querySelector("." + b).innerHTML;
	document.getElementById("con_txt_bike").value = con_value;

	document.getElementById("req2_bike").innerHTML = "good";
	
	validation1('2');
}

function changepric(b,c){

	document.getElementById("req3_bike").innerHTML = "";

	const pricelist = document.querySelectorAll(".box-condition1");

	for (let i = 5; i < 7; i++) {
		pricelist[i].style.backgroundColor = "white";
		pricelist[i].style.color = "black";
	}

	document.querySelector("." + b).style.backgroundColor = "rgb(0, 143, 255, 0.85)";
	document.querySelector("." + b).style.color = "white"; 

	pricebox(c);
}

function pricebox(a){
	const prcbox = document.getElementById("pricebox_bike");
	const prcinput = document.getElementById("prcinput_bike");

	if(a == 1){
		prcbox.style.display = "flex";
		prcinput.value="";
	}else{
		prcbox.style.display = "none";
		prcinput.value= 0;
	}
}

function qtychange(){
	const s = document.getElementById("qty_bike");
	const s1 = document.getElementById("qty_txt_bike");

	if(s.checked == true){
		s1.value = "MORE";
	}else if(s.checked == false){
		s1.value = "ONE";
	}
}


//show the location textbox
function addlocation(){
	const m = document.getElementById("meet_bike");

	if(m.checked == true){
		document.getElementById("location-txt_bike").style.display = "block";
		add.value = "";	
	}else if (m.checked == false){
		document.getElementById("location-txt_bike").style.display = "none";
		add.value = "";
	}
}

//show the email textbox
function addmail(){
	const n = document.getElementById("mail_bike");
	
	if(n.checked == true){
		document.getElementById("email-box_bike").style.display = "block";
		mail_txt.value = "";		
	}else if (n.checked == false){
		document.getElementById("email-box_bike").style.display = "none";
		mail_txt.value = "";	
	}
}


function validation1(a){

	if (a == 1){

		val1.style.color = "red";

		if(productname.value.length === 0){
			val1.innerHTML = "Please fill this in";
			key1 = 0;
		}else if (special_char_prod.test(productname.value)){
			val1.innerHTML = "Product Name may contain only letters (a-z), numbers (0-9), dashes (-),slash (/),or parenthesis ( () )";
			key1 = 0;
		}else{
			val1.style.color = "white";
			key1 = 1;
		}
	}

	if (a == 2){
		key2 = 1;
	}

	if (a == 3){

		if(prcinput.value.length === 0){
			val3.style.color = "red";
			val3.innerHTML = "price field is required";
			key3 = 0;
		}else{
			val3.style.color = "white";
			val3.innerHTML = "very good";
			key3 = 1;
		}
	}

	if (a == 4){
		val4.style.color = "red";

		if (type.selectedIndex === 0){
            key4 = 0;
            val4.innerHTML ='Select a Type'; 
        }else{
            key4 = 1;
            val4.style.color = "white";
        }
	}

	if (a == 5){
		const d1 = document.getElementById("deal1_bike");
		const d2 = document.getElementById("deal2_bike");

		if(meet.checked == true || mail.checked == true){
			if(add.value == ""){
				val5.style.color = "red";
				val5.innerHTML = "Please fill this in";
				key5 = 0;
				d1.value = "";	
			}else{
				val5.style.color = "white";
				key5 = 3;
				d1.value = "Meet-up";	
			}

			if(mail_txt.value == ""){
				val6.style.color = "red";
				val6.innerHTML = "Please fill this in";
				key6 = 0;
				d2.value = "";
			}else{
				val6.style.color = "white";
				key6 = 2;
				d2.value = "Mailing & Delivery";
			}
		}else{
			key5 = 0;
			key6 = 0;
		}
	}

	if(a == 6){
		var file = document.getElementById("file_bike");
		if(file.files.length > 10 || file.files.length == 0){
			key7 = 0;   
			document.getElementById("req7_bike").style.color = "red";
		}else{
			key7 = 1;
			document.getElementById("req7_bike").style.color = "white";
		}
	}

	if(a == 7){
		document.getElementById("v5_5").innerHTML = desc_b.value.length + "/255";
	}

	keyopen(key1,key2,key3,key4,key5,key6,key7);

}

function keyopen(a,b,c,d,e,f,g){
	if(a && b && c && d && g == 1 && (((e == 3 && f == 2)||((e == 0 && f == 2)||(e == 3 && f == 0))))){
		listbtn.disabled = false;
	}else{
		listbtn.disabled = true;
	}

	//alert(a +" " + b +" " +c+" " +d+" " +e+" " +f);
}



/*FOR FASHION*/ 

let key1_f = key2_f = key3_f = key4_f = key5_f = key6_f = key7_f = key8_f = key9_f = 0 ;

const productname_f = document.getElementById("productname_fashion");
const type_f = document.getElementById("type_fashion");
const gender_f = document.getElementById("gender_fashion");
const size_f = document.getElementById("size_fashion");
const prcinput_f = document.getElementById("prcinput_fashion");
const meet_f = document.getElementById("meet_fashion");
const mail_f = document.getElementById("mail_fashion");
const desc_f = document.getElementById("desc_f");
const mail_txt_f = document.getElementById("mail-txtarea_fashion");
const add_f = document.getElementById("location_fashion");

const listbtn_f = document.getElementById("list_btn_fashion"); 

const val1_f = document.getElementById("req1_fashion");
const val2_f = document.getElementById("req2_fashion");
const val3_f = document.getElementById("req3_fashion");
const val4_f = document.getElementById("req4_fashion");
const val5_f = document.getElementById("req5_fashion");
const val6_f = document.getElementById("req6_fashion");
const val7_f = document.getElementById("req7_fashion");
const val8_f = document.getElementById("req8_fashion");
const val9_f = document.getElementById("req9_fashion");

function changecon1(b){
	
	const boxlist = document.querySelectorAll(".box-condition2");

	for (let i = 0; i < 5; i++) {
		boxlist[i].style.backgroundColor = "white";
		boxlist[i].style.color = "black";
	}

	document.querySelector("." + b).style.backgroundColor = "rgb(0, 143, 255, 0.85)";
	document.querySelector("." + b).style.color = "white"; 

	var con_value = document.querySelector("." + b).innerHTML;
	document.getElementById("con_txt_fashion").value = con_value;

	document.getElementById("req2_fashion").innerHTML = "good";
	
	validation2('2');
}


function changepric1(b,c){

	document.getElementById("req3_fashion").innerHTML = "";

	const pricelist = document.querySelectorAll(".box-condition2");

	for (let i = 5; i < 7; i++) {
		pricelist[i].style.backgroundColor = "white";
		pricelist[i].style.color = "black";
	}

	document.querySelector("." + b).style.backgroundColor = "rgb(0, 143, 255, 0.85)";
	document.querySelector("." + b).style.color = "white"; 

	pricebox1(c);
}

function pricebox1(a){
	const prcbox = document.getElementById("pricebox_fashion");
	const prcinput = document.getElementById("prcinput_fashion");

	if(a == 1){
		prcbox.style.display = "flex";
		prcinput.value="";
	}else{
		prcbox.style.display = "none";
		prcinput.value= 0;
	}
}

function size_change(){
	
	var a = type_f.value;
	var b = gender_f.value;
	var array= [];

	if (a == "Footwear" && b == "Female"){		//women
		var array = ["EU 35 / UK 2 / US 4","EU 36 / UK 3 / US 5","EU 37 / UK 4 / US 6","EU 38 / UK 5 / US 7","EU 39 / UK 6 / US 8",
		"EU 40 / UK 6 / US 8","EU 41 / UK 6 / US 8", "Others"];

	}else if (a == "Footwear"  && b == "Male"){		//men
		var array = ["EU 40 / UK 6 / US 7","EU 40.5 / UK 6.5 / US 7.5","EU 41 / UK 7 / US 8","EU 41.5 / UK 7.5 / US 8.5","EU 42 / UK 8 / US 9",
		"EU 42.5 / UK 8.5 / US 9.5","EU 43 / UK 9 / US 10","EU 43.5 / UK 9.5 / US 10.5","EU 44 / UK 10 / US 11","EU 44.5 / UK 10.5 / US 11.5",
		"EU 45 / UK 11 / US 12","EU 45.5 / UK 11.5 / US 12.5","EU 46 / UK 12 / US 13","Above EU 46 / UK 12 / US 13","Others"];

	}else if ((a == "Jacket, Coat and Outwear" || a == "Tops" || a =="Bottom") && b == "Female"){		//women
		var array = ["XXS / EU 32 / UK 4 / US 0","XS / EU 34 / UK 6 / US 2","S / EU 36 / UK 8 / US 4","M / EU 38 / UK 10 / US 6",
		"L / EU 40 / UK 12 / US 8","XL / EU 42 / UK 14 / US 10","XXL / EU 44 / UK 16 / US 12","XXXL / EU 46 / UK 20 / US 16","Free Size",
		"Others"];	

	}else if ((a == "Jacket, Coat and Outwear" || a == "Tops" || a =="Bottom") && b == "Male"){		//men
		var array = ["XXS / EU 44 / UK 34 / US 34","XS / EU 46 / UK 36 / US 36","S / EU 48 / UK 38 / US 38","M / EU 50 / UK 40 / US 40",
		"L / EU 52 / UK 42 / US 42","XL / EU 54 / UK 44 / US 44","XXL / EU 56 / UK 46 / US 46","XXXL / EU 58 / UK 48 / US 48","Free Size",
		"Others"];	
	}

	var string = "";
	let length = array.length;
	for (let i = 0; i < length; i++){
		string = string + "<option>"+ array[i]+"</option>";
	}

	size_f.innerHTML = "<option disabled selected>Select a Size</option>" + string;	
	
}

function input_size(){
	var txt = document.getElementById("size_txt_fashion");
	txt.value = size_f.value;	
	if(txt.value == "Others"){
		txt.style.display = "block";
		document.getElementById("size_txt_fashion").value = "";	
		validation2('7');
	}else{
		txt.style.display = "none";
		validation2('7');
	}
}

function qtychange1(){		//for optional details
	const s = document.getElementById("qty_fashion");
	const s1 = document.getElementById("qty_txt_fashion");

	if(s.checked == true){
		s1.value = "MORE";
	}else if(s.checked == false){
		s1.value = "ONE";
	}
}

//show the location textbox
function addlocation1(){
	const m = document.getElementById("meet_fashion");

	if(m.checked == true){
		document.getElementById("location-txt_fashion").style.display = "block";
		add_f.value = "";	
	}else if (m.checked == false){
		document.getElementById("location-txt_fashion").style.display = "none";
		add_f.value = "";
	}
}

//show the email textbox
function addmail1(){
	const n = document.getElementById("mail_fashion");
	
	if(n.checked == true){
		document.getElementById("email-box_fashion").style.display = "block";
		mail_txt_f.value = "";		
	}else if (n.checked == false){
		document.getElementById("email-box_fashion").style.display = "none";
		mail_txt_f.value = "";	
	}
}


function validation2(a){
	if(a == 1){
		val1_f.style.color = "red";

		if(productname_f.value.length === 0){
			val1_f.innerHTML = "Please fill this in";
			key1_f = 0;
		}else if (special_char_prod.test(productname_f.value)){
			val1_f.innerHTML = "Product Name may contain only letters (a-z), numbers (0-9), dashes (-),slash (/),or parenthesis ( () )";
			key1_f = 0;
		}else{
			val1_f.style.color = "white";
			key1_f = 1;
		}

	}if(a == 2){

		key2_f = 1;

	}if(a == 3){

		if(prcinput_f.value.length === 0){
			val3_f.style.color = "red";
			val3_f.innerHTML = "price field is required";
			key3_f = 0;
		}else{
			val3_f.style.color = "white";
			val3_f.innerHTML = "very good";
			key3_f = 1;
		}

	}if(a == 4){
		document.getElementById("v5_6").innerHTML = desc_f.value.length + "/255";

	}if(a == 5){
		if(type_f.value == ""){
			val4_f.style.color = "red";
			gender_f.disabled = true;
			key4_f = 0;
		}else if (type_f.value != ""){
			val4_f.style.color = "white";
			gender_f.disabled = false;
			key4_f = 1;
		}

	}if(a == 6){
		if(gender_f.value == ""){
			val5_f.style.color = "red";
			size_f.disabled = true;
			key5_f = 0;
		}else if (gender_f.value != ""){
			val5_f.style.color = "white";
			size_f.disabled = false;
			key5_f = 1;
		}
		
	}if(a == 7){
		var txt = document.getElementById("size_txt_fashion");

		if(txt.value == ""){
			val6_f.style.color = "red";
			key6_f = 0;
		}else{
			val6_f.style.color = "white";
			key6_f = 1;
		}
	
	}if(a == 8){
		const d1 = document.getElementById("deal1_fashion");
		const d2 = document.getElementById("deal2_fashion");

		if(meet_f.checked == true || mail_f.checked == true){
			if(add_f.value == ""){
				val7_f.style.color = "red";
				val7_f.innerHTML = "Please fill this in";
				key7_f = 0;
				d1.value = "";	
			}else{
				val7_f.style.color = "white";
				key7_f = 3;
				d1.value = "Meet-up";	
			}

			if(mail_txt_f.value == ""){
				val8_f.style.color = "red";
				val8_f.innerHTML = "Please fill this in";
				key8_f = 0;
				d2.value = "";
			}else{
				val8_f.style.color = "white";
				key8_f = 2;
				d2.value = "Mailing & Delivery";
			}
		}else{
			key7_f = 0;
			key8_f = 0;
		}
	
	}if(a == 9){
		var file = document.getElementById("file_fashion");
		if(file.files.length > 10 || file.files.length == 0 ){
			key9_f = 0;   
			val9_f.style.color = "red";
		}else{
			key9_f = 1;
			val9_f.style.color = "white";
		}
	}
	
	keyopen1(key1_f,key2_f,key3_f,key4_f,key5_f,key6_f,key7_f,key8_f, key9_f);
}

function keyopen1(a,b,c,d,e,f,g,h,i){
	if(a && b && c && d && e && f && i == 1 && (((g == 3 && h == 2)||((g == 0 && h == 2)||(g == 3 && h == 0))))){
		listbtn_f.disabled = false;
	}else{
		listbtn_f.disabled = true;
	}
	//console.log(a +" " + b +" " +c+" " +d+" " +e+" " +f + " " +g +" "+ h + " " + i );

	//alert(a +" " + b +" " +c+" " +d+" " +e+" " +f + " " +g +" "+ h + " " + i );
}

function clearAll(){
	
}

function date(){
    const day = new Date().toLocaleDateString('en-us',{day:"numeric"});
    const month = new Date().toLocaleDateString('en-us',{month:"numeric"});
    const year = new Date().toLocaleDateString('en-us',{year:"numeric"});

    document.getElementById("text-time").value = year +"-"+month + "-"+day;
	document.getElementById("text-time1").value = year +"-"+month + "-"+day;
}



