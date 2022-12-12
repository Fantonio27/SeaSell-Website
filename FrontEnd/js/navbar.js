changeuser();

function changeuser(){
    const id = document.getElementById("id");
    const seller = document.getElementById("sell");

    if(id.value == ""){
        document.getElementById("3").style.display = "block";
        document.getElementById("4").style.display = "block";
        document.getElementById("1").style.display = "none";
        document.getElementById("2").style.display = "none";
        document.getElementById("a").href = "php/login.php";
        document.getElementById("chat1").style.display = "none";
        document.getElementById("view").style.margin = "0px";
        document.getElementById("view").style.float = "none";
    }else{
        document.getElementById("1").style.display = "block";
        document.getElementById("2").style.display = "block";
        document.getElementById("3").style.display = "none";
        document.getElementById("4").style.display = "none";
        document.getElementById("a").href = "listing.php";
    }

    if(id.value == seller.value){
        document.getElementById("chat1").style.display = "none";
        document.getElementById("view").style.margin = "0px";
        document.getElementById("view").style.float = "none";
    }
}