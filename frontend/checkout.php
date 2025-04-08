<?php
require 'header.php';



if (!isset($_SESSION['cart']) || count($_SESSION['cart']) === 0) {
?>

    <script>
        window.location.href = 'index.php';
    </script>
<?php
}



$cart_total = 0;

foreach ($_SESSION['cart'] as $key => $val) {
    $productArr = get_product($con, '', '', $key);
    $price = $productArr[0]['price'];
    // $image = $productArr[0]['image'];
    $qty = $val['qty'];
    $cart_total = $cart_total + ($price * $qty);
}



if (isset($_POST['submit'])) {

    $address =  get_safe_value($con, $_POST['address']);
    $city =  get_safe_value($con, $_POST['city']);
    $pincode =  get_safe_value($con, $_POST['pincode']);
    $payment_type =  get_safe_value($con, $_POST['payment_type']);
    $user_id =   $_SESSION['USER_ID'];
    $total_price = $cart_total;
    $payment_status = 'pending';
    if ($payment_type == 'COD') {
        $payment_status = 'success';
    }
    $order_status = "1";
    $added = date('Y-m-d H:i:s');;

    $sqli = "INSERT INTO orders (USER_ID, address, city, pincode, payment_type, total_price, payment_status, order_status, added) 
    VALUES ('$user_id', '$address', '$city', '$pincode', '$payment_type', '$total_price', '$payment_status', '$order_status', '$added')";

    if (mysqli_query($con, $sqli)) {
        echo "Order placed successfully!";
    } else {
        echo "Error: " . mysqli_error($con);
    }



    $order_id =  mysqli_insert_id($con);

    foreach ($_SESSION['cart'] as $key => $val) {
        $productArr = get_product($con, '', '', $key);
        $price = $productArr[0]['price'];
        // $image = $productArr[0]['image'];
        $qty = $val['qty'];

        $sqli = "INSERT INTO order_details (order_id, product_id, qty, price) VALUES ('$order_id', '$key', '$qty', '$price')";
        if (mysqli_query($con, $sqli)) {
            echo 'order detail';
        } else {
            echo "error" . mysqli_errno($con);
        }
    }


    unset($_SESSION['cart']);

?>
    <script>
        window.location.href = 'thank_you.php';
    </script>
<?php



    // mysqli_query($con, $sqli);
}





// !()$&&
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require 'link.php'; ?>
    <style>
        body {
            background-color: #f8f9fa;
        }

        /* .container {
            max-width: 900px;
        } */

        .card {
            border: none;
            border-radius: 10px;
        }

        .form-control {
            border-radius: 8px;
        }

        .btn-primary {
            background-color: #28a745;
            border: none;
        }

        .btn-primary:hover {
            background-color: #218838;
        }

        .order-summary {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
        }
    </style>

</head>

<body>









    <section id="checkout">

        <div class="container pt-5">
            <h2 class="text-center mb-4 pb-5">Check Out</h2>

            <div class="row d-flex justify-content-center">
                <!-- Billing Details -->
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 pb-5">
                    <div class="card p-4">
                        <h5 class="mb-5">Billing Details</h5>

                        <?php
                        // $message = 'sadasd';

                        if (isset($_SESSION['USER_LOGIN'])) { ?>
                            <!-- <p>after login You can place Order</p> -->

                            <!-- !$() -->


                            <form method="post">
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address" require placeholder="123 Street, City" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">City</label>
                                        <input type="text" name="city" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">ZIP Code</label>
                                        <input type="text" name="pincode" class="form-control" required>
                                    </div>
                                </div>

                                <h5 class="mb-3">Payment Method</h5>

                                <div class="form-check mb-2  ">

                                    <input class="form-check-input" type="radio" name="payment_type" id="COD">
                                    <label class="form-check-label" for="COD">Cash on Delivery</label>

                                    <div class="pt-2">
                                        <input class="form-check-input" type="radio" name="payment_type" id="easypaisa">
                                        <label class="form-check-label" for="easypaisa">EasyPaisa</label>
                                    </div>

                                </div>


                                <button class="btn btn-primary w-100 mt-4" name="submit" type="submit">Place Order</button>

                            </form>



                        <?php } else {
                            echo 'Please Login to place Order';
                        }; ?>


                    </div>
                </div>



                <!-- Order Summary & Payment -->
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-5 pb-5">
                    <div class="order-summary  mb-4">
                        <h5>Order Summary</h5>


                        <?php
                        $cart_total = 0;
                        foreach ($_SESSION['cart'] as $key => $val) {

                            $productArr = get_product($con, '', '', $key);
                            // prx($productArr);
                            $pname = $productArr[0]['product_name'];
                            $mrp  = $productArr[0]['product_mrp'];
                            $price = $productArr[0]['price'];
                            $image = $productArr[0]['image'];
                            $qty = $val['qty'];
                            $cart_total = $cart_total + ($price * $qty)

                        ?>

                            <div class="d-flex align-items-center justify-content-between">
                                <img src="../backend/media/product/<?php echo $image ?>" class="w-25">

                                <p><?php echo $pname ?></p>
                                <span class="float-end"><?php echo "₹" . $qty * $price ?></span>
                                <a href="javascript:void(0)" onclick="manage_cart(<?php echo $key ?>,'remove' )"><button class="btn btn-danger"><i class=" ri-delete-bin-5-line"></i> </button></a>
                            </div>
                            <hr>
                        <?php } ?>
                        <div class="d-flex align-items-cener justify-content-between">
                            <h5>Total Order</h5>
                            <h5><?php echo "₹" . $cart_total ?></h5>
                        </div>
                    </div>




                </div>
            </div>
        </div>

    </section>
    <?php require 'footer.php'; ?>



    <script>
        var tl = gsap.timeline()
        // contact form
        tl.to("#checkout h2", {
            y: 35,
            duration: .5,
            ease: Expo.InOut,

        });


        tl.to("#checkout .card, #checkout .order-summary", {
            x: 20,
            opacity: 0,
            duration: .5,
            ease: Expo.InOut,
            opacity: 100,
            stagger: .3,

        });

    </script>

</body>

</html>