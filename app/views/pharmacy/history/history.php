<!DOCTYPE html>
<html lang="en">

<head>
    <title> History </title>
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

        <div class="horizontaltab3">
            <button class="tablinks active" onclick="startEvent(event, 'deliveredOrders')"> <i class="fa fa-shopping-cart" style="font-size:24px"> </i> DELIVERED ORDERS</button>
            <button class="tablinks" onclick="startEvent(event, 'supplierRejectedOrders')"> <i class="fa-solid fa-ban" style="font-size:24px"></i> </i> REJECTED ORDERS(SUPPLIER)</button>
            <button class="tablinks" onclick="startEvent(event, 'pharmacyRejectedOrders')"> <i class="fa-solid fa-ban" style="font-size:24px"></i> </i> REJECTED ORDERS(YOU)</button>
            <button class="tablinks" onclick="startEvent(event, 'cancelledOrders')"> <i class="fa-solid fa-xmark" style="font-size:24px"> </i> CANCELLED ORDERS</button>
        </div>

        <!-- Table for the Delivered Orders -->
        <div id="deliveredOrders" class="tabcontent">
            <div class="middlespace1"></div>
            <div class="anim">
                <h2> Delivered Orders </h2>
            </div>
            <div class="smallspace"></div>

            <div class="anim">
                <table class="customers">
                    <tr>
                        <th> Order Id </th>
                        <th> Medicine Name </th>
                        <th> Batch No </th>
                        <th> Quantity </th>
                        <th> Ordered Date </th>
                        <th> Delivery Date </th>
                        <th> Suppliers </th>

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
        </div>

        <div id="supplierRejectedOrders" class="tabcontent">
            <div class="middlespace1"></div>

            <!-- Table for the Rejected Orders (By Suppliers) -->
            <div class="anim">
                <h2> Rejected Orders (By Suppliers) </h2>
            </div>
            <div class="smallspace"></div>
            <div class="anim">
                <table class="customers">
                    <tr>
                        <th> Order Id </th>
                        <th> Supplier Name </th>
                        <th> Medicine Name </th>
                        <th> Batch No </th>
                        <th> Quantity </th>
                        <th> Ordered Date </th>
                        <th> Reason for cancelling </th>

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
        </div>

        <div id="pharmacyRejectedOrders" class="tabcontent">
            <div class="middlespace1"></div>

            <!-- Table for the Rejected Orders (By Pharmacy) -->
            <div class="anim">
                <h2> Rejected Orders (By You) </h2>
            </div>
            <div class="smallspace"></div>

            <div class="anim">
                <table class="customers">
                    <tr>
                        <th> Order Id </th>
                        <th> Supplier Name </th>
                        <th> Medicine Name </th>
                        <th> Batch No </th>
                        <th> Quantity </th>
                        <th> Ordered Date </th>
                        <th> Reason for cancelling </th>

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
        </div>

        <div id="cancelledOrders" class="tabcontent">
            <div class="middlespace1"></div>

            <!-- Table for the Cancelled Orders (By Pharmacy) -->
            <div class="anim">
                <h2> Cancelled Orders (By You) </h2>
            </div>
            <div class="smallspace"></div>
            <div class="anim">
                <table class="customers">
                    <tr>
                        <th> Order Id </th>
                        <th> Medicine Name </th>
                        <th> Batch No </th>
                        <th> Quantity </th>
                        <th> Ordered Date </th>
                        <th> Reason for cancelling </th>

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
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        startEvent(null, 'deliveredOrders');
    });

    function startEvent(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        if (evt) evt.currentTarget.className += " active";
        else document.querySelector('button.tablinks').className += " active";
    }
</script>


    <?php require APPROOT . '/views/inc/footer.php'; ?>


</body>

</html>

