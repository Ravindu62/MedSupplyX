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
                <input class="input1" type="email" name="email" value="">
                <span></span>
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="input">
                <input class="input1 pass" type="password" name="password" value="">
                <span></span>

                <?php if (isset($data['errors']['err']) || isset($data['errors']['err'])) : ?>

                    <span>
                        <p class="errmsg"> <?php echo $data['errors']['err']; ?> </p>
                    </span>

                <?php endif; ?>
                <i class="fa-solid fa-lock"></i>
            </div>
            <div class="button">
                <a href="#"> <input type="submit" value="Sign In" name="submit" class="userbtn2"> </a>
            </div>
        </form>
        <br>
        <div>
            <input class="input2" type="checkbox" name="remember_me" id="remember_me">
            <label for="remember_me">Remember me</label>
        </div>
        <!-- <form action="<?php echo URLROOT; ?>/users/forgotPassword" method="post">

        <!-- <form action="<?php echo URLROOT; ?>/users/forgotPassword" method="post">
            <div class="input">
                <input class="input1" type="email" name="email" value="">
                <span></span>
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="button">
                <input type="submit" value="Reset Password" name="submit" class="userbtn2">
            </div>
        </form> -->
        <div class="sign-up">
            <pre>Don't have an account?  <a href="<?php echo URLROOT ?>/users/register">Sign up</a></pre>
        </div>

    </div>
</section>
<?php require APPROOT . '/views/inc/landing_footer.php'; ?>
</form>
</div>