<body>
    <?php require APPROOT . '/views/inc/landing_header.php'; ?>
    <div class="background"></div>
    <div class="register">
        <div class="reg-container">
            <div class="reg-img">
                <img src="<?php echo URLROOT ?>/public/img/img.jpg" alt="">
            </div>
            <div class="reg-form">
                <h1> Registration </h1>
                <form action="<?php echo URLROOT; ?>/users/pharmacy" method="POST">
                    <div class="input">
                        <label for="name">Pharmacy Name :</label>
                        <br>
                        <input type="text" name="name" id="pharmacyname" class="gen-input reg-input" <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?> value="<?php echo $data['name']; ?>">
                        <div><span class="importantMessage"> <?php echo $data['name_err']; ?> </span> </div>
                    </div>
                    <div class="input">
                        <label for="address">Address :</label>
                        <br>
                        <input type="text" name="address" id="address" class="gen-input reg-input" <?php echo (!empty($data['address_err'])) ? 'is-invalid' : ''; ?> value="<?php echo $data['address']; ?>">
                        <div><span class="importantMessage"> <?php echo $data['address_err']; ?> </span> </div>
                    </div>
                    <div class="input">
                        <label for="#phone"> Phone Number : </label>
                        <br>
                        <input type="text" name="phone" id="phone" class="gen-input reg-input" pattern="[0-9]{10}" <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : ''; ?> value="<?php echo $data['phone']; ?>">
                        <div><span class="importantMessage"> <?php echo $data['phone_err']; ?> </span> </div>
                    </div>
                    <div class="input">
                        <label for="#licenceno"> Licence Number : </label>
                        <br>
                        <input type="text" name="licenceno" id="licenceno" class="gen-input reg-input" <?php echo (!empty($data['licenceno_err'])) ? 'is-invalid' : ''; ?> value="<?php echo $data['licenceno']; ?>">
                        <div><span class="importantMessage"> <?php echo $data['licenceno_err']; ?> </span> </div>
                    </div>

                    <div class="input">
                        <label for="#email">Email :</label>
                        <br>
                        <input type="email" name="email" id="email" class="gen-input reg-input" <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?> value="<?php echo $data['email']; ?>">
                        <div><span class="importantMessage"> <?php echo $data['email_err']; ?> </span> </div>
                    </div>

                    <div class="input">
                        <label for="#passord">Password :</label>
                        <br>
                        <input type="password" name="password" id="password" class="gen-input reg-input" <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?> value="<?php echo $data['password']; ?>">
                        <div><span class="importantMessage"> <?php echo $data['password_err']; ?> </span> </div>
                        <input type="checkbox" id="showPassword1" class="check-box-password"> Show Password
                    </div>

                    <div class="input">
    <label for="#con-password">Confirm Password :</label>
    <br>
    <input type="password" name="confirm_password" id="con-password" class="gen-input reg-input" <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?> value="<?php echo $data['confirm_password']; ?>">
    <div><span class="importantMessage"> <?php echo $data['confirm_password_err']; ?> </span> </div>
    <input type="checkbox" id="showPassword2" class="check-box-password"> Show Password
</div>




                    <div class="captcha">
                        <div class="g-recaptcha" data-sitekey="6LdhetUoAAAAAI3IGcx_nVJZVzLUMu-3clUfSxf8" data-callback="callback">
                        </div>
                    </div>
                    <div class="reg-btn">
                        <input type="submit" name="submit" value="Register" id="registerbtn" disabled />
                    </div>
                </form>

                <script type="text/javascript">
                    function callback() {
                        const submitButton = document.getElementById("registerbtn");
                        submitButton.removeAttribute("disabled");
                    }


                    const passwordInput = document.getElementById("password");
                    const confirmPasswordInput = document.getElementById("con-password");
                    const showPasswordCheckbox1 = document.getElementById("showPassword1");
                    const showPasswordCheckbox2 = document.getElementById("showPassword2");
                   


                    showPasswordCheckbox1.addEventListener("change", function() {
                        if (showPasswordCheckbox1.checked) {
                            passwordInput.type = "text";
                        } else {
                            passwordInput.type = "password";
                        }
                    });

                    showPasswordCheckbox2.addEventListener("change", function() {
                        if (showPasswordCheckbox2.checked) {
                            confirmPasswordInput.type = "text";
                        } else {
                            confirmPasswordInput.type = "password";
                        }
                    });
                </script>

            </div>
        </div>
    </div>
    <?php require APPROOT . '/views/inc/landing_footer.php'; ?>