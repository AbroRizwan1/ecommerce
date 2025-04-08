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

      $update_status = "UPDATE categories SET status='$status' WHERE id='$id'";
      mysqli_query($con, $update_status);
   }

   if ($type == 'Delete') {
      $id = get_safe_value($con, $_GET['id']);
      $delete_sql = "DELETE FROM categories WHERE id='$id' ";
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
$sql = "SELECT * FROM categories ORDER BY categories ASC";
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

               <button class="btn btn-primary"> <a href="logout.php" class="text-white"> LOGOUT </a></button>
            </div>

            <!-- --------------------------body -->
            <!-- ------------------table -->

            <div class="row">
               <div class="col-xl-12">
                  <div class="card">
                     <div class="card-body">
                        <h1 class="mb-3"> Catergory Table</h1>
                        <button type="button" class="btn btn-primary mb-3"> <a href="add_categories.php" class="text-white">Add New</a></button>
                        <div class="tab-content">
                           <div class="tab-pane show active" id="striped-rows-preview">
                              <div class="table-responsive-sm">
                                 <table class="table table-striped table-centered mb-0">
                                    <thead>


                                       <tr>
                                          <th class="serial">#</th>
                                          <th class="avatar">ID</th>
                                          <th>Catergory Name</th>
                                          <th>Status</th>
                                          <!-- <th>Added On</th> -->
                                          <th>Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                       $i = 1;
                                       while ($row = mysqli_fetch_assoc($res)) { ?>
                                          <tr>
                                             <td><?php echo $i ?></td>
                                             <td><?php echo $row['id'] ?> </td>
                                             <td><?php echo $row['categories'] ?> </td>
                                             <td><?php
                                                   if ($row['status'] == 1) {

                                                      echo "<a href='?type=status&operation=Deactive&id=" . $row['id'] . "'> <button class='btn-primary btn'> Active </button> </a>";
                                                   } else {
                                                      echo "<a href='?type=status&operation=Active&id=" . $row['id'] . "'> <button class='btn-danger btn '> Deactive </button></a> ";
                                                   }

                                                   ?>
                                             </td>
                                             <td class="table-action">
                                                <?php
                                                echo "<a class='text-secondary' href='add_categories.php?type=edit&id=" . $row['id'] . "'><i class='mdi mdi-pencil'></i></a> ";
                                                echo "<a class='text-secondary' href='?type=Delete&id=" . $row['id'] . "'><i class='mdi mdi-delete'></i></a>";
                                                ?>
                                             </td>



                                          </tr>
                                       <?php
                                       };
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