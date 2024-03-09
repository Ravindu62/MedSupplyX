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

<?php require APPROOT . '/views/inc/cashier_sidebar.php'; ?>


<!-- content -->
  <div class="content">
  <h2>
  <div class="anim">
    Inventory 
  </div>
  </h2>

<div class="anim">    
<table class="customers">
  <tr>
    <th> Medicine ID </th>
    <th> Meidicine Name </th>
    <th> Batch No </th>
    <th> Category No </th>
    <th> Quantity </th>
    <th> Manufacture Date </th>
    <th> Expire Date </th>
    
    
  </tr>
<tr> 
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
</tr>

<tr> 
  <td> 123 </td>
  <td> Paracitamole </td>
  <td> 21412</td>
  <td> 02</td>
  <td> 4300</td>
  <td> 2023/05/09</td>
  <td> 2023/09/30 </td>
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

