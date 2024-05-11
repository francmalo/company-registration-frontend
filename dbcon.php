<?php
$con = mysqli_connect("localhost","root","sysadmin","gymnsb");
//$con = mysqli_connect("localhost","dkyvtxzz_gym","DmGwV&fyUgff","dkyvtxzz_gym");


// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  try {
    $connect = new PDO("mysql:host=localhost;dbname=gymnsb", "root", "sysadmin");
    // Set PDO attributes (optional)
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Other configurations or settings
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
