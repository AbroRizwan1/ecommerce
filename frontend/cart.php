<?php
require 'header.php';

// prx($_SESSION);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require 'link.php'; ?>
</head>

<body>





    <section id="cart">
        <h2 class="text-center my-4">CART</h2>
        <div class="container">
            <!-- Responsive Table -->
            <div class="table-responsive ">
                <table class="table table-bordered border-secondary" id="table">
                    <thead>
                        <tr>
                            <th class="p-3" scope="col">PRODUCTS</th>
                            <th class="p-3" scope="col">NAME OF PRODUCTS</th>
                            <th class="p-3" scope="col">PRICE</th>
                            <th class="p-3" scope="col">QUANTITY</th>
                            <th class="p-3" scope="col">TOTAL</th>
                            <th class="p-3" scope="col">REMOVE</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        foreach ($_SESSION['cart'] as $key => $val) {
                            $productArr = get_product($con, '', '', $key);
                            $pname = $productArr[0]['product_name'];
                            $mrp  = $productArr[0]['product_mrp'];
                            $price = $productArr[0]['price'];
                            $image = $productArr[0]['image'];
                            $qty = $val['qty'];
                        ?>
                            <tr>
                                <td class="d-flex justify-content-center align-items-center">
                                    <img src="../backend/media/product/<?php echo $image ?>" class="img-fluid rounded add_cart_image" alt="<?php echo $pname; ?>" style="max-height: 100px;">
                                </td>
                                <td class="text-center align-middle"><?php echo $pname; ?></td>
                                <td class="align-middle">
                                    <ul class="list-unstyled mb-0">
                                        <li><del><?php echo $mrp ?></del></li>
                                        <li><?php echo "₹" . $price ?></li>
                                    </ul>
                                </td>
                                <td class="align-middle">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <input class="form-control w-25 text-center me-2" type="number" id="<?php echo $key ?> qty" value="<?php echo $qty ?>">
                                        <a href="javascript:void(0)" onclick="manage_cart(<?php echo $key ?>,'update')">
                                            <button class="btn btn-primary btn-sm">Update</button>
                                        </a>
                                    </div>

                                </td>
                                <td class="text-center align-middle"><?php echo $qty * $price ?></td>
                                <td class="text-center align-middle">
                                    <a href="javascript:void(0)" onclick="manage_cart(<?php echo $key ?>,'remove')">
                                        <button class="btn btn-danger btn-sm"><i class="ri-delete-bin-5-line"></i></button>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <!-- Buttons Section -->
            <div class="container mt-4">
                <div class="row">
                    <div class="col-12 d-flex justify-content-between">
                        <a href="index.php" class="text-decoration-none">
                            <button class="btn btn-secondary" id="continue">Continue Shopping</button>
                        </a>
                        <a href="checkout.php" class="text-decoration-none">
                            <button class="btn btn-secondary" id="checkout">Check out</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->

    <!-- 
    <script src="myscript.js"></script> -->

    </section>

    <?php require 'footer.php'; ?>



    <script>
        // =============aboutAnimation
        gsap.to("#cart h2", {
            y: 30,
            duration: .7,
            ease: Expo.InOut,
            stagger: .2,


        });


        gsap.from("#table", {
            y: 30,
            opacity: 0,
            duration: .7,
            ease: Expo.InOut,
            stagger: .2,
        });


        gsap.from("#checkout", {
            x: 50,
            opacity: 0,
            duration: .7,
            ease: Expo.InOut,
            stagger: .2,
        });
        gsap.from("#continue", {
            x: -50,
            opacity: 0,
            duration: .7,
            ease: Expo.InOut,
            stagger: .2,
        });
    </script>




</body>

</html>