<?php

if(isset($_GET["Sl_No"])){

    $id = $_GET["Sl_No"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "project";
  
  
    //create connection
    $connection = new mysqli($servername,$username,$password,$database);

    $sql = "DELETE FROM request WHERE Sl_No=$id";
    $connection->query($sql);
}




header("location: /project/S/Admin_Req_Delete.php");
exit;



?>
