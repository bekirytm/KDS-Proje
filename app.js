function packet(){


  alert("Paketiniz Yapılacak Onaylıyor Musunuz ?");

}




function dakikarange(){
    var dk = document.getElementById("dakika-deger").value;
    var dkd = document.getElementById("dkvalue");
    dkd.innerHTML = dk;
    var dk_price = dk/25;

    let sms = document.getElementById("sms-deger").value;
    var sms_price = sms/50;

    let net = document.getElementById("net-deger").value;
    var net_price = net*0.006;


    var total = document.getElementById("totalvalue");
    total.innerHTML = (sms_price) + (dk_price) + (net_price);

}




function smsrange(){
    let sms = document.getElementById("sms-deger").value;
    let smsd = document.getElementById("smsvalue");
    smsd.innerHTML = sms;
    var sms_price = sms/50;

    var dk = document.getElementById("dakika-deger").value;
    var dk_price = dk/25;

    let net = document.getElementById("net-deger").value;
    var net_price = net*0.006;


    var total = document.getElementById("totalvalue");
    total.innerHTML = (sms_price) + (dk_price) + (net_price);



}



function netrange(){
    let net = document.getElementById("net-deger").value;
    let netd = document.getElementById("netvalue");
    var net_price;


    if( net == 0){
        netd.innerHTML = "0";
        net_price = 0;
    }
    else if(net == 1000){
        netd.innerHTML = "1";
        net_price = 6;
    }
    else if(net == 2000){
        netd.innerHTML = "2";
        net_price = 12;
    }
    else if(net == 3000){
        netd.innerHTML = "3";
        net_price = 18;
    }
    else if(net == 4000){
        netd.innerHTML = "4";
        net_price = 24;
    }
    else if(net == 5000){
        netd.innerHTML = "5";
        net_price = 30;
    }
    else if(net == 6000){
        netd.innerHTML = "6";
        net_price = 36;
    }
    else if(net == 7000){
        netd.innerHTML = "7";
        net_price = 42;
    }
    else if(net == 8000){
        netd.innerHTML = "8";
        net_price = 48;
    }
    else if(net == 9000){
        netd.innerHTML = "9";
        net_price = 54;
    }
    else if(net == 10000){
        netd.innerHTML = "10";
        net_price = 60;
    }

    let sms = document.getElementById("sms-deger").value;
    var sms_price = sms/50;
    var dk = document.getElementById("dakika-deger").value;
    var dk_price = dk/25;
    var total = document.getElementById("totalvalue");
    total.innerHTML = (sms_price) + (dk_price) + (net_price);

}















//
//   const total = document.getElementById("totalvalue");
//   total.innerHTML = dkd/50;
//   total.innerHTML = (dk_price.value)+(sms_price.value);
//
// function dakikarange(){
//    const total = document.getElementById("totalvalue");
//    let smsd = document.getElementById("smsvalue").value;
//    let dkd = document.getElementById("smsvalue").value;
//    let netd = document.getElementById("smsvalue").value;
//    total.innerHTML = (smsd/25);
// }
