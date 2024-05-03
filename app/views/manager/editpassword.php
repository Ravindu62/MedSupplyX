<!DOCTYPE html>
<html lang="en">

<head>
    <title> Your Profile </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>

<body>
    <?php require APPROOT . '/views/inc/header.php'; ?>
  

    <div class="contentOne">
       
        <div class="anim">
            <h2> Change the password </h2>
        </div>
        <div class="anim">
            <div class="profilebox">
                <div class="profilecard">
                    <div class="card-body">
                        <form action="<?php echo URLROOT; ?>/managers/editpassword" method="post">
                        
                            <table>
                                <tr>
                                    <td>
                                        <p class="profdetails"> Email </p>
                                    </td>
                                    <td>:</td>
                                    <td> <input type="text" name="email" value="<?php echo $data['getUserData']->email; ?>" class="orderdetails" disabled> </td>
                                    <td> </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="profdetails"> Old Password </p>
                                    </td>
                                    <td> : </td>
                                    <td colspan="2">
                                        <input id="oldpassword" name="oldpassword" type="password" value="<?php echo $data['getUserData']->password; ?>" class="orderdetails">

                                    </td>
                                    <td> <input type="checkbox" onclick="showPassword1()"> show password </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="profdetails"> New Password </p>
                                    </td>
                                    <td> : </td>
                                    <td colspan="2">
                                        <input id="newpassword" name="newpassword" type="password" class="orderdetails">

                                    </td>
                                    <td> <input type="checkbox" onclick="showPassword2()"> show password </td>
                                </tr>
                                <tr>
                                    <td> <button class="addBtn"> Accept </button> </td>
                                    </td>
                                </tr>
                            </table>

                            <p class="importantMessage"> <?php echo $data['newpassword_err']; ?> </p>
                            <p class="importantMessage"> <?php echo $data['oldpassword_err']; ?> </p>
                            <p class="importantMessage"> <?php echo $data['email_err']; ?> </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>
</body>

</html>