<?php
require 'connection.inc.php';
require 'function.inc.php';

$categories_id = '';
$product_name = '';
$product_mrp = '';
$price = '';
$qty = '';
$image = '';
$short_desc = '';
$description = '';
$meta_title = '';
$meta_desc = '';
$meta_key = '';



$msg = '';
$image_required = ' required';


if (isset($_GET['id']) && $_GET['id'] != '') {

   $image_required = '';

   $id =  get_safe_value($con, $_GET['id']);

   $sqli = "SELECT * FROM product WHERE id='$id' ";
   $res =  mysqli_query($con, $sqli);
   $check = mysqli_num_rows($res);

   if ($check > 0) {
      $row = mysqli_fetch_assoc($res);

      $categories_id = $row['categories_id'];
      $product_name = $row['product_name'];
      $product_mrp = $row['product_mrp'];
      $price = $row['price'];
      $qty = $row['qty'];
      $image = $row['image'];
      $short_desc = $row['short_desc'];
      $meta_title = $row['meta_title'];
      $meta_desc = $row['meta_desc'];
      $meta_key = $row['meta_key'];
   } else {

      header('location:product.php');
      exit();
   }
}




if (isset($_POST['submit'])) {

   $categories_id = get_safe_value($con, $_POST['categories_id']);
   $product_name = get_safe_value($con, $_POST['product_name']);
   $product_mrp = get_safe_value($con, $_POST['product_mrp']);
   $price =  get_safe_value($con, $_POST['price']);
   $qty = get_safe_value($con, $_POST['qty']);
   $short_desc = get_safe_value($con, $_POST['short_desc']);
   $description = get_safe_value($con, $_POST['description']);
   $meta_title = get_safe_value($con, $_POST['meta_title']);
   $meta_desc = get_safe_value($con, $_POST['meta_desc']);
   $meta_key = get_safe_value($con, $_POST['meta_key']);

   $sqli = "SELECT * FROM product WHERE product_name='$product_name' ";
   $res =  mysqli_query($con, $sqli);




   $check = mysqli_num_rows($res);

   if ($check > 0) {
      if (isset($_GET['id']) && $_GET['id'] != '') {
         $get_data = mysqli_fetch_assoc($res);

         if ($id == $get_data['id']) {
         } else {
            $msg = 'Product Already Exist';
         }
      } else {
         $msg = 'Product Already Exist';
      }
   }

   // -----------------image validation 
   // if ($_FILES['image']['type'] != 'image/png' && ($_FILES['image']['type'] != 'image/png' || $_FILES['image']['type'] != 'image/jpg')) {
   //    $msg = "PLEASE Select only png, jpg and jpeg Image Formate";
   // } else {
   // }


   // ()!$&

   if ($msg == '') {
      // =========update========== 
      if (isset($_GET['id']) && $_GET['id'] != '') {

         if ($_FILES['image']['name'] != '') {

            $file_name =  rand(1111111111, 999999999) . $_FILES['image']['name'];
            $file_tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($file_tmp, 'media/product/' . $file_name);


            $sql_update = "UPDATE product SET categories_id='$categories_id', product_name='$product_name', product_mrp='$product_mrp',
             price='$price',  qty='$qty',  image='$file_name',  description='$description', short_desc='$short_desc', meta_title='$meta_title', meta_desc='$meta_desc', 
            meta_key='$meta_key' 
            WHERE id='$id'";
         } else {

            $sql_update = "UPDATE product SET categories_id='$categories_id',  product_name='$product_name', product_mrp='$product_mrp', price='$price',
             qty='$qty', image='$image', description='$description', short_desc='$short_desc', meta_title='$meta_title', meta_desc='$meta_desc', meta_key='$meta_key' 
             WHERE id='$id'";
         }

         mysqli_query($con, $sql_update);
      } else {


         // ==================insert image data========== 
         $file_name =  rand(1111111111, 999999999) . $_FILES['image']['name'];
         $file_tmp = $_FILES['image']['tmp_name'];
         move_uploaded_file($file_tmp, 'media/product/' . $file_name);


         $sql = "INSERT INTO product (categories_id, product_name, product_mrp, price, qty, image, description , short_desc, meta_title, meta_desc, meta_key) VALUES
          ('$categories_id', '$product_name','$product_mrp','$price','$qty','$file_name', '$description', '$short_desc','$meta_title','$meta_desc','$meta_key' '1')";
         mysqli_query($con, $sql);
      }

      header('location:product.php');
      exit();
   }
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

               <button class="btn btn-primary"> <a href="logout.php" class="text-white">LOGOUT </a></button>
            </div>
            <!------------------ category page  -->
            <div class="col-lg-12 p-5 ">
               <h1>Fill All The Product Details</h1>
               <div class="card mt-2">
                  <div class="card-body">
                     <form class="needs-validation mt-4" novalidate method="post" enctype="multipart/form-data">


                        <div class="mb-3">
                           <label class="form-label" for="validationCustom01">Categories</label>
                           <select class="form-control" name="categories_id">
                              <option>Select Category</option>
                              <?php
                              $res = mysqli_query($con, "SELECT id, categories from categories ORDER by categories ASC");

                              while ($row = mysqli_fetch_assoc($res)) {
                                 if ($row['id'] == $categories_id) {
                                    echo "<option selected value="   . $row['id'] . ">" . $row['categories'] . "</option>";
                                 } else {
                                    echo "<option value=" . $row['id'] . ">" . $row['categories'] . "</option>";
                                 }
                              }
                              ?>
                           </select>
                        </div>


                        <div class="mb-3">
                           <label class="form-label" for="validationCustom01">Product Name</label>
                           <input type="text" class="form-control" id="validationCustom01" placeholder="Enter Product Name" value="<?php echo $product_name; ?>" name="product_name" required>
                        </div>



                        <div class="mb-3">
                           <label class="form-label" for="validationCustom01">MRP</label>
                           <input type="text" class="form-control" id="validationCustom01" placeholder="Enter Product MRP" value="<?php echo $product_mrp; ?>" name="product_mrp" required>

                        </div>


                        <div class="mb-3">
                           <label class="form-label" for="validationCustom01">Price</label>
                           <input type="text" class="form-control" id="validationCustom01" placeholder="Enter Product Price" value="<?php echo $price; ?>" name="price" required>
                        </div>



                        <div class="mb-3">
                           <label class="form-label" for="validationCustom01">QTY</label>
                           <input type="text" class="form-control" id="validationCustom01" placeholder="Enter QTY" value="<?php echo $qty ?>" name="qty" required>
                        </div>


                        <div class="mb-3">
                           <label class="form-label" for="validationCustom01">Image</label>
                           <input type="file" class="form-control" id="validationCustom01" name="image" <?php echo $image_required ?>>
                        </div>


                        <div class="mb-3">
                           <label class="form-label" for="validationCustom01">Short Description</label>
                           <textarea class="form-control" id="validationCustom01" placeholder="Enter Product Short Description" name="short_desc" required>
                           <?php echo $short_desc ?>
                        </textarea>

                        </div>


                        <div class="mb-3">
                           <label class="form-label" for="validationCustom01">Description</label>
                           <textarea class="form-control" placeholder="Enter Product Description" name="description" required>
                           <?php echo $description ?>
                           </textarea>
                        </div>


                        <div class="mb-3">
                           <label class="form-label" for="validationCustom01">Meta Title</label>
                           <textarea class="form-control" id="validationCustom01" placeholder="Enter Product Meta Title" name="meta_title" required>
                           <?php echo $meta_title ?>
                              </textarea>

                        </div>

                        <div class="mb-3">
                           <label class="form-label" for="validationCustom01">Meta Description</label>
                           <textarea class="form-control" id="validationCustom01" placeholder="Enter Product Meta Description" name="meta_desc" required>
                           <?php echo $meta_desc ?>
                              </textarea>
                        </div>

                        <div class="mb-3">
                           <label class="form-label" for="validationCustom01">Meta Key</label>
                           <textarea class="form-control" id="validationCustom01" placeholder="Enter Product Meta Key" name="meta_key" required>
                           <?php echo $meta_key; ?>

                           </textarea>
                        </div>

                        <input class="btn btn-primary" name="submit" type="submit"><a href="" class="text-decoration-none text-white">ADD</a>

                        <div class="mt-3"> <?php echo $msg ?></div>
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