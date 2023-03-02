<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br>
        <?php
            //get the id of selected admin
            $id=$_GET['id'];


            //create sql qry to get the details 
            $sql="SELECT * FROM t_admin WHERE id=$id";

            //execute qry
            $res=mysqli_query($conn, $sql);

            //check if exexuted or not
            if($res==TRUE){
                //check whether the data is available or not
                    $count = mysqli_num_rows($res);
                //check whether we have admin data or not
                    if($count==1){
                        //get the details
                        $row=mysqli_fetch_assoc($res);

                        $full_name = $row['full_name'];
                        $username = $row['username'];

                    }else{
                        //redirect to manage admin page
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
            }


        ?>

        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>FULL NAME: </td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name=" submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
            
        </form>
    </div>
</div>

<?php
    //check whether the submit button is clicked or not
    if(isset($_POST['submit'])){
        //get value from form to update
        $id= $_POST['id'];
        $full_name= $_POST['full_name'];
        $username= $_POST['username'];

        //create sql query 
        $sql="UPDATE t_admin SET 
        full_name = '$full_name',
        username = '$username' 
        WHERE id='$id'
        ";

        //execute qry
        $res = mysqli_query($conn, $sql);

        //check execution of qry
        if($res==TRUE){
            //qry executed and updated admin
            $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');

        }else{
            //faild to update admin
            $_SESSION['update'] = "<div class='error'>Failed to update Admin.</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }

    }

?>

<?php include('partials/footer.php')?>