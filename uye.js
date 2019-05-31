function uye_ol(){

    var grs = document.getElementById("giris");
    var load = document.getElementById("loading");
    var uye = document.getElementById("uye");
    var btn = document.getElementById("butonn");
    var geri = document.getElementById("geri");
    btn.style.display = "none";
    grs.style.display = "none";

    load.style.display = "block";
    setTimeout(function(){
        load.style.display = "none";
        geri.style.display = "block";
        uye.style.display = "block"}, 1500);

}

// function arkarenk(){
//     var b = document.getElementById("body");
//     b.style.backgroundColor="#141d26";
//
// }
