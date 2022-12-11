function load(){
    onload_changes();
    change_value();
    value_select();
}

function backtozero(){
    const neg = document.querySelectorAll(".neg");
    document.querySelector(".form-control").value = "";

    for (let i = 0; i < 5; i++){
        neg[i].selectedIndex = 0;
    }

    change_value();
    value_select();
}

const cat_txt = document.getElementById("cat_txt");
const type_txt = document.getElementById("type_txt");
const con_txt = document.getElementById("condition_txt");
const prc_txt = document.getElementById("price_txt");
const deal_txt = document.getElementById("deal_txt");
const cat = document.getElementById("cat");
const type = document.getElementById("type");
const con = document.getElementById("condition");
const prc = document.getElementById("price");
const deal = document.getElementById("deal");
const namea = document.getElementById("name");

function change_value(){

    var array = [];
    if(cat.value == "Bike"){
        array = ["Mountain Bike","Road Bikes","Foldable Bikes","E-Bikes","Parts & Accessories","Children Bikes","Other Bicycles"];
        type.disabled = false;
    }else if(cat.value == "Fashion"){
        array = ["Bottom","Footwear","Jacket, Coat and Outwear","Tops"];
        type.disabled = false;
    }else{
        array = [];
    }

    var string = "";
	let length = array.length;
	for (let i = 0; i < length; i++){
        string = string + "<option>"+ array[i]+"</option>";
	}

    type.innerHTML = "<option value=' ' selected>Type</option>" + string;	

    var fortype = document.getElementById("fortype");

    for (var i= 0, n= type.length; i < n ; i++) {
        if (type[i].value==fortype.value) {
            type.selectedIndex = i;
            break;
        }
    }
	
}

function value_select(){
    if (type.value != ""){
        //type_txt.value = type.value;
        //type_txt.value = "PRODUCT_TYPE = '" + type.value + "'";
        type_txt.value = type.value;
    }else{
        type_txt.value = "";
    }

    if (con.value != ""){
        //con_txt.value = con.value;
        con_txt.value = "PRODUCT_CONDITION = '" + con.value + "'";
    }else{
        con_txt.value = "PRODUCT_CONDITION != ' '";
    }

    if (prc.value != ""){
        if(prc.value == 1){
            //prc_txt.value = prc.value;
            prc_txt.value = "PRODUCT_PRICE > '" + prc.value + "'";
        }else if (prc.value == 0){
            prc_txt.value = "PRODUCT_PRICE = '" + prc.value + "'";
        }
    }else{
        prc_txt.value = "PRODUCT_PRICE != '-1' ";
    }

    if (deal.value != ""){
        //deal_txt.value = deal.value;
        deal_txt.value = "PRODUCT_DEALMETHOD = '" + deal.value + "'";
    }else{
        deal_txt.value = "PRODUCT_DEALMETHOD != ' '";
    }

    if(namea.value != ""){
        //cat_txt.value = namea.value;
        cat_txt.value = "PRODUCT_NAME = '" + namea.value + "'";
    }else{
        cat_txt.value = "PRODUCT_NAME != ' '";
    }
}

function onload_changes(){
    var forcondition = document.getElementById("forcondition");
    var forprice = document.getElementById("forprice");
    var fordeal = document.getElementById("fordeal");
    var forcat = document.getElementById("forcat");

    for (var i= 0, n= cat.length; i < n ; i++) {
        if (cat[i].value==forcat.value) {
            cat.selectedIndex = i;
            break;
        }
    }

    for (var i= 0, n= con.length; i < n ; i++) {
        if (con[i].value==forcondition.value) {
            con.selectedIndex = i;
            break;
        }
    }


    for (var i= 0, n= prc.length; i < n ; i++) {
        if (prc[i].value==forprice.value) {
            prc.selectedIndex = i;
            break;
        }
    }

    for (var i= 0, n= deal.length; i < n ; i++) {
        if (deal[i].value==fordeal.value) {
            deal.selectedIndex = i;
            break;
        }
    }
}


