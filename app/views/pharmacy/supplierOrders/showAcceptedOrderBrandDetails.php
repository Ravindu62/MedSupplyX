<!DOCTYPE html>
<html lang="en">

<head>
    <title> Inventory - Brands of the Medicine </title>
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
        <h2>
            <br>
            <div class="alignRight">
                <a href="<?php echo URLROOT; ?>/pharmacies/orders"> <button class="addBtn"> Go Back </button> </a>
            </div>
        </h2>
        <div class="smallspace"></div>
        <div class="anim">
            <h2> Inventory - Brands of the Medicine</h2>
        </div>
        <div class="smallspace"></div>

        <div class="anim">
            <form class="search">
                <input type="text" id="myInput" placeholder="Search for Medicines" onkeyup="search()">
                <i class="fas fa-search" id="searchicon"></i>
            </form>
            <table class="customers">
                <tr>
                    <th> Accepted Date </th>
                    <th> Medicine Name </th>
                    <th> Brand </th>
                    <th> Quantity </th>
                    <th> Ordered Date </th>
                    <th> Delivery Date </th>
                    <th> Supplier </th>
                    <th> Supplier Amount </th>
                    <th> Approve / Reject </th>

                </tr>

                <?php foreach ($data['orderItem'] as $acceptedOrders) : ?>
                    <?php
                    // Check if the current order has a remark
                    $hasRemark = !empty($acceptedOrders->remarks);
                    // Define a CSS class to apply for highlighting
                    $highlightClass = $hasRemark ? 'highlight-row' : '';
                    ?>
                    <tr class="<?php echo $highlightClass; ?>" onclick=window.location.href='<?php echo URLROOT; ?>/pharmacies/showAcceptedOrderDetails/<?php echo $acceptedOrders->id; ?>'>
                        <td> <?php echo date('Y-m-d', strtotime($acceptedOrders->approvedDate)); ?> </td>
                        <td> <?php echo $acceptedOrders->medicineName; ?> 
                        <?php echo $acceptedOrders->type; ?> 
                         <?php echo $acceptedOrders->volume; ?> </td>
                        <td> <?php echo $acceptedOrders->brand; ?> </td>
                        <td> <?php echo $acceptedOrders->quantity; ?> </td>
                        <td> <?php echo date('Y-m-d', strtotime($acceptedOrders->orderedDate)); ?> </td>
                        <td> <?php echo $acceptedOrders->deliveryDate; ?> </td>
                        <td> <?php echo $acceptedOrders->supplierName; ?> </td>
                        <td> Rs. <?php echo $acceptedOrders->bidAmount; ?> </td>
                        <td>
                            <?php if ($hasRemark) : ?>
                                <a href="<?php echo URLROOT; ?>/pharmacies/addReplyToRemarks/<?php echo $acceptedOrders->id ?>"><button class="smallOpen-button">Approve</button></a>
                            <?php else : ?>
                                <a href="<?php echo URLROOT; ?>/pharmacies/changeStatusAsApproved/<?php echo $acceptedOrders->id ?>"><button class="smallOpen-button">Approve</button></a>
                            <?php endif; ?>
                            <div class="smallspace"></div>
                            <a href="<?php echo URLROOT; ?>/pharmacies/rejectBid/<?php echo $acceptedOrders->id ?>"><button class="smallOpen-button">Reject</button></a>
                            <div class="smallspace"></div>
                            <!-- <a href="<?php echo URLROOT; ?>/pharmacies/contactSupplier/<?php echo $acceptedOrders->id ?>"><button class="smallOpen-button">Contact</button></a> -->
                        </td>
                    </tr>
                <?php endforeach; ?>


            </table>
        </div>

    </div>
    </div>

    <script>
        // Define the search function
        function search() {
            // Get input value and convert to lowercase for case-insensitive search
            var input = document.getElementById("myInput");
            var filter = input.value.toLowerCase();

            // Get the table to search within
            var table = document.querySelector(".customers");

            // Get all rows of the table
            var rows = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those that don't match the search query
            for (var i = 0; i < rows.length; i++) {
                var row = rows[i];
                // Get the data cells in the current row
                var cells = row.getElementsByTagName("td");
                var found = false;
                // Loop through the cells to check for a match
                for (var j = 0; j < cells.length; j++) {
                    var cell = cells[j];
                    if (cell) {
                        // If the cell content matches the search query, show the row
                        if (cell.innerHTML.toLowerCase().indexOf(filter) > -1) {
                            found = true;
                            break;
                        }
                    }
                }
                // Toggle row visibility based on search result
                if (found) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            startEvent(null, 'pharmacyRejectedOrders');
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