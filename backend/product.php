<?php
require 'function.inc.php';
require 'connection.inc.php';



if (isset($_GET['type']) &&  $_GET['type'] != '') {
   $type = get_safe_value($con, $_GET['type']);


   // ==================status 
   if ($type == 'status') {
      $operation = get_safe_value($con, $_GET['operation']);

      $id = get_safe_value($con, $_GET['id']);
      if ($operation == 'Active') {
         $status = '1';
      } else {
         $status = '0';
      }

      $update_status = "UPDATE product SET status='$status' WHERE id='$id'";
      mysqli_query($con, $update_status);
   }


   if ($type == 'Delete') {
      $id = get_safe_value($con, $_GET['id']);
      $delete_sql = "DELETE FROM product WHERE id='$id' ";
      mysqli_query($con, $delete_sql);
   }
}



// not go to dashboard through url 
if (isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN'] != '') {
} else {
   header('location:login.php');
   die();
}








// select all deta
$sql = "SELECT product.*,categories.categories FROM product,categories
WHERE product.categories_id=categories.id ORDER  BY product.id DESC";


// Check if a search query is provided
if (isset($_GET['product_search']) && !empty($_GET['product_search'])) {
   $search = mysqli_real_escape_string($con, $_GET['product_search']); // Sanitize input
   $sql = "SELECT product.*, categories.categories 
           FROM product, categories 
           WHERE product.categories_id = categories.id 
           AND product.product_name LIKE '%$search%'
           ORDER BY product.id DESC";
}




$res = mysqli_query($con, $sql);

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

               <button class="btn btn-primary"> <a href="logout.php" class="text-white">LOGOUT</a></button>
            </div>

            <!-- --------------------------body -->
            <!-- ------------------table -->

            <div class="row">
               <div class="col-xl-12">
                  <div class="card">
                     <div class="card-body">
                        <h1 class="mb-3"> PRODUCT</h1>
                        <button type="button" class="btn btn-primary mb-3"> <a href="add_product.php" class="text-white">ADD PRODUCT</a></button>

                        <!-- search -->
                        <!-- <div id="search-bar" class="d-flex justify-content-end pb-3 ">
                           <form method="GET" action="" class="d-flex">
                              <input class="form-control  " type="text" name="product_search" id="search" autocomplete="off" placeholder="SEARCH..." required>
                              <button type="submit" class="btn btn-primary">Search</button>
                           </form>
                        </div> -->


                        <!-- Search Bar -->
                        <div id="search-bar" class="d-flex justify-content-end pb-3">
                           <form method="GET" action="" class="d-flex align-items-center">
                              <div class="input-group">
                                 <input class="form-control" type="text" name="product_search" id="search" autocomplete="off" placeholder="Search by product name..." required>
                                 <button type="submit" class="btn btn-primary">
                                    Search
                                 </button>
                              </div>
                           </form>
                        </div>



                        <div class="tab-content">
                           <div class="tab-pane show active" id="striped-rows-preview">
                              <div class="table-responsive-sm">
                                 <table class="table table-striped table-centered mb-0">
                                    <thead>
                                       <tr>
                                          <th class="serial">#</th>
                                          <th class="avatar">ID</th>
                                          <th>CATEGORIES</th>
                                          <th>NAME</th>
                                          <th>IMAGE</th>
                                          <th>MRP</th>
                                          <th>PRICE</th>
                                          <th>QTY</th>
                                       </tr>
                                    </thead>
                                    <tbody>

                                       <?php
                                       $i = 1;
                                       if (mysqli_num_rows($res) > 0) {
                                          while ($row = mysqli_fetch_assoc($res)) {
                                       ?>
                                             <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['categories']; ?></td>
                                                <td><?php echo $row['product_name']; ?></td>
                                                <td>
                                                   <img src="media/product/<?php echo $row['image']; ?>" alt="Product Image" style="max-width: 80px; height: auto;">
                                                </td>
                                                <td><?php echo $row['product_mrp']; ?></td>
                                                <td><?php echo $row['price']; ?></td>
                                                <td><?php echo $row['qty']; ?></td>
                                                <td>
                                                   <?php
                                                   if ($row['status'] == 1) {
                                                      echo "<a href='?type=status&operation=Deactive&id=" . $row['id'] . "' class='btn btn-sm btn-success'>Active</a>";
                                                   } else {
                                                      echo "<a href='?type=status&operation=Active&id=" . $row['id'] . "' class='btn btn-sm btn-danger'>Deactive</a>";
                                                   }
                                                   ?>
                                                </td>
                                                <td class="table-action">
                                                   <a href="add_product.php?type=edit&id=<?php echo $row['id']; ?>" class="text-secondary">
                                                      <i class="mdi mdi-pencil"></i>
                                                   </a>
                                                   <a href="?type=Delete&id=<?php echo $row['id']; ?>" class="text-secondary">
                                                      <i class="mdi mdi-delete"></i>
                                                   </a>
                                                </td>
                                             </tr>
                                       <?php
                                             $i++;
                                          }
                                       } else {
                                          echo "<tr><td colspan='10' class='text-center'>No results found.</td></tr>";
                                       }
                                       ?>
                                    </tbody>
                                 </table>
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