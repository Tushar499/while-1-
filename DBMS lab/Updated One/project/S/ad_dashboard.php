<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Update Delete</title>
    <link rel="stylesheet"  href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">


</head>
<body>
  <div class="container my-5">
        <h2> Posted Jobs </h2>
        <br>

        <table class ="table">
            <thead>
                <tr>
                <tr>
                    <th>Job Title</th> 
                    <th>Requirements</th>
                    <th>Description</th>
                    <th>Deadline</th>
                    <th>Action</th>
                </tr>
             </thead>   

             <tbody>
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

                $sql = "SELECT * FROM recruitment";
                $result = $connection->query($sql);        
                
                if(!$result){
                    die("Invalid query: " . $connection->error);
                }
                
                // read data from table 
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                    <td>" .$row["job_title"]."</td>
                    <td>" .$row["Requirements"]."</td>
                    <td>". $row["description"]."</td>
                    <td>". $row["deadline"]."</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='j_update.php?Sl_No=$row[Sl_No]'>Update</a>
                    <a class='btn btn-danger btn-sm' href='job_delete.php?Sl_No=$row[Sl_No]'>Delete</a> 
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