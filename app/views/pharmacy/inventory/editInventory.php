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
                    <form action="<?php echo URLROOT; ?>/pharmacies/editInventory" method="POST" class="orderform">

                        <table>

                            <tr>
                                <td colspan="2">
                                    <h3> <br> Medicine Details</h3>
                                </td>
                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Medicine ID
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" name="medicineId" class="orderdetails" value="<?php echo $data->medicineId; ?>" required>  </td>


                                <td class="verticleCentered">
                                    Medicine Name
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"><input type="text" name="medicineName" class="smallForm" value="<?php echo $data->medicineName; ?>" required> </td>

                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Batch No
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" name="batchNo" class="orderdetails" value="<?php echo $data->batchNo; ?>" required> </td>

                                <td class="verticleCentered">
                                    Category
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" name="category" class="smallForm" value="<?php echo $data->category; ?>" required> </td>
                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Quantity
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="number" name="quantity" class="smallForm" min="1" value="<?php echo $data->quantity; ?>" required> </td>


                                <td class="verticleCentered">
                                    Unit Price
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="number" name="unitPrice" class="smallForm" min="1" value="<?php echo $data->unitPrice; ?>" required> </td>
                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Manufacturer Date
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="Date" class="orderdetails" placeholder="YYYY-MM-DD" name="manufacturedDate" value="<?php echo $data->manufacturedDate; ?>" required> </td>

                                <td class="verticleCentered">
                                    Expire Date
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="Date" class="orderdetails" placeholder="YYYY-MM-DD" name="expireDate" value="<?php echo $data->expireDate; ?>" required> </td>
                            </tr>

                            <tr>
                                <td class="verticleCentered"> <input type="submit" class="addBtn" value="Add" name="add"></td>
                                <td><a href="<?php echo URLROOT ?>/pharmacies/inventory" class="link">
                                        <div class="publicbtn"> Go Back </div>
                                </td>
                                </a>
                            </tr>
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