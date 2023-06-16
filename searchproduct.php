<?php
require_once "inc/dbconnection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $uri = $_SERVER['REQUEST_URI']; //string
    $uriArray = explode('/', $uri);

    $term = end($uriArray);
    // echo $term;

    $query = "SELECT * from `products` where `name` like '%$term%'";
    $runquery = mysqli_query($conn, $query); //return meta data //data of data

    if (mysqli_num_rows($runquery) !== 0) { //or > 0

        $searchResult = mysqli_fetch_all($runquery, MYSQLI_ASSOC);
        $jsonData = json_encode($searchResult); //ass arr to json //[{"name":"iphone"}]
        print_r($jsonData);
    } else {

        echo $message = json_encode(["message" =>  "not found"]);
        http_response_code(404);
    }
}
