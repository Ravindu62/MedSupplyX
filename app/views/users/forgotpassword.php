<?php require APPROOT . '/views/inc/landing_header.php'; ?>
<div class="background2"></div>

<section class="home">
<div style="width:100%;margin-left:320px;">
   
    <div class="login">
        <h2>Log In</h2>
        <form action="<?php echo URLROOT; ?>/users/forgotpassword" method="post">
            <div class="input">
                <label for="email">Enter Your Email</label>
                <input class="input1" type="email" name="email" value="">
                <span> <i class="fa-solid fa-envelope" style="color:#275BA1;"></i> </span>
            </div>

            <div class="input">
            <p style="color:red;"><?php echo $data['email_err']; ?></p>
            </div>
            
     
        
            
            <div class="button">
                <input type="submit" value="Submit" name="submit" class="userbtn2"> 
            </div>

        </form>
      
    </div>
</section>
<?php require APPROOT . '/views/inc/landing_footer.php'; ?>
</form>
</div>