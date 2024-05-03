<!DOCTYPE html>
<html lang="en">

<head>
    <title> Approved Orders </title>
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
            <h2> Approved Orders </h2>
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
                    <th> Remarks </th>
                    <th> Reply </th>
                </tr>

                <?php foreach ($data['approvedOrders'] as $approvedOrders  ) : ?>
                    <tr>
                        <td> <?php echo $approvedOrders->medicineName; ?> </td>
                        <td> <?php echo $approvedOrders->volume . ' ' . $approvedOrders->type; ?> </td>
                        <td> <?php echo $approvedOrders->brand; ?> </td>
                        <td> <?php echo $approvedOrders->quantity; ?> </td>
                        <td> <?php echo date('Y-m-d', strtotime($approvedOrders->orderedDate)); ?> </td>
                        <td> <?php echo $approvedOrders->deliveryDate; ?> </td>
                        <td> <?php echo $approvedOrders->supplierName; ?> </td>
                        <td> <?php echo $approvedOrders->remarks; ?> </td>
                        <td> <?php echo $approvedOrders->reply; ?> </td>
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