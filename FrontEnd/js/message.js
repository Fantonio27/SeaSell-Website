date();

function gettime(){
    var d = new Date();
    var h = d.getHours(); 
    var m = d.getMinutes(); 
    var s = d.getSeconds(); 
    
    let time = h + ":"+  m + ":" + s;
    document.getElementById("time").value = time;
}

function date(){
    const day = new Date().toLocaleDateString('en-us',{day:"numeric"});
    const month = new Date().toLocaleDateString('en-us',{month:"numeric"});
    const year = new Date().toLocaleDateString('en-us',{year:"numeric"});
    
    document.getElementById("date").value = year +"-"+month + "-"+day;
}
var text = document.getElementById("text");

function number_input(){
    var num = document.getElementById("number");

    num.innerHTML = text.value.length + "/200";
}
