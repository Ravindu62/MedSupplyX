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
            <h2> Registered Medicines </h2>
        </div>



        <div class="anim">
            <table class="customers">
                <tr>
                    <th> Medicine Name </th>
                    <th> Reference No </th>
                    <th> Category </th>
                    <th> Volume </th>
                    <th> Type </th>
                    <th> Description </th>
                </tr>

                <?php foreach ($data['medicines'] as $medicines) : ?>
                    <tr>
                        <td> <?php echo $medicines->medicinename; ?> </td>
                        <td> <?php echo $medicines->refno; ?> </td>
                        <td> <?php echo $medicines->category; ?> </td>
                        <td> <?php echo $medicines->volume; ?> </td>
                        <td> <?php echo $medicines->type; ?> </td>
                        <td> <?php echo $medicines->description; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    </div>

    <?php require APPROOT . '/views/inc/footer.php'; ?>


</body>

</html>