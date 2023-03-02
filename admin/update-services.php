<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Product</h1>
        <br>

        <?php
            //check whether id is set or not
            if(isset($_GET['id'])){
                //get id and all other details
                
                $id = $_GET['id'];
                $sql = "SELECT * FROM t_services WHERE id=$id";
 
                $res = mysqli_query($conn, $sql);
                
                $count = mysqli_num_rows($res);
                if($count==1){
                    //get all data
                        $row = mysqli_fetch_assoc($res);
                        $title = $row['title'];
                        $current_image = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];

                }
                else{
                    //redirect

                    $_SESSION['no-product-found'] = "<div class='error'>Product not found.</div>";
                    header('location:'.SITEURL.'admin/manage-services.php');
                }

            }
            else{
                //redirect 
                header('location:'.SITEURL.'admin/manage-services.php');

            }
        
        ?>
        
        <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" value="<?php echo $title; ?>">
                </td>
            </tr>

            <tr>
                <td>Current Image: </td>
                <td>
                    <?php 
                        if($current_image != ""){
                            //display img

                            ?>
                            <img src="<?php echo SITEURL; ?>images/Product/<?php echo $current_image; ?>" width ="150 px">


                    <?php
                        }else{
                            //display msg
                            echo "<div class='error'>image not added</div>";
                        }
                    ?>
                </td>
            </tr>

            <tr>
                <td>New Image: </td>
                <td>
                    <input type="file" name="image" >
                </td>
            </tr>

            <tr>
                <td>Featured: </td>
                <td>
                    <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes" >Yes

                    <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No" >No
                </td>
            </tr>

            <tr>
                <td>Active: </td>
                <td>
                    <input  <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes" >Yes

                    <input  <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No" >No
                </td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                     <input type="submit" name="submit" value="update product" class="btn-secondary" >
                </td>
            </tr>


        </table>
</form>

<?php
    if(isset($_POST['submit'])){

        //get all values from form
            $id = $_POST['id'];
            $title = $_POST['title'];
            $current_image = $_POST['current_image'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];

            //updating new img if selected
            if(isset($_FILES['image']['name'])){
                //get img details
                $image_name = $_FILES['image']['name'];

                if($image_name != ""){
                    //img available
                     //upload new img
                            //get ext of our image(jpg png gif etc) eg "image.jpg"

                            $ext = end(explode('.',$image_name));

                            //rename img
                            $image_name = "image_product_".rand(000,999).'.'.$ext; //eg image_product_834.jpg
                                

                            $source_path = $_FILES['image']['tmp_name'];

                            $destination_path = "../images/Product/".$image_name;

                            //finally upload image
                            $upload = move_uploaded_file($source_path, $destination_path);

                            //check whether the img is uploaded or not
                            //if not uploaded, then we will stop the process and redirect with error msg
                            if($upload==false){
                                //set msg
                                $_SESSION['upload'] = "<div class='error'> Failed to upload image.</div>";
                                header('location:'.SITEURL.'admin/manage-services.php');

                                die();
                            }

                            //remove current img
                            if($current_image != ""){
                                $remove_path = "../images/Product/".$current_image;

                                    $remove = unlink($remove_path);

                                    //check whether the img is removed or not
                                    if($remove==false){
                                    //failed to remove img
                                    $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current image.</div>";
                                    header('location:'.SITEURL.'admin/manage-services.php');
                                    die(); //stop the process

                            }

                            }
                            


                }else{
                    $image_name = $current_image; 

                }


            }else{
                $image_name = $current_image;
            }


            //updating database
            $sql2 = "UPDATE t_services SET
            title = '$title',
            image_name = '$image_name', 
            featured = '$featured', 
            active = '$active'
            WHERE id=$id 
            ";

            //execute qry
             $res2 = mysqli_query($conn, $sql2);

            //redirect with msg
            if($res2==true){
                //product updated
                $_SESSION['update'] = "<div class='success'>Product updated successfully.</div>";
                header('location:'.SITEURL.'admin/manage-services.php');
            }else{
                //failed
                $_SESSION['update'] = "<div class='error'>Failed to update Product.</div>";
                header('location:'.SITEURL.'admin/manage-services.php');
            }

    }


?>
    </div>
</div>


<?php include('partials/footer.php'); ?>