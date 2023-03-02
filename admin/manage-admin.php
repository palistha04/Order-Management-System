<?php include('partials/menu.php'); ?>
        

        <!--main section starts -->
        <div class="main-content">
        <div class="wrapper">
            <h1>Manage Admin</h1>
          

            <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add']; //displaying session msg
                unset($_SESSION['add']); //removing session msg
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if(isset($_SESSION['user-not-found']))
            {
                echo $_SESSION['user-not-found'];
                unset($_SESSION['user-not-found']);
            }

            if(isset($_SESSION['pwd-not-match']))
            {
                echo $_SESSION['pwd-not-match'];
                unset($_SESSION['pwd-not-match']);
            }

            if(isset($_SESSION['change-pwd']))
            {
                echo $_SESSION['change-pwd'];
                unset($_SESSION['change-pwd']);
            }
            ?>
<br>


              <!--main section starts -->
            <a href="add-admin.php" class="btn-primary">Add admin</a>
            <br>
            <br>
            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>


                <?php
                //qry to get all admin
                $sql="SELECT * FROM t_admin";
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
                           $full_name=$rows['full_name'];
                           $username=$rows['username'];

                           //display the values in our table
                           ?>
                            
                            <tr>
                                <td><?php echo $sn++;?></td>
                                <td><?php echo $full_name; ?></td>
                                <td><?php echo $username; ?></td>
                                <td>
                                <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id ?>" class="btn-primary">Change Password</a>
                                <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?> " class="btn-secondary">Update Admin</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
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