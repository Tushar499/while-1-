<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <title>Funda Of Web IT</title>
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
</div>
</div>
            <div class="container my-4">

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Faculty Name</th>
                                    <th>Course ID</th>
                                    <th>Section</th>
                                    <th>Time</th>
                                    <th>Trimester</th>
                                    <th>Assistant Type</th>
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

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['faculty_name']; ?></td>
                                                    <td><?= $items['CourseId']; ?></td>
                                                    <td><?= $items['section']; ?></td>
                                                    <td><?= $items['time']; ?></td>
                                                    <td><?= $items['trimester']; ?></td>
                                                    <td><?= $items['Assistant_type']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>

</body>
</html>