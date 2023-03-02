<?php include('config/constant.php'); ?>
<?php 
            if(isset($_SESSION['form-submit'])){
                echo $_SESSION['form-submit']; //displaying session msg
                unset($_SESSION['form-submit']); //removing session msg
            }
            ?>
<?php

if(isset($_POST['submit'])){
    if(!empty($_POST['Name']) && !empty($_POST['Company_name']) && !empty($_POST['Email']) && !empty($_POST['Address']) && !empty($_POST['Phone_number']) && !empty($_POST['Message'])){
        $Name= $_POST['Name'];
        $Company_name= $_POST['Company_name'];
        $Email= $_POST['Email'];
        $Address= $_POST['Address'];
        $Phone_number= $_POST['Phone_number'];
        $Message= $_POST['Message'];

        $sql= "INSERT INTO t_order SET
        Name='$Name',
        Email='$Email',
        Address='$Address',
        Phone_number='$Phone_number',
        Message='$Message' ";


        $res = mysqli_query($conn, $sql) or die(mysqli_error());
 
        //check whether the (query is executed ) data is inserted or not and display appropriate msg
        if($res=TRUE){
            $_SESSION['form-submit'] ="<div class='success'>Submitted Successfully.</div>"; 
            header("location:". SITEURL.'form.php'); 
       
       }
       else{
           $_SESSION['form-submit'] ="<div class='error'>Failed to sumbit.</div>"; 
           header("location:". SITEURL.'form.php'); 
        
       }

    }
    else{
        echo('all fields required');
    }


}

?>
