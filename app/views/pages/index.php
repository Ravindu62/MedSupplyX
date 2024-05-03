<?php require APPROOT . '/views/inc/landing_header.php'; ?>
        <div class="background"> 
            <div class="content">
                <div class="header-text">
                <div class="anim">  <h2>Welcome to,</h2> </div>
                    <h1>
                    <div class="anim">  <span>MedSupplyX</span> </div>
                    </h1>
                    <div class="anim">  
                    <p>
                    Where progress meets purpose, and healthcare is empowered through technology.
                    </p>
                    </div>
                    <div class="middlespace"> </div>
                    <div class="anim2">  
                        <a href="<?php echo URLROOT ?>/users/register" class="getstarted"> 
                        <button>Register</button> 
                    </a>
                </div>
                </div>
            </div>
            <div class="space"> </div>
        </div>
        <!--------------------About------------------>
        <div id="about">
            <div class="container">
                <div class="row">
                    <div class="about-col-one">
                     <img src="<?php echo URLROOT ?>/public/img/about-im.png" alt="logo" class="pic">
                    </div>
                    <div class="about-col-two">
                        <h1 class="sub-title">About Us</h1>
                        <br>
                        <p class="about"> At MedSupplyX , we are dedicated to revolutionizing the way pharmacies and suppliers manage 
                            their inventory and streamline order processing. With a passion for innovation, our team combines expertise
                             in healthcare and technology to provide cutting-edge solutions that enhance efficiency and accuracy. 
                             We understand the unique challenges faced by the pharmaceutical industry and have developed a comprehensive
                             platform that simplifies inventory control, automates ordering processes, and ensures the seamless flow of medical 
                             supplies. Our commitment to excellence drives us to continuously improve and adapt our system to meet the evolving
                              needs of our valued clients.</p>
                        <br>
                        <ul>
                            <li>
                                <i class="fa-solid fa-syringe"></i>
                                Streamline inventory control processes.
                            </li>
                            <li>
                                <i class="fa-solid fa-syringe"></i>
                                Enhance supply chain efficiency.
                            <li>
                                <i class="fa-solid fa-syringe"></i>
                                Improve order accuracy and speed.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!------------------Services------------------->
        <div id="services">
            <div class="container">
                <h1 class="sub-title">Our Services</h1>
                <div class="services-list">
                    <div class="service-card">
                        <i class="fa-solid fa-arrow-down-short-wide"></i>
                        <h2>Medicine Ordering</h2>
                        <p>
                        Simplify and expedite pharmaceutical procurement with our user-friendly platform. Streamline your medicine ordering process for increased efficiency.                        </p>
                        <a href="#">Learn More</a>
                    </div>
                    <div class="service-card">
                        <<i class="fa-solid fa-truck-droplet"></i>
                        <h2>Medicine Supply</h2>
                        <p>
                        Ensure uninterrupted medical supplies. We're your trusted partner in maintaining consistent and reliable medicine distribution.                        </p>
                        <a href="#">Learn More</a>
                    </div>
                    <div class="service-card">
                        <i class="fa-solid fa-file-medical"></i>
                        <h2>Procument Hadling</h2>
                        <p>
                        Expertly manage the intricacies of procurement. Our system empowers efficient handling of pharmaceutical procurement, minimizing errors and delays.
