<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>

        <br>
        <?php
            //get the id of selected admin
            $id=$_GET['id'];


            //create sql qry to get the details 
            $sql="SELECT * FROM t_order WHERE id=$id";

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

                        $Company_name = $row['Company_name'];
                        $Message = $row['Message'];

                    }else{
                        //redirect to manage admin page
                        header('location:'.SITEURL.'admin/manage-order.php');
                    }
            }


        ?>

        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Company name: </td>
                    <td>
                        <input type="text" name="Company_name" value="<?php echo $Company_name; ?>">
                    </td>
                </tr>
                
                <tr>
                    <td>Message: </td>
                    <td>
                        <input type="text" name="Message" value="<?php echo $Message; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name=" submit" value="Update order" class="btn-secondary">
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
        $Company_name= $_POST['Company_name'];
        $Message= $_POST['Message'];

        //create sql query 
        $sql="UPDATE t_order SET 
        Company_name = '$Company_name',
        Message = '$Message' 
        WHERE id='$id'
        ";

        //execute qry
        $res = mysqli_query($conn, $sql);

        //check execution of qry
        if($res==TRUE){
            //qry executed and updated admin
            $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-order.php');

        }else{
            //faild to update admin
            $_SESSION['update'] = "<div class='error'>Failed to update order.</div>";
            header('location:'.SITEURL.'admin/manage-order.php');
        }

    }

?>

<?php include('partials/footer.php')?>