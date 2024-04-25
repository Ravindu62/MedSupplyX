<!DOCTYPE html>
<html lang="en">

<head>
    <title> Deliver Order </title>
    <meta charset="utf-8">
    <link rel="icon" href="<?php echo URLROOT ?>/public/img/logo3.png" type="image/gif" sizes="20x16">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>

<body>
    <?php $approvedOrderDetails = $data['orderDetails']; ?>
    <?php $inventoryItem = $data['inventoryItem']; ?>

    <?php require APPROOT . '/views/inc/header.php'; ?>
    <?php require APPROOT . '/views/inc/supplier_sidebar.php'; ?>
    <!-- content -->
    <div class="content">
        <div class="anim">
            <h2> Deliver Order </h2>
        </div>
        <div class="smallspace"></div>
        <div class="anim">
            <div class="container-fluid">
                <div class="d-flex">
                    <form action="<?php echo URLROOT; ?>/suppliers/deliverOrder/<?php echo $approvedOrderDetails->id ?>" method="post">
                        <table>
                            <tr>
                                <td colspan="2">
                                    <h3> <br> Deliver Details </h3>
                                </td>
                            </tr>
                            <tr>
                                <td class="verticleCentered">
                                    Remarks
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <?php echo $approvedOrderDetails->remarks; ?> </td>
                                </td>
                            </tr>
                            <tr>

                                <td class="verticleCentered">
                                    Reply
                                </td>
                                <td> : </td>
                                <td class="verticleCentered">
                                    <p class="detailText"> <?php echo $approvedOrderDetails->reply; ?> </p>
                                </td>
                            </tr>
                            <tr>
                                <td class="verticleCentered">
                                    Quantity
                                </td>
                                <td> : </td>
                                <td class="verticleCentered">
                                    <input type="number" name="quantity" id="quantity" class="inputText" value="<?php echo $approvedOrderDetails->quantity ?>">
                                </td>

                                <td class="verticleCentered">
                                    Brand
                                </td>
                                <td> : </td>
                                <td class="verticleCentered">
                                    <input type="text" name="brand" id="brand" class="inputText" value="<?php echo $approvedOrderDetails->brand ?>">
                                </td>
                            </tr>
                            <!-- <tr>
                                <td class="verticleCentered">
                                    Manufacture Date
                                </td>
                                <td> : </td>
                                <td class="verticleCentered">
                                    <input type="date" name="manufactureDate" id="manufactureDate" class="inputText" value="<?php echo date('Y-m-d', strtotime($approvedOrderDetails->manufactureDate)); ?>">
                                </td>


                                <td class="verticleCentered">
                                    Expire Date
                                </td>
                                <td> : </td>
                                <td class="verticleCentered">
                                    <input type="date" name="expireDate" id="expireDate" class="inputText" value="<?php echo date('Y-m-d', strtotime($approvedOrderDetails->expireDate)); ?>">
                                </td>

                            </tr> -->

                            <input type="hidden" name="medicineName" value="<?php echo $approvedOrderDetails->medicineName; ?>">
                            <input type="hidden" name="type" value="<?php echo $approvedOrderDetails->type; ?>">
                            <!--<input type="hidden" name="brand" value="<?php echo $approvedOrderDetails->brand; ?>">-->
                            <input type="hidden" name="category" value="<?php echo $approvedOrderDetails->category; ?>">
                            <input type="hidden" name="volume" value="<?php echo $approvedOrderDetails->volume; ?>">

                            

                            <tr>
                                <td class="verticleCentered"> <input type="submit" class="addBtn" value="Deliver"> </td>

                                <td class="verticleCentered"> <a href="<?php echo URLROOT ?>/suppliers/orders" class="link">
                                        <div class="publicbtn"> Cancel </div>
                                    </a>
                                </td>
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