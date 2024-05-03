<!DOCTYPE html>
<html lang="en">

<head>
    <title> Requset an Order </title>
    <meta charset="utf-8">
    <link rel="icon" href="<?php echo URLROOT ?>/public/img/logo3.png" type="image/gif" sizes="20x16">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



</head>

<body>


    <?php require APPROOT . '/views/inc/header.php'; ?>

    <?php require APPROOT . '/views/inc/pharmacy_sidebar.php'; ?>

    <!-- content -->
    <div class="content">
        <div class="anim">
            <h2> Request an Order </h2>
        </div>
        <div class="smallspace"></div>

        <div class="anim">
            <div class="container-fluid">
                <div class="d-flex">
                    <form action="<?php echo URLROOT; ?>/pharmacies/customerDetails" method="POST" class="orderform">

                        <table>
                            <tr>
                                <td class="verticleCentered">
                                    <span class="fname"> Customer Name
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="text" name="customerName" id="customerName" class="smallForm" required> </td>

                                <td class="verticleCentered">
                                    <span class="lname">Contact Number
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"><input type="number" name="customerPhone" id="customerPhone" class="smallForm" required> </td>
                            </tr>



                            <tr>

                                <td class="verticleCentered">
                                    <span class="lname"> Address
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"><input type="text" name="customerAddress" id="customerAddress" class="smallForm"> </td>


                                <td class="verticleCentered">
                                    <span class="lname"> Email
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <input type="email" name="customerEmail" id="customerEmail" class="smallForm"> </td>

                            </tr>

                            <tr> </tr>

                            <tr>
                                <td class="verticleCentered" colspan="3"> <input type="submit" class="addBtn" value="Order">
                                    <a href="#" class="link">
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

