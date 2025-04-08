
// REGISTRATION 
$(document).ready(function () {
    $("#register_form").on("submit", function (e) {
        e.preventDefault(); // Prevent default form submission

        // Clear previous error messages
        $(".field_error").html('');
        // Get form values
        let name = $("#name").val().trim();
        let email = $("#email").val().trim();
        let mobile = $("#mobile").val().trim();
        let password = $("#password").val().trim();

        let is_error = false;

        // Validate inputs
        if (name === "") {
            $("#name_error").html("Please Enter Your Name");
            is_error = true;
        }
        if (email === "") {
            $("#email_error").html("Please Enter Your Email");
            is_error = true;
        }
        if (mobile === "") {
            $("#mobile_error").html("Please Enter Your Mobile");
            is_error = true;
        }
        if (password === "") {
            $("#password_error").html("Please Enter Your Password");
            is_error = true;
        }

        // If any error exists, stop execution
        if (is_error) {
            return;
        }

        // Send data via AJAX
        $.ajax({
            url: "registration_submit.php",
            type: "POST",
            data: {
                name: name,
                email: email,
                mobile: mobile,
                password: password
            },
            success: function (response) {

                let result = response.trim();

                if (result === "present") {
                    $("#email_error").html("")
                    $(".register_msg p").html("") // Clear any previous success message

                } else if (result === "insert") {
                    // Show thank you message and reset the form
                    $(".register_msg p").html("")
                    $("#email_error").html("");
                    $("#register_form")[0].reset(); // Reset form
                } else {
                    $(".register_msg p").html(result).addClass("text-danger");

                }
            },

        });
    });
});


// =============Login

$(document).ready(function () {
    $("#user_login").on("submit", function (e) {
        e.preventDefault(); // Prevent default form submission

        // Clear previous error messages
        $(".field_error").html('');
        // Get form values
        let email = $("#login_email").val().trim();
        let password = $("#login_password").val().trim();

        let is_error = false;

        // Validate inputs
        if (email === "") {

            $("#login_email_error").html("Enter your Email");
            is_error = true;
        }
        if (password === "") {
            // alert(login_email + 'enter password');
            $("#login_password_error").html("Enter your Password");
            is_error = true;
        }

        //If any error exists, stop execution
        if (is_error) {
            return;
        }

        // Send data via AJAX
        $.ajax({
            url: "login_submit.php",
            type: "POST",
            data: {
                email: email,
                password: password
            },
            success: function (response) {
                let result = response.trim();

                if (result === "wrong") {
                    // Show error message for invalid credentials
                    $(".login_msg p").html("Please enter valid login details").addClass("text-danger");

                } else if (result === "Valid") {
                    // Redirect on successful login
                    window.location.href = window.location.href;


                } else {
                    // Show other errors
                    $(".register_msg p").html(result).addClass("text-danger");
                }
            },

        });
    });
});


// =============Contact us 
$(document).ready(function () {
    $("#contactForm").on("submit", function (e) {
        e.preventDefault(); // Prevent default form submission

        // Clear previous errors
        $(".text-danger").html('');


        // Get form values
        let name = $("#name").val().trim();
        let email = $("#email").val().trim();
        let mobile = $("#mobile").val().trim();
        let message = $("#message").val().trim();


        let isError = false;

        // Validation
        if (name === "") {
            $("#name_error").html("Please enter your name.");
            isError = true;
        }
        if (email === "") {
            $("#email_error").html("Please enter your email.");
            isError = true;
        }
        if (mobile === "") {
            $("#mobile_error").html("Please enter your mobile.");
            isError = true;
        }
        if (message === "") {
            $("#message_error").html("Please enter your message.");
            isError = true;
        }

        if (isError) return; // Stop if validation fails

        // AJAX Request
        $.ajax({
            url: "send_message.php",
            type: "POST",
            data: {
                name: name,
                email: email,
                mobile: mobile,
                message: message
            },

            success: function (response) {
                window.location.href = window.location.href;
            },

        });


    });
});






// function manage_cart(pid, type) {
//     let qty;

//     if (type === 'update') {
//         qty = $("#" + pid + "_qty").val(); // Fixed ID format for update
//     } else {
//         qty = $("#qty").val();
//     }

//     $.ajax({
//         url: "manage_cart.php",
//         type: "POST",
//         data: {
//             pid: pid,
//             qty: qty,
//             type: type,
//         },
//         success: function (result) {
//             if (type === 'update' || type === 'remove') {
//                 window.location.href = 'cart.php'; // Reload cart to reflect changes
//             }
//             $("#count").html(result); // Update cart count in UI
//         },
//         error: function (xhr, status, error) {
//             console.error("AJAX Error: " + status + error);
//         }
//     });
// }




// =================add to cart

function manage_cart(pid, type) {

    if (type === 'update') {
        let qty = $("#" + pid + "qty").val();
    } else {
        let qty = $("#qty").val();

        $.ajax({
            url: "manage_cart.php",
            type: "POST",
            data: {
                pid: pid,
                qty: qty,
                type: type,
            },
            success: function (result) {

                if (type == 'update' || type == 'remove') {
                    window.location.href = 'checkout.php';
                }

                // Update the cart count
                $("#count").html(result);
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error: " + status + error); // Log any errors
            }
        });
    }



}







