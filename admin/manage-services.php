<?php include('partials/menu.php'); ?>
        

        <!--main section starts -->
        <div class="main-content">
        <div class="wrapper">
            <h1>Manage Services</h1>
            <br>
            <?php
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['remove'])){
                    echo $_SESSION['remove'];
                    unset($_SESSION['remove']);
                }
                
                if(isset($_SESSION['delete'])){
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['no-product-found'])){
                    echo $_SESSION['no-product-found'];
                    unset($_SESSION['no-product-found']);
                }

                if(isset($_SESSION['update'])){
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }

                if(isset($_SESSION['upload'])){
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }

                if(isset($_SESSION['failed-remove'])){
                    echo $_SESSION['failed-remove'];
                    unset($_SESSION['failed-remove']);
                }
                
              

            ?> 

              <!--main section starts -->
            <a href="<?php echo SITEURL; ?>admin/add-services.php" class="btn-primary">Add Services</a>
            <br>
            <br> 
            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>

                <?php
                        //qry to get product from database
                    $sql = "SELECT * FROM t_services";

                    //execute qry
                    $res = mysqli_query($conn, $sql);

                    //count rows
                    $count = mysqli_num_rows($res);

                    //create serial num variable and assign its value as 1
                    $sn=1;

                    //check whether we have data in db or not
                    if($count>0){
                        //have data
                        //get data and display
                        while($row=mysqli_fetch_assoc($res)){
                            $id = $row['id'];
                            $title = $row['title'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];

                            ?>
                                     <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $title; ?></td>

                                        <td>
                                            <?php 
                                            //check whether image name is available or not
                                            if($image_name!=""){
                                                //display img
                                                ?>
                                                    <img src="<?php echo SITEURL; ?>images/Product/<?php echo $image_name; ?>" width="100px">

                                                <?php

                                            }else{

                                                //display msg
                                                echo "<div class='error'>Image Not Added.</div>";
                                            }
                                            
                                            ?>
                                        </td>

                                        <td><?php echo $featured; ?></td>
                                        <td><?php echo $active; ?></td>
                                        <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-services.php?id=<?php echo $id; ?>" class="btn-secondary">Update Product</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-services.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Product</a>
                                        </td>
                                     </tr>
                            

                            <?php

                        }

                    }else{
                        //dont have data 
                        //we will display the ms inside table
                        ?>

                        <tr>
                            <td colspan="6">
                                <div class="error">No product added.</div>
                            </td>
                        </tr>

                        <?php

                    }

                ?>

               
                
               
                
            </table>
            </div>
        </div>
        <!--main section ends -->

<?php include('partials/footer.php'); ?>