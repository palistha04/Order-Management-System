<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Services</h1>
            <br>
            <?php
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['upload'])){
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
            ?>
            <br><br>

            <!-- add category form starts -->
                <form action="" method="post" enctype="multipart/form-data">

                    <table class="tbl-30">

                        <tr>
                            <td>Title: </td>
                            <td>
                                <input type="text" name="title" placeholder="Product title">
                            </td>
                        </tr>

                        <tr>
                            <td>Select Image: </td>
                            <td>
                                <input type="file" name="image" >
                            </td>
                        </tr>

                        <tr>
                            <td>Featured: </td>
                            <td>
                                <input type="radio" name="featured" value="Yes">Yes
                                <input type="radio" name="featured" value="No">No
                            </td>
                        </tr>

                        <tr>
                            <td>Active: </td>
                            <td>
                                <input type="radio" name="active" value="Yes">Yes
                                <input type="radio" name="active" value="No">No
                            </td>
                        </tr>
                        
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" value="Add Product" class="btn-secondary">
                            </td>
                        </tr>

                    </table>
                </form>


                <?php
                    //check submit button
                    if(isset($_POST['submit'])){
                        
                        //get value from form

                        $title = $_POST['title'];

                        //for radio input type we need to check whether button is selected or not
                        if(isset($_POST['featured'])){
                            //get value from form
                            $featured = $_POST['featured'];
                        }
                        else{
                            //set default value
                            $featured = "No";
                        }

                        if(isset($_POST['active'])){
                            $active = $_POST['active'];
                        }
                        else{
                            $active = "No";
                        }

                        //check whether image is selected or not amd set value for img name accordingly
                        // print_r($_FILES['image']);

                         //die(); //brk code here

                         if(isset($_FILES['image']['name'])){
                            $image_name = $_FILES['image']['name'];
                                //upload img only if img is selected
                                    if($image_name!=""){
                                        
                                   

                            //auto rename our image
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
                                header('location:'.SITEURL.'admin/add-services.php');

                                die();
                            }
                        } 


                        }
                        else{
                            $image_name = "";
                        }

                       

                        //create sql qry to insert product into database

                        $sql="INSERT INTO t_services SET
                            title='$title',
                            image_name='$image_name',
                            featured='$featured',
                            active='$active'

                        ";

                        //execute qry and save in db

                        $res = mysqli_query($conn, $sql);

                        //check qry executed or not and data added or not

                        if($res==true){
                            //qry executed and product added
                            $_SESSION['add']="<div class='success'>Product added Successfully.</div>";
                            header('location:'.SITEURL.'admin/manage-services.php');

                        }else{
                            //failed to add product
                            $_SESSION['add']="<div class='error'>Failed to add Product.</div>";
                            header('location:'.SITEURL.'admin/add-services.php');

                        }

                    }
                ?>

             <!-- add category form starts -->
        
    </div>
</div>


<?php include('partials/footer.php'); ?>