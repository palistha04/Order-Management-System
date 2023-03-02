<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br>

        <?php 
        
        if(isset($_GET['id'])){
            $id=$_GET['id'];
        }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Current Password: </td>
                    <td>
                        <input type="password" name="current_password" placeholder="current password">
                    </td>
                </tr>
                <tr>
                    <td>NewPassword: </td>
                    <td>
                        <input type="password" name="new_password" placeholder="new password">
                    </td>
                </tr>
                <tr>
                    <td>ConfirmPassword: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="confirm password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary"> 
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>


<?php 
    //check submit button click or not
    if(isset($_POST['submit'])){
        //get data form form
            $id=$_POST['id'];
            $current_password=md5($_POST['current_password']);
            $new_password=md5($_POST['new_password']);
            $confirm_password=md5($_POST['confirm_password']);

        //check whether user with current id and pw exists or not
            $sql = "SELECT * FROM t_admin WHERE id=$id AND password='$current_password'";
        
            //execute qry
            $res = mysqli_query($conn, $sql);

            if($res==TRUE){
                //data available or not check
                $count=mysqli_num_rows($res);

                if($count==1){
                    //user exist pw cant be same
                    //check whether the new pw and confirm match or not
                    if($new_password==$confirm_password){
                        //update pw
                        $sql2 = "UPDATE t_admin SET
                        password='$new_password' 
                        WHERE id=$id
                        ";

                        //execute
                        $res2=mysqli_query($conn, $sql2);

                        //check
                        if($res2==TRUE){
                            $_SESSION['change-pwd'] = "<div class='success'>password Changed Successfully.</div>";
                             header('location:'.SITEURL.'admin/manage-admin.php');
                        }else{
                            $_SESSION['change-pwd'] = "<div class='error'>Failed to change password.</div>";
                            header('location:'.SITEURL.'admin/manage-admin.php');
                        }


                    }else{
                        //redirect to manage admin pg with error msg
                        $_SESSION['pwd-not-match'] = "<div class='error'>password didnot match.</div>";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }

                }else{
                    //user doesnt exist set msg and redirect
                    $_SESSION['user-not-found'] = "<div class='error'>User Not Found.</div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
        //check whether new pw and confirm pw match or not
        

        //change pw if all above is true
    }

?>


<?php include('partials/footer.php'); ?>