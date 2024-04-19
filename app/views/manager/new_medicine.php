<!DOCTYPE html>
<html lang="en">

<head>
  <title> New Mediine </title>
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
              <td class="verticleCentered">
                <span> Ref Number :
              </td>
              <td class="verticleCentered"><input type="text" name="refno" class="smallForm" value="<?php echo $data['refno']; ?>"> </td>
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
                  <option value="bottles (ml)">Bottles (ml)</option>
                  <option value="tablets (mg)">Tablets (mg)</option>
                  <option value="units (g)">Units (g) </option>
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