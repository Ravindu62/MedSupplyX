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
                        <?php $profile = $data['profile'][0]; ?>
                        <div class="anim"> 
                            <td> <p  class="profdetails"> Administrator Name </p> </td> 
                            <td>:</td>
                            <td>  <?php echo $profile->name; ?> </td>           
                        </tr>
                      
                        <tr>
                            <td> <p  class="profdetails">  Administrator Address</p> </td>
                            <td>:</td>
                            <td><?php echo $profile->address; ?></td>
                        </tr>
                        <tr>
                            <td> <p  class="profdetails"> Contact No </td>
                            <td>:</td>
                            <td colspan="3"><?php echo $profile->phone; ?></td>
                            <td><a href="#popup1"> <button class="addBtn"> Change </button></a> </td>
                        </tr>
                        <tr>
                            <td> <p  class="profdetails">Email</td>
                            <td>:</td>
                            <td colspan="3"><?php echo $profile->email; ?></td>
                            <td> <a href="#popup2"><button class="addBtn"> Change </button></a> </td>
                        </tr>
                        <tr>
                            <td><p class="profdetails">Password</p></td>
                            <td>:</td>
                            <td colspan="3"> <b>
                                        <p id="passwordDisplay"><?php echo str_repeat("*", strlen($profile->password)); ?> </p>
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
                                <td><input class="editprofile-input" type="text" name="currentContactNumber" readonly value="<?php echo $profile->phone; ?>"></td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="editprofile-maintag"> New Number </p>
                                </td>
                                <td> : </td>
                                <td><input class="editprofile-input" type="text" placeholder="Enter New Contact Number" name="newPhone"></td>
                            </tr>
                        </table>
                        <div class="editprofile-btnsetup">
                        <a href="<?php echo URLROOT; ?>/admins/changeContactNumber"><button type="submit" class="editprofile-updatebutton "> Update Contact </button></a>
                        <a href="#"><button type="button" class="editprofile-button-red"> Close </button></a>
                        </div>
                    </form>
                </div>
            </div>

            <div id="popup2" class="overlay">
                <div class="popup-profile-change">
                    <form action="<?php echo URLROOT; ?>/admins/changeEmail" method="POST" class="form-container">
                        <h2>Set Your Email Address</h2>
                        <table>
                            <tr>
                                <td >
                                    <p class="editprofile-maintag"> Current Email </p>
                                </td>
                                <td> : </td>
                                <td><input class="editprofile-input" type="text" name="currentEmail" readonly value="<?php echo $profile->email; ?>"></td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="editprofile-maintag"> New Email </p>
                                </td>
                                <td> : </td>
                                <td><input class="editprofile-input" type="text" placeholder="Enter New Email" name="newEmail"></td>
                            </tr>                                
                        </table>
                        <div class="editprofile-btnsetup">
                        <a href="<?php echo URLROOT; ?>/admins/changeEmail"><button type="submit" class="editprofile-updatebutton "> Update Email </button></a>
                        <a href="#"><button type="button" class="editprofile-button-red"> Close </button></a>
                        </div>
                    </form>
                </div>
            </div>


            <div id="popup3" class="overlay">
    <div class="popup-profile-change">
        <form action="<?php echo URLROOT; ?>/admins/changePassword" method="POST" class="form-container">
            <h2>Set Your Password</h2>
            <table>
                <tr>
                    <td>
                        <p class="editprofile-maintag"> Current Password </p>
                    </td>
                    <td> : </td>
                    <td><input class="editprofile-input" type="text" name="currentPassword" readonly value="<?php echo $profile->password; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <p class="editprofile-maintag"> New Password </p>
                    </td>
                    <td> : </td>
                    <td><input class="editprofile-input" type="password" placeholder="Enter Your New Password" name="newPassword" <?php echo (!empty($newPassword_err)) ? 'is-invalid' : ''; ?>></td>
                    <tr><td colspan="3"><span class="importantMessage"><?php echo $newPassword_err; ?></span></td></tr>
                </tr>
                <tr>
                    <td>
                        <p class="editprofile-maintag"> Confirm Password </p>
                    </td>
                    <td> : </td>
                    <td><input class="editprofile-input" type="password" placeholder="Confirm Your New Password" name="confirmPassword"></td>
                    <tr><td colspan="3"><span class="importantMessage"><?php echo $confirmPassword_err; ?></span></td></tr>
                </tr>
            </table>
            <div class="editprofile-btnsetup">
                <a href="<?php echo URLROOT; ?>/admins/changePassword"><button type="submit" class="editprofile-updatebutton"> Update Password </button></a>
                <a href="#"><button type="button" class="editprofile-button-red"> Close </button></a>
            </div>
        </form>
    </div>
</div>

        </div>
    </div>
    </div>

    <?php require APPROOT . '/views/inc/footer.php'; ?>

</body>

</html>