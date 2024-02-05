<?php require APPROOT . '/views/inc/landing_header.php'; ?>
        <div class="background2"></div>
        <section class="home">
            <div class="content">
                
                <h2>Welcome!</h2>
                <h3> Pharmacy Cashier</h3>

                <div class="icon">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-instagram"></i>
                </div>
                <div class="buttons"> 
                <a href="<?php echo URLROOT . '/users/login';?>" class="link"> <button class="userbtn"> Pharmacy </button> </a>
                <a href="<?php echo URLROOT . '/users/managerlogin';?>" class="link"><button class="userbtn"> Supplier </button> </a>
                <a href="<?php echo URLROOT . '/users/cashierlogin';?>" class="link"> <button class="userbtn"> Cashier </button> </a>
                <a href="<?php echo URLROOT . '/users/adminlogin';?>" class="link"> <button class="userbtn"> Admin </button> </a>
  
            </div>
            </div>
            
            <div class="login">
                <h2>Log In</h2>
                <form action="<?php echo URLROOT; ?>/users/adminlogin" method="post">
        <div class="input">
                <input class="input1" type="email" name="email" <?php echo (!empty($data
            ['name_err'])) ? 'is-invalid' : ''; ?> value="<?php echo $data['email']; ?>">
            <span> <?php echo $data['email_err']; ?> </span>
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="input">
                <input class="input1" type="password" name="password" <?php echo (!empty($data
            ['name_err'])) ? 'is-invalid' : ''; ?> value="<?php echo $data['password']; ?>">
            <span> <?php echo $data['password_err']; ?> </span>
                    <i class="fa-solid fa-lock"></i>
                </div>   

                <div class="check">
                    <label><input type="checkbox" name="remember" value="">Remember me</label>
                    <a href="#"> Forgot Password?</a>
                </div>
                <div class="button">
                  <a href="#"> <input type="submit" value="Sign In" name="submit"> </a>  
                </div>
                </form>
                

            </div>
        </section>
<?php require APPROOT . '/views/inc/landing_footer.php'; ?>
    </form>
</div>

