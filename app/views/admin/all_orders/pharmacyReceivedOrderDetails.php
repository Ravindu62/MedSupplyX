<!DOCTYPE html>
<html lang="en">

<head>
    <title> Delivered Order </title>
    <meta charset="utf-8">
    <link rel="icon" href="<?php echo URLROOT ?>/public/img/logo3.png" type="image/gif" sizes="20x16">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>

<body>
    <?php $pharmacyReceivedOrders = $data['orderDetails']; ?>
    <?php require APPROOT . '/views/inc/header.php'; ?>
    <?php require APPROOT . '/views/inc/admin_sidebar.php'; ?>
    <!-- content -->
    <div class="content">
        <div class="anim">
            <h2> Pharmacy Received Order </h2>
        </div>
        <div class="smallspace"></div>
        <div class="anim">
                <table class="customers">
                    <thead>
                        <tr>
                            <th>Ordered Date</th>
                            <th>Delivered Date</th>
                            <th>Medicine Name</th>
                            <th>Brand</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pharmacyReceivedOrders as $order) : ?>
                        <tr>
                            <td><?php echo date('Y-m-d', strtotime($order->orderedDate)); ?></td>
                            <td><?php echo date('Y-m-d', strtotime($order->deliveredDate)); ?></td>
                            <td><?php echo $order->medicineName; ?></td>
                            <td><?php echo $order->brand; ?></td>
                            <td><?php echo $order->quantity; ?></td>
                            <td><?php echo $order->bidAmount; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
        </div>
    </div>
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>
</body>

</html>
