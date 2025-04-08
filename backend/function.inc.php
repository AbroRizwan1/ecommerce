<?php

function pr($arr){
    echo '<pre>';
print_r($arr);
}



function prx($arr){
    echo '<pre>';
print_r($arr);
die();
}


function get_safe_value($con,$str){

    if ($str !='') {
        $str=trim($str);
        return mysqli_real_escape_string($con,$str);
    }
}



// $sql = "SELECT * FROM categories ORDER BY categories ASC";
// $res = mysqli_query($con, $sql);
// $row = 





















// ()$!

//    include 'connection.inc.php';


    if ($_SERVER['REQUEST_METHOD'] === "POST") {


    // $cat_id = mt_rand(11111,99999);
    // $cat_name = $_POST['cat_name'];
    // $meta_title = $_POST['meta_title'];
    // $meta_desc = $_POST['meta_desc'];
    // $meta_key = $_POST['meta_key'];
    // $added_on = date('M-D-Y');
    // $slug_url =  slugUrl($cat_name);


    // print_r ($_POST);

//    // ()$!

   
//     $sql = "INSERT INTO categories (cat_name, meta_title, meta_desc, meta_key, slug_url, status, added_on) 
   
//     VALUES ('$cat_id', '$cat_name', '$meta_title', '$meta_desc', '$meta_key', '$slug_url', 1, '$added_on')";

//     $res = mysqli_query($con, $sql);

   
//    if ($res) {

//     header('location:view_categories.php');

//      }else{
   

//    }
   




    }






    // function get_categories(){
    //     include 'db_connection.php';
   
    //    $sql = "SELECT * FROM category ORDER BY id DESC";
    //    $check = mysqli_query($con,$sql);
      
    // while ($result = mysqli_fetch_assoc($check) ) {
    //     $output= "
    // <td>".$result['cat_id']."</td>
    // <td>".$result['cat_name']."</td>
    // <td>".$result['slug_url']."</td>
    // <td>".$result['status']."</td>
    // <td>".$result['added_on']."</td>
    //  ";
    //  }
    //  return $output;
    // }


   

    function slugUrl($string){
       $slug = preg_replace('/[^a-zA-z0-9 -]/','', $string);
        $slug = str_replace(' ','-', $slug);
        $slug = strtolower($slug);
    return $slug;
    }
   
   
   
   




   
    ?>