</p>
                        <a href="#">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        <!------------------Advertisement------------------->
        <div id="advertisement">
            <div class="container">
                <h1 class="sub-title">Our Partners</h1>
                <div class="ad-list">
                    <div class="ad">
                        <img src="<?php echo URLROOT ?>/public/img/1.jpg">
                        <div class="layer">
                            <h3>Isuru Pharmacy Pvt(Ltd)</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt explicabo dolore exercitationem labore quia rem ratione illum esse neque.</p>
                            <a href="#">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ad">
                        <img src="<?php echo URLROOT ?>/public/img/2.jpg">
                        <div class="layer">
                            <h3>Jayarathna Suppliers Pvt(Ltd)</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt explicabo dolore exercitationem labore quia rem ratione illum esse neque.</p>
                            <a href="#">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ad">
                        <img src="<?php echo URLROOT ?>/public/img/3.jpg">
                        <div class="layer">
                            <h3>Central Pharmacy Pvt(Ltd)</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt explicabo dolore exercitationem labore quia rem ratione illum esse neque.</p>
                            <a href="#">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <a href="#" class="btn">See More</a>
            </div>
        </div>
        <!-----------------Contact------------------>
        <div id="contact">
            <div class="container">
                <div class="row">
                    <div class="contact-left">
                        <h1 class="sub-title">Contact Us</h1>
                        <p>
                            <i class="fa-solid fa-envelope"></i>
                            medsupplyx23@gmail.com
                        </p>
                        <p>
                            <i class="fa-solid fa-phone"></i>
                            +(94)77 123 4567
                        </p>
                        <p>
                            <i class="fa-solid fa-location-dot"></i>
                            123, Main Street, Colombo 07
                        </p>
                        <div class="social-icons">
                            <a href="http://facebook.com/">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href="http://instargram.com/">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="http://linkdin.com/">
                                <i class="fa-brands fa-linkedin"></i>
                            </a>
                            <a href="http://github.com/">
                                <i class="fa-brands fa-github"></i>
                            </a>
                            <a href="http://twitter.com/">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                    <div class="contact-right">
                        <form name="submit-to-google-sheet">
                            <label for="Name">Name : </label>
                            <input
                                type="text"
                                name="Name"
                                placeholder="Your Name"
                                class="gen-input"
                                required
                            >
                            <label for="Email">Email : </label>
                            <input
                                type="email"
                                name="Email"
                                placeholder="Your Email"
                                class="gen-input"
                                required
                            >
                            <label for="Message">Message : </label>
                            <textarea name="Message" rows="6" placeholder="Your Message"></textarea>
                            <button type="submit" class="btn">Submit</button>
                            <span class="msg"></span>
                        </form>
                        <span id="msg"></span>
                    </div>
                </div>
            </div >
        </div>
        </div>
            <!-----------------Footer------------------>
            <footer>
                <div class="footer-line"></div>
                <div class="footer-wrapper">
                    <section class="footer-top">
                        <div class="footer-headline">
                            <h2>Get in touch with Us...</h2>
                        </div>
                    </section>
                    <div class="footer-colums">
                        <section class="footer-logo">
                            <img src="<?php echo URLROOT ?>/public/img/logo3.png" class="logo1">
                        </section>
                        <section class="q-links">
                            <h3>Quick Links</h3>
                            <ul>
                                <li>
                                    <a href="#header">Home</a>
                                </li>
                                <li>
                                    <a href="#about">About</a>
                                </li>
                                <li>
                                    <a href="#services">Services</a>
                                </li>
                                <li>
                                    <a href="#advertisement">Partners</a>
                                </li>
                                <li>
                                    <a href="#contact">Contact</a>
                                </li>
                            </ul>
                        </section>
                        <section class="resource-legal">
                            <h3>Resources</h3>
                            <ul>
                                <li>
                                    <a href="#">Help Center</a>
                                </li>
                                <li>
                                    <a href="#">FAQ</a>
                                </li>
                                <li>
                                    <a href="#">Support</a>
                                </li>
                                <li>
                                    <a href="#">Sitemap</a>
                                </li>
                            </ul>
                        </section>
                        <section class="resource-legal">
                            <h3>Legal</h3>
                            <ul>
                                <li>
                                    <a href="#">Term</a>
                                </li>
                                <li>
                                    <a href="#">Privacy</a>
                                </li>
                                <li>
                                    <a href="#">License</a>
                                </li>
                                <li>
                                    <a href="#">Contact</a>
                                </li>
                            </ul>
                        </section>
                    </div>


                    <script>
            const scriptURL = 'https://script.google.com/macros/s/AKfycbyhbig_MmbsxRxbmkTFMg-_dh6x3lu4AFLjt9MGEQTBK5IjqUUqUeZbo-DnvfZc8OvO/exec'
            const form = document.forms['submit-to-google-sheet']
            const msg = document.querySelector('.msg')

            form.addEventListener('submit', e => {
                e.preventDefault()
                fetch(scriptURL, {
                        method: 'POST',
                        body: new FormData(form)
                    })
                    .then(response => {
                        msg.innerHTML = "Message Sent Successfully"
                        setTimeout(() => {
                            msg.innerHTML = ""
                        }, 1000)
                        form.reset()
                    })
                    .catch(error => console.error('Error!', error.message))
            })
        </script>
        
                    <?php require APPROOT . '/views/inc/landing_footer.php'; ?>