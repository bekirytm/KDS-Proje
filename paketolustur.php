
<?php
if($_POST) {

  session_start();
  require("connection.php");

  $dakika_deger = $_POST["dakika_deger"];
  $sms_deger = $_POST["sms_deger"];
  $net_deger = $_POST["net_deger"];

  $userControl = mysqli_query($connect_db, "SELECT u_id FROM users WHERE u_email = '".$_SESSION["eposta"]."' ");
  $userRow = mysqli_fetch_row($userControl);
  $user_id = $userRow[0];

  $dbControl=mysqli_query($connect_db, "SELECT d_id, d_price FROM dakika WHERE d_detail = '".$dakika_deger."'");
  $dbValue = mysqli_fetch_row($dbControl);
  $d_id = $dbValue[0];
  $d_price = $dbValue[1];

  $dbControl=mysqli_query($connect_db, "SELECT s_id,s_price FROM sms WHERE s_detail = '".$sms_deger."'");
  $dbValue = mysqli_fetch_row($dbControl);
  $s_id = $dbValue[0];
  $s_price = $dbValue[1];

  $dbControl=mysqli_query($connect_db, "SELECT i_id,i_price FROM internet WHERE i_detail = '".$net_deger."'");
  $dbValue = mysqli_fetch_row($dbControl);
  $i_id = $dbValue[0];
  $i_price = $dbValue[1];




  $dbControl=mysqli_query($connect_db, "SELECT count(p_id), p_id FROM packet WHERE d_id = '".$d_id."' AND s_id = '".$s_id."' AND i_id = '".$i_id."'");
  $dbValue = mysqli_fetch_row($dbControl);

  if($dbValue[0] == 0) {

    $total_price = $d_price + $s_price + $i_price;
    $dbControl=mysqli_query($connect_db, "INSERT INTO packet (d_id, s_id, i_id, total_price) VALUES ('".$d_id."', '".$s_id."', '".$i_id."', '".$total_price."')");
    $last_packet_id = mysqli_insert_id($connect_db);


    $addUp = mysqli_query($connect_db, "INSERT INTO user_packet (u_id, p_id) VALUES('".$user_id."','".$last_packet_id."')");

  } else {

    $addUp = mysqli_query($connect_db, "INSERT INTO user_packet (u_id, p_id) VALUES('".$user_id."','".$dbValue[1]."')");

  }


header("refresh:3;url=index.php");
die("<br>"."<center>Paketiniz Yapılmıştır. Birazdan yönlendirileceksiniz.</center>");



  // echo ("Paketiniz Yapılmıştır ");
  //
  // $url = htmlspecialchars($_SERVER['HTTP_REFERER']);  // hangi sayfadan gelindigi degerini verir.
  // echo "<a href='$url'><button>önceki sayfa</button></a>"; // dugmeye o degeri atiyoruz.


}
 ?>
