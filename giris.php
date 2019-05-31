<?php
session_start();
if(isset($_SESSION["eposta"])) {
  echo $_SESSION["eposta"];


}
?>



<!doctype html>
<html lang="tr">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Uyelik Sistemi </title>

  </head>




  <body id="body" >

    <div >
        <button onclick="uye_ol()" id="butonn" type="button" class="btn btn-secondary btn-lg btn-block" style="width:250px;margin-top: 50px
        ;margin-left: 1200px">Üye Ol</button>
    </div>


    <!--GİRİŞ YAPMA-->
    <center>
    <div id="giris" class="shadow-none p-3 mb-5 bg-light rounded" style="margin-top: 70px;padding-top: 10px;width:700px;height:350px">

            <div class="alert alert-secondary alert-lg" style="width:550px;margin-top:20px">
                <h5 style="margin-top: 5px;text-align: center">Kullanıcı Girişi</h5>
            </div>


            <form id="x" name="x" method="post">
                    <div id="giris" style="width:550px">
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping" style="width:115px;text-align: center">Email:</span>
                            </div>
                            <input type="text" name="user_email" id="user_name" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" required>
                        </div>
                    </div>

                    <div id="sifre" style="width:550px;margin-top:20px">
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping" style="width:115px;text-align: center">Şifre:</span>
                            </div>
                            <input type="password" name="user_password" id="user_password" class="form-control"  placeholder="Password" aria-label="Username" aria-describedby="addon-wrapping" maxlength="8" required>
                        </div>
                    </div>

                    <button id="login" type="button" class="btn btn-secondary btn-lg btn-block" style="width:550px;margin-top:20px">Giriş Yap</button>
            </form>
    </div>
</center>



<!--LOADİNG-->
<div id="loading" style="display:none;margin-top:250px">
<center>
    <div style="width:250px">
        <div class="spinner-border text-dark" role="status">

        </div>
    </div>
</center>
</div>





