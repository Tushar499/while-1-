
<?php
// Start the session
session_start();
?>



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
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-betal/dist/js/bootstrap.bundle.min.js"></script>
    <title>Recruitment</title>

</head>
<body>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "project";
$connection = new mysqli($servername,$username,$password,$database);



    $job_title="" ;
    $Requirements= "";
    $description= "";
    $deadline= "";
    $errorMessage = "";
    $successMessage= "";


if(isset($_POST["submit"])){
    $job_title= $_POST["job_title"];
    $Requirements= $_POST["Requirements"];
    $description= $_POST["description"];
    $deadline= $_POST["deadline"];
   

    do{
      if (empty($job_title) OR empty($Requirements) OR empty($description) OR empty($deadline)){
      $errorMessage="All feild should be filled";
      break;
     }
    

      //ADD Recruitment 

    $sql = "INSERT INTO recruitment(job_title,Requirements,description,deadline)".
     "VALUES ('$job_title','$Requirements','$description','$deadline')";
     $result = $connection->query($sql);

     $job_title="" ;
     $Requirements= "";
     $description= "";
     $deadline= "";

    $successMessage="Success";
    header("location: Recruitment.php");
    exit;

     } while(false);
    
}

?>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="#">UIU Admin</a>
    <div style="padding-top: 20px;padding-bottom: 20px;">
      <a href="http://localhost/project/S/ad_dashboard.php">Dashboard</a>
      <a href="http://localhost/project/S/Recruitment.php#">Post Job</a>
      <a href="file:///E:/UIU/DBMS%20Lab-8th/Lab%20Project/project/admin/addcompany.html">Add company</a>
      <a href="file:///E:/UIU/DBMS%20Lab-8th/Lab%20Project/project/admin/adminrecruitmentapply.html">Recruitment</a>
      <a href="file:///E:/UIU/DBMS%20Lab-8th/Lab%20Project/project/admin/admincv.html#">Collect CV</a>
      <a href ="http://localhost/project/S/Request.php">Request</a>
      <a href="file:///E:/UIU/DBMS%20Lab-8th/Lab%20Project/project/admin/distribution.html">Application</a>
      <a href="file:///E:/UIU/DBMS%20Lab-8th/Lab%20Project/project/admin/distribution.html">Job distribution</a>
      
    </div>
      <a href="#">Logout</a>
  </div>
  <!-- Use any element to open the sidenav -->
  <div class="searchbarWrapper">
    <span onclick="openNav()"><img src="https://cdn4.iconfinder.com/data/icons/wirecons-free-vector-icons/32/menu-alt-512.png" width="40px" style="padding-top: 0px; padding-left: 40px;"></span>
    <div style="display: flex; width: 100%">
      <input id="searchbar" type="text" style="border: 1px solid #2974e5d7; required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data"">
      <button class="searchbtn">SEARCH</button>
    </div>
  </div>

  <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->




  <div class="container"> 
  <h1 style="text-align:center">Recruitment</h1>


    <form action="Recruitment.php" method="POST" >

   
  <?php

      if(!empty($errorMessage)){
        echo "
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>$errorMessage</strong> 
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
        
        ";
      }

?>


<?php
     
      if(!empty($successMessage)){
         echo"
         <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$successMessage</strong> 
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
        </div>
         
         
         ";
      }

      ?>

      <div class="row">
        <div class="col-25">
          <label for="job_title">Job Title</label>
        </div>
        <div class="col-75">
          <input type="text" class="form-control " id="job_title" name="job_title" values="<?php echo $CourseId;?>" placeholder="">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="Requirements">Requirements</label>
        </div>
        <div class="col-75">
          <input type="text" class="form-control " id="Requirements" name="Requirements" value="<?php echo $Requirements;?>" placeholder="">
        </div>
      </div>


    <div class="row ">
      <div class="col-25">
        <label for="description">Description</label>
      </div>
        <div class="col-75">
          <textarea type="text" class="form-control" id="description" name="description" placeholder="Write something.." style="height:200px" value="<?php echo $Requirements;?>" placeholder=""></textarea>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="deadline">Deadline</label>
        </div>
        <div class="col-75">
          <input type="text"  class="form-control " id="deadline" name="deadline" value="<?php echo $deadline;?>" placeholder="">
        </div>
      </div>
  
      <div style="text-align:center">
            <br><button type="submit" class="submit" name ="submit">Submit</button>
      </div>
    </form>
  </div>


  <script src="./main.js"></script>
</body>
</html>