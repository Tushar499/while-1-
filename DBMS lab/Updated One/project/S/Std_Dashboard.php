<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="./studentrecruitmentapply.css">
    <link rel="stylesheet" href="./studentgradersubmission.css">
    <link rel="stylesheet" href="./studentrecruitmentviewlistuga.css">
    <link rel="stylesheet" href="./studentrecurment.css">
    <link rel="stylesheet" href="./studentrecruitmentapplyrecommendition.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet"> 
    <title>Admin Job Post</title>
    <link rel="stylesheet"  href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
<div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="#">UIU Admin</a>
    <div style="padding-top: 20px;padding-bottom: 20px;">
      <a href="file:///E:/UIU/DBMS%20Lab-8th/Lab%20Project/project/admin/dashboard.html">Dashboard</a>
      <a href="file:///E:/UIU/DBMS%20Lab-8th/Lab%20Project/project/admin/postjob.html?">Post Job</a>
      <a href="file:///E:/UIU/DBMS%20Lab-8th/Lab%20Project/project/admin/addcompany.html">Add company</a>
      <a href="file:///E:/UIU/DBMS%20Lab-8th/Lab%20Project/project/admin/adminrecruitmentapply.html">Recruitment</a>
      <a href="file:///E:/UIU/DBMS%20Lab-8th/Lab%20Project/project/admin/admincv.html#">Collect CV</a>
      <a href="file:///E:/UIU/DBMS%20Lab-8th/Lab%20Project/project/admin/request.html">Request</a>
      <a href="file:///E:/UIU/DBMS%20Lab-8th/Lab%20Project/project/admin/distribution.html">Application</a>
      <a href="file:///E:/UIU/DBMS%20Lab-8th/Lab%20Project/project/admin/distribution.html">Job distribution</a>
      
    </div>
      <a href="#">Logout</a>
  </div>
  
  <!-- Use any element to open the sidenav -->
  <div class="searchbarWrapper">
    <span onclick="openNav()"><img src="https://cdn4.iconfinder.com/data/icons/wirecons-free-vector-icons/32/menu-alt-512.png" width="40px" style="padding-top: 0px; padding-left: 40px;"></span>
    <div style="display: flex; width: 100%">
      <input id="searchbar" type="text" style="border: 1px solid #2974e5d7;">
      <button class="searchbtn">SEARCH</button>
    </div>
  </div>
  
  <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
  <div class="container my-5">
  <h2 style="text-align: center;">Recent Jobs</h2>
        <br>

        <table class ="table">
            <thead>
                <tr>
                    <th>Job Title</th> 
                    <th>Requirements</th>
                    <th>Description</th>
                    <th>Deadline</th>
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
              </tr>
                    ";
                }
                ?>
            </tbody>
        </table>

   </div>
   <script src="./main.js"></script> 
</body>
</html>