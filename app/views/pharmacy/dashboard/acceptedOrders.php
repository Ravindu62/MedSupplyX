<!DOCTYPE html>
<html lang="en">

<head>
    <title> Accepted Orders </title>
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
            <h2> Accepted Orders </h2>
        </div>
<div class="middlespace"></div>


        <div class="anim">
            <table class="customers">
                <tr>
                    <th> Medicine Name </th>
                    <th> Volume </th>
                    <th> Brand</th>
                    <th> Quantity </th>
                    <th> Accepted Date </th>
                    <th> Delivery Date </th>
                    <th> Suppliers </th>
                    <th> Remarks </th>
                </tr>

                <?php foreach ($data['acceptedOrders'] as $acceptedOrders  ) : ?>
                    <tr>
                        <td> <?php echo $acceptedOrders->medicineName; ?> </td>
                        <td> <?php echo $acceptedOrders->volume . ' ' . $acceptedOrders->type; ?> </td>
                        <td> <?php echo $acceptedOrders->brand; ?> </td>
                        <td> <?php echo $acceptedOrders->quantity; ?> </td>
                        <td> <?php echo date('Y-m-d', strtotime($acceptedOrders->acceptedDate)); ?> </td>
                        <td> <?php echo $acceptedOrders->deliveryDate; ?> </td>
                        <td> <?php echo $acceptedOrders->supplierName; ?> </td>
                        <td> <?php echo $acceptedOrders->remarks; ?> </td>
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