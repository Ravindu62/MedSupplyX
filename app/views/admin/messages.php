<!DOCTYPE html>
<html lang="en">

<head>
  <title> Message </title>
  <meta charset="utf-8">
  <link rel="icon" href="<?php echo URLROOT ?>/public/img/logo3.png" type="image/gif" sizes="20x16">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>

<body>


  <?php require APPROOT . '/views/inc/header.php'; ?>

  <?php require APPROOT . '/views/inc/admin_sidebar.php'; ?>

  <!-- content -->
  <div class="content">
    <div class="anim">
      <br>
      <h2> Messages </h2>
    </div>
    <div class="anim">
      <button class="open-button" onclick="openForm()"> Open New Message </button>
      <br>
    </div>

    <br><br>

    <div class="anim">
      <table class="customers">
        <tr>
          <th> Receiver </th>
          <th> Heading </th>
          <th> Message </th>
          <th> Date </th>
        </tr>

        <?php foreach ($data['messages'] as $messages) : ?>
          <tr>
            <td> <?php echo $messages->receiver; ?> </td>
            <td> <?php echo $messages->heading; ?> </td>
            <td> <?php echo $messages->message; ?> </td>
            <td> <?php echo date('Y-m-d', strtotime($messages->createdDate)); ?> </td>
          </tr>
        <?php endforeach; ?>

      </table>
    </div>
  </div>
  </div>

  <div class="chat-popup" id="myForm">
    <form action="<?php echo URLROOT; ?>/admins/newMessage" method="POST"  class=" form-container">

      <div>
        <label for="receiver"> <b> To :- </b> </label>
        <select class="dropdown" name="receiver" required>
          <option value="0"> Select the person </option>
          <option value="manager"> Manager </option>
        </select>
      </div>

      <br>
      <label for="heading"> <b> Heading </b> </label>
      <input class="bar" type="text" placeholder="What's about..." name="heading" required>

      <br>
      <br>
      <label for="message"> <b> Message </b> </label>
      <textarea placeholder="Type message.." name="message" required></textarea>


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