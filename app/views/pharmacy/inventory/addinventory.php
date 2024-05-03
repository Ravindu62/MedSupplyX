<!DOCTYPE html>
<html lang="en">

<head>
    <title> Add Inventory </title>
    <meta charset="utf-8">
    <link rel="icon" href="<?php echo URLROOT ?>/public/img/logo3.png" type="image/gif" sizes="20x16">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>

<body>


    <?php require APPROOT . '/views/inc/header.php'; ?>

    <?php require APPROOT . '/views/inc/pharmacy_sidebar.php'; ?>

    <!-- content -->
    <?php $medicine = $data['medicine']; ?>
    <?php $brand = $data['brands']; ?>



    <div class="content">
        <div class="anim">
            <h2> Add Inventory </h2>
        </div>
        <div class="smallspace"></div>

        <div class="anim">
            <div class="container-fluid">
                <div class="d-flex">
                    <form action="<?php echo URLROOT; ?>/pharmacies/addinventory/<?php echo $medicine->medicineId ?>" method="POST" class="orderform">
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
                                <td class="verticleCentered"> <input type="text" class="smallForm" value="<?php echo $medicine->refno ?>" disabled></td>


                                <td class="verticleCentered">
                                    Medicine Name
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"><input type="text" class="smallForm" value="<?php echo $medicine->medicinename ?>" disabled></td>


                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Batch No
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" name="batchNo" class="smallForm" id="batchNo" class="form-control <?php echo (!empty($data['batchNo_err'])) ? 'is-invalid' : ''; ?>" value="BCH" oninput="preventEditBCH()" required> </td>
                                <p class="importantMessage"> <?php echo $data['batchNo_err']; ?> </p>

                                <td class="verticleCentered">
                                    Category
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"><input type="text" class="smallForm" value="<?php echo $medicine->category ?>" disabled></td>

                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Volume
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" class="smallForm" value="<?php echo $medicine->volume ?>" disabled> </td>




                                <td class="verticleCentered">
                                    Type
                                </td>
                                <td> : </td>
                                <td class="verticleCentered">
                                    <input type="text" class="smallForm" value="<?php echo $medicine->type ?>" disabled>
                                </td>

                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    <span> Available Brand:
                                </td>
                                <td> : </td>
                                <td class="verticleCentered">
                                    <?php
                                    $brands = array();
                                    foreach ($brand as $b) {
                                        if ($b->medicineId == $medicine->medicineId) {
                                            $brands[] = $b->brandname;
                                        }
                                    }
                                    ?>
                                    <select class="type" name="brand" class="orderdetails">
                                        <?php foreach ($brands as $b) : ?>
                                            <option value="<?php echo $b; ?>"> <?php echo $b; ?> </option>
                                        <?php endforeach; ?> <br>
                                    </select>
                                </td>
                                <p class="importantMessage"> <?php echo $data['brand_err']; ?> </p>
                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Quantity
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="number" name="quantity" class="smallForm" min="1" required> </td>
                                <p class="importantMessage"> <?php echo $data['quantity_err']; ?> </p>



                                <td class="verticleCentered">
                                    Unit Price
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="number" name="unitPrice" class="smallForm" min="1" required> </td>
                                <p class="importantMessage"> <?php echo $data['unitPrice_err']; ?> </p>

                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Manufacturer Date
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="Date" class="orderdetails" placeholder="YYYY-MM-DD" name="manufacturedDate" max="<?php echo date('Y-m-d') ?>" required> </td>
                                <p class="importantMessage"> <?php echo $data['manufacturedDate_err']; ?> </p>


                                <td class="verticleCentered">
                                    Expire Date
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="Date" class="orderdetails" placeholder="YYYY-MM-DD" name="expireDate" min="<?php echo date('Y-m-d') ?>" required> </td>
                                <p class="importantMessage"> <?php echo $data['expireDate_err']; ?> </p>

                            </tr>
                            <tr>
                                <td class="verticleCentered">
                                    Description
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" name="description" row="5" class="orderdetails" placeholder="Add medicine description here" required> </td>
                                <p class="importantMessage"> <?php echo $data['description_err']; ?> </p>

                            </tr>

                            <tr>
                                <input type="hidden" name="medicineId" value="<?php echo $medicine->medicineId ?>">
                                <input type="hidden" name=pharmacyId" value="<?php echo $_SESSION['USER_DATA']['id'] ?>">
                                <input type="hidden" name="medicineName" value="<?php echo $medicine->medicinename ?>">
                                <input type="hidden" name="refno" value="<?php echo $medicine->refno ?>">
                                <input type="hidden" name="category" value="<?php echo $medicine->category ?>">
                                <input type="hidden" name="volume" value="<?php echo $medicine->volume ?>">
                                <input type="hidden" name="type" value="<?php echo $medicine->type ?>">
                                <input type="hidden" name="category" value="<?php echo $medicine->category ?>">
                            </tr>
                            <tr>
                                <td class="verticleCentered"><input type="submit" class="addBtn" value="Add"></td>
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