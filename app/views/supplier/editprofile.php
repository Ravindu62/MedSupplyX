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
<?php require APPROOT . '/views/inc/supplier_sidebar.php'; ?>
<div class="content">
<div class="anim">
<h2> Profile </h2>
</div>
<div class="anim"> 
    <div class="profilebox">
        <div class="profilecard">
            <div class="card-body">
                <form action="<?php echo URLROOT; ?>/suppliers/editprofile" method="post">
                <table>
                <?php $getProfileData = $data['getProfileData']; ?>
                       
                        <tr>
                            <td> <p class="profdetails"> Email </p> </td>
                            <td>:</td>
                            <td> <input type="text" name="email" value="<?php echo $getProfileData->email; ?>" class="orderdetails"> </td>
                            <td> <p class="importantMessage"> <?php echo $data['email_err']; ?></p> </td>
                        </tr>
                        <tr>
                            <td> <p class="profdetails"> Current Password </p> </td>
                            <td> : </td>
                            <td> <input type="password" name="oldpassword" value="<?php echo $getProfileData->password; ?>" class="orderdetails"></td>
                            <td> <p class="importantMessage"><?php echo $data['oldpassword_err']; ?></p>  </td>                           
                        </tr>

                        <tr>
                            <td> <p class="profdetails"> New Password </p> </td>
                            <td> : </td>
                            <td> <input type="password" name="newpassword" class="orderdetails"> </td>
                            <td> <p class="importantMessage"> <?php echo $data['newpassword_err']; ?></p>  </td>
                            
                        </tr>
                        <tr>
                        <td> <input type="submit" class="addBtn"></td>
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
