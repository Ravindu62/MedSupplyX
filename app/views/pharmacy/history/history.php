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
            <button class="tablinks" onclick="startEvent(event, 'supplierRejectedOrders')"> <i class="fa-solid fa-ban" style="font-size:24px"></i> </i> REJECTED BY SUPPLIER</button>
            <button class="tablinks" onclick="startEvent(event, 'pharmacyRejectedOrders')"> <i class="fa-solid fa-ban" style="font-size:24px"></i> </i> REJECTED BY YOU)</button>
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
                <!-- <form class="search">
                    <input type="text" id="myInput" placeholder="Search for Medicines" onkeyup="search()">
                    <i class="fas fa-search" id="searchicon"></i>
                </form> -->
                <table class="customers">
                    <tr>
                        <th> Medicine Name </th>
                        <th> Category </th>
                        <th> Quantity </th>

                    </tr>

                    <?php foreach ($data['deliveredOrders'] as $deliveredOrders) : ?>
                        <tr onclick=window.location.href='<?php echo URLROOT; ?>/pharmacies/showDeliveredOrderMedicineBrandDetails/<?php echo $deliveredOrders->medicineName; ?>'>
                            <td> <?php echo $deliveredOrders->medicineName; ?> </td>
                            <td> <?php echo $deliveredOrders->category ?> </td>
                            <td> <?php echo $deliveredOrders->totalQuantity; ?> </td>
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
                <!-- <form class="search">
                    <input type="text" id="myInput" placeholder="Search for Medicines" onkeyup="search()">
                    <i class="fas fa-search" id="searchicon"></i>
                </form> -->
                <table class="customers">
                    <tr>
                        <th> Medicine Name </th>
                        <th> Category </th>
                        <th> Quantity </th>

                    </tr>

                    <?php foreach ($data['supplierRejectedOrders'] as $supplierRejectedOrders) : ?>
                        <tr onclick=window.location.href='<?php echo URLROOT; ?>/pharmacies/showSupplierRejectedOrderMedicineBrandDetails/<?php echo $supplierRejectedOrders->medicineName; ?>'>
                            <td> <?php echo $supplierRejectedOrders->medicineName; ?> </td>
                            <td> <?php echo $supplierRejectedOrders->category ?> </td>
                            <td> <?php echo $supplierRejectedOrders->totalQuantity; ?> </td>
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
                <!-- <form class="search">
                    <input type="text" id="myInput" placeholder="Search for Medicines" onkeyup="search()">
                    <i class="fas fa-search" id="searchicon"></i>
                </form> -->
                <table class="customers">
                    <tr>
                        <th> Medicine Name </th>
                        <th> Category </th>
                        <th> Quantity </th>

                    </tr>

                    <?php foreach ($data['pharmacyRejectedOrders'] as $pharmacyRejectedOrders) : ?>
                        <tr onclick=window.location.href='<?php echo URLROOT; ?>/pharmacies/showPharmacyRejectedOrderMedicineBrandDetails/<?php echo $pharmacyRejectedOrders->medicineName; ?>'>
                            <td> <?php echo $pharmacyRejectedOrders->medicineName; ?> </td>
                            <td> <?php echo $pharmacyRejectedOrders->category ?> </td>
                            <td> <?php echo $pharmacyRejectedOrders->totalQuantity; ?> </td>
                        </tr>
                    <?php endforeach; ?>

                </table>
            </div>
        </div>

        <div id="cancelledOrders" class="tabcontent">
            <div class="middlespace1"></div>

            <!-- Table for the Cancelled Orders (By Pharmacy) -->
            <div class="anim">
                <h2> Cancelled Orders </h2>
            </div>
            <div class="smallspace"></div>
            <div class="anim">
                <!-- <form class="search">
                    <input type="text" id="myInput" placeholder="Search for Medicines" onkeyup="search()">
                    <i class="fas fa-search" id="searchicon"></i>
                </form> -->
                <table class="customers">
                    <tr>
                        <th> Medicine Name </th>
                        <th> Category </th>
                        <th> Quantity </th>

                    </tr>

                    <?php foreach ($data['cancelledOrders'] as $cancelledOrders) : ?>
                        <tr onclick=window.location.href='<?php echo URLROOT; ?>/pharmacies/showCancelledOrderMedicineBrandDetails/<?php echo $cancelledOrders->medicine_name; ?>'>
                            <td> <?php echo $cancelledOrders->medicine_name; ?> </td>
                            <td> <?php echo $cancelledOrders->category ?> </td>
                            <td> <?php echo $cancelledOrders->totalQuantity; ?> </td>
                        </tr>
                    <?php endforeach; ?>

                </table>
            </div>
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
    </script>

    <div class="middlespace"></div>
    <div class="pagination">
        <button class="addBtn2" id="prevPage"><i class="fas fa-arrow-alt-circle-left"></i></button>
        <span id="currentPage">01</span>
        <button class="addBtn2" id="nextPage"><i class="fas fa-arrow-alt-circle-right"></i></button>
    </div>
    <script>
        $(document).ready(function() {
            var currentPage = 1;
            var rowsPerPage = 25; // Number of rows per page
            var table = $('#medicineTable');
            var rows = table.find('tr').not(':first');
            var totalPages = Math.ceil(rows.length / rowsPerPage);

            function showRowsForPage(page) {
                var startIndex = (page - 1) * rowsPerPage;
                var endIndex = startIndex + rowsPerPage;
                rows.hide().slice(startIndex, endIndex).show();
                $('#currentPage').text(page);
            }

            showRowsForPage(currentPage);

            $('#prevPage').click(function() {
                if (currentPage > 1) {
                    currentPage--;
                    showRowsForPage(currentPage);
                }
            });

            $('#nextPage').click(function() {
                if (currentPage < totalPages) {
                    currentPage++;
                    showRowsForPage(currentPage);
                }
            });
        });
    </script>


    <?php require APPROOT . '/views/inc/footer.php'; ?>


</body>

</html>