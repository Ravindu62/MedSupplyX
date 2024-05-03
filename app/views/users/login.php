<?php require APPROOT . '/views/inc/landing_header.php'; ?>
<div class="background2"></div>
<section class="home">
    <div class="content">
        <h2> MedSupplyX </h2>
        <h3>Welcome!</h3>
        <div class="icon">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-instagram"></i>
        </div>
    </div>
    <div class="login">
        <h2>Log In</h2>
        <form action="<?php echo URLROOT; ?>/login" method="post">
            <div class="input">
                <label for="email">Email</label>
                <input class="input1" type="email" name="email" value="">
                <span> <i class="fa-solid fa-envelope" style="color:#275BA1;"></i> </span>
            </div>
            <div class="input">

                <label for="password">Password</label>
                <input class="input1 pass" type="password" name="password" value="">
                <span> <i class="fa-solid fa-lock" style="color:#275BA1;"> </i> </span>
                <?php if (isset($data['errors']['err']) || isset($data['errors']['err'])) : ?>
                    <span>
                        <p class="errmsg"> <?php echo $data['errors']['err']; ?> </p>
                    </span>
                <?php endif; ?>
            </div>
            <div class="middlespace"></div>
            <div calss="middlespace"></div>
            <div class="middlespace"></div>
            
            <div class="button">
                <a href="#"> <input type="submit" value="Sign In" name="submit" class="userbtn2"> </a>
            </div>
        </form>
        <br>
        <div>
           <a href="<?php echo URLROOT ?>/users/forgotpassword" class="nodec"> <label for="remember_me"> Forgot Password ? </label> </a>
        </div>
    
        <div class="sign-up">
            <pre>Don't have an account?  <a href="<?php echo URLROOT ?>/users/register">Sign up</a></pre>
        </div>
    </div>
</section>
<?php require APPROOT . '/views/inc/landing_footer.php'; ?>
</form>
</div>