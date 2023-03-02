<?php
    //include constant.php file here
    include('../config/constant.php');

//get the id of admin to be deleted
$id = $_GET['id'];
//create sql qry to dlet admin
$sql = "DELETE FROM t_order WHERE id=$id";

//execute qry
$res = mysqli_query($conn, $sql);

//check whether the qry executed successfully or not
if($res==TRUE){
    //qry executed successfully and admin deleted
    //create session variable to display message 
    $_SESSION['delete'] = "<div class='success'>Order Deleted Successfully. </div>";
    //redirect to manage admin pg
    header('location:' .SITEURL.'admin/manage-order.php');
}
else{
    //failed to delete admin
     //create session variable to display message 
     $_SESSION['delete'] = "<div class='error'>Failed to Delete Order.</div>";
     //redirect to manage admin pg
     header('location:' .SITEURL.'admin/manage-order.php');
}

//redirect to manage admin pg with msg(success/error)
?>