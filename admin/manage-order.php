<?php include('partials/menu.php'); ?>
        

        <!--main section starts -->
        <div class="main-content">
        <div class="wrapper">
            <h1>Manage Orders</h1>
            <br>
            <?php
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
            ?>
             <!--main section starts -->
            
            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Full Name</th>
                    <th>Company name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone number</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>


                <?php
                //qry to get all admin
                $sql="SELECT * FROM t_order";
                //ececute the qry
                $res=mysqli_query($conn, $sql);

                //check whether the query is executed or not
                if($res==TRUE){
                   // count rows to check whether we have data in db or not
                   $count=mysqli_num_rows($res); //function to get all the rows in db
                        $sn=1; //create a variable and assign the value 
                   //check num of rows
                   if($count>0){
                       //have data in db
                       while($rows=mysqli_fetch_assoc($res)){
                           //using while loop to get all the data from db 
                           //and while loop will run as long as we have data in db

                           //get individual data
                           $id=$rows['id'];
                           $Name=$rows['Name'];
                           $Company_name=$rows['Company_name'];
                           $Email=$rows['Email'];
                           $Address=$rows['Address'];
                           $Phone_number=$rows['Phone_number'];
                           $Message=$rows['Message'];

                           //display the values in our table
                           ?>
                            
                            <tr>
                                <td><?php echo $sn++;?></td>
                                <td><?php echo $Name; ?></td>
                                <td><?php echo $Company_name; ?></td>
                                <td><?php echo $Email; ?></td>
                                <td><?php echo $Address; ?></td>
                                <td><?php echo $Phone_number; ?></td>
                                <td><?php echo $Message; ?></td>
                                <td>
                                
                                <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?> " class="btn-secondary">Update </a>
                                <a href="<?php echo SITEURL; ?>admin/delete-order.php?id=<?php echo $id; ?>" class="btn-danger">Delete </a>
                                </td>
                            </tr>


                           <?php
                       }
                    
                   }
                   else{
                       //dont have data in db

                   }
                }
                ?>
                
                
            </table>
            </div>
        </div>
        <!--main section ends -->

<?php include('partials/footer.php'); ?>