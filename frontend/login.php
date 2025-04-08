<?php
require 'header.php';
// ($con->query($sql)


if (isset($_SESSION['USER_LOGIN']) && ($_SESSION['USER_LOGIN']) == "yes") {

?>
    <script>
        window.location.href = "my_order.php";
    </script>

<?php
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    require 'link.php';
    ?>

    <title>Login/ Registration</title>

</head>

<body>
    <section id="login">
        <div class="container pt-5 pb-5">
            <div class="row mt-5">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">

                            <h2 class=" mb-3 text-center mb-3">LOGIN</h2>

                            <div id="rootwizard">

                                <div class="tab-content mb-0 b-0">

                                    <div class="tab-pane active" id="first">

                                        <form id="user_login" method="post">
                                            <div class="form-group">
                                                <div class="mb-2">
                                                    <label for="login_email">Email</label>
                                                    <input class="form-control" type="email" id="login_email" name="login_email">
                                                    <span id="login_email_error" class="field_error text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="mb-2">
                                                    <label for="login_password">Password</label>
                                                    <input type="password" class="form-control" id="login_password" name="login_password">
                                                    <span id="login_password_error" class="field_error text-danger"></span>
                                                </div>
                                            </div>

                                            <button class="btn btn-info" type="submit">Login</button>

                                        </form>

                                        <!-- 
                                <div class="register_msg" >
                                    <p class="mb-2 "></p>
                                </div> -->

                                    </div>
                                </div>


                            </div> <!-- tab-content -->
                        </div> <!-- end #rootwizard-->
                    </div> <!-- end card-body -->
                </div> <!-- end card-->




                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="text-center">User Registration</h2>

                            <form id="register_form">
                                <div class="mb-0">
                                    <label for="name" class="form-label">Name:</label>
                                    <input type="text" id="name" class="form-control" name="name">
                                    <span id="name_error" class="text-danger field_error"></span>
                                </div>

                                <div class="mb-0">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" id="email" class="form-control" name="email">
                                    <span id="email_error" class="text-danger field_error"></span>
                                </div>

                                <div class="mb-0">
                                    <label for="mobile" class="form-label">Mobile:</label>
                                    <input type="text" id="mobile" class="form-control" name="mobile">
                                    <span id="mobile_error" class="text-danger field_error"></span>
                                </div>

                                <div class="mb-0">
                                    <label for="password" class="form-label">Password:</label>
                                    <input type="password" id="password" class="form-control" name="password">
                                    <span id="password_error" class="text-danger field_error"></span>
                                </div>

                                <button type="submit" class="btn btn-primary">Register</button>
                            </form>
                            <!-- <div>
                            <p id="register_msg" class="text-success" >dsdadasd</p>
                        </div> -->
                            <!-- <button type="submit" class="btn btn-primary">Register</button> -->
                            <!-- <div class="register_msg mt-3">
                            <p class="text-success"></p>
                        </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->


        <?php
        require 'footer.php';
        ?>
    </section>

    <script>
        var tl = gsap.timeline()
        // ==================================== navbar animation 
        tl.from("#login .card", {
            x: -20,
            opacity: 0,
            delay: 0.5,
            duration: 0.5,
            stagger: 0.3,
            ease: Expo.ease,
        })
    </script>



</body>

</html>