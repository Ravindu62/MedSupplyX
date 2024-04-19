<!DOCTYPE html>
<html lang="en">
<head>
    <title> Today Customers </title>
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
        <div class="anim">
            <h2> Customer Orders </h2>
            <p>These are the Cutomer Orders you had  today</p>
        </div>
        <div class="anim">
            <table class="customers">
                <tr>
                    <th> Customer Name </th>
                    <th> Medicine Name </th>
                    <th> Batch No </th>
                    <th> Category </th>
                    <th> Contact No </th>
                    <th> Quantity </th>
                    <th> Price </th>
                </tr>
                <?php foreach ($data['todaysCustomerOrders'] as $todaysCustomerOrders) : ?>
                    <tr>
                        <td> <?php echo $todaysCustomerOrders->customerName; ?> </td>
                        <td> <?php echo $todaysCustomerOrders->medicineName; ?> </td>
                        <td> <?php echo $todaysCustomerOrders->batchNo; ?> </td>
                        <td> <?php echo $todaysCustomerOrders->category; ?> </td>
                        <td> <?php echo $todaysCustomerOrders->phone; ?> </td>
                        <td> <?php echo $todaysCustomerOrders->quantity; ?> </td>
                        <td> <?php echo $todaysCustomerOrders->price; ?> </td>
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