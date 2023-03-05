
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
    <title>Faculty Ask</title>

</head>
<body>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "project";
$connection = new mysqli($servername,$username,$password,$database);


    $Sl_No="";
    $faculty_name="" ;
    $Assistant_type= "";
    $CourseId= "";
    $time= "";
    $trimester= "";
    $section = "";
    $errorMessage = "";
    $successMessage= "";


if(isset($_POST["submit"])){
    $Sl_No= $_POST["Sl_No"];
    $faculty_name= $_POST["faculty_name"];
    $Assistant_type= $_POST["Assistant_type"];
    $CourseId= $_POST["CourseId"];
    $time= $_POST["time"];
    $trimester= $_POST["trimester"];
    $section = $_POST["section"];


    do{
      if (empty($faculty_name) OR empty($Assistant_type) OR empty($CourseId) OR empty($time) OR empty($trimester) OR empty($section)){
      $errorMessage="All feild should be filled";
      break;
     }
    

      //ADD TA/GRADER 

    $sql = "INSERT INTO request (Sl_No,faculty_name,CourseId,section,time,trimester,Assistant_type)".
     "VALUES ('$Sl_No','$faculty_name','$CourseId','$section','$time','$trimester','$Assistant_type')";
     $result = $connection->query($sql);

    $Sl_No="";
    $faculty_name="" ;
    $Assistant_type= "";
    $CourseId= "";
    $time= "";
    $trimester= "";
    $section = "";

    $successMessage="Success";
    header("location: facultyAsk.php");
    exit;

     } while(false);
    
}

?>
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




  <div class="container"> 
  <h1 style="text-align:center">Request For  TA & Grader </h1>


    <form action="facultyAsk.php" method="POST" >

   
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
          <label for="faculty_name">Name</label>
        </div>
        <div class="col-75">
          <input type="text" id="faculty_name" name="faculty_name" values="<?php echo $faculty_name;?>" placeholder="">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="CourseId">Course Id</label>
        </div>
        <div class="col-75">
          <input type="text" class="form-control " id="CourseId" name="CourseId" values="<?php echo $CourseId;?>" placeholder="">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="section">Section</label>
        </div>
        <div class="col-75">
          <input type="text" class="form-control " id="section" name="section" value="<?php echo $section;?>" placeholder="">
        </div>
      </div>


      <div class="row">
        <div class="col-25">
          <label for="time">Time</label>
        </div>
        <div class="col-75">
          <input type="text" class="form-control " id="time" name="time" value="<?php echo $time;?>" placeholder="">
        </div>
      </div>



      <div class="row">
        <div class="col-25">
          <label for="trimester">Trimester Name</label>
        </div>
        <div class="col-75">
          <input type="text"  class="form-control " id="trimester" name="trimester" value="<?php echo $trimester;?>" placeholder="">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="Assistant_type">Assistent Type</label>
        </div>
        <div class="col-75">
          <input type="text" class="form-control "id="Assistant_type" name="Assistant_type" values="<?php echo $Assistant_type; ?>" placeholder="">
        </div>
      </div>
  


      <div style="text-align:center">
            <button type="submit" class="submit" name ="submit">Submit</button>
      </div>


    </form>
  </div>


  <script src="./main.js"></script>
</body>
</html>