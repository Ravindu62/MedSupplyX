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
    <?php require APPROOT . '/views/inc/manager_sidebar.php'; ?>
    <div class="content">
        <div class="anim">
            <h2> Profile </h2>
        </div>
        <div class="anim">
            <div class="profilebox">
                <div class="profilecard">
                    <div class="card-body">
                        <form>
                            <table>
                                <tr>
                                    <td>
                                        <p class="profdetails"> Email </p>
                                    </td>
                                    <td>:</td>
                                    <td> <input type="text" value="<?php echo $data['getUserData']->email; ?>" class="orderdetails"> </td>
                                    <td> </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="profdetails"> Old Password </p>
                                    </td>
                                    <td> : </td>
                                    <td colspan="2">
                                        <input id="oldpassword" type="password" value="<?php echo $data['getUserData']->password; ?>" class="orderdetails">
                                    </td>
                                    <td> <input type="checkbox" onclick="showPassword1()"> show password </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="profdetails"> New Password </p>
                                    </td>
                                    <td> : </td>
                                    <td colspan="2">
                                        <input id="newpassword" type="password" class="orderdetails">
                                    </td>
                                    <td> <input type="checkbox" onclick="showPassword2()"> show password </td>
                                </tr>
                                <tr>
                                    <td> <button class="addBtn"> Accept </button> </td>
                                    </td>
                                </tr>
                            </table>
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