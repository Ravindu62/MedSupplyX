<!DOCTYPE html>
<html lang="en">
<head>
  <title> New Mediine </title>
</head>
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/pharmacy_sidebar.php'; ?>
<!-- content -->
<div class="content">
  <div class="anim">
    <h2> Selected Medicine Stock </h2>
  </div>
  <div class="smallspace"></div>

  <?php $medicinestock = $data['medicinestock']; ?>
  <?php $medicine = $data['medicine']; ?>
  <!-- <?php echo $medicine->refno?> -->

 
  <div class="anim">
    <div class="container-fluid">
      <div class="d-flex">
        <form action="<?php echo URLROOT; ?>/pharmacies/medicinestock/<?php echo $medicinestock->medicineId; ?>" method="post">
          <table>
            <tr>
              <td colspan="2">
               
              </td>
            </tr>
          
            <tr>
              <td class="verticleCentered">
                <span> Medicine Name : </span>
              </td>
              <td class="verticleCentered"> <input type="text" name="mname" class="smallForm" value="<?php echo $medicinestock->name ?>" disabled> </td>
              <td class="verticleCentered">
                <span> Volume/Type :
              </td>
              <td class="verticleCentered"><input type="text" name="refno" class="smallForm" value="<?php echo $medicinestock->volume ?> <?php echo $medicinestock->type ?>" disabled> </td>
              <td class="verticleCentered">
                <span> Category : </span>
              </td>
              <td class="verticleCentered"> <input type="text" name="category" class="smallForm" min="100" value="<?php echo $medicinestock->category ?>" disabled> </td>
            </tr>
           <tr>
              <td class="verticleCentered">
                <span> Brand : </span>
              </td>
              <td class="verticleCentered"> 
                <select name="brand" class="smallForm">
                  <?php foreach ($data['brands'] as $brand) : ?>
                    <option value="<?php echo $brand->brandname ?>"> <?php echo $brand->brandname ?> </option>
                  <?php endforeach; ?>
                </select>
           </tr>
            <tr>
              <td class="verticleCentered">
                <span> Add quantity : </span>
              </td>
              <td class="verticleCentered"> <input type="number" name="quantity" min="1" class="smallForm" required> </td>

              <td class="verticleCentered">
                <span> Batch Number : </span>
              </td>
              <td class="verticleCentered"> <input type="text" name="batchNo" class="smallForm" <?php echo (!empty($data['batchNo_err'])) ? 'is-invalid' : ''; ?>" value="BCH" oninput="preventEditBCH()" required> </td>

            </tr>
            <tr>
              <td class="verticleCentered">
                <span> Manufactured Date : </span>
              </td>
              <td class="verticleCentered"> <input type="date" name="manufacturedDate" max="<?php echo date('Y-m-d') ?>" class="smallForm" required> </td>

              <td class="verticleCentered">
                <span> Expire Date : </span>
              </td>
              <td class="verticleCentered"> <input type="date" name="expireDate" min="<?php echo date('Y-m-d') ?>" class="smallForm" required> </td>
            </tr>
            <tr>
            <tr>
              <td class="verticleCentered">
                <span> Unit Price : </span>
              </td>
              <td class="verticleCentered"> <input type="number" name="unitPrice" min="1" class="smallForm" required> </td>
 
              <td class="verticleCentered">
                <span> Description : </span>
              </td>
              <td class="verticleCentered"> <input type="text" name="description" min="1" class="smallForm" required> </td>
            </tr>
            <tr>

            <input type="hidden" name="medicineId" value="<?php echo $medicinestock->medicineId ?>">
            <input type="hidden" name="supplierId" value="<?php echo $_SESSION['USER_DATA']['id'] ?>">
            <input type="hidden" name="medicineName" value="<?php echo $medicinestock->name ?>">
            <input type="hidden" name="category" value="<?php echo $medicinestock->category ?>">
            <input type="hidden" name="volume" value="<?php echo $medicinestock->volume ?>">
            <input type="hidden" name="type" value="<?php echo $medicinestock->type ?>">
            <input type="hidden" name="category" value="<?php echo $medicinestock->category ?>">
        
    
      

              <td class="verticleCentered" colspan="4"> <input class="addBtn" type="submit" value="Add">
                <a href="<?php echo URLROOT ?>/pharmacies/inventory" class="link">
                  <div class="publicbtn"> Cancel </div>
                </a>
              </td>
            </tr>
          </table>

          <p class="importantMessage">   <?php echo $data['quantity_err']; ?>        </p>
          <p class="importantMessage">  <?php echo $data['batchNo_err']; ?>          </p>
          <p class="importantMessage">  <?php echo $data['manufacturedDate_err']; ?> </p>
          <p class="importantMessage">  <?php echo $data['expireDate_err']; ?>       </p>

          
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