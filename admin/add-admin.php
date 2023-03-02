<?php include('partials/menu.php');?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br>

        <?php 
            if(isset($_SESSION['add'])){
                echo $_SESSION['add']; //displaying session msg
                unset($_SESSION['add']); //removing session msg
            }
            ?>
            
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>FullName: </td>
                    <td><input type="text" name="full_name" placeholder="Enter your name"></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Your password" ></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php');?>

<?php
 //process the value from form and save it to database

 //check whether the submit button is clicked or not

 if(isset($_POST['submit'])){
     //button clicked
    //button not clicked

    //get data from the form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //pw encryption with md5

    //sql to save data into data base
    $sql = "INSERT INTO t_admin SET
    full_name='$full_name',
    username='$username',
    password='$password'";

    //execute qry and save data in database
    $res = mysqli_query($conn, $sql) or die(mysqli_error());
 
//check whether the (query is executed ) data is inserted or not and display appropriate msg
if($res=TRUE){
    echo"data inserted";
    //create session variable to display message
     $_SESSION['add'] ="<div class='success'>admin added successfully.</div>"; 
     header("location:". SITEURL.'admin/manage-admin.php'); 

}
else{
    $_SESSION['add'] ="<div class='error'>admin added successfully.</div>"; 
    header("location:". SITEURL.'admin/add-admin.php'); 
 
}


}


?>