<?php

require 'connection.inc.php';
require 'functions.inc.php';
require 'add_to_cart.inc.php';


// ---------fetch categories
$cat_sql = "SELECT * FROM categories WHERE status='1' ORDER by categories ASC ";
$cat_res =  mysqli_query($con, $cat_sql);

$cat_arr = array();
while ($row = mysqli_fetch_assoc($cat_res)) {
   $cat_arr[] = $row;
}

//======add to card
$obj = new add_to_cart();
$totalProduct = $obj->TotalProduct();


// $()!
?>
<?php
require 'link.php';
?>


<head>
   <meta charset="UTF-8" />
   <title>Online shopping</title>
   <meta name="viewport" content="width=device-width,initial-scale=1" />
   <meta name="description" content="" />

</head>

<!--
    - HEADER
  -->

<body>

   <!-- <div class="overlay" data-overlay></div> -->

   <header id="header">

      <div class="header-main">

         <div class="container">
            <h3>CLICKIFY</h3>
            <a href="index.php" class="header-logo ">

               <!-- <img src="./assets/images/logo/logo.svg" alt="Anon's logo" width="120" height="36"> -->
            </a>



            <nav class="desktop-navigation-menu">

               <ul class="desktop-menu-category-list">

                  <li class="menu-category menu-category1">
                     <a href="index.php" class="menu-title">Home</a>
                  </li>


                  <li class="menu-category  menu-category1 ">
                     <a href="contact.php" class="menu-title ">Contact</a>
                  </li>

                  <li class="menu-category  menu-category1 ">
                     <a href="#" class="menu-title">Categories</a>
                     <ul class="dropdown-list">
                        <?php
                        foreach ($cat_arr as $list) {
                        ?>
                           <li class="dropdown-item ">
                              <a href="categories.php?id=<?php echo $list['id'] ?>"><?php echo $list['categories'] ?></a>
                           </li>
                        <?php
                        }
                        // $()!
                        ?>

                     </ul>
                  </li>

               </ul>

            </nav>


            <div class="header-user-actions">
               <?php
               if (isset($_SESSION['USER_LOGIN'])) {
                  echo '
               <button class="menu-category1">
               <a href="my_order.php"> <p style="font-size:18px; padding-top:13px">My Order</p></a>
               </button>

               <button class="action-btn menu-category1">
               <a href="logout.php"> <p style="font-size:26px;padding-top:13px"><i class="ri-logout-circle-line"></i></p> </a>
               </button>
               
               ';
               } else {
                  echo '
                  <button class="menu-category1">
                  <a href="login.php"><p style="font-size:26px;"><i class="ri-login-circle-line"></i> </p> </a>
                  </button>
                  ';
               }
               ?>

               <!-- <button class="action-btn menu-category1">
                  <ion-icon name="heart-outline"></ion-icon>
                  <span class="count">0</span>
               </button> -->

               <button class="action-btn menu-category1">
                  <a href="cart.php">
                     <ion-icon name="bag-handle-outline"></ion-icon>
                  </a>
                  <span class="count" id="count"><?php $totalProduct ?> </span>
               </button>


            </div>
            <button class="btn btn-dark" style="background-color:#181818;" id="open"><i class="  ri-menu-fill"></i></button>
         </div>

      </div>

      <!-- side navbar  -->

      <div class="side-nav1" id="side-nav1">
         <div class="toggle-button">
            <input type="checkbox" id="checkbox">
            <label for="checkbox" class="toggle">
               <div class="bars" id="bar1"></div>
               <div class="bars" id="bar2"></div>
               <div class="bars" id="bar3"></div>
            </label>
         </div>
         <h1>Menu</h1>
         <div class="line"></div>



         <ul class="desktop-menu-category-list">

            <li class="menu-category menu-category1">
               <a href="index.php" class="menu-title">Home</a>
            </li>


            <li class="menu-category  menu-category1 ">
               <a href="contact.php" class="menu-title ">Contact</a>
            </li>

            <li class="menu-category  menu-category1 accordion">
               <a href="javascript:void(0)" class="menu-title">Categories
                  <span class="dropdown-icon1"><i class="ri-arrow-down-wide-fill"></i></span>
               </a>
               <ul class="dropdown-list submenu">
                  <?php
                  foreach ($cat_arr as $list) {
                  ?>
                     <li class="dropdown-item ">
                        <a href="categories.php?id=<?php echo $list['id'] ?>"><?php echo $list['categories'] ?></a>
                     </li>
                  <?php
                  }
                  // $()!
                  ?>

               </ul>
            </li>
         </ul>



         <div class="side_body">
            <?php
            if (isset($_SESSION['USER_LOGIN'])) {
               echo '
               <button class="menu-category1">
               <a href="my_order.php"> <p>My Order</p></a>
               </button>

               <button class="action-btn menu-category1">
               <a href="logout.php"><i class="ri-logout-circle-line"></i><p>Logout</p></a>
               </button>
               
               ';
            } else {
               echo '
                  <button class="menu-category1">
                  <a href="login.php"> <p><i class="ri-logout-circle-line"></i><p>Login</p></a>
                  </button>
                  ';
            }
            ?>

            <button class="action-btn menu-category1">
               <a href="cart.php">
                  <ion-icon name="bag-handle-outline"></ion-icon>
                  <p>Cart</p>

               </a>
               <span class="count" id="count"><?php $totalProduct ?> </span>
            </button>



            <div class="sidebar_footer">
               <a href=""><i class="ri-facebook-box-fill"></i></a>
               <a href=""> <i class="ri-whatsapp-fill"></i></a>

               <a href=""> <i class="ri-instagram-fill"></i></a>
            </div>


         </div>





      </div>

   </header>


</body>