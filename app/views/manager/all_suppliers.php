<DOCTYPE html>
  <html lang="en">
  <head>
    <title> Inventory </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
  </head>
  <body>
    <?php require APPROOT . '/views/inc/header.php'; ?>
    <?php require APPROOT . '/views/inc/manager_sidebar.php'; ?>
    <!-- content -->
    <div class="content">
      <h2 class="anim"> Suppliers </h2>
      <p class="anim"> Here are all the Suppliers who registered to the MedSupplyX </p>
      <div class="anim">
        <table class="customers">
          <tr>
            <th> </th>
            <th> Licence No </th>
            <th> Supplier Name </th>
            <th> Physical Address </th>
            <th> Contact No </th>
            <th> Email </th>
            <th> Document </th>
          </tr>
          <tr>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> <!-- <button> Accept </button> --> </td>
          </tr>
          <?php foreach ($data['allSuppliers'] as $allSuppliers) : ?>
            <tr>
              <td> </td>
              <td> <?php echo $allSuppliers->licenceno; ?> </td>
              <td> <?php echo $allSuppliers->name; ?> </td>
              <td> <?php echo $allSuppliers->address; ?> </td>
              <td> <?php echo $allSuppliers->phone; ?> </td>
              <td> <?php echo $allSuppliers->email; ?> </td>
              <td> <a href="<?php echo URLROOT; ?>/public/uploads/SupplierLicence/<?php echo $allSuppliers->licence; ?>" target="_blank">
                  <i class="fa fa-file-pdf-o" style="font-size:20px;color:red;"></i> </a>
              </td>
            <?php endforeach; ?>
            </tr>
        </table>
      </div>
    </div>
    </div>
    <div class="chat-popup" id="myForm">
      <form action="/action_page.php" class="form-container">
        <label for="text"><b> Number of Item </b></label>
        <input class="bar" type="text" placeholder="Enter Your Price for the order" name="price" required>
        <br> <br>
        <button type="submit" class="btn"> Update </button>
        <button type="button" class="btn cancel" onclick="closeForm()"> Close </button>
      </form>
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>
    <script>
      function openForm() {
        document.getElementById("myForm").style.display = "block";
      }
      function closeForm() {
        document.getElementById("myForm").style.display = "none";
      }
    </script>
  </body>
  </html>