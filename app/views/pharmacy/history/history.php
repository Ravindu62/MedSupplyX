<!DOCTYPE html>
<html lang="en">

<head>
    <title> History </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>

<body>


    <?php require APPROOT . '/views/inc/header.php'; ?>

    <?php require APPROOT . '/views/inc/pharmacy_sidebar.php'; ?>

    <!-- content -->
    <div class="content">
        <!-- Table for the Delivered Orders -->
        <div class="anim">
            <h2> Delivered Orders </h2>
        </div>

        <div class="anim">
            <table class="customers">
                <tr>
                    <th class="custom1"> Order Id </th>
                    <th class="custom1"> Medicine Name </th>
                    <th class="custom1"> Batch No </th>
                    <th class="custom1"> Quantity </th>
                    <th class="custom1"> Ordered Date </th>
                    <th class="custom1"> Delivery Date </th>
                    <th class="custom1"> Suppliers </th>

                </tr>

                <?php foreach ($data['deliveredOrders'] as $deliveredOrders) : ?>
                    <tr>
                        <td> <?php echo $deliveredOrders->id; ?> </td>
                        <td> <?php echo $deliveredOrders->medicine_name; ?> </td>
                        <td> <?php echo $deliveredOrders->batchno; ?> </td>
                        <td> <?php echo $deliveredOrders->quantity; ?> </td>
                        <td> <?php echo $deliveredOrders->ordered_date; ?> </td>
                        <td> <?php echo $deliveredOrders->deliveryDate; ?> </td>
                        <td> <?php echo $deliveredOrders->supplier_name; ?> </td>
                    </tr>
                <?php endforeach; ?>

            </table>
        </div>

        <!-- Table for the Rejected Orders (By Suppliers) -->
        <div class="space"></div>
        <div class="anim">
            <h2> Rejected Orders (By Suppliers) </h2>
        </div>
        <div class="anim">
            <table class="customers">
                <tr>
                    <th class="custom3"> Order Id </th>
                    <th class="custom3"> Supplier Name </th>
                    <th class="custom3"> Medicine Name </th>
                    <th class="custom3"> Batch No </th>
                    <th class="custom3"> Quantity </th>
                    <th class="custom3"> Ordered Date </th>
                    <th class="custom3"> Reason for cancelling </th>

                </tr>

                
                <?php foreach ($data['rejectedOrdersBySuppliers'] as $rejectedOrdersBySuppliers) : ?>
                    <tr>
                        <td> <?php echo $rejectedOrdersBySuppliers->id; ?> </td>
                        <td> <?php echo $rejectedOrdersBySuppliers->supplier_name; ?> </td>
                        <td> <?php echo $rejectedOrdersBySuppliers->medicine_name; ?> </td>
                        <td> <?php echo $rejectedOrdersBySuppliers->batchno; ?> </td>
                        <td> <?php echo $rejectedOrdersBySuppliers->quantity; ?> </td>
                        <td> <?php echo $rejectedOrdersBySuppliers->ordered_date; ?> </td>
                        <td> <?php echo $rejectedOrdersBySuppliers->reason; ?> </td>
                    </tr>
                <?php endforeach; ?>

            </table>
        </div>

        <!-- Table for the Rejected Orders (By Pharmacy) -->
        <div class="space"></div>
        <div class="anim">
            <h2> Rejected Orders (By You) </h2>
        </div>
        <div class="anim">
            <table class="customers">
                <tr>
                    <th class="custom2"> Order Id </th>
                    <th class="custom2"> Supplier Name </th>
                    <th class="custom2"> Medicine Name </th>
                    <th class="custom2"> Batch No </th>
                    <th class="custom2"> Quantity </th>
                    <th class="custom2"> Ordered Date </th>
                    <th class="custom2"> Reason for cancelling </th>

                </tr>

                
                <?php foreach ($data['rejectedOrdersByPharmacy'] as $rejectedOrdersByPharmacy) : ?>
                    <tr>
                        <td> <?php echo $rejectedOrdersByPharmacy->id; ?> </td>
                        <td> <?php echo $rejectedOrdersByPharmacy->supplier_name; ?> </td>
                        <td> <?php echo $rejectedOrdersByPharmacy->medicine_name; ?> </td>
                        <td> <?php echo $rejectedOrdersByPharmacy->batchno; ?> </td>
                        <td> <?php echo $rejectedOrdersByPharmacy->quantity; ?> </td>
                        <td> <?php echo $rejectedOrdersByPharmacy->ordered_date; ?> </td>
                        <td> <?php echo $rejectedOrdersByPharmacy->reason; ?> </td>
                    </tr>
                <?php endforeach; ?>

            </table>
        </div>

        <!-- Table for the Cancelled Orders (By Pharmacy) -->
        <div class="space"></div>
        <div class="anim">
            <h2> Cancelled Orders (By You) </h2>
        </div>
        <div class="anim">
            <table class="customers">
                <tr>
                    <th class="custom3"> Order Id </th>
                    <th class="custom3"> Medicine Name </th>
                    <th class="custom3"> Batch No </th>
                    <th class="custom3"> Quantity </th>
                    <th class="custom3"> Ordered Date </th>
                    <th class="custom3"> Reason for cancelling </th>

                </tr>

                
                <?php foreach ($data['cancelledOrdersByPharmacy'] as $cancelledOrdersByPharmacy) : ?>
                    <tr>
                        <td> <?php echo $cancelledOrdersByPharmacy->id; ?> </td>
                        <td> <?php echo $cancelledOrdersByPharmacy->medicine_name; ?> </td>
                        <td> <?php echo $cancelledOrdersByPharmacy->batchno; ?> </td>
                        <td> <?php echo $cancelledOrdersByPharmacy->quantity; ?> </td>
                        <td> <?php echo $cancelledOrdersByPharmacy->ordered_date; ?> </td>
                        <td> <?php echo $cancelledOrdersByPharmacy->reason; ?> </td>
                    </tr>
                <?php endforeach; ?>

            </table>
        </div>
    </div>
    </div>

    <?php require APPROOT . '/views/inc/footer.php'; ?>


</body>

</html>