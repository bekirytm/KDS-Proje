<?php
if($_POST) {
  require("connection.php");
  session_start();

  $user_name=$_POST["user_name"];
  $user_password=$_POST["user_password"];

  $query = mysqli_query($connect_db, "SELECT count(u_id) FROM users WHERE u_email = '".$user_name."' ");
  $queryRow = mysqli_fetch_row($query);
  if($queryRow[0] == 1){
    echo 1;
    $_SESSION["eposta"] = $user_name;
  } else {
    echo 0;
  }
}

// $dgm=$_POST["dgmtarih"];
// echo $dgm;

?>
