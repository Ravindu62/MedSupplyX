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
<?php require APPROOT . '/views/inc/admin_sidebar.php'; ?>
<!-- content -->
  <div class="content">
  <h2>
  <div class="anim">
    Ongoing Orders
  </div>
  </h2>
<div class="anim">    
<table class="customers">
  <tr>
    <th> </th>
    <th> Pharmacy Name </th>
    <th> Supplier Name </th>
    <th> Meidicine Name </th>
    <th> Batch No </th>
    <th> Category No </th>
    <th> Quantity </th>
  </tr>
<tr> 
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> <!-- <button class="smallOpen-button" onclick="openForm()"> Update </button> --> </td>
</tr>
</table>
</div>
<div class="space"></div>
<h2>
  <div class="anim">
   Accepted Orders
  </div>
  </h2>
<div class="anim">    
<table class="customers">
  <tr>
    <th> </th>
    <th> Pharmacy Name </th>
    <th> Supplier Name </th>
    <th> Meidicine Name </th>
    <th> Batch No </th>
    <th> Category No </th>
    <th> Quantity </th>    
  </tr>
<tr> 
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> <!-- <button class="smallOpen-button" onclick="openForm()"> Update </button> --> </td>
</tr>
</table>
</div>
<div class="space"></div>
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
