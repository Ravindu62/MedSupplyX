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
    <div class="content">
        <div class="anim">
            <h2> Add Inventory </h2>
        </div>
        <div class="smallspace"></div>

        <div class="anim">
            <div class="container-fluid">
                <div class="d-flex">
                    <form action="<?php echo URLROOT; ?>/pharmacies/addInventory" method="POST" class="orderform">

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
                                <td class="verticleCentered"> <input type="text" name="refno" class="smallForm" id="refno" class="form-control <?php echo (!empty($data['refno_err'])) ? 'is-invalid' : ''; ?>" value="MED" oninput="preventEditMED()"></td>
                                <p class="importantMessage"> <?php echo $data['refno_err']; ?> </p>


                                <td class="verticleCentered">
                                    Medicine Name
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"><input type="text" name="medicineName" class="smallForm" required> </td>
                                <p class="importantMessage"> <?php echo $data['medicineName_err']; ?> </p>


                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Batch No
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" name="batchNo" class="smallForm" id="batchNo" class="form-control <?php echo (!empty($data['batchNo_err'])) ? 'is-invalid' : ''; ?>" value="BCH" oninput="preventEditBCH()"> </td>
                                <p class="importantMessage"> <?php echo $data['batchNo_err']; ?> </p>

                                <td class="verticleCentered">
                                    Category
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" name="category" class="smallForm" required> </td>
                                <p class="importantMessage"> <?php echo $data['category_err']; ?> </p>

                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Volume
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="number" name="volume" class="smallForm" min="1" required> </td>
                                <p class="importantMessage"> <?php echo $data['volume_err']; ?> </p>



                                <td class="verticleCentered">
                                    Type
                                </td>
                                <td> : </td>
                                <td class="verticleCentered">
                                    <select class="type" name="type">
                                        <option value="(mg)tablets">Tablets (mg)</option>
                                        <option value="(ml) bottles">Bottles (ml)</option>
                                        <option value="(l) bottles">Bottles (l)</option>
                                        <option value="(l) capsules">Capsules (mg)</option>
                                        <option value="liquid">Liquid</option>
                                        <option value="injectables">Injectables</option>
                                        <option value="creams/ointments">Creams and Ointments</option>
                                        <option value="powders">Powders</option>
                                        <option value="drops">Drops</option>
                                        <option value="patches">Patches</option>
                                        <option value="inhalers">Inhalers</option>
                                        <option value="lotions">Lotions</option>
                                        <option value="gels">Gels</option>
                                        <option value="(g) units">Units (g) </option>
                                        <option value="boxes"> Boxes </option>
                                    </select>
                                </td>
                                <p class="importantMessage"> <?php echo $data['type_err']; ?> </p>

                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Brand
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" name="brand" class="smallForm" required> </td>
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
                                <td class="verticleCentered"> <input type="Date" class="orderdetails" placeholder="YYYY-MM-DD" name="manufacturedDate" required> </td>
                                <p class="importantMessage"> <?php echo $data['manufacturedDate_err']; ?> </p>


                                <td class="verticleCentered">
                                    Expire Date
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="Date" class="orderdetails" placeholder="YYYY-MM-DD" name="expireDate" required> </td>
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