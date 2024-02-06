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

<?php require APPROOT . '/views/inc/supplier_sidebar.php'; ?>


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
    <th> Update Stock </th>
    
  </tr>
<tr> 
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td>  </td>
</tr>

<tr> 
  <td> 123</td>
  <td> Piriton </td>
  <td> 1312</td>
  <td> 12 </td>
  <td> 1800 </td>
  <td> 2023/08/15 </td>
  <td> 2023/10/15</td>
  <td> <button class="smallOpen-button" onclick="openForm()"> Update </button> </td>
</tr>

</table>
</div>
</div>
</div>

<div class="chat-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    

    <label for="text"><b> Number of new item </b></label>
    <input class="bar" type="text" placeholder="Enter the new items that arrived" name="price" required>
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

