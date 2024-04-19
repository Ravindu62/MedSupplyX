<!DOCTYPE html>
<html lang="en">
<head>
  <title> Place New Order </title>
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
      <h2> Add Order </h2>
    </div>
    <div class="smallspace"></div>
    <div class="anim">
      <div class="container-fluid">
        <div class="d-flex">
          <form action="" method="POST" class="orderform">
            <table>
              <tr>
                <td colspan="2">
                  <h3> <br> <br> Medicine Details </h3>
                </td>
              </tr>
              <tr>
                <td class="verticleCentered">
                  Medicine Name
                </td>
                <td> : </td>
                <td class="verticleCentered"> <input type="text" name="Mname" class="orderdetails" required> </td>
                <td class="verticleCentered">
                  Brand Name
                </td>
                <td> : </td>
                <td class="verticleCentered"><input type="text" name="Bnum" class="smallForm" required> </td>
              </tr>
              <tr>
                <td class="verticleCentered" colspan="4">
                  <p class="importantMessage"> </p>
                </td>
              </tr>
              <tr>
                <td colspan="5" class="verticleCentered">
                  <hr class="rule">
                </td>
              </tr>
              <tr>
                <td class="verticleCentered">
                  Quantity
                </td>
                <td> : </td>
                <td class="verticleCentered"> <input type="number" name="quantity" class="smallForm" required min="100"> </td>
              </tr>
              <tr>
                <td class="verticleCentered">
                  <span> Type
                </td>
                <td class="verticleCentered"> :</td>
                <td class="verticleCentered">
                  <select class="type" name="medicineType" required>
                    <option value="bottles (ml)">Bottles </option>
                    <option value="tablets (mg)">Tablets</option>
                    <option value="units (g)">Units </option>
                    <option value="boxes"> Boxes </option>
                  </select>
                </td>
              </tr>
              <tr>
                <td class="verticleCentered">
                  Delivery Date
                </td>
                <td> : </td>
                <td class="verticleCentered"> <input type="Date" class="orderdetails" placeholder="YYYY-MM-DD"> </td>
              </tr>
              <tr>
                <td class="verticleCentered"> <button class="addBtn"> Done </button>
          </form>
          <a href="<?php echo URLROOT ?>/pharmacies/orders" class="link">
            <div class="publicbtn"> Cancel </div>
          </a> </td>
          </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
  <?php require APPROOT . '/views/inc/footer.php'; ?>
</body>
</html>