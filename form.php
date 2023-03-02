<?php include('partials-front/menu.php'); ?>
<!-- form section-->
<section class="form clearfix ">
    <div class="container">
    <form action="insert.php" method="POST">
    <?php 
            if(isset($_SESSION['form-submit'])){
                echo $_SESSION['form-submit']; //displaying session msg
                unset($_SESSION['form-submit']); //removing session msg
            }
            ?>

        
        <h2 class="text">Contact Form</h2>
            <div> 
                <table class="tbl-full">
                    <tr>
                        <td>Name:</td>
                        <td>
                            <input type = "text" name="Name" placeholder ="Your Name" required>
                           </td>
                       </tr>
                        
                    <tr>
                 <td> Company Name:</td>
                 <td>
                     <input type = "text" name="Company_name" placeholder ="Company Name" required>
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>
                        <input type = "email" name="Email" placeholder ="Email address" required>
                       </td>
                   </tr>

                   <tr>
                    <td>Address:</td>
                    <td>
                        <input type = "text" name="Address" placeholder ="address" required>
                       </td>
                   </tr>

                   <tr>
                    <td>Phone no.:</td>
                    <td>
                        <input type = "number" name="Phone_number" placeholder ="phone number" required>
                       </td>
                   </tr>
                
                   <tr>
                    <td>Message:</td>
                    <td>
                        <textarea name="Message" rows="5" cols="70" placeholder ="place your order here" ></textarea>
                       </td>
                   </tr>
             
                   <tr>
                    <td colspan="2">
                        
                        <input type="submit" name="submit" value="submit" class="btn-primary">
                    </td>
                </tr>
            

        </table>
        
        <div class="clearfix"></div>
    </div>
</section>  


    </form>


   

    <?php include('partials-front/footer.php'); ?>