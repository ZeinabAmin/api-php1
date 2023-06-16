<?php
require_once "inc/dbconnection.php";

if ($_SERVER['REQUEST_METHOD'] == "PUT") {

    $uri = $_SERVER['REQUEST_URI']; //string
    $uriArray = explode('/', $uri);
    $id = end($uriArray);

    //print_r($_POST); //o read data from body form-data
    $data = json_decode(file_get_contents("php://input")); //ass arr //to read data from body raw in postman or html file
    // (php://input) file in php //json
    //(php://input) is a PHP stream that allows you to read raw data from the request body of an HTTP request, and can be accessed using the file_get_contents() function.

    // print_r($data);
    $name = $data->name;
    $description = $data->description;
    $price = $data->price;

    echo $price;

    $errors = [];
    if (empty($name)) {
        $errors[] = "name is required";
    } elseif (!is_string($name)) {
        $errors[] = "name must be string";
    } elseif (strlen($name) > 255) {
        $errors[] = "min length <= 255 length ";
    }

    if (empty($description)) {
        $errors[] = "description is required"; //push
    } elseif (!is_string($description)) {
        $errors[] = "description must be string";
    }

    if (empty($price)) {
        $errors[] = "price is required";
    } elseif (is_string($price)) {
        $errors[] = "price must be number";
    }

    if (empty($errors)) {
        $query = "update `products` set `name`='$name',`description`='$description' ,`price`=$price where `id`='$id'";
        $runquery = mysqli_query($conn, $query); //return meta data //data of data

        if ($runquery && mysqli_affected_rows($conn) > 0) {
            // if (mysqli_num_rows($runquery) > 0)
            //     if ($runquery) {
            echo json_encode(["message" =>  "updated successfully"]);
        } else {
            echo json_encode(["message" =>  "failed to update"]);
        }
    } else {
        http_response_code(404);
    }
}
