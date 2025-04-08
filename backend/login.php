<?php
require ('connection.inc.php');
require ('function.inc.php');

$msg='';
if(isset($_POST['submit'])){
$username=get_safe_value($con,$_POST['username']);
 $password=get_safe_value($con,$_POST['password']);


     $sql ="select * from admin_user where username='$username' and password='$password'";
     $res = mysqli_query($con,$sql);
     $count =mysqli_num_rows($res);

     if($count>0){
        $_SESSION['ADMIN_LOGIN']='yes';
        $_SESSION['ADMIN_USERNAME']=$username; 
        header('location:blank.php');
        die();
     }else{
        $msg = "please enter correct password";
     }
}
?>




















<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title of the page -->
    <title>Admin Form </title>
    <!-- External CSS file for styling -->
     <?php require 'link.php'; ?>

</head>

<body>
<div class="row d-flex align-items-center mt-5 pt-5 justify-content-center">
<div class="col-xl-6">
   <div class="card pt-2">
      <div class="card-body">
         <h2 class="header-title  mb-4 ps-3"> ADMIN PANNEL</h2>



         <form method="post" >
            <div class="tab-content b-0 mb-0">
               <div class="tab-pane active" id="basictab1">
                  <div class="row">
                     <div class="col-12 pe-5 ps-5">
                         
                        <div class="row mb-3">
                           <label class="col-md-3 col-form-label ps-2" for="userName">User Name</label>
                              <input type="text" class="form-control" id="userName" name="username" value="" placeholder="User Name" require >
                        </div>
                        
                        <div class="row  mb-3">
                           <label class="col-md-3 col-form-label ps-2 " for="password"> Password</label>                         
                              <input type="password" id="password" name="password" class="form-control" value="" placeholder="password" require>
                        </div>

                        
                        <div class=" row mb-3">
                        <button type="submit" name="submit"  class="btn btn-success p-2 ">Sign in</button>
                    </div>
                     <!-- end col -->
           

                    </div>
           
           
                  <!-- end row -->
               </div>
           
            </div>
      </div>
      </form> 




   </div>
</div>
</div>
</div>


</body>


</html>