<?php

    include('../config/constant.php');
    //echo "Delete Page";

    //check whether the id and image_name value is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name'])){
        //get value and delete
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //remove physical image file if available
        if($image_name !=""){
            //img is available ,remove it
            $path = "../images/Product/".$image_name;

            //remove img
            $remove = unlink($path);

            if($remove==false){
                $_SESSION['remove'] = "<div class='error'>Failed to remove product.</div>";
                header('location:'.SITEURL.'admin/manage-services.php');
                die();

            }

        }

        //delete data from database
        $sql = "DELETE FROM t_services WHERE id=$id";

        //execute
        $$res = mysqli_query($conn, $sql);

        //check whether the data is deleted or not from db
        if($res!=true){
            //set success msg
            $_SESSION['delete'] = "<div class='success'>Product deleted successfully.</div>";
            header('location:'.SITEURL.'admin/manage-services.php');

        }else{
            //set error msg
            $_SESSION['delete'] = "<div class='error'>Failed to delete Product.</div>";
            header('location:'.SITEURL.'admin/manage-services.php');
        }
        


    }else{
        //redirect to manage-services page
        header('location:'.SITEURL.'admin/manage-services.php');


    }

?>