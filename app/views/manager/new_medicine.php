<!DOCTYPE html>
<html lang="en">
<head>
<title> New Medicine </title>
  <meta charset="utf-8">
  <link rel="icon" href="<?php echo URLROOT ?>/public/img/logo3.png" type="image/gif" sizes="20x16">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>
  
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/manager_sidebar.php'; ?>
<!-- content -->
<div class="content">
  <div class="anim">
    <h2> Register a new medicine </h2>
  </div>
  <div class="smallspace"></div>
  <div class="anim">
    <div class="container-fluid">
      <div class="d-flex">
        <form action="<?php echo URLROOT; ?>/managers/new_medicine" method="POST" class="orderform">
          <table>
            <tr>
              <td colspan="2">
                <h3> <br> <br> New Medicine Details </h3>
              </td>
            </tr>
            <tr>
              <td class="verticleCentered">
                <span> Medicine Name :
              </td>
              <td class="verticleCentered"> <input type="text" name="mname" class="orderdetails" value="<?php echo $data['mname']; ?>"> </td>
              <p class="importantMessage"> <?php echo $data['mname_err']; ?> </p>
              <p class="importantMessage"> <?php echo $data['refno_err']; ?> </p>
              <p class="importantMessage"> <?php echo $data['category_err']; ?> </p>
              <p class="importantMessage"> <?php echo $data['volume_err']; ?> </p>
              <p class="importantMessage"> <?php echo $data['description_err']; ?> </p>
              <p class="importantMessage"> <?php echo $data['brand_err']; ?> </p>
              <p class="importantMessage"> <?php echo $data['manufacturedDate_err'] ?> </p>
              <td class="verticleCentered">
                <span> Ref Number :
              </td>
              <td class="verticleCentered"> <input type="text" name="refno" class="smallForm" id="refno" class="form-control <?php echo (!empty($data['refno_err'])) ? 'is-invalid' : ''; ?>" value="MED" oninput="preventEditMED()"></td>
              <td class="verticleCentered">
                <span> Category :
              </td>
              <td class="verticleCentered"> <input type="text" name="category" class="smallForm" min="100" value="<?php echo $data['category']; ?>"> </td>
            </tr>
            <tr>
              <td class="verticleCentered">
                <span> Volume :
              </td>
              <td class="verticleCentered"> <input type="number" name="volume" class="orderdetails" value="<?php echo $data['volume']; ?>"> </td>
              <td class="verticleCentered">
                <span> Type :
              </td>
              <td class="verticleCentered">
                <select class="type" name="medicineType">
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
            </tr>
            <tr>
              <td class="verticleCentered">
                <span> Description :
              </td>
              <td class="verticleCentered" colspan="3"> <input type="text" class="orderdetails2" name="description" placeholder="Type Description..." value="<?php echo $data['description']; ?>"> </td>
            </tr>
            <tr>
              <td class="verticleCentered">
                <span> Available Brand:
              </td>
              <td class="verticleCentered"> <input type="text" name="brand" min="1" class="orderdetails"> </td>
            </tr>

            <tr>
              <td class="verticleCentered">
                <span> Manufactured Date:
              </td>
              <td class="verticleCentered"> <input type="date" name="manufacturedDate" max="<?php echo date('Y-m-d') ?>" class="orderdetails"> </td>
            </tr>

            <tr>
              <td class="verticleCentered" colspan="4"> <input class="addBtn" type="submit" value="Done">
                <a href="<?php echo URLROOT ?>/managers/medicines" class="link">
                  <div class="publicbtn"> Cancel </div>
                </a>
              </td>
            </tr>
          </table>
        </form>
        <div class="smallspace"></div>
      </div>
    </div>
  </div>
</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
</body>

</html>

