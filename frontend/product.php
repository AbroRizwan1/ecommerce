<?php

require 'header.php';

$product_id = mysqli_real_escape_string($con, $_GET['id']);
if ($product_id < 0) {
    $product_id = mysqli_real_escape_string($con, $_GET['id']);
} else {

    $get_product =  get_product($con, '', '', $product_id);
}



// prx($get_product);

?>

<body id="body">
    <div class="product">
        <div class="product-featured  container">

            <h2 class="title">Deal of the day</h2>

            <div class="showcase-wrapper has-scrollbar">

                <div class="showcase-container">

                    <div class="showcase">
                        <div class="showcase-banner">
                            <img src="../backend/media/product/<?php echo $get_product[0]['image'] ?>" alt="shampoo, conditioner & facewash packs"
                                class="showcase-img">

                        </div>

                        <div class="showcase-content">
                            <a href="#">
                                <h3 class="showcase-title"> <?php echo $get_product[0]['product_name'] ?> </h3>
                            </a>



                            <p class="showcase-desc">
                                <?php echo $get_product[0]['short_desc'] ?>
                            </p>



                            <div class="showcase-rating">
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star-outline"></ion-icon>
                                <ion-icon name="star-outline"></ion-icon>
                            </div>


                            <div class="price-box">
                                <p class="price"> <?php echo '₹' .  $get_product[0]['product_mrp'] ?></p>
                                <del> <?php echo '₹' .  $get_product[0]['price'] ?></del>
                            </div>

                            <div class="showcase-desc">
                                <p> <a href="categories.php?id='<?php echo  $get_product['0']['categories_id'] ?>'">Categories : <?php echo $get_product[0]['categories'] ?></a></p>
                            </div>

                            <div class="showcase-desc">
                                <p><span>Availability : </span> In Stock</p>
                            </div>


                            <div class="showcase-desc" style="margin-block: 10px;">
                                <p><span style="font-size:20px; display:block; margin-block: 8px;">Quantity : </span>
                                    <select style="width:46px; height:4vh;" id="qty">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </p>
                            </div>

                            <div>

                                <a href="javascript:void(0)">
                                    <button class="add-cart-btn" onclick="manage_cart('<?php echo $get_product['0']['id'] ?>','add' )">add to cart</button>
                                </a>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="showcase-wrapper has-scrollbar container" style="margin-top: 30px; margin-bottom: 100px;">

        <h3 style="margin-bottom: 20px;"> DESCRIPTION</h3>

        <p><?php
            echo $get_product[0]['description'] ?></p>

    </div>


    <?php
    require 'footer.php';
    ?>

</body>

</html>