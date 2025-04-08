<?php
require 'header.php';

// require 'functions.inc.php';

$order_id = get_safe_value($con, $_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require 'link.php'; ?>


</head>

<body class="order_details">


    <div class="container pt-5 pb-5">
        <h1 class="text-center mb-5 pb-2">My Order Details</h1>

        <div class="table-responsive" id="table">
            <table class="table table-bordered">
                <thead class="table-dark ">
                    <tr class="text-center">
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

                    $res = mysqli_query($con, "SELECT DISTINCT order_details.id, order_details.*, product.product_name, product.image 
                    FROM order_details, product, orders  
                    WHERE order_details.order_id = '$order_id' 
                    AND orders.user_id = '$uid'  
                    AND orders.id = '$order_id'  
                    AND order_details.product_id = product.id");


                    $total_price = 0;
                    while ($row = mysqli_fetch_assoc($res)) {
                        $total_price =  $total_price + ($row['qty'] * $row['price']);
                    ?>

                        <tr>
                            <td class="d-flex align-items-center justify-content-center">
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
        </div>


    </div>






    <?php require 'footer.php'; ?>



    <script>
        gsap.to(".order_details h1", {
            y: 20,
            duration: .7,
            ease: Expo.InOut,
            stagger: .2,
            opacity: 100,

        });


        gsap.to("#table", {
            y: -30,
            duration: .7,
            ease: Expo.InOut,
            stagger: .2,
            opacity: 100,
        });
    </script>





</body>

</html>