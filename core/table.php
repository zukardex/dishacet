<?php
    session_start();
    require '../config.php';
    require 'credentials.php';
    if(isset($_SESSION['convenor']) && $_SESSION['convenor'] ==$convenorSession ){
        //is convenor
        
    
    }else{
        //not convenor
        header('location: ../login.php');
    }
    $sql = "SELECT name, coordinators, ce, cs,  ec, ee, ar, ie, me, approval, winners FROM `events`";
    $result = $conn->query($sql);
    

    $conn->close();



?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Event Management</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <script>
        function approve(name){
            document.location="update.php/?name=" + name;
        }

    </script>
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbar-dark">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"><span>DISHA'23</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link active" href="table.php"><i class="fas fa-table"></i><span>Event Table</span></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">STATUS</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">DISHA INFO</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Event Name</th>
                                            <th>Coordinators</th>
                                            <th>Winners</th>
                                            <th>Date</th>
                                            <th>Points</th>
                                            <th>Approval</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                       <?php
                                            while ($row = $result->fetch_assoc()) {
                                                $winners= array_search('3', $row) . ', ' . array_search('2', $row) .',' .  array_search('1', $row);
                                            $yy= "<tr>
                                                <td>" . $row["name"] . "</td>
                                                <td>" . $row["coordinators"] . "</td>
                                                <td>" . $winners . "</td><td>11</td>
                                                <td>15, 10,5</td>";
                                                if(((int)($row["approval"]))==1){
                                                 $yy = $yy . "<td><button class=" . '"btn btn-primary"' . ' type="button" disabled>Approved</button></td>';
                                                }else{
                                                    $yy = $yy . "<td><button class=" . '"btn btn-primary"' . ' type="submit" onClick="'."approve('".$row['name']."')".'">Approve</button></td>';
                                                }

                                              $yy= $yy . "</tr>";
                                              echo $yy;
                                    }
                                    


                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr></tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center"></div>
                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a class="page-link" aria-label="Previous" href="#"><span aria-hidden="true">«</span></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span aria-hidden="true">»</span></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>DISHA 2023</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>
<?php

// session_abort();
?>