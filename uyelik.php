<?php
if($_POST) {
  session_start();
  require("connection.php");

    $isim = $_POST["firstname"];
    $soyisim = $_POST["lastname"];
    $email = $_POST["user_email"];
    $password = $_POST["reg_user_password"];
    $phone = $_POST["sayisal"];
    $dogum = $_POST["dgm"];
    $sehir = $_POST["user_sehir"];
    $meslek = $_POST["meslek"];
    $cinsiyet = $_POST["cinsiyet"];

    $query = mysqli_query($connect_db, "SELECT count(u_id) FROM users WHERE u_email = '".$email."' ");
    $queryRow = mysqli_fetch_row($query);
    if($queryRow[0] == 0){

      $_SESSION["eposta"] = $email;

      $add = mysqli_query($connect_db, "INSERT INTO users (u_ad, u_soyad, u_email, u_sifre, u_phone, u_yas, u_gender, u_il, u_meslek)
      VALUES('".$isim."', '".$soyisim."', '".$email."', '".$password."', '".$phone."', '".$dogum."', '".$cinsiyet."', '".$sehir."', '".$meslek."')");
      echo 1;

    } else {
      echo 0;
    }
  }

?>
