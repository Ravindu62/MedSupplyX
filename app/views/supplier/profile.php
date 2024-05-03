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
                <table>
                    <?php $getProfileData = $data['getProfileData']; ?>
                        <tr>
                        <div class="anim"> 
                            <td> <p class="profdetails"> Company Name </p> </td> </div>
                            <td>:</td>
                            <td> <?php echo $getProfileData->name; ?> </td>         
                        </tr>
                        <tr>
                            <td> <p class="profdetails"> Company Address </p> </td>
                            <td>:</td>
                            <td> <?php echo $getProfileData->address; ?> </td>
                        </tr>
                        <tr>
                            <td> <p class="profdetails">Licence Number </p> </td>
                            <td>:</td>
                            <td> <?php echo $getProfileData->licenceno; ?> </td>
                        </tr>
                        <tr>
                            <td> <p class="profdetails"> Contact Number </p>  </td>
                            <td> : </td>
                            <td> <?php echo $getProfileData->phone; ?></td>
                           
                        </tr>
                        <tr>
                            <td> <p class="profdetails"> Email </p> </td>
                            <td>:</td>
                            <td> <?php echo $getProfileData->email; ?> </td>
                           
                        </tr>
                        <tr>
                            <td> <p class="profdetails"> Password </p> </td>
                            <td> : </td>
                            <td> <p id="password" style="display:none;"><?php echo $getProfileData->password; ?></p>  <input type="checkbox" onclick="showPassword()"> show password </td>
                            <td>
                            <a href="<?php echo URLROOT; ?>/suppliers/editprofile">
                            <button class="addBtn"> Change </button> </td>
                             </a>            
                        </tr>
                </table>
            </div>
        </div>
</div>
</div>
</div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
</body>
</html>
