<?php
require 'function.inc.php';
require 'connection.inc.php';


// 
?>

<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from coderthemes.com/hyper/saas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Jul 2022 10:18:47 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <?php include 'link.php' ?>
</head>

<body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <?php include 'header.php' ?>
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <div class="navbar-custom  d-flex align-items-center justify-content-between">

                    <button class="button-menu-mobile open-left">
                        <i class="mdi mdi-menu"></i>
                    </button>

                   

                    <button class="btn btn-primary"> <a href="logout.php" class="text-white"> LOGOUT </a></button>
                </div>
                <!-- ===========================body -->


                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="mb-3"> ORDERS MASTER</h1>

                                <div class="tab-content mt-5">
                                    <div class="tab-pane show active" id="striped-rows-preview">
                                        <div class="table-responsive-sm">
                                            <table class="table table-striped table-bordered">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <!-- <th>Product</th> -->
                                                        <th>Order ID</th>
                                                        <th>Order Date</th>
                                                        <th>Address</th>
                                                        <th>Payment Type</th>
                                                        <th>Payment status</th>
                                                        <th>Order Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    /* !()$&& */

                                                    // $uid = $_SESSION['USER_ID'];
                                                    $res = mysqli_query($con, "SELECT orders.*, order_status.name AS order_status_str 
                                                    FROM orders, order_status  
                                                    WHERE  order_status.id = orders.order_status");


                                                    while ($row =  mysqli_fetch_assoc($res)) { ?>

                                                        <tr>

                                                            <td> <a href="order_detail.php?id=<?php echo $row['id'] ?> " class="text-secondary"><?php echo $row['id'] ?></a></td>
                                                            <td><?php echo $row['added'] ?></td>
                                                            <td>
                                                                <?php echo $row['address'] ?> </br>
                                                                <?php echo $row['city'] ?> </br>
                                                                <?php echo $row['pincode'] ?> </br>


                                                            </td>
                                                            <td><?php echo $row['payment_type'] ?></td>
                                                            <td><?php echo $row['payment_status'] ?></td>
                                                            <td><?php echo $row['order_status_str'] ?></td>

                                                        <?php } ?>

                                                        </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>




        <?php
        include 'footer.php';
        ?>
        <!-- end Footer -->
    </div>
    </div>
</body>

</html>