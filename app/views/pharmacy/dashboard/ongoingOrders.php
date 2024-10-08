<!DOCTYPE html>
<html lang="en">

<head>
    <title> Your Ongoing Orders </title>
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
            <h2> Your Ongoing Orders </h2>
        </div>
<div class="middlespace"></div>


        <div class="anim">
            <table class="customers">
                <tr>
                    <th> Medicine Name </th>
                    <th> Volume </th>
                    <th> Brand</th>
                    <th> Quantity </th>
                    <th> Ordered Date </th>
                    <th> Delivery Date </th>
                    <th> Suppliers </th>
                    <th> Status </th>
                </tr>

                <?php foreach ($data['ongoingOrders'] as $ongoingOrders) : ?>
                    <tr>
                        <td> <?php echo $ongoingOrders->medicineName; ?> </td>
                        <td> <?php echo $ongoingOrders->volume . ' ' . $ongoingOrders->type; ?> </td>
                        <td> <?php echo $ongoingOrders->brand; ?> </td>
                        <td> <?php echo $ongoingOrders->quantity; ?> </td>
                        <td> <?php echo date('Y-m-d', strtotime($ongoingOrders->orderedDate)); ?> </td>
                        <td> <?php echo $ongoingOrders->deliveryDate; ?> </td>
                        <td> <?php echo $ongoingOrders->supplierName; ?> </td>
                        <td> <?php echo $ongoingOrders->status; ?> </td>
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