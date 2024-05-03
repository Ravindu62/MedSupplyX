<!DOCTYPE html>
<html lang="en">

<head>
    <title> Delivered Order Medicines Brand </title>
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
        <a href="<?php echo URLROOT; ?>/pharmacies/history"> <button class="addBtn"> Go Back </button> </a>
      </div>
    </h2>
        <div class="smallspace"></div>
        <div class="anim">
            <h2> Delivered Order Medicines Brand </h2>
        </div>
        <div class="smallspace"></div>

        <div class="anim">
            <form class="search">
                <input type="text" id="myInput" placeholder="Search for Medicines" onkeyup="search()">
                <i class="fas fa-search" id="searchicon"></i>
            </form>
            <table class="customers">
                <tr>
                    <th> Ordered Date </th>
                    <th> Delivery Date </th>
                    <th> Medicine Name </th>
                    <th> Suppliers </th>
                    <th> Volume </th>
                    <th> Category </th>
                    <th> Quantity </th>
                    <th> Order Payment </th>

                </tr>

                <?php foreach ($data['orderDetails'] as $deliveredOrders) : ?>
                    <tr onclick=window.location.href='<?php echo URLROOT; ?>/pharmacies/showDeliveredOrderDetails/<?php echo $deliveredOrders->id; ?>'>
                        <td> <?php echo date('Y-m-d', strtotime($deliveredOrders->orderedDate)); ?> </td>
                        <td> <?php echo date('Y-m-d', strtotime($deliveredOrders->deliveryDate)); ?> </td>
                        <td> <?php echo $deliveredOrders->medicineName; ?> </td>
                        <td> <?php echo $deliveredOrders->supplierName; ?> </td>
                        <td> <?php echo $deliveredOrders->volume . ' ' . $deliveredOrders->type; ?> </td>
                        <td> <?php echo $deliveredOrders->category ?> </td>
                        <td> <?php echo $deliveredOrders->quantity; ?> </td>
                        <td> <?php echo $deliveredOrders->bidAmount; ?> </td>
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