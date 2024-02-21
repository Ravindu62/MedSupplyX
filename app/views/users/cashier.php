
      <body>
         <?php require APPROOT . '/views/inc/landing_header.php'; ?>
        <div class="background"></div>
        <div class="register">
            <div class="reg-container">
                <div class="reg-img">
                    <img src="<?php echo URLROOT ?>/public/img/cashier.jpg" alt="">
                </div>
                <div class="reg-form">
                    <h1> Registration </h1>
                    <form action="" method="post">
                        <div class="input">
                            <label for="#companyname">Cashier Name :</label>
                            <br>
                            <input
                                type="text"
                                name="name"
                                id="companyname"
                                <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?> value="<?php echo $data['name']; ?>"
                            >
                            <div>  <span class="importantMessage"> <?php echo $data['name_err']; ?>  </span> </div>
                        </div>

                        <div class="input">
                            <label for="#companyname"> Pharmacy Lience Number :</label>
                            <br>
                            <input
                                type="text"
                                name="licence"
                                id="licence"
                                <?php echo (!empty($data['licence_err'])) ? 'is-invalid' : ''; ?> value="<?php echo $data['licence']; ?>"
                            >
                            <div>  <span class="importantMessage"> <?php echo $data['licence_err']; ?>  </span> </div>
                        </div>

                        <div class="input">
                            <label for="#phone">Phone Number :</label>
                            <br>
                            <input
                                type="text"
                                name="phone"
                                id="phone"
                                <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : ''; ?> value="<?php echo $data['phone']; ?>"
                            >
                            <div>  <span class="importantMessage"> <?php echo $data['phone_err']; ?>  </span> </div>
                        </div>
                        <div class="input">
                            <label for="#email">Email :</label>
                            <br>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?> value="<?php echo $data['email']; ?>"
                            >
                            <div>  <span class="importantMessage"> <?php echo $data['email_err']; ?>  </span> </div>
                        </div>

                            <div class="input">
                            <label for="#passord">Password :</label>
                            <br>
                            <input
                                type="password"
                                name="password"
                                id="password"
                                <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?> value="<?php echo $data['password']; ?>"
                            >
                            <div>  <span class="importantMessage"> <?php echo $data['password_err']; ?>  </span> </div>
                        </div>
                        <div class="input">
                            <label for="#con-password">Confirm Password :</label>
                            <br>
                            <input
                                type="password"
                                name="confirm_password"
                                id="confirm_password"
                                <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?> value="<?php echo $data['confirm_password']; ?>"
                            >
                            <div>  <span class="importantMessage"> <?php echo $data['confirm_password_err']; ?>  </span> </div>
                        </div>
 

                        <div class="captcha">
                        <div class="g-recaptcha" 
                             data-sitekey="6LdhetUoAAAAAI3IGcx_nVJZVzLUMu-3clUfSxf8"
                             data-callback="callback">
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
                    </script>
                </div>
            </div>
        </div>
        

        <?php require APPROOT . '/views/inc/landing_footer.php'; ?>

