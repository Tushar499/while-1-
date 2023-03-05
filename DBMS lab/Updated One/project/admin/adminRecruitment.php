<?php
$JobID = "";
$JobTitle="";
$Requirements="";
$Description="";
$Deadline="";

$errorMassage="";
$successMassage="";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $JobID= $_POST["Job ID"];
    $JobTitle= $_POST["Job Title"];
    $Requirements= $_POST["Requirements"];
    $Description= $_POST["Description"];
    $Deadline= $_POST["Deadline"];

    do{
      if(empty($JobID) || empty($JobTitle) || empty($Description) || empty($WebsiteLink)){
        $errorMassage = "All the Field are required";
        break;
      }
      //add new job post
      $JobID = "";
      $JobTitle="";
      $Requirements="";
      $Description="";
      $Deadline="";

       $successMassage ="Added Post Succeswwsfully";
 
    }while(false);
}
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"> 
    
    <title>Recruitment</title>

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
    <h2 style="text-align:center">Recruitment</h2>
    <?php
      if(!empty($errorMassage)){
        echo"
        <div class='alter alter-warning alert-dismissible fade show' role='alert'>
        <strong <$errorMassage</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
        </div>
        ";
      }

    ?>
   <!-- <a class="btn btn-primary" href="/student/dashboard.php" role="button"> Add </a> -->
    <form method="post">
      <div class="row mb-3">
          <label class="col-sm-3 col-form-label">Job ID</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="Job ID" value="<?php echo $JobID; ?>">
        </div>
      </div>
     
      <div class="row mb-3">
          <label class="col-sm-3 col-form-label">Job Title</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="Job Title" value="<?php echo $JobTitle; ?>">
        </div>
      </div>
      <div class="row mb-3">
          <label class="col-sm-3 col-form-label">Requirements</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="Requirements" value="<?php echo $Requirements; ?>">
        </div>
      </div>
      <div class="row mb-3">
          <label class="col-sm-3 col-form-label">Description</label>
        <div class="col-sm-6">
        <div class="col-100">
          <textarea type="text" class="form-control" name="Description" placeholder="Write something.." style="height:200px"></textarea>
        </div>
        </div>
      </div>
      
      <div class="row mb-3">
          <label class="col-sm-3 col-form-label">Deadline</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="Deadline" value="<?php echo $Deadline; ?>">
        </div>
      </div>
      

      <div class="row mb-3">
        <div class="offset-sm-3 col-sm-3 d-grid">
            <button type="submit" class="btn btn-primary">Submit</b>
        </div>
        <div class="col-sm-3 d-grid">
            <a class="btn btn-outline-primary" href="/project/admin/index.php" role="button">Cancle</a>
        </div>
      </div>
    </form>
  </div>
  
  
  <script src="./main.js"></script>
</body>
</html>
