<?php
require 'header.php';
$cat_id = mysqli_real_escape_string($con, $_GET['id']);

if ($cat_id > 0) {

    $get_product =  get_product($con, '', $cat_id);
} else {

?>
    <script>
        window.location.href = 'index.php';
    </script>
<?php

}

?>


<?php
require 'link.php';
?>

<section id="category-page">
    <!-- product -->
    <?php
    if (count($get_product) > 0) { ?>


        <div class="product-main container  ">
            <h2 class="title"> CATEGORIES </h2>
            </h2>
            <div class="product-grid" style="padding-bottom: 80px;">


                <?php
                foreach ($get_product as $list) { ?>

                    <div class="showcase">
                        <div class="showcase-banner">
                            <a href="product.php?id=<?php echo $list['id'] ?>">
                                <img src="../backend/media/product/<?php echo $list['image'] ?>" alt="" width="300"
                                    class="product-img default">
                                <img src="../backend/media/product/<?php echo $list['image'] ?>" alt="" width="300"
                                    class="product-img hover">
                            </a>
                            <!-- <p class="showcase-badge">15%</p> -->
                            <div class="showcase-actions">
                                <button class="btn-action">
                                    <ion-icon name="heart-outline"></ion-icon>
                                </button>
                                <button class="btn-action">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </button>
                                <button class="btn-action">
                                    <ion-icon name="repeat-outline"></ion-icon>
                                </button>
                                <button class="btn-action">
                                    <ion-icon name="bag-add-outline"></ion-icon>
                                </button>
                            </div>
                        </div>

                        <div class="showcase-content">
                            <a href="#" class="showcase-category"><?php echo $list['product_name'] ?></a>
                            <a href="#">
                                <h3 class="showcase-title"><?php echo $list['short_desc'] ?></h3>
                            </a>
                            <div class="showcase-rating">
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star-outline"></ion-icon>
                                <ion-icon name="star-outline"></ion-icon>
                            </div>
                            <div class="price-box">
                                <p class="price"><?php echo $list['product_mrp'] ?> </p>
                                <del><?php echo $list['price'] ?></del>
                            </div>
                        </div>
                    </div>
                <?php }; ?>
            </div>

        <?php } else {
        echo 'Data not Found';
    } ?>


</section>


<?php
require 'footer.php';
?>


<script>
    function scrollAnim() {
        // =============aboutAnimation
        gsap.to("#category-page .title", {
            x: 20,
            delay: .2,
            duration: 1,
            ease: Expo.InOut,
            stagger: .3,
            opacity: 100,
        });



        gsap.to("#category-page .showcase", {
            y: -30,
            duration: .6,
            ease: "circ.out",
            stagger: .1,
            opacity: 100,

        });




    }
    scrollAnim()
</script>


</body>

</html>