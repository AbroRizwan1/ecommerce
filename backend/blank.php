<?php
require 'function.inc.php';
require 'connection.inc.php';

if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!= ''){

}else{
    header('location:login.php');
    die();
}


// ?>

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
            <!-- end Topbar -->
            <!-- content start -->
            <!-- content end -->
            <!-- Footer Start -->
            <?php
               include 'footer.php'; 
               ?>
            <!-- end Footer -->
         </div>
      </div>
   </body>
</html>