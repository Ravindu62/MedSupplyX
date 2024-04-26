<!DOCTYPE html>
<html lang="en">

<head>
    <title> Manager Registration </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>

<body>

    <?php require APPROOT . '/views/inc/header.php'; ?>

    <?php require APPROOT . '/views/inc/admin_sidebar.php'; ?>

    <!-- content -->
    <div class="content">
        <div class="anim">
            <h2> Manager Registration </h2>
            <p> Please fill below form , then click Register </p>
        </div>
        <div class="smallspace"></div>

        <div class="anim">
            <div class="container-fluid">
                <div class="d-flex">
                    <!-- Manager registration form -->
                    <form action="<?php echo URLROOT; ?>/admins/managerRegistration" method="post" class="form-group">

                        <table>
                            <!-- Manager details section -->
                            <tr>
                                <td colspan="2">
                                    <h3> Manager Details </h3>
                                </td>
                            </tr>
                            <tr>
                                <td class="verticleCentered">
                                    <span class="fname"> Manager Name <span class="required">*</span>
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" name="mname" class="orderdetails" <?php echo (!empty($data['mname_err'])) ? 'is-invalid' : ''; ?> value="<?php echo $data['mname']; ?>"> </td>
                            </tr>
                            <tr>
                                <td colsan="3"> <span class="importantMessage"><?php echo $data['mname_err']; ?> <br>
                                    </span> </td>
                            </tr>





                            <tr>
                                <td class="verticleCentered">
                                    <span class="fname"> Physical Address
                                </td>
                                <td> : </td>
                                <td class="verticleCentered" colspan="3"> <input type="text" name="maddress" class="orderdetails" <?php echo (!empty($data['maddress_err'])) ? 'is-invalid' : ''; ?> value="<?php echo $data['maddress']; ?>"> </td>
                            </tr>
                            <tr>
                                <td colsan="3"> <span class="importantMessage"><?php echo $data['maddress_err']; ?> <br>
                                    </span> </td>
                            </tr>



                            <tr> </tr>
                            <td class="verticleCentered">
                                <span class="fname"> Contact No
                            </td>
                            <td> : </td>
                            <td class="verticleCentered" colspan="3"> <input type="text" name="mphone" class="orderdetails" pattern="[0-9]{10}" title="Please enter valid phone number" placeholder="07xxxxxxxx" <?php echo (!empty($data['mphone_err'])) ? 'is-invalid' : ''; ?> value="<?php echo $data['mphone']; ?>"> </td>
                            </tr>
                            <tr>
                                <td colsan="3"> <span class="importantMessage"><?php echo $data['mphone_err']; ?> <br>
                                    </span> </td>
                            </tr>



                            <tr> </tr>
                            <td class="verticleCentered">
                                <span class="fname"> Email <span class="required">*</span>
                            </td>
                            <td> : </td>
                            <td class="verticleCentered" colspan="3"> <input type="email" name="memail" class="orderdetails" <?php echo (!empty($data['memail_err'])) ? 'is-invalid' : ''; ?> value="<?php echo $data['memail']; ?>"> </td>
                            </tr>
                            <tr>
                                <td colsan="3"> <span class="importantMessage"><?php echo $data['memail_err']; ?> <br>
                                    </span> </td>
                            </tr>


                            <tr> </tr>
                            <td class="verticleCentered">
                                <span class="fname"> Password <span class="required">*</span>
                            </td>
                            <td> : </td>
                            <td class="verticleCentered" colspan="3"> <input type="password" name="mpassword" class="orderdetails" <?php echo (!empty($data['mpassword_err'])) ? 'is-invalid' : ''; ?> value="<?php echo $data['mpassword']; ?>"> </td>
                            </tr>
                            <tr>
                                <td colsan="3"> <span class="importantMessage"><?php echo $data['mpassword_err']; ?>
                                        <br> </span> </td>
                            </tr>

                            <tr> </tr>
                            <td class="verticleCentered">
                                <span class="fname"> Confirm Password <span class="required">*</span>
                            </td>
                            <td> : </td>
                            <td class="verticleCentered" colspan="3"> <input type="password" name="confirm_password" class="orderdetails" <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?> value="<?php echo $data['confirm_password']; ?>"> </td>
                            </tr>
                            <tr>
                                <td colsan="3"> <span class="importantMessage"><?php echo $data['confirm_password_err']; ?> <br>
                                    </span> </td>
                            </tr>

                            <!-- Register and Cancel buttons -->
                            <tr>
                                <td class="verticleCentered"> <button class="addBtn"> Register </button>
                                    <input type="reset" name="reset" class="addBtn" value="Cancel">
                                </td>
                    </form>


                    </tr>

                    </table>

                </div>
            </div>

        </div>

    </div>
    </div>

    <?php require APPROOT . '/views/inc/footer.php'; ?>


</body>

</html>