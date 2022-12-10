removebtn();

const first_let = "a";
const user_pic = " ";

function page_next(a){

    const text1 = document.getElementById("text1");
    const text2 = document.getElementById("text2");
    const desc = document.getElementById("box1");
    const seller = document.getElementById("box2");

    if(a == 0){
        desc.style.display ="block";
        seller.style.display = "none";
        text1.style.color ="#008fee";
        text1.style.borderBottom ="2px solid #008fee";
        text2.style.color ="rgb(108, 117, 125, 0.75)";
        text2.style.borderBottom ="2px solid #ced4da";
        
    }else if(a == 1){
        seller.style.display = "block";
        desc.style.display ="none";
        text2.style.color ="#008fee";
        text2.style.borderBottom ="2px solid #008fee";
        text1.style.color ="rgb(108, 117, 125, 0.75)";
        text1.style.borderBottom ="2px solid #ced4da"; 
    }
}

function changeprod(){
    var d = document.getElementById('deal');
    var mail = document.getElementById('mail');
    var meet = document.getElementById('meet');
    var cat = document.getElementById('cat');
    var g = document.getElementById('gender');
    var s = document.getElementById('size');

    if (d.textContent == "Meet-up "){
        mail.style.display = "none";
    }else if(d.textContent == " Mailing & Delivery"){
        meet.style.display = "none";
    }else{

    }

    if(cat.value == "Fashion"){
        g.style.display = "block";
        s.style.display = "block";
    }else{
        g.style.display = "none";
        s.style.display = "none";
    }
}

function removebtn(){
    var bat1 = document.getElementById('1btn');
    var bat2 = document.getElementById('2btn');
    var a = document.getElementById('count');
    if(a.textContent == 1){
        bat1.style.display = 'none';
        bat2.style.display = 'none';
    }
}