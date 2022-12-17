<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="./facultyassistant.css">
    <link rel="stylesheet" href="./studentrecruitmentapply.css">
    <link rel="stylesheet" href="./studentgradersubmission.css">
    <link rel="stylesheet" href="./studentrecruitmentviewlistuga.css">
    <link rel="stylesheet" href="./studentrecurment.css">
    <link rel="stylesheet" href="./studentrecruitmentapplyrecommendition.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet"> 
    
    <title>Add Company</title>
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
  <div id="main">
  <h2 style="text-align:center">Add Company</h2>
    <form class="sturecapply-form facultyapply-form">
      <label>Company name</label>
      <input class="sturecapply-form-list facultyapply-form-list" type="text"  placeholder="Company name">
      <label>Position</label>
      <input class="sturecapply-form-list facultyapply-form-list" type="text"  placeholder="Position">
      <label>Description</label>
      <textarea> </textarea>
      <label>Website link</label>
      <input class="sturecapply-form-list facultyapply-form-list" type="text"  placeholder="Website link">
      <label>Event Name</label>
      <input class="sturecapply-form-list facultyapply-form-list" type="text"  placeholder="Event Name">
      <label>Date</label>
      <input class="sturecapply-form-list facultyapply-form-list" type="text"  placeholder="Date">
      <br><br><input class="sturecapply-form-btn" type="submit"  value="Add"></br></br>
  </form>
  </div>


  
  <script src="./main.js"></script>
</body>
</html>
