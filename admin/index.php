    <?php include('partials/menu.php'); ?>
        
        <!--main section starts -->
        <div class="main-content">
        <div class="wrapper">
            <h1>Dashboard</h1>
           
            <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>
<br>

                  
            <div class="col-4 text-center">
                <?php
                     $sql3 = "SELECT * FROM t_admin";
                     $res3 = mysqli_query($conn, $sql3);
                     $count3 = mysqli_num_rows($res3);

                     ?>
                    <h1><?php echo $count3; ?></h1>
                    <br>
                    Admins
                </div>
                
                 <div class="col-4 text-center">
                     <?php
                     $sql = "SELECT * FROM t_services";
                     $res = mysqli_query($conn, $sql);
                     $count = mysqli_num_rows($res);

                     ?>

                    <h1><?php echo $count; ?></h1>
                    <br>
                    services
                </div>

                <div class="col-4 text-center">
                <?php
                     $sql2 = "SELECT * FROM t_order";
                     $res2 = mysqli_query($conn, $sql2);
                     $count2 = mysqli_num_rows($res2);

                     ?>
                    <h1><?php echo $count2; ?></h1>
                    <br>
                    Total Orders
                </div>

                

            <div class="clearfix"></div>

            </div>
        </div>
        <!--main section ends -->

        <?php include('partials/footer.php'); ?>
