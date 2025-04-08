<?php
require 'function.inc.php';
require 'connection.inc.php';


$order_id = get_safe_value($con, $_GET['id']);
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
                                <h1 class="mb-3"> ORDERS Details</h1>

                                <div class="tab-content mt-5">
                                    <div class="tab-pane show active" id="striped-rows-preview">


                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <!-- <th>Product</th> -->
                                                        <th>PRODUCT</th>
                                                        <th>PRODUCT NAME</th>
                                                        <th>QTY</th>
                                                        <th>PRICE</th>
                                                        <th>TOTAL</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    /* !()$&& */

                                                    $uid = $_SESSION['USER_ID'];

                                                    $res = mysqli_query($con, "SELECT DISTINCT order_details.id, order_details.*, product.product_name, product.image, 
                                                    orders.address,orders.city,orders.pincode, FROM order_details, product, orders  
                                                    WHERE order_details.order_id = '$order_id' 
                                                                        
                                                    AND orders.id = '$order_id'  
                                                    AND order_details.product_id = product.id");

                                                    $total_price = 0;

                                                    while ($row = mysqli_fetch_assoc($res)) {
                                                        $address = $row['address'];
                                                        $city = $row['city'];
                                                        $pincode = $row['pincode'];
                                                        $total_price =  $total_price + ($row['qty'] * $row['price']);
                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <img src="../backend/media/product/<?php echo $row['image']; ?>" width="80" height="80" alt="Product Image">
                                                            </td>
                                                            <td><?php echo $row['product_name']; ?></td>
                                                            <td><?php echo $row['qty']; ?></td>
                                                            <td><?php echo $row['price']; ?></td>
                                                            <td><?php echo $row['qty'] * $row['price']; ?></td>
                                                        </tr>




                                                    <?php } ?>
                                                    <tr>
                                                        <td colspan="3"></td>
                                                        <td>TOTAL PRICE</td>
                                                        <td><?php echo $total_price ?></td>
                                                    </tr>
                                                </tbody>


                                            </table>

                                            <div>


                                                <strong>
                                                    Address : <?php echo $address ?>,
                                                    <?php echo $city ?>,
                                                    <?php echo $pincode ?>
                                                </strong>
                                                <br>
                                                <br>
                                                <strong>ORDER STATUS :
                                                    <?php
                                                    $sqli = mysqli_query($con, "SELECT order_status,name FROM  order_status, orders 
                                                     WHERE orders.id='$order_id' 
                                                     AND orders.order_status=order_status.id");
                                                    $order_status_arr =  mysqli_fetch_assoc($sqli);
                                                    echo $order_status_arr['name'];

                                                    ?>

                                                </strong>







                                            </div>


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