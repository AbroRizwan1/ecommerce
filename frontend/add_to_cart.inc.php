<?php

// class add_to_cart
// {
//     function addProduct($pid, $qty)
//     {
//         $_SESSION['cart'][$pid]['qty'] = $qty;
//     }


//     function updateProduct($pid, $qty)
//     {
//         if (isset($_SESSION['cart'][$pid])) {
//             $_SESSION['cart'][$pid]['qty'] = $qty;
//         }
//     }


//     function removeProduct($pid)
//     {
//         if (isset($_SESSION['cart'][$pid])) {
//             unset($_SESSION['cart'][$pid]['qty']);
//         }
//     }


//     function emptyProduct()
//     {
//         unset($_SESSION['cart']);
//     }


//     function TotalProduct()
//     {
//         if (isset($_SESSION['cart'])) {

//             return count($_SESSION['cart']);
//         } else {
//             return 0;
//         }
//     }

//     // function TotalProduct()
//     // {
//     //     // Check if the 'cart' session variable is set and is an array
//     //     if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
//     //         // Return the number of items in the cart
//     //         return count($_SESSION['cart']);
//     //     } else {
//     //         // Return 0 if the cart is not set or is not an array
//     //         return 0;
//     //     }
//     // }
// }


    

class add_to_cart
{

    function addProduct($pid, $qty)
    {
        $_SESSION['cart'][$pid]['qty'] = $qty;
    }

    function updateProduct($pid, $qty)
    {
        if (isset($_SESSION['cart'][$pid])) {
            $_SESSION['cart'][$pid]['qty'] = $qty;
        }
    }

    function removeProduct($pid)
    {
        if (isset($_SESSION['cart'][$pid])) {
            unset($_SESSION['cart'][$pid]);
        }
    }

    function emptyProduct()
    {
        $_SESSION['cart'] = array();
    }

    function TotalProduct()
    {
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            return count($_SESSION['cart']);
        } else {
            return 0;
        }
    }
}
