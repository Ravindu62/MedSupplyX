<!DOCTYPE html>
<html lang="en">

<head>
    <title> Your Accepted Orders </title>
    <meta charset="utf-8">
    <link rel="icon" href="<?php echo URLROOT ?>/public/img/logo3.png" type="image/gif" sizes="20x16">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>

<body>


    <?php require APPROOT . '/views/inc/header.php'; ?>

    <?php require APPROOT . '/views/inc/admin_sidebar.php'; ?>

    <!-- content -->
    <div class="content">

        <div class="smallspace"></div>

        <div class="anim">
            <h2> Pending Pharmacy Registration </h2>
        </div>



        <div class="anim">
            <table class="customers">
                <tr>
                    <th> Licence No </th>
                    <th> Pharmacy Name </th>
                    <th> Physical Address </th>
                    <th> Contact No </th>
                    <th> Email </th>
                    <th> status </th>
                </tr>

                <?php foreach ($data['pendingPharmacy'] as $pendingPharmacy) : ?>
                    <tr>
                        <td> <?php echo $pendingPharmacy->licenceno; ?> </td>
                        <td> <?php echo $pendingPharmacy->name; ?> </td>
                        <td> <?php echo $pendingPharmacy->address; ?> </td>
                        <td> <?php echo $pendingPharmacy->phone; ?> </td>
                        <td> <?php echo $pendingPharmacy->email; ?> </td>
                        <td> <?php echo $pendingPharmacy->status; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    </div>

    <?php require APPROOT . '/views/inc/footer.php'; ?>


</body>

</html>