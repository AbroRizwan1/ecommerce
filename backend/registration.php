<?php
require 'function.inc.php';
require 'connection.inc.php';



// can not redirect to dashboard until login 
if (isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN'] != '') {
} else {
    header('location:login.php');
    die();
}

// Default query to fetch all users
$sql = "SELECT * FROM user ORDER BY id DESC";



//  Check if a search query is provided
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = mysqli_real_escape_string($con, $_GET['search']); // Sanitize input
    $sql = "SELECT * FROM user WHERE CONCAT(name, email) LIKE '%$search%' ORDER BY id DESC";
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

                    <button class="btn btn-primary"> <a href="logout.php" class="text-white"> LOGOUT </a></button>
                </div>
                <!-- ===========================body -->


                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="mb-4 pt-3"> User Registration </h1>

                                <div id="search-bar" class="d-flex justify-content-end pb-3 ">
                                    <form method="GET" action="" class="d-flex">
                                        <input class="form-control  " type="text" name="search" id="search" autocomplete="off" placeholder="Search by Name & Email..." required>
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </form>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane show active" id="striped-rows-preview">
                                        <div class="table-responsive-sm">
                                            <table class="table table-striped table-centered mb-0">
                                                <thead>
                                                    <tr>

                                                        <th class="avatar">ID</th>
                                                        <th>NAME</th>
                                                        <th>PASSWORD</th>
                                                        <th>EMAIL</th>
                                                        <th>MOBILE</th>
                                                        <th>Added On</th>

                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    <?php
                                                    if (mysqli_num_rows($res) > 0) {
                                                        while ($row = mysqli_fetch_assoc($res)) {
                                                    ?>
                                                            <tr>
                                                                <td><?php echo $row['id']; ?></td>
                                                                <td><?php echo $row['name']; ?></td>
                                                                <td><?php echo $row['password']; ?></td>
                                                                <td><?php echo $row['email']; ?></td>
                                                                <td><?php echo $row['mobile']; ?></td>
                                                                <td><?php echo $row['added_on']; ?></td>
                                                            </tr>
                                                    <?php
                                                        }
                                                    } else {
                                                        echo "<tr><td colspan='6'>No results found.</td></tr>";
                                                    }
                                                    ?>
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