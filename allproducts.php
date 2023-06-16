<?php
require_once "inc/dbconnection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
  //    $name=$_POST['name'];
  //    $email=$_POST['email'];
  // echo $name,$email;

  $query = "SELECT * from `products`";
  $runquery = mysqli_query($conn, $query); //return meta data //data of data
  $products = mysqli_fetch_all($runquery, MYSQLI_ASSOC);

  //  echo "<pre>";
  // print_r($products);
  // echo "</pre>";
  $jsonData = json_encode($products); //ass arr to json //[{"name":"iphone"}]
  print_r($jsonData);
} else {
  http_response_code(404); //url not found
}