<!--ÜYE OLMA FORMU-->
<center>
    <div id="geri" style="display:none">
      <nav class="navbar sticky-top navbar-success bg-dark" style="height:110px">
        <a class="navbar-brand" href="#">


          <div style="margin-left:30px;font-style:Tahoma;height:50px;width:200px;margin-top:20px;">

          </div>

        </a>

        <div style="float:right">
          <ul class="nav justify-content-end">
              <li class="nav-item">
                <div id="cıkıs" style="margin-top:15px;margin-right:10px">
                  <a href="http://localhost/giris.php">
                      <button type="button" class="btn btn-secondary">Giriş Sayfasına Dön</button>
                  </a>
                </div>

              </li>
          </ul>
        </div>
      </nav>

    </div>

    <div id="uye" class="shadow-none p-3 mb-5 bg-light rounded" style="display: none;margin-top:50px;width:850px">

            <div class="alert alert-secondary alert-lg" style="width:550px;margin-top:10px">
                <h5 style="margin-top: 5px;text-align: center">Üye olma </h5>
            </div>

        <form style="width:700px;margin-top:40px;" method="POST" >

            <div class="form-group row">
                <label for="inputEmail3"  class="col-sm-2 col-form-label">İsim:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="İsim" required>
                </div>
            </div>


            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Soyisim:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Soyisim" required>
                </div>
            </div>



            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Email" required>
                </div>
            </div>


            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Şifre:</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="reg_user_password" name="user_password" placeholder="Şifre" required>
                </div>
            </div>


            <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Telefon:</label>
                    <div class="col-sm-10" style="width:100px">
                        <input type="text" class="form-control" id="sayisal" maxlength="" name="user_phone" onkeypress="return sayiKontrol(event)" placeholder="+09" required>
                    </div>
            </div>

            <div class="form-group row">
                    <label for="inputEmail3" style="font-size:16px" class="col-sm-2 col-form-label">Doğum Tarihi:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="dgm" name="dgmtarih" placeholder="Date of Birth"  required>
                    </div>
            </div>


            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Şehir:</label>
              <div class="col-sm-10" style="width:100px">
                <select class="form-control" id="user_sehir" name="user_sehir">
                    <option >Adana</option>
                    <option >Adıyaman</option>
                    <option >Afyonkarahisar</option>
                    <option >Ağrı</option>
                    <option >Amasya</option>
                    <option >Ankara</option>
                    <option >Antalya</option>
                    <option >Artvin</option>
                    <option >Aydın</option>
                    <option >Balıkesir</option>
                    <option >Bilecik</option>
                    <option >Bingöl</option>
                    <option >Bitlis</option>
                    <option >Bolu</option>
                    <option >Burdur</option>
                    <option >Bursa</option>
                    <option >Çanakkale</option>
                    <option >Çankırı</option>
                    <option >Çorum</option>
                    <option >Denizli</option>
                    <option >Diyarbakır</option>
                    <option >Edirne</option>
                    <option >Elazığ</option>
                    <option >Erzincan</option>
                    <option >Erzurum</option>
                    <option >Eskişehir</option>
                    <option >Gaziantep</option>
                    <option >Giresun</option>
                    <option >Gümüşhane</option>
                    <option >Hakkâri</option>
                    <option >Hatay</option>
                    <option >Isparta</option>
                    <option >Mersin</option>
                    <option >İstanbul</option>
                    <option >İzmir</option>
                    <option >Kars</option>
                    <option >Kastamonu</option>
                    <option >Kayseri</option>
                    <option >Kırklareli</option>
                    <option >Kırşehir</option>
                    <option >Kocaeli</option>
                    <option >Konya</option>
                    <option >Kütahya</option>
                    <option >Malatya</option>
                    <option >Manisa</option>
                    <option >Kahramanmaraş</option>
                    <option >Mardin</option>
                    <option >Muğla</option>
                    <option >Muş</option>
                    <option >Nevşehir</option>
                    <option >Niğde</option>
                    <option >Ordu</option>
                    <option >Rize</option>
                    <option >Sakarya</option>
                    <option >Samsun</option>
                    <option >Siirt</option>
                    <option >Sinop</option>
                    <option >Sivas</option>
                    <option >Tekirdağ</option>
                    <option >Tokat</option>
                    <option >Trabzon</option>
                    <option >Tunceli</option>
                    <option >Şanlıurfa</option>
                    <option >Uşak</option>
                    <option >Van</option>
                    <option >Yozgat</option>
                    <option >Zonguldak</option>
                    <option >Aksaray</option>
                    <option >Bayburt</option>
                    <option >Karaman</option>
                    <option >Kırıkkale</option>
                    <option >Batman</option>
                    <option >Şırnak</option>
                    <option >Bartın</option>
                    <option >Ardahan</option>
                    <option >Iğdır</option>
                    <option >Yalova</option>
                    <option >Karabük</option>
                    <option >Kilis</option>
                    <option >Osmaniye</option>
                    <option >Düzce</option>
                  </select>
                </div>
            </div>



            <div class="form-group row">
                <label for="inputEmail3"  class="col-sm-2 col-form-label">Meslek:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="meslek" name="userjob" placeholder="Meslek" required>
                </div>
            </div>


            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Cinsiyet:</label>
              <div class="col-sm-10" style="width:100px">
                <select class="form-control" id="cinsiyet" name="cinsiyet">
                  <option value="kadın">Kadın</option>
                  <option value="erkek">Erkek</option>
                </select>
            </div>









            <button id="register" type="button" style="margin-left:320px;margin-top:15px"  class="btn btn-outline-dark">Kaydol</button>

        </form>


    </div>
</center>




<!--
<button type="button" onclick="arkarenk()" class="btn btn-dark" style="margin-left: 25px">Dark Mode</button>
 -->

    <script src="uye.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script>
      $("#login").click(function () {
        $.ajax({
          type: "POST",
          url: "kontrol.php",
          data: {user_name: user_name.value, user_password: user_password.value},
          success: function(result){
            if(result == 1){
              window.location.assign("http://localhost/index.php");
            } else {
              alert("Yanlış eposta veya şifre.");
            }
          }
        });
      });

      $("#register").click(function () {
        $.ajax({
          type: "POST",
          url: "uyelik.php",
          data: {firstname: firstname.value, lastname: lastname.value, user_email: user_email.value, reg_user_password: reg_user_password.value, sayisal: sayisal.value, dgm: dgm.value, user_sehir: user_sehir.value, meslek: meslek.value, cinsiyet: cinsiyet.value},
          success: function(result){
            alert(result);
            if(result == 1){
              window.location.assign("http://localhost/index.php");
            } else {
              alert("Bu eposta ile kayıt var.");
            }
          }
        });
      });
    </script>
  </body>
</html>
