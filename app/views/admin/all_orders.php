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
  <div class="horizontaltab">
      <button class="tablinks active" onclick="startEvent(event, 'orders')"> <i class="fa fa-shopping-cart" style="font-size:24px"> </i> ORDERS</button>
      <button class="tablinks" onclick="startEvent(event, 'ongoingOrders')"> <i class="fa fa-gavel"> </i> ONGOING ORDERS</button>
      <button class="tablinks" onclick="startEvent(event, 'acceptedOrders')"> <i class="fa-solid fa-check"> </i> Acccepted ORDERS</button>
    </div>

    <div id="orders" class="tabcontent">
  <h2>
  <div class="anim">
    Orders
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
</div>


<div id="ongoingOrders" class="tabcontent">
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
</div>


<div id="acceptedOrders" class="tabcontent">
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
</div>




</div>
</div>




<?php require APPROOT . '/views/inc/footer.php'; ?>


<script>
      function startEvent(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        if (evt) evt.currentTarget.className += " active";
        else document.querySelector('button.tablinks').className += " active";
      }
      document.body.addEventListener('DOMContentLoaded', startEvent(event, 'orders'));
    </script>


</body>
</html>

