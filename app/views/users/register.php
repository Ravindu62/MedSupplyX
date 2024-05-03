    <body>
        <?php require APPROOT . '/views/inc/landing_header.php'; ?>
        <div class="background2">
            <div class="main-container">
                <div class="cards">
                    <img src="<?php echo URLROOT ?>/public/img/pharmacy1.webp" alt="">
                    <div class="indetail">
                        <h2>Pharmacy</h2>
                        <p> You can manage medicine inventory and put medicine orders through MedsupplyX </p>
                        <a href="<?php echo URLROOT ?>/users/pharmacy" class="btn">Register</a>
                    </div>
                </div>
                <div class="cards">
                    <img src="<?php echo URLROOT ?>/public/img/supplier.jpg" alt="">
                    <div class="indetail">
                        <h2>Supplier</h2>
                        <p> You can manage medicine inventory and increase your income through MedsupplyX</p>
                        <a href="<?php echo URLROOT ?>/users/supplier" class="btn">Register</a>
                    </div>
                </div>
            </div>
        </div>
        <?php require APPROOT . '/views/inc/landing_footer.php'; ?>
    </body>
</html>
