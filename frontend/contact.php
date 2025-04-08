<?php
require 'header.php';
?>


<?php
require 'link.php';
?>

<body id="body">


    <section class="contact_us">


        <h1 class="mt-5 mb-5 pb-2" style="text-align:center;  ">CONTACT US</h1>
        <!-- <div class="card-body ps-5 pe-5"> -->


        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-sm-6">
                    <form id="contactForm">
                        <div class="mb-2 ">
                            <label class="form-label">Name</label>
                            <input type="text" id="name" class="form-control" placeholder="Enter your name">
                            <span id="name_error" class="text-danger"></span>
                        </div>

                        <div class="mb-2">
                            <label class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" placeholder="Enter your email">
                            <span id="email_error" class="text-danger"></span>
                        </div>

                        <div class="mb-2">
                            <label class="form-label">Mobile</label>
                            <input type="number" id="mobile" class="form-control" placeholder="Enter your mobile">
                            <span id="mobile_error" class="text-danger"></span>
                        </div>

                        <div class="mb-2">
                            <label class="form-label">Message</label>
                            <textarea type="text" id="message" class="form-control" placeholder="Enter your Message"></textarea>
                            <span id="message_error" class="text-danger"></span>
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                        <p class="register_msg mt-2"> </p>
                    </form>
                </div>


                <div class="col-sm-12 col-md-6 col-lg-6 mb-5 d-flex align-items-center justify-content-center" >

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3621.40834516501!2d67.1075581752954!3d24.81570534704709!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33c786488c9e3%3A0x1b8b08960b30d560!2sKorangi%20Crossing%20Rd%2C%20Pakistan!5e0!3m2!1sen!2s!4v1741433624779!5m2!1sen!2s" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>


            </div>

        </div>



        <?php
        require 'footer.php';
        ?>
    </section>

    <script>
        // contact form

        gsap.to(".contact_us h1", {
            y: 20,
            duration: .7,
            ease: Expo.InOut,
            stagger: .2,


        });

        gsap.from("#contactForm", {
            x: -30,
            opacity: 0,
            duration: .7,
            ease: Expo.InOut,
            delay: .4,

        });

        gsap.to(".contact_us iframe", {
            x: -20,
            duration: 1,
            ease: Expo.InOut,
            delay: .3,
            opacity: 100,
            delay: .5,

        });
    </script>


</body>

</html>