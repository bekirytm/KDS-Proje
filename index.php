<?php
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="stil.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
      #cıkıs{
        float: right;
        margin-bottom:  15px;
        margin-right: 100px;
      }
    </style>

    <title>Paketini Yap</title>
  </head>
  <body >

    <nav class="navbar sticky-top navbar-success bg-dark" style="height:110px">
      <a class="navbar-brand" href="#">


        <div style="margin-left:30px;font-style:Tahoma;height:50px;width:200px;margin-top:20px;">
           <?php
              echo  $_SESSION["eposta"];
          ?>
        </div>

      </a>

      <div style="float:right">
        <ul class="nav justify-content-end">
            <li class="nav-item">
              <div id="cıkıs" style="margin-top:20px">
                <a href="http://localhost/cikis.php">
                    <button type="button" class="btn btn-secondary">Çıkış Yap</button>
                </a>
              </div>

            </li>
        </ul>
      </div>
    </nav>





<center>
  <div style="padding-top:50px">
    <h3 style="font-style:Tahoma;text-align:center">KENDİ PAKETİNİZİ KENDİNİZ DÜZENLEYİN.</h3>

  </div>



    <div id="uye" class="shadow-none p-3 mb-5 bg-light rounded" style="width: 750px;height: 500px;margin-top: 20px">
        <form id="form1" name="paket-form" method="post" action="paketolustur.php" >
        <div style="width:430px;height:500px;float: left" >
            <div>
                <div style="width:430px;float:left">
                    <label style="float: left">Dakika</label><br><br>
                    <input type="range"  max="5000" min="0" value="0" step="50" id="dakika-deger" name="dakika_deger" class="custom-range" oninput="dakikarange()">
                    <br><br>
                </div>

            </div>

            <div>
                <div style="width:430px;float:left">
                    <label style="float: left">SMS</label><br><br>
                    <input type="range"  max="5000" min="0" value="0" step="100" id="sms-deger" name="sms_deger" class="custom-range" oninput="smsrange()">
                    <br><br>
                </div>

            </div>


                <div>
                    <div  style="width:430px;float:left">
                        <label style="float: left">İnternet</label><br><br>
                        <input type="range"   max="10000" min="0" value="0" step="1000" id="net-deger" name="net_deger" class="custom-range" oninput="netrange()">
                    </div>
                </div>

                <button id="btn" type="submit"  class="btn btn-secondary">Paket Oluştur</button>

        </div>

        <div id="sonuc" style="">

            <div id="snc" style="float:left">

                <div class="bir">
                    <p class="degerler"> <span id="dkvalue"> </span> Dakika</p>
                </div>

                <div class="iki">
                    <p class="degerler"><span id="smsvalue"> </span> SMS</p>
                </div>

                <div class="uc">
                    <p class="degerler"><span id="netvalue"> </span> GB</p>
                </div>

                <div class="dort">
                    <p class="degerler"><span id="totalvalue"> </span> TL</p>
                </div>

            </div>

        </div>

        </form>


    </div>
</center>



    <script src="app.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




  </body>
</html>
