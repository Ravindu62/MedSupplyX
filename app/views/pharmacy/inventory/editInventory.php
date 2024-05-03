<!DOCTYPE html>
<html lang="en">

<head>
    <title> Edit Inventory </title>
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
        <?php $inventory = $data['inventory_item']; ?>
        <div class="anim">
            <h2> Edit Inventory </h2>
        </div>
        <div class="smallspace"></div>

        <div class="anim">
            <div class="container-fluid">
                <div class="d-flex">
                <form action="<?php echo URLROOT; ?>/pharmacies/editInventory/<?php echo $inventory->id ?>" method="POST" class="orderform">

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
                                <td class="verticleCentered"> <input type="text" class="smallForm" name="refno" id="refno" class="form-control <?php echo (!empty($data['refno_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $inventory->refno ?>" oninput="preventEditMED()"></td>
                                <!-- <input type="hidden" name="refno" value="<?php echo $inventory->refno ?>"> -->
                                <!-- <p class="importantMessage"> <?php echo $data['refno_err']; ?> </p> -->


                                <td class="verticleCentered">
                                    Medicine Name
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"><input type="text"  name="medicineName" class="smallForm" value="<?php echo $inventory->name ?>"> </td>
                                <!-- <input type="hidden" name="medicineName" value="<?php echo $inventory->name ?>"> -->
                                <!-- <p class="importantMessage"> <?php echo $data['medicineName_err']; ?> </p> -->


                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Batch No
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" class="smallForm" name="batchNo" id="batchNo" class="form-control <?php echo (!empty($data['batchNo_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $inventory->batch_no ?>" oninput="preventEditBCH()"> </td>
                                <!-- <input type="hidden" name="batchNo" value="<?php echo $inventory->batch_no ?>"> -->
                                <!-- <p class="importantMessage"> <?php echo $data['batchNo_err']; ?> </p> -->

                                <td class="verticleCentered">
                                    Category
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" class="smallForm" name="category" value="<?php echo $inventory->category ?>"> </td>
                                <!-- <input type="hidden" name="category" value="<?php echo $inventory->category ?>"> -->
                                <!-- <p class="importantMessage"> <?php echo $data['category_err']; ?> </p> -->

                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Volume
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="number" class="smallForm" name="volume" min="1" value="<?php echo $inventory->volume ?>"> </td>
                                <!-- <input type="hidden" name="volume" value="<?php echo $inventory->volume ?>"> -->
                                <!-- <p class="importantMessage"> <?php echo $data['volume_err']; ?> </p> -->



                                <td class="verticleCentered">
                                    Type
                                </td>
                                <td> : </td>
                                <td class="verticleCentered">
                                    <select class="type" name="type">
                                        <!-- <option value="<?php echo $inventory->type ?>"></option> -->
                                        <option value="(mg)tablets" <?php if ($inventory->type === "(mg)tablets") echo "selected"; ?>>Tablets (mg)</option>
                                        <option value="(ml) bottles" <?php if ($inventory->type === "(ml) bottles") echo "selected"; ?>>Bottles (ml)</option>
                                        <option value="(l) bottles" <?php if ($inventory->type === "(l) bottles") echo "selected"; ?>>Bottles (l)</option>
                                        <option value="(mg) capsules" <?php if ($inventory->type === "(mg) capsules ") echo "selected"; ?>>Capsules (mg)</option>
                                        <option value="liquid" <?php if ($inventory->type === "liquid") echo "selected"; ?>>Liquid</option>
                                        <option value="injectables" <?php if ($inventory->type === "injectables") echo "selected"; ?>>Injectables</option>
                                        <option value="creams/ointments" <?php if ($inventory->type === "creams/ointments") echo "selected"; ?>>Creams and Ointments</option>
                                        <option value="powders" <?php if ($inventory->type === "powders") echo "selected"; ?>>Powders</option>
                                        <option value="drops" <?php if ($inventory->type === "drops") echo "selected"; ?>>Drops</option>
                                        <option value="patches" <?php if ($inventory->type === "patches") echo "selected"; ?>>Patches</option>
                                        <option value="inhalers" <?php if ($inventory->type === "inhalers") echo "selected"; ?>>Inhalers</option>
                                        <option value="lotions" <?php if ($inventory->type === "lotions") echo "selected"; ?>>Lotions</option>
                                        <option value="gels" <?php if ($inventory->type === "gels") echo "selected"; ?>>Gels</option>
                                        <option value="(g) units" <?php if ($inventory->type === "(g) units") echo "selected"; ?>>Units (g) </option>
                                        <option value="boxes" <?php if ($inventory->type === "boxes") echo "selected"; ?>> Boxes </option>
                                    </select>
                                </td>
                                <!-- <input type="hidden" name="type" value="<?php echo $inventory->type ?>"> -->
                                <!-- <p class="importantMessage"> <?php echo $data['type_err']; ?> </p> -->

                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Brand
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" name="brand" class="smallForm" value="<?php echo $inventory->brand ?>" required> </td>
                                <!-- <p class="importantMessage"> <?php echo $data['brand_err']; ?> </p> -->

                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Quantity
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="number" name="quantity" class="smallForm" min="1" value="<?php echo $inventory->quantity ?>" required> </td>
                                <!-- <p class="importantMessage"> <?php echo $data['quantity_err']; ?> </p> -->



                                <td class="verticleCentered">
                                    Unit Price
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="number" name="unitPrice" class="smallForm" min="1" value="<?php echo $inventory->unit_amount ?>" required> </td>
                                <!-- <p class="importantMessage"> <?php echo $data['unitPrice_err']; ?> </p> -->

                            </tr>
<div class="middlespace"></div>
                            <tr>
                                <td class="verticleCentered">
                                    Manufacturer Date
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" class="orderdetails setblock" value="<?php echo date('d-m-Y', strtotime($inventory->manu_date)) ?>" readonly>
                                <div class="smallspace"></div> <input type="Date" class="orderdetails setblock" placeholder="YYYY-MM-DD" name="manufacturedDate" value="<?php echo $inventory->manu_date ?>" required> </td>
                                <!-- <p class="importantMessage"> <?php echo $data['manufacturedDate_err']; ?> </p> -->


                                <td class="verticleCentered">
                                    Expire Date
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" class="orderdetails setblock" value="<?php echo date('d-m-Y', strtotime($inventory->expire_date)) ?>" readonly> 
                                <div class="smallspace"></div><input type="Date" class="orderdetails" placeholder="YYYY-MM-DD" name="expireDate" value="<?php echo $inventory->expire_date ?>" required> </td>
                                <!-- <p class="importantMessage"> <?php echo $data['expireDate_err']; ?> </p> -->

                            </tr>
                            <tr>
                                <td class="verticleCentered">
                                    Description
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" name="description" row="5" class="orderdetails" placeholder="Add medicine description here" value="<?php echo $inventory->description ?>" required> </td>
                                <!-- <p class="importantMessage"> <?php echo $data['description_err']; ?> </p> -->

                            </tr>

                            <tr>
                                <td class="verticleCentered"> <input type="submit" class="addBtn" value="Update"></td>
                                <td><a href="<?php echo URLROOT ?>/pharmacies/inventory" class="link">
                                        <div class="publicbtn"> Cancel </div>
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