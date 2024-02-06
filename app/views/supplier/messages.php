<!DOCTYPE html>
<html lang="en">
<head>
<title> Message </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>
<body>


<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/supplier_sidebar.php'; ?>

<!-- content -->
  <div class="content">
 <div class="anim">
    <h2> Messages </h2>
    </div>
  <div class="anim">
    <button class="open-button" onclick="openForm()"> Open New Message </button>
  </div>

<div class="chat-popup" id="myForm">
  <form action="" class="form-container">
  
  <div> 
    <label for="msg"> <b> To :-  </b> </label>
    <select class="dropdown" required>
      <option value="0"> Select the person </option>
      <option value="1"> Administrator </option>
      <option value="2"> Manager </option>
    </select>
  </div>
  
  <br> 
    <label for="msg"> <b> Heading </b> </label> 
    <input class="bar" type="text" placeholder="What's about..." name="msg" required >

    <br>
  <br> 
    <label for="msg"> <b> Message </b> </label>
    <textarea placeholder="Type message.." name="msg" required></textarea>
   

    <button type="submit" class="btn">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>


</body>
</html>

