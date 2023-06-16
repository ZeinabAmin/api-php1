<?php
//print_r($_SERVER);
//[REQUEST_URI] => /api-php/product.php/1 //this is string

// Example

// We have address https://www.google.com/folder/page.html where,
// URI(Uniform Resource Identifier) => https://www.google.com/folder/page.html
// URL(Uniform Resource Locator) => https://www.google.com/
// URN(Uniform Resource Name) => /folder/page.html
// URI => (URL + URN) or URL only or URN only

require_once "inc/dbconnection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $uri = $_SERVER['REQUEST_URI']; //string
    $uriArray = explode('/', $uri);

    $id = end($uriArray);
    // echo $id;

    $query = "SELECT * from `products` where `id`=$id";
    $runquery = mysqli_query($conn, $query); //return meta data //data of data
    // $product = mysqli_fetch_ASSOC($runquery);

    if (mysqli_num_rows($runquery) !== 0) { //or > 0
        $product = mysqli_fetch_assoc($runquery);
        $postJson = json_encode($product); //ass arr to json //[{"name":"iphone"}]
        print_r($postJson);
    } else {
        echo $message = json_encode(["message" =>  "not found"]);
        http_response_code(404);
    }
}
