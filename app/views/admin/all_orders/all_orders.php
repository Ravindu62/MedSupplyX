<DOCTYPE html>
    <html lang="en">

    <head>
        <title> Inventory </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
    </head>

    <body>
    

        <?php require APPROOT . '/views/inc/header.php'; ?>

        <?php require APPROOT . '/views/inc/admin_sidebar.php'; ?>


        <!-- content -->
        <div class="content">
            <!-- Tab navigation -->

            <div class="horizontaltab2">
                <button class="tablinks active" onclick="toggleTab('pharmacies')"><i class="fa-solid fa-prescription-bottle-medical"  style="font-size:30px"></i> PHARMACY</button>
                <button class="tablinks" onclick="toggleTab('suppliers')"><i class="fa-solid fa-truck-ramp-box"  style="font-size:30px"></i> SUPPLIER</button>
                <!-- Move horizontaltab3 inside horizontaltab2 and initially hide it -->
                <div id="pharmacies" class="horizontaltab" style="display: none;">
                    <button class="tablinks active" onclick="startEvent(event, 'pharmacyReceivedOrders')" data-parenttab="pharmacies"><i class="fa fa-shopping-cart" style="font-size:24px"></i> RECEIVED ORDERS</button>
                    <button class="tablinks" onclick="startEvent(event, 'pharmacyRejectedOrders')" data-parenttab="pharmacies"><i class="fa-solid fa-ban" style="font-size:24px"></i> REJECTED ORDERS</button>
                    <button class="tablinks" onclick="startEvent(event, 'pharmacyCancelledOrders')" data-parenttab="pharmacies"><i class="fa-solid fa-xmark" style="font-size:24px"></i> CANCELLED ORDERS</button>
                </div>
                <div id="suppliers" class="horizontaltab" style="display: none;">
                    <button class="tablinks" onclick="startEvent(event, 'supplierDeliveredOrders')" data-parenttab="suppliers"> <i class="fa fa-shopping-cart" style="font-size:24px"></i> DELIVERED ORDERS</button>
                    <button class="tablinks" onclick="startEvent(event, 'supplierRejectedOrders')" data-parenttab="suppliers"><i class="fa-solid fa-ban" style="font-size:24px"></i> REJECTED ORDERS</button>
                    <button class="tablinks" onclick="startEvent(event, 'supplierCancelledOrders')" data-parenttab="suppliers"><i class="fa-solid fa-xmark" style="font-size:24px"></i> CANCELLED ORDERS</button>
                </div>
            </div>

            <!-- Pharmacy order details -->
            <?php $pharmacyReceivedOrders_filter = $data['pharmacyReceivedOrderById']; ?>
            <?php $pharmacyReceivedOrders = $data['pharmacyReceivedOrders']; ?>
            <div id="pharmacyReceivedOrders" class="tabcontent">
                <div class="middlespace1"></div>
                <div class="anim">
                    <h2> Pharmacy Received Orders</h2>
                </div>


                <div class="anim">
                    <div class="smallspace"></div>
                    <div class="smallspace"></div>

                    <form class="search" action="<?php echo URLROOT ?>/admins/all_orders" method="POST">
                        <input type="text" name="search" id="myInput" placeholder="Search..." value="<?php echo $data['search'] ?>">
                        <button type="submit"><i class="fas fa-search" id="searchicon2"></i></button>
                    </form>
                    <table class="customers" id="pharmacyReceivedOrderTable">
                        <tr>
                            <th> Pharmacy Name </th>
                            <th> Total Orders </th>

                        </tr>

                        <?php foreach ($data['pharmacyReceivedOrders'] as $pharmacyReceivedOrders) : ?>
                            <tr onclick=window.location.href='<?php echo URLROOT; ?>/admins/showPharmacyReceivedOrderDetails/<?php echo $pharmacyReceivedOrders->pharmacyName; ?>'>
                                <td> <?php echo $pharmacyReceivedOrders->pharmacyName; ?> </td>
                                <td> <?php echo $pharmacyReceivedOrders->orderId ?> </td>
                            </tr>
                        <?php endforeach; ?>

                    </table>
                </div>
            </div>

            <?php $pharmacyRejectedOrders_filter = $data['pharmacyRejectedOrderById']; ?>
            <?php $pharmacyRejectedOrders = $data['pharmacyRejectedOrders']; ?>
            <div id="pharmacyRejectedOrders" class="tabcontent">
                <div class="middlespace1"></div>

                <!-- Table for the Rejected Orders (By Suppliers) -->
                <div class="anim">
                    <h2> Pharmacy Rejected Orders </h2>
                </div>
                <div class="smallspace"></div>
                <div class="anim">
                    <div class="smallspace"></div>
                    <div class="smallspace"></div>

                    <form class="search" action="<?php echo URLROOT ?>/admins/all_orders" method="POST">
                        <input type="text" name="search" id="myInput" placeholder="Search Pharmacy Names..." value="<?php echo $data['search'] ?>">
                        <button type="submit"><i class="fas fa-search" id="searchicon2"></i></button>
                    </form>
                    <table class="customers" id="pharmacyRejectedOrderTable">
                        <tr>
                            <th> Pharmacy Name </th>
                            <th> Total Orders </th>


                        </tr>

                        <?php foreach ($data['pharmacyRejectedOrders'] as $pharmacyRejectedOrders) : ?>
                            <tr onclick=window.location.href='<?php echo URLROOT; ?>/admins/showPharmacyRejectedOrderDetails/<?php echo $pharmacyRejectedOrders->pharmacyName; ?>'>
                                <td> <?php echo $pharmacyRejectedOrders->pharmacyName; ?> </td>
                                <td> <?php echo $pharmacyRejectedOrders->orderId ?> </td>

                            </tr>
                        <?php endforeach; ?>

                    </table>
                </div>
            </div>

            <?php $pharmacyCancelledOrders_filter = $data['pharmacyCancelledOrderById']; ?>
            <?php $pharmacyCancelledOrders = $data['pharmacyCancelledOrders']; ?>
            <div id="pharmacyCancelledOrders" class="tabcontent">
                <div class="middlespace1"></div>

                <!-- Table for the Cancelled Orders (By Pharmacy) -->
                <div class="anim">
                    <h2> Pharmacy Cancelled Orders</h2>
                </div>
                <div class="smallspace"></div>
                <div class="anim">
                    <div class="smallspace"></div>
                    <div class="smallspace"></div>

                    <form class="search" action="<?php echo URLROOT ?>/admins/all_orders" method="POST">
                        <input type="text" name="search" id="myInput" placeholder="Search Pharmacy Names..." value="<?php echo $data['search'] ?>">
                        <button type="submit"><i class="fas fa-search" id="searchicon2"></i></button>
                    </form>
                    <table class="customers" id="pharmacyCancelledOrderTable">
                        <tr>
                            <th> Pharmacy Name </th>
                            <th> Total Orders </th>


                        </tr>

                        <?php foreach ($data['pharmacyCancelledOrders'] as $pharmacyCancelledOrders) : ?>
                            <tr onclick=window.location.href='<?php echo URLROOT; ?>/admins/showPharmacyCancelledOrderDetails/<?php echo $pharmacyCancelledOrders->pharmacyName; ?>'>
                                <td> <?php echo  $pharmacyCancelledOrders->pharmacyName; ?> </td>
                                <td> <?php echo  $pharmacyCancelledOrders->orderId ?> </td>

                            </tr>
                        <?php endforeach; ?>

                    </table>
                </div>
            </div>

            <?php $supplierDeliveredOrders_filter = $data['supplierDeliveredOrderById']; ?>
            <?php $supplierDeliveredOrders = $data['supplierDeliveredOrders']; ?>
            <!-- Supplier Order Details -->
            <div id="supplierDeliveredOrders" class="tabcontent">
                <div class="middlespace1"></div>
                <div class="anim">
                    <h2> Supplier Delivered Orders </h2>
                </div>


                <div class="anim">
                    <div class="smallspace"></div>
                    <div class="smallspace"></div>

                    <form class="search" action="<?php echo URLROOT ?>/admins/all_orders" method="POST">
                        <input type="text" name="search" id="myInput" placeholder="Search..." value="<?php echo $data['search'] ?>">
                        <button type="submit"><i class="fas fa-search" id="searchicon2"></i></button>
                    </form>
                    <table class="customers" id="supplierDeliveredOrderTable">
                        <tr>
                            <th> Supplier Name </th>
                            <th> Total Orders </th>

                        </tr>

                        <?php foreach ($data['supplierDeliveredOrders'] as $supplierDeliveredOrders) : ?>
                            <tr onclick=window.location.href='<?php echo URLROOT; ?>/admins/showSupplierDeliveredOrderDetails/<?php echo $supplierDeliveredOrders->supplierName; ?>'>
                                <td> <?php echo $supplierDeliveredOrders->supplierName; ?> </td>
                                <td> <?php echo $supplierDeliveredOrders->orderId ?> </td>
                            </tr>
                        <?php endforeach; ?>

                    </table>
                </div>
            </div>

            <?php $supplierRejectedOrders_filter = $data['supplierRejectedOrderById']; ?>
            <?php $supplierRejectedOrders = $data['supplierRejectedOrders']; ?>
            <div id="supplierRejectedOrders" class="tabcontent">
                <div class="middlespace1"></div>

                <!-- Table for the Rejected Orders (By Suppliers) -->
                <div class="anim">
                    <h2> Supplier Rejected Orders </h2>
                </div>
                <div class="smallspace"></div>
                <div class="anim">
                    <div class="smallspace"></div>
                    <div class="smallspace"></div>

                    <form class="search" action="<?php echo URLROOT ?>/admins/all_orders" method="POST">
                        <input type="text" name="search" id="myInput" placeholder="Search Pharmacy Names..." value="<?php echo $data['search'] ?>">
                        <button type="submit"><i class="fas fa-search" id="searchicon2"></i></button>
                    </form>
                    <table class="customers" id="supplierRejectedOrderTable">
                        <tr>
                            <th> Supplier Name </th>
                            <th> Total Orders </th>


                        </tr>

                        <?php foreach ($data['supplierRejectedOrders'] as $supplierRejectedOrders) : ?>
                            <tr onclick=window.location.href='<?php echo URLROOT; ?>/admins/showSupplierRejectedOrderDetails/<?php echo $supplierRejectedOrders->supplierName; ?>'>
                                <td> <?php echo $supplierRejectedOrders->supplierName; ?> </td>
                                <td> <?php echo $supplierRejectedOrders->orderId ?> </td>

                            </tr>
                        <?php endforeach; ?>

                    </table>
                </div>
            </div>

            <?php $supplierCancelledOrders_filter = $data['supplierCancelledOrderById']; ?>
            <?php $supplierCancelledOrders = $data['supplierCancelledOrders']; ?>
            <div id="supplierCancelledOrders" class="tabcontent">
                <div class="middlespace1"></div>

                <!-- Table for the Cancelled Orders (By Pharmacy) -->
                <div class="anim">
                    <h2> Supplier Cancelled Orders</h2>
                </div>
                <div class="smallspace"></div>
                <div class="anim">
                    <div class="smallspace"></div>
                    <div class="smallspace"></div>

                    <form class="search" action="<?php echo URLROOT ?>/admins/all_orders" method="POST">
                        <input type="text" name="search" id="myInput" placeholder="Search Pharmacy Names..." value="<?php echo $data['search'] ?>">
                        <button type="submit"><i class="fas fa-search" id="searchicon2"></i></button>
                    </form>
                    <table class="customers" id="supplierCancelledOrderTable">
                        <tr>
                            <th> Supplier Name </th>
                            <th> Total Orders </th>


                        </tr>

                        <?php foreach ($data['supplierCancelledOrders'] as $supplierCancelledOrders) : ?>
                            <tr onclick=window.location.href='<?php echo URLROOT; ?>/admins/showsupplierCancelledOrderDetails/<?php echo $supplierCancelledOrders->supplierName; ?>'>
                                <td> <?php echo  $supplierCancelledOrders->supplierName; ?> </td>
                                <td> <?php echo  $supplierCancelledOrders->orderId ?> </td>

                            </tr>
                        <?php endforeach; ?>

                    </table>
                </div>
            </div>

        </div>
        </div>




        <!-- Script for tab functionality -->
        <script>
            function submitForm() {
                document.querySelector('.search').submit();
            }

            function toggleTab(tabName) {
                // Hide all tab content
                var tabContents = document.getElementsByClassName("horizontaltab");
                for (var i = 0; i < tabContents.length; i++) {
                    tabContents[i].style.display = "none";
                }

                // Remove the "active" class from all tab links
                var tabLinks = document.getElementsByClassName("tablinks");
                for (var i = 0; i < tabLinks.length; i++) {
                    tabLinks[i].classList.remove("active");
                }

                // Show the selected tab content
                document.getElementById(tabName).style.display = "block";
                var activeTab = document.querySelector('.tablinks[data-tab="' + tabName + '"]');
                activeTab.classList.add("active");

                // If this is a sub-tab, also set the main tab as active
                var parentTabName = activeTab.getAttribute('data-parenttab');
                if (parentTabName) {
                    var parentTab = document.querySelector('.tablinks[data-tab="' + parentTabName + '"]');
                    parentTab.classList.add("active");
                }
            }

            // Function to switch between tab content
            function startEvent(evt, cityName) {
                var i, tabcontent, tablinks;
                // Hide all tab content
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }

                // Remove the "active" class from all tab links
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }

                // Show the selected tab content
                document.getElementById(cityName).style.display = "block";
                // Add the "active" class to the clicked tab link
                if (evt) evt.currentTarget.className += " active";
                else {
                    // If the function is called on page load, set the first tab link as active
                    document.querySelector('button.tablinks').className += " active";
                }
            }
            // Set the initial active tab on page load
            document.body.addEventListener('DOMContentLoaded', startEvent(event, 'orders'));
        </script>

    </body>

    </html>