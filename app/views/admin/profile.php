<!DOCTYPE html>
<html lang="en">

<head>
    <title> Your Profile </title>
    <meta charset="utf-8">
    <link rel="icon" href="<?php echo URLROOT ?>/public/img/logo3.png" type="image/gif" sizes="20x16">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>

<body>

    <?php require APPROOT . '/views/inc/header.php'; ?>
    <?php require APPROOT . '/views/inc/admin_sidebar.php'; ?>

    <div class="content">
        <div class="anim">
            <h2> Profile </h2>
        </div>
        <div class="anim">
            <div class="profilebox">
                <div class="profilecard">
                    <div class="card-body">
                        <table>
                            <tr>
                                <td>
                                    <p class="profdetails"> Administrator Name </p>
                                </td>
                                <td>:</td>
                                <td> <?php echo isset($data['profile']) ? $data['profile']->name : ''; ?> </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="profdetails"> Administrator Address</p>
                                </td>
                                <td>:</td>
                                <td><?php echo isset($data['profile']) ? $data['profile']->address : ''; ?></td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="profdetails"> Contact No
                                </td>
                                <td>:</td>
                                <td colspan="3"><?php echo isset($data['profile']) ? $data['profile']->phone : ''; ?>
                                </td>
                                <td><a href="#popup1"> <button class="addBtn"> Change </button></a> </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="profdetails">Email
                                </td>
                                <td>:</td>
                                <td colspan="3"><?php echo isset($data['profile']) ? $data['profile']->email : ''; ?>
                                </td>
                                <td> <a href="#popup2"><button class="addBtn"> Change </button></a> </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="profdetails">Password</p>
                                </td>
                                <td>:</td>
                                <td colspan="3"> <b>
                                        <p id="passwordDisplay">
                                            <?php echo isset($data['profile']) ? str_repeat("*", strlen($data['profile']->password)) : ''; ?>
                                        </p>
                                    </b>

                                </td>
                                <td> <a href="#popup3"><button class="addBtn"> Change </button></a> </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Popup for changing contact number -->
            <div id="popup1" class="overlay">
                <div class="popup-profile-change">
                    <!-- Form for changing contact -->
                    <form action="<?php echo URLROOT; ?>/admins/changeContactNumber" method="POST" class="form-container" id="changeContactForm">
                        <h2>Set Your Contact Number</h2>
                        <table>
                            <tr>
                                <td>
                                    <p class="editprofile-maintag"> Current Number </p>
                                </td>
                                <td> : </td>
                                <td><input class="editprofile-input" type="text" name="currentContactNumber" readonly value="<?php echo $data['profile']->phone; ?>"></td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="editprofile-maintag"> New Number </p>
                                </td>
                                <td> : </td>
                                <td><input class="editprofile-input" type="text" placeholder="Enter New Contact Number" name="newContactNumber">
                                    <div id="popup1-message" class="importantMessage"></div>
                                </td>
                            </tr>
                        </table>
                        <div class="editprofile-btnsetup">
                            <a href="<?php echo URLROOT; ?>/admins/changeContactNumber"><button type="submit" class="editprofile-updatebutton "> Update Contact </button></a>
                            <a href="<?php echo URLROOT; ?>/admins/profile"><button type="button" class="editprofile-button-red"> Close </button></a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Popup for changing email -->
            <div id="popup2" class="overlay">
                <div class="popup-profile-change">
                    <!-- Form for changing email -->
                    <form action="<?php echo URLROOT; ?>/admins/changeEmail" method="POST" class="form-container" id="changeEmailForm">
                        <h2>Set Your Email Address</h2>
                        <table>
                            <tr>
                                <td>
                                    <p class="editprofile-maintag"> Current Email </p>
                                </td>
                                <td> : </td>
                                <td><input class="editprofile-input" type="text" name="currentEmail" readonly value="<?php echo $data['profile']->email; ?>"></td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="editprofile-maintag"> New Email </p>
                                </td>
                                <td> : </td>
                                <td><input class="editprofile-input" type="text" placeholder="Enter New Email" name="newEmail">
                                    <div id="popup2-message" class="importantMessage"></div>
                                </td>
                            </tr>
                        </table>
                        <div class="editprofile-btnsetup">
                            <a href="<?php echo URLROOT; ?>/admins/changeEmail"><button type="submit" class="editprofile-updatebutton "> Update Email </button></a>
                            <a href="<?php echo URLROOT; ?>/admins/profile"><button type="button" class="editprofile-button-red"> Close </button></a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Popup for changing password -->
            <div id="popup3" class="overlay">
                <div class="popup-profile-change">
                    <!-- Form for changing password -->
                    <form action="<?php echo URLROOT; ?>/admins/changePassword" method="POST" class="form-container" id="changePasswordForm">
                        <h2>Set Your Password</h2>
                        <table>
                            <tr>
                                <td>
                                    <p class="editprofile-maintag"> Current Password </p>
                                </td>
                                <td> : </td>
                                <td><input class="editprofile-input" type="text" name="currentPassword" readonly value="<?php echo $data['profile']->password; ?>"></td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="editprofile-maintag"> New Password </p>
                                </td>
                                <td> : </td>
                                <td><input class="editprofile-input" type="password" placeholder="Enter Your New Password" name="newPassword">
                                    <div id="popup3-message" class="importantMessage"></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="editprofile-maintag"> Confirm Password </p>
                                </td>
                                <td> : </td>
                                <td><input class="editprofile-input" type="password" placeholder="Confirm Your New Password" name="confirmPassword">
                                    <div id="popup4-message" class="importantMessage"></div>
                                </td>
                            </tr>
                        </table>
                        <div class="editprofile-btnsetup">
                            <a href="<?php echo URLROOT; ?>/admins/changePassword"><button type="submit" class="editprofile-updatebutton"> Update Password </button></a>
                            <a href="<?php echo URLROOT; ?>/admins/profile"><button type="button" class="editprofile-button-red"> Close </button></a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- JavaScript for handling form submissions -->
            <script>
                // Add event listeners for form submissions
                document.getElementById("changeContactForm").addEventListener("submit", function(event) {
                    // Prevent the default form submission
                    event.preventDefault();

                    // Fetch the form data and process it
                    fetch(this.action, {
                            method: 'POST',
                            body: new FormData(this)
                        })
                        .then(response => {
                            if (response.ok) {
                                // If response is successful, close the popup
                                closePopup('popup1');
                                // Redirect to /admins/profile
                                window.location.href = "<?php echo URLROOT; ?>/admins/profile";
                            } else {
                                // If there's an error response, open the popup and display the error message
                                response.text().then(errorMessage => {
                                    document.getElementById('popup1-message').innerText = errorMessage;
                                    openPopup('popup1', errorMessage);
                                });
                            }
                        })
                        .catch(error => {
                            // Handle any errors
                            console.error('Error:', error);
                        });
                });

                // Add event listeners for form submissions
                document.getElementById("changeEmailForm").addEventListener("submit", function(event) {
                    // Prevent the default form submission
                    event.preventDefault();

                    // Fetch the form data and process it
                    fetch(this.action, {
                            method: 'POST',
                            body: new FormData(this)
                        })
                        .then(response => {
                            if (response.ok) {
                                // If response is successful, close the popup
                                closePopup('popup2');
                                // Redirect to /admins/profile
                                window.location.href = "<?php echo URLROOT; ?>/admins/profile";
                            } else {
                                // If there's an error response, open the popup and display the error message
                                response.text().then(errorMessage => {
                                    document.getElementById('popup2-message').innerText = errorMessage;
                                    openPopup('popup2', errorMessage);
                                });
                            }
                        })
                        .catch(error => {
                            // Handle any errors
                            console.error('Error:', error);
                        });
                });

                // Add event listeners for form submissions
                document.getElementById("changePasswordForm").addEventListener("submit", function(event) {
                    // Prevent the default form submission
                    event.preventDefault();

                    // Fetch the form data and process it
                    fetch(this.action, {
                            method: 'POST',
                            body: new FormData(this)
                        })
                        .then(response => {
                            if (response.ok) {
                                // If response is successful, close the popup
                                closePopup('popup3');
                                // Redirect to /admins/profile
                                window.location.href = "<?php echo URLROOT; ?>/admins/profile";
                            } else {
                                // If there's an error response, open the popup and display the error message
                                response.text().then(errorMessage => {
                                    document.getElementById('popup3-message').innerText = errorMessage;
                                    openPopup('popup3', errorMessage);
                                });
                            }
                        })
                        .catch(error => {
                            // Handle any errors
                            console.error('Error:', error);
                        });
                });

                // Add event listeners for form submissions
                document.getElementById("changePasswordForm").addEventListener("submit", function(event) {
                    // Prevent the default form submission
                    event.preventDefault();

                    // Fetch the form data and process it
                    fetch(this.action, {
                            method: 'POST',
                            body: new FormData(this)
                        })
                        .then(response => {
                            if (response.ok) {
                                // If response is successful, close the popup
                                closePopup('popup3');
                                // Redirect to /admins/profile
                                window.location.href = "<?php echo URLROOT; ?>/admins/profile";
                            } else {
                                // If there's an error response, open the popup and display the error message
                                response.text().then(errorMessage => {
                                    document.getElementById('popup4-message').innerText = errorMessage;
                                    openPopup('popup3', errorMessage);
                                });
                            }
                        })
                        .catch(error => {
                            // Handle any errors
                            console.error('Error:', error);
                        });
                });

                // Define openPopup and closePopup functions
                function openPopup(popupId, message) {
                    // Display the popup
                    document.getElementById(popupId).style.display = "block";
                    // Display the message in the popup
                    document.getElementById(popupId + "-message").innerText = message;
                }

                function closePopup(popupId) {
                    // Hide the popup
                    document.getElementById(popupId).style.display = "none";
                }
            </script>
        </div>
    </div>
    </div>

    <?php require APPROOT . '/views/inc/footer.php'; ?>

</body>

</html>