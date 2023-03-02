<?php include('partials-front/menu.php'); ?>

    <!-- ordering Section Starts Here -->
    <section class="bgimg text-center">
        <div class="container">
            <a href="<?php echo SITEURL; ?>form.php" class="btn btn-primary">Place Order Now!!</a>
         </div>
    </section>
    <!-- ordering Section Ends Here -->


<!-- about us Section Starts Here -->
    <div class="welcome text-center">
        <div class="container ">
        <h1><span><a href="#">Welcome to New Aluna Press</p></a></h1><br>
            <p>New Aluna Printing Press is one of the quality multi color offset Printers located in Kathmandu, Nepal. It has been providing best quality services to its customers since 2057 B.S. and has been maintaining healthy relationships with them.It focuses on producing excellent results that meet and exceed their customer's expectations. It uses only top quality materials and state-of-the-art equipment. </p>
            <br>
          <p><a class="btn btn-success" href="<?php echo SITEURL; ?>aboutus.php">Read More</a></p>
        </div>
    </div>
<!-- about us Section ends Here -->




    <!-- services Section Starts Here -->
    <section class="services">
        <div class="container color1">
            <h2 class="text-center">Our Services</h2>

            <?php 
                //create sql qry to display products from database
                $sql = "SELECT * FROM t_services WHERE active='Yes' AND featured='Yes' LIMIT 3";

                //execute
                $res = mysqli_query($conn, $sql);
                    //count rows to check whether product is available or not
                $count = mysqli_num_rows($res);

                if($count>0){

                    //product available
                    while($row=mysqli_fetch_assoc($res)){
                        //get values like id, title , image_name
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                            <a href="seemore.html">
                                <div class="box-3 float-container">
                                    <?php

                                    //check whether img is available or not
                                    if($image_name==""){
                                        //display msg
                                        echo "<div class='error'>Image not available</div>";
                                    }else{
                                        //image available
                                        ?>
                        <img src="<?php echo SITEURL; ?>images/Product/<?php echo $image_name ?>" alt="bills" class="img-responsive img-curve">

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
                    echo "<div class='error'>Product not Added.</div>";
                }


            ?>

            <div class="clearfix"></div>

            <div class="seemore text-center">
                <p><a class="btn btn-success" href="./seemore.php"> See More</a></p>
           </div>
            
        </div>
    </section>
    <!-- services Section Ends Here -->

    
       
        <!-- Navbar Section Ends Here -->


    <?php include('partials-front/footer.php'); ?>