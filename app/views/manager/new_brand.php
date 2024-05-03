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
  <?php $medicine = $data['medicines']; ?>
  <input type="hidden" name="medicineId" value="<?php echo $medicine->medicineId ?>">
  <div class="anim">
    <div class="container-fluid">
      <div class="d-flex">
        <form action="<?php echo URLROOT; ?>/managers/new_brand/<?php echo $medicine->medicineId ?>" method="POST" class="orderform">
          <table>
            <tr>
              <td colspan="2">
                <h3> <br> <br> New Medicine Details </h3>
              </td>
            </tr>
            <p class="importantMessage"> <?php echo $data['brandname_err']; ?> </p>
            <tr>
              <td class="verticleCentered">
                <span> Medicine Name :
              </td>
              <td class="verticleCentered"> <input type="text" name="mname" class="orderdetails" value="<?php echo $medicine->medicinename ?>" disabled> </td>
              <td class="verticleCentered">
                <span> Ref Number :
              </td>
              <td class="verticleCentered"><input type="text" name="refno" class="smallForm" value="<?php echo $medicine->refno ?>" disabled> </td>
              <td class="verticleCentered">
                <span> Category :
              </td>
              <td class="verticleCentered"> <input type="text" name="category" class="smallForm" min="100" value="<?php echo $medicine->category ?>" disabled> </td>
            </tr>
            <tr>
              <td class="verticleCentered">
                <span> Volume :
              </td>
              <td class="verticleCentered"> <input type="number" name="volume" min="1" class="orderdetails" value="<?php echo $medicine->volume ?>" disabled> </td>
              <td class="verticleCentered">
                <span> Type :
              </td>
              <td class="verticleCentered">
                <select class="type" name="medicineType" disabled>
                  <option value="bottles (ml)">Bottles (ml)</option>
                  <option value="tablets (mg)">Tablets (mg)</option>
                  <option value="units (g)">Units (g) </option>
                  <option value="boxes"> Boxes </option>
                </select>
              </td>
              <td class="verticleCentered">
                <span> Manufactured Date :
              </td>
              <td class="verticleCentered"> <input type="text" name="volume" min="1" class="orderdetails" value="<?php echo $medicine->manufacturedDate ?>" disabled> </td>
              <td class="verticleCentered">
                
              </td>
            </tr>
            <tr>
              <td class="verticleCentered">
                <span> Description :
              </td>
              <td class="verticleCentered" colspan="3"> <input type="text" class="orderdetails2" name="description" placeholder="Type Description..." value="<?php echo $medicine->description ?>" disabled> </td>
            </tr>
            <tr>
              <td class="verticleCentered">
                <span> Available Brand:
              </td>
              <td class="verticleCentered"> <input type="text" name="brandname" min="1" class="orderdetails"> </td>
            </tr>
            <tr>
              <td class="verticleCentered" colspan="4"> <input class="addBtn" type="submit" value="Add">
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