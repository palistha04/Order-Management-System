<?php
    //authorization - access control
    //check whether the user is login or not
    if(!isset($_SESSION['user'])) //if user session is not set
    {
        //user is not login
        
        $_SESSION['no-login-message'] = "<div class='error'>Please Login to access admin panel</div>";
      //redirect to login page with msg
        header('location:'.SITEURL.'admin/login.php');
    }
?>