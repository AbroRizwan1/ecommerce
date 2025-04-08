<?php

require 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require 'link.php'; ?>
</head>

<body class="myorder">


    <div class="container pt-5 pb-5">
        <h1 class="text-center pb-5">My Orders</h1>

        <!-- Make the table responsive -->
        <div class="table-responsive" id="table">
            <table class="table table-bordered text-center"> <!-- Add text-center here -->
                <thead class="table-dark">
                    <tr>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Address</th>
                        <th>Payment Type</th>
                        <th>Payment Status</th>
                        <th>Order Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $uid = $_SESSION['USER_ID'];
                    $res = mysqli_query($con, "SELECT orders.*,order_status.name AS order_status_str 
                                  FROM orders, order_status  
                                  WHERE orders.user_id = '$uid'  
                                  AND order_status.id = orders.order_status");

                    while ($row = mysqli_fetch_assoc($res)) { ?>
                        <tr>
                            <td class="align-middle">
                                <a href="my_order_details.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary w-100">
                                    <?php echo $row['id'] ?>
                                </a>
                            </td>
                            <td class="align-middle"><?php echo $row['added'] ?></td>
                            <td>
                                <?php echo $row['address'] ?> </br>
                                <?php echo $row['city'] ?> </br>
                                <?php echo $row['pincode'] ?> </br>
                            </td>
                            <td><?php echo $row['payment_type'] ?></td>
                            <td><?php echo $row['payment_status'] ?></td>
                            <td><?php echo $row['order_status_str'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>



    <?php require 'footer.php'; ?>



    <script>
        gsap.to(".myorder h1", {
            y: 20,
            duration: .7,
            ease: Expo.InOut,
            stagger: .2,
            opacity: 100,

        });


        gsap.to("#table", {
            y: -20,
            opacity: 0,
            duration: .7,
            ease: Expo.InOut,
            stagger: .2,
            opacity: 100,
        });
    </script>



</body>

</html>