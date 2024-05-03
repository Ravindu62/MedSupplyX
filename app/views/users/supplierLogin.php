<?php require APPROOT . '/views/inc/landing_header.php'; ?>
        <div class="background2"></div>
        <section class="home">
            <div class="content">
                <a href="#" class="logo">MedSuppyX</a>
                <h2>Welcome!</h2>
                <h3>To Our Web Platform</h3>
                <pre>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</pre>
                <div class="icon">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-instagram"></i>
                </div>
            </div>
            <div class="login">
                <h2>Log In</h2>
                <form action="<?php echo URLROOT; ?>/users/login" method="post">
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
                <div class="sign-up">
                    <pre>Don't have an account?  <a href="<?php echo URLROOT ?>/users/register">Sign up</a></pre>
                </div>
            </div>
        </section>
<?php require APPROOT . '/views/inc/landing_footer.php'; ?>
    </form>
</div>
