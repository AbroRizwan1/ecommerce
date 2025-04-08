<?php
require 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    require 'link.php';
    ?>

</head>

<body class="body">


    <main id="main">

        <!--
  - BANNER
-->

        <div class="banner main1">
            <div class="container">
                <div class="b-heading1" id="heading1">
                    <h1>Effortless Style</h1>
                </div>
                <div class="b-heading2" id="heading2">
                    <h1>Endless Possibilities</h1>
                </div>
                <div class="slider-container has-scrollbar">
                    <div class="slider-item ">
                        <div class="box">
                            <video autoplay loop muted src="./assets/images/clo.mp4" class="banner-img image" id="video"></video>
                            <!-- <img src="./assets/images/watch1.avif" class="banner-img image" style=" background-position: center;"> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!--
            - PRODUCT GRID
          -->



        <div class="product-main container">
            <h2 class="title" id="count">New Products</h2>
            <div class="product-grid product-grid1" style="padding-bottom: 80px;">

                <?php
                $get_product =  get_product($con, 4);

                foreach ($get_product as $list) { ?>


                    <div class="showcase" id="showcase">
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
                                    <a href="product.php?id=<?php echo $list['id'] ?>">
                                        <ion-icon name="eye-outline"></ion-icon>
                                    </a>
                                </button>
                                <button class="btn-action">
                                    <ion-icon name="repeat-outline"></ion-icon>
                                </button>
                                <button class="btn-action">
                                    <ion-icon name="bag-add-outline"> <?php echo $totalProduct ?></ion-icon>
                                </button>
                            </div>
                        </div>

                        <div class="showcase-content">
                            <a href="#" class="showcase-category"><?php echo $list['product_name'] ?></a>
                            <a href="product.php?id=<?php echo $list['id'] ?>">
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

                            <!-- 
                            <div class="price-box" style="display: flex; justify-content: center;">

                                <button id="add-to-cart" onclick="myfun()" style="background-color: black; color:white; width: 15vw; padding:8px; margin-block:16px;  border-radius: 18px;">ADD TO CART</button>
                            </div> -->

                        </div>
                    </div>
                <?php }; ?>
            </div>
            <!-- <h1 id="count">KING</h1> -->

        </div>
    </main>



    <!-- body -->


    <?php
    require 'footer.php';
    ?>


    <script>
        
        function scrollAnim() {
            // =============aboutAnimation
            gsap.to(".title", {
                x: 39,
                delay: .2,
                duration: 1,
                ease: Expo.InOut,
                stagger: .3,
                opacity: 100,

                scrollTrigger: {
                    trigger: ".title",
                    scroller: "body",
                    start: "top 65%",
                }

            });



            gsap.to(".product-grid1", {
                y: 0,
                duration: 1,
                ease: "circ.out",
                stagger: .1,
                opacity: 100,
                scrollTrigger: {
                    trigger: ".product-grid1",
                    scroller: "body",
                    start: "top 100%",
                    // end: "top 80%",
                    // scrub: 1,

                }

            });




        }
        scrollAnim()

        function init() {
            gsap.registerPlugin(ScrollTrigger);

            // Initialize Locomotive Scroll with native scrollbar
            const locoScroll = new LocomotiveScroll({
                el: document.querySelector(".main1"),
                smooth: true, // Enable smooth scrolling
                lerp: .1, // Adjust smoothness (lower = smoother)
                multiplier: 1, // Adjust scroll speed
                getDirection: true,
                getSpeed: true,
                useNativeScroll: true, // Use the native scrollbar
            });

            // Sync Locomotive Scroll with ScrollTrigger
            locoScroll.on("scroll", ScrollTrigger.update);

            // Set up ScrollTrigger proxy for Locomotive Scroll
            ScrollTrigger.scrollerProxy(".main1", {
                scrollTop(value) {
                    return arguments.length ?
                        locoScroll.scrollTo(value, 0, 0) :
                        locoScroll.scroll.instance.scroll.y;
                },
                getBoundingClientRect() {
                    return {
                        top: 0,
                        left: 0,
                        width: window.innerWidth,
                        height: window.innerHeight,
                    };
                },
                pinType: document.querySelector(".main1").style.transform ? "transform" : "fixed",
            });

            // Refresh ScrollTrigger and Locomotive Scroll on updates
            ScrollTrigger.addEventListener("refresh", () => locoScroll.update());
            ScrollTrigger.refresh();
        }

        init();

        // GSAP animation for the heading
        var tl = gsap.timeline({
            scrollTrigger: {
                trigger: "#heading1 h1",
                scroller: ".main1",
                // markers: {
                //     // indent: 150 * i,
                //     startColor: "red",
                //     endColor: "white"
                // },

                start: "top 20%",
                end: "top 0",
                scrub: 2,
                // toggleActions: "play none none none" // Play the animation once
            }
        });

        tl.to("#heading1 h1", {
            x: -80,
            duration: .8,
            ease: Expo.InOut,

        }, "anim")

        tl.to("#heading2 h1", {
            x: 80,
            duration: .8,

        }, "anim")


        tl.to(".box #video", {
            width: "100%",
            duration: 0.5,

        }, "anim")
    </script>


</body>

</html>