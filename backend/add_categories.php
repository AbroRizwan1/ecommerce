<?php
require 'connection.inc.php';
require 'function.inc.php';


$categories = '';
$msg = '';

if (isset($_GET['id']) && $_GET['id'] != '') {
   $id =  get_safe_value($con, $_GET['id']);

   $sqli = "SELECT * FROM categories WHERE id='$id' ";
   $res =  mysqli_query($con, $sqli);
   $check = mysqli_num_rows($res);
   if ($check > 0) {
      $row = mysqli_fetch_assoc($res);
      $categories = $row['categories'];
   } else {
      header('location: categories.php');
      exit();
   }
}


if (isset($_POST['submit'])) {
   $categories = get_safe_value($con, $_POST['categories']);

   $sqli = "SELECT * FROM categories WHERE categories='$categories' ";
   $res =  mysqli_query($con, $sqli);
   $check = mysqli_num_rows($res);

   if ($check > 0) {

      if (isset($_GET['id']) && $_GET['id'] != '') {
         $get_data = mysqli_fetch_assoc($res);

         if ($id == $get_data['id']) {
         } else {
            $msg = 'Categories  Already Exist';
         }
      } else {
         $msg = 'Categories  Already Exist';
      }
   }


   if ($msg == '') {

      // =========update========== 
      if (isset($_GET['id']) && $_GET['id'] != '') {
         $sql_update = "UPDATE categories SET categories='$categories' WHERE id='$id' ";
         mysqli_query($con, $sql_update);
      } else {
         // ==================insert data========== 
         $sql = "INSERT INTO categories (categories, status) VALUES ('$categories', '1')";
         mysqli_query($con, $sql);
      }

      header('location: categories.php');
      exit();
   }
}


// not go to dashboard through url 
if (isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN'] != '') {
} else {
   header('location:login.php');
   die();
}



// ()!$&

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
            <!------------------ category page  -->
            <div class="col-lg-12 p-5 ">
               <h1>Fill All The Categories Details</h1>
               <div class="card mt-2">
                  <div class="card-body">
                     <form class="needs-validation mt-4" novalidate method="post">
                        <div class="mb-3">
                           <label class="form-label" for="validationCustom01">CATEGORY NAME</label>
                           <input type="text" class="form-control" id="validationCustom01" placeholder="CATEGORY NAME" value="<?php echo $categories; ?>" name="categories" required>
                           <div class='text-danger mt-1'> <?php echo $msg ?></div>
                        </div>
                        <input class="btn btn-primary" name="submit" type="submit"><a href="categories.php" class="text-decoration-none text-white">ADD</a>
                     </form>
                  </div>
               </div>
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