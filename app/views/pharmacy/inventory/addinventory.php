<!DOCTYPE html>
<html lang="en">

<head>
    <title> Add Inventory </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>

<body>


    <?php require APPROOT . '/views/inc/header.php'; ?>

    <?php require APPROOT . '/views/inc/pharmacy_sidebar.php'; ?>

    <!-- content -->
    <div class="content">
        <div class="anim">
            <h2> Add Inventory </h2>
        </div>
        <div class="smallspace"></div>

        <div class="anim">
            <div class="container-fluid">
                <div class="d-flex">
                    <!-- <form action="<?php echo URLROOT; ?>/pharmacies/addInventory" method="POST" class="orderform">

                        <table>

                            <tr>
                                <td colspan="2">
                                    <h3> <br> <br> Medicine Details </h3>
                                </td>
                            </tr>
                            <tr>
                                <td class="verticleCentered">
                                    Medicine ID
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" name="medicineId" class="orderdetails" required> </td>


                                <td class="verticleCentered">
                                    Medicine Name
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"><input type="text" name="medicineName" class="smallForm" required> </td>

                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Batch No
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" name="batchNo" class="orderdetails" required> </td>

                                <td class="verticleCentered">
                                    Category
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" name="category" class="smallForm" required> </td>
                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Quantity
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="number" name="quantity" class="smallForm" min="1" required> </td>


                                <td class="verticleCentered">
                                    Unit Price
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="number" name="unitPrice" class="smallForm" min="1" required> </td>
                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Manufacturer Date
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="Date" class="orderdetails" placeholder="YYYY-MM-DD" name="manu_date" required> </td>

                                <td class="verticleCentered">
                                    Expire Date
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="Date" class="orderdetails" placeholder="YYYY-MM-DD" name="expire_date" required> </td>
                            </tr>

                            <tr>
                                <td class="verticleCentered"> <input type="submit" class="addBtn" value="Send"></td>
                                <td><a href="<?php echo URLROOT ?>/pharmacies/inventory" class="link">
                                    <div class="publicbtn"> Go Back </div>
                                    </td>
                                </a>
                            </tr>
                    </form> -->
                    <form action="<?php echo URLROOT; ?>/pharmacies/addInventory" method="post" class="orderform">
                        <div>
                            <label for="medicineId">Medicine ID:</label>
                            <input type="text" id="medicineId" name="medicineId" required>
                        </div>
                        <div>
                            <label for="medicineName">Medicine Name:</label>
                            <input type="text" id="medicineName" name="medicineName" required>
                        </div>
                        <div>
                            <label for="batchNo">Batch Number:</label>
                            <input type="text" id="batchNo" name="batchNo" required>
                        </div>
                        <div>
                            <label for="category">Category:</label>
                            <input type="text" id="category" name="category" required>
                        </div>
                        <div>
                            <label for="quantity">Quantity:</label>
                            <input type="text" id="quantity" name="quantity" required>
                        </div>
                        <div>
                            <label for="manufacturedDate">Manufactured Date:</label>
                            <input type="date" id="manufacturedDate" name="manufacturedDate" placeholder="YYYY-MM-DD" required>
                        </div>
                        <div>
                            <label for="expireDate">Expired Date:</label>
                            <input type="date" id="expireDate" name="expireDate" placeholder="YYYY-MM-DD" required>
                        </div>
                        <div>
                            <label for="unitPrice">Unit Price:</label>
                            <input type="text" id="unitPrice" name="unitPrice" required>
                        </div>
                        <div>
                        <button type="submit">Add Inventory</button>
                        <button type="submit"><a href="<?php echo URLROOT ?>/pharmacies/inventory" class="link">Back</a></button>
                        </div>
                    </form>


                    </table>

                </div>
            </div>






        </div>

    </div>
    </div>

    <?php require APPROOT . '/views/inc/footer.php'; ?>


</body>

</html>