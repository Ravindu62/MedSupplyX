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
                        <div class="anim"> 
                            <td> <p  class="profdetails"> Administrator Name </p> </td> 
                            <td>:</td>
                            <td>  <?php echo isset($data['profile']) ? $data['profile']->name : ''; ?> </td>           
                        </tr>
                      
                        <tr>
                            <td> <p  class="profdetails">  Administrator Address</p> </td>
                            <td>:</td>
                            <td><?php echo isset($data['profile']) ? $data['profile']->address : ''; ?></td>
                        </tr>
                        <tr>
                            <td> <p  class="profdetails"> Contact No </td>
                            <td>:</td>
                            <td colspan="3"><?php echo isset($data['profile']) ? $data['profile']->phone : ''; ?></td>
                            <td><a href="#popup1"> <button class="addBtn"> Change </button></a> </td>
                        </tr>
                        <tr>
                            <td> <p  class="profdetails">Email</td>
                            <td>:</td>
                            <td colspan="3"><?php echo isset($data['profile']) ? $data['profile']->email : ''; ?></td>
                            <td> <a href="#popup2"><button class="addBtn"> Change </button></a> </td>
                        </tr>
                        <tr>
                            <td><p class="profdetails">Password</p></td>
                            <td>:</td>
                            <td colspan="3"> <b>
                                        <p id="passwordDisplay"><?php echo isset($data['profile']) ? str_repeat("*", strlen($data['profile']->password)) : ''; ?> </p>
                                    </b>
                                    
                                </td>
                                <td> <a href="#popup3"><button class="addBtn"> Change </button></a> </td>
                        </tr>
                </table>
            </div>
        </div>
</div>

<div id="popup1" class="overlay">
                <div class="popup-profile-change">
                    <form action="<?php echo URLROOT; ?>/admins/changeContactNumber" method="POST" class="form-container">
                        <h2>Set Your Contact Number</h2>
                        <table>
                            <tr>
                                <td >
                                    <p class="editprofile-maintag"> Current Number </p>
                                </td>
                                <td> : </td>
                                <td><input class="editprofile-input" type="text" name="currentContactNumber" readonly value="<?php echo $data['profile']->phone; ?>"></td>
                            </tr>

                            <tr>
                                <td >
                                    <p class="editprofile-maintag"> New Number </p>
                                </td>
                                <td> : </td>
                                <td>
                                    <div class="inputForm <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : '' ; ?>">
                                    <i class='bx bx-envelope' ></i>
                                    <input type="text" class="editprofile-input" placeholder="Enter New Contact"  name="newContactNumber">
                                    </div>
                                    <span class="invalid-feedback"><?php echo $data['phone_err']; ?></span>
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

<div id="popup2" class="overlay" >
                <div class="popup-profile-change">
                    <form action="<?php echo URLROOT; ?>/admins/changeEmail" method="POST" class="form-container" id="changePasswordForm">
                        <h2>Set Your Email Address</h2>
                        <table>
                            <tr>
                                <td >
                                    <p class="editprofile-maintag"> Current Email </p>
                                </td>
                                <td> : </td>
                                <td><input class="editprofile-input" type="text" name="currentEmail" readonly value="<?php echo $data['profile']->email; ?>"></td>
                            </tr>
                            
                            <tr>
                            <td >
                                <p class="editprofile-maintag"> New Email </p>
                                </td>
                                <td> : </td>
                                <td>
                                <div class="inputForm <?php echo (!empty($data['email_err'])) ? 'is-invalid' : '' ; ?>">
                                <i class='bx bx-envelope' ></i>
                                <input type="text" class="editprofile-input" placeholder="Enter email Address"  name="newEmail">
                                </div>
                                <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
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


    <div id="popup3" class="overlay">
            <div class="popup-profile-change">
            <form action="<?php echo URLROOT; ?>/admins/changePassword" method="POST" class="form-container" >
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
                            <td>
                                <div class="inputForm <?php echo (!empty($data['newPassword_err'])) ? 'is-invalid' : '' ; ?>">
                                <i class='bx bx-envelope' ></i>
                                <input type="text" class="editprofile-input" placeholder="Enter new  password"  name="newPassword">
                                </div>
                                <span class="invalid-feedback"><?php echo $data['newPassword_err']; ?></span>
                                </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="editprofile-maintag"> Confirm Password </p>
                            </td>
                            <td> : </td>
                            <td>
                                <div class="inputForm <?php echo (!empty($data['confirmPassword_err'])) ? 'is-invalid' : '' ; ?>">
                                <i class='bx bx-envelope' ></i>
                                <input type="text" class="editprofile-input" placeholder=" Re enter the  password"  name="confirmPassword">
                                </div>
                                <span class="invalid-feedback"><?php echo $data['confirmPassword_err']; ?></span>
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

<script>
document.getElementById("changeEmailForm").addEventListener("submit", function(event) {
    event.preventDefault();     

    fetch(this.action, {
        method: 'POST',
        body: new FormData(this)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // If response indicates success, close the popup
            closePopup();
        } else {
            // If there's an error, show the error message
            alert(data.message);
        }
    })
    .catch(error => {
        // Handle any errors
        console.error('Error:', error);
    });
});


function openPopup() {
    document.getElementById("popup2").style.display = "block";
}

function closePopup() {
    document.getElementById("popup2").style.display = "none";
}

</script>


        </div>
    </div>
    </div>

    <?php require APPROOT . '/views/inc/footer.php'; ?>


</body>

</html>