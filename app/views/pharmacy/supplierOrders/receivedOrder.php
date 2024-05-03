<!DOCTYPE html>
<html lang="en">

<head>
    <title> Add Received Order to Inventory </title>
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
        <?php $orderDetails = $data['orderDetails'] ?>

        <div class="anim">
            <h2> Add Received Order To Inventory </h2>
        </div>
        <div class="smallspace"></div>

        <div class="anim">
            <div class="container-fluid">
                <div class="d-flex">
                    <form action="<?php echo URLROOT; ?>/pharmacies/receivedOrder/<?php echo $orderDetails->id ?>" method="POST" class="orderform">


                        <table>

                            <tr>
                                <td colspan="2">
                                    <h3> <br> Medicine Details</h3>
                                </td>
                            </tr>
                            <tr>
                                <td class="verticleCentered">
                                    Supplier
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"><input type="text" class="smallForm" value="<?php echo $orderDetails->supplierName ?>" disabled></td>

                            </tr>


                            <tr>
                                <td class="verticleCentered">
                                    Medicine Name
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"><input type="text" class="smallForm" value="<?php echo $orderDetails->medicineName ?>" disabled></td>


                            </tr>

                            <tr>


                                <td class="verticleCentered">
                                    Category
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"><input type="text" class="smallForm" value="<?php echo $orderDetails->category ?>" disabled></td>

                                <td class="verticleCentered">
                                    Volume
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" class="smallForm" value="<?php echo $orderDetails->volume ?>" disabled> </td>


                            </tr>

                            <tr>




                                <td class="verticleCentered">
                                    Type
                                </td>
                                <td> : </td>
                                <td class="verticleCentered">
                                    <input type="text" class="smallForm" value="<?php echo $orderDetails->type ?>" disabled>
                                </td>

                                <td class="verticleCentered">
                                    <span> Brand
                                </td>
                                <td> : </td>
                                <td class="verticleCentered">
                                    <input type="text" class="smallForm" value="<?php echo $orderDetails->brand ?>" disabled>
                                </td>

                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Quantity
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" class="smallForm" value="<?php echo $data['totalQuantity']->totalQuantity ?>" disabled> </td>

                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Batch No
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" name="batchNo" class="smallForm" id="batchNo" class="form-control <?php echo (!empty($data['batchNo_err'])) ? 'is-invalid' : ''; ?>" value="BCH" oninput="preventEditBCH()" required> </td>
                            <td colspan="3">  <p class="importantMessage"><?php echo $data['batchNo_err']; ?></p></td>
                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Unit Price
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="number" name="unitPrice" class="smallForm" min="1"> </td>
                                <td colspan="3">  <p class="importantMessage"><?php echo $data['unitPrice_err']; ?></p> </td>


                            </tr>
                            
                            <tr>
                                <td class="verticleCentered">
                                    Description
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" name="description" row="5" class="orderdetails" placeholder="Add medicine description here"> </td>

                                <td colspan="3">
                                    <p class="importantMessage"><?php echo $data['description_err']; ?></p>
                                </td>
                            </tr>

                            <tr>



                                <td class="verticleCentered"><input type="submit" class="addBtn" value="Add"></td>
                                <td><a href="<?php echo URLROOT ?>/pharmacies/orders" class="link">
                                        <div class="publicbtn"> Go Back </div>
                                </td>
                                </a>
                            </tr>
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