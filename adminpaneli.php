<?php
  session_start();
 ?>

 <?php
 require("connection.php");
 $sorgu=mysqli_query($connect_db,"SELECT packet.p_id, count( u_id ) AS count_packet, dakika.d_detail, sms.s_detail, internet.i_detail
 FROM user_packet
 LEFT JOIN packet
 ON user_packet.p_id = packet.p_id
 LEFT JOIN dakika
 ON packet.d_id = dakika.d_id
 LEFT JOIN sms
 ON packet.s_id = sms.s_id
 LEFT JOIN internet
 ON packet.i_id = internet.i_id
 GROUP BY packet.p_id
 ORDER BY count_packet DESC
 LIMIT 10");


 $data1=array(["Paket","Satış Miktarı"]);
 $data2=array(["Paket", "Dakika", "Sms", "İnternet"]);
 $data3=array([""]);
 while($row = mysqli_fetch_assoc($sorgu)){
   $data1[] = ["Paket ".$row["p_id"], (int)$row["count_packet"]];
   $data2[] = ["Paket ".$row["p_id"], (int)$row["d_detail"], (int)$row["s_detail"], (int)$row["i_detail"]];
 }
 ?>
 <?php
   require("connection.php");
   $sorgu2 = mysqli_query($connect_db,"SELECT ROUND(AVG(dakika.d_detail)) as dakika_avg, ROUND(AVG(sms.s_detail)) as sms_avg, ROUND(AVG(internet.i_detail)) as net_avg
   FROM users
   LEFT JOIN user_packet ON user_packet.u_id=users.u_id
   LEFT JOIN packet ON user_packet.p_id=packet.p_id
   LEFT JOIN dakika
   ON packet.d_id = dakika.d_id
   LEFT JOIN sms
   ON packet.s_id = sms.s_id
   LEFT JOIN internet
   ON packet.i_id = internet.i_id
   GROUP BY users.u_gender");


   $veri1=array(["Oranlar","Erkek","Kadın"]);
   $baslik=array(["Erkek","Kadın"]);
   $oran = array("Oranlar");
   $yaz1=array("Dakika");
   $yaz2=array("SMS");
   $yaz3=array("İnternet");
   while($row2 = mysqli_fetch_assoc($sorgu2)){
     $veri1[] = [(int)$row2["dakika_avg"], (int)$row2["sms_avg"], (int)$row2["net_avg"]];
   }
   $as = array($baslik[0][0],$baslik[0][1]);
   $yeni = array ($veri1[1][0],$veri1[2][0]);
   $yeni1 = array ($veri1[1][1],$veri1[2][1]);
   $yeni2 = array ($veri1[1][2],$veri1[2][2]);

 //EN SON BURDA KALDIM BAŞLARINA VERİ GİRMEDİĞİ İÇİN GRAFİK VERMİYOR:
   // $aaa = array("Oranlar","Erkek","Kadın");

   $son = array_merge($oran,$as,$yaz1,$yeni,$yaz2,$yeni1,$yaz3,$yeni2);
     // $son = array_merge($yeni,$yeni1,$yeni2);
   $veri1 = array_chunk($son,3);
   // array_push($aaa,$veri1);





 ?>

<!DOCTYPE html>
<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="admin.css">

  <title>Admin Paneli</title>

  <script src="admin.js"></script>



</head>
<body >
  <nav class="navbar sticky-top navbar-success bg-dark" style="height:110px">
    <a class="navbar-brand" href="#">
<!-- DİSPLAY ÇALIŞMIYORRRRR  -->

      <div style="margin-left:30px;font-style:Tahoma;height:50px;width:200px;margin-top: 15px;text-align:center">
        <h3>ADMİN PANELİ</h3>
      </div>

    </a>

    <div style="float:right">
      <ul class="nav justify-content-end">

          <li class="nav-item">
            <div id="cıkıs" style="">
              <a href="http://localhost/cikis.php">
                  <button type="button" class="btn btn-secondary">Çıkış Yap</button>
              </a>
            </div>

          </li>
      </ul>
    </div>
  </nav>






      <div id="menu" style="width:100px;height:250px;margin-top:90px;margin-left:60px;float:left">
        <ul>
            <li>
                <a href="#" onclick="tablo1()" >Satış Grafiği</a>
            </li>
            <li>
                  <a href="#" onclick="tablo2()">Ayrıntılar</a>
            </li>
            <li>
                <a href="#" onclick="tablo3()">Kadın Erkek Oranları</a>
            </li>
            <li>
                <a href="#">Hakkında</a>
            </li>
            <li>
                <a href="#">İletişim</a>
            </li>
        </ul>
      </div>





<div id="analiz">
      <div  id="chart1_div"></div>

      <div  style="" id="chart2_div"></div>

      <div style="" id="columnchart_material" ></div>

</div>




 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script>
  let val1 = <?php echo json_encode($data1) ?>;
  let val2 = <?php echo json_encode($data2) ?>;

  console.log(val1);
  console.log(val2);

  google.charts.load('current', {packages: ['corechart', 'bar']});
  google.charts.setOnLoadCallback(drawStacked1);
  google.charts.setOnLoadCallback(drawStacked2);


  function drawStacked1() {
        var data = google.visualization.arrayToDataTable(val1);

        var options = {
          title: 'En Çok Tercih Edilen Paketler Grafiği',
          chartArea: {width: '50%'},
          height: 500,
          isStacked: true,
          bar: { groupWidth: '75%' },
          hAxis: {
            title: 'Satış Miktarları',
            minValue: 0,
          },
          vAxis: {
            title: 'Paketler'
          }
        };
        var chart = new google.visualization.BarChart(document.getElementById('chart1_div'));
        chart.draw(data, options);
      }

  function drawStacked2() {
        var data = google.visualization.arrayToDataTable(val2);

        var options = {
          title: 'En Çok Tercih Edilen Paketlerin Ayrıntıları',
          chartArea: {width: '50%'},
          height: 500,
          isStacked: true,
          bar: { groupWidth: '75%' },
          hAxis: {
            title: 'Satış Miktarları',
            minValue: 0,
          },
          vAxis: {
            title: 'Paketler'
          }
        };
        var chart = new google.visualization.BarChart(document.getElementById('chart2_div'));
        chart.draw(data, options);
      }
  </script>




  <script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});

    let val3 = <?php echo json_encode($veri1) ?>;
    console.log(val3);

    google.charts.setOnLoadCallback(drawChart3);

    function drawChart3() {
      var data = google.visualization.arrayToDataTable(val3);

      var options = {
        chart: {
          title: 'Kadın ve Erkek için Kullanım Oranları',
          subtitle: '',
          colors: ['pink','blue']
        }
      };

      var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    }
  </script>

</body>
</html>
