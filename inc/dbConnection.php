<?php
//additionall information in header
header("Access-Control-Allow-Origin:*"); //cors //cross origin resource sharing //enable cors //* or hostname
header("content-type:Application-json;charset=utf-8");
$conn=mysqli_connect("localhost","root","","api-crud");//true or false

if(!$conn)
{
  // die("error in connection");
     echo "error in connection";
    die();
}

?>