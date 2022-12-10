
changeuser();

function changeuser(){
    const id = document.getElementById("id");
    if(id.value == " "){
        document.getElementById("3").style.display = "block";
        document.getElementById("4").style.display = "block";
        document.getElementById("1").style.display = "none";
        document.getElementById("2").style.display = "none";
        document.getElementById("a").href = "php/login.php";
    }else{
        document.getElementById("1").style.display = "block";
        document.getElementById("2").style.display = "block";
        document.getElementById("3").style.display = "none";
        document.getElementById("4").style.display = "none";
        document.getElementById("a").href = "listing.php";
        //document.getElementById("chat").href = "php/register.php";

    }
}