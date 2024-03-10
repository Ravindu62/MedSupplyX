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
                        <tr>
                        <div class="anim"> 
                            <td> <p class="profdetails"> Company Name </p> </td> </div>
                            <td>:</td>
                            <td><?php echo $profile->name; ?></td>           
                        </tr>
                        <tr>
                            <td> <p class="profdetails"> Company Address </p> </td>
                            <td>:</td>
                            <td><?php echo $profile->address; ?></td>
                        </tr>
                        <tr>
                            <td> <p class="profdetails">Licence Number </p> </td>
                            <td>:</td>
                            <td><?php echo $profile->licenceno; ?></td>
                        </tr>
                        <tr>
                            <td> <p class="profdetails"> Contact Number </p>  </td>
                            <td> : </td>
                            <td><?php echo $profile->phone; ?></td>
                        </tr>
                        <tr>
                            <td> <p class="profdetails"> Email </p> </td>
                            <td>:</td>
                            <td><?php echo $profile->email; ?> </td>
                        </tr>
                        <tr>
                            <td> <p class="profdetails"> Password </p> </td>
                            <td> : </td>
                            <td> <?php echo $profile->password; ?></td>
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