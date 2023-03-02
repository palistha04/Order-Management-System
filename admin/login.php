<?php include('../config/constant.php'); ?>

<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
    
    <div class="loginclass">
        <h1 class="text-center">Admin Login</h1> 
        
        <?php
            if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            if(isset($_SESSION['no-login-message'])){
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
            
        ?>
        <br>

        <!-- Login form starts here -->
        <form action="" method="POST" class="text-center"> 
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username"><br> <br>
            Password: <br>
            <input type="password" name="password" placeholder="Enter Password">
<br> <br>
            <input type="submit" name="submit" value="Login" class="btn-primary" >
    <br><br>
        </form>
        <!-- Login form starts here -->
    </div>

    </body>
</html>

<?php
    //check submit buton click or not
    if(isset($_POST['submit'])){
        //process for login

        //1 get data fro login form
        $username=$_POST['username'];
        $password=md5($_POST['password']);

        //sql query to check pw  and username exist or not
        $sql = "SELECT * FROM t_admin WHERE username='$username' AND password='$password'";

        //execute qry
        $res=mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);
        
        if($count==1){
            //user available 
            $_SESSION['login']="<div class='success'>Login Successful.</div>";
            $_SESSION['user']=$username; //to check whether user is login or not and logout will unset it
            //redirect to homepage
            header('location:'.SITEURL.'admin/');
        }else{
            //user not available
            $_SESSION['login']="<div class='error text-center'>Username or Password didnot match.</div>";
            //redirect to homepage
            header('location:'.SITEURL.'admin/login.php');
        }
    }

?>