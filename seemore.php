<?php include('partials-front/menu.php'); ?>

     <!-- services Section Starts Here -->
     <section class="services">
        <div class="container">
            <h2 class="text-center">Our Services</h2>


            <?php
                //display all product that are active
                //sql qry
                $sql = "SELECT * FROM t_services WHERE active='YEs'";

                //execute
                $res = mysqli_query($conn, $sql);

                //count rows
                $count = mysqli_num_rows($res);

                //product available or not
                if($count>0){
                    //available
                    while($row=mysqli_fetch_assoc($res)){
                        //get the values
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                            <a href="#">
                                <div class="box-3 float-container">
                                    <?php
                                    if($image_name==""){
                                        //img not available
                                        echo "<div class='error'> Image not found.</div>";


                                    }else{
                                        //img available
                                            ?>
                                                 <img src="<?php echo SITEURL; ?>images/Product/<?php echo $image_name; ?>" alt="bills" class="img-responsive img-curve">
                                            <?php

                                    }

                                    ?>
                                   

                                    <h3 class="float-text text-white"><?php echo $title; ?></h3>
                                </div>
                             </a>


                        <?php

                    }
                }else{
                    //not available
                    echo "<div class='error'> Product not found.</div>";
                }

            ?>
           

            
            
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- services Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>