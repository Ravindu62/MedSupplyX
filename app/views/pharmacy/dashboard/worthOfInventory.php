<!DOCTYPE html>
<html lang="en">

<head>
    <title> Worth of Medicines </title>
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
            <h2> Worth of Medicines </h2>
        </div>
<div class="middlespace"></div>


        <div class="anim">
            <table class="customers">
                <tr>
                    <th> Medicine Name </th>
                    <th> Category </th>               
                    <th> Unit Price </th>
                    <th> Quantity </th>
                    <th> Total Amount </th>
                </tr>

                <?php foreach ($data['worthOfInventory'] as $worthOfInventory) : ?>
                    <tr>
                        <td> <?php echo $worthOfInventory->name; ?> </td> 
                        <td> <?php echo $worthOfInventory->category; ?> </td>
                        <td> <?php echo $worthOfInventory->unit_amount; ?> </td>
                        <td> <?php echo $worthOfInventory->totalQuantity; ?> </td>
                        <td> <?php echo $worthOfInventory->total_price; ?> </td>
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