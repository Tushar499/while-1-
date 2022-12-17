<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request</title>
    <link rel="stylesheet"  href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">


</head>
<body>
<div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                
            </div>
  <div class="container my-5">
        <h2> Lists of Request </h2>
        <br>

        <table class ="table">
            <thead>
                <tr>
                    <th>Sl No</th>
                    <th>Faculty Name</th> 
                    <th>Course ID</th>
                    <th>Section</th>
                    <th>Time</th>
                    <th>Trimester</th>
                    <th>Assistant Type</th>
                    <th>Action</th>
                </tr>
             </thead>   

             <tbody>
             <?php 
                $con = mysqli_connect("localhost","root","","project");

                if(isset($_GET['search']))
                {
                    $filtervalues = $_GET['search'];
                    $query = "SELECT * FROM request WHERE CONCAT(faculty_name,CourseId,section,time,trimester,Assistant_type) LIKE '%$filtervalues%' ";
                    $query_run = mysqli_query($con, $query);
                    header("location: search_requestList.php");
                }
            ?>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "project";
                

                //create connection with database 
                $connection = new mysqli($servername,$username, $password,$database);

                //Cheak Connection
                if($connection->connect_error){
                    die("Connection failed: ".$connection->connect_error);
                }

                // read all row from database table 

                $sql = "SELECT * FROM request";
                $result = $connection->query($sql);        
                
                if(!$result){
                    die("Invalid query: " . $connection->error);
                }
                
                // read data from table 
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                <td>" .$row["Sl_No"]."</td>
                <td>" .$row["faculty_name"]."</td>
                <td>". $row["CourseId"]."</td>
                <td>". $row["section"]."</td>
                <td>". $row["time"]."</td>
                <td>". $row["trimester"]."</td>
                <td>". $row["Assistant_type"]."</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='/S/accept.php?Sl_No=$row[Sl_No]'>Accept</a>
                    <a class='btn btn-danger btn-sm' href='Admin_Req_Delete.php?Sl_No=$row[Sl_No]'>Delete </a> 
                </td>
              </tr>
                    ";
                }
                ?>
            </tbody>
        </table>

   </div>
    
</body>
</html>