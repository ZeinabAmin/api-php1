<?php
require_once "inc/dbconnection.php";

if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
    $uri = $_SERVER['REQUEST_URI']; //string
    $uriArray = explode('/', $uri);
    $id = end($uriArray);
    // echo $id;

    $query = "DELETE FROM `products` WHERE `id`=$id";
    $runquery = mysqli_query($conn, $query);

    if ($runquery) {
        echo json_encode(["message" =>  "deleted successfully"]);
    } else {
        echo json_encode(["message" =>  "deleted failed"]);
    }
} else {
    http_response_code(404);
}
