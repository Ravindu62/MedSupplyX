<!DOCTYPE html>
<html lang="en">

<head>
    <title> Inventory Datails </title>
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
        <?php $inventory = $data['inventoryItem']; ?>
        <div class="anim">
            <h2> Change Quantity of <?php echo $inventory->name?> </h2>
        </div>
        <div class="smallspace"></div>

        <div class="anim">
            <div class="container-fluid">
                <div class="d-flex">
                <form action="<?php echo URLROOT; ?>/pharmacies/changeInventory/<?php echo $inventory->id ?>" method="POST">

                        <table>

                            <tr>
                                <td colspan="2">
                                    <h3> <br> Medicine Details</h3>
                                </td>
                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Ref No
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" name="refno" class="smallForm" id="refno" class="form-control" value="<?php echo $inventory->refno ?>" disabled></td>

                                <td class="verticleCentered">
                                    Medicine Name
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"><input type="text" name="medicineName" class="smallForm" value="<?php echo $inventory->name ?>" disabled> </td>


                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Batch No
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" name="batchNo" class="smallForm" id="batchNo" class="form-control" value="<?php echo $inventory->batch_no ?>" disabled> </td>

                                <td class="verticleCentered">
                                    Category
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" name="category" class="smallForm" value="<?php echo $inventory->category ?>" disabled> </td>

                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Volume
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="number" name="volume" class="smallForm" min="1" value="<?php echo $inventory->volume ?>" disabled> </td>



                                <td class="verticleCentered">
                                    Type
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" name="type" class="smallForm" value="<?php echo $inventory->type ?>" disabled> </td>

                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Brand
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" name="brand" class="smallForm" value="<?php echo $inventory->brand ?>" disabled> </td>

                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Additional Quantity
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="number" name="quantity" class="smallForm" min="1"> </td>
                                <!-- <p><?php echo $inventory->quantity_err ?></p> -->



                                <td class="verticleCentered">
                                    Unit Price
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="number" name="unitPrice" class="smallForm" min="1" value="<?php echo $inventory->unit_amount ?>" disabled> </td>

                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Manufacturer Date
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" name="manufactureDate" class="smallForm" value="<?php echo date('Y-m-d', strtotime($inventory->manu_date)) ?>" disabled> </td>


                                <td class="verticleCentered">
                                    Expire Date
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" name="expireDate" class="smallForm" value="<?php echo date('Y-m-d', strtotime($inventory->expire_date)) ?>" disabled> </td>
                            </tr>
                            <tr>
                                <td class="verticleCentered">
                                    Description
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" name="description" class="smallForm" value="<?php echo $inventory->description ?>" disabled> </td>
                            </tr>

                            <tr>
                            <td><a href="<?php echo URLROOT ?>/pharmacies/viewinventory/<?php echo $inventory->medicineId ?>">
                                    <input type="submit" value="Update" class="publicbtn">
                                </a></td>
                                <td><a href="<?php echo URLROOT ?>/pharmacies/inventory" class="link">
                                        <div class="publicbtn"> Back </div>
                                </td>
                                </a>
                            </tr>
                    </form>

                    </table>
                    </form>

                </div>
            </div>






        </div>

    </div>
    </div>

    <?php require APPROOT . '/views/inc/footer.php'; ?>


</body>

</html>