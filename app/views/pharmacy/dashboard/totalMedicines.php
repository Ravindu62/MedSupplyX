<!DOCTYPE html>
<html lang="en">

<head>
    <title> Total Medicines </title>
    <meta charset="utf-8">
    <link rel="icon" href="<?php echo URLROOT ?>/public/img/logo3.png" type="image/gif" sizes="20x16">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>

<body>


    <?php require APPROOT . '/views/inc/header.php'; ?>

    <?php require APPROOT . '/views/inc/pharmacy_sidebar.php'; ?>

    <!-- content -->
    <div class="content">

        <div class="smallspace"></div>
        <div class="alignRight">
            <a href="<?php echo URLROOT; ?>/pharmacies/index"> <button class="addBtn"> Back </button> </a>
        </div>
        <div class="smallspace"></div>

        <div class="anim">
            <h2> Total Medicines </h2>
        </div>
<div class="middlespace"></div>


        <div class="anim">
            <table class="customers">
                <tr>
                    <th> Medicine Name </th>
                    <th> Category </th>
                    <th> Total Quantity </th>
                </tr>

                <?php foreach ($data['totalMedicines'] as $totalMedicines) : ?>
                    <tr>
                        <td> <?php echo $totalMedicines->name; ?> </td> 
                        <td> <?php echo $totalMedicines->category; ?> </td>
                        <td> <?php echo $totalMedicines->totalQuantity; ?> </td>
                        </form>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    </div>

    <?php require APPROOT . '/views/inc/footer.php'; ?>


</body>

</html>